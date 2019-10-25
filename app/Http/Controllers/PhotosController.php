<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;
use Illuminate\Support\Facades\Log;
use Image;


class PhotosController extends Controller
{   
    public function index(){
        Log::debug('トップページ表示');
        $photos = Photo::all();
        return view('photos.index')->with('photos',$photos);
    }

    public function create(){
        Log::debug('投稿画面表示');
        return view('photos.create');
    }

    public function upload(Request $request){
        $this->validate($request,Photo::$rules);
        //拡張子もつけたファイル名を取得
        $filenameWithExtension = $request->file('photo')->getClientOriginalName();
        //拡張子外したファイル名をファイル名を取得
        $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);
        //拡張子を取得
        $extension = $request->file('photo')->getClientOriginalExtension();
        //保存用の名前を作成
        $filenameToStore = $filename.'_'.time().'.'.$extension;
        $path = 'thumbnails/'.$filenameToStore;
        //オリジナルとサムネイル用に画像を保存
        $request->file('photo')->storeAs('public/photos',$filenameToStore);
        $request->file('photo')->storeAs('public/photos/thumbnails',$filenameToStore);
        //サムネイル画像をリサイズして上書き
        $thumbnailpath = public_path('storage/photos/thumbnails/'.$filenameToStore);
        $image = Image::make($thumbnailpath)->resize(500,300)->save($thumbnailpath);
        //DBに各値を保存
        $photo = new Photo();
        $photo->title = $request->title;
        $photo->description = $request->description;
        $photo->size = $request->file('photo')->getClientSize();
        $photo->photo = $filenameToStore;
        $photo->thumbnail = $path;
        $photo->save();

        return redirect('/index')->with('success','画像を保存しました。');
    }

    public function show(Request $request,$photo_id){
        $photo = Photo::find($photo_id);
        return view('photos.show')->with('photo',$photo);
    }
}