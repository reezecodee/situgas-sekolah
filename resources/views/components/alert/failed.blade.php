@if (session()->has('message'))
    <div class="alert alert-danger" id="temporary-alert">
        {{ session('message') }}
    </div>
@endif
