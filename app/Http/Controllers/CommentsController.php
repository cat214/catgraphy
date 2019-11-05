<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CommentsController extends Controller
{
    public function upload(Request $request){
        // $this->validate($request, ['comments' => 'required']);
        $user_id = Auth::id();
        $photo_id = $request->photo_id;
        $comment = new Comment();
        $comment->comment = $request->comment;
        $comment->photo_id = $photo_id;
        $comment->user_id = $user_id;
        $comment->save();
        return back();
    }
}
