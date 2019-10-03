<?php
    namespace App\Http\Controllers\Blog;

    use App\Models\Category;
    use App\Models\Post;

    class MainController extends BaseController {
        public function index() {
            $categories = Category::all();

            return view('blog.index', ['categories' => $categories]);
        }

        public function showPosts($id) {
            $categories = Category::all();
            $posts = Category::find($id)->posts;

            return view('blog.posts', ['posts' => $posts, 'categories' => $categories]);
        }

        public function showPost($id) {
            $categories = Category::all();
            $post = Post::find($id);

            return view('blog.post', ['post' => $post, 'categories' => $categories]);
        }
    }
