<?php

return [
    'ad2372c69112d9c171d435fd5f674dbcb3efe60b13777c9eefe764ec7797b802' => [
        'title' => 'Memodifikasi objek terserialisasi',
        'description_html' => '<p>Lab ini memakai mekanisme sesi berbasis serialisasi sehingga rentan terhadap eskalasi hak akses. Untuk menyelesaikan lab, ubah objek terserialisasi di cookie sesi guna meraih hak akses administrator, lalu hapus pengguna [[C0]].</p><p>Anda dapat masuk ke akun Anda menggunakan kredensial berikut: [[C1]]</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Masuk memakai kredensial Anda. Permintaan [[C0]] pasca-login membawa cookie sesi yang tampak berenkode URL dan Base64.</li>
        <li>Gunakan panel Inspector Burp untuk meninjau bentuk terdekode dari cookie tersebut, yakni objek PHP terserialisasi. Atribut [[C1]] bernilai [[C2]], yang menandakan nilai boolean [[C3]]. Kirim permintaan ini ke Burp Repeater.</li>
        <li>Di Burp Repeater, ubah atribut [[C4]] di Inspector menjadi [[C5]] lalu klik "Apply changes" agar objek otomatis di-encode ulang.</li>
        <li>Kirim permintaan dan amati respons kini menampilkan tautan ke panel admin di [[C6]], menandakan Anda memiliki hak akses admin.</li>
        <li>Ubah path permintaan menjadi [[C7]] dan kirim ulang; halaman [[C8]] memuat tautan penghapusan akun pengguna.</li>
        <li>Ubah path permintaan menjadi [[C9]] dan kirim untuk menyelesaikan lab.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '445830f9c9a370d46e54ae646b92704ea142e1ac742174de313060662a9c9a96' => [
        'title' => 'Memodifikasi tipe data terserialisasi',
        'description_html' => '<p>Lab ini memakai mekanisme sesi berbasis serialisasi sehingga rentan terhadap bypass autentikasi. Untuk menyelesaikan lab, ubah objek terserialisasi di cookie sesi untuk mengakses akun [[C0]], lalu hapus pengguna [[C1]].</p><p>Anda dapat masuk ke akun Anda menggunakan kredensial berikut: [[C2]]</p><div class="component-solution expandable-container"><details><summary><h4><span class="icon-erlenmeyer"></span> Petunjuk</h4></summary><div class="content"><div><p>Untuk mengakses akun pengguna lain, Anda perlu mengeksploitasi keanehan cara PHP membandingkan data bertipe berbeda.</p><p>Perilaku perbandingan PHP berbeda antar-versi; lab ini mengacu pada perilaku PHP 7.x ke bawah.</p></div></div></details></div>',
        'sections' => [
            0 => '<div class="content"><div><p>Untuk mengakses akun pengguna lain, Anda perlu mengeksploitasi keanehan cara PHP membandingkan data bertipe berbeda.</p><p>Perilaku perbandingan PHP berbeda antar-versi; lab ini mengacu pada perilaku PHP 7.x ke bawah.</p></div></div>',
            1 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Login menggunakan kredensial Anda. Buka permintaan [[C0]] pasca-login di Burp, periksa cookie sesi di Inspector untuk melihat objek PHP terserialisasi, lalu kirim ke Burp Repeater.</li>
        <li>
            Di Burp Repeater, gunakan panel Inspector untuk memodifikasi cookie sesi sebagai berikut:
            <ul>
                <li>Perbarui panjang atribut [[C1]] menjadi [[C2]].</li>
                <li>Ubah username menjadi [[C3]].</li>
                <li>Ubah access token menjadi bilangan bulat [[C4]] dengan menghapus tanda kutip ganda di sekeliling nilainya.</li>
                <li>Ubah label tipe data access token dengan mengganti [[C5]] menjadi [[C6]].</li>
            </ul>
            <p>Hasilnya tampak seperti ini:</p>
            [[C7]]
        </li>
        <li>Klik "Apply changes" agar objek otomatis di-encode ulang dan diperbarui di permintaan.</li>
        <li>Kirim permintaan dan amati respons kini menampilkan tautan ke panel admin di [[C8]], menandakan Anda masuk sebagai [[C9]].</li>
        <li>Ubah path menjadi [[C10]] lalu kirim ulang; halaman [[C11]] memuat tautan hapus pengguna.</li>
        <li>Ubah path menjadi [[C12]] dan kirim untuk menyelesaikan lab.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '5239aa2e1e68409057bbd4a72799714b50acabc542275a95bc242612a8c6ed41' => [
        'title' => 'Memanfaatkan fungsionalitas aplikasi untuk mengeksploitasi deserialisasi tidak aman',
        'description_html' => '<p>Lab ini memakai mekanisme sesi berbasis serialisasi. Fitur tertentu memanggil metode berbahaya pada data di objek terserialisasi. Untuk menyelesaikan lab, ubah objek di cookie sesi guna menghapus file [[C0]] dari direktori home Carlos.</p><p>Anda dapat masuk ke akun Anda menggunakan kredensial berikut: [[C1]]</p><p>Anda juga memiliki akses ke akun cadangan: [[C2]]</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Login ke akun Anda. Di halaman "My account", perhatikan opsi penghapusan akun yang mengirim permintaan [[C0]] ke [[C1]].</li>
        <li>Kirim salah satu permintaan yang membawa cookie sesi ke Burp Repeater.</li>
        <li>Di Repeater, periksa cookie sesi via panel Inspector dan amati atribut [[C2]] yang berisi path file avatar Anda.</li>
        <li>
            <p>Edit data terserialisasi agar [[C3]] menunjuk ke [[C4]] beserta panjang string yang sesuai:</p>
            [[C5]]
        </li>
        <li>Klik "Apply changes" agar objek otomatis di-encode ulang.</li>
        <li>Ubah baris permintaan menjadi [[C6]] dan kirim. Akun Anda akan terhapus sekaligus menghapus file [[C7]] milik Carlos.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '5ce272b4b2a84159f707a668e2cae9811a2f787c9eb75229368cc6fe2a7f53db' => [
        'title' => 'Injeksi objek sembarang di PHP',
        'description_html' => '<p>Lab ini memakai mekanisme sesi berbasis serialisasi sehingga rentan terhadap injeksi objek sembarang. Untuk menyelesaikan lab, buat dan suntikkan objek terserialisasi berbahaya guna menghapus file [[C0]] dari direktori home Carlos. Anda perlu memperoleh akses ke kode sumbernya terlebih dahulu.</p><p>Anda dapat masuk ke akun Anda menggunakan kredensial berikut: [[C1]]</p><div class="component-solution expandable-container"><details><summary><h4><span class="icon-erlenmeyer"></span> Petunjuk</h4></summary><div class="content"><div><p>Anda terkadang dapat membaca kode sumber dengan menambahkan tanda tilde ([[C2]]) ke akhir nama file untuk mengambil file cadangan buatan editor.</p></div></div></details></div>',
        'sections' => [
            0 => '<div class="content"><div><p>Anda terkadang dapat membaca kode sumber dengan menambahkan tanda tilde ([[C0]]) ke akhir nama file untuk mengambil file cadangan buatan editor.</p></div></div>',
            1 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Login ke akun Anda dan amati cookie sesi berisi objek PHP terserialisasi.</li>
        <li>Dari site map, amati situs merujuk ke file [[C0]]. Klik kanan file tersebut lalu pilih "Send to Repeater".</li>
        <li>Di Burp Repeater, Anda dapat membaca kode sumbernya dengan menambahkan tilde ([[C1]]) pada nama file di baris permintaan.</li>
        <li>Di kode sumber, kelas [[C2]] memiliki magic method [[C3]] yang memanggil [[C4]] pada atribut [[C5]] untuk menghapus file di path tersebut.</li>
        <li>
            <p>Di Burp Decoder, susun objek PHP terserialisasi kelas [[C6]] dengan atribut [[C7]] disetel ke [[C8]] serta label tipe dan panjang yang akurat:</p>
            [[C9]]
        </li>
        <li>Encode objek tersebut dengan Base64 lalu URL-encode dan salin ke clipboard.</li>
        <li>Kirim permintaan berisi cookie sesi ke Burp Repeater.</li>
        <li>Ganti cookie sesi dengan cookie modifikasi di clipboard Anda.</li>
        <li>Kirim permintaan; magic method [[C10]] otomatis terpanggil dan menghapus file milik Carlos.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '02e0388c9613d9b7e6fb892294c7c72f478d94e413bb333920127e09c26fde35' => [
        'title' => 'Mengeksploitasi deserialisasi Java dengan Apache Commons',
        'description_html' => '<p>Lab ini memakai mekanisme sesi berbasis serialisasi dan memuat pustaka Apache Commons Collections. Meski tanpa akses kode sumber, Anda dapat mengeksploitasi lab ini memakai gadget chain siap pakai.</p><p>Untuk menyelesaikan lab, gunakan alat pihak ketiga untuk menghasilkan objek terserialisasi berbahaya berisi payload remote code execution, lalu kirim ke situs guna menghapus file [[C0]] dari direktori home Carlos.</p><p>Anda dapat masuk ke akun Anda menggunakan kredensial berikut: [[C1]]</p>',
        'sections' => [
            0 => '<div class="content"><div><p>Pada Java versi 16 ke atas, Anda perlu menambahkan serangkaian argumen baris perintah agar Java dapat menjalankan ysoserial, misalnya:</p>[[C0]]</div></div>',
            1 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Login ke akun Anda dan amati cookie sesi berisi objek Java terserialisasi, lalu kirim permintaannya ke Burp Repeater.</li>
        <li>
            <p>Unduh alat "ysoserial" lalu jalankan perintah berikut untuk menghasilkan objek terserialisasi berenkode Base64 berisi payload Anda:</p>
            <ul>
                <li>
                    <p>Untuk Java versi 16 ke atas:</p>
                    [[C0]]
                </li>
                <li>
                    <p>Untuk Java versi 15 ke bawah:</p>
                    [[C1]]
                </li>
            </ul>
        </li>
        <li>Di Burp Repeater, ganti cookie sesi dengan payload yang dihasilkan lalu URL-encode seluruh nilai cookie tersebut.</li>
        <li>Kirim permintaan untuk menyelesaikan lab.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '4bc929cce2fbdca5eaedc69bb4ab6f1d21c3960cb0212b5d72a5128eb6efc371' => [
        'title' => 'Mengeksploitasi deserialisasi PHP dengan gadget chain siap pakai',
        'description_html' => '<p>Lab ini memakai mekanisme sesi berbasis serialisasi dengan cookie bertanda tangan serta framework PHP umum. Meski tanpa akses kode sumber, celah deserialisasi ini bisa dieksploitasi dengan gadget chain siap pakai.</p><p>Untuk menyelesaikan lab, identifikasi framework target, buat objek terserialisasi berbahaya berisi payload RCE, hasilkan cookie bertanda tangan yang valid, lalu kirimkan ke situs untuk menghapus file [[C0]] dari direktori home Carlos.</p><p>Anda dapat masuk ke akun Anda menggunakan kredensial berikut: [[C1]]</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Login dan kirim permintaan berisi cookie sesi ke Burp Repeater. Sorot cookie tersebut lalu periksa panel <strong>Inspector</strong>.</li>
        <li>Perhatikan cookie berisi token berenkode Base64 yang ditandatangani dengan hash HMAC SHA-1.</li>
        <li>Salin cookie terdekode dari <strong>Inspector</strong> lalu tempelkan ke Decoder.</li>
        <li>Di Decoder, sorot token dan pilih <strong>Decode as &gt; Base64</strong> hingga terlihat objek PHP terserialisasi.</li>
        <li>
            Di Burp Repeater, kirim permintaan dengan cookie yang diubah; pengecualian tanda tangan muncul sekaligus mengungkap informasi penting:
            <ul>
                <li>Komentar pengembang mengungkap lokasi file debug di [[C0]].</li>
                <li>Pesan galat mengungkap situs memakai framework Symfony 4.3.6.</li>
            </ul>
        </li>
        <li>Minta file [[C1]] di Burp Repeater dan salin nilai variabel lingkungan [[C2]] untuk menandatangani eksploitasi nanti.</li>
        <li>
            <p>Unduh alat "PHPGGC" lalu jalankan perintah berikut:</p>
            [[C3]]
            <p>Perintah ini menghasilkan objek terserialisasi berenkode Base64 yang memanfaatkan gadget chain RCE Symfony untuk menghapus [[C4]] milik Carlos.</p>
        </li>
        <li>
            Buat cookie bertanda tangan yang valid memakai skrip PHP berikut dengan mengisi variabel [[C5]] (hasil PHPGGC) dan [[C6]] (dari [[C7]]):
            <ul>
                <li>Masukkan objek hasil PHPGGC ke variabel tersebut.</li>
                <li>Masukkan secret key yang disalin dari file debug.</li>
            </ul>
            [[C8]]
            <p>Skrip ini mencetak cookie bertanda tangan yang valid ke konsol.</p>
        </li>
        <li>Di Burp Repeater, ganti cookie sesi Anda dengan cookie baru tersebut lalu kirim permintaan untuk menyelesaikan lab.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    'c911d0a4c35afb75a94e7710baa76c14054cc1bc85b79632e70e049ed992fc02' => [
        'title' => 'Mengeksploitasi deserialisasi Ruby memakai gadget chain terdokumentasi',
        'description_html' => '<p>Lab ini memakai mekanisme sesi berbasis serialisasi dan framework Ruby on Rails. Tersedia eksploitasi terdokumentasi yang memungkinkan RCE melalui gadget chain di framework tersebut.</p><p>Untuk menyelesaikan lab, cari eksploitasi terdokumentasi dan sesuaikan untuk menghasilkan objek terserialisasi berbahaya berisi payload RCE guna menghapus file [[C0]] dari direktori home Carlos.</p><p>Anda dapat masuk ke akun Anda menggunakan kredensial berikut: wiener:peter</p><div class="component-solution expandable-container"><details><summary><h4><span class="icon-erlenmeyer"></span> Petunjuk</h4></summary><div class="content"><div><p>Coba cari "ruby deserialization gadget chain" di internet.</p></div></div></details></div>',
        'sections' => [
            0 => '<div class="content"><div><p>Coba cari "ruby deserialization gadget chain" di internet.</p></div></div>',
            1 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Login ke akun Anda dan amati cookie sesi berisi objek Ruby terserialisasi ("marshaled"), lalu kirim permintaannya ke Burp Repeater.</li>
        <li>Cari artikel [[C0]] oleh [[C1]] di [[C2]] dan salin skrip pembuat payload akhirnya.</li>
        <li>
            Ubah skrip tersebut sebagai berikut:
            <ul>
                <li>Ganti perintah yang dijalankan dari [[C3]] menjadi [[C4]].</li>
                <li>Ganti dua baris terakhir menjadi [[C5]] agar keluarannya berformat Base64 siap pakai.</li>
            </ul>
        </li>
        <li>Jalankan skrip dan salin objek berenkode Base64 yang dihasilkan.</li>
        <li>Di Burp Repeater, ganti cookie sesi Anda dengan payload tersebut lalu URL-encode.</li>
        <li>Kirim permintaan untuk menyelesaikan lab.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    'bc6c96fd9ecd7550f07fba8ec2535c8612837e50a4c1a64aaf05f06c848a4f00' => [
        'title' => 'Mengembangkan gadget chain kustom untuk deserialisasi Java',
        'description_html' => '<p>Lab ini memakai mekanisme sesi berbasis serialisasi. Jika Anda dapat menyusun gadget chain yang tepat, Anda dapat mengeksploitasi deserialisasi tidak aman untuk memperoleh kata sandi administrator.</p><p>Untuk menyelesaikan lab, akses kode sumber dan gunakan untuk menyusun gadget chain demi mendapatkan kata sandi admin, lalu login sebagai [[C0]] dan hapus [[C1]].</p><p>Anda dapat masuk ke akun Anda menggunakan kredensial berikut: [[C2]]</p><p>Menyelesaikan lab ini memerlukan pemahaman dasar topik lain di <a href="/web-security">Web Security Academy</a>.</p><div class="component-solution expandable-container"><details><summary><h4><span class="icon-erlenmeyer"></span> Petunjuk</h4></summary><div class="content"><div><p>Kami menyediakan <a href="https://github.com/PortSwigger/serialization-examples/tree/master/java/generic">program Java generik untuk serialisasi objek</a> yang bisa Anda sesuaikan, atau jalankan lewat IDE berbasis browser seperti [[C3]].</p></div></div></details></div>',
        'sections' => [
            0 => '<div class="content"><div><p>Kami menyediakan <a href="https://github.com/PortSwigger/serialization-examples/tree/master/java/generic">program Java generik untuk serialisasi objek</a> yang bisa Anda sesuaikan, atau jalankan lewat IDE berbasis browser seperti [[C0]].</p></div></div>',
            1 => <<<'LABHTML'
<div class="content"><div>
    <p><strong>Mengidentifikasi kerentanan</strong></p>
    <ol>
        <li>Login ke akun Anda dan amati cookie sesi berisi objek Java terserialisasi.</li>
        <li>Dari site map, amati situs merujuk file [[C0]] yang bisa diambil melalui Burp Repeater.</li>
        <li>Naik ke direktori [[C1]] dan temukan file [[C2]].</li>
        <li>Perhatikan bahwa metode [[C3]] meneruskan atribut [[C4]] templat langsung ke pernyataan SQL.</li>
        <li>
            Berdasarkan kode sumber bocor tersebut, tulis program Java kecil untuk menginstansiasi [[C5]], menserialisasikannya, dan mengenkodekannya dengan Base64.
            <div class="component-labinstructions">
                <h4>Templat</h4>
                <p>Kami juga menyediakan <a href="https://github.com/PortSwigger/serialization-examples/tree/master/java/solution">program siap pakai</a>. Anda cukup mengganti string [[C6]] di file [[C7]] untuk menyetel payload pada [[C8]] milik [[C9]] dan mencetak string Base64 hasilnya.</p>
            </div>
        </li>
        <li>Buat [[C10]] dengan atribut [[C11]] berisi tanda kutip tunggal, lalu kirim string Base64-nya sebagai cookie sesi. Pesan galat memastikan situs rentan SQL injection berbasis Postgres lewat deserialisasi objek.</li>
    </ol>
    <p><strong>Mengekstrak kata sandi</strong></p>
    <p>Setelah mengidentifikasi celah, Anda dapat menguji payload ekstraksi kata sandi melalui dua cara:</p>
    <ul>
        <li>Mengubah file Java, mengompilasi ulang, lalu menyalin ulang string Base64 untuk tiap payload.</li>
        <li>Atau menggunakan ekstensi <a href="https://portswigger.net/bappstore/65033cbd2c344fbabe57ac060b5dd100">Hackvertor</a> untuk menempelkan objek mentah di Repeater dan memperbarui offset panjang serta encoding Base64 secara otomatis.</li>
    </ul>
    <div class="component-labinstructions">
        <h4>Templat</h4>
        <p>Berikut templat Hackvertor berenkode Base64 agar terhindar dari masalah salin-tempel:</p>
        [[C12]]
        <p>Cara memakainya:</p>
        <ol>
            <li>Tempelkan ke cookie sesi di Burp Repeater.</li>
            <li>
                <p>Dekode Base64 hingga terlihat bentuk berikut:</p>
                [[C13]]
            </li>
            <li>Ganti <strong>kedua</strong> kemunculan [[C14]] dengan payload uji Anda dan biarkan sisanya tetap utuh.</li>
            <li>Kirim permintaan. Anda dapat memeriksa hasil konversi Hackvertor di tab "Logger".</li>
        </ol>
    </div>
    <p>Kita dapat memakai <a href="https://portswigger.net/web-security/sql-injection/union-attacks">serangan [[C15]]</a> berbasis galat untuk mengekstrak kata sandi:</p>
    <ol>
        <li><a href="https://portswigger.net/web-security/sql-injection/union-attacks#determining-the-number-of-columns-required-in-an-sql-injection-union-attack">Tentukan jumlah kolom</a> tabel (8).</li>
        <li><a href="https://portswigger.net/web-security/sql-injection/union-attacks#finding-columns-with-a-useful-data-type-in-an-sql-injection-union-attack">Identifikasi tipe data kolom</a> dan temukan bahwa kolom 4, 5, serta 6 bukan bertipe string dan pesan galatnya memantulkan masukan string Anda.</li>
        <li><a href="https://portswigger.net/web-security/sql-injection/examining-the-database#listing-the-contents-of-the-database">Daftar isi basis data</a> hingga menemukan tabel [[C16]] dengan kolom [[C17]].</li>
        <li>
            <p>Gunakan payload SQL injection berikut untuk mengekstrak kata sandi dari tabel [[C18]] lewat pesan galat konversi tipe:</p>
            [[C19]]
        </li>
        <li>Untuk menyelesaikan lab, masuk sebagai [[C20]] memakai kata sandi yang diekstrak, buka panel admin, dan hapus [[C21]].</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '9b523aff587e849d868e17b9207adf2504c2a979abaa229b9e0dee29ccd47ba2' => [
        'title' => 'Mengembangkan gadget chain kustom untuk deserialisasi PHP',
        'description_html' => '<p>Lab ini memakai mekanisme sesi berbasis serialisasi. Dengan menyusun gadget chain kustom, Anda dapat mengeksploitasi deserialisasi tidak aman hingga meraih remote code execution. Untuk menyelesaikan lab, hapus file [[C0]] dari direktori home Carlos.</p><p>Anda dapat masuk ke akun Anda menggunakan kredensial berikut: [[C1]]</p><div class="component-solution expandable-container"><details><summary><h4><span class="icon-erlenmeyer"></span> Petunjuk</h4></summary><div class="content"><div><p>Anda terkadang dapat membaca kode sumber dengan menambahkan tanda tilde ([[C2]]) ke nama file untuk mengambil file cadangan buatan editor.</p></div></div></details></div>',
        'sections' => [
            0 => '<div class="content"><div><p>Anda terkadang dapat membaca kode sumber dengan menambahkan tanda tilde ([[C0]]) ke nama file untuk mengambil file cadangan buatan editor.</p></div></div>',
            1 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Login ke akun Anda dan amati cookie sesi berisi objek PHP terserialisasi. Situs merujuk ke file [[C0]]; ambil kode sumbernya dengan meminta file cadangan berekstensi [[C1]].</li>
        <li>Di kode sumber, magic method [[C2]] pada [[C3]] membuat objek [[C4]] baru memakai atribut [[C5]] dan [[C6]] dari [[C7]].</li>
        <li>Kelas [[C8]] memiliki magic method [[C9]] yang terpanggil saat membaca atribut yang tidak ada, lalu memanggil [[C10]] pada fungsi di atribut [[C11]] dengan argumen [[C12]] (nama atribut yang diminta).</li>
        <li>
            <p>Anda dapat merangkai gadget chain ini untuk memanggil [[C13]] memakai objek [[C14]] yang dikonfigurasi seperti berikut:</p>
            [[C15]]
            <p>Saat konstruktor [[C16]] mencoba membaca [[C17]] dari objek [[C18]], metode [[C19]] terpanggil dan mengeksekusi fungsi callback [[C20]] dengan argumen nilai [[C21]] (perintah shell Anda).</p>
        </li>
        <li>
            <p>Untuk menyelesaikan lab, encode Base64 dan URL-encode objek terserialisasi berikut lalu kirimkan sebagai cookie sesi:</p>
            [[C22]]
        </li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    'c4e61b39d288bca003b86e45dee0513db9a657ffe518c38bc4a03a9d5658b220' => [
        'title' => 'Memanfaatkan deserialisasi PHAR untuk memasang gadget chain kustom',
        'description_html' => '<p>Lab ini tidak memakai deserialisasi secara eksplisit. Namun dengan menggabungkan deserialisasi [[C0]] dan teknik lanjutan lain, Anda tetap dapat meraih remote code execution melalui gadget chain kustom.</p><p>Untuk menyelesaikan lab, hapus file [[C1]] dari direktori home Carlos.</p><p>Anda dapat masuk ke akun Anda menggunakan kredensial berikut: [[C2]]</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Situs memiliki fitur unggah avatar yang hanya menerima gambar [[C0]]. Unggah gambar [[C1]] valid sebagai avatar dan amati gambar dimuat lewat [[C2]].</li>
        <li>Di Burp Repeater, minta [[C3]] untuk melihat daftar direktori berisi [[C4]] dan [[C5]], lalu ambil kode sumbernya memakai ekstensi cadangan [[C6]].</li>
        <li>Pelajari kode sumbernya dan temukan gadget chain yang melibatkan atribut [[C7]] dan [[C8]].</li>
        <li>Perhatikan bahwa fungsi sistem file [[C9]] dipanggil pada atribut [[C10]].</li>
        <li>
            <p>Situs memakai mesin templat Twig sehingga deserialisasi bisa meneruskan payload SSTI. Adaptasikan payload SSTI Twig untuk RCE guna menghapus file Carlos:</p>
            [[C11]]
        </li>
        <li>
            <p>Buat skrip PHP singkat untuk menyusun objek [[C12]] dan [[C13]] berisi payload SSTI tersebut:</p>
            [[C14]]
        </li>
        <li>Buat polyglot [[C15]] berisi skrip PHP Anda (cari skrip [[C16]] atau gunakan <a href="https://github.com/PortSwigger/serialization-examples/blob/master/php/phar-jpg-polyglot.jpg">file siap pakai dari PortSwigger</a>).</li>
        <li>Unggah file polyglot tersebut sebagai avatar Anda.</li>
        <li>
            <p>Di Burp Repeater, ubah baris permintaan agar mendeserialisasi avatar berbahaya memakai stream wrapper [[C17]]:</p>
            [[C18]]
        </li>
        <li>Kirim permintaan untuk menyelesaikan lab.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
];
