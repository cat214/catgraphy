@extends('layouts.app')
@section('content')
@isset($photos)
<div id="grid" class="container">
    <div class="row">
        <ul>
        @foreach($photos as $photo)
            <div class="col-md-6 col-xs-12">
            <li class="content-list"> 
                <a href="/photos/{{$photo->id}}" class="content-link">
                    <img src="storage/photos/{{$photo->thumbnail}}" class="content-image">
                    <p class="content-title">{{$photo->title}}</p>
                </a>
            </li>
            </div>
        @endforeach
        </ul>
    </div>
<div>
<div class="pagination">
        {{ $photos->links() }}
    </div>
@endisset
@endsection