<?php

return [
    'efb3cd7d563d637400d229d7b4949233047f1b2808b1d46393322d66594a8de2' => [
        'title' => 'Fungsionalitas admin tanpa proteksi',
        'description_html' => '<p>Lab ini memiliki panel admin tanpa proteksi.</p><p>Selesaikan lab dengan menghapus pengguna [[C0]].</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Buka lab dan periksa [[C0]] dengan menambahkan [[C1]] pada URL lab. Baris [[C2]] mengungkap path ke panel admin.</li>
        <li>Di bilah alamat URL, ganti [[C3]] menjadi [[C4]] untuk membuka panel admin.</li>
        <li>Hapus [[C5]].</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '878a6a3a7bf5ca38441716313e1ad46697052f36b6c82c4a6bda1a98e28f446f' => [
        'title' => 'Fungsionalitas admin tanpa proteksi dengan URL sulit ditebak',
        'description_html' => '<p>Lab ini memiliki panel admin tanpa proteksi di lokasi yang sulit ditebak, tetapi lokasinya terungkap di suatu tempat pada aplikasi.</p><p>Selesaikan lab dengan mengakses panel admin dan memakainya untuk menghapus pengguna [[C0]].</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Tinjau kode sumber beranda lab menggunakan Burp Suite atau alat pengembang browser Anda.</li>
        <li>Amati bagian JavaScript yang mengungkap URL panel admin.</li>
        <li>Buka panel admin dan hapus [[C0]].</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    'f97895e072d86380dd3fdd12e2d6ceb6090708b4e3e0cd0990fe741afb553b2e' => [
        'title' => 'Peran pengguna dikendalikan oleh parameter permintaan',
        'description_html' => '<p>Lab ini memiliki panel admin di [[C0]] yang mengidentifikasi administrator lewat cookie yang dapat dipalsukan.</p><p>Selesaikan lab dengan mengakses panel admin dan memakainya untuk menghapus pengguna [[C1]].</p><p>Anda dapat masuk ke akun Anda menggunakan kredensial berikut: [[C2]]</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Buka [[C0]] dan amati bahwa Anda tidak bisa mengakses panel admin.</li>
        <li>Buka halaman login.</li>
        <li>Di Burp Proxy, nyalakan intersepsi serta aktifkan intersepsi respons.</li>
        <li>Isi dan kirimkan formulir login lalu teruskan permintaan yang masuk di Burp.</li>
        <li>Amati bahwa respons menyetel cookie [[C1]]. Ubah nilainya menjadi [[C2]].</li>
        <li>Buka panel admin dan hapus [[C3]].</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '703ed76cc046c2c9c06b661c1c25f53f7c1cb238e9b7fa9aff664177fd7c7773' => [
        'title' => 'Peran pengguna dapat dimodifikasi di profil pengguna',
        'description_html' => '<p>Lab ini memiliki panel admin di [[C0]] yang hanya dapat diakses pengguna login dengan [[C1]] bernilai 2.</p><p>Selesaikan lab dengan mengakses panel admin dan memakainya untuk menghapus pengguna [[C2]].</p><p>Anda dapat masuk ke akun Anda menggunakan kredensial berikut: [[C3]]</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Login menggunakan kredensial yang disediakan dan buka halaman akun Anda.</li>
        <li>Gunakan fitur yang tersedia untuk memperbarui alamat email akun Anda.</li>
        <li>Amati bahwa respons menampilkan role ID Anda.</li>
        <li>Kirim permintaan ubah email ke Burp Repeater, tambahkan [[C0]] ke dalam JSON isi permintaan, lalu kirim ulang.</li>
        <li>Amati bahwa respons menunjukkan [[C1]] Anda telah berubah menjadi 2.</li>
        <li>Buka [[C2]] dan hapus [[C3]].</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    'cf2d0a74362ee20a8f6ffb1028e3b44fee9ae125f418ed15832e4a8a2073bff9' => [
        'title' => 'ID pengguna dikendalikan oleh parameter permintaan',
        'description_html' => '<p>Lab ini memiliki kerentanan eskalasi hak akses horizontal di halaman akun pengguna.</p><p>Untuk menyelesaikan lab, dapatkan API key untuk pengguna [[C0]] dan kirimkan sebagai solusi.</p><p>Anda dapat masuk ke akun Anda menggunakan kredensial berikut: [[C1]]</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Login memakai kredensial yang diberikan lalu buka halaman akun Anda.</li>
        <li>Perhatikan bahwa URL memuat username Anda di parameter "id".</li>
        <li>Kirim permintaan tersebut ke Burp Repeater.</li>
        <li>Ubah parameter "id" menjadi [[C0]].</li>
        <li>Ambil dan kirimkan API key milik [[C1]].</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '9d95a9e677b81f605d40d00001ffbc8bbb0f0ee73773a3a37727fbde0406b779' => [
        'title' => 'ID pengguna dikendalikan oleh parameter permintaan dengan ID acak',
        'description_html' => '<p>Lab ini memiliki kerentanan eskalasi hak akses horizontal di halaman akun pengguna, tetapi mengidentifikasi pengguna memakai GUID.</p><p>Untuk menyelesaikan lab, temukan GUID milik [[C0]] lalu kirimkan API key-nya sebagai solusi.</p><p>Anda dapat masuk ke akun Anda menggunakan kredensial berikut: [[C1]]</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Temukan sebuah postingan blog yang ditulis oleh [[C0]].</li>
        <li>Klik nama [[C1]] dan amati bahwa URL memuat user ID-nya. Catat ID tersebut.</li>
        <li>Login menggunakan kredensial yang disediakan dan buka halaman akun Anda.</li>
        <li>Ubah parameter "id" menjadi user ID yang tadi dicatat.</li>
        <li>Ambil dan kirimkan API key-nya.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '114de45758e410d7a7458144d568a9c3b78a4be3a14daf61d4e552610739359d' => [
        'title' => 'ID pengguna dikendalikan oleh parameter permintaan dengan kebocoran data di pengalihan',
        'description_html' => '<p>Lab ini memiliki kerentanan kontrol akses yang membocorkan informasi sensitif di dalam isi respons pengalihan (redirect).</p><p>Untuk menyelesaikan lab, dapatkan API key untuk pengguna [[C0]] dan kirimkan sebagai solusi.</p><p>Anda dapat masuk ke akun Anda menggunakan kredensial berikut: [[C1]]</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Login menggunakan kredensial yang disediakan lalu buka halaman akun Anda.</li>
        <li>Kirim permintaan tersebut ke Burp Repeater.</li>
        <li>Ubah parameter "id" menjadi [[C0]].</li>
        <li>Amati bahwa meskipun respons mengalihkan Anda ke beranda, badan respons tetap menyertakan API key milik [[C1]].</li>
        <li>Kirimkan API key tersebut.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '9038df39e72961a071967a83c2472bf2edb0ef9595e6f13bd05ce1b2dce81234' => [
        'title' => 'ID pengguna dikendalikan oleh parameter permintaan dengan pengungkapan kata sandi',
        'description_html' => '<p>Lab ini memiliki halaman akun pengguna yang memuat kata sandi pengguna saat ini terisi otomatis di input bertopeng.</p><p>Untuk menyelesaikan lab, ambil kata sandi administrator lalu pakai untuk menghapus pengguna [[C0]].</p><p>Anda dapat masuk ke akun Anda menggunakan kredensial berikut: [[C1]]</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Login memakai kredensial yang diberikan lalu buka halaman akun pengguna.</li>
        <li>Ubah parameter "id" di URL menjadi [[C0]].</li>
        <li>Lihat respons di Burp dan amati badan respons memuat kata sandi administrator.</li>
        <li>Masuk ke akun administrator lalu hapus [[C1]].</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    'bf6b2f755e63ba10eefdb6633048fc5cf8e4c1d5f386a756fd8e4b6864d70857' => [
        'title' => 'Insecure direct object references',
        'description_html' => '<p>Lab ini menyimpan log obrolan pengguna langsung di sistem file server dan mengambilnya menggunakan URL statis.</p><p>Selesaikan lab dengan menemukan kata sandi pengguna [[C0]] lalu masuk ke akunnya.</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Buka tab <strong>Live chat</strong>.</li>
        <li>Kirim satu pesan lalu klik <strong>View transcript</strong>.</li>
        <li>Periksa URL dan amati transkrip berupa file teks dengan nama berangka urut.</li>
        <li>Ubah nama file menjadi [[C0]] dan baca teksnya untuk menemukan kata sandi di dalam transkrip obrolan.</li>
        <li>Kembali ke halaman utama lab lalu masuk memakai kredensial curian tersebut.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '9955f5350904edabe30089828d2c08ace886493264a0b469354503102379a3e9' => [
        'title' => 'Kontrol akses berbasis URL dapat dilewati',
        'description_html' => '<p>Situs ini memiliki panel admin tanpa autentikasi di [[C0]], namun sistem front-end memblokir akses eksternal ke path tersebut. Aplikasi back-end mendukung header [[C1]].</p><p>Untuk menyelesaikan lab, akses panel admin dan hapus pengguna [[C2]].</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Coba muat [[C0]] dan amati akses diblokir dengan respons sangat polos yang mengisyaratkan berasal dari sistem front-end.</li>
        <li>Kirim permintaan ke Burp Repeater. Ubah URL di baris permintaan menjadi [[C1]] dan tambahkan header HTTP [[C2]]. Respons "not found" membuktikan sistem back-end membaca URL dari header [[C3]].</li>
        <li>Ubah nilai header [[C4]] menjadi [[C5]] untuk membuka halaman admin.</li>
        <li>Untuk menghapus [[C6]], tambahkan [[C7]] ke query string asli, lalu ubah path header [[C8]] menjadi [[C9]].</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    'e115e4b43d59771bb787573f305861a795fb30f2447cef9b53618f4232d1c83b' => [
        'title' => 'Kontrol akses berbasis metode dapat dilewati',
        'description_html' => '<p>Lab ini menerapkan kontrol akses yang sebagian bergantung pada metode HTTP permintaan. Anda dapat mengenal panel admin lewat kredensial [[C0]].</p><p>Untuk menyelesaikan lab, login memakai kredensial [[C1]] dan eksploitasi kontrol akses yang cacat untuk mempromosikan diri Anda menjadi administrator.</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Masuk menggunakan kredensial admin.</li>
        <li>Buka panel admin, promosikan [[C0]], lalu kirim permintaan HTTP-nya ke Burp Repeater.</li>
        <li>Buka jendela browser privat/incognito dan login memakai kredensial non-admin.</li>
        <li>Coba promosikan [[C1]] kembali memakai cookie sesi pengguna non-admin di Burp Repeater, dan amati respons "Unauthorized".</li>
        <li>Ubah metode dari [[C2]] menjadi [[C3]] dan amati respons berubah menjadi "missing parameter".</li>
        <li>Ubah permintaan ke metode [[C4]] dengan klik kanan dan pilih "Change request method".</li>
        <li>Ubah parameter username ke username Anda lalu kirim ulang permintaan.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '48ea5eff7577d0d5e50c64b5d91f3e2fcc175ebb055c95f30bf8e909f6ba9d2c' => [
        'title' => 'Proses multi-langkah tanpa kontrol akses pada satu langkah',
        'description_html' => '<p>Lab ini memiliki panel admin dengan alur multi-langkah yang cacat saat mengubah peran pengguna. Anda dapat mengenal panel admin lewat kredensial [[C0]].</p><p>Untuk menyelesaikan lab, login memakai kredensial [[C1]] dan eksploitasi celah kontrol akses untuk mempromosikan diri Anda menjadi administrator.</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Masuk menggunakan kredensial admin.</li>
        <li>Buka panel admin, promosikan [[C0]], lalu kirim permintaan konfirmasinya ke Burp Repeater.</li>
        <li>Buka jendela privat/incognito dan masuk memakai kredensial non-admin.</li>
        <li>Salin cookie sesi non-admin ke permintaan Repeater tadi, ubah username ke username Anda, lalu kirim ulang.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '16e507638191c125691e9f9d752a1d42bf2e8fa811002b872ca607bd2cd8c334' => [
        'title' => 'Kontrol akses berbasis Referer',
        'description_html' => '<p>Lab ini mengendalikan akses fungsi admin tertentu berdasarkan header Referer. Anda dapat mengenal panel admin lewat kredensial [[C0]].</p><p>Untuk menyelesaikan lab, login memakai kredensial [[C1]] dan eksploitasi kontrol akses yang cacat untuk mempromosikan diri Anda menjadi administrator.</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Masuk menggunakan kredensial admin.</li>
        <li>Buka panel admin, promosikan [[C0]], lalu kirim permintaan HTTP-nya ke Burp Repeater.</li>
        <li>Buka jendela privat/incognito dan login memakai kredensial non-admin.</li>
        <li>Buka [[C1]] langsung di browser dan amati permintaan ditolak karena header Referer tidak ada.</li>
        <li>Salin cookie sesi non-admin ke permintaan di Burp Repeater, ubah username menjadi username Anda, lalu kirim ulang.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
];
