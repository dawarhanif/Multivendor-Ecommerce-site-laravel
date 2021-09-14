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
			<div class="row m-3">
				
				<div class="container">
					<h4><strong>Shipping Address: </strong></h4>
					<p>
						

						@if(isset($user->address))
						{!! $user->address !!}
						@else
						<strong>You Have not Added an address, click the Edit button below to add an address</strong>
						@endif
					</p>
					<div class="d-grid gap-2">
					<a href="#" class="btn btn-outline-primary btn-block" 
					data-bs-toggle="modal" data-bs-target="#shippingAddressModal">Edit Shipping Address</a>
			</div>
				</div>
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


	<!--shipping Address Modal -->
	<div class="modal fade" id="shippingAddressModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="staticBackdropLabel">Edit or Add Address</h5>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>
	      <form method="POST" action="{{route('shipping.address',$user->id)}}">
	      		@csrf
	      <div class="modal-body">
	      	
	      	<label>Shipping Address:</label>
	       <textarea name="address" class="form-control" rows="10" style="min-height: 200px;" placeholder="Enter Your Full address Here">{{ $user->address}}</textarea>

	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
	        <input type="submit" class="btn btn-outline-primary" value="Save Changes">
	        </form>
	      </div>
	    </div>
	  </div>
	</div>
	<!--shipping Address Modal -->
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
	 document.getElementById("addresses").classList.add('active');
</script>

@endsection 