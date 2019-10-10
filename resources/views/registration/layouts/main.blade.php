<!DOCTYPE>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        html, body {
            background-color: #fff;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        body {
            display: flex;
            flex-direction: row;
            width: 1400px;
            padding: 10px;
        }

        .sidebar {
            width: 200px;
            border: 1px solid #d3d3d3;
            border-radius: 3px;
        }

        .sidebar .menu-item {
            color: inherit;
            text-decoration: none;
        }

        .sidebar .menu-item:hover {
            color: black;
        }

        .content {
            margin: 15px;
            width: 100%;
        }

        .register-form {
            display: flex;
            flex-direction: column;
            width: 430px;
            height: 280px;
            justify-content: space-between;

            border: 1px solid #dededf;
            padding: 15px;
        }

        .register-form button {
            width: 100px;
        }

        .alert {
            width: 400px;
        }
    </style>
</head>
<body>
<div class="sidebar">
    @if(auth()->check())
        <div class="auth-user">
            <a class="nav-link" href="#">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }} ({{ auth()->user()->nickname }})</a>
            <a class="nav-link" href="{{ route('logout') }}">Logout</a>
        </div>
    @endif
    @yield('sidebar')
</div>
<div class="content">
    @yield('content')
</div>
</body>
</html>
