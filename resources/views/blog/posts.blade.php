@extends('blog.layouts.main')

<style>
    .posts {
        display: flex;
        flex-direction: column;
    }

    .posts .post:not(:first-of-type) {
        margin-top: 15px;
    }
</style>

@section('content')
    <div class="posts">
        @foreach($posts as $post)
            {{--<div class="post">
                <div class="title">
                    <a href="{{ route('post', ['id' => $post->id]) }}">{{ $post->title }}</a>
                    <span class="author">{{ $post->author->nickname }}</span>
                </div>
                <div class="text">{{ $post->text }}</div>
            </div>--}}
            @component('blog.components.post', [
                'post' => $post,
                'author' => $post->author
            ])
            @endcomponent
        @endforeach
    </div>
@endsection
