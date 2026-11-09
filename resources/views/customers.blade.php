@extends('layouts.app')

@section('title', 'User Accounts')

@section('content')

    <h1>User Accounts</h1>

    <p>List of registered staff users.</p>

    <a href="{{ route('users.create') }}">Create User</a>

    <div class="card">

        <table>

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Avatar</th>
                    <th>Username</th>
                    <th>Full Name</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($users as $user)

                    <tr>
                        <td>{{ $user->id }}</td>

                        <td>
                            @if ($user->avatar)
                                <img src="{{ asset('storage/' . $user->avatar) }}"
                                     width="50"
                                     height="50"
                                     style="object-fit: cover; border-radius: 50%;">
                            @else
                                <img src="{{ asset('images/placeholder.png') }}"
                                     width="50"
                                     height="50"
                                     style="object-fit: cover; border-radius: 50%;">
                            @endif
                        </td>

                        <td>{{ $user->username }}</td>
                        <td>{{ $user->full_name }}</td>

                        <td>
                            <a href="{{ route('users.edit', $user->id) }}">Edit</a>
                        </td>
                    </tr>

                @endforeach

            </tbody>

        </table>

    </div>

@endsection


