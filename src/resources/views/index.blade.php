@extends('layouts.app')

@section('title')
    contacts
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}?{{ time() }}">
@endsection

@section('header')
    <div class="header__logo">FashionablyLate</div>
    <form class="form" action="{{ route('logout') }}" method="POST">
        @csrf
        <button class="header__button">ログアウト</button>
    </form>
@endsection

@section('content')
    <!-- Content 行 -->
    <div class="content">
    <h2 class="content-table__header">Content</h2>
    <form class="content-from" action="/confirm" method="post" novalidate>

     @csrf
    <div class="content-table">
    <table class="content-table__inner">
    <!--１項目目 名前と入力欄 -->
    <tr class="content-table__row">
    <th class="item__data">
    <div class="item__data-name">
    お名前&nbsp;<span class="must">※</span>
    </div>
    <!-- エラーメッセージのプレースホルダー -->
    <div class="error-placeholder"></div>
    </th>
    <td class="item__form">
    <div class="item__form-name">
    <!-- 姓 -->
    <input 
    class="item__form-input-first_name" 
    name="first_name" 
    value="{{ old('first_name', $form['first_name'] ?? '') }}" 
    placeholder="例：山田"
    >
    <!-- 名 -->
    <input 
    class="item__form-input-last_name" 
    name="last_name" 
    value="{{ old('last_name', $form['last_name'] ?? '') }}" 
    placeholder="例：太郎"
    >
    </div>
    <div class="error-placeholder">
    <!-- 姓のエラーメッセージ -->
    @error('first_name')
    <div class="error-first_name" >{{ $message }}</div>
    @enderror
    <!-- 名のエラーメッセージ -->
    @error('last_name')
    <div class="error-last_name">{{ $message }}</div>
    @enderror
    </div>  
    </td>        
    </tr>    

    <!--２項目目 性別 -->
    <tr class="content-table__row">
    <th class="item__data">
    <div class="item__data-gender">性別&nbsp;<span class="must">※</span></div>        <div class="error-placeholder">               
    </div>
    </th>
    <!-- ラジオボタン -->

    <td class="item__form">
    <div class="item__form-radio">
    <!-- 男性 -->
    <div class="radio-group">
    <input 
    class="item__form-radio-male" 
    type="radio" 
    id="gender-male"
    name="gender" 
    value="male" 
    {{ old('gender', $form['gender'] ?? '') == 'male' ? 'checked' : '' }}>
    <label for="gender-male" class="radio-label">男性</label>
    </div>

    <!-- 女性 -->
    <div class="radio-group">
    <input 
    class="item__form-radio-female" 
    type="radio" 
    id="gender-female"
    name="gender" 
    value="female" 
    {{ old('gender', $form['gender'] ?? '') == 'female' ? 'checked' : '' }}>
    <label for="gender-female" class="radio-label">女性</label>
    </div>

    <!-- その他 -->
    <div class="radio-group">
    <input 
    class="item__form-radio-other" 
    type="radio" 
    id="gender-other"
    name="gender" 
    value="other" 
    {{ old('gender', $form['gender'] ?? '') == 'other' ? 'checked' : '' }}>
    <label for="gender-other" class="radio-label">その他</label>
    </div>
    </div>

    <!-- エラーメッセージ表示 -->
    <div class="error-placeholder">
    @error('gender')
    <div class="error-message">{{ $message }}</div>
    @enderror
    </div>
    </td>
    </tr>

    <!--３項目メールアドレス -->
    <tr class="content-table__row">
    <th class="item__data">
    <div class="item__data-mail">
    メールアドレス&nbsp;<span class="must">※</span>
    </div>
    <!-- エラーメッセージのプレースホルダー -->
    <div class="error-placeholder"></div>
    </th>
    <td class="item__form">
    <div class="item__form-mail">
    <!-- メールアドレス入力フォーム -->
    <input 
    id="email" 
    name="email" 
    class="item__form-input-mail" 
    type="email" 
    value="{{ old('email', $form['email'] ?? '')}}" 
    placeholder="test@example.com"
    >
    </div>
    <!-- エラーメッセージ表示 -->
    <div class="error-placeholder">
    @error('email')
    <div class="error-message">{{ $message }}</div>
    @enderror
    </div> 
    </td>       
    </tr>
    <!--４項目電話番号 -->

    <tr class="content-table__row">
    <th class="item__data">
    <div class="item__data-tell">
    電話番号&nbsp;<span class="must">※</span>
    <div class="error-placeholder"></div>
    </div>
    </th>
    <td class="item__form">
    <!-- 電話番号入力フォーム（3分割） -->
    <div class="item__form-tell">
    <input 
    name="tell_part1" 
    class="item__form-input-tell" 
    value="{{ old('tell_part1', $form['tell_part1'] ?? '') }}" 
    placeholder="090" 
    maxlength="4"
    >
    <span class="hyphen">-</span>
    <input 
    name="tell_part2" 
    class="item__form-input-tell" 
    value="{{old('tell_part2', $form['tell_part2'] ?? '') }}" 
    placeholder="1234" 
    maxlength="4"
    >
    <span class="hyphen">-</span>
    <input 
    name="tell_part3" 
    class="item__form-input-tell" 
    value="{{ old('tell_part3', $form['tell_part3'] ?? '') }}"
    placeholder="5678" 
    maxlength="4"
    >
    <!-- 結合後の電話番号用のhiddenフィールド -->
    <input type="hidden" name="tel" id="full_tell">
    </div>

    <!-- エラーメッセージ表示 -->
    <div class="error-placeholder">
    @if ($errors->has('tell_part1') || $errors->has('tell_part2') || $errors->has('tell_part3'))
    <div class="error-message">電話番号を入力してください</div>
    @endif
    </div>       
    </td>       
    </tr>
    <!--５項目住所 -->

    <tr class="content-table__row">
    <th class="item__data">
    <div class="item__data-address">
    住所&nbsp;<span class="must">※</span>
    <div class="error-placeholder"></div>
    </div>
    </th>
    <td class="item__form">
    <div class="item__form-address">
    <!-- 住所入力フォーム -->
    <input 
    name="address" 
    class="item__form-input-address" 
    type="text" 
    value="{{ old('building', $form['address'] ?? '') }}" 
    placeholder="例：東京都渋谷区千代田区1-2-3"
    >
    </div>
    <!-- エラーメッセージ表示 -->
    <div class="error-placeholder">
    @error('address')
    <div class="error-message">{{ $message }}</div>
    @enderror
    </div>
    </td>       
    </tr>

    <!--６項目建物名 -->

    <tr class="content-table__row">
    <th class="item__data">
    <div class="item__data-building">
    建物名
    <div class="error-placeholder"></div>
    </div>                 
    </th>
    <td class="item__form">
    <div class="item__form-building">
    <!-- 建物名入力フォーム -->
    <input 
    name="building" 
    class="item__form-input-building" 
    type="text" 
    value="{{ old('building', $form['building'] ?? '') }}" 
    placeholder="例：千駄ヶ谷マンション101"
    >
    </div>
    <!-- エラーメッセージ表示 -->
    <div class="error-placeholder">               
    @error('building')
    <div class="error-message">{{ $message }}</div>
    @enderror
    </div>
    </td>
    </tr>

    <!--７項目お問い合わせの種類 -->

    <tr class="content-table__row">
    <th class="item__data">
    <div class="item__data-contact">
    お問い合わせの種類&nbsp;<span class="must">※</span>
    <div class="error-placeholder"></div>
    </div>
    </th>
    <td class="item__form">
    <div class="item__form-contact">
    <!-- セレクトボックス -->
<select name="category_id" class="item__form-select-contact" required>
    <option value="" disabled {{ old('category_id', $form['category_id'] ?? '') == '' ? 'selected' : '' }}>
        選択してください
    </option>
    @foreach ($categories as $category)
        <option 
            value="{{ $category->id }}" 
            {{ old('category_id', $form['category_id'] ?? '') == $category->id ? 'selected' : '' }}
        >
            {{ $category->content }}
        </option>
    @endforeach
</select>



    </div>

    <!-- エラーメッセージ表示 -->
    <div class="error-placeholder">               
    @error('category_id')
    <div class="error-message">{{ $message }}</div>
    @enderror
    </div>       
    </td>       
    </tr>
    <!--８項目お問い合わせ内容 -->

    <tr class="content-table__row">
    <th class="item__data">
    <div class="item__data-detail">
    お問い合わせ内容&nbsp;<span class="must">※</span>
    <div class="error-placeholder"></div>
    </div>
    </th>
    <td class="item__form">
    <div class="item__form-detail">
    <!-- テキストエリア -->
     <textarea
    name="detail" 
    rows="4" 
    cols="50" 
    class="item__form-input-detail"
    placeholder="お問い合わせ内容をご記入ください"
    >{{ old('detail', $form['detail'] ?? '') }}</textarea>
    </div>

    <!-- エラーメッセージ表示 -->
    <div class="error-placeholder">               
    @error('detail')
    <div class="error-message">{{ $message }}</div>
    @enderror
    </div>       
    </td>       
    </tr>
    </table>
    </div>
    <div class="content-table__row">
    <button class="content-form__button" type="submit">確認画面</button>
    </div>
    </form>
    </div>



@endsection