@extends('layouts.app')

@section('title', 'Edit User')

@section('content')

    <h1>Edit User</h1>

    @if ($errors->any())
        <div class="card">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <div class="card">

        <form action="{{ route('users.update', $user->id) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <label>Username</label>
            <input type="text" name="username"
                   value="{{ old('username', $user->username) }}" required>

            <br><br>

            <label>Full Name</label>
            <input type="text" name="full_name"
                   value="{{ old('full_name', $user->full_name) }}" required>

            <br><br>

            <label>Current Avatar</label>

            @if ($user->avatar)
                <br>
                <img src="{{ asset('storage/' . $user->avatar) }}"
                     width="100" height="100"
                     style="object-fit: cover; border-radius: 50%;">
            @else
                <p>No avatar uploaded.</p>
            @endif

            <br><br>

            <label>Upload New Profile Picture</label>
            <input type="file" name="avatar" accept="image/*">

            <p>Maximum file size: 2MB.</p>

            <br>

            <button type="submit">Update User</button>

            <a href="{{ route('users.index') }}">Cancel</a>

        </form>

    </div>

@endsection
