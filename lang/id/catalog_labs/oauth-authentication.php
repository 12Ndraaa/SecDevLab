<?php

return [
    'f12c0972c9b99d48a344c37883cce2e82b5a29c5fa1dbb51d0860363f805ad70' => [
        'title' => 'Bypass autentikasi lewat OAuth implicit flow',
        'description_html' => '<p>Lab ini memakai layanan OAuth agar pengguna dapat masuk dengan akun media sosialnya. Validasi yang cacat pada aplikasi klien memungkinkan penyerang masuk ke akun pengguna lain tanpa mengetahui kata sandinya.</p><p>Untuk menyelesaikan lab, masuklah ke akun Carlos yang beralamat email [[C0]].</p><p>Anda dapat masuk memakai akun media sosial Anda sendiri dengan kredensial berikut: [[C1]].</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Sambil mem-proxy lalu lintas lewat Burp, klik "My account" dan selesaikan proses login OAuth hingga diarahkan kembali ke situs blog.</li>
        <li>Di Burp, buka "Proxy" &gt; "HTTP history" dan pelajari permintaan serta respons alur OAuth, dimulai dari permintaan otorisasi [[C0]].</li>
        <li>Aplikasi klien (situs blog) menerima informasi dasar pengguna dari layanan OAuth, lalu meloginkan pengguna dengan mengirim permintaan [[C1]] berisi informasi itu bersama access token ke endpoint [[C2]] miliknya sendiri.</li>
        <li>Kirim permintaan [[C3]] ke Burp Repeater. Di Repeater, ubah alamat email menjadi [[C4]] lalu kirim permintaan. Amati bahwa tidak muncul pesan galat.</li>
        <li>Klik kanan permintaan [[C5]] lalu pilih "Request in browser" &gt; "In original session". Salin URL tersebut dan buka di browser untuk masuk sebagai Carlos dan menyelesaikan lab.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '832aba2ee324f0e0d7fd3881acff87490bf540d183ebbeccffffd71f5310a150' => [
        'title' => 'SSRF melalui registrasi klien dinamis OpenID',
        'description_html' => '<p>Lab ini mengizinkan aplikasi klien mendaftarkan dirinya secara dinamis ke layanan OAuth melalui endpoint pendaftaran khusus. Sebagian data klien diproses secara tidak aman oleh layanan OAuth sehingga membuka vektor SSRF.</p><p>Untuk menyelesaikan lab, susun serangan SSRF untuk mengakses [[C0]] dan curi secret access key lingkungan cloud penyedia OAuth.</p><p>Anda dapat masuk ke akun Anda menggunakan kredensial berikut: [[C1]]</p><div class="highlightedarea"><h4>Catatan</h4><p>Agar platform Academy tidak disalahgunakan menyerang pihak ketiga, firewall kami memblokir interaksi antara lab dan sistem eksternal sembarang. Anda harus memakai server publik bawaan Burp Collaborator.</p></div>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Sambil mem-proxy lalu lintas lewat Burp, masuk ke akun Anda. Buka [[C0]] untuk membaca file konfigurasi dan perhatikan bahwa endpoint registrasi klien berada di [[C1]].</li>
        <li>
            <p>Di Burp Repeater, buat permintaan [[C2]] untuk mendaftarkan aplikasi klien Anda sendiri ke layanan OAuth dengan menyertakan array [[C3]] berisi daftar whitelist URI callback untuk aplikasi palsu Anda, misalnya:</p>
            [[C4]]
        </li>
        <li>Kirim permintaan. Anda berhasil mendaftarkan aplikasi klien tanpa autentikasi, dan responsnya memuat metadata termasuk [[C5]] baru.</li>
        <li>Audit alur OAuth dan perhatikan halaman persetujuan "Authorize" mengambil logo klien dari [[C6]]. Menurut spesifikasi OpenID, klien bisa mengisi URL logo via properti [[C7]] saat pendaftaran dinamis. Kirim permintaan [[C8]] ke Burp Repeater.</li>
        <li>
            <p>Di Repeater, kembali ke permintaan [[C9]] tadi, tambahkan properti [[C10]], klik kanan lalu pilih "Insert Collaborator payload" sebagai nilainya:</p>
            [[C11]]
        </li>
        <li>Kirim permintaan untuk mendaftarkan klien baru lalu salin [[C12]] dari respons.</li>
        <li>Di Repeater, buka permintaan [[C13]], ganti [[C14]] pada path dengan ID baru tadi lalu kirim permintaan.</li>
        <li>Periksa tab Collaborator. Muncul interaksi HTTP yang mencoba mengambil logo Anda, membuktikan properti [[C15]] memicu permintaan dari server OAuth.</li>
        <li>
            <p>Kembali ke permintaan [[C16]] di Repeater dan ganti nilai [[C17]] menjadi URL target:</p>
            [[C18]]
        </li>
        <li>Kirim permintaan tersebut lalu salin [[C19]] baru dari respons.</li>
        <li>Kembali ke permintaan [[C20]], ganti [[C21]] dengan nilai baru tersebut lalu kirim. Respons akan memuat metadata sensitif lingkungan cloud penyedia OAuth termasuk secret access key.</li>
        <li>Gunakan tombol "Submit solution" untuk mengirimkan access key dan menyelesaikan lab.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '6277e415ef43d61680e72e8facbeceacf6e3e4957f85c443470fa06ad977b666' => [
        'title' => 'Penautan profil OAuth secara paksa',
        'description_html' => '<p>Lab ini memberi opsi menautkan profil media sosial ke akun Anda agar dapat login lewat OAuth. Karena implementasi alur OAuth di aplikasi klien tidak aman, penyerang dapat memanfaatkannya untuk mengambil alih akun pengguna lain.</p><p>Untuk menyelesaikan lab, gunakan serangan CSRF untuk menautkan profil media sosial Anda ke akun admin di situs blog, lalu akses panel admin dan hapus [[C0]].</p><p>Admin akan membuka apa pun yang Anda kirim dari server eksploitasi dan selalu memiliki sesi aktif di situs blog.</p><p>Anda dapat masuk memakai kredensial berikut:</p><ul><li>Akun situs blog: [[C1]]</li><li>Profil media sosial: [[C2]]</li></ul>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Sambil mem-proxy lalu lintas lewat Burp, klik "My account" dan login ke situs blog lewat formulir login biasa.</li>
        <li>Perhatikan Anda memiliki opsi menautkan profil media sosial ke akun Anda.</li>
        <li>Klik "Attach a social profile", login memakai kredensial media sosial untuk menyelesaikan alur OAuth, hingga diarahkan kembali ke situs blog.</li>
        <li>Logout lalu klik "My account" dan pilih opsi "Log in with social media". Anda langsung masuk lewat akun media sosial yang baru ditautkan.</li>
        <li>Di proxy history, pelajari permintaan [[C0]] dan amati bahwa [[C1]] mengirim kode otorisasi ke [[C2]] tanpa menyertakan parameter [[C3]] pelindung CSRF.</li>
        <li>Aktifkan intersepsi proxy lalu pilih kembali opsi "Attach a social profile".</li>
        <li>Di Burp Proxy, teruskan permintaan hingga mengintersep [[C4]]. Klik kanan lalu pilih "Copy URL".</li>
        <li>Batalkan (drop) permintaan agar kode otorisasi tidak terpakai dan tetap valid.</li>
        <li>Matikan intersepsi proxy lalu logout dari situs blog.</li>
        <li>
            <p>Buka server eksploitasi dan buat [[C5]] dengan atribut [[C6]] mengarah ke URL yang disalin tadi:</p>
            [[C7]]
        </li>
        <li>Kirimkan eksploitasi ke korban. Saat browser admin memuat [[C8]], alur OAuth selesai dan menautkan profil media sosial Anda ke akun admin.</li>
        <li>Kembali ke situs blog lalu pilih "Log in with social media". Anda langsung masuk sebagai admin; buka panel admin dan hapus [[C9]] untuk menyelesaikan lab.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '8df8965d53d202be54b51a34cae42dca0806945f7ef11146e8a1905bf9f71f6b' => [
        'title' => 'Pembajakan akun OAuth melalui redirect_uri',
        'description_html' => '<p>Lab ini memakai layanan OAuth untuk login akun media sosial. Kesalahan konfigurasi penyedia OAuth memungkinkan penyerang mencuri kode otorisasi milik akun pengguna lain.</p><p>Untuk menyelesaikan lab, curi kode otorisasi milik akun admin, lalu pakai untuk mengakses akunnya dan menghapus pengguna [[C0]].</p><p>Admin akan membuka apa pun yang Anda kirim dari server eksploitasi dan selalu memiliki sesi aktif dengan layanan OAuth.</p><p>Anda dapat masuk memakai akun media sosial Anda dengan kredensial berikut: [[C1]].</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Sambil mem-proxy lalu lintas lewat Burp, klik "My account" dan selesaikan proses login OAuth hingga diarahkan kembali ke situs blog.</li>
        <li>Logout lalu login kembali. Anda langsung masuk karena masih memiliki sesi aktif pada layanan OAuth tanpa perlu memasukkan kredensial lagi.</li>
        <li>Di Burp, temukan permintaan otorisasi <strong>terbaru</strong> yang diawali [[C0]] dan kirim ke Burp Repeater. Perhatikan saat dikirim, Anda langsung dialihkan ke [[C1]] beserta kode otorisasi di query string.</li>
        <li>Di Burp Repeater, amati bahwa nilai sembarang apa pun diterima sebagai [[C2]] tanpa galat dan dipakai membuat pengalihan di respons.</li>
        <li>Arahkan parameter [[C3]] itu ke server eksploitasi Anda, kirim permintaan, dan ikuti pengalihannya. Periksa access log server eksploitasi dan temukan entri berisi kode otorisasi yang bocor ke domain eksternal.</li>
        <li>
            <p>Buka server eksploitasi dan buat [[C4]] berikut di [[C5]]:</p>
            [[C6]]
        </li>
        <li>Simpan eksploitasi lalu klik "View exploit". Pastikan [[C7]] dimuat dan muncul permintaan lain berisi kode bocor di access log.</li>
        <li>Kirimkan eksploitasi ke korban, lalu salin kode milik korban dari access log.</li>
        <li>
            <p>Logout dari situs blog lalu gunakan kode curian itu untuk mengunjungi:</p>
            [[C8]]
            <p>Sisa alur OAuth selesai otomatis dan Anda masuk sebagai admin. Buka panel admin dan hapus [[C9]] untuk menyelesaikan lab.</p>
        </li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '59fa9eb2f6bea4ef7b1872b98ff18e315d1981de5fae4917388f9942c98d8682' => [
        'title' => 'Mencuri access token OAuth lewat open redirect',
        'description_html' => '<p>Lab ini memakai layanan OAuth agar pengguna dapat login dengan akun media sosial. Validasi layanan OAuth yang cacat memungkinkan penyerang membocorkan access token ke halaman sembarang di aplikasi klien.</p><p>Untuk menyelesaikan lab, temukan open redirect di situs blog dan manfaatkan untuk mencuri access token admin, lalu ambil API key admin dan kirim lewat tombol di banner lab.</p><div class="highlightedarea"><h4>Catatan</h4><p>Anda tidak dapat mengakses API key admin hanya dengan login ke akunnya di aplikasi klien.</p></div><p>Admin akan membuka apa pun yang dikirim dari server eksploitasi dan selalu memiliki sesi aktif di layanan OAuth.</p><p>Anda dapat masuk memakai akun media sosial dengan kredensial berikut: [[C0]].</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Sambil mem-proxy lalu lintas lewat Burp, klik "My account" dan selesaikan proses login OAuth hingga diarahkan kembali ke situs blog.</li>
        <li>Pelajari permintaan dan responsnya. Situs blog memanggil endpoint userinfo di [[C0]] untuk meloginkan pengguna. Kirim permintaan [[C1]] ke Burp Repeater.</li>
        <li>Logout lalu login lagi. Dari proxy history, temukan permintaan [[C2]] terbaru dan kirim ke Repeater.</li>
        <li>Di Repeater, uji permintaan [[C3]]. Anda tidak bisa memasukkan domain eksternal pada [[C4]] karena divalidasi terhadap whitelist, tetapi bisa menambahkan karakter tambahan di belakang nilai bawaan termasuk urutan path traversal [[C5]].</li>
        <li>Logout dari situs blog dan aktifkan intersepsi proxy di Burp.</li>
        <li>Di browser, login lagi lalu buka permintaan [[C6]] yang terintersep di Burp Proxy.</li>
        <li>
            <p>Pastikan parameter [[C7]] rentan terhadap directory traversal dengan mengubahnya menjadi:</p>
            [[C8]]
            <p>Teruskan permintaan lainnya dan amati bahwa Anda dialihkan ke postingan blog pertama dengan access token berada pada fragment URL.</p>
        </li>
        <li>Audit halaman lain di situs blog melalui Burp. Temukan tombol "Next post" di bawah tiap postingan yang mengirim permintaan [[C9]] ke Repeater.</li>
        <li>Di Repeater, uji parameter [[C10]] dan pastikan itu adalah open redirect yang bisa mengalihkan ke URL absolut domain eksternal seperti server eksploitasi Anda.</li>
        <li>
            <p>Gabungkan kedua celah ini menjadi URL yang mengarahkan [[C11]] ke open redirect agar meneruskan korban ke server eksploitasi Anda:</p>
            [[C12]]
        </li>
        <li>Uji URL tersebut di browser dan pastikan Anda dialihkan ke halaman server eksploitasi beserta access token di fragment URL.</li>
        <li>
            <p>Di server eksploitasi, buat skrip di [[C13]] untuk mengekstrak fragment dan membocorkannya ke access log dengan mengalihkan ulang berisi parameter query:</p>
            [[C14]]
        </li>
        <li>Simpan eksploitasi, kunjungi URL berbahaya tadi, dan pastikan access log mencatat permintaan [[C15]].</li>
        <li>
            <p>Susun eksploitasi lengkap yang memaksa korban mengunjungi URL berbahaya lalu mengeksekusi pencuri fragment:</p>
            [[C16]]
        </li>
        <li>Simpan dan uji lewat "View exploit", lalu periksa access log untuk melihat permintaan [[C17]].</li>
        <li>Kirimkan eksploitasi ke korban, lalu salin access token korban dari log.</li>
        <li>Di Repeater, buka permintaan [[C18]], ganti token di header [[C19]] dengan token korban lalu kirim untuk mengambil data korban termasuk API key-nya.</li>
        <li>Klik tombol "Submit solution" di bagian atas halaman lab untuk mengirimkan API key tersebut dan menyelesaikan lab.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    'db65a3fdb4039c8d0b1fb7af3816acac95c2bd0319a92050d9d0aab3cd14c52d' => [
        'title' => 'Mencuri access token OAuth lewat halaman proxy',
        'description_html' => '<p>Lab ini memakai layanan OAuth untuk login dengan akun media sosial. Validasi layanan OAuth yang cacat memungkinkan penyerang membocorkan access token ke halaman sembarang di aplikasi klien.</p><p>Untuk menyelesaikan lab, temukan kerentanan sekunder di aplikasi klien dan pakai sebagai proxy untuk mencuri access token akun admin, lalu ambil API key admin dan kirim lewat tombol di banner lab.</p><p>Admin akan membuka apa pun yang dikirim dari server eksploitasi dan selalu memiliki sesi aktif dengan layanan OAuth.</p><p>Anda dapat masuk memakai akun media sosial dengan kredensial berikut: [[C0]].</p><div class="highlightedarea"><h4>Catatan</h4><p>Karena korban memakai Chrome, disarankan juga memakai Chrome (atau browser Chromium bawaan Burp) untuk menguji eksploitasi Anda.</p></div>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Pelajari alur OAuth lewat Burp seperti pada <a href="/web-security/oauth/lab-oauth-stealing-oauth-access-tokens-via-an-open-redirect">lab sebelumnya</a>, dan pastikan [[C0]] rentan terhadap directory traversal sehingga access token dapat diarahkan ke halaman sembarang di situs blog.</li>
        <li>Audit halaman lain di situs blog dan amati formulir komentar dimuat sebagai [[C1]] di [[C2]], yang memakai metode [[C3]] untuk mengirim [[C4]] ke parent window dengan origin terbuka ([[C5]]).</li>
        <li>
            <p>Salin URL permintaan [[C6]] dari proxy history, lalu buat [[C7]] di server eksploitasi dengan atribut [[C8]] berisi URL tersebut yang [[C9]]-nya diarahkan via directory traversal ke formulir komentar:</p>
            [[C10]]
        </li>
        <li>
            <p>Di bawahnya, tambahkan skrip pendengar web message yang mencatat isinya ke access log server eksploitasi:</p>
            [[C11]]
        </li>
        <li>Simpan eksploitasi dan klik "View exploit". Pastikan [[C12]] dimuat dan access log mencatat URL formulir komentar beserta fragment berisi access token.</li>
        <li>Kirimkan eksploitasi ke korban dan salin access token korban dari log tanpa menyertakan karakter URL-encoded di sekitarnya.</li>
        <li>Kirim permintaan [[C13]] ke Burp Repeater, ganti token pada header [[C14]] dengan token korban, lalu kirim untuk mengambil data dan API key korban.</li>
        <li>Klik tombol "Submit solution" di bagian atas halaman lab untuk mengirimkan key curian dan menyelesaikan lab.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
];
