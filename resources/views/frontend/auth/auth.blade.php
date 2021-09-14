@extends('frontend.layouts.master')


@section('title')
- Login or Register
@endsection

@section('styles')
    	<!-- SPECIFIC CSS -->
     <link href="{{ asset('frontend/css/account.css') }}" rel="stylesheet">
    <!-- YOUR CUSTOM CSS -->
    <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet">


@endsection
@section('content')
	

   


	<main class="bg_gray">
		
	<div class="container margin_30">
		<div class="page_header">
			<div class="breadcrumbs">
				<ul>
					<li><a href="#">Home</a></li>
					<li>Login or Register</li>
				</ul>
		</div>
		<h1>Sign In or Create an Account</h1>
	</div>
	<!-- /page_header -->
			<div class="row justify-content-center">
			<div class="col-xl-6 col-lg-6 col-md-8">
				<div class="box_account">
					<h3 class="client">Already Client</h3>
					<div class="form_container">
						<div class="row no-gutters">
							<div class="col-lg-6 pr-lg-1">
								<a href="#0" class="social_bt facebook">Login with Facebook</a>
							</div>
							<div class="col-lg-6 pl-lg-1">
								<a href="#0" class="social_bt google">Login with Google</a>
							</div>
						</div>
						<div class="divider"><span>Or</span></div>
						<form method="POST" action="{{route('login.submit') }}">
							@csrf
						<div class="form-group">
							
							<input type="email" class="form-control" name="email" id="email" placeholder="Email*" value="{{old('email')}}">
							@error('email')
							<div class="alert alert-danger">
								{{$message}}
							</div>
														
							@enderror
							
						</div>
						<div class="form-group">
							
							<input type="password" class="form-control" name="password" id="password_in" value="" placeholder="Password*"  value="{{old('password')}}">
							@error('password')
							<div class="alert alert-danger" >
								{{$message}}
							</div>
														
							@enderror
						</div>
						<div class="clearfix add_bottom_15">
							<div class="checkboxes float-start">
								<label class="container_check">Remember me
									<input type="checkbox">
									<span class="checkmark"></span>
								</label>
							</div>
							<div class="float-end"><a id="forgot" href="javascript:void(0);">Lost Password?</a></div>
						</div>
						<div class="text-center"><input type="submit" value="Log In" class="btn_1 full-width"></div>
						</form>
						<div id="forgot_pw">
							<div class="form-group">
								<input type="email" class="form-control" name="email_forgot" id="email_forgot" placeholder="Type your email">
							</div>
							<p>A new password will be sent shortly.</p>
							<div class="text-center"><input type="submit" value="Reset Password" class="btn_1"></div>
						</div>
					</div>
					<!-- /form_container -->
				</div>
				<!-- /box_account -->
				
			</div>
			<div class="col-xl-6 col-lg-6 col-md-8">
				<div class="box_account">
					<h3 class="new_client">New Client</h3> <small class="float-right pt-2">* Required Fields</small>
					<form method="POST" action="{{ route('register.submit')}}">
						{{ csrf_field()}}
					<div class="form_container">
						<div class="form-group">
							<input type="email" class="form-control"  value="{{old('email')}}" name="email" id="email_2" placeholder="Email*">
							@error('email')
							<div class="alert alert-danger">
								{{$message}}
							</div>
														
							@enderror
						</div>
						<div class="form-group">
							<input type="password" class="form-control" name="password" id="password_in_2"  value="{{old('password')}}" value="" placeholder="Password*">
							@error('password')
							<div class="alert alert-dangerr">
								{{$message}}
							</div>
														
							@enderror
						</div>
						<hr>
						<div class="form-group">
							<input type="password"  value="{{old('confirmed')}}" class="form-control" name="password_confirmation" id="password_in_2" value="" placeholder="Confirm Password*">
						</div>
						<hr>
						
						<div class="private box">
							<div class="row no-gutters">
								<div class="col-6 pr-1">
									<div class="form-group">
										<input type="text" class="form-control" name="full_name"  value="{{old('full_name')}}" placeholder="Full Name*">
									</div>
									@error('full_name')
									<div class="alert alert-danger">
										{{$message}}
									</div>
														
							@enderror
								</div>
								<div class="col-6 pl-1">
									<div class="form-group">
										<input type="text" name="username" class="form-control"  value="{{old('username')}}" placeholder="User Name*">
									</div>
									@error('username')
							<div class="alert alert-danger">
								{{$message}}
							</div>
														
							@enderror
								</div>
								<div class="col-12">
									<div class="form-group">
										<input type="text" class="form-control" name="address"placeholder="Full Address*">
									</div>
								</div>
							</div>
							<!-- /row -->
							
							<div class="row no-gutters">
								
								<div class="col-12 pl-1">
									<div class="form-group">
										<input type="text"  value="{{old('phone')}}" name="phone" class="form-control" placeholder="Telephone *">
									</div>
								</div>
							</div>
							<!-- /row -->
							
						</div>
						<!-- /private -->
						
						<hr>
						<div class="form-group">
							<label class="container_check">Accept <a href="#0">Terms and conditions</a>
								<input type="checkbox">
								<span class="checkmark"></span>
							</label>
						</div>
						<div class="text-center"><input type="submit" value="Register" class="btn_1 full-width"></div>
					</form>
					</div>
					<!-- /form_container -->
				</div>
				<!-- /box_account -->
			</div>
		</div>
		<!-- /row -->
		</div>
		<!-- /container -->
	</main>
	<!--/main-->
@endsection
@section('scripts')
	 <script>
    	// Client type Panel
		$('input[name="client_type"]').on("click", function() {
		    var inputValue = $(this).attr("value");
		    var targetBox = $("." + inputValue);
		    $(".box").not(targetBox).hide();
		    $(targetBox).show();
		});
	</script>
@endsection
