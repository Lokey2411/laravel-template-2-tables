@extends('layout.app')
@section('content')
    <form action="{{ route('shops.update', $shop->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name">Name:</label>
            <input type="text" name="name" placeholder="Name" value="{{ $shop->name }}">
        </div>
        <div class="mb-3">
            <label for="address">Address:</label>
            <input type="text" name="address" placeholder="Address" value="{{ $shop->address }}">
        </div>
        <div class="mb-3">
            <label for="email">Email:</label>
            <input type="email" name="email" placeholder="Email" value="{{ $shop->email }}">
        </div>
        <div class="d-flex w-60 justify-content-between">
            <button type="button" onclick="goBack()" class="btn btn-danger rounded p-2">Back</button>
            <button type="submit" class="btn btn-success rounded p-2">Save</button>
        </div>
    </form>
    <script>
        function goBack() {
            window.history.goBack();
        }
    </script>
@endsection
