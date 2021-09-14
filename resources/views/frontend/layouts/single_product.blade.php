
@foreach($products as $product)

				<div class="col-6 col-md-4 col-xl-3">
					<div class="grid_item">
						<figure>@if($product->discount>0)
							<span class="ribbon off">-{{$product->discount}}%</span>
							@endif
							@php
							$photo=explode(',',$product->photo);
							@endphp
							<a href="{{route('product.detail',$product->slug)}}">
								<img class="img-fluid lazy" src="{{ $photo[0] }}" data-src="{{ $photo[0] }}" alt="">
							</a>
							
						</figure>
						<a href="{{route('product.detail',$product->slug)}}">
							<h3>{{ucfirst($product->title)}}</h3>
							<!-- <h2>Brand: {{\App\Models\Brand::where('id',$product->brand_id)->value('title')}}</h2> -->
						</a>
						<div class="price_box">
							
							<span class="new_price">{{ number_format($product->offer_price,2)}} PKR</span>
							@if($product->discount>0)
							<span class="old_price">{{ number_format($product->price,2)}}</span>
							@endif
						</div>
						<ul>
							<li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
							<li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
							<li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
						</ul>
					</div>
					<!-- /grid_item -->
				</div>
				@endforeach
				