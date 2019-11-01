<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $fillable = ['comment','photo_id','user_id',];

    
    public function photo(){
        return $this->belongsTo('App\Photo');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

}
