<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon">
          <i class="fas fa-user"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin Panel </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('admin')}}" >
          <i class="fas fa-home"></i>
          <span>Dashboard</span>
        </a>
        
      </li>

       <li class="nav-item" id="banner">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBanners" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fa fa-image"></i>
          <span>Banners</span>
        </a>
        <div id="collapseBanners" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Banner Options:</h6>
            <a class="collapse-item" href="{{ route('banner.index') }}">All banners</a>
            <a class="collapse-item" href="{{ route('banner.create') }}">Add Banner</a>
          </div>
        </div>
      </li>
      <li class="nav-item" id="category">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCategory" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-sitemap"></i>
          <span>Categories</span>
        </a>
        <div id="collapseCategory" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Category Options:</h6>
            <a class="collapse-item" href="{{ route('category.index') }}">All Categories</a>
            <a class="collapse-item" href="{{ route('category.create') }}">Add Category</a>
          </div>
        </div>
      </li>
      <li class="nav-item" id="brand">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBrand" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-briefcase"></i>
          <span>Brands Management</span>
        </a>
        <div id="collapseBrand" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Brand Options:</h6>
            <a class="collapse-item" href="{{ route('brand.index') }}">All Brands</a>
            <a class="collapse-item" href="{{ route('brand.create') }}">Add Brand</a>
          </div>
        </div>
      </li>
      <li class="nav-item" id="product">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProducts" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-briefcase"></i>
          <span>Products</span>
        </a>
        <div id="collapseProducts" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Product Options:</h6>
            <a class="collapse-item" href="{{ route('products.index') }}">All Products</a>
            <a class="collapse-item" href="{{ route('products.create') }}">Add Product</a>
          </div>
        </div>
      </li>

      <li class="nav-item" id="users">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-users"></i>
          <span>Users Management</span>
        </a>
        <div id="collapseUsers" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Users Options:</h6>
            <a class="collapse-item" href="{{ route('users.index') }}">All Users</a>
            <a class="collapse-item" href="{{ route('users.create') }}">Add Users</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCart" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-shopping-cart"></i>
          <span>Cart</span>
        </a>
        <div id="collapseCart" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Components:</h6>
            <a class="collapse-item" href="buttons.html">Buttons</a>
            <a class="collapse-item" href="cards.html">Cards</a>
          </div>
        </div>
      </li>
       <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOrder" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-cart-arrow-down"></i>
          <span>Order Management</span>
        </a>
        <div id="collapseOrder" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Components:</h6>
            <a class="collapse-item" href="buttons.html">Buttons</a>
            <a class="collapse-item" href="cards.html">Cards</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePost" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-sitemap"></i>
          <span>Post Category</span>
        </a>
        <div id="collapsePost" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Components:</h6>
            <a class="collapse-item" href="buttons.html">Buttons</a>
            <a class="collapse-item" href="cards.html">Cards</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTags" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-tags"></i>
          <span>Post tags</span>
        </a>
        <div id="collapseTags" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Components:</h6>
            <a class="collapse-item" href="buttons.html">Buttons</a>
            <a class="collapse-item" href="cards.html">Cards</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePostManagement" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-id-card"></i>
          <span>Post Management</span>
        </a>
        <div id="collapsePostManagement" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Components:</h6>
            <a class="collapse-item" href="buttons.html">Buttons</a>
            <a class="collapse-item" href="cards.html">Cards</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseReview" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-star"></i>
          <span>Review Management</span>
        </a>
        <div id="collapseReview" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Components:</h6>
            <a class="collapse-item" href="buttons.html">Buttons</a>
            <a class="collapse-item" href="cards.html">Cards</a>
          </div>
        </div>
      </li>

     
      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>