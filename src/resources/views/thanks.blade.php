@extends('layouts.app')

@section('title')
  thanks
@endsection

@section('css')
  <link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('header')

@endsection

@section('content')
  <!-- 背景文字 -->
  <div class="background-text">Thankyou</div>

  <!-- 表示されるメインコンテンツ -->
  <div class="content">
    <form class="thanks-form" action="/" method="get">
     <h1>お問い合わせありがとうございました</h1>
    <button class="content-button" type="submit">HOME</button>
    </form>
  </div>

@endsection