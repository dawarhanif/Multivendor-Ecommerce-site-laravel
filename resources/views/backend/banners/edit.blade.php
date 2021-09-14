 @extends('backend.layouts.master')


@section('title')
Edit Banner
@endsection
@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('backend/summernote/summernote.css') }}">
@endsection
@section('content')
 
<h3 class="text-primary">Edit Banner</h3>

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
  <form method="POST" action="{{ route('banner.update',$banner->id) }}">
    @csrf 
    @method('patch')
    <div class="form-group">
        <label>
          Title:
        </label>
        <input type="text" class="form-control" name="title" value="{{ $banner->title }}" placeholder="Write the Title for Banner">
    </div>
    <div class="input-group form-group">

       <span class="input-group-btn">
         <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary text-white">
           <i class="fa fa-picture-o"></i> Choose
         </a>
       </span>
      <input id="thumbnail" class="form-control" type="text" name="photo" value="{{ $banner->photo }}">

    </div>
 <div id="holder" style="margin-top:15px;max-height:100px;"></div>
    <div class="form-group">
        <label>
          Description:
        </label>
        <textarea  id="description" class="form-control" rows="8" name="description" placeholder="Description for the Banner">{{ $banner->description }}"</textarea>
    </div>

    <div class="form-group">
        <label>
          Condition:
        </label>
        <select class="form-control" name="condition">
          <option></option>
          <option value="banner" {{ $banner->condition=='banner'? 'selected': ''}} >Banner</option>
          <option value="promo" {{ $banner->condition=='promo'? 'selected': ''}}>Promo</option>

        </select>
    </div>
    <div class="form-group">
        <label>
          Status:
        </label>
        <input type="radio" name="status" {{ $banner->status=='active'? 'checked': ''}} value="active"> Active
        <input type="radio" name="status" {{ $banner->status=='inactive'? 'checked': ''}} value="inactive"> Inactive
        
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
  <script src="{{ asset('backend/summernote/summernote.js') }}"></script>
  <script>  
    $(document).ready(function() {
    $('#description').summernote();
    });
  </script>
 <script>
  document.getElementById("banner").classList.add('active');

 
 </script>
@endsection