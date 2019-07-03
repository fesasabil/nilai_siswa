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
										<img src="{{$student->getAvatar()}}" class="img-circle" alt="Avatar">
										<h3 class="name">{{$student->nama_depan}}</h3>
										<span class="online-status status-available">Available</span>
									</div>
									<div class="profile-stat">
										<div class="row">
											<div class="col-md-4 stat-item">
												{{$student->subject->count()}} <span>Subject</span>
											</div>
											<div class="col-md-4 stat-item">
												{{$student->average()}} <span>Average</span>
											</div>
											<div class="col-md-4 stat-item">
												2174 <span>Points</span>
											</div>
										</div>
									</div>
								</div>
								<!-- END PROFILE HEADER -->
								<!-- PROFILE DETAIL -->
								<div class="profile-detail">
									<div class="profile-info">
										<h4 class="heading">Data Diri</h4>
										<ul class="list-unstyled list-justify">
											<li>Jenis Kelamin <span>{{$student->jenis_kelamin}}</span></li>
											<li>Agama <span>{{$student->agama}}</span></li>
											<li>Alamat <span>{{$student->alamat}}</span></li>
										</ul>
									</div>
									
									<div class="text-center"><a href="/student/{{$student->id}}/edit" class="btn btn-warning">Edit Profile</a></div>
								</div>
								<!-- END PROFILE DETAIL -->
							</div>
							<!-- END LEFT COLUMN -->
							<!-- RIGHT COLUMN -->
							<div class="profile-right">
								<!-- Button insert subject modal -->
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
								Insert Subject
								</button>
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Subjects</h3>
								</div>
								<div class="panel-body">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>Code</th>
												<th>Name</th>
												<th>Semester</th>
												<th>Value</th>
												<th>Teacher</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											@foreach($student->subject as $subject)
											<tr>
												<td>{{$subject->code}}</td>
												<td>{{$subject->name}}</td>
												<td>{{$subject->semester}}</td>
												<td><a href="#" class="value" data-type="text" data-pk="{{$subject->id}}" data-url="/api/student/{{$student->id}}/editvalue" data-title="Enter Value">{{$subject->pivot->value}}</a></td>
												<td><a href="/teacher/{{$subject->teacher_id}}/profileteac">{{$subject->teacher->name}}</a></td>
												<td><a href="/student/{{$student->id}}/{{$subject->id}}/deletevalue" class="btn btn-danger btn-sm" onclick="return confirm('are you want delete this file?')">Delete</a></td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
							<div class="panel">
								<div id="chartValue"></div>
							</div>
							</div>
							<!-- END RIGHT COLUMN -->
						</div>
					</div>
				</div>
			</div>
        </div>

<!-- Insert subject Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Insert Subject</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    	<form action="/student/{{$student->id}}/addvalue" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
			<div class="form-group">
				<label for="subject">Subjects</label>
				<select class="form-control" id="subject" name="subject">
					@foreach($subjects as $sub)
						<option value="{{$sub->id}}">{{$sub->name}}</option>
					@endforeach
				</select>
			</div>

            <div class="form-group">
                <label for="exampleInputEmail1">Value</label>
                <input name="value" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Value" value="{{ old('value')}}">
            </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save</button>
		</form>
      </div>
    </div>
  </div>
</div>
@stop

@section('footer')
<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
	Highcharts.chart('chartValue', {
		chart: {
			type: 'column'
		},
		title: {
			text: 'Student Values Report'
		},
		xAxis: {
			categories: {!!json_encode($categories)!!},
			crosshair: true
		},
		yAxis: {
			min: 0,
			title: {
				text: 'Values'
			}
		},
		tooltip: {
			headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
			footerFormat: '</table>',
			shared: true,
			useHTML: true
		},
		plotOptions: {
			column: {
				pointPadding: 0.2,
				borderWidth: 0
			}
		},
		series: [{
			name: 'Values',
			data: {!!json_encode($data)!!}
		}]
	});

	$(document).ready(function() {
		$('.grade').editable();
	});
</script>
@stop