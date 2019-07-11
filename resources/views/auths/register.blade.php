@extends('layouts.frontend')

@section('content')
    <section class="banner-area relative about-banner" id="home">	
			<div class="overlay overlay-bg"></div>
			<div class="container">				
				<div class="row d-flex align-items-center justify-content-center">
					<div class="about-content col-lg-12">
						<h1 class="text-white">
							Sign Up				
						</h1>	
						<p class="text-white link-nav"><a href="/">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="about.html"> Sign Up</a></p>
					</div>	
				</div>
			</div>
    </section>
    
    <section class="course-mission-area pb-120">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-70 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">Goals to Achieve for the leadership</h1>
								<p>Who are in extremely love with eco friendly system.</p>
							</div>
						</div>
					</div>							
                    <div class="row">
                        <div class="col-md-6 accordion-left">

                            <!-- accordion 2 start-->
                            <dl class="accordion">
                                <dt>
                                    <a href="" class="active">Success</a>
                                </dt>
                                <dd style="display: block;">
                                    Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut scelerisque mattis, leo quam aliquet diam, congue laoreet elit metus eget diam. Proin ac metus diam.
                                </dd>
                                <dt>
                                    <a href="">Info</a>
                                </dt>
                                <dd style="display: none;">
                                    Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis. leo quam aliquet diam, congue laoreet elit metus eget diam.
                                </dd>
                                <dt>
                                    <a href="">Danger</a>
                                </dt>
                                <dd style="display: none;">
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit. Pellentesque aliquet nibh nec urna. Proin ac metus diam.
                                </dd>
                                <dt>
                                    <a href="">Warning</a>
                                </dt>
                                <dd style="display: none;">
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit. Pellentesque aliquet nibh nec urna. Proin ac metus diam.
                                </dd>                                    
                            </dl>
                            <!-- accordion 2 end-->
                        </div>
                        <div class="col-md-6 video-right justify-content-center align-items-center d-flex relative">
                        	<div class="overlay overlay-bg"></div>
							<a class="play-btn" href="https://www.youtube.com/watch?v=ARA0AxrnHdM"><img class="img-fluid mx-auto" src="{{asset('/frontend')}}/img/play.png" alt=""></a>
                        </div>
                    </div>
				</div>	
			</section>

    <section class="search-course-area relative">
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row justify-content-between align-items-center">
						<div class="col-lg-5 col-md-6 search-course-left">
							<h1 class="text-white">
								Get reduced fee <br>
								during this Summer!
							</h1>
							<p>
								inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially in the workplace. That’s why it’s crucial that, as women, our behavior on the job is beyond reproach.
							</p>
							<div class="row details-content">
								<div class="col single-detials">
									<span class="lnr lnr-graduation-hat"></span>
									<a href="#"><h4>Expert Instructors</h4></a>		
									<p>
										Usage of the Internet is becoming more common due to rapid advancement of technology and power.
									</p>						
								</div>
								<div class="col single-detials">
									<span class="lnr lnr-license"></span>
									<a href="#"><h4>Certification</h4></a>		
									<p>
										Usage of the Internet is becoming more common due to rapid advancement of technology and power.
									</p>						
								</div>								
							</div>
						</div>
						<div class="col-lg-7 col-md-6 search-course-right section-gap">
							{!! Form::open(['url' => '/store', 'class' => 'form-wrap'])!!}
                                <h4 class="text-white pb-20 text-center mb-30">Sign Up</h4>
                                {!! Form::text('nama_depan', '',['class' => 'form-control', 'placeholder' => 'Nama Depan'])!!}		
                                {!! Form::text('nama_belakang', '',['class' => 'form-control', 'placeholder' => 'Nama Belakang'])!!}
                                {!! Form::email('email', '',['class' => 'form-control', 'placeholder' => 'Email'])!!}
                                {!! Form::password('password',['class' => 'form-control', 'placeholder' => 'Password'])!!}
                                {!! Form::text('agama', '',['class' => 'form-control', 'placeholder' => 'Agama'])!!}
                                {!! Form::textarea('alamat', '',['class' => 'form-control', 'placeholder' => 'Alamat'])!!}

                                <div class="form-select" id="service-select">
                                {!! Form::select('jenis_kelamin', ['' => 'Gender', 'Laki-laki' => 'Laki-laki', 'Perempuan' => 'Perempuan'],['class' => 'form-select'])!!};
                                </div>

								<input type="submit" class="primary-btn text-uppercase" value="Submit">
							{!! Form::close()!!}
						</div>
					</div>
				</div>	
			</section>
@stop