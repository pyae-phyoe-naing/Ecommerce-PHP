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
    <table id="category" class="table table-responsive-sm" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Created At</th>
                <th>Control</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($category as $val)
                <tr>
                    <td>{{ $val->name }}</td>
                    <td>{{ Carbon\Carbon::parse($val->created_at)->diffForHumans() }}</td>
                    <td>
                        <a href="#" class="bt btn-sm btn-info"><i class="feather-edit"></i></a>
                        <a onclick="myDel({{ $val->id }})"
                            class="bt btn-sm btn-danger"><i
                                class="feather-trash-2 text-white"></i></a>
                    </td>
                    <td>
                        <a href="#" class="btn btn-success btn-sm"><i class="feather-plus-circle"></i></a>
                    </td>

                </tr>
            @endforeach
        </tbody>

    </table>
    <div class="paginate mt-3 float-right">
        {!! $pages !!}
    </div>
</div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        $('#category').DataTable({
            "displayLength": 5,
            "bLengthChange": false,
            paging : false
        });
    });

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
                window.location=`/admin/category/${id}/delete`;
            }
        })
    }
</script>
@stop
