@extends('layout.app')
@section('content')
    <button class="btn btn-danger mb-3" onclick="openCreateForm()">Create</button>
    <table class="table table-dark table-hover">
        <thead>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Address</th>
            <th scope="col">Email</th>
            <th scope="col">Actions</th>
        </thead>
        <tbody>
            @foreach ($shops as $s)
                <tr>
                    <td>{{ $s->id }}</td>
                    <td>{{ $s->name }}</td>
                    <td>{{ $s->address }}</td>
                    <td>{{ $s->email }}</td>
                    <td colspan="2">
                        <a href="{{ route('shops.show', $s->id) }}" class="btn btn-info">Show</a>
                        <button class="btn btn-danger p-2 rounded-2" onclick="showMessage({{ $s->id }})">
                            @csrf
                            Delete</button>
                        <div id="confirm-{{ $s->id }}"
                            class="fixed-top fixed-bottom model justify-content-center align-items-center modal d-none">
                            <div class="bg-light w-50 p-5 rounded-2">
                                <p>Are you sure you want to delete this shop?</p>
                                <button type="button" class="btn btn-danger rounded p-2"
                                    onclick="document.getElementById('confirm-{{ $s->id }}').classList.add('d-none');
                                    document.getElementById('confirm-{{ $s->id }}').classList.remove('d-flex'); ">Cancel</button>
                                <form action="{{ route('shops.destroy', $s->id) }}" method="POST"><button type="submit"
                                        class="btn btn-primary rounded p-2">
                                        @csrf
                                        @method('DELETE')
                                        Delete</button></form>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $shops->links('components.pagination') }}
    <div id="form-create" class=" fixed-bottom fixed-top model d-none justify-content-center align-items-center">
        <form action="{{ route('shops.store') }}" method="post" class="p-5 bg-white rounded">
            @csrf
            <div class="mb-3">
                <label for="name">Name:</label>
                <input type="text" name="name" placeholder="Name">
            </div>
            <div class="mb-3">
                <label for="address">Address:</label>
                <input type="text" name="address" placeholder="Address">
            </div>
            <div class="mb-3">
                <label for="email">Email:</label>
                <input type="email" name="email" placeholder="Email">
            </div>
            <div class="d-flex w-60 justify-content-between">
                <button type="button" onclick="closeCreateModel()" class="btn btn-danger rounded p-2">Cancel</button>
                <button type="submit" class="btn btn-success rounded p-2">Create</button>
            </div>
        </form>
    </div>
    <script>
        function openCreateForm() {
            document.getElementById('form-create').classList.add("d-flex");
            document.getElementById('form-create').classList.remove("d-none");
        }

        function closeCreateModel() {
            document.getElementById('form-create').classList.remove("d-flex");
            document.getElementById('form-create').classList.add("d-none");
        }

        function showMessage(id) {
            document.getElementById(`confirm-${id}`).classList.remove("d-none");
            document.getElementById(`confirm-${id}`).classList.add("d-flex");
        }
    </script>
@endsection
