@extends('frontend.layouts.app')
@section('home', 'active')
@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-12">
            <div class="card  mt-5 shadow">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="text-primary d-inline">{{ $product->name }}</h5>
                   <span class="btn btn-sm btn-primary"> <i class="feather-info"></i> </span>
                </div>
                <div class="card-body">
                    <div class="row justify-content-start">
                        <div class="col-md-4 col-12">
                           <img src="{{ $product->image }}" height="250" alt="" >
                        </div>
                        <div class="col-md-4 col-12 mt-md-0 mt-4 pt-2">
                            <p >Category : <strong class="badge badge-danger">{{ $cat->name }}</strong> </p>
                            <p >SubCategory : <strong class="badge badge-info">{{ $subcat->name }}</strong> </p>
                            <p >Price - <strong class="text-success">{{ $product->price }}</strong> MMK</p>
                            <p >Avalible - <strong class="text-danger">{{ $product->quantity }}</strong></p>
                            <hr>
                            <p>
                                {{ $product->description }}
                            </p>
                            <hr>
                            <p>
                                <button onclick="addCart({{ $product->id }})" class="btn btn-primary rounded-0"> Add To Cart</button>
                            </p>
                        </div>
                        <div class="col-12 ">
                            <button class="float-right d-block mt-3 btn btn-outline-success" onclick="history.back()" >Back</button>
                        </div>
                    </div>
                </div>
               
            </div>

        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
 
</script>
@endsection
