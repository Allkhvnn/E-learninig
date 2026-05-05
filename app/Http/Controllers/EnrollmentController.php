<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnrollmentController extends Controller
{
    public function enroll(Course $course)
    {
        $userId = Auth::id();

        if ($course->isEnrolledBy($userId)) {
            return back()->with('info', 'You are already enrolled in this course!');
        }

        Enrollment::create([
            'user_id'   => $userId,
            'course_id' => $course->id,
        ]);

        return back()->with('success', 'Successfully enrolled in ' . $course->title . '!');
    }

    public function unenroll(Course $course)
    {
        Enrollment::where('user_id', Auth::id())
                  ->where('course_id', $course->id)
                  ->delete();

        return back()->with('success', 'Successfully unenrolled from ' . $course->title . '.');
    }

    public function myEnrollments()
    {
        $enrollments = Enrollment::where('user_id', Auth::id())
                                 ->with('course')
                                 ->latest()
                                 ->get();

        return view('my-courses', compact('enrollments'));
    }
}