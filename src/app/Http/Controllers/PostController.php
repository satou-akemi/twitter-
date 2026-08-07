<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::with('user')->withCount('likes')
            ->withCount('comments')
            ->get();

        return response()->json($posts);
    }

    public function store(Request $request)
    {
        $user = User::first();

        Post::create([
            'user_id' => $user->id,
            'text' => $request->text,
        ]);

        return response()->json([
            'status' => 'ok'
        ]);
    }

    public function show($id)
    {
        $post = Post::with('user')
            ->withCount('likes')
            ->findOrFail($id);

        return response()->json($post);
    }

    public function destroy($id)
    {
        Post::findOrFail($id)->delete();

        return response()->json([
            'status' => 'ok',
        ]);
    }
}
