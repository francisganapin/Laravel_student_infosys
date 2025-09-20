<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Teacher;
use App\Models\Subject;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $search = $request->input('search');

        $teachers = Teacher::query()
        ->when($search, function($query, $search) {
            $query->where('first_name','like',"%{$search}%");
        })
        ->paginate(10)
        ->appends(['search' => $search]);

        return view('teachers.table',compact('teachers','search',));
        
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        // re
        return view('teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'email' => 'required|email|unique:teachers',
            'phone' => 'nullable|string',
            'department' => 'nullable|string',
        ]);

        $teacher = Teacher::create($validated);
        


        return redirect()->route('teachers.index')->with('success', 'Teacher added successfully!  '.$teacher->first_name . ' ' .$teacher->last_name);
    }

    /**
     * Display the specified resource.
     */

    public function show(Teacher $teacher)
    {
        //
        return response()->json($teacher);
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(string $id)
    {
        //
        return view('teachers.edit',compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, Teacher $teacher)
    {
        $teacher->update($request->all());
        return response()->json($teacher);
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return response()->json(['message'=>'Teacher deleted']);

    }
}
