# Share BluePrint
## 使用技術

php 7.2<br>
intervention/image 2.5<br>
laravel/framework 6.18.35<br>
laravelcollective/html 6.0<br>
league/flysystem-aws-s3-v3 1.0<br>
ext-gd<br>
bootstrap 4.0.0<br>
jquery 3.2<br>
vue 2.5.17<br>


## 概要

本アプリでは、訪れたホテルや旅館を共有・紹介することが可能となっています。
投稿機能をはじめ、ユーザーフォロー、お気に入り、検索機能があり、
お気に入りのユーザーをフォローし、実際に訪れた方の評価を見ることができます。


## 本番環境

hotel-microposts.herokuapp.com
テストアカウント  
メールアドレス : test@gmail.com  
パスワード : tesuto0000


## 制作背景

現在、コロナウイルスの影響で、多くの観光業界が経済的打撃を受けています。
元々、旅行が好きなことから、この在宅期間中に多くの人が投稿を閲覧し、
コロナが落ち着くと行ってみたい！と言う気持ちになり、コロナ収束後にすぐに経済的困難から
抜け出すことができるようにと願い、制作しました。


## 工夫したポイント

観光地に滞在している時に、すぐに思い出をシェアできる形にするため、
気軽にすぐ投稿できるよう、本当に必要な情報だけに絞りました。


## 課題や今後実装したい機能

DM機能  
カテゴリ別表示
動画の投稿  
ユーザーアイコンの追加
写真編集機能


## DB設計
### usersテーブル
|Column|Type|Options|
|------|----|-------|
|user_name|string|null: false|
|email|string|null: false,unique|
|password|string|null: false|

#### Association
- has_many :microposts
- belongsToMany :user_follow
- belongsToMany :favorites

### micropostsテーブル
|Column|Type|Options|
|------|----|-------|
|user_id|unsignedBigInteger|foreignkey|
|image1|string|null: false|
|image2|string|null|
|image3|string|null|
|image4|string|null|
|hotel_name|string|null: false|
|content|string|null: false|
|prefecture|string|null: false|
|price|string|null: false|
|evaluate|integer|null: false|

#### Association
- belongsToMany :users
- belongsToMany :favorites

### user_followテーブル
|Column|Type|Options|
|------|----|-------|
|user_id|unsignedBigInteger|foreign_key,unique|
|micropost_id|unsignedBigInteger|foreign_key,unique|

### favoriteテーブル
|Column|Type|Options|
|------|----|-------|
|user_id|unsignedBigInteger|foreign_key,unique|
|micropost_id|unsignedBigInteger|foreign_key,unique|

