<?php

return [
    'ca187b1fb490deddce4034d443cb9afbf5b8279422a765b7d48040c50f327e9b' => [
        'title' => 'Kepercayaan berlebih pada kontrol sisi klien',
        'description_html' => '<p>Lab ini tidak memvalidasi input pengguna secara memadai. Anda dapat mengeksploitasi cacat logika pada alur pembelian untuk membeli barang dengan harga tidak semestinya. Untuk menyelesaikan lab, beli "Lightweight l33t leather jacket".</p><p>Anda dapat masuk ke akun Anda menggunakan kredensial berikut: [[C0]]</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Dengan Burp berjalan, login dan coba beli jaket kulit. Pesanan ditolak karena kredit toko Anda tidak mencukupi.</li>
        <li>Di Burp, buka "Proxy" &gt; "HTTP history" dan pelajari alur pesanan. Saat menambahkan item ke keranjang, permintaan menyertakan parameter [[C0]]. Kirim permintaan [[C1]] ke Burp Repeater.</li>
        <li>Di Burp Repeater, ubah harga menjadi bilangan bulat acak lalu kirim permintaan. Segarkan keranjang dan pastikan harga berubah sesuai masukan Anda.</li>
        <li>Ulangi proses ini untuk menetapkan harga di bawah sisa kredit toko Anda.</li>
        <li>Selesaikan pesanan untuk menyelesaikan lab.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '8593e55b788d1c4403ccad45020972079a8e89c5669ecf6d9be2cd5c69c77877' => [
        'title' => 'Kerentanan logika tingkat tinggi',
        'description_html' => '<p>Lab ini tidak memvalidasi input pengguna secara memadai. Anda dapat mengeksploitasi cacat logika pada alur pembelian untuk membeli barang dengan harga tidak semestinya. Untuk menyelesaikan lab, beli "Lightweight l33t leather jacket".</p><p>Anda dapat masuk ke akun Anda menggunakan kredensial berikut: [[C0]]</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Dengan Burp berjalan, login dan masukkan satu barang murah ke keranjang.</li>
        <li>Di Burp, buka "Proxy" &gt; "HTTP history" dan amati jumlah barang ditentukan oleh parameter di permintaan [[C0]].</li>
        <li>Buka tab "Intercept", nyalakan intersepsi, tambahkan barang lain ke keranjang, lalu periksa permintaan [[C1]] yang terintersep di Burp.</li>
        <li>Ubah parameter [[C2]] menjadi bilangan bulat acak lalu teruskan permintaan. Amati jumlah di keranjang ikut berubah sesuai masukan Anda.</li>
        <li>Ulangi dengan meminta jumlah bernilai negatif dan pastikan jumlah di keranjang berkurang.</li>
        <li>Minta jumlah negatif melebihi jumlah unit yang ada di keranjang sehingga jumlah barang menjadi negatif dan total harga menjadi negatif.</li>
        <li>Masukkan jaket kulit ke keranjang seperti biasa, lalu tambahkan jumlah negatif item lain hingga total harga berada di bawah sisa kredit toko Anda.</li>
        <li>Selesaikan pesanan untuk menyelesaikan lab.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '07b14e865f15e49f0856ab8db29ab190045abf578eff9ee7a794692eb305a391' => [
        'title' => 'Kontrol keamanan yang tidak konsisten',
        'description_html' => '<p>Logika yang cacat pada lab ini memungkinkan pengguna sembarang mengakses fungsionalitas administratif yang seharusnya hanya tersedia bagi karyawan perusahaan. Untuk menyelesaikan lab, akses panel admin dan hapus pengguna [[C0]].</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Buka lab lalu buka tab "Target" &gt; "Site map" di Burp. Klik kanan domain lab dan pilih "Engagement tools" &gt; "Discover content".</li>
        <li>Klik "Session is not running" untuk memulai penemuan konten. Di tab "Site map" dialog tersebut, amati ditemukannya path [[C0]].</li>
        <li>Coba kunjungi [[C1]]; akses ditolak, namun pesan galat mengungkap hanya pengguna [[C2]] yang mendapat akses.</li>
        <li>
            <p>Buka halaman pendaftaran akun. Terdapat pesan bagi karyawan [[C3]] untuk memakai email perusahaan mereka. Daftarkan akun memakai email acak berformat:</p>
            [[C4]]
            <p>Anda dapat melihat domain email Anda melalui tombol "Email client".</p>
        </li>
        <li>Buka klien email dan klik tautan di email konfirmasi untuk menuntaskan pendaftaran.</li>
        <li>Login dengan akun baru lalu buka halaman "My account". Gunakan fitur ubah email untuk menggantinya ke alamat acak berdomain [[C5]].</li>
        <li>Anda kini memiliki akses ke panel admin; buka panel tersebut dan hapus [[C6]] untuk menyelesaikan lab.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    'ce7411a23ddad977fdc192a1a252b8737d674481920a71bc5fd307bb5a53aa77' => [
        'title' => 'Penegakan aturan bisnis yang cacat',
        'description_html' => '<p>Lab ini memiliki cacat logika pada alur pembeliannya. Untuk menyelesaikan lab, eksploitasi celah ini guna membeli "Lightweight l33t leather jacket".</p><p>Anda dapat masuk ke akun Anda menggunakan kredensial berikut: [[C0]]</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Login dan catat adanya kode kupon [[C0]].</li>
        <li>Di bagian bawah halaman, daftar buletin (newsletter) untuk memperoleh kode kupon kedua, yaitu [[C1]].</li>
        <li>Masukkan jaket kulit ke keranjang Anda.</li>
        <li>Buka halaman checkout dan terapkan kedua kode kupon untuk memperoleh potongan harga.</li>
        <li>Coba pakai kupon berulang kali: memasukkan kode yang sama dua kali berturut-turut ditolak, tetapi bergantian memakai kedua kode tetap diterima.</li>
        <li>Pakai kedua kupon secara bergantian sampai total order lebih kecil daripada sisa kredit toko Anda, lalu selesaikan pembelian.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '7d3ebe9916b96a36642a8bd0179888fbcddef63a401c684a077d9877a0966aa4' => [
        'title' => 'Cacat logika tingkat rendah',
        'description_html' => '<p>Lab ini tidak memvalidasi input pengguna secara memadai. Anda dapat mengeksploitasi cacat logika di alur pembelian untuk membeli barang dengan harga tidak semestinya. Untuk menyelesaikan lab, beli "Lightweight l33t leather jacket".</p><p>Anda dapat masuk ke akun Anda menggunakan kredensial berikut: [[C0]]</p><div class="component-solution expandable-container"><details><summary><h4><span class="icon-erlenmeyer"></span> Petunjuk</h4></summary><div class="content"><div><p>Anda perlu memakai Burp Intruder (atau Turbo Intruder) untuk menyelesaikan lab ini.</p><p>Agar kenaikan harga bertambah terprediksi, atur serangan agar hanya mengirim satu permintaan pada satu waktu lewat opsi <strong>Maximum concurrent requests</strong> di pengaturan resource pool.</p></div></div></details></div>',
        'sections' => [
            0 => '<div class="content"><div><p>Anda perlu memakai Burp Intruder (atau Turbo Intruder) untuk menyelesaikan lab ini.</p><p>Agar kenaikan harga bertambah terprediksi, atur serangan agar hanya mengirim satu permintaan pada satu waktu lewat opsi <strong>Maximum concurrent requests</strong> di pengaturan resource pool.</p></div></div>',
            1 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Dengan Burp berjalan, login dan coba beli jaket kulit. Pesanan ditolak karena kredit toko tidak cukup. Kirim permintaan [[C0]] ke Burp Repeater.</li>
        <li>Di Burp Repeater, amati jumlah maksimum tiap permintaan dibatasi 2 digit. Kirim permintaan ini ke Burp Intruder.</li>
        <li>Di <strong>Intruder</strong>, setel parameter [[C1]] menjadi [[C2]].</li>
        <li>Di panel <strong>Payloads</strong>, pilih tipe <strong>Null payloads</strong> dan pilih <strong>Continue indefinitely</strong>, lalu mulai serangan.</li>
        <li>Sambil serangan berjalan, segarkan halaman keranjang secara berkala hingga total harga meloncat menjadi bilangan negatif besar lalu naik mendekati 0 (terjadi integer overflow pada batas 2.147.483.647 kembali ke -2.147.483.648).</li>
        <li>Kosongkan keranjang Anda. Karena harga jaket disimpan dalam sen (133700), kita perlu menambahkan unit cukup banyak agar overflow berputar kembali dan berhenti di antara $0 hingga $100 sisa kredit Anda.</li>
        <li>Buat serangan Intruder serupa, kali ini pada <strong>Payload configuration</strong> hasilkan tepat [[C3]] payload.</li>
        <li>Klik <strong><span class="icon-pie-chart"></span> Resource pool</strong> dan atur <strong>Maximum concurrent requests</strong> ke [[C4]], lalu jalankan serangan.</li>
        <li>Setelah serangan Intruder selesai, kembali ke permintaan [[C5]] di Burp Repeater dan kirim satu permintaan berisi [[C6]] buah jaket sehingga total harga menjadi [[C7]].</li>
        <li>Tambahkan barang lain via Repeater dengan jumlah secukupnya agar total akhir berada di antara $0 dan $100.</li>
        <li>Selesaikan pesanan untuk menyelesaikan lab.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '2cfddd3fae848e161277e28cc5cc7782f2b4baa2cbefbd2a3dce178fe656ad17' => [
        'title' => 'Penanganan tidak konsisten atas input luar biasa',
        'description_html' => '<p>Lab ini tidak memvalidasi input pengguna secara memadai. Anda dapat mengeksploitasi cacat logika di proses pendaftaran akun untuk mendapat akses administratif. Untuk menyelesaikan lab, akses panel admin dan hapus pengguna [[C0]].</p><div class="component-solution expandable-container"><details><summary><h4><span class="icon-erlenmeyer"></span> Petunjuk</h4></summary><div class="content"><div><p>Gunakan tautan di banner lab untuk membuka klien email pribadi Anda, yang menampilkan semua email ke [[C1]] dan subdomain sembarangnya.</p></div></div></details></div>',
        'sections' => [
            0 => '<div class="content"><div><p>Gunakan tautan di banner lab untuk membuka klien email pribadi Anda, yang menampilkan semua email ke [[C0]] dan subdomain sembarangnya.</p></div></div>',
            1 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Sambil mem-proxy lalu lintas lewat Burp, buka tab "Target" &gt; "Site map", klik kanan domain lab, dan pilih "Engagement tools" &gt; "Discover content".</li>
        <li>Mulai penemuan konten dan amati path [[C0]] muncul di tab "Site map".</li>
        <li>Coba buka [[C1]]; akses ditolak dengan pesan yang mengungkap pengguna [[C2]] diizinkan masuk.</li>
        <li>Buka halaman pendaftaran dan perhatikan instruksi untuk karyawan [[C3]].</li>
        <li>Buka klien email dari tombol di banner lab dan catat ID unik domain email Anda ([[C4]]).</li>
        <li>
            <p>Kembali ke lab dan daftarkan akun memakai alamat email sangat panjang dengan format:</p>
            [[C5]]
            <p>Buat [[C6]] sepanjang minimal 200 karakter.</p>
        </li>
        <li>Buka klien email dan klik tautan konfirmasi untuk menuntaskan pendaftaran.</li>
        <li>Login dan buka halaman "My account". Amati alamat email Anda terpotong di batas 255 karakter.</li>
        <li>Logout lalu kembali ke halaman pendaftaran.</li>
        <li>
            <p>Daftarkan akun baru memakai alamat email panjang lain yang menyertakan [[C7]] sebagai subdomain:</p>
            [[C8]]
            <p>Atur panjang [[C9]] secara presisi sehingga huruf [[C10]] di akhir [[C11]] tepat berada pada karakter ke-255.</p>
        </li>
        <li>Klik tautan konfirmasi di klien email Anda lalu login ke akun baru tersebut. Email konfirmasi tetap terkirim ke kotak masuk Anda sementara basis data memotong alamat akun di karakter ke-255 menjadi alamat [[C12]] valid, memberi Anda akses ke panel admin.</li>
        <li>Buka panel admin dan hapus [[C13]] untuk menyelesaikan lab.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '05a619f04b486230a3144985ade21e739b2d88052bb72e902cd033c906b991e3' => [
        'title' => 'Isolasi lemah pada endpoint dwiguna',
        'description_html' => '<p>Lab ini membuat asumsi cacat mengenai hak akses pengguna berdasarkan inputnya, sehingga logika manajemen akun dapat dieksploitasi untuk mengakses akun pengguna lain. Untuk menyelesaikan lab, akses akun [[C0]] dan hapus pengguna [[C1]].</p><p>Anda dapat masuk ke akun Anda menggunakan kredensial berikut: [[C2]]</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Dengan Burp berjalan, login dan buka halaman akun Anda.</li>
        <li>Ubah kata sandi Anda.</li>
        <li>Pelajari permintaan [[C0]] di Burp Repeater.</li>
        <li>Amati bahwa jika parameter [[C1]] dihapus seluruhnya, Anda tetap bisa mengganti kata sandi tanpa memberikan kata sandi saat ini.</li>
        <li>Akun yang kata sandinya diubah ditentukan oleh parameter [[C2]]. Ubah menjadi [[C3]] lalu kirim ulang permintaan.</li>
        <li>Logout lalu masuk sebagai [[C4]] menggunakan kata sandi baru tersebut.</li>
        <li>Buka panel admin dan hapus [[C5]] untuk menyelesaikan lab.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    'b20989c23ae664ef4d1f4d060455e20d6c019ae17819049dfad91790a7c55765' => [
        'title' => 'Validasi alur kerja tidak memadai',
        'description_html' => '<p>Lab ini membuat asumsi cacat mengenai urutan langkah pada alur pembelian. Untuk menyelesaikan lab, eksploitasi celah ini untuk membeli "Lightweight l33t leather jacket".</p><p>Anda dapat masuk ke akun Anda menggunakan kredensial berikut: [[C0]]</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Dengan Burp berjalan, login lalu beli barang murah yang masih terjangkau oleh kredit toko Anda.</li>
        <li>Pelajari proxy history: setelah [[C0]], Anda dialihkan ke halaman konfirmasi pesanan. Kirim permintaan [[C1]] ke Burp Repeater.</li>
        <li>Masukkan jaket kulit ke keranjang belanja Anda.</li>
        <li>Di Burp Repeater, kirim ulang permintaan konfirmasi pesanan. Pesanan diselesaikan tanpa mengurangi kredit toko Anda dan lab pun selesai.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    'f009e13156910cf7897bc7ed85b32662e8b2753196347950c3b3c51d86b9c3c5' => [
        'title' => 'Bypass autentikasi melalui state machine yang cacat',
        'description_html' => '<p>Lab ini membuat asumsi cacat mengenai urutan peristiwa pada proses login. Untuk menyelesaikan lab, eksploitasi celah ini untuk melewati autentikasi, mengakses antarmuka admin, dan menghapus pengguna [[C0]].</p><p>Anda dapat masuk ke akun Anda menggunakan kredensial berikut: [[C1]]</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Dengan Burp berjalan, selesaikan proses login dan amati bahwa Anda diminta memilih peran sebelum masuk ke beranda.</li>
        <li>Gunakan alat penemuan konten untuk menemukan path [[C0]].</li>
        <li>Coba buka [[C1]] langsung dari halaman pemilihan peran dan amati akses ditolak.</li>
        <li>Logout dan kembali ke halaman login. Aktifkan intersepsi proxy di Burp lalu login kembali.</li>
        <li>Teruskan permintaan [[C2]]. Saat permintaan berikutnya yaitu [[C3]] muncul, batalkan (drop) permintaan itu lalu buka beranda lab. Peran Anda otomatis menjadi [[C4]] dan Anda memiliki akses ke panel admin.</li>
        <li>Hapus [[C5]] untuk menyelesaikan lab.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '4481d16f7bd443604bf74cef06da6df4b6da2b010f6f5a6b33358551d560c9d0' => [
        'title' => 'Cacat logika uang tak terbatas (infinite money)',
        'description_html' => '<p>Lab ini memiliki cacat logika pada alur pembeliannya. Untuk menyelesaikan lab, eksploitasi celah ini untuk membeli "Lightweight l33t leather jacket".</p><p>Anda dapat masuk ke akun Anda menggunakan kredensial berikut: [[C0]]</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <p>Solusi ini memakai Burp Intruder untuk mengotomatiskan pembelian dan penukaran gift card. Pengguna yang mahir Python dapat pula memakai Turbo Intruder.</p>
    <ol>
        <li>Dengan Burp berjalan, login dan daftar buletin untuk memperoleh kupon [[C0]]. Anda juga dapat membeli gift card $10 lalu menukarkannya di halaman <strong>My account</strong>.</li>
        <li>Masukkan satu gift card ke keranjang, lanjut ke checkout, terapkan kupon untuk mendapat diskon 30%, selesaikan pesanan, dan salin kode gift card.</li>
        <li>Tukarkan gift card di halaman akun Anda; alur ini menambah $3 bersih ke saldo kredit toko Anda. Kini otomatiskan alur tersebut.</li>
        <li>Di proxy history, amati penukaran gift card mengirim kode lewat parameter [[C1]] pada permintaan [[C2]].</li>
        <li>Klik <span class="icon-settings"></span> <strong>Settings</strong> di bilah alat atas.</li>
        <li>Klik <strong>Sessions</strong> lalu klik <strong>Add</strong> pada <strong>Session handling rules</strong> untuk membuka editor aturan sesi.</li>
        <li>Di tab <strong>Scope</strong>, di bawah <strong>URL scope</strong> pilih <strong>Include all URLs</strong>.</li>
        <li>Kembali ke tab <strong>Details</strong>, di bawah <strong>Rule actions</strong> klik <strong>Add</strong> &gt; <strong>Run a macro</strong>, lalu klik <strong>Add</strong> di <strong>Select macro</strong> untuk membuka <strong>Macro Recorder</strong>.</li>
        <li>
            <p>Pilih rangkaian 5 permintaan berikut:</p>
            [[C3]]
            <p>Kemudian klik <strong>OK</strong> untuk membuka <strong>Macro Editor</strong>.</p>
        </li>
        <li>Pilih [[C4]], klik <strong>Configure item</strong>, lalu klik <strong>Add</strong> untuk membuat parameter kustom bernama [[C5]] dengan menyorot kode gift card di bagian bawah respons, lalu klik <strong>OK</strong> dua kali.</li>
        <li>Pilih permintaan [[C6]], klik <strong>Configure item</strong>, lalu di <strong>Parameter handling</strong> arahkan parameter [[C7]] agar diambil dari respons sebelumnya (respons ke-4), dan klik <strong>OK</strong>.</li>
        <li>Di <strong>Macro Editor</strong>, klik <strong>Test macro</strong>; pastikan kode pada respons [[C8]] cocok dengan parameter [[C10]] permintaan [[C9]] dan mendapat status [[C11]]. Klik <strong>OK</strong> hingga kembali ke jendela utama Burp.</li>
        <li>Kirim permintaan [[C12]] ke Burp Intruder dan pastikan <strong>Sniper attack</strong> aktif.</li>
        <li>Di panel <strong>Payloads</strong>, pilih tipe <strong>Null payloads</strong> dan hasilkan sebanyak [[C13]] payload.</li>
        <li>Buka panel <strong><span class="icon-pie-chart"></span> Resource pool</strong> dan tetapkan <strong>Maximum concurrent requests</strong> ke [[C14]], lalu mulai serangan.</li>
        <li>Setelah serangan selesai, kredit toko Anda mencukupi untuk membeli jaket dan menyelesaikan lab.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '6595c840a41181221c4f4f7c250580d7d9d5f9fa1b3d7aa1c9761ecdd2f33df5' => [
        'title' => 'Bypass autentikasi melalui oracle enkripsi',
        'description_html' => '<p>Lab ini memiliki cacat logika yang memaparkan oracle enkripsi kepada pengguna. Untuk menyelesaikan lab, eksploitasi celah ini untuk masuk ke panel admin dan menghapus pengguna [[C0]].</p><p>Anda dapat masuk ke akun Anda menggunakan kredensial berikut: [[C1]]</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Login dengan opsi "Stay logged in" aktif lalu kirim sebuah komentar. Amati bahwa cookie [[C0]] terenkripsi.</li>
        <li>Saat mencoba mengirim komentar memakai alamat email tidak valid, respons menyetel cookie [[C1]] terenkripsi sebelum mengalihkan Anda ke postingan blog.</li>
        <li>
            <p>Pesan galat memantulkan masukan dari parameter [[C2]] dalam bentuk teks polos:</p>
            [[C3]]
            <p>Hal ini menandakan pesan didekripsi dari cookie [[C4]]. Kirim permintaan [[C5]] dan permintaan [[C6]] berikutnya (berisi cookie notifikasi) ke Burp Repeater.</p>
        </li>
        <li>Di Repeater, parameter [[C7]] di permintaan [[C8]] dapat mengenkripsi data sembarang dan menampilkan ciphertext-nya di header [[C9]], sedangkan cookie [[C10]] di permintaan [[C11]] mendekripsinya ke pesan galat. Namai kedua tab ini [[C12]] dan [[C13]].</li>
        <li>
            <p>Pada tab decrypt, salin cookie [[C14]] ke cookie [[C15]] lalu kirim; respons menampilkan nilai terdekripsi dari [[C16]], misalnya:</p>
            [[C17]]
            <p>Cookie berformat [[C18]]. Salin stempel waktunya.</p>
        </li>
        <li>Di tab encrypt, ubah parameter email menjadi [[C19]], kirim permintaan, lalu salin cookie [[C20]] baru dari respons.</li>
        <li>Dekripsikan cookie baru tersebut: awalan 23 karakter [[C21]] otomatis ditambahkan sebelum nilai parameter [[C22]]. Kirim cookie [[C23]] ke Burp Decoder.</li>
        <li>Di Decoder, lakukan URL-decode dan Base64-decode pada cookie tersebut.</li>
        <li>Di Burp Repeater, buka tab "Hex", blok 23 byte pertama, klik kanan lalu pilih "Delete selected bytes".</li>
        <li>Encode ulang hasilnya lalu kirim di cookie [[C24]] pada tab decrypt. Pesan galat mengungkap enkripsi berbasis blok kelipatan 16 byte, sehingga awalan [[C25]] harus diberi bantalan agar total yang dipotong menjadi kelipatan 16.</li>
        <li>
            <p>Kembali ke tab encrypt dan tambahkan 9 karakter di awal nilai cookie sasaran, misalnya:</p>
            [[C26]]
            <p>Enkripsikan masukan ini lalu uji dekripsinya di tab decrypt.</p>
        </li>
        <li>Dekode ciphertext baru dengan URL dan Base64-decode di Decoder, hapus 32 byte pertama, encode ulang, lalu uji di parameter [[C27]] tab decrypt. Awalan [[C28]] hilang sempurna dan hanya tersisa [[C29]].</li>
        <li>Dari proxy history, kirim permintaan [[C30]] ke Repeater, hapus cookie [[C31]] sepenuhnya, ganti cookie [[C32]] dengan ciphertext buatan Anda, lalu kirim. Anda kini masuk sebagai administrator.</li>
        <li>Buka [[C33]] lewat Repeater dan minta [[C34]] untuk menghapus Carlos serta menyelesaikan lab.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '07b1444427ce26a6ad6a4eafdd9a2500cabaef214aa99c6332f8d7f4bdf1e885' => [
        'title' => 'Melewati kontrol akses memanfaatkan ketidaksesuaian penguraian alamat email',
        'description_html' => '<p>Lab ini memvalidasi alamat email agar penyerang tidak dapat mendaftarkan domain tidak sah. Namun terdapat ketidaksesuaian parser antara logika validasi dan pustaka pengurai alamat email.</p><p>Untuk menyelesaikan lab, eksploitasi celah ini untuk mendaftarkan akun lalu hapus [[C0]].</p><div class="highlightedarea"><h4>Pengetahuan yang dibutuhkan</h4><p>Untuk menyelesaikan lab ini, pahami teknik pada riset <a href="https://portswigger.net/research/splitting-the-email-atom">Splitting the Email Atom: Exploiting Parsers to Bypass Access Controls</a> oleh Gareth Heyes dari PortSwigger Research.</p></div>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <h2>Mengidentifikasi pembatasan pendaftaran</h2>
    <ol>
        <li><p>Buka lab lalu klik <strong>Register</strong>.</p></li>
        <li><p>Coba daftarkan akun memakai email [[C0]].</p></li>
        <li><p>Aplikasi memblokir permintaan dengan pesan bahwa domain email harus berupa [[C1]], membuktikan pemeriksaan domain aktif saat registrasi.</p></li>
    </ol>
    <h2>Menyelidiki ketidaksesuaian encoding</h2>
    <ol>
        <li>
            <p>Coba daftarkan akun dengan alamat email berikut:</p>
            <p>[[C2]].</p>
            <p>Ini adalah alamat [[C3]] dengan bagian abc memakai Q encoding sesuai standar "encoded-word".</p>
        </li>
        <li><p>Pendaftaran diblokir dengan pesan: "Registration blocked for security reasons."</p></li>
        <li>
            <p>Coba daftarkan akun dengan email berenkode UTF-8 berikut:</p>
            <p>[[C4]].</p>
        </li>
        <li><p>Pendaftaran tetap diblokir oleh pesan yang sama, menandakan server menolak upaya encoded-word biasa.</p></li>
        <li>
            <p>Coba daftarkan akun memakai email berenkode UTF-7 berikut:</p>
            <p>[[C5]].</p>
        </li>
        <li><p>Percobaan ini tidak memicu galat karena server tidak mengenali UTF-7 sebagai ancaman, sehingga bisa dipakai mengarahkan email konfirmasi ke server eksploitasi Anda sekaligus tetap memenuhi syarat domain [[C6]].</p></li>
    </ol>
    <h2>Mengeksploitasi kerentanan memakai UTF-7</h2>
    <ol>
        <li>
            <p>Daftarkan akun memakai email berenkode UTF-7 berikut:</p>
            <p>[[C7]].</p>
            <p>Ini merepresentasikan string [[C8]] dengan simbol @ dan spasi di-encode sebagai UTF-7.</p>
        </li>
        <li><p>Klik <strong>Email client</strong> dan amati email validasi pendaftaran masuk. Validasi lolos karena akhiran [[C9]], sedangkan server email menafsirkan tujuannya sebagai [[C10]].</p></li>
        <li><p>Klik tautan konfirmasi untuk mengaktifkan akun.</p></li>
    </ol>
    <h2>Mendapatkan akses admin</h2>
    <ol>
        <li><p>Klik <strong>My account</strong> lalu login memakai detail yang baru didaftarkan.</p></li>
        <li><p>Klik <strong>Admin panel</strong> untuk membuka daftar pengguna.</p></li>
        <li><p>Hapus pengguna [[C11]] untuk menyelesaikan lab.</p></li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
];
