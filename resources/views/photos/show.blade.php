@extends('layouts.app')
@section('content')
    @if($photo)
        <div class="content-detail">
            <h1 class="detail-title">{{$photo->title}}</h1>
            <img class="detail-image" src="/storage/photos/{{$photo->photo}}" alt="{{$photo->title}}">
            <p class="detail-description">{{$photo->description}}</p>    
        </div>
    @else
    <p>画像はありません</p>
    @endif
@endsection