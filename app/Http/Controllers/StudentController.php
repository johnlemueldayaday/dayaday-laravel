<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of students.
     */
    public function index()
    {
        // Fetch all student profiles
        $students = Profile::all();

        // Pass to students.blade.php
        return view('students', ['students' => $students]);
    }

    /**
     * Display the specified student.
     */
    public function show($id)
    {
        // Find student profile by ID or fail with 404
        $student = Profile::findOrFail($id);

        // Pass to student.blade.php
        return view('student', ['student' => $student]);
    }
}
