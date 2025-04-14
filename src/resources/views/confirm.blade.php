@extends('layouts.app')

@section('title')
  confirm
@endsection

@section('css')
  <link rel="stylesheet" href="{{ asset('css/confirm.css') }}?{{ time() }}">
@endsection

@section('header')
  <div class="header__logo">FashionablyLate</div>
@endsection

@section('content')
    <div class="content">
    <div class="content-table__row">
    <h2 class="content-table__header">Confirm</h2>
    </div>
    <form action="/thanks" method="post">
    @csrf
    <div class="content-table">
    <table class="content-table__inner">

    <tr class="content-table__row">
    <th class="item__data">名前</th>
    <td class="item__form" ><input type="text" name="name" value="{{  $form['name'] }}" readonly /> 
    <input type="hidden" name="first_name" value="{{ $form['first_name'] }}" />
    <input type="hidden" name="last_name" value="{{ $form['last_name'] }}" /></td>
    </tr>
    <tr class="content-table__row">
    <th class="item__data">性別</th>
    <td class="item__form">
    <input 
    type="hidden" name="gender" value="{{ $form['gender'] }}" readonly />
    <span>{{ ['male' => '男性', 'female' => '女性', 'other' => 'その他'][$form['gender']]}}</span>
    </td>
    </tr>
    <tr class="content-table__row">
    <th class="item__data">メールアドレス</th>
    <td class="item__form"><input type="email" name="email" value="{{  $form['email'] }}" readonly /></td>
    </tr>
    <tr class="content-table__row">
    <th class="item__data">電話番号</th>
    <td class="item__form"><input type="text" name="tel" value="{{ $form['tel'] }}" readonly /></td>
    </tr>
    <tr class="content-table__row">
    <th class="item__data">住所</th>
    <td class="item__form" ><input type="text" name="address" value="{{  $form['address'] }}" readonly /></td>
    </tr>
    <tr class="content-table__row">
    <th class="item__data">建物名</th>
    <td class="item__form"><input type="text" name="building" value="{{  $form['building'] ?? ''  }}" readonly /></td>
    </tr>
    <tr class="content-table__row">
    <th class="item__data">お問い合わせの種類</th>
    <td class="item__form">
    <input type="hidden" name="category_id" value="{{ $form['category_id'] }}" />
    <span>{{ ['1' => '商品のお届けについて', '2' => '商品の交換について', '3' => '商品トラブル', '4' => 'ショップへのお問い合わせ', '5' => 'その他'][$form['category_id']] ?? $form['category_id'] }}</span>
    </td>
    <tr class="content-table__row">
    <th class="item__data">お問い合わせ内容</th>
    <td class="item__form"><input type="text" name="detail" value="{{  $form['detail'] ?? '' }}" readonly /></td>
    </tr>
    </table>
    </div>
    <!-- 確認後の送信ボタン -->


    <div class="content-table__row">
     <div class="button__row">
    <div class="content-table__submit">
    <button class="submit-button" type="submit"  name="action" value="submit">送信</button>
    </form> 
    <!-- 修正ボタン -->
    <form action="/" method="post">
    @csrf
    <div class="hidden-fields">
    @foreach ($form as $key => $value)
    <input type="hidden" id="{{ $key }}" name="{{ $key }}" value="{{ $value }}">
    @endforeach
    </div>
    <button class="revise-button">修正</button>
    </form>
    <div>




    </div>
@endsection