<?php

namespace App\Repositories\Todo;

interface StudentRepositories
{
    public function getAll();

    public function create(Request $request);

    public function edit(Student $student);

    public function update(Request $request,Student $student);

    public function delete(Student $student);
}