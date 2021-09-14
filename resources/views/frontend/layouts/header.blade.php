
		<div class="layer"></div><!-- Mobile menu overlay mask -->
		<div class="main_header">
			<div class="container">
				<div class="row small-gutters">
					<div class="col-xl-3 col-lg-3 d-lg-flex align-items-center">
						<div id="logo">
							<a href="{{ route('homepage')}}"><img src="{{ asset('frontend/img/logooooo-01.png') }}" alt="" width="80" height="40"></a>
						</div>
					</div>
					<nav class="col-xl-6 col-lg-7">
						<a class="open_close" href="javascript:void(0);">
							<div class="hamburger hamburger--spin">
								<div class="hamburger-box">
									<div class="hamburger-inner"></div>
								</div>
							</div>
						</a>
						<!-- Mobile menu button -->
						<div class="main-menu">
							<div id="header_menu">
								<a href="{{ route('homepage')}}"><img href="{{ route('homepage')}}"><img src="{{ asset('frontend/img/logooooo-01.png') }}" alt="" width="80" height="40"></a>
								<a href="#" class="open_close" id="close_in"><i class="ti-close"></i></a>
							</div>
							<ul>
								<li>
									<a href="{{ route('homepage')}}" class="show-submenu">Home</a>
									
								</li>
								<li>
									<a href="{{ route('homepage')}}">Categories</a>
									
								</li>
								<li>
									<a href="javascript:void(0);" class="show-submenu">Products</a>
								</li>
								<li>
									<a href="javascript:void(0);">Blog</a>
								</li>
								<li>
									<a href="javascript:void(0);">About Us</a>
								</li>
							</ul>
						</div>
						<!--/main-menu -->
					</nav>
					<div class="col-xl-3 col-lg-2 d-lg-flex align-items-center justify-content-end text-end">
						<a class="phone_top" href="tel://9438843343"><strong><span>Need Help?</span>+92 312-7998887</strong></a>
					</div>
				</div>
				<!-- /row -->
			</div>
		</div>
		<!-- /main_header -->

		<div class="main_nav Sticky">
			<div class="container">
				<div class="row small-gutters">
					<div class="col-xl-3 col-lg-3 col-md-3">
						<nav class="categories">
							<ul class="clearfix">
								<li><span>
										<a href="#">
											<span class="hamburger hamburger--spin">
												<span class="hamburger-box">
													<span class="hamburger-inner"></span>
												</span>
											</span>
											Categories
										</a>
									</span>
									<div id="menu">
										@php 
											$categories=\App\Models\Category::where(['is_parent'=>'1'])->orderBy('id','DESC')->get();
										@endphp
											
											
										<ul>
											@if(count($categories)>0)
											@foreach($categories as $category)
											<li><span><a href="{{ route('product.category',$category->slug)}}">{{$category->title}}</a></span>
												<ul>
													@php 
														$sub_categories=\App\Models\Category::where(['parent_id'=>$category->id])->orderBy('id','DESC')->get();
													@endphp
													@if(count($sub_categories)>0)
													@foreach($sub_categories as $sub_category)
													<li><a href="{{ route('product.category',$sub_category->slug)}}">{{$sub_category->title}}</a></li>

													@endforeach
													@endif
												</ul>
											</li>
											@endforeach
										@endif
										</ul>
										
									</div>
								</li>
							</ul>
						</nav>
					</div>
					<div class="col-xl-6 col-lg-7 col-md-6 d-none d-md-block">
						<div class="custom-search-input">
							<input type="text" placeholder="Search over 10.000 products">
							<button type="submit"><i class="header-icon_search_custom"></i></button>
						</div>
					</div>
					<div class="col-xl-3 col-lg-2 col-md-3">
						<ul class="top_tools">
							<li>
								<div class="dropdown dropdown-cart">
									<a href="#" class="cart_bt"><strong id="cart-counter">{{Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->count()}}</strong></a>
									<div class="dropdown-menu">
										<ul>
											@foreach(Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->content() as $item)
											<li>
												@php
												 $photo=explode(',',$item->model->photo);
												@endphp
												<a href="{{route('product.detail',$item->model->slug)}}">
													<figure><img src="{{ $photo[0] }}" data-src="{{ $photo[0] }}" alt="" width="50" height="50" class="lazy"></figure>
													<strong><span>{{$item->name}}</span>{{number_format($item->price,2)}} PKR</strong>
												</a>
												<a href="" class="action cart_delete" data-id="{{$item->rowId}}"><i class="ti-trash"></i></a>
											</li>
											@endforeach
										</ul>
										<div class="total_drop">
											<div class="clearfix"><strong>Total</strong><span>{{Gloudemans\Shoppingcart\Facades\Cart::subtotal()}}</span></div>
											<a href="cart.html" class="btn_1 outline">View Cart</a><a href="checkout.html" class="btn_1">Checkout</a>
										</div>
									</div>
								</div>
								<!-- /dropdown-cart-->
							</li>
							<li>
								<a href="#0" class="wishlist"><span>Wishlist</span></a>
							</li>
							<li>
								<div class="dropdown dropdown-access">
									<a href="#" class="access_link"><span>Account</span></a>
									<div class="dropdown-menu">
										@if(Auth::check())
										<ul>
											<li>
												@if(isset(auth()->user()->role))
												<a href="#">
													@if(isset(auth()->user()->photo))
													<img  style="height:50px;width: 50px; border-radius: 15px; " src="{{auth()->user()->photo}}">
													@else
													<i class="fa fa-user"></i>
													@endif

													 <strong>Hello, <span>{{auth()->user()->full_name}}</span></strong> </a>
												@endif
											</li>
											<li>
												<a href="track-order.html"><i class="ti-truck"></i>Track your Order</a>
											</li>
											<li>
												<a href="{{ route('user.orders')}}"><i class="ti-package"></i>My Orders</a>
											</li>
											<li>
												<a href="{{ route('user.dashboard')}}"><i class="ti-user"></i>My Profile</a>
											</li>
											<li>
												<a href="help.html"><i class="ti-help-alt"></i>Help and Faq</a>
											</li>
											<li>
												<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
								                  <i class="ti-lock"></i>
								                  Logout
								                </a>
												
											</li>
										</ul>
										@else
										<a href="{{route('user.auth')}}" class="btn_1">Sign In or Sign Up</a>
										@endif
									</div>
								</div>
								<!-- /dropdown-access-->
							</li>
							<li>
								<a href="javascript:void(0);" class="btn_search_mob"><span>Search</span></a>
							</li>
							<li>
								<a href="#menu" class="btn_cat_mob">
									<div class="hamburger hamburger--spin" id="hamburger">
										<div class="hamburger-box">
											<div class="hamburger-inner"></div>
										</div>
									</div>
									Categories
								</a>
							</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<div class="search_mob_wp">
				<input type="text" class="form-control" placeholder="Search over 10.000 products">
				<input type="submit" class="btn_1 full-width" value="Search">
			</div>
			<!-- /search_mobile -->
		</div>
		<!-- /main_nav -->












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