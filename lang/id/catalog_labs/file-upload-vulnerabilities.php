<?php

return [
    '535975a13e89837c0707c5ccec5d576e69540e338e9aee215d9bf8b0323a8919' => [
        'title' => 'Remote code execution melalui unggahan web shell',
        'description_html' => '<p>Lab ini memiliki fitur unggah gambar yang rentan. Server tidak memvalidasi file yang diunggah pengguna sebelum menyimpannya di sistem file.</p><p>Untuk menyelesaikan lab, unggah web shell PHP dasar lalu manfaatkan untuk mengambil isi file [[C0]]. Kirimkan rahasia tersebut lewat tombol di banner lab.</p><p>Anda dapat masuk ke akun Anda menggunakan kredensial berikut: [[C1]]</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Sambil mem-proxy lalu lintas lewat Burp, login ke akun Anda dan temukan fitur unggah gambar avatar.</li>
        <li>Unggah gambar sembarang lalu kembali ke halaman akun untuk melihat pratinjau avatar Anda.</li>
        <li>Di Burp, buka <strong>Proxy &gt; HTTP history</strong>, klik bilah filter untuk membuka <strong>HTTP history filter</strong>, centang <strong>Images</strong> di bawah <strong>Filter by MIME type</strong>, lalu terapkan perubahan.</li>
        <li>Di proxy history, amati gambar diambil memakai permintaan [[C0]] ke [[C1]] dan kirim permintaan tersebut ke Burp Repeater.</li>
        <li>
            <p>Di perangkat Anda, buat file bernama [[C2]] berisi skrip PHP untuk membaca file rahasia Carlos, misalnya:</p>
            [[C3]]
        </li>
        <li>Unggah file PHP berbahaya ini sebagai avatar; respons akan mengonfirmasi unggahan berhasil.</li>
        <li>
            <p>Di Burp Repeater, ubah path permintaan agar mengarah ke file PHP Anda:</p>
            [[C4]]
        </li>
        <li>Kirim permintaan. Server mengeksekusi skrip Anda dan mengembalikan keluarannya (rahasia Carlos) pada respons.</li>
        <li>Kirimkan rahasia tersebut untuk menyelesaikan lab.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    'dfd0cce82acda8dae507a0fa7a1fb76029163a80e9b1889113d91a885337e9dd' => [
        'title' => 'Unggahan web shell dengan melewati pembatasan Content-Type',
        'description_html' => '<p>Lab ini memiliki fitur unggah gambar yang rentan. Server mencoba mencegah pengguna mengunggah tipe file tak terduga, tetapi hanya mengandalkan pemeriksaan input yang bisa dikendalikan pengguna.</p><p>Untuk menyelesaikan lab, unggah web shell PHP dasar lalu manfaatkan untuk mengambil isi file [[C0]]. Kirimkan rahasia tersebut lewat tombol di banner lab.</p><p>Anda dapat masuk ke akun Anda menggunakan kredensial berikut: [[C1]]</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Login dan unggah gambar avatar, lalu kembali ke halaman akun Anda.</li>
        <li>Di Burp, buka <strong>Proxy &gt; HTTP history</strong>, temukan permintaan [[C0]] ke [[C1]], dan kirim ke Burp Repeater.</li>
        <li>
            <p>Di perangkat Anda, buat file [[C2]] berisi skrip PHP untuk membaca rahasia Carlos, misalnya:</p>
            [[C3]]
        </li>
        <li>Coba unggah skrip ini sebagai avatar. Respons menyatakan hanya file bertipe MIME [[C4]] atau [[C5]] yang diizinkan.</li>
        <li>Di proxy history Burp, temukan permintaan unggah [[C6]] dan kirim ke Burp Repeater.</li>
        <li>Di tab Repeater untuk [[C7]], ubah [[C8]] pada bagian isi permintaan file Anda menjadi [[C9]].</li>
        <li>Kirim permintaan dan amati respons menyatakan file berhasil diunggah.</li>
        <li>Buka tab Repeater lain yang berisi [[C10]], ganti nama file gambar menjadi [[C11]], lalu kirim. Rahasia Carlos akan muncul di respons.</li>
        <li>Kirimkan rahasia tersebut untuk menyelesaikan lab.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    'e39b4571e65ad58013bb6cf68240e2e7e59d087bfb1d58dd8673116f4bdf7135' => [
        'title' => 'Unggahan web shell melalui path traversal',
        'description_html' => '<p>Lab ini memiliki fitur unggah gambar yang rentan. Server dikonfigurasi untuk mencegah eksekusi file unggahan pengguna, tetapi pembatasan ini bisa dilewati dengan mengeksploitasi <a href="/web-security/file-path-traversal">kerentanan sekunder</a>.</p><p>Untuk menyelesaikan lab, unggah web shell PHP dasar lalu manfaatkan untuk mengambil isi file [[C0]]. Kirimkan rahasia tersebut lewat tombol di banner lab.</p><p>Anda dapat masuk ke akun Anda menggunakan kredensial berikut: [[C1]]</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Login dan unggah gambar avatar, lalu kembali ke halaman akun Anda.</li>
        <li>Di Burp, buka <strong>Proxy &gt; HTTP history</strong>, temukan permintaan [[C0]] ke [[C1]], lalu kirim ke Burp Repeater.</li>
        <li>
            <p>Di perangkat Anda, buat file [[C2]] berisi skrip PHP untuk membaca rahasia Carlos:</p>
            [[C3]]
        </li>
        <li>Unggah skrip ini sebagai avatar. Situs tidak memblokir unggahan file PHP.</li>
        <li>Di tab Repeater berisi [[C4]], ganti nama file gambar dengan [[C5]] lalu kirim. Server hanya mengembalikan isi file PHP sebagai teks polos tanpa mengeksekusinya.</li>
        <li>Di proxy history Burp, temukan permintaan unggah [[C6]] dan kirim ke Burp Repeater.</li>
        <li>
            <p>Di tab Repeater berisi [[C7]], temukan header [[C8]] file PHP Anda dan ubah [[C9]] agar menyertakan urutan directory traversal:</p>
            [[C10]]
        </li>
        <li>Kirim permintaan. Pesan respons berbunyi [[C11]], menandakan server menghapus urutan traversal dari nama file.</li>
        <li>
            <p>Samarkan urutan directory traversal dengan URL-encode pada karakter garis miring ([[C12]]) sehingga menjadi:</p>
            [[C13]]
        </li>
        <li>Kirim permintaan dan amati pesan kini berbunyi [[C14]], membuktikan nama file di-URL-decode oleh server.</li>
        <li>Di browser, kembali ke halaman akun Anda.</li>
        <li>Di proxy history Burp, temukan permintaan [[C15]] dan amati rahasia Carlos dikembalikan di respons. File terunggah ke direktori lebih atas ([[C16]]) dan langsung dieksekusi server, sehingga juga dapat diminta melalui [[C17]].</li>
        <li>Kirimkan rahasia tersebut untuk menyelesaikan lab.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '23b377e90a4c2eb083ef9f02cb4800e763796995a1449f85714790d15c30b9fa' => [
        'title' => 'Unggahan web shell dengan melewati blacklist ekstensi',
        'description_html' => '<p>Lab ini memiliki fitur unggah gambar yang rentan. Ekstensi file tertentu masuk daftar hitam (blacklist), tetapi pertahanan ini bisa dilewati karena kesalahan konfigurasi mendasar.</p><p>Untuk menyelesaikan lab, unggah web shell PHP dasar lalu manfaatkan untuk mengambil isi file [[C0]]. Kirimkan rahasia tersebut lewat tombol di banner lab.</p><p>Anda dapat masuk ke akun Anda menggunakan kredensial berikut: [[C1]]</p><div class="component-solution expandable-container"><details><summary><h4><span class="icon-erlenmeyer"></span> Petunjuk</h4></summary><div class="content"><div><p>Anda perlu mengunggah dua file berbeda untuk menyelesaikan lab ini.</p></div></div></details></div>',
        'sections' => [
            0 => '<div class="content"><div><p>Anda perlu mengunggah dua file berbeda untuk menyelesaikan lab ini.</p></div></div>',
            1 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Login dan unggah gambar avatar, lalu kembali ke halaman akun Anda.</li>
        <li>Di Burp, buka <strong>Proxy &gt; HTTP history</strong>, temukan permintaan [[C0]] ke [[C1]], dan kirim ke Burp Repeater.</li>
        <li>
            <p>Di perangkat Anda, buat file [[C2]] berisi skrip PHP untuk membaca rahasia Carlos:</p>
            [[C3]]
        </li>
        <li>Coba unggah skrip ini sebagai avatar. Respons menolak file berekstensi [[C4]].</li>
        <li>Di proxy history Burp, temukan permintaan [[C5]]. Header respons mengungkap bahwa server berjalan di atas Apache. Kirim permintaan tersebut ke Burp Repeater.</li>
        <li>
            Di tab Repeater untuk [[C6]], lakukan perubahan berikut pada bagian file PHP Anda:
            <ul>
                <li>Ubah nilai parameter [[C7]] menjadi [[C8]].</li>
                <li>Ubah nilai header [[C9]] menjadi [[C10]].</li>
                <li>
                    <p>Ganti isi file (payload PHP Anda) dengan direktif Apache berikut:</p>
                    [[C11]]
                    <p>Ini memetakan ekstensi acak ([[C12]]) ke MIME type eksekusi [[C13]], yang langsung dipahami oleh modul [[C14]] pada server.</p>
                </li>
            </ul>
        </li>
        <li>Kirim permintaan dan pastikan file berhasil diunggah.</li>
        <li>Gunakan tombol panah kembali di Burp Repeater untuk kembali ke permintaan unggah eksploitasi PHP awal.</li>
        <li>Ubah parameter [[C15]] dari [[C16]] menjadi [[C17]] lalu kirim lagi; file akan terunggah tanpa penolakan.</li>
        <li>Buka tab Repeater lain berisi [[C18]], ganti nama file gambar dengan [[C19]], lalu kirim. Rahasia Carlos akan muncul karena file [[C20]] membuat ekstensi [[C21]] dieksekusi layaknya [[C22]].</li>
        <li>Kirimkan rahasia tersebut untuk menyelesaikan lab.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '4ed109e9f6a1c61c6f344591bd7db083cd04f596804f6ba9670cbd6a3fdcafeb' => [
        'title' => 'Unggahan web shell melalui ekstensi file tersamarkan',
        'description_html' => '<p>Lab ini memiliki fitur unggah gambar yang rentan. Ekstensi file tertentu masuk daftar hitam, tetapi pertahanan ini dapat dilewati memakai teknik kamuflase klasik.</p><p>Untuk menyelesaikan lab, unggah web shell PHP dasar lalu manfaatkan untuk mengambil isi file [[C0]]. Kirimkan rahasia tersebut lewat tombol di banner lab.</p><p>Anda dapat masuk ke akun Anda menggunakan kredensial berikut: [[C1]]</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Login dan unggah gambar avatar, lalu kembali ke halaman akun Anda.</li>
        <li>Di Burp, buka <strong>Proxy &gt; HTTP history</strong>, temukan permintaan [[C0]] ke [[C1]], lalu kirim ke Burp Repeater.</li>
        <li>
            <p>Di perangkat Anda, buat file [[C2]] berisi skrip PHP untuk mengambil rahasia Carlos:</p>
            [[C3]]
        </li>
        <li>Coba unggah skrip ini sebagai avatar. Respons menyatakan hanya file JPG dan PNG yang diizinkan.</li>
        <li>Di proxy history Burp, temukan permintaan [[C4]] dan kirim ke Burp Repeater.</li>
        <li>
            <p>Di tab Repeater untuk [[C5]], pada header [[C6]] ubah parameter [[C7]] dengan menambahkan null byte ter-URL-encode diikuti ekstensi [[C8]]:</p>
            [[C9]]
        </li>
        <li>Kirim permintaan dan amati file berhasil diunggah. Pesan respons menyebut file sebagai [[C10]], menunjukkan null byte dan ekstensi [[C11]] dipangkas saat disimpan.</li>
        <li>Buka tab Repeater lain berisi [[C12]], ganti nama file gambar dengan [[C13]], lalu kirim untuk menerima rahasia Carlos pada respons.</li>
        <li>Kirimkan rahasia tersebut untuk menyelesaikan lab.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '328d640f4802f5285275092d76357ca4aa12c2b12fdd0fbfb606d7952c7114ec' => [
        'title' => 'Remote code execution melalui unggahan web shell polyglot',
        'description_html' => '<p>Lab ini memiliki fitur unggah gambar yang rentan. Meski memeriksa isi file untuk memastikan file merupakan gambar asli, penyerang tetap bisa mengunggah dan mengeksekusi kode sisi server.</p><p>Untuk menyelesaikan lab, unggah web shell PHP dasar lalu manfaatkan untuk mengambil isi file [[C0]]. Kirimkan rahasia tersebut lewat tombol di banner lab.</p><p>Anda dapat masuk ke akun Anda menggunakan kredensial berikut: [[C1]]</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>
            <p>Di perangkat Anda, buat file [[C0]] berisi skrip untuk membaca rahasia Carlos, misalnya:</p>
            [[C1]]
        </li>
        <li>Login dan coba unggah skrip sebagai avatar. Server memblokir file non-gambar meski teknik bypass sebelumnya dicoba.</li>
        <li>
            <p>Buat file polyglot PHP/JPG yang sah sebagai gambar tetapi menyisipkan payload PHP di metadata-nya menggunakan ExifTool dari baris perintah:</p>
            [[C2]]
            <p>Ini menambahkan payload PHP ke field [[C3]] gambar lalu menyimpannya dengan ekstensi [[C4]].</p>
        </li>
        <li>Di browser, unggah gambar polyglot sebagai avatar lalu kembali ke halaman akun.</li>
        <li>
            <p>Di proxy history Burp, temukan permintaan [[C5]]. Gunakan fitur pencarian editor pesan untuk mencari string [[C6]] di antara data biner respons; di antara penanda tersebut dan [[C7]] tercantum rahasia Carlos, misalnya:</p>
            [[C8]]
        </li>
        <li>Kirimkan rahasia tersebut untuk menyelesaikan lab.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    'e7c14c1093f823154152c9ce425959ef67d62c9bb7c65eb02f6a8a597ab993e8' => [
        'title' => 'Unggahan web shell melalui race condition',
        'description_html' => '<p>Lab ini memiliki fitur unggah gambar yang rentan. Meski melakukan validasi ketat pada setiap file yang diunggah, validasi itu bisa dilewati seluruhnya lewat race condition dalam pemrosesan file.</p><p>Untuk menyelesaikan lab, unggah web shell PHP dasar lalu manfaatkan untuk mengambil isi file [[C0]]. Kirimkan rahasia tersebut lewat tombol di banner lab.</p><p>Anda dapat masuk ke akun Anda menggunakan kredensial berikut: [[C1]]</p><div class="component-solution expandable-container"><details><summary><h4><span class="icon-erlenmeyer"></span> Petunjuk</h4></summary><div class="content"><div><p>Kode rentan yang menimbulkan race condition adalah sebagai berikut:</p>[[C2]]</div></div></details></div>',
        'sections' => [
            0 => '<div class="content"><div><p>Kode rentan yang menimbulkan race condition adalah sebagai berikut:</p>[[C0]]</div></div>',
            1 => <<<'LABHTML'
<div class="content"><div>
    <p>Seperti tampak di kode sumber di atas, file unggahan dipindahkan lebih dahulu ke folder yang dapat diakses sebelum diperiksa virusnya, lalu dihapus jika tidak lolos. Artinya file sempat dieksekusi di celah waktu singkat sebelum dihapus.</p>
    <div class="highlightedarea">
        <h4>Catatan</h4>
        <p>Karena jendela waktu race condition pada lab ini cukup longgar, lab ini bisa diselesaikan secara manual lewat dua permintaan beruntun di Burp Repeater. Solusi di bawah mengajarkan pendekatan praktis untuk celah serupa di dunia nyata yang jendela waktunya hanya beberapa milidetik.</p>
    </div>
    <ol>
        <li>Login dan unggah gambar avatar, lalu kembali ke halaman akun Anda.</li>
        <li>Di Burp, buka <strong>Proxy &gt; HTTP history</strong> dan amati gambar diambil melalui permintaan [[C0]] ke [[C1]].</li>
        <li>
            <p>Di perangkat Anda, buat file [[C2]] berisi skrip PHP untuk mengambil rahasia Carlos:</p>
            [[C3]]
        </li>
        <li>Coba unggah skrip tersebut sebagai avatar dan pastikan server memblokirnya dengan validasi normal.</li>
        <li>Pasang ekstensi <a href="https://portswigger.net/bappstore/9abaa233088242e8be252cd4ff534988">Turbo Intruder</a> di Burp melalui BApp Store.</li>
        <li>Klik kanan permintaan unggah [[C4]] dan pilih <strong>Extensions &gt; Turbo Intruder &gt; Send to turbo intruder</strong>.</li>
        <li>
            <p>Salin dan tempel templat skrip berikut ke editor Python Turbo Intruder:</p>
            [[C5]]
        </li>
        <li>Ganti [[C6]] dengan seluruh permintaan [[C7]] berisi file [[C8]] Anda dari bagian atas jendela Turbo Intruder.</li>
        <li>Ganti [[C9]] dengan permintaan [[C10]] ke file PHP unggahan, yang disalin dari [[C11]] lalu diganti namanya menjadi [[C12]].</li>
        <li>Klik <strong>Attack</strong> di bagian bawah Turbo Intruder. Skrip mengirim satu permintaan [[C13]] unggah [[C14]] disusul cepat lima permintaan [[C15]] ke [[C16]].</li>
        <li>Pada daftar hasil, sebagian permintaan [[C17]] menerima kode 200 berisi rahasia Carlos karena mencapai server sebelum file gagal validasi dan dihapus.</li>
        <li>Kirimkan rahasia tersebut untuk menyelesaikan lab.</li>
    </ol>
    <div class="highlightedarea">
        <h4>Catatan</h4>
        <p>Jika menyusun permintaan [[C18]] secara manual, pastikan diakhiri urutan [[C19]] yang tepat dan sesuaikan indentasi Python pada string multibaris.</p>
    </div>
</div></div>
LABHTML,
        ],
    ],
];
