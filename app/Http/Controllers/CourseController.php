<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'category'    => 'required|string',
            'level'       => 'required|string',
            'duration'    => 'required|integer',
            'price'       => 'required|numeric',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('courses', 'public');
        }

        Course::create([
            'title'       => $request->title,
            'description' => $request->description,
            'category'    => $request->category,
            'level'       => $request->level,
            'duration'    => $request->duration,
            'price'       => $request->price,
            'image'       => $imagePath,
        ]);

        return redirect('/courses')->with('success', 'Course created successfully!');
    }
}