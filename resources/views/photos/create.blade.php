@extends('layouts.app')
@section('content')
<h1 class="post-title">写真を投稿する</h1>
<form action="/index" method="post" ectype="multipart/form-data">      
  <input name="title" type="text" class="feedback-input" placeholder="タイトル" />   
  <textarea name="text" name="description" class="feedback-input" placeholder="説明"></textarea>
  <input type="file" name="photo" class="feedback-input" >
  <input type="submit" value="投稿""/>
</form>
@endsection