<!DOCTYPE>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        ::-webkit-scrollbar {
            background: #F0F3F4;
            width: 0.5em;
            position: absolute;
        }

        ::-webkit-scrollbar-track {
            background: transparent;
            position: absolute;
            z-index: -2;
        }

        ::-webkit-scrollbar-thumb {
            border-radius: 100px;
            background: #888;
        }

        html, body {
            background-color: #F8F9FA;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        body {
            display: flex;
            flex-direction: row;
            width: 1400px;
        }

        .sidebar {
            display: flex;
            top: 90px;
            position: fixed;
            flex-direction: row;
            width: 200px;
            height: 1000px;
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
            display: flex;
            width: 100%;
            justify-content: center;
            margin-top: 100px;
        }

        .auth-user {
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
        }

        .auth-user a {
            color: black;
            text-decoration: none;
        }

        .auth-user a:hover {
            color: #a9a9a9;
        }

        .navbar {
            position: fixed;
            display: flex;
            width: 99.7%;
            height: 80px;
            border: 1px solid #dededf;
            background-color: #ececed;
            padding: 0 5px 0 5px !important;
        }

        .logo {
            width: 50px;
            height: 50px;
        }
    </style>
</head>
<body>
    <div class="navbar">
        {{ Html::image('img/logo.png', 'blog', array('class' => 'logo')) }}
        @if(auth()->check())
            <div class="auth-user">
                <a href="#">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }} ({{ auth()->user()->nickname }})</a>
                <a href="{{ route('logout') }}">Logout</a>
            </div>
        @endif
    </div>
    <div class="sidebar">
        @if(isset($categories))
            <ul>
                @foreach($categories as $category)
                    <li><a class="menu-item" href="{{ route('category', ['id' => $category->id])  }}">{{  $category->title  }}</a></li>
                @endforeach
            </ul>
        @endif
    </div>
    <div class="content">
        @yield('content')
    </div>
</body>
</html>
