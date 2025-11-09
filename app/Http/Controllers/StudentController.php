<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of students.
     */
    public function index(Request $request)
    {
        // Fetch all student profiles
        $students = Profile::all();

        // Return JSON for API requests
        if ($request->wantsJson() || $request->is('api/*')) {
            return response()->json($students);
        }

        // Pass to students.blade.php (fallback, though not used with React)
        return view('students', ['students' => $students]);
    }

    /**
     * Display the specified student.
     */
    public function show(Request $request, $id)
    {
        // Find student profile by ID or fail with 404
        $student = Profile::findOrFail($id);

        // Return JSON for API requests
        if ($request->wantsJson() || $request->is('api/*')) {
            return response()->json($student);
        }

        // Pass to student.blade.php (fallback, though not used with React)
        return view('student', ['student' => $student]);
    }
}
