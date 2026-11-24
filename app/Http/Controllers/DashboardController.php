<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use App\Models\Subject;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'studentCount' => Student::count(),
            'courseCount'  => Course::count(),
            'subjectCount' => Subject::count(),
            'students'     => Student::with('profile')->withCount(['courses', 'subjects'])->latest()->get(),
        ]);
    }
}
