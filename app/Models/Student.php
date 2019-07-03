<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'nama_depan', 'nama_belakang', 'jenis_kelamin', 'agama', 'alamat', 'avatar', 'user_id'
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
        return $this->belongsToMany(Subject::class)->withPivot(['value'])->withTimeStamps();
    }

    public function average()
    {
        //Get Grade
        $total = 0;
        $hasil = 0;
        foreach($this->subject as $subject)
        {
            $total += $subject->pivot->value;
            $hasil ++;
        }
            return round($total/$hasil);
    }

    public function  nama_lengkap()
    {
        return $this->nama_depan. ' ' .$this->nama_belakang;
    }
}
