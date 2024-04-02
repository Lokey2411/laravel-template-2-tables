@extends('layout.app')
@section('content')
    <table class="table table-dark table-hover">
        <thead>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Description</th>
            <th scope="col">Shop Name</th>
        </thead>
        <tbody>
            @foreach ($products as $p)
                <tr>
                    <td>{{ $p->id }}</td>
                    <td>{{ $p->name }}</td>
                    <td>{{ $p->price }}</td>
                    <td>{{ substr($p->description, 100) }}</td>
                    <td>{{ $p->shop->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $products->links('components.pagination') }}
@endsection
