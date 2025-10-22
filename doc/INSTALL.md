 # 正サーバ

## Linux

- Ubuntu 24.04 ja 版 を使用
- インストールオプション デスクトップ

### インストール後設定

- 自動ログインを設定
- 電源設定で画面ブランクをしない
- リモートデスクトップを有効にする
- ホスト名を適切に設定
  
## MySQL / MariaDB

以下に沿ってインストール、設定

「MariaDB インストール ( Ubuntu 18.04 / 20.04 / 22.04 / 24.04 LTS , Raspberry Pi OS)」
https://qiita.com/nanbuwks/items/c98c51744bd0f72a7087

## apache2 + PHP

```
$ sudo apt install apache2
$ sudo apt install php
```

## OMCUSS パッケージダウンロード


```
$ wget https://github.com/nanbuwks/OMCUSS/archive/refs/heads/main.zip
$ unzip main.zip
$ cd OMCUSS-main/
```
## OMCUSS PHP アプリケーション インストール

`/var/www/html` に、 `php_server_webapp` を配置


## OMCUSS xojo アプリケーション インストール

任意の場所に `xojo_server_webapp` を配置
`php_server_webapp/restartxojo.php`  内部のパス指定を書き換え

# 副サーバ

正サーバと同様に設定
