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
        <div class="card-header d-flex justify-content-between">
            Category List
            <a href="/admin/category/create" class="btn btn-primary ">create</a>
        </div>
        <div class="card-body">

        </div>
    </div>
@endsection
