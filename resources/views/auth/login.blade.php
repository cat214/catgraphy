@extends('layouts.app')

@section('content')
    <h1  class="post-title">ログイン</h1>
    <h2 class="post-title">ログイン用メールアドレス：user@sample.com</h2>
    <h2 class="post-title">ログイン用パスワード：password</h2>
    <form method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}
        @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
        @endif
        <input type="email"" name="email" class="feedback-input" placeholder="メールアドレス"> 
        @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
        @endif
        <input id="password" type="password" class="feedback-input" name="password" required placeholder="パスワード">
        <div class="checkbox">
        <label>
        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>ログインしたままにする
        </label>
        </div>
        <input type="submit" value="ログイン"">
        <a class="btn btn-link" href="{{ route('password.request') }}">
        パスワードを忘れた場合はこちら
        </a>
    </form>
@endsection