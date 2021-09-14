@extends('frontend.layouts.master')


@section('title')
- Profile: {{$user->full_name}}
@endsection

@section('styles')

    <!-- SPECIFIC CSS -->
    <link href="{{ asset('frontend/css/checkout.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/home_1.css') }}" rel="stylesheet">
@endsection
@section('content')
	

	
	<main class="bg_gray">
	<div class="container mt-5 mb-5">
		<div class="row">

		@include('frontend.user.sidebar')
		<div class="col-9">
		<div class="bg-light border">
			 @if(session('success'))
		       <div class="alert alert-success alert-dismissible fade show" role="alert" id="alert">
		        {{ session('success') }}
		           </div>
		       @elseif(session('error'))
		       <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alert">
		          {{ session('error') }}
		       </div>
		      @endif
			<form class="form m-3" method="POST" action="{{ route('account.update',$user->id)}}">
				@csrf
				<div class="row">
					<div class="form-group col-6">
						<label>
							Full Name:
						</label>
						<input type="text" name="full_name" class="form-control" value="{{ $user->full_name}}">

						@error('full_name')
							<p class="text-danger">{{ $message }}</p>
						@enderror
					</div>
					<div class="form-group col-6">
						<label>
							User Name:
						</label>
						<input type="text" name="username" class="form-control" value="{{ $user->username}}">
						@error('username')
							<p class="text-danger">{{ $message }}</p>
						@enderror
					</div>
				</div>
				<div class="row">
					<div class="form-group col-6">
						<label>
							Phone number:
						</label>
						<input type="text" name="phone" class="form-control" value="{{ $user->phone}}">
						@error('phone')
							<p class="text-danger">{{ $message }}</p>
						@enderror
					</div>
					<div class="form-group col-6">
						<label>
							Email Address:
						</label>
						<input type="email" name="email" class="form-control" value="{{ $user->email}}" disabled>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-6">
						<label>
							Current Password (Leave blank to leave unchanged):
						</label>
						<input type="password" name="oldpassword" id="currentpassword" class="form-control">
						@error('oldpassword')
							<p class="text-danger">{{ $message }}</p>
						@enderror
					</div>
					<div class="form-group col-6">
						<label>
							New Password (Leave blank to leave unchanged):

						</label>
						<input type="password" name="newpassword" class="form-control" id="newpassword">
						@error('newpassword')
							<p class="text-danger">{{ $message }}</p>
						@enderror
					</div>
				</div>
				<div class="d-grid gap-2">
					<input type="submit" value="Change Details" class="btn btn-outline-primary btn-block">
				</div>
			</form>
			
		</div>
		</div>
		</div>
	</div>
	

	</main>
	<!--/main-->
	
    
@endsection
@section('modals')




<div class="top_panel" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="container header_panel">
	        <a href="#0" class="btn_close_top_panel"><i class="ti-close"></i></a>
	       <p><strong> Are You sure you are leaving?</strong></p>
	        <a class="btn_1" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
	    </div>
  </div>

  
@endsection

@section('scripts')
 <script>
   setTimeout(function(){
    $('#alert').slideUp();

  }, 4000);
 
 </script>
	<script>
    	// Other address Panel
		$('#other_addr input').on("change", function (){
	        if(this.checked)
	            $('#other_addr_c').fadeIn('fast');
	        else
	            $('#other_addr_c').fadeOut('fast');
	    });
	</script>
<script>
	 document.getElementById("accountdetails").classList.add('active');
</script>

@endsection