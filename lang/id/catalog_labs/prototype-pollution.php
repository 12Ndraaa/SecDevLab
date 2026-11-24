<?php

return [
    '9f29effeafaa743b0f87d5682f68184437df0b23db7ce32b2377869a95045976' => [
        'title' => 'Prototype pollution sisi klien melalui API browser',
        'description_html' => '<p>Lab ini rentan terhadap DOM XSS melalui prototype pollution sisi klien. Pengembang situs telah mencoba menambal sebuah gadget potensial, tetapi langkah tersebut masih bisa dilewati.</p><p>Untuk menyelesaikan lab:</p><ol><li><p>Temukan sumber untuk menambahkan properti sembarang ke [[C0]] global.</p></li><li><p>Identifikasi properti gadget yang memungkinkan eksekusi JavaScript sembarang.</p></li><li><p>Gabungkan keduanya untuk memanggil [[C1]].</p></li></ol><p>Anda dapat menyelesaikan lab ini secara manual di browser atau memakai <a href="/burp/documentation/desktop/tools/dom-invader">DOM Invader</a>.</p><p>Lab ini didasarkan pada kerentanan nyata temuan PortSwigger Research; lihat <a href="https://portswigger.net/research/widespread-prototype-pollution-gadgets">Widespread prototype pollution gadgets</a> oleh <a href="https://portswigger.net/research/gareth-heyes">Gareth Heyes</a>.</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <p><strong>Menemukan sumber prototype pollution</strong></p>
    <ol>
        <li>
            <p>Di browser, coba cemari [[C0]] dengan menyuntikkan properti acak lewat query string:</p>
            [[C1]]
        </li>
        <li><p>Buka panel DevTools browser lalu pilih tab <strong>Console</strong>.</p></li>
        <li><p>Masukkan [[C2]].</p></li>
        <li><p>Periksa properti objek yang dikembalikan dan amati properti suntikan [[C3]] telah ditambahkan, membuktikan adanya sumber prototype pollution.</p></li>
    </ol>
    <p><strong>Mengidentifikasi gadget</strong></p>
    <ol>
        <li><p>Di panel DevTools, buka tab <strong>Sources</strong>.</p></li>
        <li><p>Pelajari file JavaScript yang dimuat situs target dan cari sink DOM XSS.</p></li>
        <li><p>Di [[C4]], amati bahwa jika objek [[C5]] memiliki properti [[C6]], nilainya dipakai menyisipkan elemen skrip secara dinamis ke DOM.</p></li>
        <li><p>Properti [[C7]] tampak sudah didefinisikan pada objek [[C8]] sehingga sekilas tidak rentan.</p></li>
        <li><p>Namun baris berikutnya memanggil [[C9]] untuk mengunci properti [[C10]] tanpa mendefinisikan properti [[C11]].</p></li>
    </ol>
    <p><strong>Menyusun eksploitasi</strong></p>
    <ol>
        <li>
            <p>Memanfaatkan sumber tadi, coba suntikkan properti value sembarang:</p>
            [[C12]]
        </li>
        <li><p>Di panel DevTools tab <strong>Elements</strong>, amati elemen [[C13]] dirender dengan atribut [[C14]] bernilai [[C15]].</p></li>
        <li>
            <p>Ubah payload di URL untuk menyuntikkan PoC XSS menggunakan URL [[C16]] seperti berikut:</p>
            [[C17]]
        </li>
        <li><p>Amati [[C18]] terpanggil dan lab terselesaikan.</p></li>
    </ol>
</div></div>
LABHTML,
            1 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li><p>Muat lab di browser bawaan Burp.</p></li>
        <li><p><a href="/burp/documentation/desktop/tools/dom-invader/enabling">Aktifkan DOM Invader</a> serta <a href="/burp/documentation/desktop/tools/dom-invader/prototype-pollution#enabling-prototype-pollution">aktifkan opsi prototype pollution</a>.</p></li>
        <li><p>Buka panel DevTools browser, masuk ke tab <strong>DOM Invader</strong>, lalu muat ulang halaman.</p></li>
        <li><p>DOM Invader mengidentifikasi dua vektor prototype pollution pada properti [[C0]] (query string).</p></li>
        <li><p>Klik <strong>Scan for gadgets</strong> untuk memindai gadget di tab baru.</p></li>
        <li><p>Setelah pemindaian selesai, buka DevTools pada tab pemindaian tersebut dan buka tab <strong>DOM Invader</strong>.</p></li>
        <li><p>DOM Invader berhasil mencapai sink [[C1]] lewat gadget [[C2]].</p></li>
        <li><p>Klik <strong>Exploit</strong> untuk menghasilkan PoC otomatis dan memanggil [[C3]].</p></li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '779d6590142ec062340c7103fc3f043c4a7fcf81748ef0740fc02b5dec467114' => [
        'title' => 'DOM XSS melalui prototype pollution sisi klien',
        'description_html' => '<p>Lab ini rentan terhadap DOM XSS melalui prototype pollution sisi klien. Untuk menyelesaikan lab:</p><ol><li><p>Temukan sumber untuk menambahkan properti sembarang ke [[C0]] global.</p></li><li><p>Identifikasi properti gadget yang memungkinkan eksekusi JavaScript sembarang.</p></li><li><p>Gabungkan keduanya untuk memanggil [[C1]].</p></li></ol><p>Anda dapat menyelesaikan lab ini secara manual di browser atau memakai <a href="/burp/documentation/desktop/tools/dom-invader">DOM Invader</a>.</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <p><strong>Menemukan sumber prototype pollution</strong></p>
    <ol>
        <li>
            <p>Di browser, coba cemari [[C0]] dengan menyuntikkan properti acak lewat query string:</p>
            [[C1]]
        </li>
        <li><p>Buka panel DevTools browser lalu pilih tab <strong>Console</strong>.</p></li>
        <li><p>Masukkan [[C2]].</p></li>
        <li><p>Periksa properti objek yang dikembalikan dan amati properti [[C3]] bernilai [[C4]] kini ada, membuktikan adanya sumber prototype pollution.</p></li>
    </ol>
    <p><strong>Mengidentifikasi gadget</strong></p>
    <ol>
        <li><p>Di panel DevTools, buka tab <strong>Sources</strong>.</p></li>
        <li><p>Pelajari file JavaScript yang dimuat situs target untuk mencari sink DOM XSS.</p></li>
        <li><p>Di [[C5]], amati bahwa jika objek [[C6]] memiliki properti [[C7]], nilainya dipakai menyisipkan skrip secara dinamis ke DOM.</p></li>
        <li><p>Properti [[C8]] belum didefinisikan pada objek [[C9]], sehingga berpotensi menjadi gadget pengendali atribut [[C10]] elemen [[C11]].</p></li>
    </ol>
    <p><strong>Menyusun eksploitasi</strong></p>
    <ol>
        <li>
            <p>Coba suntikkan properti [[C12]] acak lewat query string:</p>
            [[C13]]
        </li>
        <li><p>Di DevTools tab <strong>Elements</strong>, amati elemen [[C14]] dirender dengan atribut [[C15]] bernilai [[C16]].</p></li>
        <li>
            <p>Ubah payload di URL menjadi PoC XSS memakai URL [[C17]]:</p>
            [[C18]]
        </li>
        <li><p>Amati [[C19]] terpanggil dan lab terselesaikan.</p></li>
    </ol>
</div></div>
LABHTML,
            1 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li><p>Buka lab di browser bawaan Burp.</p></li>
        <li><p><a href="/burp/documentation/desktop/tools/dom-invader/enabling">Aktifkan DOM Invader</a> serta <a href="/burp/documentation/desktop/tools/dom-invader/prototype-pollution#enabling-prototype-pollution">aktifkan opsi prototype pollution</a>.</p></li>
        <li><p>Buka panel DevTools, masuk ke tab <strong>DOM Invader</strong>, lalu muat ulang halaman.</p></li>
        <li><p>DOM Invader mengidentifikasi dua vektor prototype pollution pada properti [[C0]].</p></li>
        <li><p>Klik <strong>Scan for gadgets</strong> untuk memindai gadget di tab baru.</p></li>
        <li><p>Setelah selesai, buka DevTools pada tab tersebut dan pilih tab <strong>DOM Invader</strong>.</p></li>
        <li><p>DOM Invader berhasil mengakses sink [[C1]] lewat gadget [[C2]].</p></li>
        <li><p>Klik <strong>Exploit</strong> untuk menghasilkan PoC otomatis dan memanggil [[C3]].</p></li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '3c3d65889eb00f3949889451470ca5fffc13f3a2bf9cc1d93d539073460c15a1' => [
        'title' => 'DOM XSS melalui vektor prototype pollution alternatif',
        'description_html' => '<p>Lab ini rentan terhadap DOM XSS melalui prototype pollution sisi klien. Untuk menyelesaikan lab:</p><ol><li><p>Temukan sumber untuk menambahkan properti sembarang ke [[C0]] global.</p></li><li><p>Identifikasi properti gadget yang memungkinkan eksekusi JavaScript sembarang.</p></li><li><p>Gabungkan keduanya untuk memanggil [[C1]].</p></li></ol><p>Anda dapat menyelesaikan lab ini secara manual di browser atau memakai <a href="/burp/documentation/desktop/tools/dom-invader">DOM Invader</a>.</p><div class="component-solution expandable-container"><details><summary><h4><span class="icon-erlenmeyer"></span> Petunjuk</h4></summary><div class="content"><div><p>Perhatikan <a href="/web-security/cross-site-scripting/contexts">konteks XSS</a>-nya; Anda perlu sedikit menyesuaikan payload agar sintaks JavaScript tetap valid setelah injeksi.</p></div></div></details></div>',
        'sections' => [
            0 => '<div class="content"><div><p>Perhatikan <a href="/web-security/cross-site-scripting/contexts">konteks XSS</a>-nya; Anda perlu sedikit menyesuaikan payload agar sintaks JavaScript tetap valid setelah injeksi.</p></div></div>',
            1 => <<<'LABHTML'
<div class="content"><div>
    <p><strong>Menemukan sumber prototype pollution</strong></p>
    <ol>
        <li>
            <p>Coba cemari [[C0]] lewat query string notasi kurung siku:</p>
            [[C1]]
        </li>
        <li><p>Buka panel DevTools browser tab <strong>Console</strong>.</p></li>
        <li><p>Masukkan [[C2]].</p></li>
        <li><p>Amati properti [[C3]] tidak ikut ditambahkan.</p></li>
        <li>
            <p>Coba vektor notasi titik di query string:</p>
            [[C4]]
        </li>
        <li><p>Periksa kembali [[C5]] di Console; properti [[C6]] bernilai [[C7]] kini ada pada prototipe.</p></li>
    </ol>
    <p><strong>Mengidentifikasi gadget</strong></p>
    <ol>
        <li><p>Di panel DevTools, buka tab <strong>Sources</strong>.</p></li>
        <li><p>Pelajari file JavaScript yang dimuat situs target.</p></li>
        <li><p>Temukan sink [[C8]] di file [[C9]].</p></li>
        <li><p>Amati properti [[C10]] diteruskan langsung ke [[C11]] padahal tidak didefinisikan secara default.</p></li>
    </ol>
    <p><strong>Menyusun eksploitasi</strong></p>
    <ol>
        <li>
            <p>Suntikkan properti [[C12]] berisi PoC XSS:</p>
            [[C13]]
        </li>
        <li><p>Amati payload tidak berjalan.</p></li>
        <li><p>Buka tab <strong>Console</strong> DevTools dan perhatikan pesan galat.</p></li>
        <li><p>Klik tautan di stack trace untuk melompat ke baris pemanggilan [[C14]].</p></li>
        <li><p>Pasang breakpoint di baris tersebut lalu muat ulang halaman.</p></li>
        <li><p>Arahkan kursor ke [[C15]] dan amati nilainya [[C16]]; angka [[C17]] menempel di belakang payload sehingga sintaks JavaScript menjadi cacat.</p></li>
        <li><p>Lepas breakpoint lalu lanjutkan eksekusi.</p></li>
        <li>
            <p>Tambahkan tanda minus di akhir payload agar menjadi ekspresi aritmetika yang valid:</p>
            [[C18]]
        </li>
        <li><p>Amati [[C19]] terpanggil dan lab terselesaikan.</p></li>
    </ol>
</div></div>
LABHTML,
            2 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li><p>Muat lab di browser bawaan Burp.</p></li>
        <li><p><a href="/burp/documentation/desktop/tools/dom-invader/enabling">Aktifkan DOM Invader</a> serta <a href="/burp/documentation/desktop/tools/dom-invader/prototype-pollution#enabling-prototype-pollution">aktifkan opsi prototype pollution</a>.</p></li>
        <li><p>Buka tab <strong>DOM Invader</strong> di DevTools lalu muat ulang halaman.</p></li>
        <li><p>DOM Invader mengidentifikasi vektor prototype pollution pada properti [[C0]].</p></li>
        <li><p>Klik <strong>Scan for gadgets</strong> untuk memindai gadget di tab baru.</p></li>
        <li><p>Setelah selesai, buka DevTools pada tab tersebut dan pilih tab <strong>DOM Invader</strong>.</p></li>
        <li><p>DOM Invader berhasil mengakses sink [[C1]] lewat gadget [[C2]].</p></li>
        <li><p>Klik <strong>Exploit</strong> dan amati PoC otomatis belum memicu [[C3]].</p></li>
        <li><p>Kembali ke tab browser sebelumnya dan periksa sink [[C4]] di DOM Invader: terdapat angka [[C5]] setelah canary penutup.</p></li>
        <li><p>Klik <strong>Exploit</strong> lagi lalu tambahkan karakter minus ([[C6]]) di akhir URL tab baru dan muat ulang.</p></li>
        <li><p>Amati [[C7]] terpanggil dan lab terselesaikan.</p></li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    'e62603f6c9b96d8f356c0843377815ce5de0b885389f3cad18552a666cd8246c' => [
        'title' => 'Prototype pollution sisi klien melalui sanitasi yang cacat',
        'description_html' => '<p>Lab ini rentan terhadap DOM XSS melalui prototype pollution sisi klien. Meski pengembang sudah menerapkan pencegahan prototype pollution, filter tersebut masih mudah dilewati.</p><p>Untuk menyelesaikan lab:</p><ol><li><p>Temukan sumber untuk menambahkan properti sembarang ke [[C0]] global.</p></li><li><p>Identifikasi properti gadget yang memungkinkan eksekusi JavaScript sembarang.</p></li><li><p>Gabungkan keduanya untuk memanggil [[C1]].</p></li></ol>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <p><strong>Menemukan sumber prototype pollution</strong></p>
    <ol>
        <li>
            <p>Coba cemari [[C0]] lewat query string:</p>
            [[C1]]
        </li>
        <li><p>Buka panel DevTools tab <strong>Console</strong>.</p></li>
        <li><p>Masukkan [[C2]].</p></li>
        <li><p>Properti [[C3]] belum ditambahkan.</p></li>
        <li>
            <p>Coba vektor prototype pollution alternatif:</p>
            [[C4]]
        </li>
        <li><p>Di setiap percobaan, [[C5]] tetap tidak berubah.</p></li>
        <li><p>Di tab <strong>Sources</strong>, pelajari kode JavaScript. File [[C6]] memanggil fungsi [[C7]] dari [[C8]] untuk menghapus kunci berbahaya berbasis blocklist, tetapi tidak diterapkan secara rekursif.</p></li>
        <li>
            <p>Susun kunci terlarang secara tersarang sehingga kunci berbahaya tetap terbentuk setelah satu kali penghapusan:</p>
            [[C9]]
        </li>
        <li><p>Periksa kembali [[C10]] di Console; properti [[C11]] bernilai [[C12]] kini terpasang karena validasi kunci berhasil dilewati.</p></li>
    </ol>
    <p><strong>Mengidentifikasi gadget</strong></p>
    <ol>
        <li><p>Pelajari kembali kode JS dan amati [[C13]] memakai properti [[C15]] pada [[C14]] untuk menyisipkan skrip ke DOM.</p></li>
        <li><p>Tidak ada properti [[C16]] pada objek [[C17]], menjadikannya kandidat gadget.</p></li>
    </ol>
    <p><strong>Menyusun eksploitasi</strong></p>
    <ol>
        <li>
            <p>Coba suntikkan properti [[C18]] melalui bypass sanitasi tadi:</p>
            [[C19]]
        </li>
        <li><p>Di DevTools tab <strong>Elements</strong>, amati elemen &lt;script&gt; dirender dengan atribut [[C20]] bernilai [[C21]].</p></li>
        <li>
            <p>Ubah payload menjadi PoC XSS memakai URL [[C22]]:</p>
            [[C23]]
        </li>
        <li><p>Amati [[C24]] terpanggil dan lab terselesaikan.</p></li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    'ede1150ea7af1f2a14c2724937aa94df976dcc0eec9169271e4dd546403491a1' => [
        'title' => 'Prototype pollution sisi klien pada pustaka pihak ketiga',
        'description_html' => '<p>Lab ini rentan terhadap DOM XSS lewat prototype pollution sisi klien karena gadget di pustaka pihak ketiga yang kodenya ter-minifikasi. Disarankan memakai <a href="/burp/documentation/desktop/tools/dom-invader/prototype-pollution">DOM Invader</a> untuk menghemat waktu.</p><p>Untuk menyelesaikan lab:</p><ol><li><p>Gunakan DOM Invader untuk menemukan prototype pollution beserta gadget DOM XSS.</p></li><li><p>Gunakan server eksploitasi yang disediakan untuk mengirim payload ke korban yang memanggil [[C0]] di browsernya.</p></li></ol><p>Lab ini didasarkan pada kerentanan nyata temuan PortSwigger Research; lihat <a href="https://portswigger.net/research/widespread-prototype-pollution-gadgets">Widespread prototype pollution gadgets</a> oleh <a href="https://portswigger.net/research/gareth-heyes">Gareth Heyes</a>.</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li><p>Muat lab di browser bawaan Burp.</p></li>
        <li><p><a href="/burp/documentation/desktop/tools/dom-invader/enabling">Aktifkan DOM Invader</a> serta <a href="/burp/documentation/desktop/tools/dom-invader/prototype-pollution#enabling-prototype-pollution">aktifkan opsi prototype pollution</a>.</p></li>
        <li><p>Buka tab <strong>DOM Invader</strong> di DevTools lalu muat ulang halaman.</p></li>
        <li><p>DOM Invader mengidentifikasi dua vektor prototype pollution pada properti [[C0]] (fragment URL).</p></li>
        <li><p>Klik <strong>Scan for gadgets</strong> untuk memindai gadget di tab baru.</p></li>
        <li><p>Setelah pemindaian selesai, buka DevTools pada tab tersebut dan pilih tab <strong>DOM Invader</strong>.</p></li>
        <li><p>DOM Invader berhasil mencapai sink [[C1]] melalui gadget [[C2]].</p></li>
        <li><p>Klik <strong>Exploit</strong> untuk menguji PoC otomatis memanggil [[C3]].</p></li>
        <li><p>Matikan DOM Invader.</p></li>
        <li><p>Buka server eksploitasi lab di browser.</p></li>
        <li>
            <p>Di bagian <strong>Body</strong>, buat eksploitasi yang mengarahkan korban ke URL berbahaya berikut:</p>
            [[C4]]
        </li>
        <li><p>Uji eksploitasi pada diri Anda dan pastikan [[C5]] terpicu di beranda lab.</p></li>
        <li><p>Kembali ke server eksploitasi dan kirimkan eksploitasi ke korban untuk menyelesaikan lab.</p></li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '59d3f1af71bd2e19b66ac67efd8caf8448b7b6a7a9c00cdd2881aea324d1fe37' => [
        'title' => 'Eskalasi hak akses melalui server-side prototype pollution',
        'description_html' => '<p>Lab ini dibangun di atas Node.js dan Express, rentan terhadap server-side prototype pollution karena menggabungkan input pengguna secara tidak aman ke objek JavaScript server. Celah ini mudah dideteksi karena properti tercemar terlihat langsung di respons HTTP.</p><p>Untuk menyelesaikan lab:</p><ol><li>Temukan sumber prototype pollution untuk menambah properti sembarang ke [[C0]] global.</li><li>Identifikasi properti gadget untuk meningkatkan hak akses Anda.</li><li>Akses panel admin lalu hapus pengguna [[C1]].</li></ol><p>Anda dapat masuk ke akun Anda dengan kredensial berikut: [[C2]]</p><div class="highlightedarea"><h4>Catatan</h4><p>Menguji server-side prototype pollution dapat merusak atau menjatuhkan server. Jika terjadi, mulai ulang server secara manual melalui tombol di banner lab.</p></div>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <h5>Mempelajari fitur ubah alamat</h5>
    <ol>
        <li><p>Login, buka halaman akun Anda, dan kirimkan formulir pembaruan alamat tagihan dan pengiriman.</p></li>
        <li><p>Di Burp, buka tab <strong>Proxy &gt; HTTP history</strong> dan temukan permintaan [[C0]].</p></li>
        <li><p>Data formulir dikirim ke server dalam format JSON.</p></li>
        <li><p>Server membalas dengan objek JSON yang merepresentasikan data pengguna Anda.</p></li>
        <li><p>Kirim permintaan tersebut ke Burp Repeater.</p></li>
    </ol>
    <h5>Mengidentifikasi sumber prototype pollution</h5>
    <ol>
        <li>
            <p>Di Repeater, tambahkan properti [[C1]] pada JSON dengan isi objek acak:</p>
            [[C2]]
        </li>
        <li><p>Kirim permintaan.</p></li>
        <li><p>Objek di respons kini ikut memantulkan properti suntikan Anda tanpa menampilkan [[C3]], menandakan pencemaran prototipe dan pewarisan lewat prototype chain berhasil.</p></li>
    </ol>
    <h5>Mengidentifikasi gadget</h5>
    <ol>
        <li><p>Periksa properti lain di isi respons.</p></li>
        <li><p>Perhatikan properti [[C4]] yang bernilai [[C5]].</p></li>
    </ol>
    <h5>Menyusun eksploitasi</h5>
    <ol>
        <li>
            <p>Ubah permintaan untuk mencemari prototipe dengan properti [[C6]] milik Anda:</p>
            [[C7]]
        </li>
        <li><p>Kirim permintaan. Nilai [[C8]] pada respons diperbarui karena objek tidak memiliki properti [[C9]] sendiri melainkan mewarisinya dari prototipe tercemar.</p></li>
        <li><p>Segarkan halaman di browser dan pastikan tautan ke panel admin kini tersedia.</p></li>
        <li><p>Buka panel admin dan hapus [[C10]] untuk menyelesaikan lab.</p></li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '22dd244c42dc00fb8b49e2c69f0ebc2f6537d2e956386720e6a9e40bca64c3b4' => [
        'title' => 'Mendeteksi server-side prototype pollution tanpa refleksi properti tercemar',
        'description_html' => '<p>Lab ini dibangun di atas Node.js dan Express, rentan terhadap server-side prototype pollution karena menggabungkan input pengguna secara tidak aman ke objek JavaScript server.</p><p>Untuk menyelesaikan lab, buktikan kerentanan dengan mencemari [[C0]] sehingga memicu perubahan perilaku server yang jelas namun tidak merusak.</p><p>Anda dapat masuk ke akun Anda dengan kredensial berikut: [[C1]]</p><div class="highlightedarea"><h4>Catatan</h4><p>Menguji server-side prototype pollution dapat merusak atau menjatuhkan server. Jika terjadi, mulai ulang server secara manual melalui tombol di banner lab.</p></div>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <div class="highlightedarea">
        <h4>Catatan</h4>
        <p>Terdapat beberapa teknik non-destruktif untuk menguji prototype pollution. Di contoh ini kita memakai <a href="/web-security/prototype-pollution/server-side#status-code-override">status code override</a>, namun Anda juga bisa memakai <a href="/web-security/prototype-pollution/server-side#charset-override">charset override</a> atau <a href="/web-security/prototype-pollution/server-side#json-spaces-override">json spaces override</a>.</p>
    </div>
    <h5>Mempelajari fitur ubah alamat</h5>
    <ol>
        <li><p>Login, buka halaman akun Anda, lalu kirim formulir pembaruan alamat tagihan dan pengiriman.</p></li>
        <li><p>Di Burp, buka <strong>Proxy &gt; HTTP history</strong> dan temukan permintaan [[C0]].</p></li>
        <li><p>Data formulir dikirim ke server sebagai JSON dan dibalas objek JSON profil pengguna yang diperbarui.</p></li>
        <li><p>Kirim permintaan ke Burp Repeater.</p></li>
        <li>
            <p>Di Repeater, tambahkan properti [[C1]] berisi objek dengan properti acak:</p>
            [[C2]]
        </li>
        <li><p>Kirim permintaan. Objek respons tidak memantulkan properti suntikan, namun bukan berarti aplikasi aman.</p></li>
    </ol>
    <h5>Mengidentifikasi sumber prototype pollution</h5>
    <ol>
        <li><p>Sengaja rusak sintaks JSON pada permintaan, misalnya dengan menghapus satu koma di akhir baris.</p></li>
        <li><p>Kirim permintaan dan amati respons galat berformat JSON.</p></li>
        <li><p>Meski respons berstatus [[C3]], objek galat memuat properti [[C4]] bernilai [[C5]].</p></li>
        <li>
            <p>Ubah permintaan sebagai berikut:</p>
            <ul>
                <li><p>Perbaiki sintaks JSON agar kembali valid.</p></li>
                <li>
                    <p>Ubah properti suntikan menjadi properti [[C6]] antara 400 dan 599:</p>
                    [[C7]]
                </li>
            </ul>
        </li>
        <li><p>Kirim permintaan dan pastikan respons normal objek pengguna diterima.</p></li>
        <li><p>Sengaja rusak sintaks JSON sekali lagi dan kirim ulang.</p></li>
        <li><p>Kali ini properti [[C8]] dan [[C9]] pada respons galat JSON cocok dengan kode galat suntikan Anda di [[C10]], membuktikan prototype pollution dan menyelesaikan lab.</p></li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '5748a03c200eec26fb8dd053f332832b59a5509cad225088b2a093d71159ff85' => [
        'title' => 'Melewati filter input cacat untuk server-side prototype pollution',
        'description_html' => '<p>Lab ini dibangun di atas Node.js dan Express, rentan terhadap server-side prototype pollution karena menggabungkan input pengguna secara tidak aman ke objek JavaScript server.</p><p>Untuk menyelesaikan lab:</p><ol><li>Temukan sumber prototype pollution untuk menambah properti sembarang ke [[C0]] global.</li><li>Identifikasi properti gadget untuk meningkatkan hak akses Anda.</li><li>Akses panel admin lalu hapus pengguna [[C1]].</li></ol><p>Anda dapat masuk ke akun Anda dengan kredensial berikut: [[C2]]</p><div class="highlightedarea"><h4>Catatan</h4><p>Menguji server-side prototype pollution dapat merusak atau menjatuhkan server. Jika terjadi, mulai ulang server secara manual melalui tombol di banner lab.</p></div>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <h5>Mempelajari fitur ubah alamat</h5>
    <ol>
        <li><p>Login, buka halaman akun, dan kirim formulir pembaruan alamat tagihan dan pengiriman.</p></li>
        <li><p>Di Burp, buka <strong>Proxy &gt; HTTP history</strong> dan temukan permintaan [[C0]].</p></li>
        <li><p>Data formulir dikirim sebagai JSON dan dibalas objek JSON profil pengguna.</p></li>
        <li><p>Kirim permintaan ke Burp Repeater.</p></li>
    </ol>
    <h5>Mengidentifikasi sumber prototype pollution</h5>
    <ol>
        <li>
            <p>Di Repeater, tambahkan properti [[C1]] pada JSON berisi properti [[C2]]:</p>
            [[C3]]
        </li>
        <li><p>Kirim permintaan.</p></li>
        <li><p>Di panel <strong>Response</strong> tab <strong>Raw</strong>, indentasi JSON tampak tidak berubah.</p></li>
        <li>
            <p>Ubah permintaan untuk mencemari prototipe melalui properti [[C4]]:</p>
            [[C5]]
        </li>
        <li><p>Kirim ulang permintaan.</p></li>
        <li><p>Di tab <strong>Raw</strong>, indentasi JSON kini bertambah sesuai nilai suntikan Anda, membuktikan prototype pollution berhasil.</p></li>
    </ol>
    <h5>Mengidentifikasi gadget</h5>
    <ol>
        <li><p>Periksa properti tambahan di isi respons.</p></li>
        <li><p>Perhatikan properti [[C6]] yang bernilai [[C7]].</p></li>
    </ol>
    <h5>Menyusun eksploitasi</h5>
    <ol>
        <li>
            <p>Ubah permintaan untuk mencemari prototipe dengan properti [[C8]] milik Anda:</p>
            [[C9]]
        </li>
        <li><p>Kirim permintaan; nilai [[C10]] pada respons diperbarui karena diwarisi dari prototipe tanpa properti [[C11]] milik sendiri.</p></li>
        <li><p>Segarkan halaman di browser dan pastikan tautan panel admin muncul.</p></li>
        <li><p>Buka panel admin dan hapus [[C12]] untuk menyelesaikan lab.</p></li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    'e3c8172d1c47e73a3a5471a162814889082f50012a8764f72852dbd07fa36474' => [
        'title' => 'Remote code execution melalui server-side prototype pollution',
        'description_html' => '<p>Lab ini dibangun di atas Node.js dan Express, rentan terhadap server-side prototype pollution karena menggabungkan input pengguna secara tidak aman ke objek JavaScript server.</p><p>Konfigurasi server memungkinkan pencemaran [[C0]] untuk menyuntikkan perintah sistem sembarang agar dijalankan di server.</p><p>Untuk menyelesaikan lab:</p><ol><li>Temukan sumber prototype pollution untuk menambah properti sembarang ke [[C1]] global.</li><li>Identifikasi gadget yang memungkinkan eksekusi perintah sistem sembarang.</li><li>Picu eksekusi jarak jauh perintah yang menghapus file [[C2]].</li></ol><p>Pada lab ini Anda sudah memiliki hak akses admin. Anda dapat masuk memakai kredensial berikut: [[C3]]</p><div class="component-solution expandable-container"><details><summary><h4><span class="icon-erlenmeyer"></span> Petunjuk</h4></summary><div class="content"><div><p>Sink eksekusi perintah hanya dipicu saat pengguna admin menjalankan fungsionalitas rentan di situs.</p></div></div></details></div><div class="highlightedarea"><h4>Catatan</h4><p>Menguji server-side prototype pollution dapat merusak atau menjatuhkan server. Jika terjadi, mulai ulang server secara manual melalui tombol di banner lab.</p></div>',
        'sections' => [
            0 => '<div class="content"><div><p>Sink eksekusi perintah hanya dipicu saat pengguna admin menjalankan fungsionalitas rentan di situs.</p></div></div>',
            1 => <<<'LABHTML'
<div class="content"><div>
    <h5>Mempelajari fitur ubah alamat</h5>
    <ol>
        <li><p>Login, buka halaman akun, lalu kirim formulir pembaruan alamat tagihan dan pengiriman.</p></li>
        <li><p>Di Burp, buka <strong>Proxy &gt; HTTP history</strong> dan temukan permintaan [[C0]].</p></li>
        <li><p>Data formulir dikirim sebagai JSON dan dibalas objek JSON profil pengguna.</p></li>
        <li><p>Kirim permintaan ke Burp Repeater.</p></li>
    </ol>
    <h5>Mengidentifikasi sumber prototype pollution</h5>
    <ol>
        <li>
            <p>Di Repeater, tambahkan properti [[C1]] pada JSON berisi properti [[C2]]:</p>
            [[C3]]
        </li>
        <li><p>Kirim permintaan.</p></li>
        <li><p>Di tab <strong>Raw</strong> panel <strong>Response</strong>, indentasi JSON meningkat sesuai nilai suntikan, menandakan prototype pollution berhasil.</p></li>
    </ol>
    <h5>Menguji remote code execution</h5>
    <ol>
        <li><p>Buka panel admin dan perhatikan tombol untuk menjalankan maintenance jobs.</p></li>
        <li><p>Klik tombol tersebut; ini menjalankan tugas latar yang memunculkan child process Node.</p></li>
        <li>
            <p>Cemari prototipe memakai properti berbahaya [[C4]] yang menyisipkan argumen [[C5]] ke child process agar memanggil sink [[C6]] dan menghubungi server publik Burp Collaborator:</p>
            [[C7]]
        </li>
        <li><p>Kirim permintaan.</p></li>
        <li><p>Di browser, buka panel admin dan picu maintenance jobs lagi; kedua tugas tampak gagal.</p></li>
        <li><p>Buka tab <strong>Collaborator</strong> di Burp dan periksa interaksi DNS yang mengonfirmasi remote code execution.</p></li>
    </ol>
    <h5>Menyusun eksploitasi</h5>
    <ol>
        <li>
            <p>Di Repeater, ganti perintah [[C8]] dengan perintah penghapusan file Carlos:</p>
            [[C9]]
        </li>
        <li><p>Kirim permintaan.</p></li>
        <li><p>Kembali ke panel admin dan picu maintenance jobs lagi; file Carlos terhapus dan lab selesai.</p></li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    'df60ba65274e00bd34944f5e3edc74c16477909a2e19e5d3c9acc84e064712d7' => [
        'title' => 'Mengekfiltrasi data sensitif melalui server-side prototype pollution',
        'description_html' => '<p>Lab ini dibangun di atas Node.js dan Express, rentan terhadap server-side prototype pollution karena menggabungkan input pengguna secara tidak aman ke objek JavaScript server.</p><p>Konfigurasi server memungkinkan pencemaran [[C0]] untuk menyuntikkan perintah sistem sembarang agar dijalankan di server.</p><p>Untuk menyelesaikan lab:</p><ol><li>Temukan sumber prototype pollution untuk menambah properti sembarang ke [[C1]] global.</li><li>Identifikasi gadget yang dapat menjalankan perintah sistem sembarang.</li><li>Picu RCE yang membocorkan isi direktori home Carlos ([[C2]]) ke server publik Burp Collaborator.</li><li>Ekfiltrasi isi file rahasia di direktori itu ke Burp Collaborator.</li><li>Kirimkan rahasia tersebut lewat tombol di banner lab.</li></ol><p>Pada lab ini Anda sudah memiliki hak akses admin. Anda dapat masuk memakai kredensial berikut: [[C3]]</p><div class="highlightedarea"><h4>Catatan</h4><p>Menguji server-side prototype pollution dapat merusak atau menjatuhkan server. Jika terjadi, mulai ulang server secara manual melalui tombol di banner lab.</p></div>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <h5>Mempelajari fitur ubah alamat</h5>
    <ol>
        <li><p>Login, buka halaman akun, lalu kirim formulir pembaruan alamat tagihan dan pengiriman.</p></li>
        <li><p>Di Burp, buka <strong>Proxy &gt; HTTP history</strong> dan temukan permintaan [[C0]].</p></li>
        <li><p>Data formulir dikirim sebagai JSON dan dibalas objek JSON profil pengguna.</p></li>
        <li><p>Kirim permintaan ke Burp Repeater.</p></li>
    </ol>
    <h5>Mengidentifikasi sumber prototype pollution</h5>
    <ol>
        <li>
            <p>Di Repeater, tambahkan properti [[C1]] berisi properti [[C2]]:</p>
            [[C3]]
        </li>
        <li><p>Kirim permintaan.</p></li>
        <li><p>Di tab <strong>Raw</strong> panel <strong>Response</strong>, indentasi JSON meningkat sesuai nilai suntikan Anda, menandakan prototype pollution berhasil.</p></li>
    </ol>
    <h5>Menguji remote code execution</h5>
    <ol>
        <li><p>Buka panel admin dan temukan tombol maintenance jobs.</p></li>
        <li><p>Klik tombol itu; prosesnya memunculkan child process Node.</p></li>
        <li>
            <p>Cemari prototipe memakai properti berbahaya yang mengontrol opsi [[C4]] dengan memanggil perintah ke Burp Collaborator:</p>
            [[C5]]
        </li>
        <li><p>Kirim permintaan.</p></li>
        <li><p>Picu maintenance jobs di panel admin dan amati pekerjaan gagal dijalankan setelah jeda singkat.</p></li>
        <li><p>Buka tab <strong>Collaborator</strong> di Burp dan periksa interaksi yang membuktikan remote code execution.</p></li>
    </ol>
    <h5>Membocorkan nama file tersembunyi</h5>
    <ol>
        <li>
            <p>Di Burp Repeater, ubah payload parameter [[C6]] menjadi perintah untuk mengirim isi direktori home Carlos ke Burp Collaborator:</p>
            [[C7]]
        </li>
        <li><p>Kirim permintaan.</p></li>
        <li><p>Di panel admin, picu maintenance jobs lagi.</p></li>
        <li><p>Buka tab <strong>Collaborator</strong> dan periksa interaksi.</p></li>
        <li><p>Amati permintaan HTTP [[C8]] dengan badan berenkode Base64.</p></li>
        <li><p>Dekode isinya untuk menemukan dua entri: [[C9]] dan [[C10]].</p></li>
    </ol>
    <h5>Mengekfiltrasi isi file rahasia</h5>
    <ol>
        <li>
            <p>Di Burp Repeater, ubah payload agar membaca file [[C11]] dan mengirimkannya ke Burp Collaborator:</p>
            [[C12]]
        </li>
        <li><p>Kirim permintaan.</p></li>
        <li><p>Picu maintenance jobs lagi di panel admin.</p></li>
        <li><p>Buka tab <strong>Collaborator</strong> dan periksa interaksi baru.</p></li>
        <li><p>Amati permintaan HTTP [[C13]] baru berisi badan berenkode Base64.</p></li>
        <li><p>Dekode isinya untuk mendapatkan rahasianya.</p></li>
        <li><p>Klik <strong>Submit solution</strong> di banner lab lalu kirimkan rahasia tersebut untuk menyelesaikan lab.</p></li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
];
