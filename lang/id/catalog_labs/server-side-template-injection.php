<?php

return [
    '401f612b786a17fa5d79a4695034393111a37b23e3c9a729cdf23878231c53e2' => [
        'title' => 'Server-side template injection dasar',
        'description_html' => '<p>Lab ini rentan terhadap server-side template injection akibat penyusunan templat ERB yang tidak aman.</p><p>Untuk menyelesaikan lab, tinjau dokumentasi ERB guna mengetahui cara mengeksekusi kode sembarang, lalu hapus file [[C0]] dari direktori home Carlos.</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Perhatikan bahwa saat melihat detail produk pertama, permintaan [[C0]] memakai parameter [[C1]] untuk merender [[C2]] di halaman beranda.</li>
        <li>Di dokumentasi ERB, sintaks [[C3]] dipakai untuk mengevaluasi ekspresi dan merender hasilnya di halaman.</li>
        <li>
            <p>Gunakan sintaks templat ERB untuk membuat payload uji berisi operasi matematika, misalnya:</p>
            [[C4]]
        </li>
        <li>
            <p>Lakukan URL-encode pada payload ini dan masukkan ke nilai parameter [[C5]] di URL (ganti [[C6]] dengan ID lab Anda):</p>
            [[C7]]
        </li>
        <li>Muat URL tersebut di browser. Hasil operasi matematika (angka 49) muncul menggantikan pesan, menandakan kemungkinan adanya kerentanan server-side template injection.</li>
        <li>Di dokumentasi Ruby, metode [[C8]] dapat digunakan untuk menjalankan perintah sistem operasi sembarang.</li>
        <li>
            <p>Buat payload untuk menghapus file Carlos sebagai berikut:</p>
            [[C9]]
        </li>
        <li>
            <p>Lakukan URL-encode pada payload Anda dan masukkan ke parameter [[C10]] (ganti [[C11]] dengan ID lab Anda):</p>
            [[C12]]
        </li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '871a7e42cb341b879712b73bfea3c9d086ade90c22b54e76f4db136869b3dba9' => [
        'title' => 'Server-side template injection dasar (konteks kode)',
        'description_html' => '<p>Lab ini rentan terhadap server-side template injection karena penggunaan templat Tornado yang tidak aman. Untuk menyelesaikan lab, pelajari dokumentasi Tornado untuk mengeksekusi kode sembarang, lalu hapus file [[C0]] dari direktori home Carlos.</p><p>Anda dapat masuk ke akun Anda menggunakan kredensial berikut: [[C1]]</p><div class="component-solution expandable-container"><details><summary><h4><span class="icon-erlenmeyer"></span> Petunjuk</h4></summary><div class="content"><div><p>Periksa lebih cermat fitur "preferred name".</p></div></div></details></div>',
        'sections' => [
            0 => '<div class="content"><div><p>Periksa lebih cermat fitur "preferred name".</p></div></div>',
            1 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Sambil mem-proxy lalu lintas melalui Burp, login lalu kirim komentar pada salah satu postingan blog.</li>
        <li>Di halaman "My account", Anda bisa memilih memakai nama lengkap, nama depan, atau nama panggilan. Pengiriman pilihan tersebut memicu permintaan [[C0]] yang menyetel parameter [[C1]] ke [[C2]], [[C3]], atau [[C4]], sehingga memperbarui nama di atas komentar Anda.</li>
        <li>Di Burp, buka "Proxy" &gt; "HTTP history" dan kirim permintaan pengatur parameter tersebut, yakni [[C5]], ke Burp Repeater.</li>
        <li>
            <p>Pelajari dokumentasi Tornado untuk mengetahui bahwa ekspresi templat diapit kurung kurawal ganda seperti [[C6]]. Di Burp Repeater, Anda dapat keluar dari ekspresi dan menyuntikkan sintaks templat sembarang sebagai berikut:</p>
            [[C7]]
        </li>
        <li>Muat ulang halaman komentar Anda. Username kini tampil sebagai [[C8]], membuktikan adanya server-side template injection pada konteks kode.</li>
        <li>
            <p>Di dokumentasi Tornado, temukan sintaks untuk menjalankan kode Python sembarang:</p>
            [[C9]]
        </li>
        <li>Dari dokumentasi Python, mengimpor modul [[C10]] memungkinkan metode [[C11]] dipakai menjalankan perintah sistem sembarang.</li>
        <li>
            <p>Gabungkan keduanya untuk membuat payload yang menghapus file Carlos:</p>
            [[C12]]
        </li>
        <li>
            <p>Di Burp Repeater, kembali ke [[C13]]. Keluar dari ekspresi lalu suntikkan payload Anda dalam bentuk URL-encoded:</p>
            [[C14]]
        </li>
        <li>Muat ulang halaman komentar Anda untuk mengeksekusi templat dan menyelesaikan lab.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '994a665c4ea7fa2804f3b34e32aff30f4d936a60c26b48a14db2fc1e4a83e04b' => [
        'title' => 'Server-side template injection memanfaatkan dokumentasi',
        'description_html' => '<p>Lab ini rentan terhadap server-side template injection. Untuk menyelesaikan lab, identifikasi mesin templat dan gunakan dokumentasi untuk mengeksekusi kode sembarang, lalu hapus file [[C0]] dari direktori home Carlos.</p><p>Anda dapat masuk ke akun Anda menggunakan kredensial berikut:</p>[[C1]]<div class="component-solution expandable-container"><details><summary><h4><span class="icon-erlenmeyer"></span> Petunjuk</h4></summary><div class="content"><div><p>Cobalah menyelesaikan lab ini hanya memakai dokumentasi. Namun jika benar-benar buntu, cari eksploitasi terkenal oleh @albinowax untuk menyelesaikannya.</p></div></div></details></div>',
        'sections' => [
            0 => '<div class="content"><div><p>Cobalah menyelesaikan lab ini hanya memakai dokumentasi. Namun jika benar-benar buntu, cari eksploitasi terkenal oleh @albinowax untuk menyelesaikannya.</p></div></div>',
            1 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Login lalu ubah salah satu templat deskripsi produk. Mesin templat memakai sintaks [[C0]]. Masukkan ekspresi yang merujuk ke objek tak ada seperti [[C1]] lalu simpan. Pesan galat pada keluaran mengungkap mesin templat Freemarker digunakan.</li>
        <li>Pelajari dokumentasi Freemarker dan temukan bagian FAQ di apendiks mengenai bahaya built-in [[C2]].</li>
        <li>Buka bagian "Built-in reference" untuk entri [[C3]], yang menjelaskan bahwa [[C4]] dapat menciptakan objek Java sembarang yang mengimplementasikan antarmuka [[C5]].</li>
        <li>Buka JavaDoc untuk kelas [[C6]] dan tinjau daftar "All Known Implementing Classes".</li>
        <li>Amati adanya kelas bernama [[C7]] yang dapat mengeksekusi perintah shell sembarang.</li>
        <li>
            <p>Susun eksploitasi Anda atau adaptasi <a href="https://portswigger.net/research/server-side-template-injection">eksploitasi @albinowax</a> dari halaman riset kami sebagai berikut:</p>
            [[C8]]
        </li>
        <li>Hapus sintaks tidak valid sebelumnya dan sisipkan payload baru ini ke dalam templat.</li>
        <li>Simpan templat lalu buka halaman produk untuk menyelesaikan lab.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '546e06146b126617be92ff441630f1cd8cc05bf0a17ed763ca936166fd17d95b' => [
        'title' => 'Server-side template injection di bahasa tak dikenal dengan eksploitasi terdokumentasi',
        'description_html' => '<p>Lab ini rentan terhadap server-side template injection. Untuk menyelesaikan lab, identifikasi mesin templat dan temukan eksploitasi terdokumentasi secara daring untuk mengeksekusi kode sembarang, lalu hapus file [[C0]] dari direktori home Carlos.</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Perhatikan bahwa saat melihat detail produk pertama, permintaan [[C0]] memakai parameter [[C1]] untuk menampilkan [[C2]] di halaman beranda.</li>
        <li>Uji dengan menyuntikkan string fuzz berisi berbagai sintaks templat seperti [[C3]] ke parameter [[C4]]. Pesan galat yang muncul mengidentifikasi bahwa situs menggunakan Handlebars.</li>
        <li>Cari di web "Handlebars server-side template injection" hingga menemukan eksploitasi terkenal dari [[C5]].</li>
        <li>
            <p>Ubah eksploitasi tersebut agar memanggil [[C6]] sebagai berikut:</p>
            [[C7]]
        </li>
        <li>
            <p>Lakukan URL-encode pada eksploitasi dan masukkan sebagai nilai parameter message di URL (ganti [[C8]] dengan ID lab Anda):</p>
            [[C9]]
        </li>
        <li>Lab akan terselesaikan saat Anda memuat URL tersebut.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    'df068afc1423346dc3fc00c7af345df7970e4571cb93bd574dcce698e8bb50ed' => [
        'title' => 'Server-side template injection dengan pengungkapan informasi melalui objek pasokan pengguna',
        'description_html' => '<p>Lab ini rentan terhadap server-side template injection akibat cara sebuah objek diteruskan ke dalam templat. Kerentanan ini dapat dieksploitasi untuk mengakses data sensitif.</p><p>Untuk menyelesaikan lab, curi dan kirimkan secret key milik framework.</p><p>Anda dapat masuk ke akun Anda menggunakan kredensial berikut:</p>[[C0]]',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Login dan ubah salah satu templat deskripsi produk.</li>
        <li>Ubah salah satu ekspresi templat menjadi tidak valid, misalnya string fuzz [[C0]], lalu simpan. Pesan galat pada keluaran mengisyaratkan framework Django digunakan.</li>
        <li>Pelajari dokumentasi Django dan catat bahwa tag templat bawaan [[C1]] dapat dipanggil untuk menampilkan informasi debugging.</li>
        <li>
            <p>Di templat, hapus sintaks tidak valid dan masukkan pernyataan berikut untuk memanggil built-in [[C2]]:</p>
            [[C3]]
        </li>
        <li>Simpan templat. Keluaran menampilkan daftar objek dan properti yang bisa diakses dari dalam templat, termasuk akses ke objek [[C4]].</li>
        <li>Di dokumentasi Django, objek [[C5]] memuat properti [[C6]] yang berdampak keamanan serius bila diketahui penyerang.</li>
        <li>Di dalam templat, hapus pernyataan [[C7]] dan masukkan ekspresi [[C8]].</li>
        <li>Simpan templat untuk menampilkan secret key framework.</li>
        <li>Klik tombol "Submit solution" lalu kirimkan secret key tersebut untuk menyelesaikan lab.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    'c61a3223815a3affe2d0768f4eaba10bca9fd31203ab3a555f662ce3456ed8a8' => [
        'title' => 'Server-side template injection di lingkungan sandbox',
        'description_html' => '<p>Lab ini menggunakan mesin templat Freemarker dan rentan terhadap server-side template injection karena sandbox-nya lemah. Untuk menyelesaikan lab, keluar dari sandbox untuk membaca file [[C0]] dari direktori home Carlos, lalu kirimkan isi file tersebut.</p><p>Anda dapat masuk ke akun Anda menggunakan kredensial berikut:</p>[[C1]]',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Login dan ubah salah satu templat deskripsi produk. Perhatikan bahwa Anda memiliki akses ke objek [[C0]].</li>
        <li>Buka JavaDoc untuk kelas [[C1]] guna menemukan metode yang tersedia di semua objek. Pastikan Anda dapat mengeksekusi [[C2]] melalui objek [[C3]].</li>
        <li>
            <p>Telusuri dokumentasi untuk menemukan rangkaian pemanggilan metode yang memberi akses ke kelas dengan metode statis untuk membaca file, misalnya:</p>
            [[C4]]
        </li>
        <li>Masukkan payload ini ke salah satu templat lalu simpan. Keluaran menampilkan isi file sebagai kode ASCII desimal.</li>
        <li>Konversi byte tersebut kembali ke teks ASCII.</li>
        <li>Klik tombol "Submit solution" dan kirimkan string tersebut untuk menyelesaikan lab.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    'b6596a3779a729318ac89f63b0738e7abd4d39fde164ac01691f555eeb608396' => [
        'title' => 'Server-side template injection dengan eksploitasi kustom',
        'description_html' => '<p>Lab ini rentan terhadap server-side template injection. Untuk menyelesaikan lab, buat eksploitasi kustom untuk menghapus file [[C0]] dari direktori home Carlos.</p><p>Anda dapat masuk ke akun Anda menggunakan kredensial berikut: [[C1]]</p><div class="component-labinstructions"><h4>Peringatan</h4><p>Seperti halnya kerentanan kritis lainnya, mencoba server-side template injection bisa berisiko. Jika tidak berhati-hati saat memanggil metode, instance lab dapat rusak dan tidak bisa diselesaikan lagi. Bila ini terjadi, Anda harus menunggu 20 menit sampai sesi lab di-reset.</p></div>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Sambil mem-proxy lalu lintas melalui Burp, login lalu kirim komentar di salah satu postingan blog.</li>
        <li>Buka halaman "My account". Fitur preferred name rentan terhadap server-side template injection seperti pada lab sebelumnya, dan Anda memiliki akses ke objek [[C0]].</li>
        <li>Periksa fitur avatar kustom. Mengunggah gambar tidak valid menghasilkan pesan galat yang mengungkap metode [[C1]] dan path file [[C2]].</li>
        <li>Unggah gambar yang valid sebagai avatar lalu muat halaman berisi komentar uji Anda.</li>
        <li>
            <p>Di Burp Repeater, buka permintaan [[C3]] pengubah preferred name dan pakai parameter [[C4]] untuk menetapkan file sembarang sebagai avatar:</p>
            [[C5]]
        </li>
        <li>
            <p>Muat ulang halaman komentar untuk merender templat. Pesan galat menunjukkan Anda harus memberi MIME type gambar sebagai argumen kedua, lalu muat ulang kembali:</p>
            [[C6]]
        </li>
        <li>Untuk membaca file, muat avatar melalui [[C7]], yang mengembalikan isi file [[C8]] dan membuktikan akses pembacaan file sembarang.</li>
        <li>
            <p>Ulangi proses tersebut untuk membaca file PHP yang tadi Anda catat:</p>
            [[C9]]
        </li>
        <li>Di dalam file PHP itu, Anda memiliki akses ke fungsi [[C10]] yang menghapus avatar pengguna. Gabungkan cara ini untuk menghapus file Carlos.</li>
        <li>
            <p>Tetapkan file target sebagai avatar lalu muat komentar agar templat tereksekusi:</p>
            [[C11]]
        </li>
        <li>Panggil metode [[C12]] dan lihat kembali komentar Anda untuk menyelesaikan lab.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
];
