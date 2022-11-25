@extends('admin.admin_master')
@section('admin')


		<!-- BEGIN #content -->

                <div class="col-12">
                    <div class="card recent-sales overflow-auto">

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
                              <th scope="col">Status</th>
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
                              <td>
                                @if(  $item->productStatus == 1)
                                <span class="badge bg-success">Active</span>

                                @else
                                <span class="badge bg-danger">Inactive</span>
                                @endif
                              </td>
                              <td>
                                <a href="{{ route('product.edit', $item->productID ) }}" class="btn btn-primary" title="Product Status"><i class="bi bi-eye-fill"></i> </a>
                                <a href="{{ route('product.edit', $item->productID ) }}" class="btn btn-primary"><i class="bi bi-pencil-fill"></i> </a>
                                <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#verticalycentered"><i class="bi bi-trash-fill"></i></a>
                                
                                @if(  $item->productStatus == 1)
                                <a href="{{ route('product.inactive', $item->productID ) }}" class="btn btn-danger" title="Inactive Now"><i class="bi bi-file-arrow-down"></i> </a>

                                @else
                                <a href="{{ route('product.active', $item->productID ) }}" class="btn btn-success" title="Active Now"><i class="bi bi-file-arrow-up"></i> </a>
                               
                                @endif
                                  <div class="modal fade" id="verticalycentered" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                        
                                          <h5 class="modal-title">Delete Product ?</h5> 
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-center">
                                        <img src="{{ asset('/backend/img/deletegif.gif')}}" alt="" style="width:50%; height:50%"> 
                                        <h5 class="modal-title">Are you sure you want to delete this product ? You won't be able to revert this action !</h5>
                                        </div>
                                        <div class="modal-footer align-item-center">
                                          <a type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
                                          <a type="button" class="btn btn-primary" href="{{ route('product.delete' , $item->productID)}}">Yes, delete it!</a>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                              </td>
                            </tr>
                            @endforeach

                          </tbody>
                        </table>
                            
                      </div>

                    </div>
                    
                  </div>



            



@endsection