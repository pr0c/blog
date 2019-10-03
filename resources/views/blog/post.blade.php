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
    <div class="edit-post">
        <input type="text" value="{{ $post->title }}">
        <textarea class="text">{{ $post->text }}</textarea>
        <button>Save</button>
    </div>
@endsection
