@extends('layouts.app')
@section('content')
        <h1 class="post-title">写真を投稿する</h1>
        <form action="/index" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            @if ($errors->has('title'))
                <span class="help-block">
                    <strong>{{ $errors->first('title') }}</strong>
                </span>
            @endif
            <input name="title" type="text" class="feedback-input" placeholder="タイトル" > 
            @if ($errors->has('description'))
                <span class="help-block">
                    <strong>{{ $errors->first('description') }}</strong>
                </span>
            @endif
            <textarea name="description" class="feedback-input" placeholder="説明"></textarea>
            @if ($errors->has('photo'))
                <span class="help-block">
                    <strong>{{ $errors->first('photo') }}</strong>
                </span>
            @endif
            <input type="file" name="photo" class="feedback-input" >
            <input type="submit" value="投稿"">
        </form>
@endsection