@extends('blog.layouts.main')

@section('content')
    @foreach($posts as $post)
        <div class="post">
            <div class="title">
                <a href="{{ route('post', ['id' => $post->id]) }}">{{ $post->title }}</a>
            </div>
            <div class="text">{{ $post->text }}</div>
        </div>
    @endforeach
@endsection
