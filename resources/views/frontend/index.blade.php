@extends('frontend.layouts.master')


@section('title')
- Home
@endsection

@section('styles')
    <link href="{{ asset('frontend/css/home_1.css') }}" rel="stylesheet">

@endsection
@section('content')
	<main>
		<div id="carousel-home">
			<div class="owl-carousel owl-theme">
				<!--/owl-slide-->
				@if(count($banners)>0)
				@foreach($banners as $banner)
				<div class="owl-slide cover" style="background-image: url({{ $banner->photo }} )">
					<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(255, 255, 255, 0.5)">
						<div class="container">
							<div class="row justify-content-center justify-content-md-start">
								<div class="col-lg-12 static">
									<div class="slide-text text-center black">
										<h2 class="owl-slide-animated owl-slide-title">{!! $banner->title  !!}</h2>
										<p class="owl-slide-animated owl-slide-subtitle">
											{!!$banner->description !!}
										</p>
										<div class="owl-slide-animated owl-slide-cta"><a class="btn_1" href="#" role="button">Shop Now</a></div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<!--/owl-slide-->
				</div>
				@endforeach
					@endif
			</div>
			<div id="icon_drag_mobile"></div>
		</div>
		<!--/carousel-->

		<ul id="banners_grid" class="clearfix">
			@if(count($categories)>0)
			@foreach($categories as $category)
			<li>
				<a href="{{ route('product.category',$category->slug)}}" class="img_container">
					<img src="{{ $category->photo }}" alt="" class="lazy">
					<div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
						<h3>{{ $category->title }}</h3>
						<div><span  class="btn_1">Shop Now</span></div>
					</div>
				</a>
			</li>
			@endforeach
			@endif
			
		</ul>
		<!--/banners_grid -->
		@php
			$top_products=\App\Models\Product::where(['status'=>'active','conditions'=>'popular'])->orderBy('id','DESC')->limit('8')->get();
			@endphp
			@if(count($top_products)>0)
		<div class="container margin_60_35">
			<div class="main_title">
				<h2>Top Selling</h2>
				<span>Products</span>
				<p>Here Are the Top Selling Products from Dshop</p>
			</div>
			

			<div class="row small-gutters">
				@foreach($top_products as $product)
				@php
					$photo=explode(',',$product->photo);
				@endphp
				<div class="col-6 col-md-4 col-xl-3">
					<div class="grid_item">
						<figure>
							@if($product->discount>0)
							<span class="ribbon off">-{{ $product->discount}}%</span>
							@endif
							<a href="{{route('product.detail',$product->slug)}}">
								<img class="img-fluid lazy" src="{{ $photo[0] }}" data-src="{{ $photo[0] }}" alt="">
								@if(isset($photo[1]))
								<img class="img-fluid lazy" src="{{ $photo[1] }}" data-src="{{ $photo[1] }}" alt="">
							    @endif
							</a>
							
						</figure>
						<div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
						<a href="{{route('product.detail',$product->slug)}}">
							<h3>{{$product->title}}</h3>
						</a>
						<div class="price_box">
							
							<span class="new_price">{{ number_format($product->offer_price,2)}} PKR</span>
							
							@if($product->discount>0)
							<span class="old_price">{{ number_format($product->price,2)}} PKR</span>
							@endif
						</div>
						<ul>
							<li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
							<li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
							<li><a href="#" class="tooltip-1 add_to_cart" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to cart" id="add_to_cart{{ $product->id}}" data-quantity="1" data-product-id="{{ $product->id}}"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
						</ul>
					</div>
					<!-- /grid_item -->
				</div>
				@endforeach
				<!-- /col -->
			</div>
			<!-- /row -->
		</div>
		@endif
		<!-- /container -->

		<div class="featured lazy" data-bg="url(img/featured_home.jpg)">
			<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
				<div class="container margin_60">
					<div class="row justify-content-center justify-content-md-start">
						<div class="col-lg-6 wow" data-wow-offset="150">
							<h3>Armor<br>Air Color 720</h3>
							<p>Lightweight cushioning and durable support with a Phylon midsole</p>
							<div class="feat_text_block">
								<div class="price_box">
									<span class="new_price">$90.00</span>
									<span class="old_price">$170.00</span>
								</div>
								<a class="btn_1" href="listing-grid-1-full.html" role="button">Shop Now</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /featured -->
		@php
			$new_products=\App\Models\Product::where(['status'=>'active','conditions'=>'new'])->orderBy('id','DESC')->limit('8')->get();

		@endphp
		
		<div class="container margin_60_35">
			<div class="main_title">
				<h2>New</h2>
				<span>Products</span>
				<p>Look at the newest collections</p>
			</div>
			<div class="owl-carousel owl-theme products_carousel">
		@if(count($new_products)>0)
		@foreach($new_products as $new_product)
		@php
		$photo=explode(',',$new_product->photo);
		@endphp
				<div class="item">
					<div class="grid_item">
						<span class="ribbon new">{{$new_product->conditions}}</span>
						<figure>
							<a href="{{route('product.detail',$new_product->slug)}}">
								<img class="owl-lazy" src="{{$photo[0]}}" data-src="{{$photo[0]}}" alt="">
							</a>
						</figure>
						<div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
						<a href="product-detail-1.html">
							<h3>{!!$new_product->title!!}</h3>
						</a>
						<div class="price_box">
							<span class="new_price">{{number_format($new_product->offer_price,2)}} PKR</span>
						</div>
						<ul>
							<li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
							<li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
							<li><a href="#" class="tooltip-1 add_to_cart" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to cart" id="add_to_cart{{ $product->id}}" data-quantity="1" data-product-id="{{ $product->id}}"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
						</ul>
					</div>
					<!-- /grid_item -->
				</div>

		@endforeach
		@endif
			</div>
			<!-- /products_carousel -->
		</div>
		<!-- /container -->
		
		<div class="bg_gray">
			<div class="container margin_30">
				<div id="brands" class="owl-carousel owl-theme">
					<div class="item">
						<a href="#0"><img src="img/brands/placeholder_brands.png" data-src="img/brands/logo_1.png" alt="" class="owl-lazy"></a>
					</div><!-- /item -->
					<div class="item">
						<a href="#0"><img src="img/brands/placeholder_brands.png" data-src="img/brands/logo_2.png" alt="" class="owl-lazy"></a>
					</div><!-- /item -->
					<div class="item">
						<a href="#0"><img src="img/brands/placeholder_brands.png" data-src="img/brands/logo_3.png" alt="" class="owl-lazy"></a>
					</div><!-- /item -->
					<div class="item">
						<a href="#0"><img src="img/brands/placeholder_brands.png" data-src="img/brands/logo_4.png" alt="" class="owl-lazy"></a>
					</div><!-- /item -->
					<div class="item">
						<a href="#0"><img src="img/brands/placeholder_brands.png" data-src="img/brands/logo_5.png" alt="" class="owl-lazy"></a>
					</div><!-- /item -->
					<div class="item">
						<a href="#0"><img src="img/brands/placeholder_brands.png" data-src="img/brands/logo_6.png" alt="" class="owl-lazy"></a>
					</div><!-- /item --> 
				</div><!-- /carousel -->
			</div><!-- /container -->
		</div>
		<!-- /bg_gray -->

		<div class="container margin_60_35">
			<div class="main_title">
				<h2>Latest News</h2>
				<span>Blog</span>
				<p>Cum doctus civibus efficiantur in imperdiet deterruisset</p>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<a class="box_news" href="blog.html">
						<figure>
							<img src="img/blog-thumb-placeholder.jpg" data-src="img/blog-thumb-1.jpg" alt="" width="400" height="266" class="lazy">
							<figcaption><strong>28</strong>Dec</figcaption>
						</figure>
						<ul>
							<li>by Mark Twain</li>
							<li>20.11.2017</li>
						</ul>
						<h4>Pri oportere scribentur eu</h4>
						<p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse ullum vidisse....</p>
					</a>
				</div>
				<!-- /box_news -->
				<div class="col-lg-6">
					<a class="box_news" href="blog.html">
						<figure>
							<img src="img/blog-thumb-placeholder.jpg" data-src="img/blog-thumb-2.jpg" alt="" width="400" height="266" class="lazy">
							<figcaption><strong>28</strong>Dec</figcaption>
						</figure>
						<ul>
							<li>By Jhon Doe</li>
							<li>20.11.2017</li>
						</ul>
						<h4>Duo eius postea suscipit ad</h4>
						<p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse ullum vidisse....</p>
					</a>
				</div>
				<!-- /box_news -->
				<div class="col-lg-6">
					<a class="box_news" href="blog.html">
						<figure>
							<img src="img/blog-thumb-placeholder.jpg" data-src="img/blog-thumb-3.jpg" alt="" width="400" height="266" class="lazy">
							<figcaption><strong>28</strong>Dec</figcaption>
						</figure>
						<ul>
							<li>By Luca Robinson</li>
							<li>20.11.2017</li>
						</ul>
						<h4>Elitr mandamus cu has</h4>
						<p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse ullum vidisse....</p>
					</a>
				</div>
				<!-- /box_news -->
				<div class="col-lg-6">
					<a class="box_news" href="blog.html">
						<figure>
							<img src="img/blog-thumb-placeholder.jpg" data-src="img/blog-thumb-4.jpg" alt="" width="400" height="266" class="lazy">
							<figcaption><strong>28</strong>Dec</figcaption>
						</figure>
						<ul>
							<li>By Paula Rodrigez</li>
							<li>20.11.2017</li>
						</ul>
						<h4>Id est adhuc ignota delenit</h4>
						<p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse ullum vidisse....</p>
					</a>
				</div>
				<!-- /box_news -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</main>
@endsection

@section('scripts')
	<script src="{{ asset('frontend/js/carousel-home.min.js') }}"></script>
	<script>
		$(document).on('click','.add_to_cart',function(e){
			e.preventDefault();
			var product_id=$(this).data('product-id');
			var product_quantity=$(this).data('quantity');
			var token="{{ csrf_token()}}";
			var path= "{{route('cart.store') }}";
			$.ajax({
				url:path,
				type:"POST",
				dataType:"JSON",
				data:{
					product_id:product_id,
					product_quantity:product_quantity,
					_token:token,
				},
				beforeSend:function(){
					$('#add_to_cart'+product_id).html('<i class="fa fa-spinner fa-spin"></i> Loading...');
				},
				complete:function(){
					$('#add_to_cart'+product_id).html('<i class="fa fa-cart-plus"></i> Add To Cart');
				},
				success:function(data){
					console.log(data);
					if(data['status']){
						$('body #header-ajax').html(data['header']);
						swal({
							  title: "Good job!",
							  text: data['message'],
							  icon: "success",
							  button: "OK!",
							});

					}
				},
				error:function(err)
				{
					console.log(err);
				}
	
			});
			
		});
	</script>
	


@endsection