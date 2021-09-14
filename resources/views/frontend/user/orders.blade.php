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
		<div class="bg-light">
			<table class="table table-bordered">
				<tr>
					<th>
						Order Number
					</th>
					<th>
						Date
					</th>
					<th>
						Status
					</th>
					<th>
						Total
					</th>
					<th>
						Actions
					</th>
				</tr>

				<tr>
					<td>
						#22112
					</td>
					<td>
						22-08-2021
					</td>
					<td>
						Pending
					</td>
					<td>
						200 Pkr
					</td>
					<td>
						<button class="btn btn-primary">Pay</button>
					</td>
				</tr>
				<tr>
					<td>
						#22112
					</td>
					<td>
						22-08-2021
					</td>
					<td>
						Pending
					</td>
					<td>
						200 Pkr
					</td>
					<td>
						<button class="btn btn-primary">Pay</button>
					</td>
				</tr>
				<tr>
					<td>
						#22112
					</td>
					<td>
						22-08-2021
					</td>
					<td>
						Pending
					</td>
					<td>
						200 Pkr
					</td>
					<td>
						<button class="btn btn-primary">Pay</button>
					</td>
				</tr>
				<tr>
					<td>
						#22112
					</td>
					<td>
						22-08-2021
					</td>
					<td>
						Pending
					</td>
					<td>
						200 Pkr
					</td>
					<td>
						<button class="btn btn-primary">Pay</button>
					</td>
				</tr>
				<tr>
					<td>
						#22112
					</td>
					<td>
						22-08-2021
					</td>
					<td>
						Pending
					</td>
					<td>
						200 Pkr
					</td>
					<td>
						<button class="btn btn-primary">Pay</button>
					</td>
				</tr>
			</table>
			
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
	 document.getElementById("orders").classList.add('active');
</script>

@endsection