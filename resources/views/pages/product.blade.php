@extends('layout.app')
@section('content')
    @include('components.messages')
    <button class="btn btn-danger mb-3" onclick="openCreateForm()">Create</button>
    <form action="{{ route('products.search.post') }}" method="POST">
        @csrf
        <input type="text" name="search">
        <button type="submit" class="btn btn-primary">Search</button>
    </form>
    <table class="table table-dark table-hover">
        <thead>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Description</th>
            <th scope="col">Shop Name</th>
            <th scope="col">Actions</th>
        </thead>
        <tbody>
            @foreach ($products as $p)
                <tr>
                    <td>{{ $p->id }}</td>
                    <td>{{ $p->name }}</td>
                    <td>{{ $p->price }}</td>
                    <td>{{ Str::limit($p->description, 100) }}</td>
                    <td>{{ $p->shop->name }}</td>
                    <td><a href="{{ route('products.show', $p->id) }}" class="btn btn-info">Show</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div id="form-create" class=" fixed-bottom fixed-top model d-none justify-content-center align-items-center">
        <form action="{{ route('products.store') }}" method="post" class="p-5 bg-white rounded">
            @csrf
            <div class="mb-3">
                <label for="name">Name:</label>
                <input type="text" name="name" placeholder="Name">
            </div>
            <div class="mb-3">
                <label for="price">Price:</label>
                <input type="text" name="price" placeholder="Price">
            </div>
            <div class="mb-3">
                <label for="description">Description:</label>
                <input type="text" name="description" placeholder="Description">
            </div>
            <div class="mb-3">
                <label for="shop_id">Shop :</label>
                <select name="shop_id" id="">
                    @foreach ($shops as $s)
                        <option value="{{ $s->id }}">{{ $s->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="d-flex w-60 justify-content-between">
                <button type="button" onclick="hideCreateForm()" class="btn btn-danger rounded p-2">Cancel</button>
                <button type="submit" class="btn btn-success rounded p-2">Create</button>
            </div>
        </form>
    </div>
    <script>
        function openCreateForm() {
            document.getElementById('form-create').classList.add("d-flex");
            document.getElementById('form-create').classList.remove("d-none");
        }

        function hideCreateForm() {
            document.getElementById('form-create').classList.remove("d-flex");
            document.getElementById('form-create').classList.add("d-none");
        }
    </script>
    {{ $products->links('components.pagination') }}
@endsection
