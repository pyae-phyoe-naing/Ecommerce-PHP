@extends('admin/layouts/app')
@section('title', 'Product')
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
        <div> Product </div>
    </div>
</div>
</div>
{{-- Content Area --}}
<div class="card">
    <div class="card-header d-flex justify-content-between">
        Product List
        <a href="/admin/product/create" class="btn btn-primary ">create</a>
    </div>
<div class="card-body">

    <table id="subcat" class="table table-responsive-sm" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Category</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        {{-- <tbody>
            @foreach ($category as $val)
                <tr>
                    <td>{{ $val->name }}</td>
                    <td>{{ $val->cat->name }}</td>
                    <td>{{ Carbon\Carbon::parse($val->created_at)->diffForHumans() }}</td>
                    <td>
                        <span
                            onclick="editCat('{{ $val->id }}','{{ $val->name }}','{{ $val->cat->name }}')"
                            class="bt btn-sm btn-info"><i class="feather-edit"></i></span>
                        <a onclick="myDel({{ $val->id }})" class="bt btn-sm btn-danger ml-3"><i
                                class="feather-trash-2 text-white"></i></a>
                    </td>

                </tr>
            @endforeach
        </tbody> --}}

    </table>

</div>
</div>

@endsection

@section('scripts')
<script>
    $('#subcat').DataTable({
        "displayLength": 5,
        "bLengthChange": false,
        "paging": true
    });

</script>
@stop
