@extends('layouts.app')

@section('title', 'About')

@section('content')

    <div class="card">

        <h1>About Peralta POS</h1>

        <p>
            Peralta POS is a Point-of-Sale application
            developed using the Laravel framework.
        </p>

        <p>
            The system is designed to provide a simple
            and organized way to manage customer and
            staff account information.
        </p>

        <h2>Project Features</h2>

        <ul>
            <li>Landing Page</li>
            <li>About Page</li>
            <li>Customer Accounts</li>
            <li>User Accounts</li>
            <li>Static PHP Array Data Sources</li>
            <li>Blade Template Rendering</li>
            <li>Navigation Between Pages</li>
        </ul>

        <p>
            This version uses static PHP arrays as temporary
            data sources. Database integration can be added
            in a future version.
        </p>

    </div>

@endsection
