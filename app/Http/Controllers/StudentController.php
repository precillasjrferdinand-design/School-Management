<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function create()
    {
        return view('students.create', ['subjects' => Subject::orderBy('name')->get()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'       => ['required', 'string', 'max:255'],
            'email'      => ['required', 'email', 'max:255', 'unique:students,email'],
            'address'    => ['nullable', 'string', 'max:255'],
            'phone'      => ['nullable', 'string', 'max:30'],
            'subjects'   => ['nullable', 'array'],
            'subjects.*' => ['exists:subjects,id'],
        ]);

        // All-or-nothing: student + profile + subjects
        $student = DB::transaction(function () use ($data) {
            $student = Student::create(['name' => $data['name'], 'email' => $data['email']]);

            $student->profile()->create([
                'address' => $data['address'] ?? null,
                'phone'   => $data['phone'] ?? null,
            ]);

            $student->subjects()->sync($data['subjects'] ?? []);

            return $student;
        });

        // Redirect after POST (PRG): refreshing reloads a GET page, never re-sends the form
        return redirect()->route('students.show', $student)->with('status', 'Student added.');
    }

    public function show(Student $student)
    {
        $student->load(['profile', 'courses', 'subjects']);

        return view('students.show', compact('student'));
    }

    public function storeCourse(Request $request, Student $student)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'grade' => ['nullable', 'numeric', 'between:0,100'],
        ]);

        $student->courses()->create($data);

        return redirect()->route('students.show', $student)->with('status', 'Course added.');
    }

    public function destroy(Student $student)
    {
        $student->delete(); // profile, courses and pivot rows cascade

        return redirect()->route('dashboard')->with('status', 'Student deleted.');
    }
}
