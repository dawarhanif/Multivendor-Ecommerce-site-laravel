@extends('backend.layouts.master')

@section('styles')
 <link rel="stylesheet" type="text/css" href=" {{ asset('backend/switch-button-bootstrap/css/bootstrap-switch-button.min.css') }}">
@endsection
@section('title')
Banners
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
          <h1 class="h3 mb-2 text-gray-800">Banners</h1>
          <a href="{{route('banner.create')}}" class="btn btn-outline-primary btn-block">Create Banner</a>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Total number of Banners: <strong>{{$banners->count()}}</strong> </h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Sr # </th>
                      <th>Title</th>
                      <th>Description</th>
                      <th>Slug</th>
                      <th>Photo</th>
                      <th>Status</th>
                      <th>Condition</th>
                      <th>Operations</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Sr # </th>
                      <th>Title</th>
                      <th>Description</th>
                      <th>Slug</th>
                      <th>Photo</th>
                      <th>Status</th>
                      <th>Condition</th>
                      <th>Operations</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach($banners as $banner)
                    <tr>
                    	
                    	<td>{{ $loop->iteration}}</td>
                    	<td>{{ $banner->title}}</td>
                      <td>{!! $banner->description !!}</td>
                      <td>{{ $banner->slug}}</td>
                    	<td><img src="{{ $banner->photo }}" style="max-height: 90px ; max-width:120px ;"></td>
                    	<td>
                        

                        
                        <input  type="checkbox" name="toogle" value="{{$banner->id}}" data-toggle="switchbutton" {{ $banner->status=='active'? 'checked':'' }} data-onlabel="Active"  data-offlabel="Inactive" data-onstyle="success" data-offstyle="danger" data-size="xs">
                      </td>
                    	<td>
                        <span class="badge {{ $banner->condition=='banner'?'badge-warning':'badge-danger' }} text-light">
                          {{ $banner->condition }}
                        </span>
                      </td>

                    	<td>
                        <form action="{{ route('banner.destroy',$banner->id) }}" method="POST">
                          @csrf
                          @method('delete')
                          <a href="{{route('banner.edit',$banner->id)}}" data-toggle="tooltip" title="edit" class="btn btn-outline-warning btn-sm">Edit</a>
                          <a href="" data-toggle="tooltip" title="delete" class="deletebtn btn btn-outline-danger btn-sm">Delete</a> 
                        </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                
              </div>
                <div class="d-flex justify-content-center mt-4">
                 {!! $banners->links() !!}
                </div>
            </div>
          </div>

        </div>

@endsection

@section('scripts')
 <script src="{{ asset('backend/vendor/datatables/jquery.dataTables.min.js') }}"></script>
 <script src="{{ asset('backend/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

 <script>
  document.getElementById("banner").classList.add('active');

  
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
          url:"{{route('banner.status')}}",
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
      text: "Once deleted, you will not be able to recover this banner!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        form.submit();
        swal("Banner has been Deleted Successfully", {
          icon: "success",
        });
      } else {
        swal("Your Banner is safe!");
      }
    });
    });
 </script>
 <script src="{{ asset('backend/switch-button-bootstrap/dist/bootstrap-switch-button.min.js') }}"></script>
@endsection