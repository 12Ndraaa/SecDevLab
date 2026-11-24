<?php

return [
    '96a4274d6672c286187a77cc2a99f9342b37c04786b8c9e88a91bd9759d3e7d4' => [
        'title' => 'Mengeksploitasi XXE dengan external entity untuk mengambil file',
        'description_html' => '<p>Lab ini memiliki fitur "Check stock" yang mengurai input XML dan mengembalikan nilai tak terduga ke dalam respons.</p><p>Untuk menyelesaikan lab, suntikkan XML external entity untuk mengambil isi file [[C0]].</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Buka halaman produk, klik "Check stock", lalu intersep permintaan POST yang dihasilkan di Burp Suite.</li>
        <li>
            <p>Sisipkan definisi external entity berikut di antara deklarasi XML dan elemen [[C0]]:</p>
            [[C1]]
        </li>
        <li>Ganti angka [[C2]] dengan referensi ke external entity: [[C3]]. Respons akan menampilkan pesan "Invalid product ID:" diikuti isi file [[C4]].</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    'b856c63f6e47c5473568908b886232e76c6f1d02e9ebae4fd2ffe9d26adb1a56' => [
        'title' => 'Mengeksploitasi XXE untuk melancarkan serangan SSRF',
        'description_html' => '<p>Lab ini memiliki fitur "Check stock" yang mengurai input XML dan mengembalikan nilai tak terduga ke dalam respons.</p><p>Server lab menjalankan endpoint metadata EC2 (simulasi) di URL bawaan [[C0]] yang dapat dipakai untuk mengambil data tentang instance, termasuk data sensitif.</p><p>Untuk menyelesaikan lab, eksploitasi kerentanan XXE guna melancarkan serangan SSRF demi memperoleh IAM secret access key milik server dari endpoint metadata EC2.</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Buka halaman produk, klik "Check stock", lalu intersep permintaan POST yang dihasilkan di Burp Suite.</li>
        <li>
            <p>Sisipkan definisi external entity berikut di antara deklarasi XML dan elemen [[C0]]:</p>
            [[C1]]
        </li>
        <li>Ganti angka [[C2]] dengan referensi ke external entity: [[C3]]. Respons akan memuat "Invalid product ID:" diikuti respons endpoint metadata, awalnya berupa nama folder.</li>
        <li>Perbarui URL di DTD secara bertahap untuk menelusuri API hingga mencapai [[C4]] yang mengembalikan JSON berisi [[C5]].</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '1ad475bf32f0d913c25ead9582f05687c1ad039228d0a3c8d56c768fd2250a2b' => [
        'title' => 'Blind XXE dengan interaksi out-of-band',
        'description_html' => '<p>Lab ini memiliki fitur "Check stock" yang mengurai input XML tetapi tidak menampilkan hasilnya.</p><p>Anda dapat mendeteksi kerentanan blind XXE dengan memicu interaksi out-of-band ke domain eksternal.</p><p>Untuk menyelesaikan lab, gunakan external entity agar parser XML melakukan DNS lookup dan permintaan HTTP ke Burp Collaborator.</p><div class="highlightedarea"><h4>Catatan</h4><p>Agar platform Academy tidak disalahgunakan menyerang pihak ketiga, firewall kami memblokir interaksi antara lab dan sistem eksternal sembarang. Anda harus memakai server publik bawaan Burp Collaborator.</p></div>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Buka halaman produk, klik "Check stock", lalu intersep permintaan POST yang dihasilkan di Burp Suite Professional.</li>
        <li>
            <p>Sisipkan definisi external entity berikut di antara deklarasi XML dan elemen [[C0]]. Klik kanan lalu pilih "Insert Collaborator payload" untuk memasukkan subdomain Burp Collaborator di bagian yang ditunjukkan:</p>
            [[C1]]
        </li>
        <li>
            <p>Ganti angka [[C2]] dengan referensi ke external entity:</p>
            [[C3]]
        </li>
        <li>Buka tab Collaborator lalu klik "Poll now". Jika belum ada interaksi, tunggu beberapa detik dan coba lagi. Anda akan melihat interaksi DNS dan HTTP yang dipicu aplikasi akibat payload Anda.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    'df91f530d50ed0f243fbe61ca82d8b7d7138ecbeb190a83d9047d5cd6b54ba78' => [
        'title' => 'Blind XXE dengan interaksi out-of-band melalui XML parameter entity',
        'description_html' => '<p>Lab ini memiliki fitur "Check stock" yang mengurai input XML, tidak menampilkan nilai tak terduga, serta memblokir permintaan yang berisi external entity biasa.</p><p>Untuk menyelesaikan lab, gunakan parameter entity agar parser XML melakukan DNS lookup dan permintaan HTTP ke Burp Collaborator.</p><div class="highlightedarea"><h4>Catatan</h4><p>Agar platform Academy tidak disalahgunakan menyerang pihak ketiga, firewall kami memblokir interaksi antara lab dan sistem eksternal sembarang. Anda harus memakai server publik bawaan Burp Collaborator.</p></div>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Buka halaman produk, klik "Check stock", lalu intersep permintaan POST yang dihasilkan di Burp Suite Professional.</li>
        <li>
            <p>Sisipkan definisi external entity berikut di antara deklarasi XML dan elemen [[C0]]. Klik kanan dan pilih "Insert Collaborator payload" untuk menyisipkan subdomain Burp Collaborator:</p>
            [[C1]]
        </li>
        <li>Buka tab Collaborator dan klik "Poll now". Tunggu beberapa detik jika belum terlihat. Anda akan melihat interaksi DNS dan HTTP yang dipicu aplikasi akibat payload Anda.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '32ee145c6edcd4d8e12b0fbd40ddba9cb63067b92b095c98cf63926808be0b04' => [
        'title' => 'Mengeksploitasi blind XXE untuk mengekfiltrasi data menggunakan DTD eksternal berbahaya',
        'description_html' => '<p>Lab ini memiliki fitur "Check stock" yang mengurai input XML tetapi tidak menampilkan hasilnya.</p><p>Untuk menyelesaikan lab, ekfiltrasi isi file [[C0]].</p><div class="highlightedarea"><h4>Catatan</h4><p>Agar platform Academy tidak disalahgunakan menyerang pihak ketiga, firewall kami memblokir interaksi antara lab dan sistem eksternal sembarang. Anda harus memakai server eksploitasi yang disediakan dan/atau server publik bawaan Burp Collaborator.</p></div>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Di Burp Suite Professional, buka tab <a href="/burp/documentation/desktop/tools/collaborator">Collaborator</a>.</li>
        <li>Klik "Copy to clipboard" untuk menyalin payload unik Burp Collaborator.</li>
        <li>
            <p>Masukkan payload Burp Collaborator ke dalam file DTD berbahaya:</p>
            [[C0]]
        </li>
        <li>Klik "Go to exploit server" dan simpan file DTD berbahaya di server Anda. Klik "View exploit" lalu catat URL-nya.</li>
        <li>Anda perlu mengeksploitasi fitur cek stok memakai parameter entity yang merujuk ke DTD berbahaya tersebut. Buka halaman produk, klik "Check stock", dan intersep permintaan POST yang muncul di Burp Suite.</li>
        <li>
            <p>Sisipkan definisi external entity berikut di antara deklarasi XML dan elemen [[C1]]:</p>
            [[C2]]
        </li>
        <li>Kembali ke tab Collaborator lalu klik "Poll now". Tunggu beberapa detik bila belum terlihat.</li>
        <li>Anda akan melihat interaksi DNS dan HTTP yang dipicu aplikasi, dengan interaksi HTTP memuat isi file [[C3]].</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '9f3ddc22a43e31e32c37a3cee3bfe89c7b6f352368730aebcd17a246429c83f0' => [
        'title' => 'Mengeksploitasi blind XXE untuk mengambil data lewat pesan galat',
        'description_html' => '<p>Lab ini memiliki fitur "Check stock" yang mengurai input XML tetapi tidak menampilkan hasilnya.</p><p>Untuk menyelesaikan lab, gunakan DTD eksternal untuk memicu pesan galat yang menampilkan isi file [[C0]].</p><p>Lab ini menyediakan tautan ke server eksploitasi di domain berbeda tempat Anda dapat menampung DTD berbahaya.</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>
            <p>Klik "Go to exploit server" lalu simpan file DTD berbahaya berikut di server Anda:</p>
            [[C0]]
            <p>Saat diimpor, halaman ini membaca isi [[C1]] ke dalam entitas [[C2]], lalu mencoba memakai entitas tersebut dalam path file.</p>
        </li>
        <li>Klik "View exploit" dan catat URL DTD berbahaya Anda.</li>
        <li>Anda perlu mengeksploitasi fitur cek stok memakai parameter entity yang merujuk ke DTD tersebut. Buka halaman produk, klik "Check stock", dan intersep permintaan POST di Burp Suite.</li>
        <li>
            <p>Sisipkan definisi external entity berikut di antara deklarasi XML dan elemen [[C3]]:</p>
            [[C4]]
            <p>Anda akan melihat pesan galat berisi isi file [[C5]].</p>
        </li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '68bb9b0d753781beeb1bd78ec3be309bed3de2f8b62b6336db6a92593bc5daaa' => [
        'title' => 'Mengeksploitasi XInclude untuk mengambil file',
        'description_html' => '<p>Lab ini memiliki fitur "Check stock" yang menyisipkan input pengguna ke dalam dokumen XML sisi server untuk diurai.</p><p>Karena tidak mengendalikan seluruh dokumen XML, Anda tidak bisa mendefinisikan DTD guna melancarkan serangan XXE klasik.</p><p>Untuk menyelesaikan lab, suntikkan pernyataan [[C0]] guna mengambil isi file [[C1]].</p><div class="component-solution expandable-container"><details><summary><h4><span class="icon-erlenmeyer"></span> Petunjuk</h4></summary><div class="content"><div><p>Secara default, [[C2]] mencoba mengurai dokumen yang disertakan sebagai XML. Karena [[C3]] bukan XML valid, Anda harus menambah atribut ekstra pada direktif [[C4]] untuk mengubah perilaku ini.</p></div></div></details></div>',
        'sections' => [
            0 => '<div class="content"><div><p>Secara default, [[C0]] mencoba mengurai dokumen yang disertakan sebagai XML. Karena [[C1]] bukan XML valid, Anda harus menambah atribut ekstra pada direktif [[C2]] untuk mengubah perilaku ini.</p></div></div>',
            1 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Buka halaman produk, klik "Check stock", lalu intersep permintaan POST yang muncul di Burp Suite.</li>
        <li>
            <p>Atur nilai parameter [[C0]] menjadi:</p>
            [[C1]]
        </li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '5d6e610406b1df6c657e111df6297e961a822a0428f00db9f7e7276f4a671a14' => [
        'title' => 'Mengeksploitasi XXE lewat unggahan file gambar',
        'description_html' => '<p>Lab ini memungkinkan pengguna melampirkan avatar pada komentar dan memakai pustaka Apache Batik untuk memproses file gambar avatar.</p><p>Untuk menyelesaikan lab, unggah gambar yang menampilkan isi file [[C0]] setelah diproses. Lalu gunakan tombol "Submit solution" untuk mengirimkan hostname server.</p><div class="component-solution expandable-container"><details><summary><h4><span class="icon-erlenmeyer"></span> Petunjuk</h4></summary><div class="content"><div><p>Format gambar SVG menggunakan XML.</p></div></div></details></div>',
        'sections' => [
            0 => '<div class="content"><div><p>Format gambar SVG menggunakan XML.</p></div></div>',
            1 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>
            <p>Buat file gambar SVG lokal dengan isi berikut:</p>
            [[C0]]
        </li>
        <li>Kirim komentar pada sebuah postingan blog, lalu unggah gambar ini sebagai avatar.</li>
        <li>Saat melihat komentar Anda, isi file [[C1]] akan tampak di dalam gambar. Gunakan tombol "Submit solution" untuk mengirimkan nilai hostname server.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '9179f60d7eff1096e159e290d8f14facb04543ccc4380aec40de3f603dbd8364' => [
        'title' => 'Mengeksploitasi XXE untuk mengambil data dengan memanfaatkan ulang DTD lokal',
        'description_html' => '<p>Lab ini memiliki fitur "Check stock" yang mengurai input XML tetapi tidak menampilkan hasilnya.</p><p>Untuk menyelesaikan lab, picu pesan galat berisi isi file [[C0]].</p><p>Anda perlu merujuk ke file DTD yang sudah ada di server dan mendefinisikan ulang salah satu entitas di dalamnya.</p><div class="highlightedarea"><h4>Petunjuk</h4><p>Sistem yang memakai lingkungan desktop GNOME sering memiliki DTD di [[C1]] yang berisi entitas bernama [[C2]]</p></div>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Buka halaman produk, klik "Check stock", lalu intersep permintaan POST yang dihasilkan di Burp Suite.</li>
        <li>
            <p>Sisipkan definisi parameter entity berikut di antara deklarasi XML dan elemen [[C0]]:</p>
            [[C1]]
            Ini akan mengimpor DTD Yelp lalu mendefinisikan ulang entitas [[C2]], sehingga memicu pesan galat berisi isi file [[C3]].
        </li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
];
