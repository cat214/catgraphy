@extends('layouts.app')
@section('content')
    @if($photo)
        <div class="content-detail">
            <h1 class="detail-title">{{$photo->title}}</h1>
            <img class="detail-image" src="/storage/photos/{{$photo->photo}}" alt="{{$photo->title}}">
            <p class="detail-description">{{$photo->description}}</p>    
        @if($photo->user_id === $user->id)
        <button type=“button” id="detail-link" class="btn btn-link" onclick="location.href='/photos/{{$photo->id}}/edit'">編集する</button>  
        <button type=“button” id="detail-danger" class="btn btn-danger" onclick="location.href='/photos/{{$photo->id}}/delete'">削除する</button>            
        @else

        @endif
        </div>
    @else
    <p>画像はありません</p>
    @endif
@endsection