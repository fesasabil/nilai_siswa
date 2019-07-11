<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        'name', 'telepon', 'alamat', 'avatar'
    ];

    public function getAvatar()
    {
        if(!$this->avatar){
            return asset('images/default.jpeg');
        }
        return asset('images/'.$this->avatar);
    }

    public function subject()
    {
        return $this->hasMany(Subject::class);
    }
}
