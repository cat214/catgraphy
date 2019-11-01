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
@endsection