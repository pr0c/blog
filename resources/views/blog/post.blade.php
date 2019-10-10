@extends('blog.layouts.main')

<style>
    .edit-post {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        border: 1px solid #dededf;
        width: 500px;
        height: 350px;
        padding: 10px;
    }

    .edit-post .text {
        height: 300px;
    }

    .edit-post button {
        width: 80px;
    }
</style>

@section('content')
    @auth
        @if(auth()->user()->id == $author->id)
            <form method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="edit-post">
                    <input class="form-control" type="text" name="title" value="{{ $post->title }}">
                    <textarea class="text form-control" name="text">{{ $post->text }}</textarea>
                    <button class="btn btn-primary">Save</button>
                </div>
            </form>
        @else
            <div class="post">
                <div class="title">{{ $post->title }}<span class="author">{{ $author->nickname }}</span></div>
                <div class="text">{{ $post->text }}</div>
            </div>
        @endif
    @endauth
    @guest
        <div class="post">
            <div class="title">{{ $post->title }}<span class="author">{{ $author->nickname }}</span></div>
            <div class="text">{{ $post->text }}</div>
        </div>
    @endguest

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
