<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;


class UsersController extends Controller
{
    public function mypage(Request $request){
        $user = Auth::user();
        //ログイン中のユーザーIDと一致する投稿をphotosテーブルからとってくる
        $photos = User::find($user->id)->photos()->get();
        return view('user.mypage',compact('user','photos'));
    }
}
