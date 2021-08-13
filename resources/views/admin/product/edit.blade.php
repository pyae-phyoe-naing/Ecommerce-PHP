@extends('admin/layouts/app')
@section('title', 'Create Product')
@section('product', 'mm-active')
@section('content')
{{-- Header --}}
<div class="app-page-title">
<div class="page-title-wrapper">
    <div class="page-title-heading">
        <div class="page-title-icon">
            <i class="feather-shopping-bag icon-gradient bg-mean-fruit">
            </i>
        </div>
        <div> Product</div>
    </div>
</div>
</div>
{{-- Content Area --}}
<div class="card">
<div class="card-header">Edit Product</div>
<div class="card-body px-5">
    @include('share.flash_message')
    <form action="/admin/product/{{ $product->id }}/edit" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ App\Classes\CSRFToken::_token() }}">
        <!-- Name and Price -->
        <div class="row">
            <div class="col-md-6 col-12">
                <div class="from-group">
                    <label for="name">Name</label>
                    <input value="{{ $product->name }}" type="text" name="name" class="form-control">              
                    <small class="text text-danger"><strong>{{ App\Classes\Session::error('name') }}</strong></small>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="from-group">
                    <label for="price">Price</label>
                    <input type="number" value="{{ $product->price }}" name="price" class="form-control">
                    <small class="text text-danger"><strong>{{  App\Classes\Session::error('price') }}</strong></small>
                </div>
            </div>
        </div>
        <!-- Cat and SubCat -->
        <div class="row my-2">
            <div class="col-md-6 col-12">
                <div class="from-group">
                    <label for="cat">Category</label>
                    <select onchange="catChange(event)" name="cat_id" id="cat" class="form-control">
                        @foreach ($cats as $val)
                            <option {{ $product->cat_id == $val->id ? "selected" : '' }} value="{{ $val->id }}">{{ $val->name }}</option>
                        @endforeach
                    </select>
                    <small class="text text-danger"><strong>{{ App\Classes\Session::error('cat_id') }}</strong></small>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="from-group">
                    <label for="subcat">Sub Cat</label>
                    <select name="sub_cat_id" id="subcat" class="form-control">
                    </select>
                    <small class="text text-danger"><strong>{{ App\Classes\Session::error('sub_cat_id') }}</strong></small>
                </div>
            </div>
        </div>
        <!--Image and Quantity -->
        <div class="row">
            <div class="col-md-5 col-12">
                <div class="from-group">
                    <label for="file">Photo</label>
                    <input type="file" name="file" class="form-control p-1">
                    <small class="text text-danger"><strong>{{ App\Classes\Session::error('file') }}</strong></small>
                </div>
            </div>
            <div class="col-12 col-md-1 d-flex justify-content-center align-items-center">
                <img src="{{ $product->image }}" height="50" width="50" alt="">
            </div>
            <div class="col-md-6 col-12">
                <div class="from-group">
                    <label for="quantity">Quantity</label>
                    <input type="number" value="{{ $product->quantity }}" name="quantity" class="form-control">
                    <small class="text text-danger"><strong>{{ App\Classes\Session::error('quantity') }}</strong></small>
                </div>
            </div>
        </div>
        <!--Description -->
        <div class="row mt-2">
            <div class="col-12">
                <div class="from-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description"  class=" form-control">{{ $product->description }}</textarea>
                    <small class="text text-danger"><strong>{{ App\Classes\Session::error('description') }}</strong></small>
                </div>
            </div>
        </div>
        <!--Create Button -->
        <div class="form-group mt-3">
            <button class="btn btn-primary">Update</button>
            <a href="/admin/product" class="btn btn-outline-secondary ml-3">Cancel</a>
        </div>

    </form>
</div>
</div>
@endsection
@section('scripts')
<script>

    let cats = "{{ $cats }}";
    cats = cats.replace(/&quot;/g, "\"");
    cats = JSON.parse(cats);

    let subcats = "{{ $subcats }}";
    subcats = subcats.replace(/&quot;/g, "\"");
    subcats = JSON.parse(subcats);

    let catChange = (e)=>{
        let catId = e.target.value;
        filterSubCat(catId);
    }
    let filterSubCat = (id)=>{
      let subs =  subcats.filter(s => s.cat_id == id);
      let str = '';
      let subcatId = "{{ $product->sub_cat_id }}";
      
      for(let sub of subs){
           let sel = subcatId == sub.id ? "selected" : '';
           console.log(sel);
           console.log(sub.id);
           console.log(subcatId);
            str += `<option ${sel}   value="${sub.id}">${sub.name}</option>`;
      }
      console.log(str);
      document.getElementById('subcat').innerHTML = str;
    }
    let selected = "{{ $product->cat_id }}";
   filterSubCat(selected)
</script>
@endsection
