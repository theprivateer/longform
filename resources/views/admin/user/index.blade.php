@extends('admin.layouts.app')

@section('content')
    <a href="{{ route('admin.user.create') }}" class="btn btn-default">Create User</a>

    <table class="table table-striped">
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ route('admin.user.edit', $user->uuid) }}" class="btn btn-sm btn-default">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection