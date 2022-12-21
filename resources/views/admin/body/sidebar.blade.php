@php
 $prefix = Request::route()->getPrefix();
 $route = Route::current()->getName();
@endphp
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{ url('admin/dashboard')}}">
          <i class="ri-dashboard-2-fill"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bx bxs-category"></i><span>Category</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('all.category')}}">
              <i class="ri-checkbox-blank-circle-fill"></i><span>All Category</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="ri-shopping-cart-fill"></i><span>Products</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('all.products')}}">
              <i class="ri-checkbox-blank-circle-fill"></i><span>All Products</span>
            </a>
          </li>
        </ul>
      </li>
      
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bx bxs-graduation"></i><span>Students</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('all.students')}}">
              <i class="ri-checkbox-blank-circle-fill"></i><span>All Students</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->

      <!-- <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Product</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('add.product')}}">
              <i class="bi bi-circle"></i><span>Add Products</span>
            </a>
          </li>
          <li>
            <a href="{{ route('manage.product')}}">
              <i class="bi bi-circle"></i><span>Manage Products</span>
            </a>
          </li>
        </ul>
      </li> -->
      <!-- End Tables Nav -->


      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('admin.profile')  }}">
          <i class="bx bxs-user-circle"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-contact.html">
          <i class="bx bxs-contact"></i>
          <span>Contact</span>
        </a>
      </li><!-- End Contact Page Nav -->
    </ul>

  </aside>