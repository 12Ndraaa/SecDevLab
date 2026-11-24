<?php

return [
    '1c5ba013f13bf76fde8d175cfc49bae5eb18e6139eb78e186686cbff1e6c7d02' => [
        'title' => 'Bypass autentikasi JWT melalui tanda tangan tidak diverifikasi',
        'description_html' => '<p>Lab ini menggunakan mekanisme berbasis JWT untuk menangani sesi. Akibat cacat implementasi, server tidak memverifikasi tanda tangan JWT yang diterimanya.</p><p>Untuk menyelesaikan lab, ubah token sesi Anda untuk mengakses panel admin di [[C0]], lalu hapus pengguna [[C1]].</p><p>Anda dapat masuk ke akun Anda menggunakan kredensial berikut: [[C2]]</p><div class="highlightedarea"><h4>Tip</h4><p>Pelajari <a href="/burp/documentation/desktop/testing-workflow/vulnerabilities/session-management/jwts">cara bekerja dengan JWT di Burp Suite</a> sebelum mencoba lab ini.</p></div>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li><p>Di lab, masuklah ke akun Anda sendiri.</p></li>
        <li><p>Di Burp, buka tab <strong>Proxy &gt; HTTP history</strong> dan periksa permintaan [[C0]] pasca-login. Cookie sesi Anda berbentuk JWT.</p></li>
        <li><p>Klik dua kali bagian payload token untuk membaca JSON terdekode di panel Inspector. Klaim [[C1]] berisi username Anda. Kirim permintaan ini ke Burp Repeater.</p></li>
        <li><p>Di Burp Repeater, ubah path menjadi [[C2]] dan kirim. Panel admin hanya dapat diakses saat login sebagai [[C3]].</p></li>
        <li><p>Pilih payload JWT lagi, ubah nilai klaim [[C4]] dari [[C5]] menjadi [[C6]] di panel Inspector, lalu klik <strong>Apply changes</strong>.</p></li>
        <li><p>Kirim permintaan lagi. Anda berhasil mengakses panel admin.</p></li>
        <li><p>Pada respons, temukan URL untuk menghapus [[C7]] ([[C8]]) dan kirimkan permintaan ke endpoint itu untuk menyelesaikan lab.</p></li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '3390f79a2611b22e4fa8d437bd36fb902ea986c0fff45577c1543e0c634f3543' => [
        'title' => 'Bypass autentikasi JWT melalui verifikasi tanda tangan yang cacat',
        'description_html' => '<p>Lab ini menggunakan mekanisme berbasis JWT untuk menangani sesi. Server dikonfigurasi secara tidak aman sehingga menerima JWT tanpa tanda tangan.</p><p>Untuk menyelesaikan lab, ubah token sesi Anda agar dapat mengakses panel admin di [[C0]], lalu hapus pengguna [[C1]].</p><p>Anda dapat masuk ke akun Anda menggunakan kredensial berikut: [[C2]]</p><div class="highlightedarea"><h4>Tip</h4><p>Pelajari <a href="/burp/documentation/desktop/testing-workflow/vulnerabilities/session-management/jwts">cara bekerja dengan JWT di Burp Suite</a> sebelum mencoba lab ini.</p></div>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li><p>Di lab, masuklah ke akun Anda sendiri.</p></li>
        <li><p>Di Burp, buka tab <strong>Proxy &gt; HTTP history</strong> dan periksa permintaan [[C0]] pasca-login. Cookie sesi Anda berbentuk JWT.</p></li>
        <li><p>Klik dua kali payload token untuk melihat bentuk JSON-nya di panel <strong>Inspector</strong>. Klaim [[C1]] berisi username Anda. Kirim permintaan ke Burp Repeater.</p></li>
        <li><p>Di Burp Repeater, ubah path ke [[C2]] dan kirim. Panel admin hanya terbuka jika login sebagai [[C3]].</p></li>
        <li><p>Pilih payload JWT, ubah nilai klaim [[C4]] menjadi [[C5]] di panel <strong>Inspector</strong>, lalu klik <strong>Apply changes</strong>.</p></li>
        <li><p>Pilih header JWT, ubah parameter [[C6]] menjadi [[C7]] lewat Inspector, lalu klik <strong>Apply changes</strong>.</p></li>
        <li><p>Di editor pesan, hapus bagian tanda tangan JWT, tetapi pertahankan tanda titik di akhir payload.</p></li>
        <li><p>Kirim permintaan dan amati Anda berhasil mengakses panel admin.</p></li>
        <li><p>Pada respons, temukan URL penghapusan [[C8]] ([[C9]]) lalu kirim permintaan ke endpoint tersebut untuk menyelesaikan lab.</p></li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    'e9c7b6167992b3c62991a0f0b30c4b0f6e050a62099eea7092823b12da8356b0' => [
        'title' => 'Bypass autentikasi JWT melalui kunci penandatanganan yang lemah',
        'description_html' => '<p>Lab ini memakai mekanisme sesi JWT dengan secret key sangat lemah untuk menandatangani dan memverifikasi token, sehingga mudah di-brute-force dengan <a href="https://github.com/wallarm/jwt-secrets/blob/master/jwt.secrets.list">daftar kata kunci rahasia umum</a>.</p><p>Untuk menyelesaikan lab, lakukan brute force secret key situs terlebih dahulu, lalu gunakan untuk menandatangani token sesi modifikasi guna mengakses panel admin di [[C0]] dan menghapus pengguna [[C1]].</p><p>Anda dapat masuk ke akun Anda menggunakan kredensial berikut: [[C2]]</p><div class="highlightedarea"><h4>Tip</h4><p>Pelajari <a href="/burp/documentation/desktop/testing-workflow/vulnerabilities/session-management/jwts">cara bekerja dengan JWT di Burp Suite</a> sebelum mencoba lab ini.</p><p>Anda juga dapat menggunakan hashcat; lihat <a href="/web-security/jwt#brute-forcing-secret-keys-using-hashcat">Brute forcing secret keys using hashcat</a>.</p></div>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <h5>Bagian 1: Brute-force secret key</h5>
    <ol>
        <li><p>Di Burp, muat ekstensi JWT Editor dari BApp Store.</p></li>
        <li><p>Login ke akun Anda dan kirim permintaan [[C0]] pasca-login ke Burp Repeater.</p></li>
        <li><p>Di Repeater, ubah path menjadi [[C1]] dan kirim. Panel admin hanya dapat diakses saat login sebagai [[C2]].</p></li>
        <li>
            <p>Salin JWT lalu lakukan brute force memakai hashcat seperti berikut:</p>
            [[C3]]
            <p>Jika berhasil, hashcat akan menampilkan JWT diikuti secret key lemah yaitu [[C4]].</p>
        </li>
    </ol>
    <div class="highlightedarea">
        <h4>Catatan</h4>
        <p>Jika menjalankan ulang perintah, sertakan flag [[C5]] untuk menampilkan hasil di konsol.</p>
    </div>
    <h5>Bagian 2: Buat signing key palsu</h5>
    <ol>
        <li><p>Gunakan Burp Decoder untuk mengenkode Base64 secret yang baru ditemukan.</p></li>
        <li><p>Di Burp, buka tab <strong>JWT Editor Keys</strong>, klik <strong>New Symmetric Key</strong>, lalu klik <strong>Generate</strong> untuk membuat kunci JWK baru.</p></li>
        <li><p>Ganti nilai properti [[C6]] dengan string Base64 dari secret tersebut.</p></li>
        <li><p>Klik <strong>OK</strong> untuk menyimpan kunci.</p></li>
    </ol>
    <h5>Bagian 3: Modifikasi dan tandatangani JWT</h5>
    <ol>
        <li><p>Kembali ke permintaan [[C7]] di Repeater lalu buka tab editor <strong>JSON Web Token</strong>.</p></li>
        <li><p>Di payload, ubah nilai klaim [[C8]] menjadi [[C9]].</p></li>
        <li><p>Di bagian bawah tab, klik [[C10]], lalu pilih kunci simetris yang baru dibuat.</p></li>
        <li><p>Pastikan opsi [[C11]] dipilih, lalu klik [[C12]]. Token kini ditandatangani dengan benar.</p></li>
        <li><p>Kirim permintaan dan pastikan Anda masuk ke panel admin.</p></li>
        <li><p>Di respons, temukan URL penghapusan [[C13]] ([[C14]]) dan kirim permintaan ke sana untuk menyelesaikan lab.</p></li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    'a0101cde2e9ba5d478cf9734acc8c05e0dd944dd7ecbdec01a99e17a008f7b42' => [
        'title' => 'Bypass autentikasi JWT lewat injeksi header jwk',
        'description_html' => '<p>Lab ini memakai mekanisme sesi JWT. Server mendukung parameter [[C0]] di header JWT untuk menyematkan kunci verifikasi langsung di token, namun gagal memeriksa apakah kunci itu berasal dari sumber tepercaya.</p><p>Untuk menyelesaikan lab, ubah dan tandatangani JWT agar memperoleh akses ke panel admin di [[C1]], lalu hapus pengguna [[C2]].</p><p>Anda dapat masuk ke akun Anda menggunakan kredensial berikut: [[C3]]</p><div class="highlightedarea"><h4>Tip</h4><p>Pelajari <a href="/burp/documentation/desktop/testing-workflow/vulnerabilities/session-management/jwts">cara bekerja dengan JWT di Burp Suite</a> sebelum mencoba lab ini.</p></div>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li><p>Di Burp, muat ekstensi JWT Editor dari BApp Store.</p></li>
        <li><p>Login ke akun Anda dan kirim permintaan [[C0]] pasca-login ke Burp Repeater.</p></li>
        <li><p>Di Repeater, ubah path ke [[C1]] dan kirim. Panel admin hanya bisa dibuka saat login sebagai [[C2]].</p></li>
        <li><p>Buka tab <strong>JWT Editor Keys</strong> di bilah tab utama Burp.</p></li>
        <li><p>Klik <strong>New RSA Key</strong>.</p></li>
        <li><p>Klik <strong>Generate</strong> untuk membuat pasangan kunci baru, lalu klik <strong>OK</strong> untuk menyimpannya.</p></li>
        <li><p>Kembali ke permintaan [[C3]] di Repeater dan buka tab [[C4]].</p></li>
        <li><p>Di payload, ubah nilai klaim [[C5]] menjadi [[C6]].</p></li>
        <li><p>Di bagian bawah tab <strong>JSON Web Token</strong>, klik <strong>Attack</strong> lalu pilih <strong>Embedded JWK</strong>, pilih kunci RSA yang dibuat tadi, lalu klik <strong>OK</strong>.</p></li>
        <li><p>Amati bahwa parameter [[C7]] berisi public key Anda telah disisipkan ke header JWT.</p></li>
        <li><p>Kirim permintaan dan amati Anda masuk ke panel admin.</p></li>
        <li><p>Pada respons, temukan URL penghapusan [[C8]] ([[C9]]) lalu kirim permintaan ke sana untuk menyelesaikan lab.</p></li>
    </ol>
    <div class="highlightedarea">
        <h4>Catatan</h4>
        <p>Sebagai alternatif serangan otomatis ekstensi, Anda dapat menyematkan JWK secara manual di parameter [[C10]] pada header JWT dan menyamakan nilai header [[C11]] dengan [[C12]] kunci yang disematkan.</p>
    </div>
</div></div>
LABHTML,
        ],
    ],
    '01b6dad83328cfccc93032501b8d61bfc6683c5f5708bb2461495627003d1381' => [
        'title' => 'Bypass autentikasi JWT lewat injeksi header jku',
        'description_html' => '<p>Lab ini memakai mekanisme sesi JWT. Server mendukung parameter [[C0]] di header JWT, tetapi gagal memverifikasi apakah URL yang diberikan berasal dari domain tepercaya sebelum mengambil kunci.</p><p>Untuk menyelesaikan lab, palsukan JWT yang memberi akses ke panel admin di [[C1]], lalu hapus pengguna [[C2]].</p><p>Anda dapat masuk ke akun Anda menggunakan kredensial berikut: [[C3]]</p><div class="highlightedarea"><h4>Tip</h4><p>Pelajari <a href="/burp/documentation/desktop/testing-workflow/vulnerabilities/session-management/jwts">cara bekerja dengan JWT di Burp Suite</a> sebelum mencoba lab ini.</p></div>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <h5>Bagian 1: Unggah JWK Set berbahaya</h5>
    <ol>
        <li><p>Di Burp, muat ekstensi JWT Editor dari BApp Store.</p></li>
        <li><p>Login ke akun Anda dan kirim permintaan [[C0]] pasca-login ke Burp Repeater.</p></li>
        <li><p>Di Repeater, ubah path ke [[C1]] dan kirim. Panel admin hanya dapat diakses saat login sebagai [[C2]].</p></li>
        <li><p>Buka tab <strong>JWT Editor Keys</strong> di bilah tab utama Burp.</p></li>
        <li><p>Klik <strong>New RSA Key</strong>.</p></li>
        <li><p>Klik <strong>Generate</strong> untuk membuat pasangan kunci baru lalu klik <strong>OK</strong>.</p></li>
        <li><p>Di browser, buka server eksploitasi.</p></li>
        <li>
            <p>Ganti isi bagian <strong>Body</strong> dengan JWK Set kosong berikut:</p>
            [[C3]]
        </li>
        <li><p>Di tab <strong>JWT Editor Keys</strong>, klik kanan kunci yang baru dibuat lalu pilih <strong>Copy Public Key as JWK</strong>.</p></li>
        <li>
            <p>Tempelkan JWK tersebut ke array [[C4]] di server eksploitasi lalu simpan:</p>
            [[C5]]
        </li>
    </ol>
    <h5>Bagian 2: Modifikasi dan tandatangani JWT</h5>
    <ol>
        <li><p>Kembali ke permintaan [[C6]] di Repeater dan buka tab <strong>JSON Web Token</strong>.</p></li>
        <li><p>Di header JWT, ganti nilai [[C7]] saat ini dengan [[C8]] dari JWK yang diunggah ke server eksploitasi.</p></li>
        <li><p>Tambahkan parameter [[C9]] ke header JWT dengan nilai URL JWK Set di server eksploitasi Anda.</p></li>
        <li><p>Di payload, ubah nilai klaim [[C10]] menjadi [[C11]].</p></li>
        <li><p>Klik <strong>Sign</strong> di bawah tab lalu pilih kunci RSA yang dibuat sebelumnya.</p></li>
        <li><p>Pastikan <strong>Don't modify header</strong> terpilih, lalu klik <strong>OK</strong>.</p></li>
        <li><p>Kirim permintaan dan amati Anda berhasil masuk ke panel admin.</p></li>
        <li><p>Pada respons, temukan URL penghapusan [[C12]] ([[C13]]) lalu kirim permintaan ke sana untuk menyelesaikan lab.</p></li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    'b798d10d5ebbe86319083eaa1218f27ff9fe579f9e6e02a894077bb0cfe771e0' => [
        'title' => 'Bypass autentikasi JWT melalui path traversal pada header kid',
        'description_html' => '<p>Lab ini memakai mekanisme sesi JWT. Untuk memverifikasi tanda tangan, server menggunakan parameter [[C0]] di header JWT guna mengambil kunci yang relevan dari sistem file.</p><p>Untuk menyelesaikan lab, palsukan JWT agar mendapat akses ke panel admin di [[C1]], lalu hapus pengguna [[C2]].</p><p>Anda dapat masuk ke akun Anda menggunakan kredensial berikut: [[C3]]</p><div class="highlightedarea"><h4>Tip</h4><p>Pelajari <a href="/burp/documentation/desktop/testing-workflow/vulnerabilities/session-management/jwts">cara bekerja dengan JWT di Burp Suite</a> sebelum mencoba lab ini.</p></div>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <div class="highlightedarea">
        <h4>Catatan</h4>
        <p>Pada solusi ini, parameter [[C0]] diarahkan ke file standar [[C1]]. Di praktik nyata, Anda bisa mengarahkan parameter [[C2]] ke file apa saja yang isinya dapat diprediksi.</p>
    </div>
    <h5>Membuat signing key yang sesuai</h5>
    <ol>
        <li><p>Di Burp, muat ekstensi JWT Editor dari BApp Store.</p></li>
        <li><p>Login ke akun Anda dan kirim permintaan [[C3]] pasca-login ke Burp Repeater.</p></li>
        <li><p>Di Repeater, ubah path ke [[C4]] dan kirim. Panel admin hanya dapat diakses saat login sebagai [[C5]].</p></li>
        <li><p>Buka tab <strong>JWT Editor Keys</strong> di bilah tab utama Burp.</p></li>
        <li><p>Klik <strong>New Symmetric Key</strong>.</p></li>
        <li><p>Klik <strong>Generate</strong> untuk membuat kunci JWK baru.</p></li>
        <li><p>Ganti nilai properti [[C6]] dengan string kosong.</p></li>
        <li><p>Klik <strong>OK</strong> untuk menyimpan kunci.</p></li>
    </ol>
    <h5>Modifikasi dan tandatangani JWT</h5>
    <ol>
        <li><p>Kembali ke permintaan [[C7]] di Repeater dan buka tab <strong>JSON Web Token</strong>.</p></li>
        <li>
            <p>Di header JWT, ubah parameter [[C8]] menjadi urutan path traversal ke file [[C9]]:</p>
            [[C10]]
        </li>
        <li><p>Di payload JWT, ubah nilai klaim [[C11]] menjadi [[C12]].</p></li>
        <li><p>Klik <strong>Sign</strong> lalu pilih kunci simetris yang dibuat sebelumnya.</p></li>
        <li><p>Pastikan <strong>Don't modify header</strong> terpilih, lalu klik <strong>OK</strong>. Token kini ditandatangani dengan null byte sebagai secret key.</p></li>
        <li><p>Kirim permintaan dan amati Anda berhasil masuk ke panel admin.</p></li>
        <li><p>Pada respons, temukan URL penghapusan [[C13]] ([[C14]]) lalu kirim permintaan ke sana untuk menyelesaikan lab.</p></li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '9d708e568bf709fea5f6ee5ec1adee4a431698058d548d2aaac268a4ddb4e87a' => [
        'title' => 'Bypass autentikasi JWT melalui algorithm confusion',
        'description_html' => '<p>Lab ini memakai mekanisme sesi JWT dengan pasangan kunci RSA yang kuat untuk menandatangani dan memverifikasi token. Namun cacat implementasi membuatnya rentan terhadap serangan algorithm confusion.</p><p>Untuk menyelesaikan lab, dapatkan kunci publik server dari endpoint standar, lalu pakai untuk menandatangani token modifikasi agar mengakses panel admin di [[C0]] dan menghapus pengguna [[C1]].</p><p>Anda dapat masuk ke akun Anda menggunakan kredensial berikut: [[C2]]</p><div class="highlightedarea"><h4>Tip</h4><p>Pelajari <a href="/burp/documentation/desktop/testing-workflow/vulnerabilities/session-management/jwts">cara bekerja dengan JWT di Burp Suite</a> sebelum mencoba lab ini.</p></div><div class="component-solution expandable-container"><details><summary><h4><span class="icon-erlenmeyer"></span> Petunjuk</h4></summary><div class="content"><div><p>Anggap server menyimpan kunci publiknya sebagai file PEM X.509.</p></div></div></details></div>',
        'sections' => [
            0 => '<div class="content"><div><p>Anggap server menyimpan kunci publiknya sebagai file PEM X.509.</p></div></div>',
            1 => <<<'LABHTML'
<div class="content"><div>
    <h5>Bagian 1: Dapatkan kunci publik server</h5>
    <ol>
        <li><p>Di Burp, muat ekstensi JWT Editor dari BApp Store.</p></li>
        <li><p>Login ke akun Anda dan kirim permintaan [[C0]] pasca-login ke Burp Repeater.</p></li>
        <li><p>Di Repeater, ubah path ke [[C1]] dan kirim. Panel admin hanya dapat diakses saat login sebagai [[C2]].</p></li>
        <li><p>Di browser, buka endpoint standar [[C3]] yang memaparkan JWK Set berisi satu kunci publik.</p></li>
        <li><p>Salin objek JWK dari dalam array [[C4]] tanpa menyertakan kurung siku array.</p></li>
    </ol>
    <h5>Bagian 2: Buat signing key berbahaya</h5>
    <ol>
        <li><p>Buka tab <strong>JWT Editor Keys</strong> di bilah tab utama Burp.</p></li>
        <li><p>Klik <strong>New RSA Key</strong>.</p></li>
        <li><p>Pilih opsi <strong>JWK</strong>, tempelkan JWK yang disalin, lalu klik <strong>OK</strong>.</p></li>
        <li><p>Klik kanan kunci yang baru dibuat dan pilih <strong>Copy Public Key as PEM</strong>.</p></li>
        <li><p>Gunakan tab <strong>Decoder</strong> untuk mengenkode Base64 kunci PEM ini lalu salin hasilnya.</p></li>
        <li><p>Kembali ke tab <strong>JWT Editor Keys</strong>.</p></li>
        <li><p>Klik <strong>New Symmetric Key</strong> lalu klik <strong>Generate</strong> untuk membuat kunci JWK baru.</p></li>
        <li><p>Ganti nilai properti k dengan string PEM berenkode Base64 tadi.</p></li>
        <li><p>Simpan kunci tersebut.</p></li>
    </ol>
    <h5>Bagian 3: Modifikasi dan tandatangani token</h5>
    <ol>
        <li><p>Kembali ke permintaan [[C5]] di Repeater dan buka tab <strong>JSON Web Token</strong>.</p></li>
        <li><p>Di header JWT, ubah parameter [[C6]] menjadi [[C7]].</p></li>
        <li><p>Di payload, ubah klaim [[C8]] menjadi [[C9]].</p></li>
        <li><p>Klik <strong>Sign</strong> lalu pilih kunci simetris yang baru dibuat.</p></li>
        <li><p>Pastikan <strong>Don't modify header</strong> terpilih lalu klik <strong>OK</strong>. Token kini ditandatangani memakai kunci publik server sebagai secret HMAC.</p></li>
        <li><p>Kirim permintaan dan pastikan Anda berhasil mengakses panel admin.</p></li>
        <li><p>Pada respons, temukan URL penghapusan [[C10]] ([[C11]]) lalu kirim permintaan ke sana untuk menyelesaikan lab.</p></li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    'e63829c5fb147e8e34a3e9a001773db6312f2a223a1062fd226f44290457da78' => [
        'title' => 'Bypass autentikasi JWT melalui algorithm confusion tanpa kunci terekspos',
        'description_html' => '<p>Lab ini memakai mekanisme sesi JWT dengan pasangan kunci RSA yang kuat. Akibat cacat implementasi, mekanisme ini rentan terhadap serangan algorithm confusion.</p><p>Untuk menyelesaikan lab, turunkan kunci publik server lalu gunakan untuk menandatangani token modifikasi agar dapat mengakses panel admin di [[C0]] dan menghapus pengguna [[C1]].</p><p>Anda dapat masuk ke akun Anda menggunakan kredensial berikut: [[C2]]</p><div class="highlightedarea"><h4>Tip</h4><p>Pelajari <a href="/burp/documentation/desktop/testing-workflow/vulnerabilities/session-management/jwts">cara bekerja dengan JWT di Burp Suite</a> sebelum mencoba lab ini.</p><p>Kami juga menyediakan versi ringkas alat [[C3]] untuk membantu Anda; lihat <a href="/web-security/jwt/algorithm-confusion#deriving-public-keys-from-existing-tokens">Menurunkan kunci publik dari token yang ada</a>.</p></div><div class="component-solution expandable-container"><details><summary><h4><span class="icon-erlenmeyer"></span> Petunjuk</h4></summary><div class="content"><div><p>Anggap server menyimpan kunci publiknya sebagai file PEM X.509.</p></div></div></details></div>',
        'sections' => [
            0 => '<div class="content"><div><p>Anggap server menyimpan kunci publiknya sebagai file PEM X.509.</p></div></div>',
            1 => <<<'LABHTML'
<div class="content"><div>
    <h5>Bagian 1: Dapatkan dua JWT dari server</h5>
    <ol>
        <li><p>Di Burp, muat ekstensi JWT Editor dari BApp Store.</p></li>
        <li><p>Login ke akun Anda dan kirim permintaan [[C0]] pasca-login ke Burp Repeater.</p></li>
        <li><p>Di Repeater, ubah path ke [[C1]] dan kirim. Panel admin hanya dapat diakses saat login sebagai [[C2]].</p></li>
        <li><p>Salin cookie sesi JWT pertama dan simpan.</p></li>
        <li><p>Logout lalu login kembali.</p></li>
        <li><p>Salin cookie sesi JWT kedua sehingga Anda memiliki dua JWT valid yang dibuat server.</p></li>
    </ol>
    <h5>Bagian 2: Turunkan kunci publik server</h5>
    <ol>
        <li>
            <p>Di terminal, jalankan perintah berikut sambil meneruskan kedua JWT tersebut:</p>
            [[C3]]
            <p>Saat dijalankan pertama kali, pengunduhan image dari Docker Hub dapat memakan waktu beberapa menit.</p>
        </li>
        <li>
            <p>Keluaran menampilkan satu atau beberapa kandidat nilai [[C4]], lengkap dengan:</p>
            <ul>
                <li><p>Kunci publik berenkode Base64 dalam format X.509 dan PKCS1.</p></li>
                <li><p>JWT modifikasi yang sudah ditandatangani dengan tiap kandidat kunci tersebut.</p></li>
            </ul>
        </li>
        <li><p>Salin JWT modifikasi dari entri X.509 pertama.</p></li>
        <li><p>Kembali ke permintaan di Burp Repeater dan ubah path menjadi [[C5]].</p></li>
        <li>
            <p>Ganti cookie sesi dengan JWT kandidat tersebut lalu kirim:</p>
            <ul>
                <li><p>Respons 200 yang menampilkan halaman akun menandakan kunci X.509 itu benar.</p></li>
                <li><p>Respons 302 yang mengalihkan ke [[C6]] dan menghapus cookie menandakan kunci salah; ulangi langkah ini memakai JWT kandidat X.509 berikutnya.</p></li>
            </ul>
        </li>
    </ol>
    <h5>Bagian 3: Buat signing key berbahaya</h5>
    <ol>
        <li><p>Dari terminal, salin kunci X.509 berenkode Base64 yang terbukti benar (bukan token JWT-nya).</p></li>
        <li><p>Di Burp, buka tab <strong>JWT Editor Keys</strong> dan klik <strong>New Symmetric Key</strong>.</p></li>
        <li><p>Klik <strong>Generate</strong> untuk membuat kunci JWK baru.</p></li>
        <li><p>Ganti nilai properti [[C7]] dengan kunci berenkode Base64 yang disalin tadi.</p></li>
        <li><p>Simpan kunci tersebut.</p></li>
    </ol>
    <h5>Bagian 4: Modifikasi dan tandatangani token</h5>
    <ol>
        <li><p>Kembali ke permintaan di Repeater dan ubah path ke [[C8]].</p></li>
        <li><p>Buka tab <strong>JSON Web Token</strong>.</p></li>
        <li><p>Di header JWT, pastikan parameter [[C9]] disetel ke [[C10]].</p></li>
        <li><p>Di payload JWT, ubah klaim [[C11]] menjadi [[C12]].</p></li>
        <li><p>Klik <strong>Sign</strong> lalu pilih kunci simetris yang baru dibuat.</p></li>
        <li><p>Pastikan <strong>Don't modify header</strong> terpilih lalu klik <strong>OK</strong>. Token kini ditandatangani memakai kunci publik server.</p></li>
        <li><p>Kirim permintaan dan amati Anda berhasil masuk ke panel admin.</p></li>
        <li><p>Pada respons, temukan URL penghapusan [[C13]] ([[C14]]) lalu kirim permintaan ke sana untuk menyelesaikan lab.</p></li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
];
