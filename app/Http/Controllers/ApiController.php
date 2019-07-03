<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function editgrade(Request $request, $id)
    {
        $student = \App\Models\Student::find($id);
        $student->subject()->updateExistingPivot($request->pk,['grade' => $request->value]);
    }
}
