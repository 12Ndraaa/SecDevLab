<?php

return [
    '16d6e2494470f17d6186fd7f07dc9c7e2220de7ca3d8380fdc86806783644273' => [
        'title' => 'Password reset poisoning dasar',
        'description_html' => '<p>Lab ini rentan terhadap password reset poisoning. Pengguna [[C0]] selalu ceroboh mengklik tautan apa pun di email yang diterimanya. Untuk menyelesaikan lab, masuklah ke akun Carlos.</p><p>Anda dapat masuk ke akun Anda menggunakan kredensial berikut: [[C1]]. Semua email yang dikirim ke akun ini dapat dibaca lewat klien email di server eksploitasi.</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Buka halaman login dan perhatikan fitur "Forgot your password?". Minta reset kata sandi untuk akun Anda sendiri.</li>
        <li>Buka server eksploitasi dan buka klien email. Anda akan menerima email berisi tautan reset kata sandi dengan parameter query [[C0]].</li>
        <li>Klik tautan tersebut dan masukkan kata sandi baru apa saja untuk melihat proses reset.</li>
        <li>Di Burp, pelajari HTTP history. Permintaan [[C1]] memicu email reset kata sandi dan membawa username target sebagai parameter body. Kirim permintaan ini ke Burp Repeater.</li>
        <li>Di Burp Repeater, amati bahwa Anda dapat mengubah header Host menjadi nilai acak dan tetap memicu email reset. Cek klien email dan amati URL di email baru kini memakai header Host buatan Anda.</li>
        <li>Kembali di Burp Repeater, ubah header Host menjadi domain server eksploitasi Anda ([[C2]]) dan ubah parameter [[C3]] menjadi [[C4]], lalu kirim permintaan.</li>
        <li>Buka server eksploitasi dan periksa access log. Anda akan menemukan permintaan [[C5]] berisi parameter [[C6]] milik Carlos. Catat token ini.</li>
        <li>Salin URL reset kata sandi asli dari email pertama Anda di klien email. Kunjungi URL tersebut di browser dengan mengganti token Anda menjadi token Carlos dari access log.</li>
        <li>Ubah kata sandi Carlos sesuai keinginan, lalu masuk sebagai [[C7]] untuk menyelesaikan lab.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '5a48933f3a964cb3a951fad54ed62078c63e81e3fcd2df74d5712dc626d14b50' => [
        'title' => 'Bypass autentikasi melalui header Host',
        'description_html' => '<p>Lab ini membuat asumsi tentang tingkat hak akses pengguna berdasarkan HTTP Host header.</p><p>Untuk menyelesaikan lab, akses panel admin dan hapus pengguna [[C0]].</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Kirim permintaan [[C0]] berstatus 200 ke Burp Repeater. Amati bahwa Anda bisa mengganti header Host dengan nilai acak dan tetap mengakses beranda.</li>
        <li>Kunjungi [[C1]] dan amati adanya panel admin di [[C2]].</li>
        <li>Coba kunjungi [[C3]]. Akses ditolak, tetapi pesan galatnya mengungkap panel tersebut dapat diakses pengguna lokal.</li>
        <li>Kirim permintaan [[C4]] ke Burp Repeater.</li>
        <li>Di Burp Repeater, ubah header Host menjadi [[C5]] lalu kirim permintaan. Anda kini mengakses panel admin beserta opsi menghapus pengguna.</li>
        <li>Ubah baris permintaan menjadi [[C6]] dan kirim untuk menghapus [[C7]] guna menyelesaikan lab.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '2d282e25fbe71276663267bbae9175c2dbf0fd2f4916ca195823cf7c8a7d2cbf' => [
        'title' => 'Web cache poisoning melalui permintaan ambigu',
        'description_html' => '<p>Lab ini rentan terhadap web cache poisoning akibat perbedaan cara cache dan aplikasi back-end menangani permintaan ambigu. Seorang pengguna secara berkala mengunjungi beranda situs.</p><p>Untuk menyelesaikan lab, racuni cache agar halaman beranda mengeksekusi [[C0]] di browser korban.</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Di browser Burp, buka lab lalu klik <strong>Home</strong> untuk menyegarkan beranda.</li>
        <li>Di <strong>Proxy &gt; HTTP history</strong>, klik kanan permintaan [[C0]] lalu pilih <strong>Send to Repeater</strong>.</li>
        <li>Di Repeater, amati bahwa situs memvalidasi header Host. Jika diubah langsung, Anda tidak dapat mengakses beranda.</li>
        <li>Pada respons asli, perhatikan header caching yang memberi tahu kapan cache hit terjadi dan usia cache. Tambahkan parameter query acak sebagai cache buster, misalnya [[C1]], setiap kali membutuhkan respons baru dari back-end.</li>
        <li>Amati bahwa jika Anda menambah header Host kedua dengan nilai acak, header tersebut diabaikan saat validasi/routing, tetapi nilainya tercermin pada URL absolut yang mengimpor skrip dari [[C2]].</li>
        <li>Hapus header Host kedua dan kirim lagi memakai cache buster yang sama. Anda tetap menerima respons cache berisi nilai suntikan Anda.</li>
        <li>Buka server eksploitasi dan buat file di [[C3]] berisi payload [[C4]]. Simpan eksploitasi lalu salin nama domain server eksploitasi Anda.</li>
        <li>
            <p>Kembali di Burp Repeater, tambahkan header Host kedua berisi domain server eksploitasi Anda seperti berikut:</p>
            [[C5]]
        </li>
        <li>Kirim permintaan beberapa kali hingga terjadi cache hit berisi URL server eksploitasi Anda. Buka halaman dengan cache buster yang sama di browser untuk memastikan [[C6]] berjalan.</li>
        <li>Di Burp Repeater, hapus cache buster dan kirim ulang sampai cache utama berhasil diracuni. Lab selesai saat korban membuka beranda.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '2744f28d772f25b5878c7fba870871916535bc5ae1458431fb62c5517346c62e' => [
        'title' => 'SSRF berbasis routing',
        'description_html' => '<p>Lab ini rentan terhadap routing-based SSRF lewat header Host. Anda dapat memanfaatkannya untuk mengakses panel admin intranet tidak aman di alamat IP internal.</p><p>Untuk menyelesaikan lab, akses panel admin internal di rentang [[C0]] lalu hapus pengguna [[C1]].</p><div class="highlightedarea"><h4>Catatan</h4><p>Agar platform Academy tidak disalahgunakan menyerang pihak ketiga, firewall kami memblokir interaksi antara lab dan sistem eksternal sembarang. Anda harus memakai server publik bawaan Burp Collaborator.</p></div>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Kirim permintaan [[C0]] berstatus [[C1]] ke Burp Repeater.</li>
        <li>Di Burp Repeater, pilih nilai header Host, klik kanan lalu pilih <strong>Insert Collaborator payload</strong> untuk menggantinya dengan domain Collaborator, kemudian kirim permintaan.</li>
        <li>Buka tab Collaborator dan klik <strong>Poll now</strong>. Anda akan melihat interaksi jaringan termasuk permintaan HTTP, yang membuktikan middleware situs dapat diarahkan ke server sembarang.</li>
        <li>Kirim permintaan [[C2]] ke Burp Intruder.</li>
        <li>Buka tab <strong>Intruder</strong>.</li>
        <li>Hapus centang pada <strong>Update Host header to match target</strong>.</li>
        <li>
            <p>Ganti nilai header Host dengan alamat IP berikut serta tambahkan posisi payload pada oktet terakhir:</p>
            [[C3]]
        </li>
        <li>
            <p>Di panel samping <strong>Payloads</strong>, pilih tipe <strong>Numbers</strong> dan masukkan konfigurasi berikut:</p>
            [[C4]]
        </li>
        <li>Klik <strong><span class="icon-play-circle-outline"></span> Start attack</strong>. Abaikan peringatan mengenai ketidaksesuaian header Host karena itu disengaja.</li>
        <li>Setelah serangan selesai, klik kolom <strong>Status</strong> untuk mengurutkan hasil. Satu permintaan mendapat respons [[C5]] yang mengalihkan ke [[C6]]. Kirim permintaan itu ke Burp Repeater.</li>
        <li>Di Burp Repeater, ubah baris permintaan menjadi [[C7]] dan kirim. Anda kini berhasil mengakses panel admin.</li>
        <li>Pelajari formulir hapus pengguna yang mengirim permintaan [[C8]] ke [[C9]] berisi token CSRF dan parameter [[C10]]. Susun permintaan setara untuk menghapus [[C11]].</li>
        <li>
            <p>Ubah path menjadi [[C12]], salin token CSRF dari respons sebagai parameter query, lalu tambahkan parameter [[C13]] bernilai [[C14]]:</p>
            [[C15]]
        </li>
        <li>Salin cookie sesi dari header [[C16]] pada respons dan tambahkan ke permintaan Anda.</li>
        <li>Klik kanan permintaan lalu pilih <strong>Change request method</strong> untuk mengubahnya menjadi permintaan [[C17]].</li>
        <li>Kirim permintaan untuk menghapus [[C18]] dan menyelesaikan lab.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    'fda358647ac3a4c7d8145cfc890d3191223eb52ffb099df6764d75a6e1c7d772' => [
        'title' => 'SSRF melalui penguraian permintaan yang cacat',
        'description_html' => '<p>Lab ini rentan terhadap routing-based SSRF karena penguraian host tujuan permintaan yang cacat. Anda dapat memanfaatkannya untuk mengakses panel admin intranet di alamat IP internal.</p><p>Untuk menyelesaikan lab, akses panel admin internal di rentang [[C0]] lalu hapus pengguna [[C1]].</p><div class="highlightedarea"><h4>Catatan</h4><p>Agar platform Academy tidak disalahgunakan menyerang pihak ketiga, firewall kami memblokir interaksi antara lab dan sistem eksternal sembarang. Anda harus memakai server publik bawaan Burp Collaborator.</p></div>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Kirim permintaan [[C0]] berstatus [[C1]] ke Burp Repeater. Amati bahwa situs memvalidasi header Host dan memblokir permintaan jika header tersebut diubah.</li>
        <li>
            <p>Amati bahwa Anda juga dapat mengakses beranda dengan menyertakan URL absolut di baris permintaan seperti ini:</p>
            [[C2]]
        </li>
        <li>Saat cara ini dipakai, mengubah header Host tidak lagi diblokir, melainkan menghasilkan timeout. Ini menandakan yang divalidasi adalah URL absolut, bukan header Host.</li>
        <li>
            <p>Gunakan Burp Collaborator untuk membuktikan middleware dapat dikirim ke server sembarang, misalnya dengan permintaan berikut:</p>
            [[C3]]
        </li>
        <li>Klik kanan dan pilih <strong>Insert Collaborator payload</strong> untuk menyisipkan subdomain Collaborator di posisi yang ditunjukkan.</li>
        <li>Kirim permintaan ber-URL absolut ke Burp Intruder.</li>
        <li>Buka <strong>Intruder</strong> dan hapus centang <strong>Update Host header to match target</strong>.</li>
        <li>Gunakan header Host untuk memindai rentang IP [[C4]] dan menemukan IP panel admin, lalu kirim ke Burp Repeater.</li>
        <li>Di Burp Repeater, tambahkan [[C5]] ke akhir URL absolut di baris permintaan lalu kirim untuk melihat panel admin dan formulir penghapusan pengguna.</li>
        <li>
            <p>Arahkan URL absolut ke [[C6]], salin token CSRF dari respons sebagai parameter query, lalu tambahkan parameter [[C7]] bernilai [[C8]]:</p>
            [[C9]]
        </li>
        <li>Salin cookie sesi dari header [[C10]] pada respons lalu tambahkan ke permintaan.</li>
        <li>Klik kanan permintaan lalu pilih "Change request method" agar menjadi permintaan [[C11]].</li>
        <li>Kirim permintaan untuk menghapus [[C12]] dan menyelesaikan lab.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '3c3f012cd1e1e6555dfc01b4bdddb6740a83ec699d85741398157fdb74985d78' => [
        'title' => 'Bypass validasi Host melalui connection state attack',
        'description_html' => '<p>Lab ini rentan terhadap routing-based SSRF via header Host. Meskipun server front-end tampak memvalidasi header Host secara ketat, ia membuat asumsi untuk seluruh permintaan pada koneksi yang sama berdasarkan permintaan pertama yang diterima.</p><p>Untuk menyelesaikan lab, eksploitasi perilaku ini untuk mengakses panel admin internal di [[C0]], lalu hapus pengguna [[C1]].</p><div class="component-solution expandable-container"><details><summary><h4><span class="icon-erlenmeyer"></span> Petunjuk</h4></summary><div class="content"><div><p>Menyelesaikan lab ini memerlukan fitur yang pertama kali dirilis di <a href="https://portswigger.net/burp/releases/professional-community-2022-8-1?requestededition=professional">Burp Suite 2022.8.1</a>.</p></div></div></details></div><p>Lab ini didasarkan pada kerentanan nyata yang ditemukan PortSwigger Research. Pelajari detailnya di <a href="https://portswigger.net/research/browser-powered-desync-attacks#state">Browser-Powered Desync Attacks: A New Frontier in HTTP Request Smuggling</a>.</p>',
        'sections' => [
            0 => '<div class="content"><div><p>Menyelesaikan lab ini memerlukan fitur yang pertama kali dirilis di <a href="https://portswigger.net/burp/releases/professional-community-2022-8-1?requestededition=professional">Burp Suite 2022.8.1</a>.</p></div></div>',
            1 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li><p>Kirim permintaan [[C0]] ke Burp Repeater.</p></li>
        <li>
            <p>Lakukan penyesuaian berikut:</p>
            <ul>
                <li><p>Ubah path menjadi [[C1]].</p></li>
                <li><p>Ubah header [[C2]] menjadi [[C3]].</p></li>
            </ul>
        </li>
        <li><p>Kirim permintaan dan amati bahwa Anda sekadar dialihkan ke beranda.</p></li>
        <li><p>Duplikasikan tab tersebut, lalu masukkan kedua tab ke dalam grup baru.</p></li>
        <li>
            <p>Pilih tab pertama dan lakukan penyesuaian berikut:</p>
            <ul>
                <li><p>Kembalikan path menjadi [[C4]].</p></li>
                <li><p>Kembalikan header [[C5]] ke [[C6]].</p></li>
            </ul>
        </li>
        <li><p>Lewat menu dropdown di samping tombol <strong>Send</strong>, ubah mode kirim ke <strong>Send group in sequence (single connection)</strong>.</p></li>
        <li><p>Ubah header [[C7]] menjadi [[C8]].</p></li>
        <li><p>Kirim urutan permintaan tersebut dan periksa responsnya. Permintaan kedua kini berhasil mengakses panel admin.</p></li>
        <li>
            <p>Pelajari respons panel admin dan catat detail formulir penghapusan pengguna berikut:</p>
            <ul>
                <li><p>Atribut action ([[C9]])</p></li>
                <li><p>Nama input ([[C10]])</p></li>
                <li><p>Token [[C11]].</p></li>
            </ul>
        </li>
        <li>
            <p>Pada tab kedua dalam grup, gunakan detail tersebut untuk menyusun permintaan seperti berikut:</p>
            [[C12]]
        </li>
        <li><p>Kirim rangkaian permintaan tersebut secara berurutan lewat satu koneksi tunggal untuk menyelesaikan lab.</p></li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    'cc59db27660d3e229c5a571225af7fbcb86b736ce42580c13b79df712f01f9ee' => [
        'title' => 'Password reset poisoning melalui dangling markup',
        'description_html' => '<p>Lab ini rentan terhadap password reset poisoning via dangling markup. Untuk menyelesaikan lab, masuklah ke akun Carlos.</p><p>Anda dapat masuk ke akun Anda menggunakan kredensial berikut: [[C0]]. Semua email yang dikirim ke akun ini dapat dibaca melalui klien email di server eksploitasi.</p><div class="component-solution expandable-container"><details><summary><h4><span class="icon-erlenmeyer"></span> Petunjuk</h4></summary><div class="content"><div><p>Sebagian perangkat lunak antivirus memindai tautan di email untuk memeriksa apakah tautan tersebut berbahaya.</p></div></div></details></div>',
        'sections' => [
            0 => '<div class="content"><div><p>Sebagian perangkat lunak antivirus memindai tautan di email untuk memeriksa apakah tautan tersebut berbahaya.</p></div></div>',
            1 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Buka halaman login dan ajukan reset kata sandi untuk akun Anda sendiri.</li>
        <li>Buka server eksploitasi dan periksa email reset kata sandi. Tautan di email hanya mengarah ke halaman login biasa tanpa token, sementara kata sandi baru dikirim langsung di dalam teks badan email.</li>
        <li>Di riwayat proxy, pelajari respons [[C0]]. Konten HTML email ditulis ke sebuah string dan disanitasi oleh pustaka [[C1]] sebelum dirender browser.</li>
        <li>Di klien email, perhatikan ada opsi untuk melihat setiap email sebagai raw HTML yang tidak mengalami sanitasi apa pun.</li>
        <li>
            <p>Kirim permintaan [[C2]] ke Burp Repeater. Mengubah nama domain di header Host menghasilkan galat server, tetapi menambahkan port non-numerik acak tetap diizinkan dan memicu email reset kata sandi:</p>
            [[C3]]
        </li>
        <li>Di klien email, periksa versi raw HTML. Port suntikan Anda tercermin di dalam tautan sebagai string bertanda kutip tunggal tanpa escape, yang diikuti langsung oleh kata sandi baru.</li>
        <li>
            <p>Kirim ulang permintaan [[C4]] dengan menyisipkan payload dangling markup melalui port agar mengarah ke server eksploitasi Anda:</p>
            [[C5]]
        </li>
        <li>Periksa klien email dan amati email baru yang sebagian besar isinya hilang. Di access log server eksploitasi, akan muncul entri permintaan yang diawali [[C6]], berisi sisa badan email termasuk kata sandi baru.</li>
        <li>Di Burp Repeater, kirim permintaan sekali lagi dengan mengganti parameter [[C7]] menjadi [[C8]]. Segarkan access log dan salin kata sandi baru milik Carlos.</li>
        <li>Masuk sebagai [[C9]] menggunakan kata sandi baru tersebut untuk menyelesaikan lab.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
];
