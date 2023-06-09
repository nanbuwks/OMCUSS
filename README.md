# OMCUSS


大学などにおける健康診断業務のためのオープンソースシステムです。


- IoTアダプタを使い、身長体重計などの測定を自動でサーバに登録します。
![](images/2023-04-07-14-56-37.png)
- Web アプリで操作を行い、クライアントに備える必要があるのは Webブラウザのみ。

![](images/2023-04-07-01-00-23.png)

- 印刷出力は LibreOffice を使用したテンプレートに基づき行う。利用者によるテンプレート変更が簡単に行える。
![](images/2023-04-07-15-03-47.png)

- 利用者は学生カードなどのICカードで管理します。
![](images/2023-04-07-15-08-37.png)


- 独自のCSVインポート・エクスポートエンジンを備えます。
![](images/2023-04-07-15-10-22.png)

# 必要要件

- 部外者に対して閉じたLAN
- サーバ メモリ4GBytes以上、AMD64bit CPU
- クライアント 画面解像度 Full HD以上


# 構成要素

- サーバ
- ICカードリーダ付IoTアダプタ
- ICカードリーダ(HID)
- 身体測定装置
- Webクライアント

# 構成例

(健康診断時)
![](images/2023-04-17-13-45-26.png)

(日常業務時)
![](images/2023-04-17-14-25-15.png)

(サーバ管理)
![](images/2023-04-17-14-24-55.png)

## 対応している身体測定装置

### 身長体重体脂肪計

A&D AD-6228AP

### 血圧計

HBP-9021

### 視力計

Canon My Vision CV-20

### 尿検査機

AE-4021
AM-4290




# 機能紹介

メニュー

![](images/2023-04-07-00-53-54.png)


# 健康診断証明書発行
健康診断証明書を発行します。
検索画面

![](images/2023-04-07-01-29-39.png)
発行画面

![](images/2023-04-07-01-31-25.png)

# 最終チェック
健康診断時に、受診者が当日の健康診断値のセルフチェックを行う画面です。
![](images/2023-04-07-01-26-24.png)
診断を全て行ったか、測定ミスが無いかなどを確認します。
データは当年度のみの表示です。


# 内科診察
既往病、診察所見を登録します。
![](images/2023-04-07-01-21-16.png)
健康診断時に毎年度内科医による診察を行います。そのときに既往症情報は過年度に登録した内容に変更がなければ、「過年度既往症情報をコピー」ボタンで一度にコピーできます。
# こころの相談カルテ
こころの相談用の、書き込み用カルテを出力します。
![](images/2023-04-07-01-17-05.png)
カルテ出力画面
![](images/2023-04-07-01-19-40.png)
なおこのカルテは、紙での処理を行い、カルテ書き込み内容は当システムでは記録しません。
# 総合判定
医師所見による、呼び出し判定を登録します。
![](images/2023-04-07-01-14-59.png)

# ECG検査
ECG情報の登録・閲覧ができます。
![](images/2023-04-07-01-12-39.png)

ECG情報の削除もできますが、当期のデータのみ削除できるようになっています。
![](images/2023-04-07-01-13-17.png)

# ダッシュボード(閲覧用)

個人のすべてのデータが一覧できます。
![](images/2023-04-07-01-00-23.png)

# ダッシュボード(管理用)

ダッシュボード(閲覧用)の機能に加え、データの編集や削除、追加ができます。
![](images/2023-04-07-01-01-32.png)
検診データの改ざんとならないように、この画面の使用は限られたルールに従ってください。

# 紹介状
紹介状の発行ができます。
![](images/2023-04-07-01-08-45.png)
紹介状発行画面
![](images/2023-04-07-01-10-02.png)
# 診断書
診断書の発行ができます。


# サーバ管理
![](images/2023-04-17-14-26-19.png)
サーバーメニュー、日次作業において、メンテナンスなどを行います。

# データ管理

 単一テーブルエクスポート出力、 事後指導CSV出力、 カード型年度まとめ形式CSV出力、CSVファイルインポート、CSVファイルアップデートにおいて、データ出力などを行います。


