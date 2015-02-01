Sistem Informasi Inventori BBM
==============================

Sistem Informasi Inventori BBM. Dibangun dengan Yii2.


DIRECTORY STRUCTURE
-------------------

```
common
    config/              contains shared configurations
    mail/                contains view files for e-mails
    models/              contains model classes used in both backend and frontend
console
    config/              contains console configurations
    controllers/         contains console controllers (commands)
    migrations/          contains database migrations
    models/              contains console-specific model classes
    runtime/             contains files generated during runtime
backend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains backend configurations
    controllers/         contains Web controller classes
    models/              contains backend-specific model classes
    runtime/             contains files generated during runtime
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
vendor/                  contains dependent 3rd-party packages
environments/            contains environment-based overrides
tests                    contains various tests for the advanced application
    codeception/         contains tests developed with Codeception PHP Testing Framework
```


KEBUTUHAN SISTEM
----------------

Kebutuhan minimum untuk menjalankan aplikasi ini adalah web server yang mendukung PHP 5.4.0.

INSTALASI
---------

### Install via Composer

Jika belum ada [Composer](http://getcomposer.org/), silakan ikuti petunjuk instalasi di
[getcomposer.org](http://getcomposer.org/doc/00-intro.md#installation-nix).

Setelah [Composer](http://getcomposer.org/) terinstall, silakan ketik perintah berikut:

~~~
php composer.phar global require "fxp/composer-asset-plugin:1.0.0"
php composer.phar create-project --prefer-dist --stability=dev agungandika/apc.tanker sibbm
~~~

MEMULAI APLIKASI
----------------

**Tips**

Jika ingin menggunakan custom url di komputer local Anda, silakan ikuti petunjuk di [SETUP-WEBSERVER.md](SETUP-WEBSERVER.md).


Setelah aplikasi terinstall, Anda harus menjalankan beberapa langkah berikut untuk
inisiasi aplikasi. Anda hanya perlu menjalankan langkah berikut satu kali.

1. Lewat console command, masuk ke direktori `/path/to/apc.tanker/`, kemudian ketik perintah `init`.

2. Buat `database` dengan nama `tanker` berikut `username` dan `password` dan sesuaikan paramter `database` di bagian
   configurasi `components['db']` di file `common/config/main-local.php`.
   
3. Jalankan `migrations` pada console command `yii migrate`. Ini akan membuat table inisiasi awal agar aplikasi bekerja.

4. Setel `root document` dari Web Server Anda sebagai berikut (contoh):

- `/path/to/apc.tanker/backend/web/` and using the URL `http://tanker.local/

Untuk login ke aplikasi, gunakan:

- Username: admin
- Password: admin

CREDITS
-------
Penulis: Agung Andika (@agungsijawir)
Twitter: @agungsijawir

Jika menemukan bug, silakan buat [issue](https://github.com/agungandika/apc.tanker/issues/new). Anda juga dapat `fork` repo ini untuk mengembangkan aplikasi.

Perhatian: Aplikasi dan sumber kode aplikasi (selain dari vendor dan framework Yii2) adalah hak cipta Agung Andika. 
Dimohon kesadarannya untuk tidak memanfaatkan di luar dari hal-hal yang kurang atau tidak etis, seperti menggunakan
aplikasi ini untuk tugas Anda tanpa menyertakan sumber dan tautan aplikasi, menjual aplikasi, dll.