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
									<form action="/teacher/{{$teacher->id}}/update" method="POST" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Name</label>
                                            <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Nama Depan" value="{{$teacher->name}}">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Telepon</label>
                                            <input name="telepon" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Nama Depan" value="{{$teacher->telepon}}">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">Alamat</label>
                                            <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$teacher->alamat}}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">Avatar</label>
                                            <input type="file" name="avatar" class="form-control">
                                        </div>
                                        <button type="submit" class="btn btn-warning">Update</button>
                                    </form>
								</div>
							</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop