@if (Session::has('success'))
<div class="alert alert-success" role="alert">
{{-- <div class=".text-success p-4 mb-3 rounded-sm shadow-sm"> --}}
    {{ Session::get('success') }}
</div>
@endif

@if (Session::has('error'))
<div class="alert alert-danger" role="alert">
        {{ Session::get('error') }}
</div>
@endif