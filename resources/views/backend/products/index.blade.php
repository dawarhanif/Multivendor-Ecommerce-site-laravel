@extends('backend.layouts.master')

@section('styles')
 <link rel="stylesheet" type="text/css" href=" {{ asset('backend/switch-button-bootstrap/css/bootstrap-switch-button.min.css') }}">
 <link rel="stylesheet" type="text/css" href=" {{ asset('backend/css/readmore.css') }}">
@endsection
@section('title')
Products
@endsection

@section('content')
 
    <div class="container-fluid">
      @if(session('success'))
       <div class="alert alert-success alert-dismissible fade show" role="alert" id="alert">
        {{ session('success') }}
           </div>
       @elseif(session('error'))
       <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alert">
          {{ session('error') }}
       </div>
       @endif
       
          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Products</h1>
          <a href="{{route('products.create')}}" class="btn btn-outline-primary btn-block">Create Product</a>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Total number of Products: <strong>{{$products->count()}}</strong> </h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Sr # </th>
                      <th>Title</th>
                      <th>Image</th>
                      <th>Summary</th>
                      <th>Description</th>
                      <th>In Stock</th>
                      <th>Brand Name</th>
                      <th>Category</th>
                      <th>Child Category</th>
                      <th>Original Price</th>
                      <th>Offered Price</th>
                      <th>Discount</th>
                      <th>Sizes</th>
                      <th>Conditions</th>
                      <th>Slug</th>
                   	  <th>Vendor</th>
                      <th>Status</th>
                      <th>Operations</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Sr # </th>
                      <th>Title</th>
                      <th>Image</th>
                      <th>Summary</th>
                      <th>Description</th>
                      <th>In Stock</th>
                      <th>Brand Name</th>
                      <th>Category</th>
                      <th>Child Category</th>
                      <th>Original Price</th>
                      <th>Offered Price</th>
                      <th>Discount</th>
                      <th>Sizes</th>
                      <th>Conditions</th>
                      <th>Slug</th>
                   	  <th>Vendor</th>
                      <th>Status</th>
                      <th>Operations</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach($products as $product)
                    <tr>
                    	@php
                      $photo=explode(',',$product->photo)
                      @endphp
                    	<td>{{ $loop->iteration}}</td>
                    	<td>{{ $product->title}}</td>
                    	<td><img src="{{ $photo[0] }}" style="max-height: 90px ; max-width:120px ;"></td>
                    	
                    	<td> 
                        {!! $product->summary !!} </td>
                        
                      <td> {!! html_entity_decode($product->description) !!} </td>
                      <td>{{ $product->stock}}</td>
                    	<td>{{ App\Models\Brand::where('id',$product->brand_id)->value('title')}}</td>
                    	<td>{{ App\Models\Category::where('id',$product->category_id)->value('title')}}</td>
                    	<td>{{ App\Models\Category::where('id',$product->child_category_id)->value('title')}}</td>
                    	<td>PKR {{ number_format($product->price,2)}}</td>
                    	<td>PKR {{ number_format($product->offer_price,2)}}</td>
                    	<td>{{ $product->discount,2}}%</td>
                    	<td><span class="badge badge-success rounded-pill">{{ $product->size}}</span></td>
                    	<td>
                        <span class="badge {{ $product->conditions=='popular'?'badge-warning':'badge-danger' }} text-light">
                          {{ $product->conditions }}
                        </span>
                      </td>
                      <td>{{ $product->slug}}</td>
                    	<td>{{ App\Models\User::where('id',$product->vendor_id)->value('full_name')}}</td>







                      
                    	

                        
                        <td><input  type="checkbox" name="toogle" value="{{$product->id}}" data-toggle="switchbutton" {{ $product->status=='active'? 'checked':'' }} data-onlabel="Active"  data-offlabel="Inactive" data-onstyle="success" data-offstyle="danger" data-size="xs">
                      </td>
                    	

                    	<td>
                    		
                        <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#productID{{$product->id}}" class="btn btn-outline-secondary btn-block btn-sm"><span class="fas fa-eye"></span></a>
                    		<a href="{{route('products.edit',$product->id)}}" data-toggle="tooltip" title="edit" class="btn btn-outline-warning btn-sm btn-block"><span class="far fa-edit"></span></a>

                        <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                          @csrf
                          @method('delete')

                          
                          <a href="" data-toggle="tooltip" title="delete" class="deletebtn btn btn-outline-danger btn-block btn-sm"><span class="far fa-trash-alt"></span></a> 
                        </form>

                        

                        <!-- View Modal -->

                  <!-- Modal -->
                  <div class="modal fade" id="productID{{$product->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">{{\Illuminate\Support\Str::upper($product->title)}}</h5>
                          
                        </div>
                        <div class="modal-body">
                          
                          <strong>
                            Summary:
                          </strong>
                          <p>{!!$product->summary!!}</p>
                          <strong>
                            Description:
                          </strong>
                          <p>{!!$product->description !!}</p>
                          <div class="row">
                            <div class="col-md-4">
                               <strong>
                            Price:
                          </strong>
                          <p>Rs. {{ number_format($product->price,2)}}</p>
                            </div>
                            <div class="col-md-4">
                               <strong>
                                Offering Price:
                              </strong>
                              <p>Rs. {{ number_format($product->offer_price,2)}}</p>
                            </div>
                            <div class="col-md-4">
                               <strong>
                                Stock:
                              </strong>
                              <p>{{ $product->stock}}</p>
                            </div>
                          </div>
                           <div class="row">
                            <div class="col-md-6">
                               <strong>
                                  Category:
                                </strong>
                                <p>{{ App\Models\Category::where('id',$product->category_id)->value('title')}}</p>
                            </div>
                            <div class="col-md-6">
                               <strong>
                                Child Category:
                              </strong>
                             <p>{{ App\Models\Category::where('id',$product->child_category_id)->value('title')}}</p>
                            </div>
                          </div>
                           <div class="row">
                            <div class="col-md-6">
                               <strong>
                                  Brand Name:
                                </strong>
                                <p>{{ App\Models\Brand::where('id',$product->brand_id)->value('title')}}</p>
                            </div>
                            <div class="col-md-6">
                               <strong>
                                Size:
                              </strong>
                             <p class="badge badge-success">{{ $product->size}}</p>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                               <strong>
                                  Conditions:
                                </strong>
                                <p class="badge badge-primary">{{ $product->conditions}}</p>
                            </div>
                            <div class="col-md-6">
                               <strong>
                                Status:
                              </strong>
                             <p class="badge {{ $product->status=='active'? 'badge-success':'badge-warning' }}">{{ $product->status}}</p>
                            </div>
                          </div>
                       

                        <strong>
                            Discount:
                          </strong>
                          <p> {{ $product->discount}}%</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
						<!-- End Modal -->
                      </td>
                      	

						
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                
              </div>
                <div class="d-flex justify-content-center mt-4">
                 {!! $products->links() !!}
                </div>
            </div>
          </div>

        </div>

@endsection

@section('scripts')
 <script src="{{ asset('backend/vendor/datatables/jquery.dataTables.min.js') }}"></script>
 <script src="{{ asset('backend/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
 <script src="{{ asset('backend/js/readmore.js') }}"></script>
 <script>
  document.getElementById("product").classList.add('active');

  
 </script>
 <script>
   setTimeout(function(){
    $('#alert').slideUp();

  }, 4000);
 
 </script>
 <script>
   $('input[name=toogle]').change(function(){
      var mode=$(this).prop('checked');
      var id=$(this).val();
      $.ajax({ 
          url:"{{route('product.status')}}",
          type:"POST",
          data:{
            _token:'{{csrf_token()}}',
            mode:mode,
            id:id,
          },
          success: function (response)
          {
            if(response.status){
              alert(response.msg);
            }
            else{
              alert("Please Try again");
            }
          }

      })
   });
 </script>
 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 
 <script>
   $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
   $('.deletebtn').click(function(e)
    {
      var form=$(this).closest('form');
      var dataID=$(this).data('id');
      e.preventDefault();
      swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this Product!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        form.submit();
        swal("Product has been Deleted Successfully", {
          icon: "success",
        });
      } else {
        swal("Your Product is safe!");
      }
    });
    });
 </script>
 <script src="{{ asset('backend/switch-button-bootstrap/dist/bootstrap-switch-button.min.js') }}"></script>
@endsection