<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Student::all();
    }

    public function map($student): array
    {
        return [
            $student->nama_lengkap(),
            $student->jenis_kelamin,
            $student->agama,
            $student->alamat,
            $student->average()
        ];
    }

    public function headings():array
    {
        return [
            'Nama Lengkap',
            'Jenis Kelamin',
            'Agama',
            'Alamat',
            'Average'
        ];
    }
}
