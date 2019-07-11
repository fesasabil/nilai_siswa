@extends('layouts.master')

@section('content')
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
								<div class="panel-heading">
                                    <h3 class="panel-title">Data Student</h3>

                                    <div class="right">
                                        <!-- Button trigger modal -->
                                        <a href="/student/exportExcel" class="btn btn-sm btn-primary">Export Excel</a>
                                        <a href="/student/exportPdf" class="btn btn-sm btn-primary">Export PDF</a>
                                        <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal"><i class="lnr lnr-plus-circle"></i></button>
                                    </div>

                                    @if(session('success'))
                                        <div class="alert alert-success" role="alert">
                                            {{session('success')}}
                                        </div>
                                    @endif
								</div>

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
									<table class="table table-hover">
										<thead>
											<tr>
                                                <th>Nama Depan</th>
                                                <th>Nama Belakang</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Agama</th>
                                                <th>Alamat</th>
                                                <th>Average</th>
                                                <th>Action</th>
                                            </tr>
										</thead>
										<tbody>
											@foreach($student as $s)
                                            <tr>
                                                <td><a href="/student/{{$s->id}}/profile">{{$s->nama_depan}}</a></td>
                                                <td><a href="/student/{{$s->id}}/profile">{{$s->nama_belakang}}</a></td>
                                                <td>{{$s->jenis_kelamin}}</td>
                                                <td>{{$s->agama}}</td>
                                                <td>{{$s->alamat}}</td>
                                                <td>{{$s->average()}}</td>
                                                <td>
                                                    <a href="/student/{{$s->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                                                    <a href="#" class="btn btn-danger btn-sm delete" student-id="{{$s->id}}">Delete</a>
                                                </td>
                                            </tr>
                                            @endforeach
										</tbody>
									</table>
								</div>
							</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Insert Student</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/student/create" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Depan</label>
                                <input name="nama_depan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Nama Depan" value="{{ old('nama_depan')}}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Belakang</label>
                                <input name="nama_belakang" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Nama Belakang" value="{{ old('nama_belakang')}}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email" value="{{ old('email')}}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Password</label>
                                <input name="password" type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Password" value="{{ old('password')}}">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Gender</label>
                                <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
                                <option value="">--- Pilih Gender ---</option>
                                <option value="Laki-laki" @if (old( 'jenis_kelamin' ) == "Laki-laki" ) {{ 'selected' }} @endif>Laki-Laki</option>
                                <option value="Perempuan" @if (old( 'jenis_kelamin' ) == "Perempuan" ) {{ 'selected' }} @endif>Perempuan</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Agama</label>
                                <input name="agama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Agama" value="{{ old('agama')}}">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Alamat</label>
                                <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ old('alamat')}}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Avatar</label>
                                <input type="file" name="avatar" class="form-control" value="{{ old('avatar')}}">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
@stop

@section('footer')
  <script>
    $('.delete').click(function(){
        var student_id = $(this).attr('student-id');
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this imaginary file id "+student_id +"!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                window.location = "/student/"+student_id +"/delete";
            } else {
                swal("Your imaginary file is safe!");
            }
            });
    });
  </script>
@stop