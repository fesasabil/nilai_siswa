<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;

class TeacherController extends Controller
{
    public function index(Request $request)
    {
        $teacher = Teacher::all();
        return view('teacher.index' , ['teacher' =>$teacher]);
    }

    public function profileteac($id)
    {
        $teacher = Teacher::find($id);
        return view('teacher.profileteac',['teacher' => $teacher]);
    }

    public function editteac($id)
    {
        $teacher = \App\Models\Teacher::find($id);
        return view('teacher/editteac', ['teacher' => $teacher]);
    }

    public function update(Request $request,$id)
    {
        $teacher = \App\Models\Teacher::find($id);
        $teacher->update($request->all());
        if($request->hasFile('avatar')) {
            $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
            $teacher->avatar = $request->file('avatar')->getClientOriginalName();
            $teacher->save();
        }
        return redirect('/teacher')->with('success', 'Data success updated');
    }
}
