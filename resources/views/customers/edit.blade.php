@extends('layouts.app')

@section('title', 'Edit Customer')

@section('content')

    <h1>Edit Customer</h1>

    @if ($errors->any())
        <div class="card">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <div class="card">

        <form action="{{ route('customers.update', $customer->id) }}" method="POST">

            @csrf
            @method('PUT')

            <label>Full Name</label>
            <input type="text" name="full_name"
                   value="{{ old('full_name', $customer->full_name) }}" required>

            <br><br>

            <label>Email</label>
            <input type="email" name="email"
                   value="{{ old('email', $customer->email) }}" required>

            <br><br>

            <label>Phone</label>
            <input type="text" name="phone"
                   value="{{ old('phone', $customer->phone) }}">

            <br><br>

            <button type="submit">Update Customer</button>

            <a href="{{ route('customers.index') }}">Cancel</a>

        </form>

    </div>

@endsection
