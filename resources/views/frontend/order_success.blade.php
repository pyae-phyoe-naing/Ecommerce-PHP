@extends('frontend.layouts.app')
@section('cart', 'active')
@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-12">
            <div class="card  mt-5 shadow">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="text-success d-inline">Successfully Order Send ...</h5>
                   <span class="badge badge-primary"> <i class="feather-message-square"></i> </span>
                </div>
                <div class="card-body">
                    <h6>Admin will contact you soon !</h6>
                </div>
                <div class="card-footer">
                    <a href="/" class="btn-success btn">I Know</a>
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
