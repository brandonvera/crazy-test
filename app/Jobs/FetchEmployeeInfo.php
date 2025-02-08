<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Employee;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class FetchEmployeeInfo implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            $response = Http::withHeaders([
                'Cookie' => 'humans_21909=1',
            ])->get('http://dummy.restapiexample.com/api/v1/employees');

            if ($response->successful()) {
                Log::info('Data fetched successfully.');

                try {
                    $employees = $response->json()['data'];

                    //saving data 
                    foreach ($employees as $employee) {
                        Employee::updateOrCreate(
                            ['id' => $employee['id']],
                            [
                                'name' => $employee['employee_name'],
                                'age' => $employee['employee_age'],
                                'salary' => $employee['employee_salary'],
                                'profile_picture' => $employee['profile_image'],
                            ]
                        );
                    }

                    Log::info('data saved successfully.');

                } catch (\Exception $e) {
                    //Throw error with data
                    Log::error('Error saving data: ' . $e->getMessage());
                }
            } else {
                //throw api error
                Log::error('Error fetching data from URI: ' . $response->body());
            }

        } catch (\Exception $e) {
            //catch generals errors
            Log::error('General error in job: ' . $e->getMessage());
        }
    }
}
