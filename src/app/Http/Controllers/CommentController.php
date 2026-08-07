<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\User;

class CommentController extends Controller
{
    public function store(Request $request, $id)
    {
        $user = User::first();

        Comment::create([
            'user_id' => $user->id,
            'post_id' => $id,
            'text' => $request->text,
        ]);

        return response()->json([
            'status' => 'ok'
        ]);
    }

    public function show($id)
    {
        $comments = Comment::with('user')
            ->where('post_id', $id)->get();

        return response()->json($comments);
    }
}
