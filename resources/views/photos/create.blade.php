@extends('layouts.app')
@section('content')
<h1 class="post-title">写真を投稿する</h1>
<form>      
  <input name="name" type="text" class="feedback-input" placeholder="タイトル" />   
  <textarea name="text" class="feedback-input" placeholder="説明"></textarea>
  <input type="file" class="feedback-input" >
  <input type="submit" value="投稿""/>
</form>
@endsection