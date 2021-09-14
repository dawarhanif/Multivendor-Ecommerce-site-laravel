 @extends('backend.layouts.master')


@section('title')
Add User
@endsection
@section('styles')

@endsection
@section('content')
 
<h3 class="text-primary">Add User</h3>

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
  <form method="POST" action="{{ route('users.store') }}">
    @csrf 
    <div class="form-group">
        <label>
          Full name:
        </label>
        <input type="text" class="form-control" name="full_name" value="{{ old('full_name') }}" placeholder="Write full name of the user">
    </div>
    <div class="form-group">
        <label>
          Username:
        </label>
        <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Write username of the user">
    </div>
    <div class="form-group">
        <label>
          Email:
        </label>
        <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Write the Email for this user">
    </div>
    <div class="form-group">
        <label>
          Password:
        </label>
        <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Enter the password">
    </div>
    <div class="form-group">
        <label>
          Phone number:
        </label>
        <input type="number" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="Write the phone number">
    </div>
    <div class="form-group">
        <label>
         Address:
        </label>
        <textarea name="address" rows="4" class="form-control" value="{{ old('address') }}"></textarea>
    </div>
    <div class="form-group">
        <label>
         Role:
        </label>
        <select name="role" class="form-control show-tick">
          <option></option>
          <option value="admin" {{ old('role')=='admin'? 'selected': ''}}>Admin</option>
          <option value="customer" {{ old('role')=='customer'? 'selected': ''}}>Customer</option>
          <option value="Seller" {{ old('role')=='seller'? 'selected': ''}}>Seller</option>
        </select>
    </div>
    <div class="input-group form-group">
      
       <span class="input-group-btn">
         <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary text-white">
           <i class="fa fa-picture-o"></i> Choose
         </a>
       </span>
      <input id="thumbnail" class="form-control" type="text" name="photo">

    </div>
 
    <div class="form-group">
        <label>
          Status:
        </label>
        <input type="radio" name="status" {{ old('status')=='active'? 'selected': ''}} value="active"> Active
        <input type="radio" name="status" {{ old('status')=='inactive'? 'selected': ''}} value="inactive"> Inactive
        
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