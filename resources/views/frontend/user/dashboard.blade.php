@extends('frontend.layouts.master')


@section('title')
- Profile: {{$user->full_name}}
@endsection

@section('styles')

    <!-- SPECIFIC CSS -->
    <link href="{{ asset('frontend/css/checkout.css') }}" rel="stylesheet">
@endsection
@section('content')
	

	
	<main class="bg_gray">
	<div class="container mt-5 mb-5">
		<div class="row">

		@include('frontend.user.sidebar')
		<div class="col-9">
		<div class="card text-center">
			  <div class="card-header">
			  	Hello, 
			    <strong>
			    	{{$user->full_name}}
			    </strong>
			  </div>
			  <div class="card-body">
			    <h5 >Your Address is:</h5>
			    <p class="card-text">{{ $user->address}}</p>
			    <a href="{{ route('user.addresses')}}" class="btn btn-primary">Edit Address</a>
			    <h5 >Your Email is:</h5>
			    <p class="card-text">{{ $user->email}}</p>
			    <h5 >Your Account Details are:</h5>
			    <p class="card-text"><strong>Username: </strong>{{ $user->username}}</p>
			    <p class="card-text"><strong>Full name: </strong>{{ $user->full_name}}</p>

			    <a href="{{ route('user.account')}}" class="btn btn-primary">Edit Account Details</a>
			  </div>
			  <div class="card-footer text-muted">
			    Dashboard
			  </div>
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
    	// Other address Panel
		$('#other_addr input').on("change", function (){
	        if(this.checked)
	            $('#other_addr_c').fadeIn('fast');
	        else
	            $('#other_addr_c').fadeOut('fast');
	    });
	</script>
<script>
	 document.getElementById("dashboard").classList.add('active');
</script>

@endsection