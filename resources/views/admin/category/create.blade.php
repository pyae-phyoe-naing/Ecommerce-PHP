@extends('admin/layouts/app')
@section('title', 'Category')
@section('category', 'mm-active')
@section('content')
{{-- Header --}}
<div class="app-page-title">
<div class="page-title-wrapper">
    <div class="page-title-heading">
        <div class="page-title-icon">
            <i class="feather-grid icon-gradient bg-mean-fruit">
            </i>
        </div>
        <div> Category</div>
    </div>
</div>
</div>
{{-- Content Area --}}
<div class="card">
<div class="card-header">Create Category</div>
<div class="card-body p-5">
    @include('share.flash_message')
    <form action="/admin/category/create" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ App\Classes\CSRFToken::_token() }}">
        <div class="from-group">
            <label for="name">Category Name</label>
            <input type="text" name="name" class="form-control">
            <small class="text text-danger"><strong>{{ App\Classes\Session::error('name') }}</strong></small>

        </div>

        <div class="form-group mt-3">
            <button class="btn btn-primary">Create</button>
            <a href="/admin/category" class="btn btn-outline-secondary ml-3">Cancel</a>
        </div>

    </form>
</div>
</div>
@endsection
@section('scripts')

@endsection
