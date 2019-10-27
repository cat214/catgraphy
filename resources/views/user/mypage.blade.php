@extends('layouts.app')
@section('content')
    @if($user)
    <h1 class="mypage-username">{{$user->name}}の投稿</h1>
    @else
    ユーザー情報がありません
    @endif
    @isset($photos)
    <div id="grid">
    <ul>
        @foreach($photos as $photo)
            <li class="content-list"> 
                <a href="/photos/{{$photo->id}}" class="content-link">
                    <img src="storage/photos/{{$photo->thumbnail}}" class="content-image">
                    <p class="content-title">{{$photo->title}}</p>
                </a>
            </li>
        @endforeach
    </ul>
    <div>
@endisset
@endsection