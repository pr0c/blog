@extends('blog.layouts.main')

<style>
    .title {

    }
</style>

@section('content')
    @foreach($posts as $post)
        <div class="post">
            <div class="title">
                <a href="{{ route('post', ['id' => $post->id]) }}">{{ $post->title }}</a>
                <span class="author">{{ $post->author->nickname }}</span>
            </div>
            <div class="text">{{ $post->text }}</div>
        </div>
    @endforeach
@endsection
