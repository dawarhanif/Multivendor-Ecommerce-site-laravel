<!DOCTYPE html>
<html lang="en">

@include('frontend.layouts.head')

<body>
	
	<div id="page">
<header class="version_1" id="header-ajax">
	@include('frontend.layouts.header')
</header>
	<!-- /header -->
	
		
	@yield('content')
	<!-- /main -->
		
	@include('frontend.layouts.footer')
	<!--/footer-->
	</div>
	@yield('modals')
	<!-- page -->
	
	<div id="toTop"></div><!-- Back to top button -->
	
	@include('frontend.layouts.script')
	<script>
		$(document).on('click','.cart_delete',function(e){
			e.preventDefault();
			var cart_id=$(this).data('id');
			var token="{{ csrf_token()}}";
			var path= "{{route('cart.delete') }}";
			$.ajax({
				url:path,
				type:"POST",
				dataType:"JSON",
				data:{
					cart_id:cart_id,
					_token:token,
				},
				
				success:function(data){
					console.log(data);

					$('body #header-ajax').html(data['header']);
					$('body #cart-counter').html(data['cart_count']);

					if(data['status']){
						swal({
							  title: "Good job!",
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
</body>
</html>