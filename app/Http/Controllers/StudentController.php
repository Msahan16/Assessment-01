<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Show the student marks form
     */
    public function showForm()
    {
        return view('student.form');
    }

    /**
     * Calculate marks and display results
     */
    public function calculateMarks(Request $request)
    {
        // Validate all input fields
        $validated = $request->validate([
            'name' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/',
            'marks1' => 'required|numeric|min:0|max:100',
            'marks2' => 'required|numeric|min:0|max:100',
            'marks3' => 'required|numeric|min:0|max:100',
        ], [
            'name.required' => 'Student name is required.',
            'name.regex' => 'Student name must contain only letters and spaces.',
            'marks1.required' => 'Subject Marks 1 is required.',
            'marks1.numeric' => 'Subject Marks 1 must be a number.',
            'marks1.min' => 'Subject Marks 1 must be at least 0.',
            'marks1.max' => 'Subject Marks 1 cannot exceed 100.',
            'marks2.required' => 'Subject Marks 2 is required.',
            'marks2.numeric' => 'Subject Marks 2 must be a number.',
            'marks2.min' => 'Subject Marks 2 must be at least 0.',
            'marks2.max' => 'Subject Marks 2 cannot exceed 100.',
            'marks3.required' => 'Subject Marks 3 is required.',
            'marks3.numeric' => 'Subject Marks 3 must be a number.',
            'marks3.min' => 'Subject Marks 3 must be at least 0.',
            'marks3.max' => 'Subject Marks 3 cannot exceed 100.',
        ]);

        // Calculate total and average marks
        $total = $validated['marks1'] + $validated['marks2'] + $validated['marks3'];
        $average = $total / 3;
        $status = $average >= 50 ? 'Pass' : 'Fail';

        // Return results view with data
        return view('student.result', [
            'name' => $validated['name'],
            'marks1' => $validated['marks1'],
            'marks2' => $validated['marks2'],
            'marks3' => $validated['marks3'],
            'total' => $total,
            'average' => number_format($average, 2),
            'status' => $status,
        ]);
    }
}
