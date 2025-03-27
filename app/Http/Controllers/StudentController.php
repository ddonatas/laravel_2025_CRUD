<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\City;
use App\Http\Requests\StudentRequest;



class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('city')->paginate(20);
        return view('students.index', compact('students'));
    }

    public function trashed()
    {
        $students = Student::onlyTrashed()->with('city')->paginate(10);
        return view('students.trashed', compact('students'));
    }

    public function restore($id)
    {
        Student::withTrashed()->findOrFail($id)->restore();
        return redirect()->route('students.trashed')->with('success', 'Studentas atkurtas!');
    }

    public function forceDelete($id)
    {
        Student::withTrashed()->findOrFail($id)->forceDelete();
        return redirect()->route('students.trashed')->with('success', 'Studentas visam laikui pašalintas.');
    }

    public function create()
    {
        $cities = City::all();
        return view('students.create', compact('cities'));
    }

    public function store(StudentRequest $request)
    {
        Student::create($request->validated());
        return redirect()->route('students.index')->with('success', 'Studentas pridėtas!');
    }

    public function edit(Student $student)
    {
        $cities = City::all();
        return view('students.edit', compact('student', 'cities'));
    }

    public function update(StudentRequest $request, Student $student)
    {
        $student->update($request->validated());
        return redirect()->route('students.index')->with('success', 'Studentas atnaujintas!');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Studentas buvo pažymėtas kaip ištrintas.');
    }
}

