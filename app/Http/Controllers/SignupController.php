<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Student;


class SignupController extends Controller
{
    public function signup()
    {
        return view('auths.register');
    }

    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'nama_depan' => 'required | min:5',
        //     'nama_belakang' => 'required',
        //     'email' => 'required | email | unique:users',
        //     'password' => 'required | min:8',
        //     'jenis_kelamin' => 'required',
        //     'agama' => 'required',
        //     'avatar' => 'mimes:jpg,png,jpeg'
        //  ]);

         //Insert to table Users
         $user = new User;
         $user->role = 'student';
         $user->name = $request->nama_depan;
         $user->email = $request->email;
         $user->password = bcrypt($request->password);
         $user->remember_token = str_random(60);
         $user->save();
        
         //Insert to table Subjects
         $request->request->add(['user_id' => $user->id]);
         $student = Student::create($request->all());
         if($request->hasFile('avatar')) {
            $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
            $student->avatar = $request->file('avatar')->getClientOriginalName();
            $student->save();
         }
        return redirect('/login');
    }
}
