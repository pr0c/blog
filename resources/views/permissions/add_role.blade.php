@extends('layouts.main')

<style>
    .form {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 80px;
        width: 300px;
    }

    .form button {
        width: 30%;
    }

    .page-content {
        display: flex;
        flex-direction: column;
    }
</style>

@section('content')
    <div class="page-content">
        <form class="form" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="text" name="title" class="form-control" placeholder="Title">
            <button class="btn btn-primary">Add</button>
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
    </div>
@endsection
