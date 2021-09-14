 @extends('backend.layouts.master')


@section('title')
Edit Brand
@endsection
@section('styles')

@endsection
@section('content')
 
<h3 class="text-primary">Edit Brand</h3>

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
  <form method="POST" action="{{ route('brand.update',$brand->id) }}">
    @csrf 
    @method('patch')
    <div class="form-group">
        <label>
          Title:
        </label>
        <input type="text" class="form-control" name="title" value="{{ $brand->title }}" placeholder="Write the Title for Brand">
    </div>
    <div class="input-group form-group">

       <span class="input-group-btn">
         <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary text-white">
           <i class="fa fa-picture-o"></i> Choose
         </a>
       </span>
      <input id="thumbnail" class="form-control" type="text" name="photo" value="{{ $brand->photo }}">

    </div>
 
    <div class="form-group">
        <label>
          Status:
        </label>
        <input type="radio" name="status" {{ $brand->status=='active'? 'checked': ''}} value="active"> Active
        <input type="radio" name="status" {{ $brand->status=='inactive'? 'checked': ''}} value="inactive"> Inactive
        
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
  document.getElementById("brand").classList.add('active');

 
 </script>
@endsection