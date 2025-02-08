<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\StudentRequest;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        //get students data
        $students = Student::paginate(10);
        //return to index view
        return view('students.index', compact('students'));
    }

    public function create()
    {
        //return to create view
        return view('students.create');
    }

    public function store(StudentRequest $request)
    {
        //saving student data
        Student::create($request->all());
        //redirect to index view
        return redirect()->route('students.index')->with('success', 'Student save succesfull.');
    }

    public function show(Student $student)
    {
        //show student data 
        return view('students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        //show edit view 
        return view('students.show', compact('student'));
    }

    public function update(StudentRequest $request, Student $student)
    {
        //updating student data
        $student->update($request->all());
        //return to index view
        return redirect()->route('students.index')->with('success', 'Updated succesfull.');
    }

    public function destroy(Student $student)
    {
        //deleting data
        $student->delete();
        //return to index view
        return redirect()->route('students.index')->with('success', 'Deleted successfull.');
    }
}
