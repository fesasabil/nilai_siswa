<?php
use App\Models\Student;
use App\Models\Teacher;

function ranking5Besar()
{
    $student = Student::all();
    $student->map(function($st){
    $st->average = $st->average();
        return $st;
    });
    $student = $student->sortByDesc('average')->take(5);
    return $student;
}

function totalStudent()
{
    return Student::count();
}

function totalTeacher()
{
    return Teacher::count();
}