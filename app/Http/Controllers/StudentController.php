<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('cari')) 
        {
            $student = \App\Models\Student::where('nama_depan', 'LIKE', '%'.$request->cari.'%')->get();
        }else {
            $student = \App\Models\Student::all();
        }
        return view('student.index',['student' => $student]);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'nama_depan' => 'required | min:5',
            'nama_belakang' => 'required',
            'email' => 'required | email | unique:users',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'avatar' => 'mimes:jpg,png,jpeg'
         ]);

        //Insert to table Users 
        $user = new \App\User;
        $user->role = 'student';
        $user->name = $request->nama_depan;
        $user->email = $request->email;
        $user->password = bcrypt('rahasia');
        $user->remember_token = str_random(60);
        $user->save();

        //Insert to table Students
        $request->request->add(['user_id' => $user->id]);
        $student = \App\Models\Student::create($request->all());
        if($request->hasFile('avatar')) {
            $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
            $student->avatar = $request->file('avatar')->getClientOriginalName();
            $student->save();
        }
        return redirect('/student')->with('success', 'Data success created');

    }

    public function edit($id)
    {
        $student = \App\Models\Student::find($id);
        return view('student/edit', ['student' => $student]);
    }

    public function update(Request $request,$id)
    {
        $student = \App\Models\Student::find($id);
        $student->update($request->all());
        if($request->hasFile('avatar')) {
            $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
            $student->avatar = $request->file('avatar')->getClientOriginalName();
            $student->save();
        }
        return redirect('/student')->with('success', 'Data success updated');
    }

    public function delete($id)
    {
        $student = \App\Models\Student::find($id);
        $student->delete($student);
        return redirect('/student')->with('success', 'Data success deleted');
    }

    public function profile($id)
    {
        $student = \App\Models\Student::find($id);
        $subjects = \App\Models\Subject::all();

        //Data chart
        $categories = [];
        $data = [];

        foreach ($subjects as $sub) {
            if($student->subject()->wherePivot('subject_id', $sub->id)->first()) {
            $categories[] = $sub->name;
            $data[] = $student->subject()->wherePivot('subject_id', $sub->id)->first()->pivot->value;
            }
        }

        return view('student.profile', ['student' => $student, 'subjects' => $subjects, 'categories' => $categories, 'data' => $data]);
    }

    public function addvalue(Request $request,$idstudent)
    {
        $student = \App\Models\Student::find($idstudent);
        if($student->subject()->where('subject_id', $request->subject)->exists()) {
            return redirect('student/'.$idstudent.'/profile')->with('vailed', 'Data already exists  ');
        }
        $student->subject()->attach($request->subject,['value' => $request->value]);
        return redirect('student/'.$idstudent.'/profile')->with('success', 'Data success value created');
    }

    public function deletevalue($idstudent, $idsubject)
    {
        $student = \App\Models\Student::find($idstudent);
        $student->subject()->detach($idsubject);
        return redirect()->back()->with('success', 'Data success value deleted');
    }
}
