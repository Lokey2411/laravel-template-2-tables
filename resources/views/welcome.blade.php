@extends('layout.app')
@section('content')
    <table class="table">
        <thead>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Address</th>
            <th scope="col">Email</th>
        </thead>
        <tbody>
            @foreach ($shops as $s)
                <tr>

                    <td>{{ $s->id }}</td>
                    <td>{{ $s->name }}</td>
                    <td>{{ $s->address }}</td>
                    <td>{{ $s->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $shops->links('components.pagination') }}
@endsection
