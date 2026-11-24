<?php

return [
    '15f066df40dd7d208e9874af7dba51ac602d94871f25ccd02692a793ebffe91f' => [
        'title' => 'HTTP request smuggling, mengonfirmasi kerentanan CL.TE melalui perbedaan respons',
        'description_html' => '<p>Lab ini melibatkan server front-end dan back-end, dan server front-end tidak mendukung chunked encoding.</p><p>Untuk menyelesaikan lab, selundupkan permintaan ke server back-end agar permintaan berikutnya untuk [[C0]] memicu respons 404 Not Found.</p><div class="highlightedarea"><h4>Catatan</h4><p>Meski lab ini mendukung HTTP/2, solusi yang dimaksud memerlukan HTTP/1 yang dapat diubah secara manual di Burp Repeater melalui bagian <strong>Request attributes</strong> pada panel <strong>Inspector</strong>.</p></div><div class="component-labinstructions"><h4>Tip</h4><p>Mengatur panjang konten secara manual dalam request smuggling cukup rumit; ekstensi <a href="https://portswigger.net/blog/http-desync-attacks-request-smuggling-reborn#demo">HTTP Request Smuggler</a> di BApp Store dapat membantu.</p></div>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <p>Di Burp Repeater, kirimkan permintaan berikut dua kali berturut-turut:</p>
    [[C0]]
    <p>Permintaan kedua akan menerima respons HTTP 404.</p>
</div></div>
LABHTML,
        ],
    ],
    'fe9ab531836f0124048451639920eb523e4374df7d3e1f492dc1985048adeae9' => [
        'title' => 'HTTP request smuggling, mengonfirmasi kerentanan TE.CL melalui perbedaan respons',
        'description_html' => '<p>Lab ini melibatkan server front-end dan back-end, dan server back-end tidak mendukung chunked encoding.</p><p>Untuk menyelesaikan lab, selundupkan permintaan ke server back-end agar permintaan berikutnya untuk [[C0]] memicu respons 404 Not Found.</p><div class="highlightedarea"><h4>Catatan</h4><p>Meski lab ini mendukung HTTP/2, solusi yang dimaksud memerlukan HTTP/1 yang dapat diubah di Burp Repeater lewat bagian <strong>Request attributes</strong> pada panel <strong>Inspector</strong>.</p></div><div class="component-labinstructions"><h4>Tip</h4><p>Mengatur panjang konten secara manual dalam request smuggling cukup rumit; ekstensi <a href="https://portswigger.net/blog/http-desync-attacks-request-smuggling-reborn#demo">HTTP Request Smuggler</a> di BApp Store dapat membantu.</p></div>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <p>Di Burp Suite, buka menu Repeater dan pastikan opsi "Update Content-Length" tidak dicentang.</p>
    <p>Kirimkan permintaan berikut dua kali di Burp Repeater:</p>
    [[C0]]
    <p>Permintaan kedua akan menerima respons HTTP 404.</p>
</div></div>
LABHTML,
        ],
    ],
    'd87789adec7383329012f5a094910fc21a7bf4958acf05f883ac78ddd12c6a37' => [
        'title' => 'Mengeksploitasi HTTP request smuggling untuk melewati kontrol keamanan front-end, kerentanan CL.TE',
        'description_html' => '<p>Lab ini melibatkan server front-end dan back-end, dan server front-end tidak mendukung chunked encoding. Ada panel admin di [[C0]] yang diblokir oleh server front-end.</p><p>Untuk menyelesaikan lab, selundupkan permintaan ke server back-end agar mengakses panel admin dan menghapus pengguna [[C1]].</p><div class="highlightedarea"><h4>Catatan</h4><p>Meski lab ini mendukung HTTP/2, solusi yang dimaksud memerlukan HTTP/1 yang dapat diubah di Burp Repeater lewat bagian <strong>Request attributes</strong> pada panel <strong>Inspector</strong>.</p></div><div class="component-labinstructions"><h4>Tip</h4><p>Mengatur panjang konten secara manual cukup rumit; ekstensi <a href="https://portswigger.net/blog/http-desync-attacks-request-smuggling-reborn#demo">HTTP Request Smuggler</a> di BApp Store dapat membantu.</p></div>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Coba kunjungi [[C0]] dan amati permintaan diblokir.</li>
        <li>
            <p>Kirim permintaan berikut dua kali lewat Burp Repeater:</p>
            [[C1]]
        </li>
        <li>Permintaan gabungan ke [[C2]] ditolak karena tidak memakai header [[C3]].</li>
        <li>
            <p>Kirim permintaan berikut dua kali:</p>
            [[C4]]
        </li>
        <li>Permintaan masih ditolak karena header Host permintaan kedua berbenturan dengan Host selundupan.</li>
        <li>
            <p>Kirim permintaan berikut dua kali agar header permintaan kedua terserap ke dalam body permintaan selundupan:</p>
            [[C5]]
        </li>
        <li>Amati Anda kini dapat melihat antarmuka panel admin.</li>
        <li>
            <p>Ubah URL permintaan selundupan untuk menghapus [[C6]]:</p>
            [[C7]]
        </li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    'c91df7d449cc4882b6bc0e5d19694f659acdcfba2c19706c49c67f947891d53c' => [
        'title' => 'Mengeksploitasi HTTP request smuggling untuk melewati kontrol keamanan front-end, kerentanan TE.CL',
        'description_html' => '<p>Lab ini melibatkan server front-end dan back-end, dan server back-end tidak mendukung chunked encoding. Ada panel admin di [[C0]] yang diblokir oleh server front-end.</p><p>Untuk menyelesaikan lab, selundupkan permintaan ke server back-end agar mengakses panel admin dan menghapus pengguna [[C1]].</p><div class="highlightedarea"><h4>Catatan</h4><p>Meski lab ini mendukung HTTP/2, solusi yang dimaksud memerlukan HTTP/1 yang dapat diubah di Burp Repeater lewat bagian <strong>Request attributes</strong> pada panel <strong>Inspector</strong>.</p></div><div class="component-labinstructions"><h4>Tip</h4><p>Mengatur panjang konten secara manual cukup rumit; ekstensi <a href="https://portswigger.net/blog/http-desync-attacks-request-smuggling-reborn#demo">HTTP Request Smuggler</a> di BApp Store dapat membantu.</p></div>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Coba kunjungi [[C0]] dan amati permintaan diblokir.</li>
        <li>Di Burp Suite, buka menu Repeater dan pastikan opsi "Update Content-Length" tidak dicentang.</li>
        <li>
            <p>Kirim permintaan berikut dua kali lewat Burp Repeater:</p>
            [[C1]]
            <div class="highlightedarea">
                <h4>Catatan</h4>
                <p>Pastikan menyertakan urutan baris baru [[C2]] setelah angka [[C3]] terakhir.</p>
            </div>
        </li>
        <li>Permintaan gabungan ke [[C4]] ditolak karena tidak memakai header [[C5]].</li>
        <li>
            <p>Kirim permintaan berikut dua kali:</p>
            [[C6]]
        </li>
        <li>Amati Anda kini dapat mengakses panel admin.</li>
        <li>
            <p>Ubah URL permintaan selundupan untuk menghapus [[C7]]:</p>
            [[C8]]
        </li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '9028757aac9d890a1120a8eafe6d820ba114de27c132ee12c8ae8525c9378c40' => [
        'title' => 'Mengeksploitasi HTTP request smuggling untuk mengungkap penulisan ulang permintaan front-end',
        'description_html' => '<p>Lab ini melibatkan server front-end dan back-end, dan server front-end tidak mendukung chunked encoding.</p><p>Ada panel admin di [[C0]] yang hanya dapat diakses IP 127.0.0.1. Front-end menyisipkan header mirip [[C1]] namun dengan nama berbeda ke tiap permintaan masuk.</p><p>Untuk menyelesaikan lab, selundupkan permintaan untuk mengungkap nama header sisipan front-end tersebut, lalu gunakan header itu untuk mengakses panel admin dan menghapus [[C2]].</p><div class="highlightedarea"><h4>Catatan</h4><p>Meski lab ini mendukung HTTP/2, solusi yang dimaksud memerlukan HTTP/1 yang dapat diubah di Burp Repeater lewat bagian <strong>Request attributes</strong> pada panel <strong>Inspector</strong>.</p></div><div class="component-labinstructions"><h4>Tip</h4><p>Mengatur panjang konten secara manual cukup rumit; ekstensi <a href="https://portswigger.net/blog/http-desync-attacks-request-smuggling-reborn#demo">HTTP Request Smuggler</a> di BApp Store dapat membantu.</p></div>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Buka [[C0]] dan amati panel admin hanya dapat diakses dari [[C1]].</li>
        <li>Gunakan fitur pencarian situs dan amati parameter [[C2]] tercermin di respons.</li>
        <li>
            <p>Kirim permintaan berikut dua kali memakai Burp Repeater:</p>
            [[C3]]
        </li>
        <li>Respons kedua memuat "Search results for" diikuti bagian awal permintaan HTTP yang telah ditulis ulang oleh front-end.</li>
        <li>
            <p>Catat nama header [[C4]] tersebut lalu sertakan untuk mengakses panel admin:</p>
            [[C5]]
        </li>
        <li>
            <p>Ubah URL permintaan selundupan untuk menghapus pengguna [[C6]]:</p>
            [[C7]]
        </li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    'a8d351250890095aedf20e8164b719e049e192bbc1f004e58d788778d6a7e982' => [
        'title' => 'Mengeksploitasi HTTP request smuggling untuk menangkap permintaan pengguna lain',
        'description_html' => '<p>Lab ini melibatkan server front-end dan back-end, dan server front-end tidak mendukung chunked encoding.</p><p>Untuk menyelesaikan lab, selundupkan permintaan yang menyimpan permintaan pengguna berikutnya ke aplikasi, lalu ambil cookie korban tersebut untuk mengakses akunnya.</p><div class="highlightedarea"><h4>Catatan</h4><ul><li>Meski lab ini mendukung HTTP/2, solusi yang dimaksud memerlukan HTTP/1 yang dapat diubah di Burp Repeater lewat bagian <strong>Request attributes</strong> pada panel <strong>Inspector</strong>.</li><li>Pengguna korban disimulasikan mengirim permintaan setelah beberapa kali POST Anda, sehingga serangan mungkin perlu diulang beberapa kali.</li></ul></div><div class="component-labinstructions"><h4>Tip</h4><p>Mengatur panjang konten secara manual cukup rumit; ekstensi <a href="https://portswigger.net/blog/http-desync-attacks-request-smuggling-reborn#demo">HTTP Request Smuggler</a> di BApp Store dapat membantu.</p></div><div class="component-solution expandable-container"><details><summary><h4><span class="icon-erlenmeyer"></span> Petunjuk</h4></summary><div class="content"><div><p>Jika terjadi timeout, ukuran byte yang Anda coba tangkap kemungkinan lebih besar daripada permintaan berikutnya; kurangi nilai [[C0]] pada awalan permintaan selundupan.</p></div></div></details></div>',
        'sections' => [
            0 => '<div class="content"><div><p>Jika terjadi timeout, ukuran byte yang Anda coba tangkap kemungkinan lebih besar daripada permintaan berikutnya; kurangi nilai [[C0]] pada awalan permintaan selundupan.</p></div></div>',
            1 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Buka postingan blog lalu kirim komentar.</li>
        <li>Kirim permintaan [[C0]] ke Burp Repeater, pindahkan parameter [[C1]] ke posisi paling akhir isi body, dan pastikan masih berfungsi.</li>
        <li>
            <p>Naikkan nilai [[C3]] pada permintaan [[C2]] menjadi 400 lalu selundupkan ke back-end:</p>
            [[C4]]
        </li>
        <li>Lihat halaman postingan blog untuk memeriksa apakah komentar baru berisi permintaan pengguna lain telah tersimpan (ulangi bila korban belum mengirim permintaan).</li>
        <li>Salin header Cookie korban dari komentar tersebut dan pakai untuk mengakses akunnya.</li>
    </ol>
    <div class="highlightedarea">
        <h4>Catatan</h4>
        <p>Jika permintaan tersimpan terpotong sebelum header Cookie terlihat, naikkan nilai Content-Length selundupan secara bertahap.</p>
    </div>
</div></div>
LABHTML,
        ],
    ],
    'c76cecbb6026af05cd93ecc7a616c391e40b73d135e309388f039ecf576fcd53' => [
        'title' => 'Mengeksploitasi HTTP request smuggling untuk mengirimkan reflected XSS',
        'description_html' => '<p>Lab ini melibatkan server front-end dan back-end, dan server front-end tidak mendukung chunked encoding. Aplikasi juga rentan reflected XSS melalui header [[C0]].</p><p>Untuk menyelesaikan lab, selundupkan permintaan agar pengguna berikutnya menerima respons berisi eksploitasi XSS pengeksekusi [[C1]].</p><div class="highlightedarea"><h4>Catatan</h4><ul><li>Meski lab ini mendukung HTTP/2, solusi yang dimaksud memerlukan HTTP/1 di Burp Repeater lewat bagian <strong>Request attributes</strong> pada panel <strong>Inspector</strong>.</li><li>Pengguna korban aktif setelah beberapa permintaan POST Anda, sehingga serangan mungkin perlu diulang.</li></ul></div><div class="component-labinstructions"><h4>Tip</h4><p>Ekstensi <a href="https://portswigger.net/blog/http-desync-attacks-request-smuggling-reborn#demo">HTTP Request Smuggler</a> di BApp Store dapat membantu mengatur panjang permintaan.</p></div>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Buka postingan blog dan kirim permintaannya ke Burp Repeater.</li>
        <li>Amati formulir komentar menyisipkan nilai header [[C0]] Anda ke input tersembunyi.</li>
        <li>
            <p>Suntikkan payload XSS ke header [[C1]] dan pastikan tercermin di respons:</p>
            [[C2]]
        </li>
        <li>
            <p>Selundupkan permintaan XSS tersebut agar mengenai pengunjung berikutnya:</p>
            [[C3]]
        </li>
    </ol>
    <div class="highlightedarea">
        <h4>Catatan</h4>
        <p>Karena pengguna target hanya berkunjung sesekali, Anda mungkin perlu mengulang serangan ini beberapa kali sampai tepat sasaran.</p>
    </div>
</div></div>
LABHTML,
        ],
    ],
    'b0bedd0f5d815c54107d42a83e72de7254aa354f2dd106e6f2d8e47679ed2f60' => [
        'title' => 'Peracunan antrean respons melalui H2.TE request smuggling',
        'description_html' => '<p>Lab ini rentan terhadap request smuggling karena server front-end men-downgrade permintaan HTTP/2 meski panjangnya ambigu.</p><p>Untuk menyelesaikan lab, hapus pengguna [[C0]] dengan memanfaatkan response queue poisoning untuk masuk ke panel admin di [[C1]]. Admin login kira-kira tiap 15 detik.</p><p>Koneksi ke back-end di-reset setiap 10 permintaan sehingga Anda selalu bisa mendapat koneksi baru dengan mengirim beberapa permintaan normal.</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>
            <p>Di Burp Repeater (pastikan protokol HTTP/2 aktif di bagian <strong>Request Attributes</strong> panel Inspector), selundupkan awalan acak di body memakai chunked encoding:</p>
            [[C0]]
        </li>
        <li><p>Setiap permintaan kedua membalas 404, membuktikan back-end menempelkan permintaan berikutnya ke awalan selundupan.</p></li>
        <li>
            <p>Buat permintaan berikut untuk menyelundupkan permintaan lengkap ke endpoint tak ada agar respons milik Anda mudah dibedakan dari respons admin:</p>
            [[C1]]
            <div class="highlightedarea">
                <h4>Catatan</h4>
                <p>Pastikan mengakhiri permintaan selundupan dengan urutan [[C2]] setelah header [[C3]].</p>
            </div>
        </li>
        <li><p>Kirim permintaan untuk meracuni antrean respons (Anda akan menerima respons 404 milik Anda sendiri).</p></li>
        <li>
            <p>Tunggu sekitar 5 detik lalu kirim permintaan lagi untuk mengambil satu respons dari antrean. Kode status selain 404 berarti Anda menangkap respons pengguna admin; ulangi sampai mendapat respons 302 berisi cookie sesi baru milik admin.</p>
            <div class="highlightedarea">
                <h4>Catatan</h4>
                <p>Jika terus mendapat respons 200 tanpa 302, kirim 10 permintaan biasa untuk me-reset koneksi lalu coba lagi.</p>
            </div>
        </li>
        <li>
            <p>Salin cookie sesi tersebut lalu kirim permintaan berikut:</p>
            [[C4]]
        </li>
        <li><p>Kirim berulang kali sampai menerima respons 200 berisi halaman panel admin.</p></li>
        <li><p>Temukan URL penghapusan [[C5]] ([[C6]]) dan kirim permintaan ke path itu untuk menghapus [[C7]] dan menyelesaikan lab.</p></li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '94fed48630d16b9adc01888e546e50f8e94c1bae77065a94140339f20303ef55' => [
        'title' => 'H2.CL request smuggling',
        'description_html' => '<p>Lab ini rentan terhadap request smuggling karena front-end men-downgrade permintaan HTTP/2 meski panjangnya ambigu.</p><p>Untuk menyelesaikan lab, lancarkan serangan request smuggling agar browser korban memuat dan mengeksekusi file JavaScript berbahaya dari server eksploitasi yang memanggil [[C0]]. Korban membuka beranda tiap 10 detik.</p><div class="component-solution expandable-container"><details><summary><h4><span class="icon-erlenmeyer"></span> Petunjuk</h4></summary><div class="content"><div><ul><li><p>Lab ini memakai teknik mengubah pengalihan internal menjadi open redirect pada materi <a href="/web-security/request-smuggling/exploiting#using-http-request-smuggling-to-turn-an-on-site-redirect-into-an-open-redirect">request smuggling sebelumnya</a>.</p></li><li><p>Anda perlu meracuni koneksi tepat sebelum browser korban mengimpor resource JavaScript, sehingga mungkin perlu beberapa percobaan.</p></li></ul></div></div></details></div>',
        'sections' => [
            0 => '<div class="content"><div><ul><li><p>Lab ini memakai teknik mengubah pengalihan internal menjadi open redirect pada materi <a href="/web-security/request-smuggling/exploiting#using-http-request-smuggling-to-turn-an-on-site-redirect-into-an-open-redirect">request smuggling sebelumnya</a>.</p></li><li><p>Anda perlu meracuni koneksi tepat sebelum browser korban mengimpor resource JavaScript, sehingga mungkin perlu beberapa percobaan.</p></li></ul></div></div>',
            1 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>
            <p>Di Burp Repeater (pastikan protokol HTTP/2 aktif di <strong>Request Attributes</strong> panel Inspector), selundupkan awalan di body dengan menyertakan header [[C0]]:</p>
            [[C1]]
        </li>
        <li><p>Setiap permintaan kedua membalas 404, membuktikan desync berhasil.</p></li>
        <li><p>Permintaan [[C2]] secara normal mengalihkan ke [[C3]].</p></li>
        <li>
            <p>Susun permintaan selundupan ke [[C4]] dengan header [[C5]] sembarang:</p>
            [[C6]]
        </li>
        <li><p>Kirim beberapa kali untuk memverifikasi pengalihan ke host sembarang berhasil.</p></li>
        <li><p>Di server eksploitasi, ubah path file ke [[C7]], masukkan payload [[C8]] di body, lalu simpan.</p></li>
        <li>
            <p>Di Burp Repeater, arahkan header [[C9]] pada permintaan selundupan ke server eksploitasi Anda:</p>
            [[C10]]
        </li>
        <li><p>Kirim beberapa kali hingga melihat pengalihan menuju server eksploitasi.</p></li>
        <li><p>Kirim ulang lalu tunggu sekitar 10 detik.</p></li>
        <li><p>Periksa access log server eksploitasi; adanya permintaan [[C11]] dari korban membuktikan serangan berhasil.</p></li>
        <li><p>Ulangi serangan hingga tepat mengenai impor resource JavaScript browser korban agar payload tereksekusi dan lab selesai.</p></li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '7d452275ba41f1aa0fc50b97490ae64b428d6401c7f193516bd15466490d8e01' => [
        'title' => 'HTTP/2 request smuggling melalui injeksi CRLF',
        'description_html' => '<p>Lab ini rentan terhadap request smuggling karena front-end men-downgrade permintaan HTTP/2 dan gagal menyaring header masuk dengan memadai.</p><p>Untuk menyelesaikan lab, gunakan vektor request smuggling khusus HTTP/2 untuk mengakses akun pengguna lain. Korban membuka beranda tiap 15 detik.</p><p>Lihat <a href="/burp/documentation/desktop/http2">dokumentasi HTTP/2 Burp</a> untuk detail fitur pengujian HTTP/2.</p><div class="component-solution expandable-container"><details><summary><h4><span class="icon-erlenmeyer"></span> Petunjuk</h4></summary><div class="content"><div><p>Untuk menyisipkan baris baru ke header HTTP/2, buka detail header di Inspector lalu tekan [[C0]] (tidak tersedia lewat klik dua kali langsung).</p></div></div></details></div><div class="component-solution expandable-container"><details><summary><h4><span class="icon-erlenmeyer"></span> Petunjuk</h4></summary><div class="content"><div><p>Kami membahas cara menangkap permintaan pengguna lain lewat request smuggling pada <a href="/web-security/request-smuggling/exploiting#capturing-other-users-requests">lab sebelumnya</a>.</p></div></div></details></div>',
        'sections' => [
            0 => '<div class="content"><div><p>Untuk menyisipkan baris baru ke header HTTP/2, buka detail header di Inspector lalu tekan [[C0]] (tidak tersedia lewat klik dua kali langsung).</p></div></div>',
            1 => '<div class="content"><div><p>Kami membahas cara menangkap permintaan pengguna lain lewat request smuggling pada <a href="/web-security/request-smuggling/exploiting#capturing-other-users-requests">lab sebelumnya</a>.</p></div></div>',
            2 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li><p>Di browser Burp, lakukan pencarian beberapa kali dan kirim permintaan [[C0]] ke Burp Repeater. Menghapus cookie sesi menghapus riwayat pencarian, membuktikan riwayat pencarian terikat ke cookie sesi.</p></li>
        <li><p>Di bagian <strong>Request Attributes</strong> panel Inspector, pastikan protokol disetel ke HTTP/2.</p></li>
        <li>
            <p>Lewat Inspector, tambahkan header sembarang berisi urutan [[C1]] diikuti header [[C2]]:</p>
            <p><strong>Name</strong></p>
            [[C3]]
            <p><strong>Value</strong></p>
            [[C4]]
        </li>
        <li>
            <p>Di body, coba selundupkan awalan berikut:</p>
            [[C5]]
            <p>Setiap permintaan kedua membalas 404, membuktikan awalan selundupan aktif.</p>
        </li>
        <li>
            <p>Ubah isi body permintaan menjadi:</p>
            [[C6]]
        </li>
        <li>
            <p>Kirim permintaan lalu langsung segarkan halaman di browser:</p>
            <ul>
                <li><p>Jika mendapat [[C7]], segarkan sekali lagi.</p></li>
                <li><p>Jika hasil pencarian menampilkan awal permintaan Anda sendiri pada [[C8]], kirim ulang serangan, tunggu 15 detik, baru segarkan halaman.</p></li>
            </ul>
        </li>
        <li><p>Periksa daftar pencarian terbaru; jika memuat permintaan [[C9]] (bukan [[C10]] Anda sendiri), salin cookie sesi korban di dalamnya.</p></li>
        <li><p>Di Burp Repeater, kirim permintaan beranda menggunakan cookie sesi curian tersebut untuk menyelesaikan lab.</p></li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    'd8e66f883c0efdd6cd4ccbbf6a654382ed2d13d5277bab587aa37904d5ec4211' => [
        'title' => 'HTTP/2 request splitting melalui injeksi CRLF',
        'description_html' => '<p>Lab ini rentan terhadap request smuggling karena front-end men-downgrade permintaan HTTP/2 dan gagal menyaring header masuk dengan memadai.</p><p>Untuk menyelesaikan lab, hapus pengguna [[C0]] dengan memanfaatkan <a href="/web-security/request-smuggling/advanced/response-queue-poisoning">response queue poisoning</a> guna membobol panel admin di [[C1]]. Admin login kira-kira tiap 10 detik.</p><p>Koneksi back-end di-reset setiap 10 permintaan sehingga Anda bisa mengirim permintaan normal untuk menyegarkannya.</p><div class="component-solution expandable-container"><details><summary><h4><span class="icon-erlenmeyer"></span> Petunjuk</h4></summary><div class="content"><div><p>Untuk menyisipkan baris baru ke header HTTP/2, buka detail header di Inspector lalu tekan [[C2]] (tidak tersedia lewat klik dua kali langsung).</p></div></div></details></div>',
        'sections' => [
            0 => '<div class="content"><div><p>Untuk menyisipkan baris baru ke header HTTP/2, buka detail header di Inspector lalu tekan [[C0]] (tidak tersedia lewat klik dua kali langsung).</p></div></div>',
            1 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li><p>Kirim [[C0]] ke Burp Repeater lalu setel protokol ke HTTP/2 di bagian <strong>Request Attributes</strong> panel Inspector.</p></li>
        <li><p>Ubah path menjadi endpoint tak ada seperti [[C1]] agar permintaan Anda selalu menerima 404 sehingga respons korban mudah dikenali.</p></li>
        <li>
            <p>Lewat Inspector, tambahkan header berisi urutan [[C2]] untuk memecah permintaan dan menyelundupkan permintaan kedua:</p>
            <p><strong>Name</strong></p>
            [[C3]]
            <p><strong>Value</strong></p>
            [[C4]]
        </li>
        <li><p>Kirim permintaan; saat front-end menutup blok header dengan [[C5]], awalan selundupan berubah menjadi permintaan penuh dan meracuni antrean respons.</p></li>
        <li>
            <p>Tunggu sekitar 5 detik lalu kirim permintaan lagi. Ulangi hingga menangkap respons 302 berisi cookie sesi admin.</p>
            <div class="highlightedarea">
                <h4>Catatan</h4>
                <p>Jika mendapat respons 200 namun belum melihat 302 setelah banyak percobaan, kirim 10 permintaan biasa untuk me-reset koneksi lalu coba lagi.</p>
            </div>
        </li>
        <li>
            <p>Salin cookie sesi tersebut dan kirim permintaan berikut:</p>
            [[C6]]
        </li>
        <li><p>Kirim berulang kali sampai menerima respons 200 berisi halaman panel admin.</p></li>
        <li><p>Temukan URL penghapusan [[C7]] ([[C8]]) lalu kirim permintaan ke path itu untuk menghapus [[C9]] dan menyelesaikan lab.</p></li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '4bad74c356692bbaab9602c955308f8a1b04cb866034f32286993566efc8cc66' => [
        'title' => '0.CL request smuggling',
        'description_html' => '<p>Lab ini rentan terhadap 0.CL request smuggling.</p><p>Carlos mengunjungi beranda tiap lima detik. Untuk menyelesaikan lab, eksploitasi kerentanan ini untuk mengeksekusi [[C0]] di browsernya.</p><div class="highlightedarea"><h4>Pengetahuan yang dibutuhkan</h4><p>Lab ini didasarkan pada kerentanan nyata temuan PortSwigger Research; lihat makalah <a href="https://portswigger.net/research/http1-must-die">HTTP/1.1 Must Die</a> oleh James Kettle.</p></div>',
        'sections' => [
            0 => '<div class="content"><div><h5>Siaran langsung bersama James Kettle</h5><div class="youtube-wrapper"><iframe src="https://www.youtube.com/embed/B7p8dIB7bFg?origin=https://portswigger.net&rel=0&start=267" allowfullscreen=""></iframe></div></div></div>',
        ],
    ],
    'd886863529b141ab150f460e95da5e785eaaada66785d60da132f5f0155352e6' => [
        'title' => 'CL.0 request smuggling',
        'description_html' => '<p>Lab ini rentan terhadap serangan CL.0 request smuggling. Server back-end mengabaikan header [[C0]] pada permintaan ke beberapa endpoint.</p><p>Untuk menyelesaikan lab, identifikasi endpoint rentan, selundupkan permintaan ke panel admin di [[C1]], lalu hapus pengguna [[C2]].</p><p>Lab ini didasarkan pada riset <a href="https://portswigger.net/research/browser-powered-desync-attacks#cl.0">Browser-Powered Desync Attacks: A New Frontier in HTTP Request Smuggling</a>.</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <p><strong>Menguji endpoint rentan</strong></p>
    <ol>
        <li><p>Dari <strong>Proxy &gt; HTTP history</strong>, kirim permintaan [[C0]] dua kali ke Burp Repeater.</p></li>
        <li><p>Masukkan kedua tab ke dalam satu grup baru.</p></li>
        <li><p>Ubah permintaan pertama menjadi [[C1]] (klik kanan lalu pilih <strong>Change request method</strong>).</p></li>
        <li>
            <p>Tambahkan awalan permintaan selundupan acak di bagian body:</p>
            [[C2]]
        </li>
        <li><p>Arahkan path permintaan [[C3]] pertama ke endpoint kandidat yang ingin diuji.</p></li>
        <li><p>Ubah mode kirim di samping tombol <strong>Send</strong> ke <strong>Send group in sequence (single connection)</strong>.</p></li>
        <li><p>Ubah header [[C4]] permintaan pertama menjadi [[C5]].</p></li>
        <li>
            <p>Kirim rangkaian permintaan dan periksa responsnya:</p>
            <ul>
                <li><p>Jika permintaan kedua dibalas normal, endpoint tidak rentan.</p></li>
                <li><p>Jika permintaan kedua menerima 404 sesuai awalan selundupan, back-end mengabaikan [[C6]].</p></li>
            </ul>
        </li>
        <li><p>Temukan bahwa file statis di bawah [[C7]], seperti [[C8]], dapat memicu desync CL.0.</p></li>
    </ol>
    <p><strong>Eksploitasi</strong></p>
    <ol>
        <li><p>Di Burp Repeater, ubah path awalan selundupan ke [[C9]].</p></li>
        <li><p>Kirim berurutan lagi dan amati permintaan kedua berhasil mengakses panel admin.</p></li>
        <li>
            <p>Selundupkan permintaan ke [[C10]] untuk menyelesaikan lab:</p>
            [[C11]]
        </li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    'ebc97abbe886e96facc0aaee856f55e2a45d4784f5d9025ffa5e994b7d8bc2bb' => [
        'title' => 'HTTP request smuggling, kerentanan CL.TE dasar',
        'description_html' => '<p>Lab ini melibatkan server front-end dan back-end, dan front-end tidak mendukung chunked encoding serta menolak metode selain GET atau POST.</p><p>Untuk menyelesaikan lab, selundupkan permintaan agar permintaan berikutnya di back-end terbaca memakai metode [[C0]].</p><div class="highlightedarea"><h4>Catatan</h4><p>Meski lab ini mendukung HTTP/2, solusi yang dimaksud memerlukan HTTP/1 yang dapat diubah di Burp Repeater lewat bagian <strong>Request attributes</strong> pada panel <strong>Inspector</strong>.</p></div><div class="component-labinstructions"><h4>Tip</h4><p>Ekstensi <a href="https://portswigger.net/blog/http-desync-attacks-request-smuggling-reborn#demo">HTTP Request Smuggler</a> di BApp Store membantu menghitung panjang konten.</p></div>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <p>Kirim permintaan berikut dua kali di Burp Repeater:</p>
    [[C0]]
    <p>Respons kedua akan berbunyi: [[C1]].</p>
</div></div>
LABHTML,
        ],
    ],
    'a6aecbc5c1d7f95e7512642a6f11fcb8c5d568f7cd57ae0ce60a08c7140583b3' => [
        'title' => 'HTTP request smuggling, kerentanan TE.CL dasar',
        'description_html' => '<p>Lab ini melibatkan server front-end dan back-end, dan back-end tidak mendukung chunked encoding. Front-end menolak metode selain GET atau POST.</p><p>Untuk menyelesaikan lab, selundupkan permintaan agar permintaan berikutnya di back-end terbaca memakai metode [[C0]].</p><div class="highlightedarea"><h4>Catatan</h4><p>Meski lab ini mendukung HTTP/2, solusi yang dimaksud memerlukan HTTP/1 yang dapat diubah di Burp Repeater lewat bagian <strong>Request attributes</strong> pada panel <strong>Inspector</strong>.</p></div><div class="component-labinstructions"><h4>Tip</h4><p>Ekstensi <a href="https://portswigger.net/blog/http-desync-attacks-request-smuggling-reborn#demo">HTTP Request Smuggler</a> di BApp Store membantu menghitung panjang konten.</p></div>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <p>Di Burp Suite, buka menu Repeater dan pastikan opsi "Update Content-Length" tidak dicentang.</p>
    <p>Kirim permintaan berikut dua kali di Burp Repeater:</p>
    [[C0]]
    <div class="highlightedarea">
        <h4>Catatan</h4>
        <p>Sertakan urutan baris baru [[C1]] setelah angka [[C2]] terakhir.</p>
    </div>
    <p>Respons kedua akan berbunyi: [[C3]].</p>
</div></div>
LABHTML,
        ],
    ],
    '417947bec9fe621dfdc11f4d622cef72b0021a6d872aa83cca70aaf532b4b592' => [
        'title' => 'HTTP request smuggling, menyamarkan header TE',
        'description_html' => '<p>Lab ini melibatkan server front-end dan back-end yang menangani header duplikat secara berbeda. Front-end menolak metode selain GET atau POST.</p><p>Untuk menyelesaikan lab, selundupkan permintaan agar permintaan berikutnya di back-end terbaca memakai metode [[C0]].</p><div class="highlightedarea"><h4>Catatan</h4><p>Meski lab ini mendukung HTTP/2, solusi yang dimaksud memerlukan HTTP/1 yang dapat diubah di Burp Repeater lewat bagian <strong>Request attributes</strong> pada panel <strong>Inspector</strong>.</p></div><div class="component-labinstructions"><h4>Tip</h4><p>Ekstensi <a href="https://portswigger.net/blog/http-desync-attacks-request-smuggling-reborn#demo">HTTP Request Smuggler</a> di BApp Store membantu menghitung panjang konten.</p></div>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <p>Di Burp Suite, buka menu Repeater dan pastikan opsi "Update Content-Length" tidak dicentang.</p>
    <p>Kirim permintaan berikut dua kali di Burp Repeater:</p>
    [[C0]]
    <div class="highlightedarea">
        <h4>Catatan</h4>
        <p>Sertakan urutan baris baru [[C1]] setelah angka [[C2]] terakhir.</p>
    </div>
    <p>Respons kedua akan berbunyi: [[C3]].</p>
</div></div>
LABHTML,
        ],
    ],
    '25d1dc76d4c49c69b12c03e8e115ea2c4ecce7048480403afd87ae4fa5196c6a' => [
        'title' => 'Mengeksploitasi HTTP request smuggling untuk melakukan web cache poisoning',
        'description_html' => '<p>Lab ini melibatkan server front-end dan back-end, dan front-end tidak mendukung chunked encoding serta menyimpan cache untuk respons tertentu.</p><p>Untuk menyelesaikan lab, lancarkan serangan request smuggling untuk meracuni cache agar permintaan file JavaScript berikutnya dialihkan ke server eksploitasi dan mengeksekusi alert [[C0]].</p><div class="highlightedarea"><h4>Catatan</h4><ul><li>Meski lab ini mendukung HTTP/2, solusi yang dimaksud memerlukan HTTP/1 di Burp Repeater lewat bagian <strong>Request attributes</strong> pada panel <strong>Inspector</strong>.</li><li>Pengguna korban berkunjung tiap beberapa permintaan POST Anda, sehingga serangan mungkin perlu diulang.</li></ul></div><div class="component-labinstructions"><h4>Tip</h4><p>Ekstensi <a href="https://portswigger.net/blog/http-desync-attacks-request-smuggling-reborn#demo">HTTP Request Smuggler</a> membantu mengatur panjang konten.</p></div>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>
            <p>Buka sebuah postingan blog, klik "Next post", dan coba selundupkan permintaan tersebut memakai header Host berbeda:</p>
            [[C0]]
        </li>
        <li>Amati permintaan ini membuat permintaan berikutnya dialihkan ke [[C1]] di host pilihan Anda.</li>
        <li>
            <p>Buka server eksploitasi dan buat file bertipe [[C2]] di [[C3]] dengan isi:</p>
            [[C4]]
        </li>
        <li>
            <p>Racuni cache server dengan mengulang serangan memakai hostname server eksploitasi Anda:</p>
            [[C5]]
        </li>
        <li>
            <p>Lalu minta [[C6]] dengan mengirim permintaan berikut:</p>
            [[C7]]
            <p>Jika berhasil, respons untuk [[C8]] berupa pengalihan ke server eksploitasi Anda.</p>
        </li>
        <li>Ulangi permintaan ke [[C9]] beberapa kali untuk memastikan pengalihan terus tersaji dari cache.</li>
    </ol>
    <div class="highlightedarea">
        <h4>Catatan</h4>
        <p>Anda mungkin perlu mengulang proses POST/GET beberapa kali hingga serangan berhasil.</p>
    </div>
</div></div>
LABHTML,
        ],
    ],
    '2beac929d831e232f42ba851c86ef44ab27d908abcc5d78ed79a5cbc6c710a13' => [
        'title' => 'Mengeksploitasi HTTP request smuggling untuk melakukan web cache deception',
        'description_html' => '<p>Lab ini melibatkan server front-end dan back-end, dan front-end tidak mendukung chunked encoding serta menyimpan cache untuk resource statis.</p><p>Untuk menyelesaikan lab, selundupkan permintaan agar API key pengguna berikutnya tersimpan di cache, lalu ambil dan kirimkan sebagai solusi. Tunggu 30 detik setelah mengakses lab sebelum memancing korban.</p><p>Anda dapat masuk ke akun Anda menggunakan kredensial berikut: [[C0]]</p><div class="highlightedarea"><h4>Catatan</h4><ul><li>Meski lab ini mendukung HTTP/2, solusi yang dimaksud memerlukan HTTP/1 di Burp Repeater lewat bagian <strong>Request attributes</strong> pada panel <strong>Inspector</strong>.</li><li>Pengguna korban aktif setelah beberapa permintaan POST Anda, sehingga serangan mungkin perlu diulang.</li></ul></div><div class="component-labinstructions"><h4>Tip</h4><p>Ekstensi <a href="https://portswigger.net/blog/http-desync-attacks-request-smuggling-reborn#demo">HTTP Request Smuggler</a> membantu mengatur panjang konten.</p></div>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Login ke akun Anda dan buka halaman akun pengguna.</li>
        <li>Amati bahwa respons tidak menyertakan header anti-cache.</li>
        <li>
            <p>Selundupkan permintaan untuk mengambil API key:</p>
            [[C0]]
        </li>
        <li>Ulangi permintaan ini beberapa kali, lalu buka beranda di jendela browser incognito.</li>
        <li>Gunakan fitur Search di menu Burp untuk mencari frasa "Your API Key" pada resource statis (ulangi permintaan POST dan muat ulang bila belum muncul).</li>
        <li>Kirimkan API key korban sebagai solusi lab.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '2c96a65b32a69545e9a98af5520a14bd4b397c70dd6b643c34c46352310b2f9b' => [
        'title' => 'Melewati kontrol akses melalui HTTP/2 request tunnelling',
        'description_html' => '<p>Lab ini rentan terhadap request smuggling karena front-end men-downgrade permintaan HTTP/2 dan gagal menyaring nama header masuk secara memadai. Untuk menyelesaikan lab, akses panel admin di [[C0]] sebagai [[C1]] lalu hapus [[C2]].</p><p>Front-end tidak memakai ulang koneksi back-end, sehingga serangan diarahkan memakai teknik <a href="/web-security/request-smuggling/advanced/request-tunnelling">request tunnelling</a>.</p><div class="component-solution expandable-container"><details><summary><h4><span class="icon-erlenmeyer"></span> Petunjuk</h4></summary><div class="content"><div><p>Server front-end menambahkan rangkaian <a href="/web-security/request-smuggling/exploiting#bypassing-client-authentication">header autentikasi klien</a> pada setiap permintaan masuk; Anda perlu membocorkannya.</p></div></div></details></div>',
        'sections' => [
            0 => '<div class="content"><div><p>Server front-end menambahkan rangkaian <a href="/web-security/request-smuggling/exploiting#bypassing-client-authentication">header autentikasi klien</a> pada setiap permintaan masuk; Anda perlu membocorkannya.</p></div></div>',
            1 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li><p>Kirim permintaan [[C0]] ke Burp Repeater dan pastikan protokol disetel ke HTTP/2 di bagian <strong>Request Attributes</strong> panel Inspector.</p></li>
        <li>
            <p>Lewat Inspector, tambahkan header sembarang dengan menyusupkan header [[C1]] di dalam field nama:</p>
            <p><strong>Name</strong></p>
            [[C2]]
            <p><strong>Value</strong></p>
            [[C3]]
            <p>Respons galat membuktikan server memproses host suntikan tersebut dan rentan CRLF injection di nama header.</p>
        </li>
        <li><p>Fitur pencarian situs memantulkan query ke respons. Kirim permintaan [[C4]] terbaru ke Repeater dan ubah protokolnya ke HTTP/2.</p></li>
        <li><p>Ubah metodenya ke [[C6]] lewat "Change request method" dan pastikan parameter [[C5]] tetap berfungsi di body.</p></li>
        <li>
            <p>Tambahkan header sembarang untuk menyisipkan header [[C7]] besar dan parameter [[C8]] tambahan di field nama:</p>
            <p><strong>Name</strong></p>
            [[C9]]
            <p><strong>Value</strong></p>
            [[C10]]
        </li>
        <li><p>Di body utama permintaan, perpanjang karakter parameter [[C11]] asli hingga melebihi nilai [[C12]] selundupan tersebut.</p></li>
        <li>
            <p>Kirim permintaan dan amati pantulan header yang ditambahkan oleh front-end:</p>
            [[C13]]
            <p>Ini merupakan header <a href="/web-security/request-smuggling/exploiting#bypassing-client-authentication">autentikasi klien</a> internal.</p>
        </li>
        <li>
            <p>Ubah metode permintaan menjadi [[C14]] lalu selundupkan permintaan ke panel admin dengan ketiga header autentikasi tersebut diperbarui:</p>
            <p><strong>Name</strong></p>
            [[C15]]
            <p><strong>Value</strong></p>
            [[C16]]
        </li>
        <li><p>Kirim permintaan dan amati galat ketidakcukupan byte karena [[C17]] halaman tujuan lebih panjang dari respons yang diterowongkan.</p></li>
        <li><p>Ubah pseudo-header [[C18]] ke endpoint berespons lebih pendek, misalnya [[C19]].</p></li>
        <li><p>Kirim ulang; Anda akan melihat awal respons HTTP/1.1 hasil terowongan di badan respons utama.</p></li>
        <li><p>Temukan URL penghapusan [[C20]] ([[C21]]) lalu perbarui path terowongan untuk menghapus [[C22]] dan menyelesaikan lab (abaikan pesan galat respons akhir).</p></li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '97e46bf5f67da1e25ef00c1a6414642112874ba9122dc3608c709510defce4f1' => [
        'title' => 'Web cache poisoning melalui HTTP/2 request tunnelling',
        'description_html' => '<p>Lab ini rentan terhadap request smuggling karena front-end men-downgrade permintaan HTTP/2 dan tidak menyaring header masuk secara konsisten.</p><p>Untuk menyelesaikan lab, racuni cache agar saat korban mengunjungi beranda tiap 15 detik, browsernya mengeksekusi [[C0]].</p><p>Front-end tidak memakai ulang koneksi back-end, sehingga serangan memakai teknik <a href="/web-security/request-smuggling/advanced/request-tunnelling">request tunnelling</a>.</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li><p>Kirim [[C0]] ke Burp Repeater dan pastikan protokol HTTP/2 aktif di panel Inspector bagian <strong>Request Attributes</strong>.</p></li>
        <li>
            <p>Lewat Inspector, coba selundupkan header di pseudo-header [[C1]] sambil menjaga validitas baris permintaan:</p>
            <p><strong>Name</strong></p>
            [[C2]]
            <p><strong>Value</strong></p>
            [[C3]]
            <p>Respons normal tetap diterima, membuktikan injeksi melalui [[C4]] berhasil.</p>
        </li>
        <li>
            <p>Ubah metode permintaan menjadi [[C5]] dan gunakan pseudo-header [[C6]] untuk menerowongkan permintaan kedua:</p>
            <p><strong>Name</strong></p>
            [[C7]]
            <p><strong>Value</strong></p>
            [[C8]]
            <p>Header [[C9]] menjaga validitas permintaan utama, sementara header penutup sembarang menyerap akhiran [[C10]] dari front-end.</p>
        </li>
        <li><p>Kirim permintaan dan pastikan respons terowongan terlihat (ganti [[C11]] bila perlu).</p></li>
        <li><p>Hapus isi tambahan selain path dan parameter cachebuster pada pseudo-header [[C12]] lalu kirim ulang untuk memverifikasi respons terowongan tersimpan di cache.</p></li>
        <li><p>Cari gadget pemantul payload XSS tanpa encoding: permintaan [[C13]] mengalihkan ke [[C14]].</p></li>
        <li>
            <p>Terowongkan permintaan ini via pseudo-header [[C15]] dengan menyisipkan payload XSS di query string:</p>
            <p><strong>Name</strong></p>
            [[C16]]
            <p><strong>Value</strong></p>
            [[C17]]
            <p>Permintaan mengalami timeout karena [[C18]] respons utama lebih panjang dari respons terowongan.</p>
        </li>
        <li><p>Periksa [[C19]] respons normal [[C20]] dari proxy history, lalu tambahkan padding acak setelah tag penutup [[C21]] agar panjang respons terowongan melampaui batas [[C22]] tersebut.</p></li>
        <li><p>Kirim permintaan dan pastikan payload tercermin tanpa timeout.</p></li>
        <li><p>Selagi masih di cache, kunjungi beranda memakai parameter cachebuster yang sama dan pastikan [[C23]] berjalan.</p></li>
        <li><p>Hapus cachebuster di Inspector lalu kirim ulang setiap 5 detik untuk meracuni cache utama sampai korban berkunjung dan lab selesai.</p></li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    'c7e1e3ecc45431f9694ade69d2c269fdfedcff87aa2cb4525dd503090d7d467e' => [
        'title' => 'Client-side desync',
        'description_html' => '<p>Lab ini rentan terhadap serangan client-side desync karena server mengabaikan header [[C0]] pada permintaan ke beberapa endpoint, yang dapat dieksploitasi untuk membocorkan cookie sesi browser korban.</p><p>Untuk menyelesaikan lab:</p><ol><li><p>Temukan vektor client-side desync di Burp dan pastikan dapat direplikasi di browser.</p></li><li><p>Identifikasi gadget untuk menyimpan data teks di dalam aplikasi.</p></li><li><p>Gabungkan keduanya agar browser korban mengirim rangkaian permintaan lintas domain yang membocorkan cookie sesinya.</p></li><li><p>Gunakan cookie curian itu untuk masuk ke akun korban.</p></li></ol><div class="component-solution expandable-container"><details><summary><h4><span class="icon-erlenmeyer"></span> Petunjuk</h4></summary><div class="content"><div><p>Lab ini merupakan variasi sisi klien dari teknik pada <a href="/web-security/request-smuggling/exploiting#capturing-other-users-requests">lab request smuggling sebelumnya</a>.</p></div></div></details></div><p>Lab ini didasarkan pada riset <a href="https://portswigger.net/research/browser-powered-desync-attacks#csd">Browser-Powered Desync Attacks: A New Frontier in HTTP Request Smuggling</a>.</p>',
        'sections' => [
            0 => '<div class="content"><div><p>Lab ini merupakan variasi sisi klien dari teknik pada <a href="/web-security/request-smuggling/exploiting#capturing-other-users-requests">lab request smuggling sebelumnya</a>.</p></div></div>',
            1 => <<<'LABHTML'
<div class="content"><div>
    <p><strong>Mengidentifikasi endpoint rentan</strong></p>
    <ol>
        <li><p>Amati permintaan ke [[C0]] dialihkan ke [[C1]].</p></li>
        <li><p>Kirim permintaan [[C2]] ke Burp Repeater.</p></li>
        <li><p>Matikan opsi <strong>Update Content-Length</strong> di pengaturan tab Repeater.</p></li>
        <li><p>Ubah permintaan ke metode [[C3]] via <strong>Change request method</strong>.</p></li>
        <li><p>Setel [[C4]] menjadi 1 atau lebih sambil mengosongkan body.</p></li>
        <li><p>Kirim permintaan; server langsung merespons tanpa menunggu body, membuktikan [[C5]] diabaikan.</p></li>
    </ol>
    <p><strong>Mengonfirmasi vektor desync di Burp</strong></p>
    <ol>
        <li><p>Aktifkan kembali opsi <strong>Update Content-Length</strong>.</p></li>
        <li>
            <p>Tambahkan awalan permintaan selundupan acak di body:</p>
            [[C6]]
        </li>
        <li><p>Tambahkan tab permintaan normal [[C7]] ke dalam grup tab setelah permintaan berbahaya tadi.</p></li>
        <li><p>Ubah mode kirim menjadi <strong>Send group in sequence (single connection)</strong>.</p></li>
        <li><p>Ubah header [[C8]] permintaan pertama ke [[C9]].</p></li>
        <li><p>Kirim berurutan: permintaan kedua menerima 404 sesuai awalan selundupan, membuktikan desync terjadi.</p></li>
    </ol>
    <p><strong>Mereplikasi vektor desync di browser</strong></p>
    <ol>
        <li><p>Buka instance Chrome terpisah yang <strong>tidak</strong> melalui proxy Burp.</p></li>
        <li><p>Buka server eksploitasi.</p></li>
        <li><p>Buka DevTools browser tab <strong>Network</strong>.</p></li>
        <li><p>Centang <strong>Preserve log</strong> dan bersihkan log lama.</p></li>
        <li>
            <p>Buka tab <strong>Console</strong> dan replikasi serangan memakai API [[C10]]:</p>
            [[C11]]
            <p>Galat CORS sengaja dipicu untuk mencegah pengalihan diikuti agar metode [[C12]] dapat mengirim permintaan kedua di koneksi sama.</p>
        </li>
        <li>
            <p>Di tab <strong>Network</strong> akan tampak dua permintaan:</p>
            <ul>
                <li><p>Permintaan utama yang memicu galat CORS.</p></li>
                <li><p>Permintaan ke beranda yang menerima respons 404.</p></li>
            </ul>
            <p>Ini memastikan vektor desync dapat dipicu dari browser.</p>
        </li>
    </ol>
    <p><strong>Mengidentifikasi gadget yang dapat dieksploitasi</strong></p>
    <ol>
        <li><p>Kembali di browser Burp, buka salah satu postingan blog yang memiliki fitur komentar.</p></li>
        <li>
            <p>Dari <strong>Proxy &gt; HTTP history</strong> pada permintaan [[C13]], catat detail berikut:</p>
            <ul>
                <li><p>[[C14]] dari query string</p></li>
                <li><p>Cookie [[C15]] dan [[C16]] Anda</p></li>
                <li><p>Token [[C17]]</p></li>
            </ul>
        </li>
        <li>
            <p>Di Burp Repeater, coba tangkap permintaan Anda sendiri ke komentar memakai vektor desync:</p>
            <p>Permintaan 1:</p>
            [[C18]]
            <p>Permintaan 2:</p>
            [[C19]]
            <p>Jumlah byte tangkapan harus lebih besar dari body awalan [[C20]], tetapi lebih kecil dari total panjang permintaan tindak lanjut.</p>
        </li>
        <li><p>Segarkan postingan blog dan pastikan awal permintaan [[C21]] tampil di komentar.</p></li>
    </ol>
    <p><strong>Mereplikasi serangan di browser</strong></p>
    <ol>
        <li><p>Buka Chrome terpisah yang tidak melewati Burp.</p></li>
        <li><p>Buka server eksploitasi.</p></li>
        <li><p>Buka DevTools tab <strong>Network</strong>.</p></li>
        <li><p>Pastikan <strong>Preserve log</strong> aktif.</p></li>
        <li>
            <p>Jalankan eksploitasi berikut di tab <strong>Console</strong> memakai API [[C22]]:</p>
            [[C23]]
        </li>
        <li>
            <p>Di tab <strong>Network</strong> akan muncul tiga permintaan:</p>
            <ul>
                <li><p>Permintaan awal yang memicu galat CORS.</p></li>
                <li><p>Permintaan ke [[C24]] yang dialihkan ke konfirmasi komentar.</p></li>
                <li><p>Permintaan halaman konfirmasi komentar.</p></li>
            </ul>
        </li>
        <li><p>Segarkan postingan blog untuk melihat awal permintaan [[C25]] Anda tersimpan lewat serangan browser.</p></li>
    </ol>
    <p><strong>Eksploitasi</strong></p>
    <ol>
        <li><p>Buka server eksploitasi.</p></li>
        <li><p>Tempelkan skrip yang teruji tadi ke panel <strong>Body</strong>.</p></li>
        <li><p>Bungkus skrip dengan tag HTML &lt;script&gt;.</p></li>
        <li><p>Simpan eksploitasi dan klik <strong>Deliver to victim</strong>.</p></li>
        <li><p>Segarkan postingan blog untuk memastikan awal permintaan korban tertangkap.</p></li>
        <li><p>Sesuaikan nilai [[C26]] pada [[C27]] bersarang hingga seluruh cookie sesi korban tampak di komentar.</p></li>
        <li><p>Di Burp Repeater, minta [[C28]] memakai cookie curian tersebut untuk menyelesaikan lab.</p></li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '15658ad1d00ccc9b99c99507c53dd7ec3472c9a0102ad3894e6c713f472630c8' => [
        'title' => 'Pause-based request smuggling sisi server',
        'description_html' => '<p>Lab ini rentan terhadap pause-based server-side request smuggling. Front-end mengalirkan permintaan ke back-end, dan back-end tidak menutup koneksi setelah timeout pada beberapa endpoint.</p><p>Untuk menyelesaikan lab, identifikasi vektor pause-based CL.0 desync, selundupkan permintaan ke panel admin di [[C0]], lalu hapus pengguna [[C1]].</p><div class="highlightedarea"><h4>Catatan</h4><p>Anda wajib memakai ekstensi <a href="https://portswigger.net/bappstore/9abaa233088242e8be252cd4ff534988">Turbo Intruder</a> untuk mengeksploitasi lab ini.</p></div><p>Lab ini didasarkan pada riset <a href="https://portswigger.net/research/browser-powered-desync-attacks#pause">Browser-Powered Desync Attacks: A New Frontier in HTTP Request Smuggling</a>.</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <p><strong>Mengidentifikasi vektor desync</strong></p>
    <ol>
        <li><p>Di Burp, header respons [[C0]] mengungkap versi [[C1]] yang berpotensi rentan pause-based CL.0 pada endpoint pengalihan tingkat server.</p></li>
        <li><p>Di Burp Repeater, coba minta direktori valid tanpa garis miring akhir, misalnya [[C2]], yang mengalihkan ke [[C3]].</p></li>
        <li><p>Klik kanan permintaan lalu pilih <strong>Extensions &gt; Turbo Intruder &gt; Send to Turbo Intruder</strong>.</p></li>
        <li><p>Ubah permintaan ke [[C4]] lewat <strong>Change request method</strong>.</p></li>
        <li><p>Ubah header [[C5]] ke [[C6]].</p></li>
        <li>
            <p>Masukkan permintaan [[C7]] lengkap ke dalam body permintaan utama:</p>
            [[C8]]
        </li>
        <li>
            <p>Di editor Python Turbo Intruder, masukkan skrip berikut yang menjeda selama 61 detik setelah [[C9]] di akhir header:</p>
            [[C10]]
        </li>
        <li>
            <p>Jalankan serangan dan tunggu 61 detik hingga muncul dua entri hasil:</p>
            <ul>
                <li><p>Entri pertama dari [[C11]] yang mengalihkan ke [[C12]].</p></li>
                <li><p>Entri kedua merupakan respons [[C13]] yang membuktikan kerentanan pause-based CL.0.</p></li>
            </ul>
        </li>
    </ol>
    <p><strong>Eksploitasi</strong></p>
    <ol>
        <li><p>Kembali ke konfigurasi Turbo Intruder, ubah header [[C14]] pada permintaan selundupan menjadi [[C15]], lalu jalankan ulang serangan.</p></li>
        <li><p>Setelah 61 detik, Anda berhasil menerima respons panel admin.</p></li>
        <li>
            <p>Catat detail formulir hapus pengguna dari respons tersebut:</p>
            <ul>
                <li><p>Atribut action ([[C16]]).</p></li>
                <li><p>Nama input ([[C17]]).</p></li>
                <li><p>Token [[C18]].</p></li>
            </ul>
        </li>
        <li>
            <p>Replikasi permintaan penghapusan pengguna dalam permintaan selundupan:</p>
            [[C19]]
        </li>
        <li>
            <p>Agar jeda tidak terpicu pada dua kemunculan [[C20]], spesifikkan argumen [[C21]] ke akhir blok header pertama saja:</p>
            [[C22]]
        </li>
        <li><p>Jalankan serangan.</p></li>
        <li><p>Setelah 61 detik, lab akan terselesaikan.</p></li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
];
