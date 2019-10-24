@extends('layouts.app')
@section('content')
@isset($photos)
<div class="float_box">
    <ul>
        @foreach($photos as $photo)
            <li class="content-list"> <!-- ▼ アイテム -->
                <a href="/photos/{{$photo->id}}">
                    <img src="storage/photos/{{$photo->thumbnail}}" class="content-image">
                    <p class="content-title">{{$photo->title}}</p>
                </a>
            </li> <!-- ▲ アイテム -->
        @endforeach
    </ul>
</div>
@endisset
@endsection