@extends('layouts.master')

@section('content')
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Edit Data Student</h3>
								</div>
                                @if(session('success'))
                                    <div class="alert alert-success" role="alert">
                                        {{session('success')}}
                                    </div>
                                @endif

                                @if (count($errors) > 0)
                                    <div class="alert alert-danger alert-dismissable" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>
                                                {{ $error }}
                                            </li>
                                        @endforeach            
                                        </ul>
                                    </div> 
                                @endif

								<div class="panel-body">
									<form action="/student/{{$student->id}}/update" method="POST" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nama Depan</label>
                                            <input name="nama_depan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Nama Depan" value="{{$student->nama_depan}}">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nama Belakang</label>
                                            <input name="nama_belakang" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Nama Belakang" value="{{$student->nama_belakang}}">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Pilih Jenis Kelamin</label>
                                            <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
                                                <option value="Laki-laki" @if($student->jenis_kelamin == 'Laki-laki') selected @endif>Laki-Laki</option>
                                                <option value="Perempuan" @if($student->jenis_kelamin == 'Perempuan') selected @endif>Perempuan</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Agama</label>
                                            <input name="agama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Agama" value="{{$student->agama}}">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">Alamat</label>
                                            <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$student->alamat}}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">Avatar</label>
                                            <input type="file" name="avatar" class="form-control">
                                        </div>
                                        <button type="submit" class="btn btn-warning">Update</button>
                                        <a href="/student" class="btn btn-danger">Cancel</a>

                                    </form>
								</div>
							</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop