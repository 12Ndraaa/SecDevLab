<?php

return [
    'e099d35e2901da6366800094b6799c4b2a46e0ef8a5b0a66cf018a9138af817d' => [
        'title' => 'Kerentanan CSRF tanpa pertahanan',
        'description_html' => '<p>Fungsi perubahan email pada lab ini rentan terhadap CSRF.</p><p>Untuk menyelesaikan lab, buat HTML yang memanfaatkan serangan CSRF untuk mengubah alamat email pengunjung lalu unggah ke server eksploitasi Anda.</p><p>Anda dapat masuk ke akun Anda menggunakan kredensial berikut: [[C0]]</p><div class="component-solution expandable-container"><details><summary><h4><span class="icon-erlenmeyer"></span> Petunjuk</h4></summary><div class="content"><div><p>Anda tidak bisa mendaftarkan alamat email yang sudah dipakai pengguna lain. Jika Anda mengganti email akun Anda saat menguji eksploitasi, pastikan memakai alamat email berbeda untuk eksploitasi final yang dikirim ke korban.</p></div></div></details></div>',
        'sections' => [
            0 => '<div class="content"><div><p>Anda tidak bisa mendaftarkan alamat email yang sudah dipakai pengguna lain. Jika Anda mengganti email akun Anda saat menguji eksploitasi, pastikan memakai alamat email berbeda untuk eksploitasi final yang dikirim ke korban.</p></div></div>',
            1 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Buka browser Burp lalu masuk ke akun Anda. Kirimkan formulir "Update email", kemudian temukan permintaan yang dihasilkan di Proxy history.</li>
        <li>
            <p>Jika memakai Burp Suite Professional, klik kanan permintaan lalu pilih Engagement tools / Generate CSRF PoC. Aktifkan opsi penyertaan skrip auto-submit lalu klik "Regenerate".</p>
            <p>Atau jika memakai Burp Suite Community Edition, gunakan templat HTML berikut. Anda dapat menyalin URL permintaan dengan klik kanan lalu memilih "Copy URL".</p>
            [[C0]]
        </li>
        <li>Buka server eksploitasi, tempelkan HTML eksploitasi ke bagian "Body", lalu klik "Store".</li>
        <li>Untuk memverifikasi eksploitasi berfungsi, uji terlebih dahulu pada diri Anda dengan mengklik "View exploit" dan periksa permintaan serta respons HTTP yang muncul.</li>
        <li>Ubah alamat email pada eksploitasi agar tidak sama dengan email Anda sendiri.</li>
        <li>Klik "Deliver to victim" untuk menyelesaikan lab.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '67b30f1019d4da5703cfb696ae747d43ecca9801fa36d4bec720290c4e09451e' => [
        'title' => 'CSRF dengan validasi token yang bergantung pada metode permintaan',
        'description_html' => '<p>Fungsi perubahan email pada lab ini rentan terhadap CSRF. Sistem berupaya memblokir serangan CSRF, tetapi hanya menerapkan pertahanan pada jenis permintaan tertentu.</p><p>Untuk menyelesaikan lab, gunakan server eksploitasi untuk menampung halaman HTML yang melancarkan serangan CSRF guna mengganti alamat email pengunjung.</p><p>Anda dapat masuk ke akun Anda menggunakan kredensial berikut: [[C0]]</p><div class="component-solution expandable-container"><details><summary><h4><span class="icon-erlenmeyer"></span> Petunjuk</h4></summary><div class="content"><div><p>Anda tidak bisa mendaftarkan alamat email yang sudah dipakai pengguna lain. Jika Anda mengganti email akun Anda saat menguji eksploitasi, pastikan memakai alamat email berbeda untuk eksploitasi final yang dikirim ke korban.</p></div></div></details></div>',
        'sections' => [
            0 => '<div class="content"><div><p>Anda tidak bisa mendaftarkan alamat email yang sudah dipakai pengguna lain. Jika Anda mengganti email akun Anda saat menguji eksploitasi, pastikan memakai alamat email berbeda untuk eksploitasi final yang dikirim ke korban.</p></div></div>',
            1 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Buka browser Burp lalu masuk ke akun Anda. Kirimkan formulir "Update email", kemudian temukan permintaan yang dihasilkan di Proxy history.</li>
        <li>Kirim permintaan tersebut ke Burp Repeater dan amati bahwa jika Anda mengubah nilai parameter [[C0]], permintaan ditolak.</li>
        <li>Gunakan "Change request method" di menu konteks untuk mengubahnya menjadi permintaan GET dan amati bahwa token CSRF tidak lagi diverifikasi.</li>
        <li>
            <p>Jika memakai Burp Suite Professional, klik kanan permintaan lalu pilih Engagement tools / Generate CSRF PoC. Aktifkan opsi penyertaan skrip auto-submit lalu klik "Regenerate".</p>
            <p>Atau jika memakai Burp Suite Community Edition, gunakan templat HTML berikut. Anda dapat menyalin URL permintaan dengan klik kanan lalu memilih "Copy URL".</p>
            [[C1]]
        </li>
        <li>Buka server eksploitasi, tempelkan HTML eksploitasi ke bagian "Body", lalu klik "Store".</li>
        <li>Untuk memastikan eksploitasi berfungsi, uji terlebih dahulu dengan mengklik "View exploit" dan periksa permintaan serta respons HTTP yang muncul.</li>
        <li>Ubah alamat email pada eksploitasi agar tidak sama dengan email Anda sendiri.</li>
        <li>Simpan eksploitasi, lalu klik "Deliver to victim" untuk menyelesaikan lab.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '464b3ce68cb4a94b23c4dca52f5535b394cb9d940479664818f3fd06c514cd42' => [
        'title' => 'CSRF dengan validasi token hanya saat token disertakan',
        'description_html' => '<p>Fungsi perubahan email pada lab ini rentan terhadap CSRF.</p><p>Untuk menyelesaikan lab, gunakan server eksploitasi untuk menampung halaman HTML yang melancarkan serangan CSRF guna mengganti alamat email pengunjung.</p><p>Anda dapat masuk ke akun Anda menggunakan kredensial berikut: [[C0]]</p><div class="component-solution expandable-container"><details><summary><h4><span class="icon-erlenmeyer"></span> Petunjuk</h4></summary><div class="content"><div><p>Anda tidak bisa mendaftarkan alamat email yang sudah dipakai pengguna lain. Jika Anda mengganti email akun Anda saat menguji eksploitasi, pastikan memakai alamat email berbeda untuk eksploitasi final yang dikirim ke korban.</p></div></div></details></div>',
        'sections' => [
            0 => '<div class="content"><div><p>Anda tidak bisa mendaftarkan alamat email yang sudah dipakai pengguna lain. Jika Anda mengganti email akun Anda saat menguji eksploitasi, pastikan memakai alamat email berbeda untuk eksploitasi final yang dikirim ke korban.</p></div></div>',
            1 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Buka browser Burp lalu masuk ke akun Anda. Kirimkan formulir "Update email", kemudian temukan permintaan yang dihasilkan di Proxy history.</li>
        <li>Kirim permintaan tersebut ke Burp Repeater dan amati bahwa jika nilai parameter [[C0]] diubah, permintaan ditolak.</li>
        <li>Hapus parameter [[C1]] sepenuhnya dan amati bahwa permintaan kini diterima.</li>
        <li>
            <p>Jika memakai Burp Suite Professional, klik kanan permintaan lalu pilih Engagement tools / Generate CSRF PoC. Aktifkan opsi penyertaan skrip auto-submit lalu klik "Regenerate".</p>
            <p>Atau jika memakai Burp Suite Community Edition, gunakan templat HTML berikut. Anda dapat menyalin URL permintaan dengan klik kanan lalu memilih "Copy URL".</p>
            [[C2]]
        </li>
        <li>Buka server eksploitasi, tempelkan HTML eksploitasi ke bagian "Body", lalu klik "Store".</li>
        <li>Untuk memastikan eksploitasi berfungsi, uji terlebih dahulu pada diri Anda dengan mengklik "View exploit" dan periksa permintaan serta respons HTTP yang muncul.</li>
        <li>Ubah alamat email pada eksploitasi agar tidak sama dengan email Anda sendiri.</li>
        <li>Simpan eksploitasi, lalu klik "Deliver to victim" untuk menyelesaikan lab.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '9eae9022063a6e38c28fc4b7904b4ac75ca324323ceb51dac385ad7dc5c734e5' => [
        'title' => 'CSRF ketika token tidak terikat ke sesi pengguna',
        'description_html' => '<p>Fungsi perubahan email pada lab ini rentan terhadap CSRF. Situs memakai token untuk mencegah serangan CSRF, tetapi tidak terintegrasi ke sistem penanganan sesi.</p><p>Untuk menyelesaikan lab, gunakan server eksploitasi untuk menampung halaman HTML yang melancarkan serangan CSRF guna mengganti alamat email pengunjung.</p><p>Anda memiliki dua akun di aplikasi untuk merancang serangan, dengan kredensial berikut:</p><ul><li>[[C0]]</li><li>[[C1]]</li></ul><div class="component-solution expandable-container"><details><summary><h4><span class="icon-erlenmeyer"></span> Petunjuk</h4></summary><div class="content"><div><p>Anda tidak bisa mendaftarkan alamat email yang sudah dipakai pengguna lain. Jika Anda mengganti email akun Anda saat menguji eksploitasi, pastikan memakai alamat email berbeda untuk eksploitasi final yang dikirim ke korban.</p></div></div></details></div>',
        'sections' => [
            0 => '<div class="content"><div><p>Anda tidak bisa mendaftarkan alamat email yang sudah dipakai pengguna lain. Jika Anda mengganti email akun Anda saat menguji eksploitasi, pastikan memakai alamat email berbeda untuk eksploitasi final yang dikirim ke korban.</p></div></div>',
            1 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Buka browser Burp lalu masuk ke akun Anda. Kirimkan formulir "Update email" dan intersep permintaan yang muncul.</li>
        <li>Catat nilai token CSRF, lalu batalkan (drop) permintaan tersebut.</li>
        <li>Buka jendela browser privat/incognito, masuk ke akun Anda yang satunya, lalu kirimkan permintaan ubah email ke Burp Repeater.</li>
        <li>Amati bahwa jika token CSRF ditukar dengan nilai dari akun lain, permintaan tetap diterima.</li>
        <li>Buat dan tampung eksploitasi proof of concept seperti pada solusi lab <a href="/web-security/csrf/lab-no-defenses">CSRF vulnerability with no defenses</a>. Karena token CSRF hanya berlaku sekali pakai, pastikan menyertakan token yang masih baru.</li>
        <li>Ubah alamat email pada eksploitasi agar tidak sama dengan email Anda sendiri.</li>
        <li>Simpan eksploitasi, lalu klik "Deliver to victim" untuk menyelesaikan lab.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    'e32727c0220c06992583ba03b02655e4edbc8c9127fff08a29ad3c40c169495d' => [
        'title' => 'CSRF ketika token terikat ke cookie non-sesi',
        'description_html' => '<p>Fungsi perubahan email pada lab ini rentan terhadap CSRF. Situs memakai token untuk mencegah serangan CSRF, tetapi tidak terintegrasi sepenuhnya ke sistem penanganan sesi.</p><p>Untuk menyelesaikan lab, gunakan server eksploitasi untuk menampung halaman HTML yang melancarkan serangan CSRF guna mengganti alamat email pengunjung.</p><p>Anda memiliki dua akun di aplikasi untuk merancang serangan, dengan kredensial berikut:</p><ul><li>[[C0]]</li><li>[[C1]]</li></ul><div class="component-solution expandable-container"><details><summary><h4><span class="icon-erlenmeyer"></span> Petunjuk</h4></summary><div class="content"><div><p>Anda tidak bisa mendaftarkan alamat email yang sudah dipakai pengguna lain. Jika Anda mengganti email akun Anda saat menguji eksploitasi, pastikan memakai alamat email berbeda untuk eksploitasi final yang dikirim ke korban.</p></div></div></details></div>',
        'sections' => [
            0 => '<div class="content"><div><p>Anda tidak bisa mendaftarkan alamat email yang sudah dipakai pengguna lain. Jika Anda mengganti email akun Anda saat menguji eksploitasi, pastikan memakai alamat email berbeda untuk eksploitasi final yang dikirim ke korban.</p></div></div>',
            1 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Buka browser Burp lalu masuk ke akun Anda. Kirimkan formulir "Update email" dan temukan permintaannya di Proxy history.</li>
        <li>Kirim permintaan ke Burp Repeater dan amati bahwa mengubah cookie [[C0]] membuat Anda keluar dari sesi, sedangkan mengubah cookie [[C1]] hanya membuat token CSRF ditolak. Ini menandakan cookie [[C2]] tidak terikat ketat pada sesi.</li>
        <li>Buka jendela privat/incognito, masuk ke akun Anda yang lain, lalu kirim permintaan ubah email baru ke Burp Repeater.</li>
        <li>Amati bahwa menukar cookie [[C3]] dan parameter [[C4]] dari akun pertama ke akun kedua membuat permintaan tetap diterima.</li>
        <li>Tutup tab Repeater dan browser incognito tersebut.</li>
        <li>Kembali ke browser awal, lakukan pencarian, kirim permintaannya ke Burp Repeater, dan amati bahwa kata kunci pencarian tercermin di header Set-Cookie. Karena fitur pencarian tidak memiliki proteksi CSRF, Anda dapat memanfaatkannya untuk menyuntikkan cookie ke browser korban.</li>
        <li>
            <p>Buat URL yang memanfaatkan kerentanan ini untuk menyuntikkan cookie [[C5]] Anda ke browser korban:</p>
            [[C6]]
        </li>
        <li>Buat dan tampung eksploitasi proof of concept seperti di solusi lab <a href="/web-security/csrf/lab-no-defenses">CSRF vulnerability with no defenses</a> dengan menyertakan token CSRF Anda pada permintaan ubah email.</li>
        <li>
            <p>Hapus blok auto-submit [[C7]], lalu tambahkan kode berikut untuk menyuntikkan cookie dan mengirim formulir:</p>
            [[C8]]
        </li>
        <li>Ubah alamat email pada eksploitasi agar tidak sama dengan email Anda sendiri.</li>
        <li>Simpan eksploitasi, lalu klik "Deliver to victim" untuk menyelesaikan lab.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '681e7cf13b94031af2af240c4c07e7885859b8205e31bd6b511abb2077bc0227' => [
        'title' => 'CSRF ketika token diduplikasi di cookie',
        'description_html' => '<p>Fungsi perubahan email pada lab ini rentan terhadap CSRF. Situs berupaya menggunakan teknik pencegahan CSRF "double submit" yang tidak aman.</p><p>Untuk menyelesaikan lab, gunakan server eksploitasi untuk menampung halaman HTML yang melancarkan serangan CSRF guna mengganti alamat email pengunjung.</p><p>Anda dapat masuk ke akun Anda menggunakan kredensial berikut: [[C0]]</p><div class="component-solution expandable-container"><details><summary><h4><span class="icon-erlenmeyer"></span> Petunjuk</h4></summary><div class="content"><div><p>Anda tidak bisa mendaftarkan alamat email yang sudah dipakai pengguna lain. Jika Anda mengganti email akun Anda saat menguji eksploitasi, pastikan memakai alamat email berbeda untuk eksploitasi final yang dikirim ke korban.</p></div></div></details></div>',
        'sections' => [
            0 => '<div class="content"><div><p>Anda tidak bisa mendaftarkan alamat email yang sudah dipakai pengguna lain. Jika Anda mengganti email akun Anda saat menguji eksploitasi, pastikan memakai alamat email berbeda untuk eksploitasi final yang dikirim ke korban.</p></div></div>',
            1 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Buka browser Burp lalu masuk ke akun Anda. Kirimkan formulir "Update email" dan temukan permintaannya di Proxy history.</li>
        <li>Kirim permintaan ke Burp Repeater dan amati bahwa nilai parameter body [[C0]] hanya divalidasi dengan membandingkannya langsung terhadap cookie [[C1]].</li>
        <li>Lakukan pencarian, kirim permintaannya ke Burp Repeater, lalu amati bahwa kata kunci pencarian tercermin pada header Set-Cookie. Karena fitur pencarian tidak memiliki proteksi CSRF, Anda dapat memakainya untuk menyuntikkan cookie ke browser korban.</li>
        <li>
            <p>Buat URL yang memanfaatkan kerentanan ini untuk menyuntikkan cookie [[C2]] palsu ke browser korban:</p>
            [[C3]]
        </li>
        <li>Buat dan tampung eksploitasi proof of concept seperti di solusi lab <a href="/web-security/csrf/lab-no-defenses">CSRF vulnerability with no defenses</a> dengan menetapkan nilai token CSRF menjadi "fake" pada permintaan ubah email.</li>
        <li>
            <p>Hapus blok auto-submit [[C4]], lalu tambahkan kode berikut untuk menyuntikkan cookie sekaligus mengirimkan formulir:</p>
            [[C5]]
        </li>
        <li>Ubah alamat email pada eksploitasi agar tidak sama dengan email Anda sendiri.</li>
        <li>Simpan eksploitasi, lalu klik "Deliver to victim" untuk menyelesaikan lab.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    'ddae9bffdcb03f70c0ece2fac25e236d84670c553a409d983f4d364a96ed45a3' => [
        'title' => 'Melewati SameSite Lax via method override',
        'description_html' => '<p>Fungsi perubahan email pada lab ini rentan terhadap CSRF. Untuk menyelesaikan lab, lakukan serangan CSRF guna mengubah alamat email korban menggunakan server eksploitasi yang disediakan.</p><p>Anda dapat masuk ke akun Anda menggunakan kredensial berikut: [[C0]]</p><div class="highlightedarea"><h4>Catatan</h4><p>Pembatasan SameSite bawaan berbeda antar-browser. Karena korban memakai Chrome, disarankan juga memakai Chrome (atau browser Chromium bawaan Burp) saat menguji eksploitasi.</p></div><div class="component-solution expandable-container"><details><summary><h4><span class="icon-erlenmeyer"></span> Petunjuk</h4></summary><div class="content"><div><p>Anda tidak bisa mendaftarkan alamat email yang sudah dipakai pengguna lain. Jika Anda mengganti email akun Anda saat menguji eksploitasi, pastikan memakai alamat email berbeda untuk eksploitasi final yang dikirim ke korban.</p></div></div></details></div>',
        'sections' => [
            0 => '<div class="content"><div><p>Anda tidak bisa mendaftarkan alamat email yang sudah dipakai pengguna lain. Jika Anda mengganti email akun Anda saat menguji eksploitasi, pastikan memakai alamat email berbeda untuk eksploitasi final yang dikirim ke korban.</p></div></div>',
            1 => <<<'LABHTML'
<div class="content"><div>
    <h5>Mempelajari fungsi perubahan email</h5>
    <ol>
        <li><p>Di browser Burp, masuk ke akun Anda dan ubah alamat email Anda.</p></li>
        <li><p>Di Burp, buka tab <strong>Proxy &gt; HTTP history</strong>.</p></li>
        <li><p>Pelajari permintaan [[C0]] dan perhatikan bahwa permintaan ini tidak menyertakan token yang sulit ditebak, sehingga berpotensi rentan terhadap CSRF bila Anda bisa melewati pembatasan cookie SameSite.</p></li>
        <li><p>Lihat respons permintaan [[C1]]. Situs tidak menetapkan pembatasan SameSite secara eksplisit saat mengatur cookie sesi, sehingga browser memakai tingkat pembatasan bawaan [[C2]].</p></li>
        <li><p>Pahami bahwa ini berarti cookie sesi akan dikirim pada permintaan lintas situs [[C3]] selama melibatkan navigasi tingkat atas (top-level navigation).</p></li>
    </ol>
    <h5>Melewati pembatasan SameSite</h5>
    <ol>
        <li><p>Kirim permintaan [[C4]] ke Burp Repeater.</p></li>
        <li><p>Di Burp Repeater, klik kanan permintaan lalu pilih <strong>Change request method</strong> untuk mengubahnya menjadi permintaan [[C5]].</p></li>
        <li><p>Kirim permintaan. Amati bahwa endpoint hanya mengizinkan permintaan [[C6]].</p></li>
        <li>
            <p>Coba timpa metode dengan menambahkan parameter [[C7]] pada query string:</p>
            [[C8]]
        </li>
        <li><p>Kirim permintaan. Amati bahwa permintaan diterima oleh server.</p></li>
        <li><p>Di browser, buka halaman akun Anda untuk memastikan email telah berubah.</p></li>
    </ol>
    <h5>Menyusun eksploitasi</h5>
    <ol>
        <li><p>Di browser, buka server eksploitasi.</p></li>
        <li>
            <p>Di bagian <strong>Body</strong>, buat payload HTML/JavaScript yang memicu browser korban mengirim permintaan [[C9]] berbahaya tadi lewat navigasi tingkat atas agar cookie sesi ikut terkirim:</p>
            [[C10]]
        </li>
        <li><p>Simpan dan uji eksploitasi pada diri Anda sendiri, lalu pastikan alamat email Anda berubah.</p></li>
        <li><p>Ubah alamat email pada eksploitasi agar tidak sama dengan email Anda sendiri.</p></li>
        <li><p>Kirim eksploitasi ke korban untuk menyelesaikan lab.</p></li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '0706592c0e05520a0d622e33957f791edd8348e91ea46cc2899bab8fd501e37b' => [
        'title' => 'Melewati SameSite Strict via pengalihan sisi klien',
        'description_html' => '<p>Fungsi perubahan email pada lab ini rentan terhadap CSRF. Untuk menyelesaikan lab, lakukan serangan CSRF guna mengganti alamat email korban menggunakan server eksploitasi yang disediakan.</p><p>Anda dapat masuk ke akun Anda menggunakan kredensial berikut: [[C0]]</p><div class="component-solution expandable-container"><details><summary><h4><span class="icon-erlenmeyer"></span> Petunjuk</h4></summary><div class="content"><div><p>Anda tidak bisa mendaftarkan alamat email yang sudah dipakai pengguna lain. Jika Anda mengganti email akun Anda saat menguji eksploitasi, pastikan memakai alamat email berbeda untuk eksploitasi final yang dikirim ke korban.</p></div></div></details></div>',
        'sections' => [
            0 => '<div class="content"><div><p>Anda tidak bisa mendaftarkan alamat email yang sudah dipakai pengguna lain. Jika Anda mengganti email akun Anda saat menguji eksploitasi, pastikan memakai alamat email berbeda untuk eksploitasi final yang dikirim ke korban.</p></div></div>',
            1 => <<<'LABHTML'
<div class="content"><div>
    <h5>Mempelajari fungsi perubahan email</h5>
    <ol>
        <li><p>Di browser Burp, masuk ke akun Anda lalu ubah alamat email Anda.</p></li>
        <li><p>Di Burp, buka tab <strong>Proxy &gt; HTTP history</strong>.</p></li>
        <li><p>Pelajari permintaan [[C0]] dan perhatikan bahwa permintaan ini tidak memakai token yang sulit ditebak, sehingga berpotensi rentan CSRF jika pembatasan cookie SameSite dapat dilewati.</p></li>
        <li><p>Lihat respons permintaan [[C1]]. Situs secara eksplisit menetapkan [[C2]] saat menyetel cookie sesi, yang mencegah browser mengirim cookie pada permintaan lintas situs.</p></li>
    </ol>
    <h5>Mengidentifikasi gadget yang sesuai</h5>
    <ol>
        <li><p>Di browser, buka salah satu postingan blog lalu kirim komentar acak. Anda diarahkan ke halaman konfirmasi di [[C3]] lalu beberapa detik kemudian kembali ke postingan blog.</p></li>
        <li><p>Di riwayat proxy, perhatikan bahwa pengalihan tersebut ditangani sisi klien oleh file JavaScript [[C4]].</p></li>
        <li><p>Pelajari skrip tersebut dan amati bahwa parameter query [[C5]] dipakai secara dinamis untuk menyusun path pengalihan sisi klien.</p></li>
        <li><p>Di riwayat proxy, klik kanan permintaan [[C6]] dan pilih <strong>Copy URL</strong>.</p></li>
        <li>
            <p>Kunjungi URL tersebut di browser dengan mengganti parameter [[C7]] menjadi string acak:</p>
            [[C8]]
        </li>
        <li><p>Amati bahwa halaman konfirmasi muncul sejenak sebelum JavaScript mencoba mengalihkan Anda ke path berisi string suntikan, misalnya [[C9]].</p></li>
        <li>
            <p>Coba suntikkan urutan path traversal agar URL pengalihan mengarah ke halaman akun Anda:</p>
            [[C10]]
        </li>
        <li><p>Browser menormalisasi URL tersebut dan mengarahkan Anda ke halaman akun. Ini memastikan parameter [[C11]] dapat memicu permintaan [[C12]] ke endpoint mana pun di situs target.</p></li>
    </ol>
    <h5>Melewati pembatasan SameSite</h5>
    <ol>
        <li>
            <p>Di browser, buka server eksploitasi dan buat skrip yang mendorong browser korban mengirim permintaan [[C13]] tadi:</p>
            [[C14]]
        </li>
        <li><p>Simpan lalu buka eksploitasi tersebut sendiri.</p></li>
        <li><p>Ketika pengalihan sisi klien terjadi, Anda tetap masuk ke halaman akun terautentikasi. Browser menyertakan cookie sesi pada permintaan kedua meski permintaan awalnya dipicu dari situs eksternal.</p></li>
    </ol>
    <h5>Menyusun eksploitasi</h5>
    <ol>
        <li><p>Kirim permintaan [[C15]] ke Burp Repeater.</p></li>
        <li><p>Di Repeater, klik kanan permintaan lalu pilih <strong>Change request method</strong> untuk mengubahnya menjadi permintaan [[C16]].</p></li>
        <li><p>Kirim permintaan dan pastikan endpoint mengizinkan perubahan email lewat permintaan [[C17]].</p></li>
        <li>
            <p>Kembali ke server eksploitasi dan ubah parameter [[C18]] sehingga pengalihan mengirim permintaan [[C19]] untuk mengubah alamat email:</p>
            [[C20]]
            <p>Pastikan Anda menyertakan parameter [[C21]] dan melakukan URL-encode pada karakter ampersand agar tidak keluar dari parameter [[C22]] pada permintaan awal.</p>
        </li>
        <li><p>Uji eksploitasi pada diri Anda dan pastikan email berhasil berubah.</p></li>
        <li><p>Ubah alamat email pada eksploitasi agar tidak sama dengan email Anda sendiri.</p></li>
        <li><p>Kirim eksploitasi ke korban. Setelah beberapa detik, lab akan terselesaikan.</p></li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '44cca99334d60d91033bf4bd0908a142896514af0a3c0c343f8017fe71781ae9' => [
        'title' => 'Melewati SameSite Strict via domain saudara',
        'description_html' => '<p>Fitur live chat pada lab ini rentan terhadap cross-site WebSocket hijacking (CSWSH). Untuk menyelesaikan lab, masuklah ke akun korban.</p><p>Untuk melakukannya, gunakan server eksploitasi yang disediakan guna melancarkan serangan CSWSH yang mengekfiltrasi riwayat chat korban ke server Burp Collaborator bawaan. Riwayat chat tersebut berisi kredensial login dalam teks polos.</p><p>Jika belum, kami menyarankan menyelesaikan topik <a href="/web-security/websockets">Kerentanan WebSocket</a> terlebih dahulu sebelum mencoba lab ini.</p><div class="component-solution expandable-container"><details><summary><h4><span class="icon-erlenmeyer"></span> Petunjuk</h4></summary><div class="content"><div><p>Pastikan Anda memeriksa seluruh permukaan serangan yang tersedia. Perhatikan celah tambahan yang dapat membantu mengirim serangan Anda, dan ingat bahwa dua domain bisa berada di dalam satu situs (same site) yang sama.</p></div></div></details></div>',
        'sections' => [
            0 => '<div class="content"><div><p>Pastikan Anda memeriksa seluruh permukaan serangan yang tersedia. Perhatikan celah tambahan yang dapat membantu mengirim serangan Anda, dan ingat bahwa dua domain bisa berada di dalam satu situs (same site) yang sama.</p></div></div>',
            1 => <<<'LABHTML'
<div class="content"><div>
    <h5>Mempelajari fitur live chat</h5>
    <ol>
        <li><p>Di browser Burp, buka fitur live chat lalu kirim beberapa pesan.</p></li>
        <li><p>Di Burp, buka tab <strong>Proxy &gt; HTTP history</strong> dan temukan permintaan handshake WebSocket, yaitu permintaan [[C0]] terbaru.</p></li>
        <li><p>Perhatikan permintaan ini tidak memiliki token yang sulit ditebak, sehingga berpotensi rentan CSWSH jika pembatasan cookie SameSite dapat dilewati.</p></li>
        <li><p>Di browser, muat ulang halaman live chat.</p></li>
        <li><p no-keyword-injection="">Di Burp, buka tab <strong>Proxy &gt; WebSockets history</strong>. Saat halaman dimuat ulang, browser mengirim pesan [[C1]] yang membuat server mengirimkan seluruh riwayat chat.</p></li>
    </ol>
    <h5>Mengonfirmasi kerentanan CSWSH</h5>
    <ol>
        <li><p>Di Burp, buka tab <strong>Collaborator</strong> dan klik <strong>Copy to clipboard</strong> untuk menyalin payload Collaborator baru.</p></li>
        <li>
            <p>Di browser, buka server eksploitasi lalu gunakan templat berikut untuk membuat skrip proof of concept CSWSH:</p>
            [[C2]]
        </li>
        <li><p>Simpan dan buka eksploitasi pada diri Anda sendiri.</p></li>
        <li><p>Di Burp, kembali ke tab <strong>Collaborator</strong> dan klik <strong>Poll now</strong>. Anda akan melihat interaksi HTTP yang menandakan koneksi live chat baru berhasil dibuka.</p></li>
        <li><p>Walau kerentanan CSWSH terbukti, Anda baru mengekfiltrasi riwayat chat untuk sesi baru yang masih kosong.</p></li>
        <li><p>Buka tab <strong>Proxy &gt; HTTP history</strong> dan cari permintaan handshake WebSocket [[C3]] yang dipicu skrip Anda.</p></li>
        <li><p>Perhatikan bahwa cookie sesi Anda tidak terkirim bersama permintaan.</p></li>
        <li><p>Pada respons login sebelumnya, situs menetapkan [[C4]] secara eksplisit pada cookie sesi sehingga cookie ditahan pada permintaan lintas situs.</p></li>
    </ol>
    <h5>Mengidentifikasi kerentanan tambahan di "site" yang sama</h5>
    <ol>
        <li><p no-keyword-injection="">Di Burp, telusuri riwayat proxy dan amati bahwa respons untuk resource skrip dan gambar memuat header [[C5]] yang mengungkap domain saudara (sibling domain) di [[C6]].</p></li>
        <li><p>Kunjungi URL baru tersebut di browser untuk menemukan formulir login lain.</p></li>
        <li><p>Kirim kredensial acak dan perhatikan bahwa username tercermin di respons pada pesan galat [[C7]].</p></li>
        <li>
            <p>Coba suntikkan payload XSS lewat parameter [[C8]], misalnya:</p>
            [[C9]]
        </li>
        <li><p>Amati bahwa [[C10]] terpanggil, membuktikan adanya vektor reflected XSS.</p></li>
        <li><p>Kirim permintaan [[C11]] berisi payload XSS ke Burp Repeater.</p></li>
        <li><p>Di Burp Repeater, klik kanan permintaan lalu pilih <strong>Change request method</strong> untuk mengubahnya menjadi [[C12]] dan pastikan responsnya tetap sama.</p></li>
        <li><p>Klik kanan permintaan lagi dan pilih <strong>Copy URL</strong>. Kunjungi URL tersebut di browser dan pastikan XSS tetap terpicu. Karena domain saudara ini masih berada di situs yang sama, Anda dapat memakai XSS ini untuk melancarkan serangan CSWSH tanpa terblokir aturan SameSite.</p></li>
    </ol>
    <h5>Melewati pembatasan SameSite</h5>
    <ol>
        <li>
            <p>Susun ulang skrip CSWSH yang diuji di server eksploitasi tadi:</p>
            [[C13]]
        </li>
        <li><p>Lakukan URL-encode pada seluruh skrip tersebut.</p></li>
        <li>
            <p>Kembali ke server eksploitasi dan buat skrip yang mengarahkan browser korban mengirim permintaan [[C14]] tadi dengan payload CSWSH ter-URL-encode sebagai parameter [[C15]]:</p>
            [[C16]]
        </li>
        <li><p>Simpan dan uji eksploitasi pada diri Anda sendiri.</p></li>
        <li><p>Di tab <strong>Collaborator</strong>, klik <strong>Poll now</strong> dan amati interaksi baru yang berisi seluruh riwayat chat Anda.</p></li>
        <li><p>Di tab <strong>Proxy &gt; HTTP history</strong>, cari permintaan handshake WebSocket [[C17]] terbaru.</p></li>
        <li><p>Pastikan permintaan tersebut kini membawa cookie sesi Anda karena dipicu dari domain saudara yang dianggap same-site oleh browser.</p></li>
    </ol>
    <h5>Mengirim rangkaian eksploitasi</h5>
    <ol>
        <li><p>Kembali ke server eksploitasi dan kirim eksploitasi ke korban.</p></li>
        <li><p>Di Burp, buka tab <strong>Collaborator</strong> lalu klik <strong>Poll now</strong>.</p></li>
        <li><p>Amati interaksi baru yang masuk.</p></li>
        <li><p>Periksa interaksi HTTP untuk membaca riwayat chat korban.</p></li>
        <li><p>Temukan pesan berisi username dan kata sandi korban.</p></li>
        <li><p>Gunakan kredensial tersebut untuk masuk ke akun korban dan menyelesaikan lab.</p></li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '827802fa22cc24000bb63cd4a2787ba5076b3c9727323ea512dc392ba98842b8' => [
        'title' => 'CSRF dengan validasi Referer hanya saat header disertakan',
        'description_html' => '<p>Fungsi perubahan email pada lab ini rentan terhadap CSRF. Situs mencoba memblokir permintaan lintas domain, tetapi memiliki mekanisme fallback yang tidak aman.</p><p>Untuk menyelesaikan lab, gunakan server eksploitasi untuk menampung halaman HTML yang melancarkan serangan CSRF guna mengganti alamat email pengunjung.</p><p>Anda dapat masuk ke akun Anda menggunakan kredensial berikut: [[C0]]</p><div class="component-solution expandable-container"><details><summary><h4><span class="icon-erlenmeyer"></span> Petunjuk</h4></summary><div class="content"><div><p>Anda tidak bisa mendaftarkan alamat email yang sudah dipakai pengguna lain. Jika Anda mengganti email akun Anda saat menguji eksploitasi, pastikan memakai alamat email berbeda untuk eksploitasi final yang dikirim ke korban.</p></div></div></details></div>',
        'sections' => [
            0 => '<div class="content"><div><p>Anda tidak bisa mendaftarkan alamat email yang sudah dipakai pengguna lain. Jika Anda mengganti email akun Anda saat menguji eksploitasi, pastikan memakai alamat email berbeda untuk eksploitasi final yang dikirim ke korban.</p></div></div>',
            1 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Buka browser Burp lalu masuk ke akun Anda. Kirimkan formulir "Update email" dan temukan permintaannya di Proxy history.</li>
        <li>Kirim permintaan ke Burp Repeater dan amati bahwa jika domain pada header HTTP Referer diubah, permintaan akan ditolak.</li>
        <li>Hapus header Referer sepenuhnya dan amati bahwa permintaan kini diterima.</li>
        <li>
            <p>Buat dan tampung eksploitasi proof of concept seperti di solusi lab <a href="/web-security/csrf/lab-no-defenses">CSRF vulnerability with no defenses</a>. Sertakan HTML berikut untuk menahan pengiriman header Referer:</p>
            [[C0]]
        </li>
        <li>Ubah alamat email pada eksploitasi agar tidak sama dengan email Anda sendiri.</li>
        <li>Simpan eksploitasi, lalu klik "Deliver to victim" untuk menyelesaikan lab.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '16d017d6cc0162f41ea71950a84e47e8a8b7914d65e26f917ea8fd2366287791' => [
        'title' => 'CSRF dengan validasi Referer yang cacat',
        'description_html' => '<p>Fungsi perubahan email pada lab ini rentan terhadap CSRF. Situs berupaya mendeteksi dan memblokir permintaan lintas domain, tetapi mekanisme deteksinya dapat dilewati.</p><p>Untuk menyelesaikan lab, gunakan server eksploitasi untuk menampung halaman HTML yang melancarkan serangan CSRF guna mengganti alamat email pengunjung.</p><p>Anda dapat masuk ke akun Anda menggunakan kredensial berikut: [[C0]]</p><div class="component-solution expandable-container"><details><summary><h4><span class="icon-erlenmeyer"></span> Petunjuk</h4></summary><div class="content"><div><p>Anda tidak bisa mendaftarkan alamat email yang sudah dipakai pengguna lain. Jika Anda mengganti email akun Anda saat menguji eksploitasi, pastikan memakai alamat email berbeda untuk eksploitasi final yang dikirim ke korban.</p></div></div></details></div>',
        'sections' => [
            0 => '<div class="content"><div><p>Anda tidak bisa mendaftarkan alamat email yang sudah dipakai pengguna lain. Jika Anda mengganti email akun Anda saat menguji eksploitasi, pastikan memakai alamat email berbeda untuk eksploitasi final yang dikirim ke korban.</p></div></div>',
            1 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Buka browser Burp lalu masuk ke akun Anda. Kirimkan formulir "Update email" dan temukan permintaannya di Proxy history.</li>
        <li>Kirim permintaan ke Burp Repeater. Amati bahwa jika domain di header HTTP Referer diubah, permintaan akan ditolak.</li>
        <li>
            <p>Salin domain asli instance lab Anda lalu tempelkan ke header Referer sebagai query string seperti contoh berikut:</p>
            [[C0]]
        </li>
        <li>Kirim permintaan dan amati bahwa permintaan kini diterima. Situs menerima header Referer apa pun selama mengandung domain yang diharapkan di dalam string tersebut.</li>
        <li>
            <p>Buat eksploitasi proof of concept CSRF seperti di solusi lab <a href="/web-security/csrf/lab-no-defenses">CSRF vulnerability with no defenses</a> lalu tampung di server eksploitasi. Edit JavaScript sehingga argumen ketiga fungsi [[C1]] menyertakan query string berisi URL instance lab Anda:</p>
            [[C2]]
            <p>Cara ini membuat header Referer pada permintaan yang dihasilkan memuat URL situs target di query string, seperti pengujian sebelumnya.</p>
        </li>
        <li>
            <p>Jika Anda menyimpan eksploitasi dan mengujinya lewat "View exploit", galat "invalid Referer header" mungkin kembali muncul karena banyak browser modern memotong query string dari header Referer. Untuk mengatasinya dan menjaga URL lengkap tetap dikirim, buka server eksploitasi dan tambahkan header berikut di bagian "Head":</p>
            [[C3]]
            <p>Perhatikan bahwa berbeda dengan header Referer biasa, kata "referrer" di sini harus dieja dengan huruf r ganda.</p>
        </li>
        <li>Ubah alamat email pada eksploitasi agar tidak sama dengan email Anda sendiri.</li>
        <li>Simpan eksploitasi, lalu klik "Deliver to victim" untuk menyelesaikan lab.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
];
