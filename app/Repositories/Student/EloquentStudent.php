<?php

namespace App\Repositories\Todo;

use App\Models\Student;

class EloquentStudent implements StudentRepositories
{
    private $model;

    public function __construct(Student $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function create(Student $student)
    {
        return $this->model->create($student);
    }

    public function edit(Student $student)
    {
        
    }

    public function update(Request $request,Student $student)
    {
        
    }

    public function delete(Student $student)
    {
        
    }
}