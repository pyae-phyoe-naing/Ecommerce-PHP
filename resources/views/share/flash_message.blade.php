@if(App\Classes\Session::has('error'))
{{ App\Classes\Session::flash('error','','danger') }}
@endif
@if(App\Classes\Session::has('success'))
{{ App\Classes\Session::flash('success','') }}
@endif