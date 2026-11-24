<?php

return [
    'ce814bae27379e097e9d714cfb763781f05932d2b95c2b194386687a89f6e2ac' => [
        'title' => 'DOM XSS menggunakan web message',
        'description_html' => '<p>Lab ini mendemonstrasikan kerentanan web message sederhana. Untuk menyelesaikan lab, gunakan server eksploitasi untuk mengirim pesan ke situs target sehingga fungsi [[C0]] terpanggil.</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content">
    <div>
        <ol>
            <li>Perhatikan bahwa halaman beranda memiliki panggilan [[C0]] yang mendengarkan web message.</li>
            <li>
                <p>Buka server eksploitasi lalu tambahkan elemen [[C1]] berikut ke bagian body. Jangan lupa masukkan ID lab Anda:</p>
                [[C2]]
            </li>
            <li>Simpan eksploitasi lalu kirimkan ke korban.</li>
        </ol>
        <p>Saat [[C3]] dimuat, metode [[C4]] mengirim web message ke halaman beranda. Event listener yang ditujukan untuk menampilkan iklan mengambil isi pesan tersebut dan menyisipkannya ke dalam elemen [[C5]] ber-ID [[C6]]. Karena tag [[C7]] yang disisipkan memiliki atribut [[C8]] tidak valid, muncul galat yang memicu event handler [[C9]] untuk mengeksekusi payload Anda.</p>
    </div>
</div>
LABHTML,
        ],
    ],
    '887f00fbadc4a46fc79d4827ebd012b3ba4d52ba2fef5b09a0a8b9a30a42a6de' => [
        'title' => 'DOM XSS menggunakan web message dan URL JavaScript',
        'description_html' => '<p>Lab ini mendemonstrasikan kerentanan pengalihan berbasis DOM yang dipicu oleh web messaging. Untuk menyelesaikan lab, buat halaman HTML di server eksploitasi yang mengeksploitasi kerentanan ini hingga memanggil fungsi [[C0]].</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content">
    <div>
        <ol>
            <li>Perhatikan bahwa halaman beranda memuat panggilan [[C0]] untuk mendengarkan web message. JavaScript di dalamnya berisi pemeriksaan [[C1]] yang cacat untuk mencari string [[C2]] atau [[C3]] di mana saja dalam pesan, serta sink [[C4]].</li>
            <li>
                <p>Buka server eksploitasi dan tambahkan [[C5]] berikut ke body, lalu ganti [[C6]] dengan ID lab Anda:</p>
                [[C7]]
            </li>
            <li>Simpan eksploitasi dan kirimkan ke korban.</li>
        </ol>
        <p>Skrip ini mengirim web message berisi payload JavaScript beserta string [[C8]]. Argumen kedua mengizinkan [[C9]] mana pun untuk web message tersebut.</p>
        <p>Saat [[C10]] dimuat, [[C11]] mengirim payload JavaScript ke halaman utama. Event listener mendeteksi string [[C12]] dan meneruskan payload ke sink [[C13]], sehingga fungsi [[C14]] terpanggil.</p>
    </div>
</div>
LABHTML,
        ],
    ],
    '912c5f0d3d0d2905771da05ad007fd099d6fcd364cf93d4a3b855d2d64bdcaac' => [
        'title' => 'DOM XSS menggunakan web message dan JSON.parse',
        'description_html' => '<p>Lab ini memakai web messaging dan mengurai pesan sebagai JSON. Untuk menyelesaikan lab, buat halaman HTML di server eksploitasi yang mengeksploitasi kerentanan ini hingga memanggil fungsi [[C0]].</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content">
    <div>
        <ol>
            <li>Perhatikan bahwa halaman beranda memiliki event listener yang mendengarkan web message. Listener ini mengharapkan string yang diurai memakai [[C0]]. Di kode JavaScript, listener mengharapkan properti [[C1]] dan kasus [[C2]] di dalam pernyataan [[C3]] akan mengubah atribut [[C4]].</li>
            <li>
                <p>Buka server eksploitasi lalu tambahkan [[C5]] berikut ke body, dan ganti [[C6]] dengan ID lab Anda:</p>
                [[C7]]
            </li>
            <li>Simpan eksploitasi dan kirimkan ke korban.</li>
        </ol>
        <p>Saat [[C8]] yang dibuat dimuat, [[C9]] mengirim web message bertipe [[C10]] ke halaman beranda. Listener menerima pesan dan mengurainya memakai [[C11]] sebelum meneruskannya ke [[C12]].</p>
        <p>Pernyataan [[C13]] memicu cabang [[C14]] yang menetapkan properti [[C15]] pesan ke atribut [[C16]] milik elemen [[C18]] pada [[C17]]. Dalam serangan ini, properti [[C19]] tersebut berisi payload JavaScript kita.</p>
        <p>Karena argumen kedua mengizinkan [[C20]] apa saja dan handler tidak memverifikasi origin, payload langsung ditetapkan sebagai [[C21]] milik [[C23]] pada [[C22]]. Fungsi [[C24]] pun berjalan saat korban membuka halaman di browser.</p>
    </div>
</div>
LABHTML,
        ],
    ],
    '67ab900d88bcd094478d14d157338de5bf87302c124c802219a8ef29a4a65e0f' => [
        'title' => 'Pengalihan terbuka berbasis DOM',
        'description_html' => '<p>Lab ini memiliki kerentanan DOM-based open redirection. Untuk menyelesaikan lab, eksploitasi kerentanan ini agar korban dialihkan ke server eksploitasi.</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content">
    <div>
        <p>Halaman postingan blog memuat tautan berikut untuk kembali ke beranda blog:</p>
        [[C0]]
        <p>Parameter [[C1]] mengandung kerentanan open redirection yang memungkinkan Anda mengubah tujuan tautan "Back to Blog". Untuk menyelesaikan lab, susun dan kunjungi URL berikut dengan mengganti ID lab dan ID server eksploitasi Anda:</p>
        [[C2]]
    </div>
</div>
LABHTML,
        ],
    ],
    'a248974a24dd4abd637f526afb96bb349d49b2ad790756b97c46f47203781c6a' => [
        'title' => 'Manipulasi cookie berbasis DOM',
        'description_html' => '<p>Lab ini mendemonstrasikan manipulasi cookie sisi klien berbasis DOM. Untuk menyelesaikan lab, injeksikan cookie yang memicu XSS di halaman lain dan memanggil fungsi [[C0]]. Anda perlu menggunakan server eksploitasi untuk mengarahkan korban ke halaman yang tepat.</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content">
    <div>
        <ol>
            <li>Perhatikan bahwa halaman beranda memakai cookie sisi klien bernama [[C0]] yang nilainya berupa URL halaman produk terakhir yang dikunjungi pengguna.</li>
            <li>
                <p>Buka server eksploitasi lalu tambahkan [[C1]] berikut ke body, dan ganti [[C2]] dengan ID lab Anda:</p>
                [[C3]]
            </li>
            <li>Simpan eksploitasi dan kirimkan ke korban.</li>
        </ol>
        <p>Sumber awal [[C4]] cocok dengan URL salah satu halaman produk, tetapi terdapat tambahan payload JavaScript di bagian akhir. Saat [[C5]] dimuat pertama kali, browser membuka URL berbahaya tersebut dan menyimpannya ke nilai cookie [[C6]]. Event handler [[C7]] kemudian langsung mengalihkan korban ke halaman beranda tanpa disadari. Selama cookie beracun masih tersimpan, memuat halaman beranda akan mengeksekusi payload tersebut.</p>
    </div>
</div>
LABHTML,
        ],
    ],
    '992c042f1d4d37ec3fc36d4dd46f47d9769928fd769e125ae22c02fbf99177b4' => [
        'title' => 'Mengeksploitasi DOM clobbering untuk memicu XSS',
        'description_html' => '<p>Lab ini memiliki kerentanan DOM clobbering. Fitur komentar mengizinkan HTML "aman". Untuk menyelesaikan lab, susun injeksi HTML yang menimpa (clobber) variabel dan memanfaatkan XSS untuk memanggil fungsi [[C0]].</p><div class="highlightedarea"><h4>Catatan</h4><p>Solusi bawaan untuk lab ini hanya berfungsi di Chrome.</p></div>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content">
    <div>
        <ol>
            <li>
                <p>Buka salah satu postingan blog dan buat komentar berisi tag anchor berikut:</p>
                [[C0]]
            </li>
            <li>Kembali ke postingan blog dan kirim komentar kedua berisi teks acak apa saja. Saat halaman dimuat berikutnya, [[C1]] akan terpanggil.</li>
        </ol>
        <p>Halaman postingan blog mengimpor file JavaScript [[C2]] yang berisi kode berikut:</p>
        [[C3]]
        <p>Objek [[C4]] diimplementasikan dengan pola berisiko memakai operator logika [[C5]] bersama variabel global sehingga rentan terhadap DOM clobbering.</p>
        <p>Anda dapat menimpa objek ini memakai dua tag anchor ber-ID sama agar dikelompokkan dalam koleksi DOM. Atribut [[C6]] bernilai [[C7]] pada anchor kedua akan menimpa properti [[C8]] dengan isi atribut [[C9]].</p>
        <p>Situs memakai filter DOMPurify untuk mencegah kerentanan DOM, tetapi DOMPurify tetap mengizinkan protokol [[C10]] yang tidak melakukan URL-encode pada tanda kutip ganda. Akibatnya tanda kutip yang di-encode terdekode saat runtime dan variabel [[C11]] terisi nilai [[C12]] pada pemuatan halaman berikutnya.</p>
        <p>Ketika komentar kedua dikirim, browser menggunakan variabel global hasil clobbering yang menyelundupkan payload ke event handler [[C13]] dan memicu [[C14]].</p>
    </div>
</div>
LABHTML,
        ],
    ],
    '4d27a0ebb9fa4e9a66754f25ebbaca6772f085e601b714356dc4437a47e3efdc' => [
        'title' => 'Menimpa atribut DOM untuk melewati filter HTML',
        'description_html' => '<p>Lab ini menggunakan pustaka HTMLJanitor yang rentan terhadap DOM clobbering. Untuk menyelesaikan lab, susun vektor yang melewati filter dan memakai DOM clobbering untuk menyisipkan vektor yang memanggil fungsi [[C0]]. Anda mungkin perlu server eksploitasi agar vektor berjalan otomatis di browser korban.</p><div class="highlightedarea"><h4>Catatan</h4><p>Solusi bawaan untuk lab ini tidak berfungsi di Firefox. Disarankan memakai Chrome untuk menyelesaikan lab ini.</p></div>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content">
    <div>
        <ol>
            <li>
                <p>Buka salah satu postingan blog dan buat komentar berisi HTML berikut:</p>
                [[C0]]
            </li>
            <li>
                <p>Buka server eksploitasi lalu tambahkan [[C1]] berikut ke bagian body:</p>
                [[C2]]
                <p>Pastikan mengubah URL dengan ID lab Anda dan memastikan parameter [[C3]] sesuai dengan nilai [[C4]] postingan blog tempat Anda menyisipkan HTML sebelumnya.</p>
            </li>
            <li>Simpan eksploitasi dan kirimkan ke korban. Saat halaman dimuat berikutnya, fungsi [[C5]] terpanggil.</li>
        </ol>
        <p>Pustaka ini memakai properti [[C6]] untuk memfilter atribut HTML. Namun properti [[C7]] itu sendiri tetap dapat di-clobber sehingga panjangnya menjadi undefined. Hal ini memungkinkan penyisipan atribut apa saja ke elemen [[C8]], termasuk atribut [[C9]] berisi pemanggilan [[C10]].</p>
        <p>Saat [[C11]] dimuat setelah jeda 500 ms, fragmen [[C12]] ditambahkan ke URL agar browser langsung memfokuskan elemen ber-ID [[C13]] pada formulir di komentar. Event handler [[C14]] pun mengeksekusi fungsi [[C15]].</p>
    </div>
</div>
LABHTML,
        ],
    ],
];
