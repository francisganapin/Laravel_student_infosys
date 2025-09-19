<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
        */
        public function index(Request $request)
        {
            $search  = $request->input('search');
        
            $students = Student::query()
                ->when($search, function($query, $search) {
                    $query->where('first_name','like',"%{$search}%");
                })
                ->paginate(10)
                ->appends(['search' => $search]);
        

                //dd($students); // check what you actually get

                return view('students.table', compact('students','search'));

        }
        
        

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:20',
            'last_name' => 'required|string|max:10',
            'date_of_birth' => 'required|date', 
            'gender' => 'required|in:male,female,other',
            'email' => 'required|email|unique:students',
            'phone_number' => 'nullable|string|max:20',
            'address' => 'required|string',
            'enrollment_date' => 'required|date',
            'photo' => 'nullable|image|max:2048',
        ]);

        if($request->hasFile('photo')){
            $validated['photo_url'] = $request->file('photo')->store('student','public');
        }

        Student::create($validated);

        return redirect()->route('students.index')->with('success', 'Student added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
