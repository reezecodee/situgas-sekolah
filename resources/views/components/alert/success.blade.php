@if (session()->has('message'))
    <div class="alert alert-success" id="temporary-alert">
        {{ session('message') }}
    </div>
@endif
