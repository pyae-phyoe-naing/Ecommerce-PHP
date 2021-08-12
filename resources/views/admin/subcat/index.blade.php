@extends('admin/layouts/app')
@section('title', 'Sub Category')
@section('subcat', 'mm-active')
@section('content')
{{-- Header --}}
<div class="app-page-title">
<div class="page-title-wrapper">
    <div class="page-title-heading">
        <div class="page-title-icon">
            <i class="feather-credit-card icon-gradient bg-mean-fruit">
            </i>
        </div>
        <div> Sub Cat</div>
    </div>
</div>
</div>
{{-- Content Area --}}
<div class="card">
<div class="card-header">
    SubCat List
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
        <tbody>
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
        </tbody>

    </table>

</div>
</div>

@endsection
@section('modal')

<!-- CSub Category Edit Modal Start  -->

<div class="modal fade subcat_edit" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Sub Category</h5>
        </div>
        <div class="modal-body">
            <form id="edit_sub_cat">
                <input type="hidden" id="subcat_token" value="{{ App\Classes\CSRFToken::_token() }}">
                <input type="hidden" id="subcat_id">
                <div class="form-group">
                    <label for="cat_name">Category Name</label>
                    <input type="text" readonly id='parent_cat_name' class="form-control">
                </div>
                <div class="form-group">
                    <label for="cat_name">Sub Category Name</label>
                    <input required type="text" id='sub_cat_name' class="form-control">
                    <small class="text text-danger"><strong id='valid_subcat'></strong></small>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button form="edit_sub_cat" onclick="updateCat(event)" class="btn btn-primary">Update</button>
        </div>
    </div>
</div>
</div>
<!-- Sub Category Create Modal End  -->
@endsection
@section('scripts')
<script>
    $('#subcat').DataTable({
        "displayLength": 5,
        "bLengthChange": false,
        "paging": true
    });


    // Edit Category
    function editCat(id, name, parent_name) {
        $('#subcat_id').val(id);
        $('#sub_cat_name').val(name);
        $('#parent_cat_name').val(parent_name);
        $('#valid_subcat').text('');
        $('.subcat_edit').modal('show');
    }

    function updateCat(event) {
        event.preventDefault();

        var token = $('#subcat_token').val();
        var id = $('#subcat_id').val();
        var name = $('#sub_cat_name').val();
        if (name === '') {
            $('#valid_subcat').text('Name field is required');
        } else {
            if (name.length < 3) {
                $('#valid_subcat').text('Name is at least 3 character');
            } else {
                $.ajax({
                    type: 'POST',
                    url: `/admin/subcat/${id}/update`,
                    data: {
                        id,
                        token,
                        name
                    },
                    success: function(response) {
                        var res = JSON.parse(response);
                        if (res.success) {
                            $('.subcat_edit').modal('hide');
                            location.reload();
                        } else {
                            $('.subcat_edit').modal('hide');
                            toastModal('error', 'Error...', res.message);
                        }
                    }
                })
            }
        }
    }
</script>
@stop
