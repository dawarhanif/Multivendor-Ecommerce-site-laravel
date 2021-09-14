@extends('frontend.layouts.master')


@section('title')
- Page not Found
@endsection

@section('styles')

    <!-- SPECIFIC CSS -->
    <link href="{{ asset('frontend/css/error_track.css') }}" rel="stylesheet">
@endsection
@section('content')

	

	<main class="bg_gray">
		<div id="error_page">
			<div class="container">
				<div class="row justify-content-center text-center">
					<div class="col-xl-7 col-lg-9">
						<img src="{{ asset('frontend/img/404.svg') }}" alt="" class="img-fluid" width="400" height="212">
						<p>The page you're looking for was not found!!</p>
						<form>
							<div class="search_bar">
								<input type="text" class="form-control" placeholder="What are you looking for?">
								<input type="submit" value="Search">
							</div>
						</form>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /error_page -->
	</main>
	<!--/main-->
	
@endsection
