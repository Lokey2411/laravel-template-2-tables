@if ($errors->any())
    @foreach ($errors->all() as $e)
        <p class="alert alert-danger">{{ $e }}</p>
    @endforeach
@endif
@if (session()->has('error'))
    <p class="alert alert-danger">{{ session('error') }}</p>
@endif
@if (session()->has('message'))
    <p class="alert alert-success">{{ session('message') }}</p>
@endif
