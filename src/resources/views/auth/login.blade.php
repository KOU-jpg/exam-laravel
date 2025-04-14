@extends('layouts.app')

@section('title')
  login
@endsection

@section('css')
  <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('header')
  <div class="header__logo">FashionablyLate</div>
  <!-- 登録ページへのリンク -->
  <a href="/register" class="header__register">register</a>
@endsection


@section('content')
  <h2 class="content-title">Login</h2>
  <div class="login-container">
    <form class="login-form" action="/login" method="post" novalidate>
    @csrf

    <!-- メールアドレス -->
    <label for="email">メールアドレス</label>
    <input type="email" name="email" value="{{ old('email') }}" placeholder="例: test@example.com" >
    <div class="error-placeholder">
    @error('email')
    <div class="error-message">{{ $message }}</div>
@enderror
    </div>

    <!-- パスワード -->
    <label for="password">パスワード</label>
    <input type="password" name="password" placeholder="例: coachetech106" >
    <div class="error-placeholder">
    @error('password')
    <div class="error-message">{{ $message }}</div>
@enderror
    </div>


    <!-- ログインボタン -->
    <div class="login-button-container">
      <button type="submit" class="login-button">ログイン</button>
    </div>
    </form>
  </div>

@endsection