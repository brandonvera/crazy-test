<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        //get employees data
        $employees = Employee::paginate(10);
        //return to index view
        return view('employees.employee', compact('employees'));
    }
}
