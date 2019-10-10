<?php
    namespace App\Http\Controllers\Blog;

    use App\Models\Category;
    use App\Models\Post;
    use Faker\Provider\Base;
    use Illuminate\Http\Request;

    class MainController extends BaseController {
        public function main() {
            $categories = Category::all();

            return view('blog.main', compact('categories'));
        }

        public function index() {
            $categories = Category::all();

            return view('blog.index', ['categories' => $categories]);
        }

        public function showPosts($id, $page = 1) {
            $categories = Category::all();
            $posts = Category::find($id)->posts;
            $posts = BaseController::paginate($posts, 15, $page);

            return view('blog.posts', ['posts' => $posts, 'categories' => $categories]);
        }

        public function showPost($id) {
            $categories = Category::all();
            $post = Post::find($id);
            $author = $post->author;

            return view('blog.post', ['categories' => $categories, 'post' => $post, 'author' => $author]);
        }

        public function update($id, Request $request) {
            $categories = Category::all();
            $post = Post::find($id);
            $post->update($request->all());

            return view('blog.post', compact('post'), compact('categories'));
        }
    }
