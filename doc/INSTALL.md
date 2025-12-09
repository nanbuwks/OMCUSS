# 正サーバ

## Linux

- Ubuntu 24.04 ja 版 を使用
- インストールオプション デスクトップ

### インストール後設定

 
- IPアドレスを設定
- ssh を設定 ` sudo apt install openssh-server `
- vim インストール ` sudo apt install vim `
-  自動ログインを設定
- ディレクトリ名を設定
- ` LANG=en_US.utf8 xdg-user-dirs-gtk-update `
- 電源設定で画面ブランクをしない
- サスペンドロックを解除 ` gsettings set org.gnome.desktop.screensaver ubuntu-lock-on-suspend false `
- リモートデスクトップを有効にする
- ホスト名を適切に設定
  
## MySQL / MariaDB

以下に沿ってインストール、設定

「MariaDB インストール ( Ubuntu 18.04 / 20.04 / 22.04 / 24.04 LTS , Raspberry Pi OS)」
https://qiita.com/nanbuwks/items/c98c51744bd0f72a7087


```
$ mysql -u root -p
```


```
MariaDB [(none)]> create database test;
MariaDB [(none)]> \q
```



## apache2 + PHP

```
$ sudo apt install apache2
$ sudo apt install php
```

```
$ sudo vim /etc/php/8.3/cli/php.ini
```

```
memory_limit = 128M
.
.
.
post_max_size = 100M
.
.
.
upload_max_filesize = 100M
```

## PHPMyAdmin

see:
https://qiita.com/nanbuwks/items/6768bc73661bdba43af9

## OMCUSS パッケージダウンロード


```
$ wget https://github.com/nanbuwks/OMCUSS/archive/refs/heads/main.zip
$ unzip main.zip
$ cd OMCUSS-main/
```
## OMCUSS PHP アプリケーション インストール

`/var/www/html` に、 `php_server_webapp` を配置

```
$ sudo rm /var/www/html/index.html
$ sudo cp -a php_server_webapp/* /var/www/html
$ sudo chown -R www-data:www-data  /var/www/html
$ echo '{"host":"127.0.0.1","database":"test","user":"databaseuser","password":"databasepassword"}' > dbaccess.json
$ sudo cp dbaccess.json /var/www/html
```

## OMCUSS xojo アプリケーション インストール

任意の場所に `xojo_server_webapp` を配置
```
$ mkdir ../xojoweb
$ cp -a xojo_server_webapp/* ../xojoweb/
$ chmod -R 755 ../xojoweb
$ chmod +x ..
```

php_server_webapp 中の `restartxojo.php`  内部のパス指定を書き換え

## 初期データベースインストール

(お問い合わせください)



## サーバ起動

Webブラウザでアクセス

「一般メニュー」-「サーバーメニュー」-「XOJOサーバ再起動」

# 副サーバ

正サーバと同様に設定

