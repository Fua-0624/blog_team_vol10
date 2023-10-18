<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://github.com/Fua-0624/blog_team_vol10/assets/134463043/060735e1-0706-4a80-88d5-387dbf9d619a" width="400" alt="HOME画面"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## ゲームの掲示板

　様々なゲームについて国籍関係なく交流できるアプリです。情報を共有するのもよし、一緒にゲームをするメンバーを集めるのもよしです！</br>
 [アプリはこちら](https://game-bulletin-board-a4f7c9f68c6f.herokuapp.com/login)</br>
 テストアカウント：test@example.com</br>
 パスワード：testpass

- **ゲーム登録**機能：ゲームが登録されていない場合は新しくゲームを追加することができます。
- **スレッド投稿**機能：交流したい話題についてスレッドを立てることができます。
- **スレッド順変更**機能：スレッド一覧を投稿が新しい順か古い順の選択によって順番が変わります。
- **コメント投稿**機能：スレッドに対してコメントすることができます。
- **学年選択**機能：ユーザー登録時に小学生・中学生・高校生・その他の中から学年を選べます。
- **もっと見る**機能：初期状態ではスレッドやコメントは10件のみしか表示されておらず、もっと見るボタンを押すことで表示件数を増やすことができます。
- **翻訳**機能：日本語から英語、英語から日本語に翻訳できます。
- **検索**機能：ゲームのジャンルで検索できます。
- **お気に入り**機能：お気に入りのゲームを登録、参照できます。

## 制作背景
  4人のチームでチーム開発しました。
  チーム開発のテーマだった「人とのつながり」とチームメンバーの共通点である「ゲーム好き」のどちらも反映させました。

## アピールポイント

### 国籍関係なく交流できる
　DeepLを使った翻訳機能を実装しているため、国籍関係なく交流できます。現在翻訳できるのは日本語から英語と英語から日本語です。
### 様々なゲームについて交流できる
　登録されていないゲームは新規で登録することができるので、様々なゲームの交流をこのアプリで行えます。また、様々なゲームの交流の様子を見ることができるので、新しいゲームの開拓の手助けになるかもしれません。
### ゲームのジャンルでデータを絞ることができる
　ゲーム名登録時にジャンルを選択するので、交流したいゲームを探す時にジャンルでデータを絞ることができます。
　
## ER図
各テーブルについての説明です
- **genres**：ゲームのジャンルについて登録しているテーブル
- **games**：ゲームの情報を登録しているテーブル
- **users**：ユーザーの情報を登録しているテーブル
- **threads**：各ゲームで立てられたスレッドを登録するテーブル
- **comments**：スレッドに対するコメントを登録するテーブル
- **bookmarks**：ゲームのお気に入り登録に使われるテーブル
<p align="center"><img src="https://github.com/Fua-0624/blog_team_vol10/assets/134463043/8bb8960e-5abf-40d9-b455-8345c6c381f4" width="400" alt="ER図"></a></p>

## 使用技術
<table>
    <tbody>
        <tr><td>言語</td><td>PHP,HTML,CSS,JavaScript</td></tr> 
        <tr><td>フレームワーク</td><td>Laravel</td></tr> 
        <tr><td>その他</td><td>AWS,DeepL,Breeze,TailWind</td></tr> 
    </tbody>
</table>
