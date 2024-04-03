@extends('layout.app')

@section('content')
    @include('components.messages')
    <form action="{{ route('products.update', $product->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name">Name:</label>
            <input type="text" name="name" placeholder="Name" value="{{ $product->name }}">
        </div>
        <div class="mb-3">
            <label for="description">Description:</label>
            <textarea type="text" name="description" placeholder="description">{{ $product->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="price">Price:</label>
            <input type="text" name="price" placeholder="Price" value="{{ $product->price }}">
        </div>
        <div>
            <label for="shop_id">Shop:</label>
            <select name="shop_id" id="">
                @foreach ($shops as $s)
                    @if ($s->id == $product->shopId)
                        <option value="{{ $s->id }}" selected>{{ $s->name }}</option>
                    @else
                        <option value="{{ $s->id }}">{{ $s->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="d-flex w-60 justify-content-between">
            <button type="button" onclick="goBack()" class="btn btn-danger rounded p-2">Back</button>
            <button type="submit" class="btn btn-success rounded p-2">Save</button>
        </div>
    </form>
@endsection
