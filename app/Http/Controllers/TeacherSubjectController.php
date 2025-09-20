<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Teacher;

class TeacherSubjectController extends Controller
{
    
    public function show($id){

        $teacher = Teacher::with('subjects')->findOrFail($id);

        return view('teachers.detail',compact('teacher'));
    }


}
