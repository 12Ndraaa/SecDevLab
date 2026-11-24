<?php

return [
    'bb33e208e844c60faa4fe5876260053b536745d65312212a398ef5799fad29c8' => [
        'title' => 'Enumerasi username melalui perbedaan respons',
        'description_html' => '<p>Lab ini rentan terhadap enumerasi username dan serangan brute-force kata sandi. Terdapat akun dengan username dan kata sandi terprediksi yang tercantum di daftar kata berikut:</p><ul><li><a chunk-keep-link="" href="/web-security/authentication/auth-lab-usernames">Kandidat username</a></li><li><a chunk-keep-link="" href="/web-security/authentication/auth-lab-passwords">Kandidat kata sandi</a></li></ul><p>Untuk menyelesaikan lab, enumerasi username yang valid, lakukan brute-force kata sandinya, lalu akses halaman akunnya.</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Dengan Burp berjalan, buka halaman login dan kirimkan username serta kata sandi yang salah.</li>
        <li>Di Burp, buka <strong>Proxy &gt; HTTP history</strong> dan temukan permintaan [[C0]], sorot nilai parameter [[C1]], lalu kirim ke Burp Intruder.</li>
        <li>Di Burp Intruder, parameter [[C2]] otomatis ditandai dengan simbol [[C3]], misalnya [[C4]]. Biarkan kata sandi bernilai statis terlebih dahulu.</li>
        <li>Pastikan <strong>Sniper attack</strong> dipilih.</li>
        <li>Di panel samping <strong>Payloads</strong>, pastikan tipe payload <strong>Simple list</strong> dipilih.</li>
        <li>Di bagian <strong>Payload configuration</strong>, tempelkan daftar kandidat username lalu klik <strong><span class="icon-play-circle-outline"></span> Start attack</strong>.</li>
        <li>Setelah serangan selesai, periksa kolom <strong>Length</strong>; ada satu entri lebih panjang dengan pesan [[C5]] berubah menjadi [[C6]]. Catat username dari kolom <strong>Payload</strong>.</li>
        <li>
            <p>Tutup serangan, kembali ke tab <strong>Intruder</strong>, klik <strong>Clear §</strong>, masukkan username yang ditemukan pada [[C7]], lalu pasang posisi payload pada [[C8]]:</p>
            [[C9]]
        </li>
        <li>Di panel samping <strong>Payloads</strong>, ganti daftar username dengan daftar kandidat kata sandi lalu klik <strong><span class="icon-play-circle-outline"></span> Start attack</strong>.</li>
        <li>Setelah selesai, periksa kolom <strong>Status</strong>; semua berstatus [[C10]] kecuali satu respons [[C11]] yang menandakan login berhasil. Catat kata sandinya.</li>
        <li>
            <p>Login memakai username dan kata sandi tersebut lalu akses halaman akun untuk menyelesaikan lab.</p>
            <div class="highlightedarea">
                <h4>Catatan</h4>
                <p>Brute force juga bisa dilakukan dengan satu serangan cluster bomb, tetapi mengenumerasi username valid lebih dahulu jauh lebih efisien.</p>
            </div>
        </li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '55a6f6d2de02362486d2c507f3191adb99fb573cd1583e7a69246d62445ed703' => [
        'title' => 'Bypass sederhana 2FA',
        'description_html' => '<p>Autentikasi dua faktor (2FA) pada lab ini dapat dilewati. Anda sudah memiliki username dan kata sandi valid tetapi tidak memiliki kode verifikasi 2FA-nya. Untuk menyelesaikan lab, akses halaman akun Carlos.</p><ul><li>Kredensial Anda: [[C0]]</li><li>Kredensial korban: [[C1]]</li></ul>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Masuk ke akun Anda sendiri; kode verifikasi 2FA dikirim melalui email lewat tombol <strong>Email client</strong>.</li>
        <li>Buka halaman akun Anda dan catat URL-nya.</li>
        <li>Logout dari akun Anda.</li>
        <li>Login menggunakan kredensial korban.</li>
        <li>Saat diminta memasukkan kode verifikasi, ubah URL secara manual ke [[C0]] untuk menyelesaikan lab.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    'a2aa25c63138601f68030a53721c7e4e4f97843ee4d4fff8c485bce7f03ea087' => [
        'title' => 'Logika rusak pada reset kata sandi',
        'description_html' => '<p>Fitur reset kata sandi lab ini rentan. Untuk menyelesaikan lab, reset kata sandi Carlos lalu login dan buka halaman "My account" miliknya.</p><ul><li>Kredensial Anda: [[C0]]</li><li>Username korban: [[C1]]</li></ul>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Dengan Burp berjalan, klik tautan <strong>Forgot your password?</strong> dan masukkan username Anda sendiri.</li>
        <li>Klik tombol <strong>Email client</strong>, buka tautan di email reset, lalu atur ulang kata sandi Anda.</li>
        <li>Di Burp, buka <strong>Proxy &gt; HTTP history</strong> dan amati permintaan [[C0]] menyertakan username sebagai input tersembunyi, lalu kirim ke Burp Repeater.</li>
        <li>Di Burp Repeater, reset kata sandi tetap berhasil meski nilai parameter [[C1]] dihapus di URL maupun body permintaan, membuktikan token tidak diperiksa.</li>
        <li>Di browser, ajukan reset kata sandi lagi dan kirim ulang permintaan [[C2]] baru ke Burp Repeater.</li>
        <li>Di Burp Repeater, kosongkan nilai parameter [[C3]] di URL dan body, ubah parameter [[C4]] menjadi [[C5]], tetapkan kata sandi baru pilihan Anda, lalu kirim permintaan.</li>
        <li>Di browser, masuk ke akun Carlos memakai kata sandi baru tersebut lalu klik <strong>My account</strong> untuk menyelesaikan lab.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '4eacbb457e9ae79cc134bd8a335d37d42545fa6aa7306ff2f1d68b2cd9a1fe0d' => [
        'title' => 'Enumerasi username melalui perbedaan respons yang halus',
        'description_html' => '<p>Lab ini rentan secara halus terhadap enumerasi username dan serangan brute-force kata sandi. Terdapat akun dengan username dan kata sandi terprediksi di daftar kata berikut:</p><ul><li><a chunk-keep-link="" href="/web-security/authentication/auth-lab-usernames">Kandidat username</a></li><li><a chunk-keep-link="" href="/web-security/authentication/auth-lab-passwords">Kandidat kata sandi</a></li></ul><p>Untuk menyelesaikan lab, enumerasi username valid, brute-force kata sandinya, lalu akses halaman akunnya.</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Dengan Burp berjalan, kirim username dan kata sandi salah, sorot parameter [[C0]] pada permintaan [[C1]], lalu kirim ke Burp Intruder.</li>
        <li>Di <strong>Intruder</strong>, amati parameter [[C2]] otomatis ditandai sebagai posisi payload.</li>
        <li>Di panel samping <strong>Payloads</strong>, pilih tipe <strong>Simple list</strong> dan tambahkan daftar kandidat username.</li>
        <li>Klik tab <strong><span class="icon-settings"></span> Settings</strong>; di bawah <strong>Grep - Extract</strong> klik <strong>Add</strong>, gulir respons sampai pesan galat [[C3]], sorot teks pesan itu, klik <strong>OK</strong>, lalu mulai serangan.</li>
        <li>Setelah serangan selesai, urutkan kolom ekstraksi tambahan tersebut dan temukan satu entri yang sedikit berbeda.</li>
        <li>Periksa responsnya: pesan galat pada entri tersebut diakhiri spasi alih-alih tanda titik. Catat username ini.</li>
        <li>
            <p>Tutup jendela hasil, kembali ke tab <strong>Intruder</strong>, masukkan username tersebut, dan pasang posisi payload pada [[C4]]:</p>
            [[C5]]
        </li>
        <li>Ganti daftar username dengan daftar kata sandi di panel samping <strong>Payloads</strong> lalu mulai serangan.</li>
        <li>Setelah selesai, temukan satu permintaan yang menerima respons [[C6]] dan catat kata sandinya.</li>
        <li>
            <p>Login memakai username dan kata sandi tersebut lalu buka halaman akun untuk menyelesaikan lab.</p>
            <div class="highlightedarea">
                <h4>Catatan</h4>
                <p>Brute force juga bisa dilakukan dengan satu serangan cluster bomb, tetapi mengenumerasi username valid lebih dahulu jauh lebih efisien.</p>
            </div>
        </li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    'aac0059c54f24f1874ac6c39b2fa9f7b5e0d5ab84ad797d4ca300275cf14c842' => [
        'title' => 'Enumerasi username melalui waktu respons',
        'description_html' => '<p>Lab ini rentan terhadap enumerasi username berdasarkan waktu responsnya. Untuk menyelesaikan lab, enumerasi username valid, brute-force kata sandinya, lalu akses halaman akunnya.</p><ul><li>Kredensial Anda: [[C0]]</li><li><a chunk-keep-link="" href="/web-security/authentication/auth-lab-usernames">Kandidat username</a></li><li><a chunk-keep-link="" href="/web-security/authentication/auth-lab-passwords">Kandidat kata sandi</a></li></ul><div class="component-solution expandable-container"><details><summary><h4><span class="icon-erlenmeyer"></span> Petunjuk</h4></summary><div class="content"><div><p>Lab ini juga menerapkan perlindungan brute-force berbasis IP yang dapat dilewati dengan memanipulasi header permintaan HTTP.</p></div></div></details></div>',
        'sections' => [
            0 => '<div class="content"><div><p>Lab ini juga menerapkan perlindungan brute-force berbasis IP yang dapat dilewati dengan memanipulasi header permintaan HTTP.</p></div></div>',
            1 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Dengan Burp berjalan, kirim login salah lalu kirim permintaan [[C0]] ke Burp Repeater. Percobaan gagal berulang kali akan memblokir alamat IP Anda.</li>
        <li>Identifikasi bahwa header [[C1]] didukung sehingga Anda dapat memalsukan alamat IP dan melewati pemblokiran.</li>
        <li>Amati waktu respons: username tidak valid selalu diproses cepat dengan durasi sama, sedangkan username valid (seperti akun Anda) memproses kata sandi sehingga durasinya membesar seiring panjang kata sandi.</li>
        <li>Kirim permintaan ke Burp Intruder, pilih <strong>Pitchfork attack</strong>, dan tambahkan header [[C2]].</li>
        <li>Pasang posisi payload pada header [[C3]] serta parameter [[C4]], lalu isi kata sandi dengan string panjang sekitar 100 karakter.</li>
        <li>Di panel <strong>Payloads</strong>, pilih posisi [[C5]] dengan tipe <strong>Numbers</strong> (rentang 1-100, step 1, max fraction digits 0) untuk memalsukan IP.</li>
        <li>Pilih posisi [[C6]], masukkan daftar username, lalu mulai serangan.</li>
        <li>Setelah serangan selesai, klik <strong>Columns</strong> di bagian atas dialog dan tampilkan kolom <strong>Response received</strong> dan <strong>Response completed</strong>.</li>
        <li>Temukan satu permintaan dengan waktu respons jauh lebih lama secara konsisten lalu catat username tersebut.</li>
        <li>Buat serangan Intruder baru pada permintaan yang sama dengan header [[C7]], username temuan Anda, serta posisi payload pada parameter [[C8]].</li>
        <li>Masukkan daftar angka di posisi 1 dan daftar kata sandi di posisi 2, lalu mulai serangan.</li>
        <li>Temukan respons berstatus [[C9]] lalu catat kata sandinya.</li>
        <li>
            <p>Login memakai username dan kata sandi tersebut lalu buka halaman akun untuk menyelesaikan lab.</p>
            <div class="highlightedarea">
                <h4>Catatan</h4>
                <p>Brute force juga bisa dilakukan dengan satu serangan cluster bomb, tetapi mengenumerasi username valid lebih dahulu jauh lebih efisien.</p>
            </div>
        </li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '6d4cc1c44751ee06710496ea067aa78c8b2cb01e7686737e13a7e88261d1471a' => [
        'title' => 'Proteksi brute-force rusak, pemblokiran IP',
        'description_html' => '<p>Lab ini rentan karena cacat logika pada proteksi brute-force kata sandinya. Untuk menyelesaikan lab, lakukan brute-force kata sandi korban, lalu masuk dan akses halaman akunnya.</p><ul><li>Kredensial Anda: [[C0]]</li><li>Username korban: [[C1]]</li><li><a chunk-keep-link="" href="/web-security/authentication/auth-lab-passwords">Kandidat kata sandi</a></li></ul><div class="component-solution expandable-container"><details><summary><h4><span class="icon-erlenmeyer"></span> Petunjuk</h4></summary><div class="content"><div><p>Anda bisa memakai macro atau ekstensi Turbo Intruder, namun lab ini juga tetap dapat diselesaikan tanpa fitur lanjutan tersebut.</p></div></div></details></div>',
        'sections' => [
            0 => '<div class="content"><div><p>Anda bisa memakai macro atau ekstensi Turbo Intruder, namun lab ini juga tetap dapat diselesaikan tanpa fitur lanjutan tersebut.</p></div></div>',
            1 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Dengan Burp berjalan, uji halaman login: IP diblokir sementara setelah 3 login salah berturut-turut, namun login berhasil ke akun sendiri me-reset penghitung kegagalan.</li>
        <li>Kirim login salah lalu teruskan permintaan [[C0]] ke Burp Intruder, pilih pitchfork attack, dan tandai parameter [[C1]] serta [[C2]].</li>
        <li>Klik <strong><span class="icon-pie-chart"></span> Resource pool</strong> dan masukkan serangan ke resource pool dengan <strong>Maximum concurrent requests</strong> disetel ke [[C3]] agar urutan permintaan tetap terjaga.</li>
        <li>Klik <strong><span class="icon-payloads"></span> Payloads</strong>; pada posisi [[C4]] masukkan daftar bergantian antara username Anda dan [[C5]], dimulai dengan username Anda dan mengulang [[C6]] minimal 100 kali.</li>
        <li>Sesuaikan daftar kandidat kata sandi dengan menyisipkan kata sandi Anda sebelum tiap kandidat agar sejajar dengan daftar username.</li>
        <li>Pilih posisi [[C7]], masukkan daftar kata sandi gabungan tadi, lalu mulai serangan.</li>
        <li>Setelah serangan selesai, sembunyikan respons [[C8]] dan urutkan hasilnya; temukan satu respons [[C9]] untuk username [[C10]] dan catat nilai kata sandinya dari kolom <strong>Payload 2</strong>.</li>
        <li>Masuk ke akun Carlos memakai kata sandi tersebut lalu akses halaman akunnya untuk menyelesaikan lab.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '4b100811651a2caccd08e1ee3d2a1c92a26c52cfc3d73f7ee773282373d39d3c' => [
        'title' => 'Enumerasi username melalui penguncian akun',
        'description_html' => '<p>Lab ini rentan terhadap enumerasi username melalui cacat logika mekanisme penguncian akun. Untuk menyelesaikan lab, enumerasi username valid, brute-force kata sandinya, lalu akses halaman akunnya.</p><ul><li><a chunk-keep-link="" href="/web-security/authentication/auth-lab-usernames">Kandidat username</a></li><li><a chunk-keep-link="" href="/web-security/authentication/auth-lab-passwords">Kandidat kata sandi</a></li></ul>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Dengan Burp berjalan, kirim login salah lalu teruskan permintaan [[C0]] ke Burp Intruder.</li>
        <li>
            <p>Pilih <strong>Cluster bomb attack</strong>, tandai posisi payload di parameter [[C1]], dan tambahkan posisi kosong di akhir isi permintaan lewat <strong>Add §</strong>:</p>
            [[C2]]
        </li>
        <li>Di panel <strong>Payloads</strong>, isi posisi pertama dengan daftar username, lalu posisi kedua dengan tipe <strong>Null payloads</strong> sebanyak 5 kali agar tiap username dicoba berulang 5 kali, lalu mulai serangan.</li>
        <li>Pada hasil serangan, satu username menghasilkan respons lebih panjang berisi pesan galat [[C3]]. Catat username tersebut.</li>
        <li>Buat serangan Intruder baru pada [[C4]] dengan mode <strong>Sniper attack</strong>, isi parameter [[C5]] dengan username temuan Anda, dan tandai parameter [[C6]].</li>
        <li>Masukkan daftar kata sandi serta buat aturan grep extract untuk pesan galat, lalu mulai serangan.</li>
        <li>Di kolom grep extract hasil serangan, temukan satu respons yang tidak memuat pesan galat dan catat kata sandinya.</li>
        <li>Tunggu sekitar satu menit hingga penguncian akun pulih, lalu login memakai kredensial temuan dan buka halaman akun untuk menyelesaikan lab.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    'ce4838d79961e13680ebec4ec6b7f31fb30b57ff632815e0712c399f5d054b82' => [
        'title' => 'Logika rusak pada 2FA',
        'description_html' => '<p>Autentikasi dua faktor lab ini rentan karena cacat logika. Untuk menyelesaikan lab, akses halaman akun Carlos.</p><ul><li>Kredensial Anda: [[C0]]</li><li>Username korban: [[C1]]</li></ul><p>Anda juga memiliki akses ke server email untuk menerima kode verifikasi 2FA Anda.</p><div class="component-solution expandable-container"><details><summary><h4><span class="icon-erlenmeyer"></span> Petunjuk</h4></summary><div class="content"><div><p>Carlos tidak akan mencoba login ke situs web sendiri.</p></div></div></details></div>',
        'sections' => [
            0 => '<div class="content"><div><p>Carlos tidak akan mencoba login ke situs web sendiri.</p></div></div>',
            1 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Dengan Burp berjalan, login ke akun Anda dan pelajari alur 2FA: pada permintaan [[C0]], parameter [[C1]] menentukan akun pengguna mana yang diakses.</li>
        <li>Logout dari akun Anda.</li>
        <li>Kirim permintaan [[C2]] ke Burp Repeater, ubah parameter [[C3]] menjadi [[C4]], lalu kirim agar kode 2FA sementara dibuat untuk Carlos.</li>
        <li>Buka halaman login, masukkan kredensial Anda, lalu kirim kode 2FA acak.</li>
        <li>Kirim permintaan [[C5]] ke Burp Intruder.</li>
        <li>Di Intruder, ubah parameter [[C6]] menjadi [[C7]] dan pasang posisi payload di parameter [[C8]], lalu brute-force kode verifikasinya.</li>
        <li>Muat respons 302 hasil brute force di browser.</li>
        <li>Klik <strong>My account</strong> untuk menyelesaikan lab.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '2f93ccbfee70335f0c3f0cc709c7f5b943c3facc47e44078dc736744c336d304' => [
        'title' => 'Brute-force cookie stay-logged-in',
        'description_html' => '<p>Lab ini mengizinkan pengguna tetap login setelah menutup sesi browser memakai cookie yang rentan di-brute-force.</p><p>Untuk menyelesaikan lab, lakukan brute-force cookie Carlos agar bisa mengakses halaman <strong>My account</strong> miliknya.</p><ul><li>Kredensial Anda: [[C0]]</li><li>Username korban: [[C1]]</li><li><a chunk-keep-link="" href="/web-security/authentication/auth-lab-passwords">Kandidat kata sandi</a></li></ul>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Dengan Burp berjalan, login memakai akun Anda sambil mencentang <strong>Stay logged in</strong> hingga cookie [[C0]] disetel.</li>
        <li>
            <p>Periksa cookie ini di panel <a href="/burp/documentation/desktop/tools/inspector">Inspector</a>: formatnya Base64 dan hasil dekodenya [[C1]], yakni username Anda plus hash MD5 kata sandi Anda:</p>
            [[C2]]
        </li>
        <li>Logout dari akun Anda.</li>
        <li>Pada permintaan [[C3]] terbaru, sorot cookie [[C4]] dan kirim permintaan ke Burp Intruder.</li>
        <li>Di Intruder, masukkan kata sandi Anda sendiri sebagai satu payload uji pada [[C5]].</li>
        <li>
            Di bawah <strong>Payload processing</strong>, tambahkan aturan berurutan berikut:
            <ul>
                <li>Hash: [[C6]]</li>
                <li>Add prefix: [[C7]]</li>
                <li>Encode: [[C8]]</li>
            </ul>
        </li>
        <li>Karena tombol <strong>Update email</strong> hanya muncul saat terautentikasi, buka panel <strong><span class="icon-settings"></span> Settings</strong> dan tambahkan aturan grep match untuk string [[C9]], lalu mulai serangan.</li>
        <li>Pastikan payload uji berhasil memuat halaman akun Anda guna memverifikasi aturan pemrosesan payload bekerja benar.</li>
        <li>
            Lakukan penyesuaian berikut lalu ulangi serangan:
            <ul>
                <li>Ganti payload tunggal dengan daftar <a href="/web-security/authentication/auth-lab-passwords">kandidat kata sandi</a>.</li>
                <li>Ubah parameter [[C10]] di URL permintaan menjadi [[C11]] alih-alih [[C12]].</li>
                <li>Ubah aturan <strong>Add prefix</strong> dari [[C14]] menjadi [[C13]].</li>
            </ul>
        </li>
        <li>Saat serangan selesai, hanya satu permintaan memunculkan [[C15]] dengan payload cookie [[C16]] valid milik Carlos, dan lab terselesaikan.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '151f941feb521716a2b1005d474bcf3f4ad34dee8790c892af3e36c88c22a128' => [
        'title' => 'Memecahkan kata sandi secara luring (offline password cracking)',
        'description_html' => '<p>Lab ini menyimpan hash kata sandi pengguna di cookie sekaligus memiliki kerentanan XSS pada fitur komentar. Untuk menyelesaikan lab, curi cookie [[C0]] Carlos untuk memecahkan kata sandinya, lalu masuk sebagai [[C1]] dan hapus akunnya.</p><ul><li>Kredensial Anda: [[C2]]</li><li>Username korban: [[C3]]</li></ul>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Dengan Burp berjalan, uji fitur "Stay logged in" pada akun Anda; cookie [[C0]] berenkode Base64.</li>
        <li>
            <p>Di <strong>Proxy &gt; HTTP history</strong> tab <strong>Response</strong>, sorot cookie [[C1]] untuk melihat format penyusunannya:</p>
            [[C2]]
        </li>
        <li>Karena fitur komentar rentan XSS, Anda bisa memakainya untuk mencuri cookie korban.</li>
        <li>Buka server eksploitasi dan catat URL-nya.</li>
        <li>
            <p>Kirim komentar pada salah satu blog berisi payload stored XSS berikut dengan ID server eksploitasi Anda:</p>
            [[C3]]
        </li>
        <li>Buka access log di server eksploitasi; ada permintaan [[C4]] korban yang membawa cookie [[C5]] miliknya.</li>
        <li>
            <p>Dekode cookie di Burp Decoder hingga diperoleh:</p>
            [[C6]]
        </li>
        <li>Salin hash MD5 tersebut dan cari padanannya untuk mengetahui bahwa kata sandinya adalah [[C7]].</li>
        <li>Masuk ke akun korban, buka halaman "My account", dan hapus akunnya untuk menyelesaikan lab.</li>
    </ol>
    <div class="highlightedarea">
        <h4>Catatan</h4>
        <p>Lab ini mendemonstrasikan bahaya cracking kata sandi offline yang pada praktik nyata lazim dilakukan memakai alat seperti hashcat, bukan mesin pencari daring.</p>
    </div>
</div></div>
LABHTML,
        ],
    ],
    'eb59e3d1483ff8122d7fde75e8e54fc95160ec5c56abdf09f3ef419b02939a4c' => [
        'title' => 'Password reset poisoning melalui middleware',
        'description_html' => '<p>Lab ini rentan terhadap password reset poisoning. Pengguna [[C0]] selalu mengklik tautan di email yang diterimanya. Untuk menyelesaikan lab, masuklah ke akun Carlos. Anda dapat login ke akun Anda memakai [[C1]] dan membaca email melalui klien email di server eksploitasi.</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Dengan Burp berjalan, uji fitur reset kata sandi dan amati tautan bertoken unik yang dikirim lewat email.</li>
        <li>Kirim permintaan [[C0]] ke Burp Repeater. Header [[C1]] didukung dan memengaruhi domain tautan reset yang dibuat secara dinamis.</li>
        <li>Buka server eksploitasi dan catat URL-nya.</li>
        <li>
            <p>Di Burp Repeater, tambahkan header [[C2]] berisi URL server eksploitasi Anda:</p>
            [[C3]]
        </li>
        <li>Ubah parameter [[C4]] menjadi [[C5]] dan kirim permintaan.</li>
        <li>Buka access log di server eksploitasi; catat token korban dari parameter query permintaan [[C6]].</li>
        <li>Salin tautan reset kata sandi valid dari klien email Anda, tempelkan ke browser, lalu ganti nilai parameter [[C7]] dengan token korban.</li>
        <li>Buka URL tersebut dan atur kata sandi baru untuk akun Carlos.</li>
        <li>Masuk ke akun Carlos memakai kata sandi baru untuk menyelesaikan lab.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '11cd0613af5142781dc61c2957b8a8e46743d73f803b52c4eb6af5a5a5eb6b0a' => [
        'title' => 'Brute-force kata sandi melalui fitur ubah kata sandi',
        'description_html' => '<p>Fitur ubah kata sandi pada lab ini rentan terhadap serangan brute-force. Gunakan daftar kandidat kata sandi untuk melakukan brute-force akun Carlos dan akses halaman "My account" miliknya.</p><ul><li>Kredensial Anda: [[C0]]</li><li>Username korban: [[C1]]</li><li><a chunk-keep-link="" href="/web-security/authentication/auth-lab-passwords">Kandidat kata sandi</a></li></ul>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Dengan Burp berjalan, login dan uji fitur ubah kata sandi; username dikirim sebagai input tersembunyi.</li>
        <li>Amati perilakunya: jika kata sandi saat ini salah dan kedua kata sandi baru sama, akun terkunci. Namun jika kedua kata sandi baru berbeda, kata sandi lama salah memunculkan [[C0]], sedangkan kata sandi lama benar memunculkan [[C1]].</li>
        <li>Masukkan kata sandi Anda yang benar bersama dua kata sandi baru yang berbeda, lalu kirim permintaan [[C2]] ke Burp Intruder.</li>
        <li>
            <p>Di Intruder, ubah parameter [[C3]] menjadi [[C4]], pasang posisi payload di [[C5]], dan pastikan kedua parameter kata sandi baru bernilai berbeda:</p>
            [[C6]]
        </li>
        <li>Di panel <strong>Payloads</strong>, masukkan daftar kandidat kata sandi.</li>
        <li>Klik <strong><span class="icon-settings"></span> Settings</strong> dan buat aturan grep match untuk string [[C7]], lalu mulai serangan.</li>
        <li>Setelah serangan selesai, temukan satu respons yang memuat pesan [[C8]] lalu catat kata sandi tersebut.</li>
        <li>Logout dari akun Anda dan login memakai username [[C9]] beserta kata sandi temuan Anda.</li>
        <li>Klik <strong>My account</strong> untuk menyelesaikan lab.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    'dd916d2af3738d723a751992ee4fe00db3c6300559f2e7a5a7efb312d264caa0' => [
        'title' => 'Proteksi brute-force rusak, beberapa kredensial per permintaan',
        'description_html' => '<p>Lab ini rentan karena cacat logika pada proteksi brute-force-nya. Untuk menyelesaikan lab, lakukan brute-force kata sandi Carlos lalu akses halaman akunnya.</p><ul><li>Username korban: [[C0]]</li><li><a href="/web-security/authentication/auth-lab-passwords">Kandidat kata sandi</a></li></ul>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Dengan Burp berjalan, uji halaman login dan kirim permintaan [[C0]] berformat [[C1]] ke Burp Repeater.</li>
        <li>
            <p>Di Repeater, ganti string tunggal nilai kata sandi menjadi array string berisi seluruh kandidat kata sandi:</p>
            [[C2]]
        </li>
        <li>Kirim permintaan hingga mendapat respons 302.</li>
        <li>Klik kanan permintaan lalu pilih <strong>Show response in browser</strong>, salin URL-nya dan buka di browser; Anda langsung masuk sebagai [[C3]].</li>
        <li>Klik <strong>My account</strong> untuk membuka halaman akun Carlos dan menyelesaikan lab.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '28468f8ce00fc3bd7c323d598659c718d294c4aa39e6a5e2b244b48b1116493e' => [
        'title' => 'Bypass 2FA dengan serangan brute-force',
        'description_html' => '<p>Autentikasi dua faktor lab ini rentan di-brute-force. Anda sudah memiliki username dan kata sandi valid tetapi belum memiliki kode verifikasi 2FA. Brute-force kode 2FA untuk mengakses halaman akun Carlos.</p><p>Kredensial korban: [[C0]]</p><div class="highlightedarea"><h4>Catatan</h4><p>Karena kode verifikasi di-reset saat serangan berjalan, Anda mungkin perlu mengulang serangan beberapa kali jika kode baru jatuh ke angka yang sudah dicoba sebelumnya.</p></div><div class="component-solution expandable-container"><details><summary><h4><span class="icon-erlenmeyer"></span> Petunjuk</h4></summary><div class="content"><div><p>Anda perlu menggabungkan macro Burp dan Burp Intruder (lihat <a href="/burp/documentation/desktop/settings/sessions">dokumentasi Burp Suite</a>), atau memakai ekstensi <a href="https://portswigger.net/bappstore/9abaa233088242e8be252cd4ff534988">Turbo Intruder</a> bagi pengguna Python.</p></div></div></details></div>',
        'sections' => [
            0 => '<div class="content"><div><p>Anda perlu menggabungkan macro Burp dan Burp Intruder (lihat <a href="/burp/documentation/desktop/settings/sessions">dokumentasi Burp Suite</a>), atau memakai ekstensi <a href="https://portswigger.net/bappstore/9abaa233088242e8be252cd4ff534988">Turbo Intruder</a> bagi pengguna Python.</p></div></div>',
            1 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Dengan Burp berjalan, login sebagai [[C0]] dan amati proses verifikasi 2FA; dua kali salah memasukkan kode akan membuat Anda logout otomatis, sehingga dibutuhkan session handling macro untuk login ulang otomatis sebelum setiap permintaan.</li>
        <li>Di Burp, buka <strong><span class="icon-settings"></span> Settings &gt; Sessions</strong>, lalu klik <strong>Add</strong> di panel <strong>Session Handling Rules</strong>.</li>
        <li>Di tab <strong>Scope</strong>, di bawah <strong>URL Scope</strong> pilih <strong>Include all URLs</strong>.</li>
        <li>Kembali ke tab <strong>Details</strong> dan di bawah <strong>Rule Actions</strong> klik <strong>Add &gt; Run a macro</strong>.</li>
        <li>
            <p>Klik <strong>Add</strong> di <strong>Select macro</strong> untuk membuka <strong>Macro Recorder</strong> lalu pilih 3 permintaan berikut:</p>
            [[C1]]
            <p>Klik <strong>OK</strong> untuk membuka <strong>Macro Editor</strong>.</p>
        </li>
        <li>Klik <strong>Test macro</strong> dan pastikan respons akhir meminta kode keamanan 4 digit agar yakin macro berjalan benar.</li>
        <li>Klik <strong>OK</strong> pada semua dialog untuk kembali ke jendela utama Burp; macro kini otomatis me-login-kan ulang sebelum tiap permintaan Intruder.</li>
        <li>Kirim permintaan [[C2]] ke Burp Intruder.</li>
        <li>Di Intruder, pasang posisi payload pada parameter [[C3]].</li>
        <li>Di panel <strong>Payloads</strong>, pilih tipe <strong>Numbers</strong> dengan rentang 0 hingga 9999, step 1, min/max integer digits 4, dan max fraction digits 0 untuk mencakup seluruh kombinasi 4 digit.</li>
        <li>Buka panel samping <strong><span class="icon-pie-chart"></span> Resource pool</strong> lalu masukkan serangan ke pool dengan <strong>Maximum concurrent requests</strong> disetel ke [[C4]].</li>
        <li>Jalankan serangan; saat satu permintaan membalas status [[C5]], klik kanan lalu pilih <strong>Show response in browser</strong>, salin URL, dan muat di browser.</li>
        <li>Klik <strong>My account</strong> untuk menyelesaikan lab.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
];
