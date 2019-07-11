<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\StudentExport;
use Maatwebsite\Excel\Facades\Excel;
use App\User;
use App\Models\Student;
use App\Models\Subject;
use PDF;

class StudentController extends Controller
{
    //studentrepository
    private $student;

    //studentcontroller constructor
    public function __construct(StudentRepository $student)
    {
        $this->student = $student;
    }

    public function index(Request $request)
    {
        $student = Student::all();
        // if($request->has('cari')) 
        // {
        //     $student = \App\Models\Student::where('nama_depan', 'LIKE', '%'.$request->cari.'%')->get();
        // }else {
        //     
        // }
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
        $user = new User;
        $user->role = 'student';
        $user->name = $request->nama_depan;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->remember_token = str_random(60);
        $user->save();

        //Insert to table Students
        $request->request->add(['user_id' => $user->id]);
        $student = Student::create($request->all());
        if($request->hasFile('avatar')) {
            $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
            $student->avatar = $request->file('avatar')->getClientOriginalName();
            $student->save();
        }
        return redirect('/student')->with('success', 'Data success created');

    }

    public function edit(Student $student)
    {
        return view('student/edit', ['student' => $student]);
    }

    public function update(Request $request,Student $student)
    {
        $student->update($request->all());
        if($request->hasFile('avatar')) {
            $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
            $student->avatar = $request->file('avatar')->getClientOriginalName();
            $student->save();
        }
        return redirect('/student')->with('success', 'Data success updated');
    }

    public function delete(Student $student)
    {
        $student->delete($student);
        return redirect('/student')->with('success', 'Data success deleted');
    }

    public function profile(Student $student)
    {
        $subjects = Subject::all();

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
        $student = Student::find($idstudent);
        if($student->subject()->where('subject_id', $request->subject)->exists()) {
            return redirect('student/'.$idstudent.'/profile')->with('vailed', 'Data already exists  ');
        }
        $student->subject()->attach($request->subject,['value' => $request->value]);
        return redirect('student/'.$idstudent.'/profile')->with('success', 'Data success value created');
    }

    public function deletevalue($idstudent, $idsubject)
    {
        $student = Student::find($idstudent);
        $student->subject()->detach($idsubject);
        return redirect()->back()->with('success', 'Data success value deleted');
    }

    public function exportExcel()
    {
        return Excel::download(new StudentExport, 'student.xlsx');
    }

    public function exportPdf()
    {
        $student = Student::all();
        $pdf = PDF::loadView('export.studentpdf', ['student' => $student]);
        return $pdf->download('student.pdf');
    }
}
