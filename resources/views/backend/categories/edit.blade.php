 @extends('backend.layouts.master')


@section('title')
Edit Category
@endsection
@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('backend/summernote/summernote.css') }}">
@endsection
@section('content')
 
<h3 class="text-primary">Edit Category</h3>

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
  <form method="POST" action="{{ route('category.update',$category->id) }}">
    @csrf 
    @method('patch')
    <div class="form-group">
        <label>
          Title:
        </label>
        <input type="text" class="form-control" name="title" value="{{ $category->title }}" placeholder="Write the Title for Category">
    </div>
    <div class="input-group form-group">

       <span class="input-group-btn">
         <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary text-white">
           <i class="fa fa-picture-o"></i> Choose
         </a>
       </span>
      <input id="thumbnail" class="form-control" type="text" name="photo" value="{{ $category->photo }}">

    </div>
 <div id="holder" style="margin-top:15px;max-height:100px;"></div>
    <div class="form-group">
        <label>
          Description:
        </label>
        <textarea  id="description" class="form-control" rows="8" name="description" placeholder="Description for the category">{{ $category->description }}"</textarea>
    </div>
    <div class="form-group">
      <label>
        Is Parent:
      </label>
      <input type="checkbox" name="is_parent" value="1" id="is_parent" {{ $category->is_parent==1? 'checked':''}}> Yes
    </div>
    <div class="form-group {{$category->is_parent==1?'d-none':''}}" id="parent_cat_div" >
        <label>
          Parent Category:
        </label>
        <select name="parent_id" class="form-control">
              
            <option></option>
            @foreach($parent_categories as $parent_category)
            <option value="{{$parent_category->id}}" 
              {{$parent_category->id==$category->parent_id? 'selected': ''}} >{{$parent_category->title}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>
          Status:
        </label>
        <input type="radio" name="status" {{ $category->status=='active'? 'checked': ''}} value="active"> Active
        <input type="radio" name="status" {{ $category->status=='inactive'? 'checked': ''}} value="inactive"> Inactive
        
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
  document.getElementById("category").classList.add('active');

 
 </script>
 <script>
   $('#is_parent').change(function(e){
      e.preventDefault();
      var is_checked=$('#is_parent').prop('checked');
      if (is_checked) {
        $('#parent_cat_div').addClass('d-none');
        $('#parent_cat_div').val('');

      }
      else
      {
            $('#parent_cat_div').removeClass('d-none');
      
      }

   });
 </script>
@endsection