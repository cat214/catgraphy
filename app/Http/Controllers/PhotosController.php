<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;
use Illuminate\Support\Facades\Log;


class PhotosController extends Controller
{   
    public function index(){
        Log::debug('トップページ表示');
        return view('photos.index');
    }

    public function create(){
        Log::debug('投稿画面表示');
        return view('photos.create');
    }

    public function upload(Request $request){
        Log::debug('upload　function');
        Log::debug('バリデーションはいります');
        $this->validate($request,Photo::$rules);
        //画像の保存処理
        Log::debug('写真あり');
        $filenameWithExtension = $request->file('photo')->getClientOriginalName();
        $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);
        $extension = $request->file('photo')->getClientOriginalExtension();
        $filenameToStore = $filename.'_'.time().'.'.$extension;
        // ローカルへ保存
        $path = $request->file('photo')->storeAs('public/photos', $filenameToStore);
        //値を設定する
        //モデルのインスタンス作成
        $photo = new Photo();
        $photo->title = $request->title;
        $photo->description = $request->description;
        $photo->size = $request->file('photo')->getClientSize();
        $photo->photo = $filenameToStore;
        //インスタンスを保存する
        $photo->save();
        Log::debug('/indexへリダイレクト');
        return redirect('/index');
    }
}