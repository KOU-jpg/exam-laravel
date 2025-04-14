@extends('layouts.app')

@section('title')
  register
@endsection

@section('css')
  <link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('header')
  <div class="header__logo">FashionablyLate</div>
  <!-- ログインページへのリンク -->
  <a href="/login" class="header__login">login</a>
@endsection

@section('content')
  <h2 class="content-title">Register</h2>
<div class="register-container">
    <form class="register-form" action="/register" method="post" novalidate>
        @csrf

        <!-- お名前 -->
        <label for="name">お名前</label>
        <input type="text" name="name" value="{{ old('name') }}" placeholder="例:山田 太郎" required>
        <div class="error-placeholder">
            @error('name')
                <div class="error-message">{{ $errors->first('name') }}</div>
            @enderror
        </div>        

        <!-- メールアドレス -->
        <label for="email">メールアドレス</label>
        <input type="email" name="email" value="{{ old('email') }}" placeholder="例: test@example.com" required>
        <div class="error-placeholder">
            @error('email')
                <div class="error-message">{{ $errors->first('email') }}</div>
            @enderror
        </div>  

        <!-- パスワード -->
        <label for="password">パスワード</label>    
        <input type="password" name="password" placeholder="例: coachetech106" required>
        <div class="error-placeholder">
            @error('password')
                <div class="error-message">{{ $errors->first('password') }}</div>
            @enderror
        </div>  

        <!-- 登録ボタン -->
        <div class="register-button-container">
            <button type="submit" class="register-button">登録</button>
        </div>
    </form>
</div>

@endsection