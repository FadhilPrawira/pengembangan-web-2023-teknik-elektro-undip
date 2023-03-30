# Code Igniter
- Download Code Igniter 3 dari https://codeigniter.com/download
- Khusus CI3 gunakan PHP 7.4

# Setting URL untuk <a href=""></a>
1. buat file bernama ```.htaccess```
2. isi file tersebut dengan command berikut
```
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php/$1 [L]
```
3. save file tersebut
4. buka ```application/config/config.php```
5. ubah kode yang awalnya berikut:
```$config['base_url'] = '';```
menjadi seperti ini:
```$config['base_url'] = 'http://localhost/pweb/';```
6. save file tersebut
7. ubah kode yang awalnya berikut:
```$config['index_page'] = 'index.php';```
menjadi seperti ini:
```$config['index_page'] = '';```
7. Jika membuat url, arahkan ke controllers lalu ke view. Contoh:
Anda sudah membuat file controllers ```Mahasiswa.php``` dan view ```welcome_mahasiswa.php```, serta ```tampil.php```. Maka tulis link pada ```welcome_mahasiswa.php``` dengan kode ```<a href="mahasiswa/tampil">Tampil mahasiswa</a>```
