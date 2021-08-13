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

    <table id="product" class="table table-responsive-sm" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th>Photo</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>CreatedAt</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($product as $val)
                <tr>
                    <td>{{ $val->name }}</td>
                    <td>
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td><small class="badge badge-success">Category</small></td>
                                    <td><small>{{ $val->cat->name }}</small></td>
                                </tr>
                                <tr>
                                    <td><small class="badge badge-success">Sub Cat</small></td>
                                    <td><small>{{ $val->subcat->name }}</small></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                    <td>
                        <img src="{{ $val->image }}" height="60" width="60" alt="">
                    </td>
                    <td>{{ $val->price }} MMK</td>
                    <td>{{ $val->quantity }}</td>
                    <td>{{ Carbon\Carbon::parse($val->created_at)->diffForHumans() }}</td>
                    <td class="text-nowrap">
                        <a href="/admin/product/{{ $val->id }}/edit" class="btn btn-sm btn-info"><i class="feather-edit"></i></a>
                        <a onclick="myDel({{ $val->id }})" class="btn btn-sm btn-danger ml-3"><i class="feather-trash-2 text-white"></i></a>
                    </td>

                </tr>
            @endforeach
        </tbody>

    </table>
  <div class="float-right mt-3 paginate"> {!! $pages !!}</div>
</div>
</div>

@endsection

@section('scripts')
<script>
    $('#product').DataTable({
       "paging": false
    });
    // Delete Category
    function myDel(id) {
        Swal.fire({
            title: 'Are you sure delete?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Confirm'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = `/admin/product/${id}/delete`;
            }
        })
    }
</script>
@stop
