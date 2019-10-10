@extends('registration.layouts.main')

@section('sidebar')
    <ul>
        <li><a href="/blog">Home</a></li>
    </ul>
@endsection

@section('content')
    <form method="post">
        <div class="register-form">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input class="form-control" type="text" name="nickname" placeholder="Nickname">
            <input class="form-control" type="text" name="first_name" placeholder="First name">
            <input class="form-control" type="text" name="last_name" placeholder="Last name">
            <input class="form-control" type="password" name="password" placeholder="Password">
            <input class="form-control" type="password" name="password_confirmation" placeholder="Password confirmation">
            <button class="btn btn-primary">Register</button>
        </div>
    </form>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
