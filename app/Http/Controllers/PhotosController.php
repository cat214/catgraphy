<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;
use Illuminate\Support\Facades\Log;
use Image;
use Illuminate\Support\Facades\Auth;


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
        //ユーザーIDを取得
        $user_id = Auth::id();
        //DBに各値を保存
        $photo = new Photo();
        $photo->user_id = $user_id;
        $photo->title = $request->title;
        $photo->description = $request->description;
        $photo->size = $request->file('photo')->getClientSize();
        $photo->photo = $filenameToStore;
        $photo->thumbnail = $path;
        $photo->save();

        return redirect('/index')->with('success','画像を保存しました');
    }

    public function detail(Request $request,$photo_id){
        $user = Auth::user();
        $photo = Photo::find($photo_id);
        return view('photos.detail',compact('user','photo'));
    }

    public function edit(Request $request,$photo_id){
        $photo = Photo::find($photo_id);
        return view('photos.edit')->with('photo',$photo);
    }

    public function update(Request $request,$photo_id){
        $update_validate_rule = [
            'title' => 'required',
            'description' => 'required',
        ];
        $this->validate($request,$update_validate_rule);
        //レコード取得
        $photo = Photo::find($photo_id);
        $photo->title = $request->title;
        $photo->description = $request->description;
        $photo->photo = $request->photo;
        $photo->size = $request->size;
        $photo->thumbnail = $request->thumbnail;
        $photo->save();

        return redirect('/index')->with('success','投稿を編集しました');
    }

    public function delete(Request $request,$photo_id){
        $photo = Photo::find($photo_id);
        $photo->delete();
        return redirect('/index')->with('success','投稿を削除しました');
    }
}