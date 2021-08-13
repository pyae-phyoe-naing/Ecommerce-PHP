@if(App\Classes\Session::has('error'))
{{ App\Classes\Session::flash('error','','danger') }}
@endif
@if(App\Classes\Session::has('success'))
{{ App\Classes\Session::flash('success','') }}
@endif

{{-- @if(App\Classes\Session::has('errors'))
  @foreach(App\Classes\Session::get('errors') as $key=>$error)
  <div class='alert alert-danger alert-dismissible fade show' role='alert'>
    {{ $error }}
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
    </button>
    </div>
  @endforeach
@endif --}}