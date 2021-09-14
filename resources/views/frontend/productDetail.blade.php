@extends('frontend.layouts.master')


@section('title')
- {{$product->title}}
@endsection

@section('styles')
    	<!-- SPECIFIC CSS -->
    <link href="{{ asset('frontend/css/product_page.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/fontawesome.css" integrity="sha384-eHoocPgXsiuZh+Yy6+7DsKAerLXyJmu2Hadh4QYyt+8v86geixVYwFqUvMU8X90l" crossorigin="anonymous"/>

    <!-- YOUR CUSTOM CSS -->
    <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet">


@endsection
@section('content')
	

		
	<main>
	    <div class="container margin_30">
	       
	        <div class="row">
	            <div class="col-lg-6 magnific-gallery">
	                <p>
	                	@php
						 $photo=explode(',',$product->photo);
						@endphp
						@if(isset($photo[0]))
	                    <a href="{{ $photo[0] }}" title="{{$product->title}}" data-effect="mfp-zoom-in"><img src="{{ $photo[0] }}" alt="" class="img-fluid"></a>
	                    @endif
	                </p>
	                @if(isset($photo[1]))
	                <p>
	                    <a href="{{ $photo[1] }}" title="{{$product->title}}" data-effect="mfp-zoom-in"><img src="{{ $photo[1] }}" data-src="{{ $photo[1] }}" alt="" class="img-fluid lazy"></a>
	                @endif
	                </p>
	                @if(isset($photo[2]))
	                <p>
	                    <a href="{{ $photo[2] }}" title="{{$product->title}}" data-effect="mfp-zoom-in"><img src="{{ $photo[2] }}" data-src="{{ $photo[2] }}" alt="" class="img-fluid lazy"></a>
	                @endif
	                </p>
	                @if(isset($photo[3]))
	                <p>
	                    <a href="{{ $photo[3] }}" title="{{$product->title}}" data-effect="mfp-zoom-in"><img src="{{ $photo[3] }}" data-src="{{ $photo[3] }}" alt="" class="img-fluid lazy"></a>
	                </p>
	                @endif
	            </div>
	            <div class="col-lg-6" id="sidebar_fixed">
	                <div class="breadcrumbs">
	                    <ul>
	                        <li><a href="#">Home</a></li>
	                        @php
	                        $category=\App\Models\Category::where('id',$product->category_id)->first();
	                        @endphp
	                        <li><a href="{{ route('product.category',$category->slug)}}	">{!! $category->title !!}</a></li>
	                        <li>{{$product->title}}</li>
	                    </ul>
	                </div>
	                <!-- /page_header -->
	                <div class="prod_info">
	                    <h1>{{$product->title}}</h1>
	                    <span class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i><em>4 reviews</em></span>
	                    @php
	                        $brand=\App\Models\Brand::where('id',$product->brand_id)->first();
	                        @endphp
	                    <p><small>{{ $brand->title}}</small><br>{!!$product->summary!!}
	                    </p>
	                    <div class="prod_options">
	                        
	                        <div class="row">
	                            <label class="col-xl-5 col-lg-5 col-md-6 col-6"><strong>Size</strong> - Size Guide <a href="#0" data-bs-toggle="modal" data-bs-target="#size-modal"><i class="ti-help-alt"></i></a></label>
	                            <div class="col-xl-4 col-lg-5 col-md-6 col-6">
	                                <div class="custom-select-form">
	                                    <select class="wide">
	                                        <option value="" selected>Small (S)</option>
	                                        <option value="">M</option>
	                                        <option value=" ">L</option>
	                                        <option value=" ">XL</option>
	                                    </select>
	                                </div>
	                            </div>
	                        </div>
	                        <div class="row">
	                            <label class="col-xl-5 col-lg-5  col-md-6 col-6"><strong>Quantity</strong></label>
	                            <div class="col-xl-4 col-lg-5 col-md-6 col-6">
	                                <div class="numbers-row">
	                                    <input type="text" value="1" id="quantity_1" class="qty2" name="quantity_1">
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="row">
	                        <div class="col-lg-5 col-md-6">
	                            <div class="price_main"><span class="new_price">{{number_format($product->offer_price,2)}} PKR</span>
	                            	@if($product->discount>0)
	                            	<span class="percentage">-{{$product->discount}}%</span> <span class="old_price">{{number_format($product->price,2)}}</span>
	                            	@endif
	                            </div>
	                        </div>
	                        <div class="col-lg-4 col-md-6">
	                            <div class="btn_add_to_cart"><a href="#" class="btn_1 add_to_cart" id="add_to_cart{{ $product->id}}" data-quantity="1" data-product-id="{{ $product->id}}">Add to Cart</a></div>
	                        </div>
	                    </div>
	                </div>
	                <!-- /prod_info -->
	                <div class="product_actions">
	                    <ul>
	                        <li>
	                            <a href="#"><i class="ti-heart"></i><span>Add to Wishlist</span></a>
	                        </li>
	                        <li>
	                            <a href="#"><i class="ti-control-shuffle"></i><span>Add to Compare</span></a>
	                        </li>
	                    </ul>
	                </div>
	                <!-- /product_actions -->
	            </div>
	        </div>
	        <!-- /row -->
	    </div>
	    <!-- /container -->
	    
	    <div class="tabs_product">
	        <div class="container">
	            <ul class="nav nav-tabs" role="tablist">
	                <li class="nav-item">
	                    <a id="tab-A" href="#pane-A" class="nav-link active" data-bs-toggle="tab" role="tab">Description</a>
	                </li>
	                <li class="nav-item">
	                    <a id="tab-B" href="#pane-B" class="nav-link" data-bs-toggle="tab" role="tab">Reviews</a>
	                </li>
	            </ul>
	        </div>
	    </div>
	    <!-- /tabs_product -->
	    <div class="tab_content_wrapper">
	        <div class="container">
	            <div class="tab-content" role="tablist">
	                <div id="pane-A" class="card tab-pane fade show active" role="tabpanel" aria-labelledby="tab-A">
	                    <div class="card-header" role="tab" id="heading-A">
	                        <h5 class="mb-0">
	                            <a class="collapsed" data-bs-toggle="collapse" href="#collapse-A" aria-expanded="false" aria-controls="collapse-A">
	                                Description
	                            </a>
	                        </h5>
	                    </div>
	                    <div id="collapse-A" class="collapse" role="tabpanel" aria-labelledby="heading-A">
	                        <div class="card-body">
	                            <div class="row">
	                                <div class="col-md-6">
	                                    <h3>Details</h3>
	                                    <p>{!! $product->description!!}</p>
	                                </div>
	                                <div class="col-md-6">
	                                    <h3>Specifications</h3>
	                                    <div class="table-responsive">
	                                        <table class="table table-sm table-striped">
	                                            <tbody>
	                                                <tr>
	                                                    <td><strong>Color</strong></td>
	                                                    <td>Blue, Purple</td>
	                                                </tr>
	                                                <tr>
	                                                    <td><strong>Size</strong></td>
	                                                    <td>{{$product->size}}</td>
	                                                </tr>
	                                                <tr>
	                                                    <td><strong>In Stock(Remaining)</strong></td>
	                                                    <td>{{$product->stock}}</td>
	                                                </tr>
	                                                <tr>
	                                                	@php
								                        $user=\App\Models\User::where('id',$product->vendor_id)->first();
								                        @endphp
	                                                    <td><strong>Vendor Name</strong></td>
	                                                    <td>{{$user->full_name}}</td>
	                                                </tr>
	                                            </tbody>
	                                        </table>
	                                    </div>
	                                    <!-- /table-responsive -->
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	                <div id="pane-B" class="card tab-pane fade" role="tabpanel" aria-labelledby="tab-B">
	                    <div class="card-header" role="tab" id="heading-B">
	                        <h5 class="mb-0">
	                            <a class="collapsed" data-bs-toggle="collapse" href="#collapse-B" aria-expanded="false" aria-controls="collapse-B">
	                                Reviews
	                            </a>
	                        </h5>
	                    </div>
	                    <div id="collapse-B" class="collapse" role="tabpanel" aria-labelledby="heading-B">
	                        <div class="card-body">
	                            <div class="row justify-content-between">
	                                <div class="col-lg-6">
	                                    <div class="review_content">
	                                        <div class="clearfix add_bottom_10">
	                                            <span class="rating"><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><em>5.0/5.0</em></span>
	                                            <em>Published 54 minutes ago</em>
	                                        </div>
	                                        <h4>"Commpletely satisfied"</h4>
	                                        <p>Eos tollit ancillae ea, lorem consulatu qui ne, eu eros eirmod scaevola sea. Et nec tantas accusamus salutatus, sit commodo veritus te, erat legere fabulas has ut. Rebum laudem cum ea, ius essent fuisset ut. Viderer petentium cu his.</p>
	                                    </div>
	                                </div>
	                                <div class="col-lg-6">
	                                    <div class="review_content">
	                                        <div class="clearfix add_bottom_10">
	                                            <span class="rating"><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star empty"></i><i class="icon-star empty"></i><em>4.0/5.0</em></span>
	                                            <em>Published 1 day ago</em>
	                                        </div>
	                                        <h4>"Always the best"</h4>
	                                        <p>Et nec tantas accusamus salutatus, sit commodo veritus te, erat legere fabulas has ut. Rebum laudem cum ea, ius essent fuisset ut. Viderer petentium cu his.</p>
	                                    </div>
	                                </div>
	                            </div>
	                            <!-- /row -->
	                            <div class="row justify-content-between">
	                                <div class="col-lg-6">
	                                    <div class="review_content">
	                                        <div class="clearfix add_bottom_10">
	                                            <span class="rating"><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star empty"></i><em>4.5/5.0</em></span>
	                                            <em>Published 3 days ago</em>
	                                        </div>
	                                        <h4>"Outstanding"</h4>
	                                        <p>Eos tollit ancillae ea, lorem consulatu qui ne, eu eros eirmod scaevola sea. Et nec tantas accusamus salutatus, sit commodo veritus te, erat legere fabulas has ut. Rebum laudem cum ea, ius essent fuisset ut. Viderer petentium cu his.</p>
	                                    </div>
	                                </div>
	                                <div class="col-lg-6">
	                                    <div class="review_content">
	                                        <div class="clearfix add_bottom_10">
	                                            <span class="rating"><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><em>5.0/5.0</em></span>
	                                            <em>Published 4 days ago</em>
	                                        </div>
	                                        <h4>"Excellent"</h4>
	                                        <p>Sit commodo veritus te, erat legere fabulas has ut. Rebum laudem cum ea, ius essent fuisset ut. Viderer petentium cu his.</p>
	                                    </div>
	                                </div>
	                            </div>
	                            <!-- /row -->
	                            <p class="text-end"><a href="leave-review.html" class="btn_1">Leave a review</a></p>
	                        </div>
	                        <!-- /card-body -->
	                    </div>
	                </div>
	            </div>
	            <!-- /tab-content -->
	        </div>
	    </div>
	    @if(count($product->related_products)>0)

	    <div class="container margin_60_35">
	        <div class="main_title">
	            <h2>Related Products</h2>
	            <span>Products</span>
	            <p>Found what your are looking for? Look for some more products here</p>
	        </div>
	        
	        <div class="owl-carousel owl-theme products_carousel">
	        	@foreach($product->related_products as $related_product)
	        	@if($product->id!=$related_product->id)
	        			@php
						 $related_photo=explode(',',$related_product->photo);
						@endphp
	            <div class="item">
	                <div class="grid_item">
	                    <span class="ribbon {{$related_product->conditions=='new' ?'off':'hot' }}">{{$related_product->conditions}}</span>
	                    <figure>
	                        <a href="{{ route('product.detail',$related_product->slug)}}">
	                            <img class="owl-lazy" src="{{$related_photo[0]}}" data-src="{{$related_photo[0]}}" alt="">
	                        </a>
	                    </figure>
	                    <div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
	                    <a href="{{ route('product.detail',$related_product->slug)}}">
	                        <h3>{{$related_product->title}}</h3>
	                    </a>
	                    <div class="price_box">
	                        <span class="new_price">{{number_format($related_product->offer_price,2)}}</span>
	                    </div>
	                    <ul>
	                        <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
	                        <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
	                        <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
	                    </ul>
	                </div>
	                <!-- /grid_item -->
	            </div>
	            @endif
	            @endforeach
	            <!-- /item -->
	        </div>
	        <!-- /products_carousel -->
	    </div>
	    @endif
	    <!-- /container -->

	    <div class="feat">
			<div class="container">
				<ul>
					<li>
						<div class="box">
							<i class="ti-gift"></i>
							<div class="justify-content-center">
								<h3>Free Shipping</h3>
								<p>For all oders over $99</p>
							</div>
						</div>
					</li>
					<li>
						<div class="box">
							<i class="ti-wallet"></i>
							<div class="justify-content-center">
								<h3>Secure Payment</h3>
								<p>100% secure payment</p>
							</div>
						</div>
					</li>
					<li>
						<div class="box">
							<i class="ti-headphone-alt"></i>
							<div class="justify-content-center">
								<h3>24/7 Support</h3>
								<p>Online top support</p>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
		<!--/feat-->

	</main>
	<!-- /main -->
	
	
	<!-- page -->
	
	
	
@endsection
@section('modals')


	<div class="top_panel">
	    <div class="container header_panel">
	        <a href="#0" class="btn_close_top_panel"><i class="ti-close"></i></a>
	        <label>1 product added to cart</label>
	    </div>
	    <!-- /header_panel -->
	    <div class="item">
	        <div class="container">
	            <div class="row">
	                <div class="col-md-7">
	                    <div class="item_panel">
	                        <figure>
	                            <img src="{{$photo[0]}}" data-src="{{$photo[0]}}" class="lazy" alt="">
	                        </figure>
	                        <h4>{!!$product->title!!}</h4>

	                        <div class="price_panel"><span class="new_price">{{number_format($product->offer_price,2)}}</span>
	                        	@if($product->discount>0)
	                        	<span class="percentage">-{{$product->discount}}%</span> <span class="old_price">{{number_format($product->price,2)}}</span></div>
	                        	@endif
	                    </div>
	                </div>
	                <div class="col-md-5 btn_panel">
	                    <a href="cart.html" class="btn_1 outline">View cart</a> <a href="checkout.html" class="btn_1">Checkout</a>
	                </div>
	            </div>
	        </div>
	    </div>
	    <!-- /item -->
	    <div class="container related">
	        <h4>Who bought this product also bought</h4>
	        <div class="row">
	        	@foreach($product->related_products as $related_product)
	        	@if($product->id!=$related_product->id)
	        			@php
						 $related_photo=explode(',',$related_product->photo);
						@endphp
	            <div class="col-md-4">
	                <div class="item_panel">
	                    <a href="{{route('product.detail',$related_product->slug)}}">
	                        <figure>
	                            <img src="{{$related_photo[0]}}" data-src="{{$related_photo[0]}}" alt="" class="lazy">
	                        </figure>
	                    </a>
	                    <a href="{{ route('product.detail',$related_product->slug)}}">
	                        <h5>{{$related_product->title}}</h5>
	                    </a>
	                    <div class="price_panel"><span class="new_price">{{number_format($related_product->offer_price,2)}}</span></div>
	                </div>
	            </div>
	            @endif
	            @endforeach

	            
	        </div>
	    </div>
	    <!-- /related -->
	</div>
	<!-- /add_cart_panel -->
	
	<!-- Size modal -->
	<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="size-modal" id="size-modal" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Size guide</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<p>Lorem ipsum dolor sit amet, et velit propriae invenire mea, ad nam alia intellegat. Aperiam mediocrem rationibus nec te. Tation persecuti accommodare pro te. Vis et augue legere, vel labitur habemus ocurreret ex.</p>
					<div class="table-responsive">
                                <table class="table table-striped table-sm sizes">
                                    <tbody><tr>
                                        <th scope="row">US Sizes</th>
                                        <td>6</td>
                                        <td>6,5</td>
                                        <td>7</td>
                                        <td>7,5</td>
                                        <td>8</td>
                                        <td>8,5</td>
                                        <td>9</td>
                                        <td>9,5</td>
                                        <td>10</td>
                                        <td>10,5</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Euro Sizes</th>
                                        <td>39</td>
                                        <td>39</td>
                                        <td>40</td>
                                        <td>40-41</td>
                                        <td>41</td>
                                        <td>41-42</td>
                                        <td>42</td>
                                        <td>42-43</td>
                                        <td>43</td>
                                        <td>43-44</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">UK Sizes</th>
                                        <td>5,5</td>
                                        <td>6</td>
                                        <td>6,5</td>
                                        <td>7</td>
                                        <td>7,5</td>
                                        <td>8</td>
                                        <td>8,5</td>
                                        <td>9</td>
                                        <td>9,5</td>
                                        <td>10</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Inches</th>
                                        <td>9.25"</td>
                                        <td>9.5"</td>
                                        <td>9.625"</td>
                                        <td>9.75"</td>
                                        <td>9.9375"</td>
                                        <td>10.125"</td>
                                        <td>10.25"</td>
                                        <td>10.5"</td>
                                        <td>10.625"</td>
                                        <td>10.75"</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">CM</th>
                                        <td>23,5</td>
                                        <td>24,1</td>
                                        <td>24,4</td>
                                        <td>24,8</td>
                                        <td>25,4</td>
                                        <td>25,7</td>
                                        <td>26</td>
                                        <td>26,7</td>
                                        <td>27</td>
                                        <td>27,3</td>
                                    </tr>
                                </tbody></table>
                            </div>
					<!-- /table -->
				</div>
			</div>
		</div>
	</div>
@endsection
@section('scripts')
	<script src="{{ asset('frontend/js/sticky_sidebar.min.js') }}"></script>
	<script>
		// Sticky sidebar
		$('#sidebar_fixed').theiaStickySidebar({
			minWidth: 991,
			updateSidebarHeight: false,
			additionalMarginTop: 90
		});
	</script>

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
					if(data['status']){
						$('body #header-ajax').html(data['header']);
						swal({
							  title: "One Item Added to the Cart",
							  text: data['message'],
							  icon: "success",
							  button: "Ok!",
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
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endsection
