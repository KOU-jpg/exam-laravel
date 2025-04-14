@extends('layouts.app')

@section('title')
    admin
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}?{{ time() }}">
@endsection

@section('header')
    <div class="header__logo">FashionablyLate</div>
@endsection

@section('content')

        <h2 class="admin-title">Admin</h2>

        <div class="contents">
            <form class="search-form" action="/admin/search" method="get">
                <div class="filter-container">
                    <!-- 名前やメールアドレスの入力フィールド -->
                    <input type="text" name="keyword" placeholder="名前やメールアドレスを入力してください" class="filter-input" value="{{ request('keyword', '') }}">

                    <!-- 性別選択 -->
                    <select name="gender">
                        <option value="">すべて</option>
                        <option value="1" {{ request('gender') == '1' ? 'selected' : '' }}>男性</option>
                        <option value="2" {{ request('gender') == '2' ? 'selected' : '' }}>女性</option>
                        <option value="3" {{ request('gender') == '3' ? 'selected' : '' }}>その他</option>
                    </select>

                    <!-- お問い合わせの種類 -->
                    <select class="filter-select" name="category_id">
                        <option value="">お問い合わせの種類</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->content }}
                            </option>
                        @endforeach
                    </select>

                    <!-- 日付入力 -->
                    <input type="date" name="date" class="date-input"value="{{ request('date', '') }}">
                    
                    <button class="search-button">検索</button>
                    <a href="/admin" class="reset-button">リセット</a>
                </div>
            </form>
            <div class="export-pagination-container">
                <!-- エクスポートボタン -->
                <button class="export-button">エクスポート</button>

                <!-- ページネーション -->
                <div class="pagination">
                {{ $contacts->links() }}
                </div>
            </div><!-- テーブル -->
            <table class="custom-table">
                <thead>
                    <tr>
                        <th>お名前</th>
                        <th>性別</th>
                        <th>メールアドレス</th>
                        <th>お問い合わせの種類</th>
                        <th>詳細</th> 
                    </tr>
                </thead>
                <tbody>@foreach ($contacts as $contact)
                    <tr>
                        <!-- 各行のデータを表示 -->
                        <td>{{ $contact->first_name }}&nbsp;{{ $contact->last_name }}</td>
                        <td>
                            @if ($contact->gender == 1)
                            男性
                        @elseif ($contact->gender == 2)
                            女性
                        @else
                            その他
                        @endif</td>
                        <td>{{ $contact->email }}</td>
                        <td>@if ($contact->category_id == 1)
                            商品のお届けについて
                        @elseif ($contact->category_id == 2)
                            商品の交換について
                        @elseif ($contact->category_id == 3)
                            商品トラブル
                        @elseif ($contact->category_id == 4)
                            ショップへのお問い合わせ
                        @elseif ($contact->category_id == 5)
                            その他
                        @endif</td>
                        <td>
                            <!-- 詳細ボタン -->
                            <a href="#modal-detail-{{ $contact->id }}" class="modal-button detail-button">詳細</a>
                        </td>
                    </tr>
                @endforeach
                </tbody><!-- テーブルボディ -->
            </table><!-- テーブル終了 -->
            <!-- モーダル部分 -->
            @foreach ($contacts as $contact)
                    <div class="modal-wrapper" id="modal-detail-{{ $contact->id }}">
                        <a href="#!" class="modal-overlay"></a> <!-- 背景クリックでモーダルを閉じる -->
                        <div class="modal-window">
                            <!-- モーダル内の詳細データ -->
                            <table class="modal-table">
                                <tbody>
                                    <tr>
                                        <th>お名前</th>
                                        <td>{{ $contact->first_name }}&nbsp;{{ $contact->last_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>性別</th>
                                        <td>{{ $contact->gender == 1 ? '男性' : '女性' }}</td>
                                    </tr>
                                    <tr>
                                        <th>メールアドレス</th>
                                        <td>{{ $contact->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>電話番号</th>
                                        <td>{{ $contact->tel }}</td>
                                    </tr>
                                    <tr>
                                        <th>住所</th>
                                        <td>{{ $contact->address }}</td>
                                    </tr>
                                    <tr class="long-text">
                                        <th>お問い合わせ内容</th>
                                        <td>
                                            <div class="scrollable-text">
                                                {{ $contact->detail }}
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <form action="/admin?id={{$contact->id}}" method="POST">
                                @csrf
                            <button type="submit" class="delete-button">削除</button>
                            </form>
                            <!-- 閉じるボタン -->
                            <a href="#!" class="modal-close">×</a> <!-- モーダルを閉じるボタン -->
                        </div><!-- modal-window -->



                    </div><!-- modal-wrapper -->
                </div>
            </div>@endforeach
@endsection