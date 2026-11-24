<?php

return [
    '801987a32f892c6549fd2d5650bb4bd0778fff3d9430fd3bd3c41b6063acf904' => [
        'title' => 'Mengeksploitasi API LLM dengan agency berlebih',
        'description_html' => '<p>Untuk menyelesaikan lab, gunakan LLM untuk menghapus pengguna [[C0]].</p><div class="highlightedarea"><h4>Pengetahuan yang dibutuhkan</h4><p>Untuk menyelesaikan lab ini, Anda perlu mengetahui:</p><ul><li>Cara kerja API LLM.</li><li>Cara memetakan permukaan serangan API LLM.</li></ul><p>Informasi selengkapnya tersedia di topik Academy <a href="/web-security/llm-attacks">Web LLM attacks</a>.</p></div>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <div class="highlightedarea">
        <h4>Catatan</h4>
        <p>Lab Web LLM attacks memakai LLM langsung (live). Karena sifat respons LLM yang dinamis, Anda terkadang perlu mengubah kalimat prompt atau alur langkah agar berhasil menyelesaikan lab.</p>
    </div>
    <ol>
        <li><p>Dari beranda lab, pilih <strong>Live chat</strong>.</p></li>
        <li><p>Tanyakan ke LLM API apa saja yang bisa diaksesnya. LLM ternyata dapat mengeksekusi perintah SQL mentah melalui Debug SQL API.</p></li>
        <li><p>Tanyakan argumen apa saja yang diterima Debug SQL API. API tersebut menerima satu string berisi pernyataan SQL lengkap.</p></li>
        <li><p>Minta LLM memanggil Debug SQL API dengan argumen [[C0]]. Tabel tersebut memiliki kolom [[C1]] dan [[C2]] serta pengguna bernama [[C3]].</p></li>
        <li><p>Minta LLM memanggil Debug SQL API dengan argumen [[C4]] untuk menghapus pengguna [[C5]] dan menyelesaikan lab.</p></li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    'dd7f2eb6a65d7f0184f0dc284f9405738728f326f52664068ddd9a27496dd591' => [
        'title' => 'Mengeksploitasi kerentanan pada API LLM',
        'description_html' => '<p>Lab ini memiliki kerentanan OS command injection yang dapat dieksploitasi melalui API yang dipanggil lewat LLM. Untuk menyelesaikan lab, hapus file [[C0]] dari direktori home Carlos.</p><div class="highlightedarea"><h4>Pengetahuan yang dibutuhkan</h4><p>Untuk menyelesaikan lab ini, Anda perlu mengetahui:</p><ul><li>Cara memetakan permukaan serangan API LLM (<a href="/web-security/llm-attacks">Web LLM attacks</a>).</li><li>Cara mengeksploitasi kerentanan OS command injection (<a href="/web-security/os-command-injection">OS command injection</a>).</li></ul></div>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <div class="highlightedarea">
        <h4>Catatan</h4>
        <p>Lab Web LLM attacks memakai LLM langsung (live). Karena sifat respons LLM yang dinamis, Anda terkadang perlu menyesuaikan kalimat prompt agar berhasil menyelesaikan lab.</p>
    </div>
    <ol>
        <li><p>Dari beranda lab, klik <strong>Live chat</strong>.</p></li>
        <li>
            <p>Tanyakan kepada LLM API apa saja yang dapat diaksesnya. LLM merespons memiliki akses ke API berikut:</p>
            <ul>
                <li>Password Reset</li>
                <li>Newsletter Subscription</li>
                <li>Product Information</li>
            </ul>
        </li>
        <li>
            <p>Pertimbangkan dua hal ini:</p>
            <ul>
                <li>Anda perlu RCE untuk menghapus file [[C0]] Carlos, dan API pengirim email sering menjalankan perintah OS.</li>
                <li>Anda belum memiliki akun untuk menguji reset kata sandi, sehingga Newsletter Subscription API menjadi target uji awal terbaik.</li>
            </ul>
        </li>
        <li><p>Tanyakan argumen yang diterima Newsletter Subscription API.</p></li>
        <li><p>Minta LLM memanggil Newsletter Subscription API dengan argumen [[C1]].</p></li>
        <li><p>Klik <strong>Email client</strong> dan pastikan email konfirmasi langganan tiba, membuktikan interaksi langsung dengan API tersebut.</p></li>
        <li><p>Minta LLM memanggil Newsletter Subscription API dengan argumen [[C2]].</p></li>
        <li><p>Periksa <strong>Email client</strong> dan amati email terkirim ke [[C3]], membuktikan perintah [[C4]] tereksekusi.</p></li>
        <li><p>Minta LLM memanggil Newsletter Subscription API dengan argumen [[C5]] untuk menghapus file [[C6]] milik Carlos dan menyelesaikan lab.</p></li>
    </ol>
    <div class="highlightedarea">
        <h4>Catatan</h4>
        <p>LLM mungkin membalas "something went wrong" setelah panggilan API terakhir, namun hal tersebut wajar dan tidak menghalangi penyelesaian lab.</p>
    </div>
</div></div>
LABHTML,
        ],
    ],
    'dcbb79deff147574debcf253f7440b108c0f959b2bbdb055822432fd2637e968' => [
        'title' => 'Indirect prompt injection',
        'description_html' => '<p>Lab ini rentan terhadap indirect prompt injection. Pengguna [[C0]] sering memakai live chat untuk menanyakan produk Lightweight "l33t" Leather Jacket. Untuk menyelesaikan lab, hapus pengguna [[C1]].</p><div class="highlightedarea"><h4>Pengetahuan yang dibutuhkan</h4><p>Untuk menyelesaikan lab ini, Anda perlu mengetahui:</p><ul><li>Cara kerja API LLM.</li><li>Cara memetakan permukaan serangan API LLM.</li><li>Cara melancarkan serangan indirect prompt injection.</li></ul><p>Informasi selengkapnya tersedia di topik Academy <a href="/web-security/llm-attacks">Web LLM attacks</a>.</p></div>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <div class="highlightedarea">
        <h4>Catatan</h4>
        <p>Lab Web LLM attacks memakai LLM langsung (live). Karena sifat respons LLM yang dinamis, Anda terkadang perlu menyesuaikan kalimat prompt agar berhasil menyelesaikan lab.</p>
    </div>
    <p><strong>Menemukan permukaan serangan</strong></p>
    <ol>
        <li><p>Klik <strong>Live chat</strong> untuk membuka fitur obrolan lab.</p></li>
        <li><p>Tanyakan ke LLM API apa saja yang dapat diaksesnya. LLM mendukung API untuk menghapus akun maupun mengubah alamat email.</p></li>
        <li><p>Tanyakan argumen yang diterima Delete Account API.</p></li>
        <li><p>Minta LLM menghapus akun Anda; galat yang muncul menandakan Anda perlu login untuk memakai Delete Account API.</p></li>
    </ol>
    <p><strong>Membuat akun pengguna</strong></p>
    <ol>
        <li><p>Klik <strong>Register</strong> untuk membuka halaman pendaftaran.</p></li>
        <li><p>Isi data dengan alamat <strong>Email</strong> yang tertera di bagian atas halaman <strong>Email client</strong> instance lab Anda.</p></li>
        <li><p>Klik <strong>Register</strong> untuk mengirim email konfirmasi.</p></li>
        <li><p>Buka klien email dan klik tautan konfirmasi.</p></li>
        <li><p>Klik <strong>My account</strong> lalu login ke akun Anda.</p></li>
    </ol>
    <p><strong>Menguji serangan</strong></p>
    <ol>
        <li><p>Kembali ke <strong>Live chat</strong> dan minta LLM mengganti email Anda menjadi alamat lain (misalnya [[C0]]). LLM langsung menggantinya tanpa verifikasi tambahan, mengisyaratkan Delete Account API bekerja serupa.</p></li>
        <li><p>Tanyakan kepada LLM tentang produk selain jaket kulit (misalnya payung/umbrella) dan perhatikan LLM ikut membaca ulasan produk tersebut.</p></li>
        <li><p>Tambahkan ulasan pada produk payung yang menyatakan stok habis dengan otoritas administrator, misalnya: [[C1]]</p></li>
        <li><p>Kembali ke <strong>Live chat</strong> dan tanyakan produk payung lagi. LLM menyatakan stok habis, membuktikan keluaran LLM dipengaruhi indirect prompt dari ulasan produk.</p></li>
        <li>
            <p>Hapus ulasan sebelumnya lalu tambahkan ulasan baru berisi prompt tersembunyi untuk menghapus akun pembaca yang sedang login:</p>
            <p>Contohnya:</p>
            <p>[[C2]]</p>
        </li>
        <li><p>Kembali ke <strong>Live chat</strong> dan tanyakan ulasan produk payung; LLM akan menghapus akun Anda sendiri sebagai bukti konsep.</p></li>
    </ol>
    <p><strong>Mengeksploitasi kerentanan</strong></p>
    <ol>
        <li><p>Buat akun baru dengan username [[C3]] lalu login.</p></li>
        <li><p>Dari beranda, buka halaman produk jaket kulit.</p></li>
        <li><p>Tambahkan ulasan berisi prompt tersembunyi yang sama seperti pengujian sebelumnya.</p></li>
        <li><p>Tunggu [[C4]] menanyakan informasi jaket kulit lewat LLM. Ketika melakukannya, LLM akan memanggil Delete Account API pada akunnya sehingga [[C5]] terhapus dan lab selesai.</p></li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '9360a6d43c0e710a7bf9b68e4dafd6249360a49063f441b2faf781d05e0024d6' => [
        'title' => 'Mengeksploitasi penanganan output tidak aman pada LLM',
        'description_html' => '<p>Lab ini menangani output LLM secara tidak aman sehingga rentan XSS. Pengguna [[C0]] sering memakai live chat untuk menanyakan produk Lightweight "l33t" Leather Jacket. Untuk menyelesaikan lab, gunakan indirect prompt injection demi melancarkan XSS yang menghapus [[C1]].</p><div class="highlightedarea"><h4>Pengetahuan yang dibutuhkan</h4><p>Untuk menyelesaikan lab ini, Anda perlu mengetahui:</p><ul><li>Cara menguji dan menyusun payload XSS (<a href="/web-security/cross-site-scripting">Cross-site scripting (XSS)</a>).</li><li>Cara melancarkan indirect prompt injection (<a href="/web-security/llm-attacks">Web LLM attacks</a>).</li></ul></div>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <div class="highlightedarea">
        <h4>Catatan</h4>
        <p>Lab Web LLM attacks memakai LLM langsung (live). Karena sifat respons LLM yang dinamis, Anda terkadang perlu menyesuaikan kalimat prompt agar berhasil menyelesaikan lab.</p>
    </div>
    <p><strong>Membuat akun pengguna</strong></p>
    <ol>
        <li><p>Klik <strong>Register</strong> untuk membuka halaman pendaftaran.</p></li>
        <li><p>Isi data dengan alamat <strong>Email</strong> yang tertera di bagian atas halaman <strong>Email client</strong> lab Anda.</p></li>
        <li><p>Klik <strong>Register</strong> untuk mengirim email konfirmasi.</p></li>
        <li><p>Buka klien email dan klik tautan konfirmasi.</p></li>
    </ol>
    <p><strong>Menguji XSS</strong></p>
    <ol>
        <li><p>Login ke akun Anda.</p></li>
        <li><p>Dari beranda, klik <strong>Live chat</strong>.</p></li>
        <li><p>Uji XSS dengan mengirim string [[C0]] ke LLM. Munculnya kotak alert menandakan jendela obrolan rentan terhadap XSS.</p></li>
        <li><p>Buka produk selain jaket kulit (misalnya gift wrap).</p></li>
        <li><p>Tambahkan payload XSS sama sebagai ulasan. Payload di-encode aman di HTML halaman ulasan.</p></li>
        <li><p>Kembali ke obrolan dan tanyakan fungsi apa yang didukung LLM; LLM memiliki fungsi [[C1]] pengambil data produk dan ulasannya.</p></li>
        <li><p>Minta LLM menceritakan ulasan gift wrap; LLM menandai ulasan tersebut sebagai mencurigakan karena mampu mendeteksi payload berbahaya.</p></li>
    </ol>
    <p><strong>Menguji serangan</strong></p>
    <ol>
        <li>
            <p>Hapus komentar uji di halaman gift wrap lalu ganti dengan payload XSS minimal pengirim formulir hapus akun:</p>
            <p>[[C2]]</p>
        </li>
        <li><p>Tanyakan kembali ulasan gift wrap; LLM membalas galat dan mengabaikan payload berbahaya.</p></li>
        <li>
            <p>Buat ulasan baru yang menyamarkan payload XSS agar LLM mengulanginya apa adanya:</p>
            [[C3]]
        </li>
        <li><p>Hapus ulasan lama di halaman gift wrap dan kirimkan ulasan baru ini.</p></li>
        <li><p>Minta LLM membaca ulasan gift wrap lagi; kali ini LLM menyertakan iframe kecil dalam responsnya.</p></li>
        <li><p>Klik <strong>My account</strong> dan pastikan Anda sudah logout dan akun Anda terhapus.</p></li>
    </ol>
    <p><strong>Mengeksploitasi kerentanan</strong></p>
    <ol>
        <li><p>Buat akun baru lalu login.</p></li>
        <li><p>Dari beranda, buka halaman produk jaket kulit.</p></li>
        <li>
            <p>Tambahkan ulasan berisi prompt XSS tersembunyi serupa dengan mengubah "gift wrap" menjadi "jacket":</p>
            [[C4]]
        </li>
        <li><p>Tunggu [[C5]] menanyakan informasi jaket kulit kepada LLM; prompt suntikan akan menghapus akunnya dan menyelesaikan lab.</p></li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    'f553d26639323741882a8e6a3f3fb79167e594bb7b2c044c795fe0a447089d30' => [
        'title' => 'Mengeksploitasi agen AI untuk melakukan tindakan destruktif',
        'description_html' => '<p>Lab ini menampilkan pemindai bertenaga AI yang memeriksa konten buatan pengguna. Pemindai diberi kredensial login untuk [[C0]] agar dapat menelusuri area situs terautentikasi.</p><p>Anda dapat masuk ke akun Anda menggunakan kredensial berikut: [[C1]].</p><p>Untuk menyelesaikan lab, hapus [[C2]].</p><p>Untuk memindai situs, pilih satu postingan blog lalu klik <strong>Scan site</strong>.</p><div class="highlightedarea"><h4>Catatan</h4><p>Lab ini menggunakan LLM langsung (live) yang responsnya tidak selalu terduga. Jika tidak sesuai harapan, ubah prompt Anda atau ulangi pemindaian.</p></div><div class="highlightedarea"><h4>Pengetahuan yang dibutuhkan</h4><p>Untuk menyelesaikan lab ini, Anda perlu mengetahui cara indirect prompt injection memanipulasi perilaku LLM lewat konten pihak ketiga.</p><p>Informasi selengkapnya tersedia di topik <a href="/web-security/llm-attacks/ai-powered-scanner-vulnerabilities">Kerentanan pemindai bertenaga AI</a>.</p></div><h4>Pengumpulan data</h4><p>Lab pada subtopik ini mengumpulkan data telemetri termasuk log interaksi AI. Lihat <a href="/web-security/lab-telemetry-privacy-notice">Pemberitahuan Privasi Telemetri Lab Academy</a>.</p>',
        'sections' => [
            0 => '<p>Solusi untuk lab ini akan segera dipublikasikan. Silakan periksa kembali nanti.</p>',
        ],
    ],
    'd18417033e8141b19293be7df1878edcdda4a7509800b5721e0f4dad954ca8c5' => [
        'title' => 'Mengeksploitasi agen AI untuk mengekfiltrasi informasi sensitif',
        'description_html' => '<p>Lab ini rentan terhadap indirect prompt injection. Pemindai bertenaga AI memiliki akses ke data sensitif termasuk API key saat mengaudit situs dan dibekali kredensial login milik [[C0]].</p><p>Anda dapat masuk ke akun Anda menggunakan kredensial berikut: [[C1]].</p><p>Untuk menyelesaikan lab, ekfiltrasi dan kirimkan API key milik pengguna [[C2]].</p><p>Untuk memindai situs, pilih satu postingan blog lalu klik <strong>Scan site</strong>.</p><div class="highlightedarea"><h4>Catatan</h4><p>Lab ini menggunakan LLM langsung (live) yang responsnya tidak selalu terduga. Jika tidak sesuai harapan, ubah prompt Anda atau ulangi pemindaian.</p></div><div class="highlightedarea"><h4>Pengetahuan yang dibutuhkan</h4><p>Untuk menyelesaikan lab ini, Anda perlu mengetahui cara indirect prompt injection memanipulasi perilaku LLM lewat konten pihak ketiga.</p><p>Informasi selengkapnya tersedia di topik <a href="/web-security/llm-attacks/ai-powered-scanner-vulnerabilities">Kerentanan pemindai bertenaga AI</a>.</p></div><h4>Pengumpulan data</h4><p>Lab pada subtopik ini mengumpulkan data telemetri termasuk log interaksi AI. Lihat <a href="/web-security/lab-telemetry-privacy-notice">Pemberitahuan Privasi Telemetri Lab Academy</a>.</p>',
        'sections' => [
            0 => '<p>Solusi untuk lab ini akan segera dipublikasikan. Silakan periksa kembali nanti.</p>',
        ],
    ],
    '7ce40a52bd305d8f85d8dd06e83819f2d682bfd364bee8b3511ed3aa9eec3a5c' => [
        'title' => 'Mengeksploitasi agen AI untuk memicu kerentanan sekunder',
        'description_html' => '<p>Lab ini rentan terhadap indirect prompt injection. Pemindai bertenaga AI di aplikasi dapat dimanipulasi untuk mengeksploitasi celah routing-based SSRF di jaringan internal.</p><p>Anda dapat masuk ke akun Anda menggunakan kredensial berikut: [[C0]].</p><p>Untuk menyelesaikan lab, hapus [[C1]].</p><div class="highlightedarea"><h4>Catatan</h4><p>Lab ini menggunakan LLM langsung (live) yang responsnya tidak selalu terduga. Jika tidak sesuai harapan, ubah prompt Anda atau ulangi pemindaian.</p></div><div class="highlightedarea"><h4>Pengetahuan yang dibutuhkan</h4><p>Untuk menyelesaikan lab ini, Anda perlu mengetahui:</p><ul><li>Cara indirect prompt injection memanipulasi perilaku LLM lewat konten pihak ketiga.</li><li>Cara routing-based SSRF dipicu lewat manipulasi header [[C2]].</li></ul><p>Informasi selengkapnya tersedia di topik <a href="/web-security/llm-attacks/ai-powered-scanner-vulnerabilities">Kerentanan pemindai bertenaga AI</a>.</p></div><h4>Pengumpulan data</h4><p>Lab pada subtopik ini mengumpulkan data telemetri termasuk log interaksi AI. Lihat <a href="/web-security/lab-telemetry-privacy-notice">Pemberitahuan Privasi Telemetri Lab Academy</a>.</p>',
        'sections' => [
            0 => '<p>Solusi untuk lab ini akan segera dipublikasikan. Silakan periksa kembali nanti.</p>',
        ],
    ],
    '2fbd4763a2e002deb0d9a9250e106c56028227d770d2ff30f2e9cf9423c47dfd' => [
        'title' => 'Melewati pertahanan pemindai AI untuk mengekfiltrasi informasi sensitif',
        'description_html' => '<p>Lab ini menampilkan pemindai bertenaga AI yang dapat mengakses data sensitif termasuk API key dengan kredensial login milik [[C0]].</p><p>Pemindai tersebut memiliki beberapa pertahanan bawaan terhadap indirect prompt injection.</p><p>Anda dapat masuk ke akun Anda menggunakan kredensial berikut: [[C1]].</p><p>Untuk menyelesaikan lab, ekfiltrasi dan kirimkan API key milik pengguna [[C2]].</p><p>Untuk memindai situs, pilih satu postingan blog lalu klik <strong>Scan site</strong>.</p><div class="highlightedarea"><h4>Catatan</h4><p>Lab ini menggunakan LLM langsung (live) yang responsnya tidak selalu terduga. Jika tidak sesuai harapan, ubah prompt Anda atau ulangi pemindaian.</p></div><div class="highlightedarea"><h4>Pengetahuan yang dibutuhkan</h4><p>Untuk menyelesaikan lab ini, Anda perlu mengetahui cara indirect prompt injection memanipulasi perilaku LLM lewat konten pihak ketiga.</p><p>Informasi selengkapnya tersedia di topik <a href="/web-security/llm-attacks/ai-powered-scanner-vulnerabilities">Kerentanan pemindai bertenaga AI</a>.</p></div><h4>Pengumpulan data</h4><p>Lab pada subtopik ini mengumpulkan data telemetri termasuk log interaksi AI. Lihat <a href="/web-security/lab-telemetry-privacy-notice">Pemberitahuan Privasi Telemetri Lab Academy</a>.</p>',
        'sections' => [
            0 => '<p>Solusi untuk lab ini akan segera dipublikasikan. Silakan periksa kembali nanti.</p>',
        ],
    ],
];
