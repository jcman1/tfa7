@extends('layouts.app')

@section('title', 'Home')

@section('content')

    <div class="card">

        <h1>Welcome to Peralta POS</h1>

        <p>
            Welcome to the Point-of-Sale Management System.
            This application provides a simple interface for
            managing customer accounts and staff user accounts.
        </p>

        <p>
            Use the navigation menu to explore the different
            sections of the application.
        </p>

        <br>

        <a href="{{ url('/customers') }}" class="button">
            Customer Accounts
        </a>

        <a href="{{ url('/users') }}" class="button">
            User Accounts
        </a>

    </div>

@endsection
