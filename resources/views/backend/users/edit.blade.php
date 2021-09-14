 @extends('backend.layouts.master')


@section('title')
Edit User
@endsection
@section('styles')

@endsection
@section('content')
 
<h3 class="text-primary">Edit User</h3>

<div class="container">
  <div class="col-md-12">

    @if($errors->any())
    <div class="alert alert-danger">
      <p> Please resolve following Error(s) before submitting the form. </p>
      <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif
  </div>
  <form method="POST" action="{{ route('users.update',$user->id) }}">
    @csrf 
    @method('patch')
    <div class="form-group">
        <label>
          Full name:
        </label>
        <input type="text" class="form-control" name="full_name" value="{{ $user->full_name }}">
    </div>
    <div class="form-group">
        <label>
          Username:
        </label>
        <input type="text" class="form-control" name="username" value="{{ $user->username }}" >
    </div>
    <div class="form-group">
        <label>
          Email:
        </label>
        <input type="email" class="form-control" name="email" value="{{ $user->email }}" >
    </div>
    <div class="form-group">
        <label>
          Phone number:
        </label>
        <input type="number" class="form-control" name="phone" value="{{ $user->phone}}" >
    </div>
    <div class="form-group">
        <label>
         Address:
        </label>
        <textarea name="address" rows="4" class="form-control" >{{ $user->address }}</textarea>
    </div>
    <div class="form-group">
        <label>
         Role:
        </label>
        <select name="role" class="form-control show-tick">
          <option></option>
          <option value="admin" {{ $user->role=='admin'? 'selected': ''}}>Admin</option>
          <option value="customer" {{ $user->role=='customer'? 'selected': ''}}>Customer</option>
          <option value="vendor" {{ $user->role=='seller'? 'selected': ''}}>Seller</option>
        </select>
    </div>
    <div class="input-group form-group">
      
       <span class="input-group-btn">
         <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary text-white">
           <i class="fa fa-picture-o"></i> Choose
         </a>
       </span>
      <input id="thumbnail" class="form-control" type="text" name="photo" value="{{$user->photo}}">

    </div>
 
    <div class="form-group">
        <label>
          Status:
        </label>
        <input type="radio" name="status" {{ $user->status=='active'? 'checked': ''}} value="active"> Active
        <input type="radio" name="status" {{ $user->status=='inactive'? 'checked': ''}} value="inactive"> Inactive
        
    </div>
    <input type="submit" class="btn btn-primary">
  </form>

</div>

@endsection

@section('scripts')
 <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
  <script>
    $('#lfm').filemanager('image');
  </script>
  
 
 <script>
  document.getElementById("user").classList.add('active');

 
 </script>
@endsection