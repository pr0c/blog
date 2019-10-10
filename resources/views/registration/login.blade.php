@extends('registration.layouts.main')

@section('sidebar')

@endsection

<style>
    .auth-form {
        display: flex;
        flex-direction: column;
        width: 300px;
        height: 120px;
        justify-content: space-between;
    }
</style>

@section('content')
    <form method="post">
        <div class="auth-form form-group">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="text" name="nickname" placeholder="Nickname">
            <input type="password" name="password" placeholder="Password">
            <button class="btn btn-primary">Auth</button>
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
