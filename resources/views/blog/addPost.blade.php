@extends('blog.layouts.main')

<style>
    .auth-form {
        display: flex;
        height: 200px;
        width: 400px;
        justify-content: space-between;
        flex-direction: column;
    }

    .auth-form button {
        width: 100px;
    }
</style>

@section('content')
    <form method="post">
        <div class="auth-form">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            @if(auth()->check())
                <input type="hidden" name="author_id" value="{{ auth()->user()->id }}">
            @endif
            <select name="category_id" class="form-control">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
            <input class="form-control" type="text" name="title" placeholder="Title">
            <textarea class="form-control" name="text" placeholder="Text"></textarea>
            <button class="btn btn-primary">Add</button>
        </div>
    </form>
@endsection
