@extends('layouts.master')

@section('header')
<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
@stop

@section('content')
<div class="main">
    <div class="main-content">
				<div class="container-fluid">
					<div class="panel panel-profile">
					@if(session('vailed'))
                        <div class="alert alert-danger" role="alert">
                            {{session('vailed')}}
                        </div>
                    @endif
						<div class="clearfix">
							<!-- LEFT COLUMN -->
							<div class="profile-left">
								<!-- PROFILE HEADER -->
								<div class="profile-header">
									<div class="overlay"></div>
									<div class="profile-main">
										<img src="{{$teacher->getAvatar()}}" class="img-circle" alt="Avatar">
										<h3 class="name">{{$teacher->name}}</h3>
										<span class="online-status status-available">Available</span>
									</div>
								</div>
								<!-- END PROFILE HEADER -->
								<!-- PROFILE DETAIL -->
								<div class="profile-detail">
									<div class="profile-info">
										<h4 class="heading">Data Diri</h4>
										<ul class="list-unstyled list-justify">
											<li>Telepon <span>{{$teacher->telepon}}</span></li>
											<li>Alamat <span>{{$teacher->alamat}}</span></li>
										</ul>
									</div>
									
									<div class="text-center"><a href="/teacher/{{$teacher->id}}/editteac" class="btn btn-warning">Edit Profile</a></div>
								</div>
								<!-- END PROFILE DETAIL -->
							</div>
							<!-- END LEFT COLUMN -->
							<!-- RIGHT COLUMN -->
							<div class="profile-right">
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Subjects taught by {{$teacher->name}}</h3>
								</div>
								<div class="panel-body">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>Code</th>
												<th>Name</th>
												<th>Semester</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
                                            @foreach($teacher->subject as $subject)
											<tr>
												<td>{{$subject->code}}</td>
                                                <td>{{$subject->name}}</td>
                                                <td>{{$subject->semester}}</td>
											</tr>
                                            @endforeach
										</tbody>
									</table>
								</div>
							</div>
							<div class="panel">
								<div id="chartGrade"></div>
							</div>
							</div>
							<!-- END RIGHT COLUMN -->
						</div>
					</div>
				</div>
			</div>
        </div>
@stop

@section('footer')

@stop