<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{   
    protected $table = 'photos';
    protected $fillable = ['title','description','photo','user_id','thumbnail',];

    // バリデーションのルール追加する
    public static $rules = array(
        'title' => 'required',
        'description' => 'required',
        'photo' => 'required|image|max:2048',
    );
    
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function comments(){
        return $this->hasMany('App\Comment');
    }
}
