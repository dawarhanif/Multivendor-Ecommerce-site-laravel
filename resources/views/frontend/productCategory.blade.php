@extends('frontend.layouts.master')


@section('title')
- {{ $category->title}}
@endsection

@section('styles')
    <link href="{{ asset('frontend/css/listing.css') }}" rel="stylesheet">

@endsection
@section('content')

	<main>
		<div class="top_banner">
			<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.3)">
				<div class="container">
					<div class="breadcrumbs">
						<ul>
							<li><a href="#">Home</a></li>
							<li><a href="#">Category</a></li>
							<li>{{ $category->title }}</li>
						</ul>
					</div>
					<h1>{{ $category->title }}</h1>
				</div>
			</div>
			<img src="{{ $category->photo }}" class="img-fluid" alt="">
		</div>
		<!-- /top_banner -->
		
			<div id="stick_here"></div>		
			<div class="toolbox elemento_stick">
				<div class="container">
				<ul class="clearfix">
					<li>
						<div class="sort_select">
							<select name="sortBy" id="sortBy">
                                    <option selected="selected">Default Sort</option>
                                    <option value="price" >Sort by Price - Low to high</option>
                                    <option value="price-desc"  >Sort by Price - High to Low</option>
                                    <option value="nameAsc" >Sort by Name - Ascending</option>
                                    <option value="nameDsc">Sort by Name - Descending</option>
                                    <option value="discAsc" >Sort by Discount - Ascending</option>
                                    <option value="discDsc" >Sort by Discount - Descending</option> 
							</select>
						</div>
					</li>
					<li>
						<a href="#0"><i class="ti-view-grid"></i></a>
						<a href="#"><i class="ti-view-list"></i></a>
					</li>
					<li>
						<a data-bs-toggle="collapse" href="#filters" role="button" aria-expanded="false" aria-controls="filters">
							<i class="ti-filter"></i><span>Filters</span>
						</a>
					</li>
				</ul>
				<div class="collapse" id="filters"><div class="row small-gutters filters_listing_1">
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="dropdown">
						<a href="#" data-bs-toggle="dropdown" class="drop">Categories</a>
						<div class="dropdown-menu">
							<div class="filter_type">
									<ul>
										<li>
											<label class="container_check">Men <small>12</small>
											  <input type="checkbox">
											  <span class="checkmark"></span>
											</label>
										</li>
										<li>
											<label class="container_check">Women <small>24</small>
											  <input type="checkbox">
											  <span class="checkmark"></span>
											</label>
										</li>
										<li>
											<label class="container_check">Running <small>23</small>
											  <input type="checkbox">
											  <span class="checkmark"></span>
											</label>
										</li>
										<li>
											<label class="container_check">Training <small>11</small>
											  <input type="checkbox">
											  <span class="checkmark"></span>
											</label>
										</li>
									</ul>
									<a href="#0" class="apply_filter">Apply</a>
								</div>
						</div>
					</div>
					<!-- /dropdown -->
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="dropdown">
						<a href="#" data-bs-toggle="dropdown" class="drop">Color</a>
						<div class="dropdown-menu">
							<div class="filter_type">
									<ul>
										<li>
											<label class="container_check">Blue <small>06</small>
											  <input type="checkbox">
											  <span class="checkmark"></span>
											</label>
										</li>
										<li>
											<label class="container_check">Red <small>12</small>
											  <input type="checkbox">
											  <span class="checkmark"></span>
											</label>
										</li>
										<li>
											<label class="container_check">Orange <small>17</small>
											  <input type="checkbox">
											  <span class="checkmark"></span>
											</label>
										</li>
										<li>
											<label class="container_check">Black <small>43</small>
											  <input type="checkbox">
											  <span class="checkmark"></span>
											</label>
										</li>
									</ul>
									<a href="#0" class="apply_filter">Apply</a>
								</div>
						</div>
					</div>
					<!-- /dropdown -->
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="dropdown">
						<a href="#" data-bs-toggle="dropdown" class="drop">Brand</a>
						<div class="dropdown-menu">
							<div class="filter_type">
									<ul>
										<li>
											<label class="container_check">Adidas <small>11</small>
											  <input type="checkbox">
											  <span class="checkmark"></span>
											</label>
										</li>
										<li>
											<label class="container_check">Nike <small>08</small>
											  <input type="checkbox">
											  <span class="checkmark"></span>
											</label>
										</li>
										<li>
											<label class="container_check">Vans <small>05</small>
											  <input type="checkbox">
											  <span class="checkmark"></span>
											</label>
										</li>
										<li>
											<label class="container_check">Puma <small>18</small>
											  <input type="checkbox">
											  <span class="checkmark"></span>
											</label>
										</li>
									</ul>
									<a href="#0" class="apply_filter">Apply</a>
								</div>
						</div>
					</div>
					<!-- /dropdown -->
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="dropdown">
						<a href="#" data-bs-toggle="dropdown" class="drop">Price</a>
						<div class="dropdown-menu">
							<div class="filter_type">
									<ul>
										<li>
											<label class="container_check">$0 — $50<small>11</small>
											  <input type="checkbox">
											  <span class="checkmark"></span>
											</label>
										</li>
										<li>
											<label class="container_check">$50 — $100<small>08</small>
											  <input type="checkbox">
											  <span class="checkmark"></span>
											</label>
										</li>
										<li>
											<label class="container_check">$100 — $150<small>05</small>
											  <input type="checkbox">
											  <span class="checkmark"></span>
											</label>
										</li>
										<li>
											<label class="container_check">$150 — $200<small>18</small>
											  <input type="checkbox">
											  <span class="checkmark"></span>
											</label>
										</li>
									</ul>
									<a href="#0" class="apply_filter">Apply</a>
								</div>
						</div>
					</div>
					<!-- /dropdown -->
			
				</div></div></div>
				</div>
			</div>
			<!-- /toolbox -->

			<div class="container margin_30">
			<div class="row small-gutters" id="product-data">
				
				@include('frontend.layouts.single_product')
				
				<!-- /col -->
				<div class="ajax-load" style="text-align: center; display: none;">
					<img style="height: auto; max-width: 100%; width:30%;" src="{{ asset('frontend/img/ajux_loader.gif')}}">
				</div>
								
			</div>
			<!-- /row -->

				
			
				
		</div>
		<!-- /container -->
	</main>
	<!-- /main -->
@endsection

@section('scripts')

<!-- SPECIFIC SCRIPTS -->
	<script src="{{ asset('frontend/js/sticky_sidebar.min.js') }}"></script>
	<script src="{{ asset('frontend/js/specific_listing.js') }}"></script>
	<script>
		$('#sortBy').change(function(){
			var sort=$('#sortBy').val();
			window.location = "{{ url(''.$route.'')}}/{{$category->slug}}?sort="+sort;
		});
	</script>
	<script>
		function loadMoreData(page) {
			$.ajax({
				url:'?page='+page,
				type:'get',
				beforeSend:function(){
					$('.ajax-load').show();
				},
				})
				.done(function(data){
					if(data.html=='')
					{
						$('.ajax-load').html('No more Products Available');
						return;
					}
					$('.ajax-load').hide();
					$('#product-data').append(data.html);

				})
				.fail( function(){
					alert("Something went wrong!");
				});
			
		}
		var page=1;

		$(window).scroll( function() {
			if($(window).scrollTop()+$(window).height()+120>=$(document).height()){
				page++;
				loadMoreData(page);
			}
		})
	</script>

@endsection
	
	