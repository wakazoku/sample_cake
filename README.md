## 目次
* VagrantでローカルにLinux開発環境を構築する
* CakePHPの準備
* CakePHPのチュートリアルを試す

##VagrantでローカルにLinux開発環境を構築する 
###▼VitualBoxをインストール
*仮想環境を作る奴。
*ダウンロードしてインストールするだけ。
http://www.oracle.com/technetwork/jp/server*storage/virtualbox/downloads/index.html

###▼Vagrantをインストール
*box(誰かが作ったlinux環境)をローカルに簡単に構築出来る。
*開発環境をさっくり作れる、壊せる。
*ダウンロードしてインストールするだけ。
https://www.vagrantup.com/

###▼Boxをダウンロード、インストール
*下記サイトからboxをダウンロードする。
http://www.vagrantbox.es/
*boxを追加する。(CentOS7.1)
https://github.com/holms/vagrant*centos7*box/tree/master/definitions/CentOS*7.1
※「2. CentOS7.0のBOX（テンプレート）を追加」を参照
http://qiita.com/jianghan0/items/df83350d9c22549c4c96

###▼VagrantfFileを編集する
ipアドレスの末尾を10から15に変更する(njssのローカルと被るため)

Vagrantfile
```config.vm.network "private_network", ip: "192.168.33.15"```

###▼guestAdditionsを設定する
*GuestOS（centOS）を使いやすくするプラグイン。
https://pc*karuma.net/virtualbox*install*guest*additions/
*guestAdditionsがインストールされていないと
　　上手くvagrantが起動出来ない場合がある。
*下記記事を参考に、gutestAdditionsをインストールする。
　*VagrantのboxのGuest Additionsのアップデート方法
http://qiita.com/isaoshimizu/items/e217008b8f6e79eccc85
　*【virtualbox】Guest Additionsインストール方法【centos】
http://mpweb.mobi/windows/guestadditions*centos.php

###▼Apacheの設定をする
*「4. Webサーバーの設定（Apache）」を参照
http://qiita.com/jianghan0/items/df83350d9c22549c4c96

*Vagrantの共有フォルダにシンボリックリンクを作る
　　```[vagrant@localhost www]$ sudo ln *snf /vagrant html```
　　→VagrantはHostOS(Mac)とGuestOS(CentOS)の間に共有フォルダを持つ事ができる。
　　　GuestOSのApatcheの公開フォルダを共有フォルダに
　　　シンボリックリンクを作ってあげることで開発が楽に。（ファイルをアップロードする手間が省ける）


###▼タイムゾーンを設定する
*　【Linux】タイムゾーン(Timezone)の変更
http://qiita.com/azusanakano/items/b39bd22504313884a7c3

###▼Vagrant環境にPHPをインストールする
*CentOSにPHP5.6をインストール
http://qiita.com/pakiln/items/645e8a97cde46b59f9f8

###▼Vagrant環境にmySqlをインストールする
*今更ながらVagrantのCentOS7にMySQLをインストールしたメモ
http://yuki10.hatenablog.com/entry/2015/07/10/170948

*エラー：Headers and client library minor version mismatch.
http://shevhome.hateblo.jp/entry/2015/11/02/105325

参考1:MySQL 5.7 を CentOS 7 に yum インストールする手順
https://weblabo.oscasierra.net/installing*mysql57*centos7*yum/

参考2:MySQL 5.7 をインストールしたら最初に行うセットアップ
https://weblabo.oscasierra.net/mysql*57*init*setup/

参考3:mysql5.7でパスワードを変更する
http://qiita.com/RyochanUedasan/items/9a49309019475536d22a




##CakePHPの準備

###▼githubから落としてくる
こっからcloneなりダウンロードして公開フォルダに配置する
https://github.com/cakephp/cakephp/tree/2.x

*PHPで「Warning: strtotime()～」のエラーが出た時
http://ivystar.jp/programming/php/php%E3%81%A7%E3%80%8Cwarning*strtotime%EF%BD%9E%E3%80%8D%E3%81%AE%E3%82%A8%E3%83%A9%E3%83%BC%E3%81%8C%E5%87%BA%E3%81%9F%E6%99%82/


###▼共有フォルダのパーミッションを設定する
*vagrant共有フォルダでcakephpが動かない場合
http://blog.kome*lab.com/synced_folder/

###▼データベース、テーブルを設定する
*文中「ブログデータベースの作成」を参照
https://book.cakephp.org/2.0/ja/getting*started.html

###▼mod_rewriteの設定する
*mod_rewriteはURLの書き換えを行うapacheの設定
*【Cake】mod_rewriteの設定
http://qiita.com/kazu56/items/a63abb34fe0e2caf1f53
*このあたりは未だによく分かっていない…

###▼.htaccessの設定をする
*Apache」（アパッチ）を制御する設定ファイル
https://htaccess.cman.jp/sense/
*mod_rewriteの設定をCakePHP2,ZF2(Zend Framework2), WordPressの.htaccessを見て復習する。
http://qiita.com/ariarijp/items/2eb8c372317f1fafa2c0
*ここも未だによくわかっていない…

##CakePHPのチュートリアルを試す
###▼チュートリアル
*ブログチュートリアル
https://book.cakephp.org/2.0/ja/getting*started.html
