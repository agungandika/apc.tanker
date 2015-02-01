Setup Web Server
----------------

Untuk pengguna Ubuntu 14.04 dengan web server Apache2, silakan gunakan konfigurasi berikut:

1. Rubah file `/etc/hosts` dengan menambahkan 1 (satu) baris perintah berikut:


    127.0.0.1   apc.tanker
    
kemudian simpan file tersebut. Silakan coba ping lewat console command: `ping apc.tanker`.


2. Buat file 001-apc-tanker.conf di direktori `/etc/apache2/sites-enabled/` dengan isi file sebagai berikut:



	<VirtualHost apc.tanker:80>
	    # The ServerName directive sets the request scheme, hostname and port that
        # the server uses to identify itself. This is used when creating
        # redirection URLs. 
        ServerName apc.tanker
        
        ServerAdmin webmaster@apc.tanker
        
        # Sesuaikan dengan lokasi / direktori dimana Anda meng-install aplikasi
        DocumentRoot /home/myuser/apc.tanker/backend/web
    
        # Available loglevels: trace8, ..., trace1, debug, info, notice, warn,
        # error, crit, alert, emerg.
        # It is also possible to configure the loglevel for particular
        # modules, e.g.
        #LogLevel info ssl:warn
    
        ErrorLog ${APACHE_LOG_DIR}/error-apc-backend.log
        CustomLog ${APACHE_LOG_DIR}/access-acp-backend.log combined
    
        # For most configuration files from conf-available/, which are
        # enabled or disabled at a global level, it is possible to
        # include a line for only one particular virtual host. For example the
        # following line enables the CGI configuration for this host only
        # after it has been globally disabled with "a2disconf".
        Include conf-available/serve-cgi-bin.conf
    
        # Enable php-fpm mode
        <Directory />
            Options All
            AllowOverride All
            Require all granted
        </Directory>
    </VirtualHost>
    
3. Restart Web Server dengan perintah:


    service apache2 restart
    
Selamat! Anda telah selesai melakukan konfigurasi Web Server dengan custom url untuk local komputer Anda.