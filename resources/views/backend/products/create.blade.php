 @extends('backend.layouts.master')


@section('title')
Add Product
@endsection
@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('backend/summernote/summernote.css') }}">
@endsection
@section('content')
 
<h3 class="text-primary">Add Products</h3>

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
  <form method="POST" action="{{ route('products.store') }}">
    @csrf 
    <div class="form-group">
        <label>
          Title:
        </label>
        <input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="Write the Title for Product">
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
        <textarea id="summary" class="form-control" rows="8" name="summary" placeholder="Summary for the Product">{{old('summary') }}</textarea>
    </div>
 <div id="holder" style="margin-top:15px;max-height:100px;"></div>
    <div class="form-group">
        <label>
          Description:
        </label>
        <textarea id="description" class="form-control" rows="8" name="description" placeholder="Description for the Product">{{old('description') }}</textarea>
    </div>
    <div class="form-group">
        <label>
          Stock:
        </label>
        <input type="number" class="form-control" name="stock" value="{{ old('stock') }}" placeholder="Stock ">
    </div>

    <div class="form-group">
        <label>
          Price:
        </label>
         <div class="input-group">
        <input type="number" step="any" class="form-control" name="price" value="{{ old('price') }}" placeholder="Price ">
        <span class="input-group-text" id="basic-addon3"><i class="far fa-money-bill-alt"></i></span>
        </div>
    </div>

    <div class="form-group">
        <label>
          Discount:
        </label>
        <div class="input-group">
        <input type="number" min="0" max="100" step="any" class="form-control" name="discount" value="{{ old('discount') }}" placeholder="Discount ">
        <span class="input-group-text" id="basic-addon2">%</span>
        </div>
    </div>
    <div class="form-group">
        <label>
          Brands:
        </label>
        <select class="form-control" name="brand_id">
          <option></option>
          @foreach(App\Models\Brand::get() as $brand)
            <option value="{{$brand->id}}">{{ $brand->title}}</option>
          @endforeach

        </select>
    </div>

    <div class="form-group">
        <label>
          Categories:
        </label>
        <select class="form-control" name="category_id" id="category_id">
          <option></option>
          @foreach(App\Models\Category::where('is_parent','1')->get() as $category) 
            <option value="{{$category->id}}">{{ $category->title}}</option>
          @endforeach
         
        </select>
    </div>

    
    <div class="form-group d-none" id="child_category_div">
        <label>
          Child Category:
        </label>
        <select class="form-control" name="child_category_id" id="child_category">
          
          

        </select>
    </div>

    <div class="form-group">
        <label>
          Size:
        </label>
        <select class="form-control" name="size">
          <option></option>
          <option value="S" {{ old('size')=='s'? 'selected': ''}} >Small</option>
          <option value="M" {{ old('size')=='m'? 'selected': ''}} >Medium</option>
          <option value="L" {{ old('size')=='l'? 'selected': ''}} >Large</option>
          <option value="XL" {{ old('size')=='xl'? 'selected': ''}} >Extra Large</option>
         
        </select>
    </div>


    <div class="form-group">
        <label>
          Conditions:
        </label>
        <select class="form-control" name="conditions">
          <option></option>
          <option value="new" {{ old('conditions')=='new'? 'selected': ''}} >New</option>
          <option value="popular" {{ old('conditions')=='popular'? 'selected': ''}}>Popular</option>
          <option value="winter" {{ old('conditions')=='winter'? 'selected': ''}}>Winter</option>
           <option value="summer" {{ old('conditions')=='summer'? 'selected': ''}}>Summer</option>
            <option value="featured" {{ old('conditions')=='featured'? 'selected': ''}}>Featured</option>


        </select>
    </div>

    <div class="form-group">
        <label>
          Vendors:
        </label>
        <select class="form-control" name="vendor_id">
          <option></option>
          @foreach(App\Models\User::where('role','seller')->get() as $vendor)
            <option value="{{$vendor->id}}">{{ $vendor->full_name}}</option>
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
    $(document).ready(function() {
    $('#summary ').summernote();
    });
  </script>
  <script>
    $('#category_id').change(function(){
      var category_id=$(this).val();
      if(category_id!=null){
        $.ajax({
          url:"/admin/category/"+category_id+"/child",
          type:"POST",
          data:{
            _token:"{{csrf_token()}}",
            category_id:category_id,
          },
          success:function(response)
          {
              var html_option="<option value=''>Child Category</option>"
              if(response.status)
              {
                $('#child_category_div').removeClass('d-none');
                $.each(response.data,function(id,title){
                    html_option += "<option value='"+id+"'>"+title+"</option>" 

                });
              }
              else
              {
                $('#child_category_div').addClass('d-none');
              }
              $('#child_category').html(html_option);
          }
        });
      }
    });
  </script>
 <script>
  document.getElementById("product").classList.add('active');

 
 </script>
@endsection