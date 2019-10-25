@extends('layouts.app')
@section('content')
@isset($photos)
<div id="grid">
    <ul>
        @foreach($photos as $photo)
            <li class="content-list"> 
                <a class="content-link">
                    <img src="storage/photos/{{$photo->thumbnail}}" class="content-image">
                    <p class="content-title">{{$photo->title}}</p>
                </a>
            </li>
        @endforeach
    </ul>
<div>
@endisset
@endsection