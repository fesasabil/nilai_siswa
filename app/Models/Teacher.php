<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        'name', 'telepon', 'alamat'
    ];

    public function subject()
    {
        return $this->hasMany(Subject::class);
    }
}
