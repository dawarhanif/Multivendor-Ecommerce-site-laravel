<div class="col-3">
			
			<ul class="list-group">
			  <a class="list-group-item list-group-item-action " id="dashboard" href="{{ route('user.dashboard')}}">Dashboard</a>
			 <a class="list-group-item list-group-item-action" id="orders" href="{{ route('user.orders')}}">Orders</a>
			 <a class="list-group-item list-group-item-action " id="addresses" href="{{ route('user.addresses')}}">Addresses</a>
			 <a class="list-group-item list-group-item-action " id="accountdetails" href="{{ route('user.account')}}">My Account Details</a>
			 <a class="dropdown-item list-group-item list-group-item-action " href="#" data-toggle="modal" data-target="#logoutModal">
								                  <i class="ti-lock"></i>
								                  Logout</a>
			</ul>
		</div>