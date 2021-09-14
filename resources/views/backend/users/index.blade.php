@extends('backend.layouts.master')

@section('styles')
 <link rel="stylesheet" type="text/css" href=" {{ asset('backend/switch-button-bootstrap/css/bootstrap-switch-button.min.css') }}">
@endsection
@section('title')
Users
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
          <h1 class="h3 mb-2 text-gray-800">Users</h1>
          <a href="{{route('users.create')}}" class="btn btn-outline-primary btn-block">Create User</a>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Total number of Users: <strong>{{$total_users}}</strong> </h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Sr # </th>
                      <th>Photo</th>
                      <th>Username</th>
                      <th>Full Name</th>
                      <th>Email</th>
                      <th>Role</th>
                      <th>Status</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Sr # </th>
                      <th>Photo</th>
                      <th>Username</th>
                      <th>Full Name</th>
                      <th>Email</th>
                      <th>Role</th>
                      <th>Status</th>
                      <th>Actions</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach($users as $user)
                    <tr>
                    	
                    	<td>{{ $loop->iteration}}</td>
              
                    	<td><img src="{{ $user->photo }}" style="border-radius: 50%; height: 70px;max-height: 90px ; max-width:120px ;"></td>
                    	
                    	<td>{{ $user->username}}</td>
                      <td>{{$user->full_name}}</td>
                      <td>{{$user->email}}</td>
                      <td>
                        <span class="badge {{ $user->role=='admin'?'badge-warning':'badge-danger' }} text-light">
                          {{ $user->role }}
                        </span>
                      </td>
                      <td>
                        <input  type="checkbox" name="toogle" value="{{$user->id}}" data-toggle="switchbutton" {{ $user->status=='active'? 'checked':'' }} data-onlabel="Active"  data-offlabel="Inactive" data-onstyle="success" data-offstyle="danger" data-size="xs">
                      </td>

                    	

                    	<td>
                        <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#userID{{$user->id}}" class="btn btn-outline-secondary btn-block btn-sm"><span class="fas fa-eye"></span></a>
                    		<a href="{{route('users.edit',$user->id)}}" data-toggle="tooltip" title="edit" class="btn btn-outline-warning btn-sm btn-block"><span class="far fa-edit"></span></a>

                        <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                          @csrf
                          @method('delete')

                          
                          <a href="" data-toggle="tooltip" title="delete" class="deletebtn btn btn-outline-danger btn-block btn-sm"><span class="far fa-trash-alt"></span></a> 
                        </form>
                        <!-- Modal -->
                  <div class="modal fade" id="userID{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                      	<div class="text-center">
                      		<img src="{{$user->photo}}" style="border-radius:50%;height:60px;  margin:2% 0;">
                      	</div>
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel"><strong>{{\Illuminate\Support\Str::upper($user->full_name)}}</strong></h5>
                          
                        </div>
                        <div class="modal-body">
                          <div class="row">
                          	<div class="col-md-6">
	                          <strong>
	                            Email:
	                          </strong>
	                          <p>{{$user->email}}</p>
	                        </div>
	                        <div class="col-md-6">
	                          <strong>
	                            Phone Number:
	                          </strong>
	                          <p>{{$user->phone}}</p>
	                        </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                               <strong>
                            Address:
                          </strong>
                          <p>{{ $user->address}}</p>
                            </div>
                            <div class="col-md-6">
                               <strong>
                                Role:
                              </strong>
                              <p>{{ $user->role }}</p>
                            </div>
                            </div>
                          <div class="row">
                            <div class="col-md-6">
                               <strong>
                                Username:
                              </strong>
                              <p>{{ $user->username }}</p>
                            </div>
                            <div class="col-md-6">
                               <strong>
                                Status:
                              </strong>
                             <p class="badge {{ $user->status=='active'? 'badge-success':'badge-warning' }}">{{ $user->status}}</p>
                            </div>
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
                 {!! $users->links() !!}
                </div>
            </div>
          </div>

        </div>

@endsection

@section('scripts')
 <script src="{{ asset('backend/vendor/datatables/jquery.dataTables.min.js') }}"></script>
 <script src="{{ asset('backend/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

 <script>
  document.getElementById("users").classList.add('active');

  
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
          url:"{{route('user.status')}}",
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
        swal("User has been Deleted Successfully", {
          icon: "success",
        });
      } else {
        swal("Your User is safe!");
      }
    });
    });
 </script>
 <script src="{{ asset('backend/switch-button-bootstrap/dist/bootstrap-switch-button.min.js') }}"></script>
@endsection