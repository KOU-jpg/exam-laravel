＃お問い合わせフォーム

＃＃環境構築

＃＃＃Dockerビルド
1. `git@github.com:KOU-jpg/exam-laravel.git`
2. `docker-compose up -d --build`
### Laravel環境構築
1. `docker-compose exec php bash`
2. `composer install`
3. `.env.example` ファイルから `.env` を作成し、環境変数を変更
4. `php artisan key:generate`
5. `php artisan migrate`
6. `php artisan db:seed`
## 使用技術
- PHP  7.4.9 
- Laravel 8.83.29
- MySQL  8.0.26
## URL
- 開発環境: [http://localhost](http://localhost)
- phpMyAdmin: [http://localhost:8080](http://localhost:8080)

## ER図

以下は本プロジェクトのデータベース設計を示すER図

![ER図](docs/お問い合わせフォーム.png)