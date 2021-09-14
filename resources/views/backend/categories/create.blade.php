 @extends('backend.layouts.master')


@section('title')
Add Category
@endsection
@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('backend/summernote/summernote.css') }}">
@endsection
@section('content')
 
<h3 class="text-primary">Add Category</h3>

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
  <form method="POST" action="{{ route('category.store') }}">
    @csrf 
    <div class="form-group">
        <label>
          Title:
        </label>
        <input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="Write the Title for Category">
    </div>
    <div class="input-group form-group">
      
       <span class="input-group-btn">
         <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary text-white">
           <i class="fa fa-picture-o"></i> Choose
         </a>
       </span>
      <input id="thumbnail" class="form-control" type="text" name="photo">

    </div>
 <div id="holder" style="margin-top:15px;max-height:100px;"></div>
    <div class="form-group">
        <label>
          Summary:
        </label>
        <textarea id="description" class="form-control" rows="8" name="summary" placeholder="Summary for the category">{{old('summary') }}</textarea>
    </div>
    <div class="form-group">
      <label>
          Is parent:
        </label>
        <input id="is_parent" type="checkbox" name="is_parent" checked value='1'> Yes
    </div>

    <div class="form-group d-none" id="parent_cat_div">
        <label>
          Parent Category:
        </label>

        <select class="form-control" name="parent_id" > 
          <option></option>
          @foreach($parent_categories as $key=>$parent_category)
          <option value="{{$parent_category->id}}">{{$parent_category->title}}</option>
          @endforeach
        </select>
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