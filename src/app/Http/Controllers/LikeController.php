<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class LikeController extends Controller
{
    public function store($id)
    {
        //$user = auth()->user();
        $user = \App\Models\User::first();
        //ログイン機能実装したら↑消してコメントアウト消して$user = auth()->user();に切り替え

        if ($user->likedPosts()->where('post_id', $id)->exists()) {
            $user->likedPosts()->detach($id);
        } else {
            $user->likedPosts()->attach($id);
        }

        return response()->json([
            'status' => 'ok'
        ]);
    }

    public function show($id)
    {
        //$user = auth()->user();
        $user = \App\Models\User::first();
        //ログイン機能実装したら↑消して$user = auth()->user();に切り替え

        $liked = $user
            ->likedPosts()
            ->where('post_id', $id)
            ->exists();

        return response()->json([
            'liked' => $liked
        ]);
    }
}
