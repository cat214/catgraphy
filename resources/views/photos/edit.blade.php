@extends('layouts.app')
@section('content')
<h1 class="post-title">写真を編集する</h1>
<form action="/photos/{{$photo->id}}/edit" method="post" enctype="multipart/form-data">
  {{ csrf_field() }}
  <img class="edit-image" src="/storage/photos/{{$photo->photo}}" alt="{{$photo->title}}">
  @if ($errors->has('title'))
      <span class="help-block">
          <strong>{{ $errors->first('title') }}</strong>
      </span>
  @endif
  タイトル<input name="title" type="text" class="feedback-input" placeholder="タイトル" value="{{$photo->title}}">
  @if ($errors->has('description'))
      <span class="help-block">
          <strong>{{ $errors->first('description') }}</strong>
      </span>
  @endif
  説明
  <textarea name="description" class="feedback-input" placeholder="説明">{{$photo->description}}</textarea>
  @if ($errors->has('photo'))
      <span class="help-block">
          <strong>{{ $errors->first('photo') }}</strong>
      </span>
  @endif
  <input type="hidden" name="photo" value="{{$photo->photo}}">
  @if ($errors->has('size'))
      <span class="help-block">
          <strong>{{ $errors->first('size') }}</strong>
      </span>
  @endif
  <input type="hidden" name="size" value="{{$photo->size}}">
  @if ($errors->has('thumbnail'))
      <span class="help-block">
          <strong>{{ $errors->first('thumbnail') }}</strong>
      </span>
  @endif
  <input type="hidden" name="thumbnail" value="{{$photo->thumbnail}}">
  <input type="submit" value="編集"">
</form>
@endsection