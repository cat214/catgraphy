@extends('layouts.app')
@section('content')
    @if($photo)
        <div class="content-detail">
            <h1 class="detail-title">{{$photo->title}}</h1>
            <img class="detail-image" src="/storage/photos/{{$photo->photo}}" alt="{{$photo->title}}">
            <p class="detail-description">{{$photo->description}}</p>
            <p  id="detail-post-username">posted by {{$photo->user->name}}</p>
            @if(Auth::check())    
                @if($user->id === $photo->user_id)
                    <button type=“button” id="detail-link" class="btn btn-link" onclick="location.href='/photos/{{$photo->id}}/edit'">編集する</button>  
                    <button type=“button” id="detail-danger" class="btn btn-danger" onclick="location.href='/photos/{{$photo->id}}/delete'">削除する</button>            
                @endif
            @else
            @endif
        </div>
    @else
    <p>画像はありません</p>
    @endif
    @if($comments)
        <div class="container">
            <div class="row">
                @foreach($comments as $comment)
                    <div class="col-md-8 col-md-offset-2 photo-comment">
                        <p>投稿者:{{$comment->user->name}}さん</p>
                        <p>{{$comment->comment}}</p>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
    @if(Auth::check())
        <div class="form">
            <h1 class="post-title">コメントする</h1>
            <form action="/photos/{{$photo->id}}/comment/upload" method="post">
                    {{ csrf_field() }}
                    @if ($errors->has('comment'))
                        <span class="help-block">
                            <strong>{{ $errors->first('comment') }}</strong>
                        </span>
                    @endif
                    <textarea name="comment" class="feedback-input">コメント</textarea>
                    <input type="submit" value="コメントする"">
            </form>
        </div>
    @else
        <p>コメントするにはログインする必要があります</p>
    @endif
@endsection