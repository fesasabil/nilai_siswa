<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
        'code', 'name', 'semester'
    ];

    public function student()
    {
        return $this->belongsToMany(Student::class)->withPivot(['value']);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

}
