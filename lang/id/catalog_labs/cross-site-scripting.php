<?php

return [
    '9e3414ee887ebaed9f7ed25b58dd639959bb28a3b926f53c831c1d86e03d8813' => [
        'title' => 'Reflected XSS ke konteks HTML tanpa encoding apa pun',
        'description_html' => '<p>Lab ini memiliki kerentanan reflected cross-site scripting sederhana pada fitur pencarian.</p><p>Untuk menyelesaikan lab, lancarkan serangan cross-site scripting yang memanggil fungsi [[C0]].</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>
            <p>Salin dan tempelkan payload berikut ke kotak pencarian:</p>
            [[C0]]
        </li>
        <li>Klik "Search".</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '09e0bee59e32e92a78e614589793110f95c397459ed0ab96a3dbaf100e3b7cde' => [
        'title' => 'Stored XSS ke konteks HTML tanpa encoding apa pun',
        'description_html' => '<p>Lab ini memiliki kerentanan stored cross-site scripting pada fitur komentar.</p><p>Untuk menyelesaikan lab, kirim komentar yang memanggil fungsi [[C0]] saat postingan blog dibuka.</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>
            <p>Masukkan payload berikut ke kotak komentar:</p>
            [[C0]]
        </li>
        <li>Isi nama, email, dan situs web.</li>
        <li>Klik "Post comment".</li>
        <li>Kembali ke halaman blog.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '6127df9244c9acedc241085d647719a0d9975c5af692444a9c913566fd2fd88b' => [
        'title' => 'DOM XSS di sink document.write memakai sumber location.search',
        'description_html' => '<p>Lab ini memiliki kerentanan DOM-based cross-site scripting pada fitur pelacakan kata kunci pencarian, menggunakan fungsi JavaScript [[C0]] untuk menulis data ke halaman. Fungsi [[C1]] dipanggil dengan data dari [[C2]] yang dapat Anda kendalikan lewat URL.</p><p>Untuk menyelesaikan lab, lancarkan serangan cross-site scripting yang memanggil fungsi [[C3]].</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Masukkan string alfanumerik acak ke kotak pencarian.</li>
        <li>Klik kanan dan periksa elemen untuk melihat bahwa string acak tersebut disisipkan di dalam atribut [[C0]].</li>
        <li>
            <p>Keluar dari atribut [[C1]] dengan mencari payload berikut:</p>
            [[C2]]
        </li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '643e053e185d7855c6c7ea780bb082fa545fdd40e72aabc79f1742eb2ad07914' => [
        'title' => 'DOM XSS di sink innerHTML memakai sumber location.search',
        'description_html' => '<p>Lab ini memiliki kerentanan DOM-based cross-site scripting pada fitur pencarian blog, menggunakan penugasan [[C0]] yang mengubah isi HTML elemen [[C1]] memakai data dari [[C2]].</p><p>Untuk menyelesaikan lab, lancarkan serangan cross-site scripting yang memanggil fungsi [[C3]].</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>
            <p>Masukkan payload berikut ke kotak pencarian:</p>
            [[C0]]
        </li>
        <li>Klik "Search".</li>
    </ol>
    <p>Nilai atribut [[C1]] tidak valid dan memicu galat, sehingga event handler [[C2]] berjalan lalu memanggil fungsi [[C3]] setiap kali halaman dimuat.</p>
</div></div>
LABHTML,
        ],
    ],
    'fde8784b9c158cac28b9d1a29d6331d2a28cf38742e1c59454be9a1fe37cff54' => [
        'title' => 'DOM XSS di sink atribut href jQuery memakai sumber location.search',
        'description_html' => '<p>Lab ini memiliki kerentanan DOM-based cross-site scripting pada halaman kirim masukan. Halaman memakai fungsi selektor [[C0]] jQuery untuk menemukan elemen anchor dan mengubah atribut [[C1]]-nya menggunakan data dari [[C2]].</p><p>Untuk menyelesaikan lab, buat tautan "back" menampilkan alert berisi [[C3]].</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Pada halaman Submit feedback, ubah parameter query [[C0]] menjadi [[C1]] diikuti string alfanumerik acak.</li>
        <li>Klik kanan dan periksa elemen untuk memastikan string acak Anda ditempatkan di dalam atribut [[C2]].</li>
        <li>
            <p>Ubah [[C3]] menjadi:</p>
            [[C4]]
            <p>Tekan Enter lalu klik "back".</p>
        </li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    'b73aad4efa87dfe5458720e5a4713f2b416825e550dc9d161f58635db7a48dcd' => [
        'title' => 'DOM XSS di sink selektor jQuery menggunakan event hashchange',
        'description_html' => '<p>Lab ini memiliki kerentanan DOM-based cross-site scripting pada beranda. Halaman memakai fungsi selektor [[C0]] jQuery untuk menggulir otomatis ke postingan yang judulnya dikirim via properti [[C1]].</p><p>Untuk menyelesaikan lab, kirimkan eksploitasi ke korban yang memanggil fungsi [[C2]] di browsernya.</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Amati kode rentan pada beranda menggunakan Burp atau DevTools browser.</li>
        <li>Buka server eksploitasi dari banner lab.</li>
        <li>
            <p>Di bagian <strong>Body</strong>, tambahkan [[C0]] berbahaya berikut:</p>
            [[C1]]
        </li>
        <li>Simpan eksploitasi lalu klik <strong>View exploit</strong> untuk memastikan fungsi [[C2]] terpanggil.</li>
        <li>Kembali ke server eksploitasi lalu klik <strong>Deliver to victim</strong> untuk menyelesaikan lab.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '8db2d4d5d579849ca64098e4415c35888c0af17e8f9b0849462456d7b14b8087' => [
        'title' => 'Reflected XSS ke atribut dengan tanda kurung sudut di-encode HTML',
        'description_html' => '<p>Lab ini memiliki kerentanan reflected cross-site scripting pada fitur pencarian blog, dengan tanda kurung sudut di-encode HTML. Untuk menyelesaikan lab, lakukan serangan cross-site scripting yang menyuntikkan atribut dan memanggil fungsi [[C0]].</p><div class="component-solution expandable-container"><details><summary><h4><span class="icon-erlenmeyer"></span> Petunjuk</h4></summary><div class="content"><div><p>Mampu memicu [[C1]] di browser sendiri tidak selalu berarti otomatis berjalan di korban; Anda mungkin perlu mencoba beberapa atribut berbeda hingga tereksekusi di browser korban.</p></div></div></details></div>',
        'sections' => [
            0 => '<div class="content"><div><p>Mampu memicu [[C0]] di browser sendiri tidak selalu berarti otomatis berjalan di korban; Anda mungkin perlu mencoba beberapa atribut berbeda hingga tereksekusi di browser korban.</p></div></div>',
            1 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Kirim string alfanumerik acak ke kotak pencarian, intersep permintaannya dengan Burp Suite, lalu kirim ke Burp Repeater.</li>
        <li>Amati string acak Anda tercermin di dalam atribut bertanda kutip.</li>
        <li>
            <p>Ganti input Anda dengan payload berikut untuk keluar dari atribut dan menyuntikkan event handler:</p>
            [[C0]]
        </li>
        <li>Uji dengan klik kanan "Copy URL" lalu buka di browser; mengarahkan kursor ke elemen terinjeksi akan memicu alert.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '837b80f7b6cb679ddb307a046af6df7c851399e3337726434ac2681cba79f639' => [
        'title' => 'Stored XSS ke atribut href anchor dengan tanda kutip ganda di-encode HTML',
        'description_html' => '<p>Lab ini memiliki kerentanan stored cross-site scripting pada fitur komentar. Untuk menyelesaikan lab, kirim komentar yang memanggil fungsi [[C0]] saat nama penulis komentar diklik.</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Kirim komentar dengan string acak pada kolom "Website", lalu intersep permintaannya dan kirim ke Burp Repeater.</li>
        <li>Minta ulang halaman postingan di browser dan kirim permintaan tersebut ke Burp Repeater.</li>
        <li>Amati string acak pada tab Repeater kedua tercermin di dalam atribut [[C0]] elemen anchor.</li>
        <li>
            <p>Ulangi prosesnya dengan mengganti input menjadi URL JavaScript pemanggil alert:</p>
            [[C1]]
        </li>
        <li>Pastikan teknik berhasil lewat "Copy URL" dan buka di browser; mengklik nama penulis komentar memicu alert.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '164e6fe824ef894ffa05160602259af63f6266c2e82f19714daf79a0be75e363' => [
        'title' => 'Reflected XSS ke string JavaScript dengan tanda kurung sudut di-encode HTML',
        'description_html' => '<p>Lab ini memiliki kerentanan reflected cross-site scripting pada fitur pelacakan pencarian yang mengenkode tanda kurung sudut. Pantulan terjadi di dalam string JavaScript. Untuk menyelesaikan lab, keluar dari string JavaScript tersebut dan panggil fungsi [[C0]].</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Kirim string acak di kotak pencarian, intersep dengan Burp Suite, lalu kirim ke Burp Repeater.</li>
        <li>Amati string acak Anda tercermin di dalam string JavaScript.</li>
        <li>
            <p>Ganti input Anda dengan payload berikut untuk keluar dari string JavaScript dan menyisipkan alert:</p>
            [[C0]]
        </li>
        <li>Salin URL dari Repeater lalu buka di browser; halaman langsung memicu alert.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '20f0960254c2299d1e38d95c6131eed58e897552311335c61ea0c8d324d7ca71' => [
        'title' => 'DOM XSS di sink document.write memakai sumber location.search di dalam elemen select',
        'description_html' => '<p>Lab ini memiliki kerentanan DOM-based cross-site scripting pada fitur cek stok. Fitur memakai fungsi [[C0]] dengan data dari [[C2]] melalui panggilan [[C1]] di dalam elemen select.</p><p>Untuk menyelesaikan lab, keluar dari elemen select dan panggil fungsi [[C3]].</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Di halaman produk, skrip berbahaya mengambil parameter [[C0]] dari sumber [[C1]] dan memanggil [[C2]] untuk menambah opsi baru pada dropdown cek stok.</li>
        <li>Tambahkan parameter query [[C3]] ke URL dengan string acak lalu minta URL itu.</li>
        <li>String acak Anda muncul sebagai salah satu pilihan dropdown di browser.</li>
        <li>Periksa elemen dropdown untuk memastikan nilai [[C4]] berada di dalam elemen select.</li>
        <li>
            <p>Ubah URL untuk menyisipkan payload XSS ke parameter [[C5]] seperti berikut:</p>
            [[C6]]
        </li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '7dd0e73fe7cd3372360932722c0dfa1b3d73637170c9107ab1fb90c1ae2b4ae1' => [
        'title' => 'DOM XSS pada ekspresi AngularJS dengan tanda kurung sudut dan kutip ganda di-encode HTML',
        'description_html' => '<p>Lab ini memiliki kerentanan DOM-based cross-site scripting pada ekspresi AngularJS di fitur pencarian.</p><p>AngularJS memindai node HTML yang memiliki atribut [[C0]]. Saat direktif ini aktif, ekspresi JavaScript di dalam kurung kurawal ganda dapat dijalankan meski tanda kurung sudut di-encode.</p><p>Untuk menyelesaikan lab, jalankan ekspresi AngularJS yang memanggil fungsi [[C1]].</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Masukkan string alfanumerik acak ke kotak pencarian.</li>
        <li>Lihat kode sumber halaman dan amati string acak Anda berada di dalam elemen ber-direktif [[C0]].</li>
        <li>
            <p>Masukkan ekspresi AngularJS berikut ke kotak pencarian:</p>
            [[C1]]
        </li>
        <li>Klik <strong>search</strong>.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '954173de38d3d0f6588c4a98d6400a1335a3ef78d9a8ce701a6609fb87941e96' => [
        'title' => 'Reflected DOM XSS',
        'description_html' => '<p>Lab ini mendemonstrasikan kerentanan reflected DOM, ketika aplikasi server memantulkan data permintaan di respons lalu skrip di halaman memproses data pantulan tersebut secara tidak aman hingga ke sink berbahaya.</p><p>Untuk menyelesaikan lab, buat injeksi yang memanggil fungsi [[C0]].</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Di Burp Suite, buka tab Proxy dan aktifkan fitur Intercept.</li>
        <li>Di situs lab, cari string uji acak seperti [[C0]].</li>
        <li>Teruskan permintaan di Proxy Burp.</li>
        <li>Amati string Anda dipantulkan di respons JSON bernama [[C1]].</li>
        <li>Dari Site Map, buka [[C2]] dan amati respons JSON tersebut diteruskan ke fungsi [[C3]].</li>
        <li>Melalui pengujian kata kunci pencarian, server meng-escape tanda kutip tetapi tidak meng-escape karakter backslash.</li>
        <li>
            <p>Untuk menyelesaikan lab, masukkan kata kunci pencarian berikut:</p>
            [[C4]]
        </li>
    </ol>
    <p>Backslash suntikan Anda membatalkan escape tanda kutip ganda milik server karena berubah menjadi double-backslash, sehingga tanda kutip ganda menutup string JSON lebih awal, operator aritmetika memisahkan pemanggilan [[C5]], dan komentar menutup sisa objek JSON:</p>
    [[C6]]
</div></div>
LABHTML,
        ],
    ],
    'a2e1b73b9b37946f3a6b2d3bef063907db04eede2ec15f0b9c17518818b81ec8' => [
        'title' => 'Stored DOM XSS',
        'description_html' => '<p>Lab ini mendemonstrasikan kerentanan stored DOM pada fitur komentar blog. Untuk menyelesaikan lab, eksploitasi celah ini untuk memanggil fungsi [[C0]].</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <p>Kirim komentar yang memuat vektor berikut:</p>
    [[C0]]
    <p>Situs memakai fungsi JavaScript [[C1]] untuk mengenkode tanda kurung sudut. Saat argumen pertamanya berupa string biasa, fungsi tersebut hanya mengganti kemunculan pertama sehingga tanda kurung sudut berikutnya tetap diproses sebagai HTML.</p>
</div></div>
LABHTML,
        ],
    ],
    '626e9e76c544af64db41c2723c8720ab0f25bf6f4c14b8d47c81a2790c472bad' => [
        'title' => 'Reflected XSS ke konteks HTML dengan sebagian besar tag dan atribut diblokir',
        'description_html' => '<p>Lab ini memiliki kerentanan reflected XSS pada fitur pencarian tetapi memakai web application firewall (WAF) untuk memblokir vektor XSS umum.</p><p>Untuk menyelesaikan lab, lancarkan serangan cross-site scripting yang melewati WAF dan memanggil fungsi [[C0]].</p><div class="highlightedarea"><h4>Catatan</h4><p>Solusi Anda tidak boleh memerlukan interaksi pengguna; memicu [[C1]] secara manual di browser sendiri tidak akan menyelesaikan lab.</p></div>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>
            <p>Uji vektor XSS standar seperti:</p>
            [[C0]]
        </li>
        <li>Amati payload diblokir. Gunakan Burp Intruder untuk menguji tag dan atribut yang diizinkan.</li>
        <li>Gunakan fitur pencarian di browser Burp lalu kirim permintaannya ke Burp Intruder.</li>
        <li>Di Burp Intruder, ubah kata kunci pencarian menjadi: [[C1]]</li>
        <li>Taruh kursor di tengah kurung sudut dan klik <strong>Add §</strong> hingga menjadi: [[C2]]</li>
        <li>Buka <a href="/web-security/cross-site-scripting/cheat-sheet">XSS cheat sheet</a> dan klik <strong>Copy tags to clipboard</strong>.</li>
        <li>Di panel <strong>Payloads</strong>, klik <strong>Paste</strong> lalu klik <strong><span class="icon-play-circle-outline"></span> Start attack</strong>.</li>
        <li>Periksa hasil: hampir semua mendapat [[C3]], sedangkan payload [[C4]] menerima respons [[C5]].</li>
        <li>
            <p>Kembali ke Burp Intruder dan ubah kata kunci menjadi:</p>
            [[C6]]
        </li>
        <li>Taruh kursor sebelum tanda [[C7]] dan klik <strong>Add §</strong> hingga menjadi: [[C8]]</li>
        <li>Kembali ke <a href="/web-security/cross-site-scripting/cheat-sheet">XSS cheat sheet</a> lalu klik <strong>Copy events to clipboard</strong>.</li>
        <li>Di panel <strong>Payloads</strong>, klik <strong>Clear</strong>, lalu <strong>Paste</strong> daftar atribut, dan klik <strong><span class="icon-play-circle-outline"></span> Start attack</strong>.</li>
        <li>Hampir semua menerima [[C9]], sedangkan [[C10]] mendapat respons [[C11]].</li>
        <li>
            <p>Buka server eksploitasi dan tempelkan kode berikut (ganti [[C12]] dengan ID lab Anda):</p>
            [[C13]]
        </li>
        <li>Klik <strong>Store</strong> lalu <strong>Deliver exploit to victim</strong>.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '35d25a422af775cc93101fff0b686ae37e3ccb4844d3272061e090aa0c854ced' => [
        'title' => 'Reflected XSS ke konteks HTML dengan semua tag diblokir kecuali tag kustom',
        'description_html' => '<p>Lab ini memblokir semua tag HTML kecuali tag kustom.</p><p>Untuk menyelesaikan lab, lancarkan serangan cross-site scripting yang menyuntikkan tag kustom dan otomatis memicu alert [[C0]].</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>
            <p>Buka server eksploitasi dan tempelkan kode berikut (ganti [[C0]] dengan ID lab Anda):</p>
            [[C1]]
        </li>
        <li>Klik "Store" dan "Deliver exploit to victim".</li>
    </ol>
    <p>Injeksi ini menciptakan tag kustom ber-ID [[C2]] dengan event handler [[C3]] pemanggil fungsi [[C4]]. Fragmen hash di akhir URL langsung memfokuskan elemen tersebut saat halaman dimuat sehingga payload [[C5]] otomatis tereksekusi.</p>
</div></div>
LABHTML,
        ],
    ],
    '20812d5112754ad4d73aab3069147bf39635016f2005c5c0062a7e766fd72ffb' => [
        'title' => 'Reflected XSS dengan beberapa markup SVG diizinkan',
        'description_html' => '<p>Lab ini memiliki kerentanan reflected XSS sederhana. Situs memblokir tag umum tetapi meloloskan beberapa tag dan event SVG.</p><p>Untuk menyelesaikan lab, lancarkan serangan cross-site scripting yang memanggil fungsi [[C0]].</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>
            <p>Masukkan payload XSS standar berikut:</p>
            [[C0]]
        </li>
        <li>Amati payload diblokir. Gunakan Burp Intruder untuk mencari tag dan atribut yang diizinkan.</li>
        <li>Lakukan pencarian di browser Burp dan kirim permintaannya ke Burp Intruder.</li>
        <li>Ubah kata kunci pencarian di templat menjadi: [[C1]]</li>
        <li>Taruh kursor di tengah kurung sudut dan klik <strong>Add §</strong> hingga menjadi: [[C2]]</li>
        <li>Buka <a href="/web-security/cross-site-scripting/cheat-sheet">XSS cheat sheet</a> lalu klik <strong>Copy tags to clipboard</strong>.</li>
        <li>Di Burp Intruder panel <strong>Payloads</strong>, klik <strong>Paste</strong> lalu klik <strong><span class="icon-play-circle-outline"></span> Start attack</strong>.</li>
        <li>Semua payload membalas [[C3]] kecuali tag [[C4]], [[C5]], [[C6]], dan [[C7]] yang mendapat respons [[C8]].</li>
        <li>
            <p>Kembali ke tab <strong>Intruder</strong> dan ubah kata kunci pencarian menjadi:</p>
            [[C9]]
        </li>
        <li>
            <p>Taruh kursor sebelum karakter [[C10]] lalu klik <strong>Add §</strong> hingga menjadi:</p>
            [[C11]]
        </li>
        <li>Buka <a href="/web-security/cross-site-scripting/cheat-sheet">XSS cheat sheet</a> lalu klik <strong>Copy events to clipboard</strong>.</li>
        <li>Di panel <strong>Payloads</strong>, klik <strong>Clear</strong>, lalu <strong>Paste</strong> daftar atribut, dan klik <strong><span class="icon-play-circle-outline"></span> Start attack</strong>.</li>
        <li>
            <p>Semua payload membalas [[C12]] kecuali [[C13]] yang menerima respons [[C14]].</p>
            <p>Kunjungi URL berikut di browser untuk memastikan alert() terpanggil dan lab selesai:</p>
            [[C15]]
        </li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '69d9a58b4be85fe3da0e5e65bb0b6655278492c77fce16b6989c5b40481c66ed' => [
        'title' => 'Reflected XSS pada tag canonical link',
        'description_html' => '<p>Lab ini memantulkan masukan pengguna ke dalam tag canonical link dan meng-escape tanda kurung sudut.</p><p>Untuk menyelesaikan lab, lakukan serangan cross-site scripting di beranda yang menyuntikkan atribut pemanggil fungsi [[C0]].</p><p>Sebagai bantuan, pengguna simulasi akan menekan kombinasi tombol berikut:</p><ul><li>[[C1]]</li><li>[[C2]]</li><li>[[C3]]</li></ul><p>Solusi bawaan lab ini hanya berfungsi di Chrome.</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>
            <p>Kunjungi URL berikut dengan mengganti [[C0]] menjadi ID lab Anda:</p>
            [[C1]]
            <p>Ini menetapkan tombol [[C2]] sebagai tombol akses halaman yang memanggil fungsi [[C3]] saat ditekan.</p>
        </li>
        <li>
            Untuk mengujinya sendiri, tekan salah satu kombinasi tombol berikut:
            <ul>
                <li>Di Windows: [[C4]]</li>
                <li>Di MacOS: [[C5]]</li>
                <li>Di Linux: [[C6]]</li>
            </ul>
        </li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    'd926f2eb65b5882b27710e31d931b82bff5eccf019671ce0d921d6d23fd97442' => [
        'title' => 'Reflected XSS ke string JavaScript dengan kutip tunggal dan backslash di-escape',
        'description_html' => '<p>Lab ini memiliki kerentanan reflected cross-site scripting pada fitur pelacakan pencarian. Pantulan terjadi di dalam string JavaScript dengan kutip tunggal dan backslash di-escape.</p><p>Untuk menyelesaikan lab, lakukan serangan cross-site scripting yang keluar dari string JavaScript dan memanggil fungsi [[C0]].</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Kirim string acak di kotak pencarian, intersep dengan Burp Suite, lalu kirim ke Burp Repeater.</li>
        <li>Amati string acak Anda tercermin di dalam string JavaScript.</li>
        <li>Coba kirim payload [[C0]]; kutip tunggal Anda di-escape dengan backslash sehingga tidak bisa keluar dari string.</li>
        <li>
            <p>Ganti input dengan payload berikut untuk menutup blok skrip saat ini dan menyisipkan blok skrip baru:</p>
            [[C1]]
        </li>
        <li>Salin URL dari Repeater lalu buka di browser; halaman langsung memicu alert.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '1bf4b9250fa4c31d4444f2adf45736c70dd7e5515f1e35a50f3e5d1f74969d63' => [
        'title' => 'Reflected XSS ke string JavaScript dengan tanda kurung sudut dan kutip ganda di-encode HTML serta kutip tunggal di-escape',
        'description_html' => '<p>Lab ini memiliki kerentanan reflected cross-site scripting pada fitur pelacakan pencarian dengan tanda kurung sudut dan kutip ganda di-encode HTML serta kutip tunggal di-escape.</p><p>Untuk menyelesaikan lab, keluar dari string JavaScript tersebut dan panggil fungsi [[C0]].</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Kirim string acak di kotak pencarian, intersep dengan Burp Suite, lalu kirim ke Burp Repeater.</li>
        <li>Amati string acak Anda tercermin di dalam string JavaScript.</li>
        <li>Uji [[C0]] dan amati kutip tunggal di-escape dengan backslash.</li>
        <li>Uji [[C1]] dan amati bahwa backslash itu sendiri tidak di-escape.</li>
        <li>
            <p>Gunakan payload berikut sehingga backslash Anda meng-escape backslash milik server, membebaskan kutip tunggal Anda:</p>
            [[C2]]
        </li>
        <li>Salin URL dari Repeater dan buka di browser; halaman memicu alert.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '53ddf9ef1abeee631133a34645f234b5a0115eb9e739c4cebbe2a4668735893b' => [
        'title' => 'Stored XSS ke event onclick dengan kurung sudut dan kutip ganda di-encode HTML serta kutip tunggal dan backslash di-escape',
        'description_html' => '<p>Lab ini memiliki kerentanan stored cross-site scripting pada fitur komentar.</p><p>Untuk menyelesaikan lab, kirim komentar yang memanggil fungsi [[C0]] saat nama penulis komentar diklik.</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Kirim komentar berisi string acak pada input "Website" dan intersep permintaannya ke Burp Repeater.</li>
        <li>Minta halaman postingan blog di browser lalu kirim juga permintaan tersebut ke Burp Repeater.</li>
        <li>Amati string acak di tab Repeater kedua tercermin di dalam atribut event handler [[C0]].</li>
        <li>
            <p>Ulangi prosesnya dengan menyisipkan entitas HTML untuk keluar dari string di dalam atribut dan memanggil [[C1]]:</p>
            [[C2]]
        </li>
        <li>Salin URL lalu buka di browser; mengklik nama penulis komentar akan memicu alert.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '0a88d8a0c7685665c8baff00182659bf0a53f478d01725b703663bc726d81776' => [
        'title' => 'Reflected XSS ke template literal dengan tanda kurung sudut, kutip, backslash, dan backtick di-escape Unicode',
        'description_html' => '<p>Lab ini memiliki kerentanan reflected cross-site scripting pada pencarian blog yang memantul ke dalam template string, dengan kurung sudut serta kutip di-encode HTML dan backtick di-escape. Panggil fungsi [[C0]] di dalam template string tersebut untuk menyelesaikan lab.</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Kirim string acak ke kotak pencarian, intersep dengan Burp Suite, lalu kirim ke Burp Repeater.</li>
        <li>Amati string acak Anda tercermin di dalam JavaScript template string.</li>
        <li>Ganti input dengan payload interpolasi template berikut untuk mengeksekusi JavaScript: [[C0]]</li>
        <li>Salin URL dari Repeater lalu buka di browser; halaman langsung memicu alert.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '0c567d752c198d06a7a3e449249118740a13247871b21c6aab286522fe52f6aa' => [
        'title' => 'Mengeksploitasi cross-site scripting untuk mencuri cookie',
        'description_html' => '<p>Lab ini memiliki kerentanan stored XSS pada komentar blog. Pengguna korban simulasi membuka setiap komentar baru. Eksploitasi celah ini untuk mengekfiltrasi cookie sesi korban lalu gunakan cookie tersebut untuk menyamar sebagai korban.</p><div class="highlightedarea"><h4>Catatan</h4><p>Firewall kami memblokir interaksi lab ke sistem eksternal sembarang; gunakan server publik bawaan Burp Collaborator. Tersedia pula solusi alternatif tanpa Collaborator meski jauh kurang tersembunyi.</p></div>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Di Burp Suite Professional, buka tab <a href="/burp/documentation/desktop/tools/collaborator">Collaborator</a>.</li>
        <li>Klik "Copy to clipboard" untuk menyalin subdomain unik Burp Collaborator Anda.</li>
        <li>
            <p>Kirim payload berikut pada komentar blog dengan memasukkan subdomain Collaborator Anda:</p>
            [[C0]]
            <p>Skrip ini memicu browser pembaca mengirim permintaan POST berisi cookie-nya ke subdomain Collaborator Anda.</p>
        </li>
        <li>Kembali ke tab Collaborator lalu klik "Poll now" hingga melihat interaksi HTTP.</li>
        <li>Catat nilai cookie korban dari badan permintaan POST.</li>
        <li>Muat ulang halaman blog utama melalui Proxy atau Repeater Burp dengan mengganti cookie sesi Anda menjadi cookie korban tadi (atau akses [[C1]] memakai cookie admin tersebut) untuk menyelesaikan lab.</li>
    </ol>
    <div class="component-labinstructions">
        <h4>Solusi alternatif</h4>
        <p>Anda dapat pula mengadaptasi serangan agar korban memposting cookie-nya sendiri ke komentar blog via <a href="/web-security/cross-site-scripting/exploiting/lab-perform-csrf">eksploitasi XSS untuk CSRF</a>, meski jejaknya langsung terlihat publik.</p>
    </div>
</div></div>
LABHTML,
        ],
    ],
    '08d9e37603cfe2ef7cf8a21c19e9fc73e81bb5d992fe2e876f8b6891b1759d43' => [
        'title' => 'Mengeksploitasi cross-site scripting untuk menangkap kata sandi',
        'description_html' => '<p>Lab ini memiliki kerentanan stored XSS pada komentar blog. Pengguna korban simulasi membuka setiap komentar baru. Eksploitasi celah ini untuk mengekfiltrasi username dan kata sandi korban lalu pakai untuk login ke akun korban.</p><div class="highlightedarea"><h4>Catatan</h4><p>Firewall kami memblokir interaksi lab ke sistem eksternal sembarang; gunakan server publik bawaan Burp Collaborator. Ada solusi alternatif tanpa Collaborator meski tidak diam-diam.</p></div>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Di Burp Suite Professional, buka tab <a href="/burp/documentation/desktop/tools/collaborator">Collaborator</a>.</li>
        <li>Klik "Copy to clipboard" untuk menyalin subdomain unik Burp Collaborator Anda.</li>
        <li>
            <p>Kirim payload berikut pada komentar blog dengan memasukkan subdomain Collaborator Anda:</p>
            [[C0]]
            <p>Skrip membuat pengisi otomatis kata sandi browser korban mengirimkan username dan kata sandinya via POST ke Collaborator Anda.</p>
        </li>
        <li>Buka tab Collaborator lalu klik "Poll now" hingga muncul interaksi HTTP.</li>
        <li>Catat username dan kata sandi korban di badan permintaan POST tersebut.</li>
        <li>Gunakan kredensial tersebut untuk login sebagai korban.</li>
    </ol>
    <div class="component-labinstructions">
        <h4>Solusi alternatif</h4>
        <p>Anda juga dapat membuat korban memposting kredensialnya ke komentar blog via <a href="/web-security/cross-site-scripting/exploiting/lab-perform-csrf">XSS untuk CSRF</a>, meski jauh kurang tersembunyi.</p>
    </div>
</div></div>
LABHTML,
        ],
    ],
    '49e763496c6cdc049d3bc1855b2cf77f952d4f6c5793794e98ec2c06ca2fc193' => [
        'title' => 'Mengeksploitasi XSS untuk melewati pertahanan CSRF',
        'description_html' => '<p>Lab ini memiliki kerentanan stored XSS di komentar blog. Eksploitasi celah ini untuk mencuri token CSRF lalu pakai untuk mengubah alamat email pembaca komentar blog.</p><p>Anda dapat masuk ke akun Anda menggunakan kredensial berikut: [[C0]]</p><div class="component-solution expandable-container"><details><summary><h4><span class="icon-erlenmeyer"></span> Petunjuk</h4></summary><div class="content"><div><p>Anda tidak bisa mendaftarkan email yang sudah dipakai akun lain; jika email akun Anda diubah saat uji coba, pakai alamat email berbeda untuk eksploitasi final ke korban.</p></div></div></details></div>',
        'sections' => [
            0 => '<div class="content"><div><p>Anda tidak bisa mendaftarkan email yang sudah dipakai akun lain; jika email akun Anda diubah saat uji coba, pakai alamat email berbeda untuk eksploitasi final ke korban.</p></div></div>',
            1 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Login dengan kredensial yang diberikan lalu periksa fitur ubah email di halaman akun Anda.</li>
        <li>
            Lihat kode sumber halaman untuk mengetahui hal berikut:
            <ul>
                <li>Perubahan email dikirim via POST ke [[C0]] dengan parameter [[C1]].</li>
                <li>Ada token anti-CSRF pada input tersembunyi [[C2]].</li>
            </ul>
            Artinya eksploitasi harus memuat halaman akun, mengekstrak token CSRF, lalu mengirim permintaan ubah email memakai token tersebut.
        </li>
        <li>
            <p>Kirim payload berikut di komentar blog:</p>
            [[C3]]
            <p>Siapa pun yang membaca komentar akan otomatis mengirim permintaan POST yang mengubah alamat emailnya menjadi [[C4]].</p>
        </li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    'd82e3a0ca07b096a36c320bdaf6f10ac92869a49f98d1adfd16b4ffdc05390f1' => [
        'title' => 'Reflected XSS dengan keluar dari sandbox AngularJS tanpa string',
        'description_html' => '<p>Lab ini memakai AngularJS dalam mode khusus yang meniadakan fungsi [[C0]] dan melarang penggunaan string apa pun.</p><p>Untuk menyelesaikan lab, lakukan serangan cross-site scripting yang keluar dari sandbox dan mengeksekusi fungsi [[C1]] tanpa memakai fungsi [[C2]].</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <p>Kunjungi URL berikut dengan mengganti [[C0]] dengan ID lab Anda:</p>
    [[C1]]
    <p>Eksploitasi memakai [[C2]] untuk membuat string tanpa tanda kutip, lalu menimpa fungsi [[C4]] di prototipe [[C3]] sehingga keluar dari sandbox AngularJS. Setelah array dilewatkan ke filter [[C5]] bersama [[C6]], [[C7]], dan [[C8]] penghasil kode [[C9]], penimpaan fungsi [[C10]] memungkinkan kode tersebut dieksekusi.</p>
</div></div>
LABHTML,
        ],
    ],
    '978febc1996cddc2b7cd48d98a7675b4c51e498017943479c16896589a51c363' => [
        'title' => 'Reflected XSS dengan keluar dari sandbox AngularJS dan CSP',
        'description_html' => '<p>Lab ini menerapkan CSP dan AngularJS.</p><p>Untuk menyelesaikan lab, lancarkan serangan cross-site scripting yang melewati CSP, keluar dari sandbox AngularJS, dan memicu alert [[C0]].</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>
            <p>Buka server eksploitasi lalu tempelkan kode berikut (ganti [[C0]] dengan ID lab Anda):</p>
            [[C1]]
        </li>
        <li>Klik "Store" dan "Deliver exploit to victim".</li>
    </ol>
    <p>Eksploitasi memakai event [[C2]] di AngularJS untuk melewati CSP bersama [[C3]] yang properti [[C4]]-nya (di Chrome) berakhir pada objek [[C5]].</p>
    <p>Di AngularJS, [[C6]] menandai filter [[C7]] sehingga fungsi [[C8]] dapat ditampung ke variabel [[C9]] lalu dipanggil saat operasi [[C10]] mencapai objek [[C11]] di array [[C12]], melewati pemeriksaan referensi eksplisit ke [[C13]] / [[C14]].</p>
</div></div>
LABHTML,
        ],
    ],
    '8d3b6a32167c58218b1807a6070d8d24bd5fd88ac74f6eb74127cd73aae46cb8' => [
        'title' => 'Reflected XSS dengan event handler dan atribut href diblokir',
        'description_html' => '<p>Lab ini memiliki kerentanan reflected XSS dengan beberapa tag di-whitelist, tetapi semua event handler dan atribut [[C0]] anchor diblokir.</p><p>Untuk menyelesaikan lab, suntikkan vektor yang saat diklik memanggil fungsi [[C1]].</p><p>Anda harus menyertakan label kata "Click" agar pengguna simulasi mengkliknya, misalnya:</p>[[C2]]',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <p>Kunjungi URL berikut dengan mengganti [[C0]] dengan ID lab Anda:</p>
    [[C1]]
</div></div>
LABHTML,
        ],
    ],
    'c29f5f30a0c79a94f6a847a63911bfbb403f8d60977b3e3b09110d166711a345' => [
        'title' => 'Reflected XSS pada URL JavaScript dengan beberapa karakter diblokir',
        'description_html' => '<p>Lab ini memantulkan input Anda ke dalam URL JavaScript sambil memblokir beberapa karakter untuk menahan serangan XSS.</p><p>Untuk menyelesaikan lab, lancarkan serangan cross-site scripting yang memanggil fungsi [[C0]] berisi string [[C1]] di dalam pesan [[C2]].</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <p>Kunjungi URL berikut dengan mengganti [[C0]] dengan ID lab Anda:</p>
    [[C1]]
    <p>Lab langsung terselesaikan meski [[C2]] baru muncul jika Anda mengklik tautan "Back to blog" di bawah halaman.</p>
    <p>Eksploitasi memakai penanganan eksepsi: pernyataan [[C3]] dipisahkan komentar kosong sebagai pengganti spasi dan meneruskan argumen ke [[C4]] yang dipasang di handler eksepsi [[C5]].</p>
    <p>Karena [[C6]] bukan ekspresi, fungsi panah membungkus [[C7]] dan ditetapkan ke properti [[C8]] milik [[C9]], lalu dipicu oleh konversi string paksa pada [[C10]].</p>
</div></div>
LABHTML,
        ],
    ],
    '417f3bdbf234c3c15104e0712f05c5f080950e7ecc18c37b7fdafde0149be0eb' => [
        'title' => 'Reflected XSS terlindungi CSP sangat ketat, dengan serangan dangling markup',
        'description_html' => '<p>Lab ini menerapkan CSP ketat yang mencegah browser memuat subresource dari domain eksternal.</p><p>Untuk menyelesaikan lab, lancarkan serangan pembajakan formulir (form hijacking) yang melewati CSP, mengekfiltrasi token CSRF pengguna simulasi, dan memakainya untuk mengubah email menjadi [[C0]].</p><p>Anda harus menyertakan label "Click" pada vektor agar korban simulasi mengkliknya, misalnya:</p>[[C1]]<p>Anda dapat masuk ke akun Anda menggunakan kredensial berikut: [[C2]]</p><div class="highlightedarea"><h4>Catatan</h4><p>Firewall kami memblokir interaksi ke sistem eksternal sembarang; gunakan server eksploitasi yang disediakan.</p></div><div class="component-solution expandable-container"><details><summary><h4><span class="icon-erlenmeyer"></span> Petunjuk</h4></summary><div class="content"><div><p>Anda tidak bisa mendaftarkan email yang sudah dipakai akun lain; gunakan alamat email berbeda untuk eksploitasi final ke korban.</p></div></div></details></div>',
        'sections' => [
            0 => '<div class="content"><div><p>Anda tidak bisa mendaftarkan email yang sudah dipakai akun lain; gunakan alamat email berbeda untuk eksploitasi final ke korban.</p></div></div>',
            1 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Login ke lab memakai kredensial di atas.</li>
        <li>Uji fitur ubah email; payload XSS seperti [[C0]] diblokir validasi sisi klien.</li>
        <li>
            <p>Periksa elemen [[C1]] lewat DevTools browser:</p>
            <ul>
                <li>Ubah tipenya dari [[C2]] menjadi [[C3]] untuk melewati validasi sisi klien.</li>
                <li>Di formulir terdapat input tersembunyi berisi token CSRF untuk proses ubah email.</li>
            </ul>
        </li>
        <li>Ubah payload menjadi [[C4]] agar tetap lolos format email.</li>
        <li>Kirim payload; nilainya memantul dengan escape aman sekaligus menandakan kemungkinan adanya CSP.</li>
        <li>Tambahkan parameter query [[C5]] ke akhir URL halaman: [[C6]]</li>
        <li>Muat URL itu; payload tampak di halaman tetapi skrip tidak berjalan karena diblokir CSP.</li>
        <li>
            Periksa konsol DevTools untuk melihat pesan blokir CSP, lalu cari kelemahan CSP seperti tidak adanya direktif [[C7]].
        </li>
        <li>Buka server eksploitasi dan salin URL-nya beserta [[C8]], misalnya [[C9]].</li>
        <li>
            <p>Di lab, manfaatkan celah pemrosesan parameter query [[C10]] untuk menyuntikkan tombol seperti berikut: [[C11]]</p>
            <p>Pastikan menyertakan parameter [[C12]] bernilai email berakhiran tanda kutip penutup serta atribut [[C13]] yang mengarah ke URL server eksploitasi Anda.</p>
        </li>
        <li>Muat URL ini dan pastikan tombol suntikan Anda tampil pada halaman.</li>
        <li>Klik tombol baru tersebut untuk melihat pengalihan ke server eksploitasi.</li>
        <li>Token CSRF belum tampil di URL karena formulir dikirim memakai [[C14]], bukan [[C15]] yang menyertakan parameter di URL.</li>
        <li>
            <p>Suntikkan ulang tombol beserta atribut [[C16]] dan tambahkan [[C17]]: [[C18]]</p>
        </li>
        <li>Klik tombol baru tersebut untuk memastikan token CSRF kini terlihat di URL server eksploitasi.</li>
        <li>
            Buka server eksploitasi dan masukkan skrip serangan berikut ke kolom Body:
            [[C19]]
        </li>
        <li>Ganti URL [[C20]] dan [[C21]] dengan URL lab serta server eksploitasi Anda masing-masing.</li>
        <li>Klik <strong>Store</strong> lalu <strong>Deliver exploit to victim</strong> hingga email korban berubah menjadi [[C22]].</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '81ee8accf0de217426c4c6c3b260eece41c471f80271541fc170ba4a66492339' => [
        'title' => 'Reflected XSS terlindungi CSP, dengan bypass CSP',
        'description_html' => '<p>Lab ini memakai CSP dan mengandung kerentanan reflected XSS.</p><p>Untuk menyelesaikan lab, lancarkan serangan cross-site scripting yang melewati CSP dan memanggil fungsi [[C0]].</p><p>Solusi bawaan lab ini hanya berfungsi di Chrome.</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>
            <p>Masukkan payload berikut ke kotak pencarian:</p>
            [[C0]]
        </li>
        <li>Amati payload tercermin, namun CSP mencegah skrip berjalan.</li>
        <li>Di Burp Proxy, amati header [[C1]] memiliki direktif [[C2]] berisi parameter [[C3]] yang Anda kendalikan, sehingga Anda dapat menyuntikkan direktif CSP tambahan ke kebijakan.</li>
        <li>
            <p>Kunjungi URL berikut dengan mengganti [[C5]] menggunakan ID lab Anda (memanfaatkan kontrol [[C4]]):</p>
            [[C6]]
        </li>
    </ol>
    <p>Injeksi memanfaatkan direktif [[C7]] di CSP untuk menimpa aturan [[C9]] pada elemen [[C8]] dan mengizinkan [[C10]] agar skrip inline berjalan.</p>
</div></div>
LABHTML,
        ],
    ],
];
