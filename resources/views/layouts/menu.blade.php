<!-- need to remove -->
<li class="nav-item">
    <a href="{{ url('admin/home') }}" class="nav-link {{ Request::is('admin/home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>
<li class="nav-item {{ request()->is('admin/master*') ? 'menu-is-opening menu-open' : '' }}">
  <a href="#" class="nav-link {{ request()->is('admin/master*') ? 'active' : '' }}">
    <i class="nav-icon fas fa-table"></i>
    <p> Master <i class="fas fa-angle-left right"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{ url('admin/master/category') }}" class="nav-link {{ request()->is('admin/master/category*') ? 'active' : '' }} ">
        <i class="far fa-circle nav-icon"></i>
        <p>Category</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ url('admin/master/sub-category') }}" class="nav-link {{ request()->is('admin/master/sub-category*') ? 'active' : '' }}">
        <i class="far fa-circle nav-icon"></i>
        <p>Sub Category</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ url('admin/master/brand') }}" class="nav-link {{ request()->is('admin/master/brand*') ? 'active' : '' }}">
        <i class="far fa-circle nav-icon"></i>
        <p>Brands</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ url('admin/master/banner') }}" class="nav-link {{ request()->is('admin/master/banner*') ? 'active' : '' }}">
        <i class="far fa-circle nav-icon"></i>
        <p>Banner</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ url('admin/master/delivery-option') }}" class="nav-link {{ request()->is('admin/master/delivery-option*') ? 'active' : '' }}">
        <i class="far fa-circle nav-icon"></i>
        <p>Delivery Option</p>
      </a>
    </li>
  </ul>
</li>
<li class="nav-item">
    <a href="{{ url('admin/product') }}" class="nav-link {{ Request::is('admin/product*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-columns"></i>
        <p>Product</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ url('admin/order') }}" class="nav-link {{ Request::is('admin/order*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-chart-pie"></i>
        <p>Orders</p>
    </a>
</li>