<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct()
    {
        // require authentication for create/update/delete
        $this->middleware('auth')->except(['index','show']);
    }

    // Public listing: only published and public posts
    public function index()
    {
        $posts = Post::where('status', 'published')->where('is_public', true)
            ->orderByDesc('published_at')->paginate(10);
        return view('posts.index', compact('posts'));
    }

    // Public show: show only published unless owner
    public function show(Post $post)
    {
        if ($post->status !== 'published' && (!Auth::check() || Auth::id() !== $post->user_id)) {
            abort(404);
        }
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);
        $data['user_id'] = Auth::id();
        $data['status'] = 'pending';
        $post = Post::create($data);
        return redirect()->route('posts.show', $post)->with('success', '发布已提交，等待审核。');
    }

    public function edit(Post $post)
    {
        $this->authorize('update', $post);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $this->authorize('update', $post);
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);
        $data['status'] = 'pending';
        $post->update($data);
        return redirect()->route('posts.show', $post)->with('success', '更新已提交，等待审核。');
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();
        return redirect()->route('posts.index')->with('success', '帖子已删除。');
    }
}
