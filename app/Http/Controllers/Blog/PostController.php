<?php

namespace App\Http\Controllers\Blog;

use App\Models\Post;
use App\Models\Category;

class PostController extends BaseController {
    public function create() {
        $categories = Category::all();

        return view('blog.addPost', compact('categories'));
    }

    public function store() {
        $validator = $this->validate(request(), [
            'title' => 'required|unique:posts|max:100',
            'text' => 'required|max:255'
        ]);

        if(!$validator) {
            return view('blog.addPost')->withErrors($validator);
        }

        $post = Post::create(request()->all());

        return redirect()->route('post', [$post->id]);
    }

    public function update($id) {
        $validator = $this->validate(request(), [
            'title' => 'required|unique:posts|max:100',
            'text' => 'required|max:255'
        ]);

        if(!$validator) {
            return view('blog.post', [$id])->withErrors($validator);
        }

        $categories = Category::all();
        $post = Post::find($id);
        $author = $post->author;
        $post->update(request()->all());

        return view('blog.post', ['post' => $post, 'categories' => $categories, 'author' => $author]);
    }
}