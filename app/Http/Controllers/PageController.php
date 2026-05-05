<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Course;
use Illuminate\Support\Facades\Hash;

class PageController extends Controller
{
    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function sendContact(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'message' => 'required|string',
        ]);

        return back()->with('success', 'Your message has been sent successfully!');
    }

    public function profile()
    {
        $user = Auth::user();
        $coursesCount = Course::count();
        return view('profile', compact('user', 'coursesCount'));
    }
}
