@extends('admin.admin_master') 
@section('admin') 


		<!-- BEGIN #content -->

        <div class="col-12">
              <div class="card top-selling overflow-auto">

                <div class="filter">
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">All Products</h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                              <th scope="col">Product Image</th>
                              <th scope="col">Product Category</th>
                              <th scope="col">Product Name</th>
                              <th scope="col">Product Code</th>
                              <th scope="col">Product Quantity</th>
                              <th scope="col">Product Price</th>
                              <th scope="col">Product Description</th>
                              <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $item)
                      <tr>
                      <td> <img src="{{ asset($item->productThumbnail) }}" style="width:60 px; height:60px"></td>
                              <td> {{ $item['category']['categoryName'] }}  </td>
                              <td>{{  $item->productName}}</td>
                              <td>{{  $item->productCode}}</td>
                              <td>{{  $item->productQty}}</td>
                              <td>{{  $item->productPrice}}</td>
                              <td>{{  $item->productDescription}}</td>
                              <td><a href="{{ route('product.delete' , $item->productID)}}" class="btn btn-danger"><i class="bi bi-trash-fill"></i> </a></td>
                              <td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>

                </div>

              </div>
            </div>



            



@endsection