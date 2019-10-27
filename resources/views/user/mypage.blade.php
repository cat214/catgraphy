@extends('layouts.app')
@section('content')
    @if(Auth::check())
    <form class="mypage-form"action="/logout" method="post">
    {{ csrf_field() }}
    <input type="hidden" name="name" value="{{$user->name}}">
    <input type="submit" calss="btn btn-primary" name="logout" value="ログアウト">
    </form>
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