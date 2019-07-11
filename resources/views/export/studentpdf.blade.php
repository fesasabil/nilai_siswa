<table>
    <thead>
        <tr>
            <td>Nama Lengkap</td>
            <td>Jenis Kelamin</td>
            <td>Agama</td>
            <td>Alamat</td>
            <td>Average</td>
        </tr>
    </thead>
    <tbody>
    @foreach($student as $student)
        <tr>
            <td>{{$student->nama_lengkap()}}</td>
            <td>{{$student->jenis_kelamin}}</td>
            <td>{{$student->agama}}</td>
            <td>{{$student->alamat}}</td>
            <td>{{$student->average()}}</td>
        </tr>
    @endforeach
    </tbody>
</table>