@extends('layouts.master')

@section('content')
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Best Student Ranking</h3>
                            </div>
                            <div class="panel-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Ranking</th>
                                            <th>Name</th>
                                            <th>Value</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $ranking = 1;
                                    @endphp
                                    @foreach(ranking5Besar() as $st)
                                        <tr>
                                            <td>{{$ranking}}</td>
                                            <td>{{$st->nama_lengkap()}}</td>
                                            <td>{{$st->average}}</td>
                                        </tr>
                                    @php
                                        $ranking ++;
                                    @endphp
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
						<div class="metric">
							<span class="icon"><i class="fa fa-user"></i></span>
								<p>
								    <span class="number">{{totalStudent()}}</span>
									<span class="title">Total Student</span>
								</p>
						</div>
					</div>

                    <div class="col-md-3">
						<div class="metric">
							<span class="icon"><i class="fa fa-user"></i></span>
								<p>
								    <span class="number">{{totalTeacher()}}</span>
									<span class="title">Total Teacher</span>
								</p>
						</div>
					</div>
                </div>
            </div>
        </div>
    </div>    
@stop