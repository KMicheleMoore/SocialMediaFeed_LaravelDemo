@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Admin Users') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-{{ session('status_type') ?? 'success' }}" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a class="btn btn-outline-primary" href="{{ route('admin.users.create') }}">Create New Admin User</a>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Roles</th>
                            <th scope="col" colspan="3">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($adminUsers as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <ul>
                                            @foreach($user->roles as $role)
                                                <li>{{ $role->name }}</li>
                                            @endforeach
                                        </ul>
                                    </td>

                                    <td>
                                        <a class="btn btn-warning" href="{{ route('admin.users.edit', $user->id) }}">Edit</a>
                                    <td>
                                        <form method="post" action="{{ route('admin.users.destroy', $user->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
