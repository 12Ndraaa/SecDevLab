<?php

return [
    '93e6ca17d9b52ed52a43ab57ed12be395d0766f8c58541cbaecd8f1418912a69' => [
        'title' => 'Race condition limit overrun',
        'description_html' => '<p>Alur pembelian pada lab ini mengandung race condition yang memungkinkan Anda membeli barang dengan harga tidak semestinya.</p><p>Untuk menyelesaikan lab, beli produk <strong>Lightweight L33t Leather Jacket</strong>.</p><p>Anda dapat masuk ke akun Anda dengan kredensial berikut: [[C0]].</p><p>Untuk memicu race condition lebih praktis, Anda bisa memakai custom action <a href="https://github.com/PortSwigger/bambdas/blob/main/CustomAction/ProbeForRaceCondition.bambda">Trigger race conditions</a> (hanya tersedia di Burp Suite Professional).</p><div class="highlightedarea"><h4>Catatan</h4><p>Menyelesaikan lab ini memerlukan Burp Suite 2023.9 atau lebih baru.</p></div>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <h2>Memprediksi potensi tabrakan (collision)</h2>
    <ol>
        <li><p>Login dan beli item termurah menggunakan kode diskon yang tersedia untuk mempelajari alur pembelian.</p></li>
        <li><p>Amati mekanisme keranjang belanja serta batasan apa saja yang layak dicoba untuk dilewati.</p></li>
        <li><p>Di proxy history Burp, identifikasi semua endpoint interaksi keranjang, seperti [[C0]] untuk menambah item dan [[C1]] untuk menerapkan kupon diskon.</p></li>
        <li><p>Uji batasan endpoint tersebut; jika kode diskon diterapkan lebih dari sekali, muncul respons [[C2]].</p></li>
        <li><p>Pastikan ada barang di keranjang lalu kirim permintaan [[C3]] ke Burp Repeater.</p></li>
        <li>
            <p>Kirim [[C4]] di Repeater dengan dan tanpa cookie sesi. Tanpa cookie sesi, keranjang selalu kosong. Artinya:</p>
            <ul>
                <li>Status keranjang disimpan di sisi server pada sesi Anda.</li>
                <li>Operasi keranjang diindeks berdasarkan ID sesi atau ID pengguna Anda.</li>
            </ul>
            <p>Hal ini menunjukkan adanya potensi tabrakan (collision).</p>
        </li>
        <li><p>Mungkin terdapat race window antara saat kode diskon pertama kali diterapkan dan saat basis data diperbarui untuk mencatatnya.</p></li>
    </ol>
    <h2>Mengukur perilaku normal</h2>
    <ol>
        <li><p>Pastikan tidak ada kode diskon aktif di keranjang.</p></li>
        <li><p>Kirim permintaan penerapan kupon ([[C5]]) ke Repeater.</p></li>
        <li><p>Di Repeater, kirim permintaan [[C6]] dua kali berturut-turut.</p></li>
        <li><p>Respons pertama mengonfirmasi diskon berhasil diterapkan, sedangkan respons kedua menolak kupon dengan pesan [[C7]].</p></li>
    </ol>
    <h2>Menguji celah</h2>
    <ol>
        <li><p>Hapus kode diskon dari keranjang Anda.</p></li>
        <li><p>Di <strong>Repeater</strong>, buka panel samping <strong>Custom actions</strong>.</p></li>
        <li><p>Klik <strong>New &gt; From template</strong>, lalu pilih <strong>Trigger race condition</strong>.</p></li>
        <li><p>Simpan templat tanpa perubahan.</p></li>
        <li><p>Klik <span class="icon-play-circle-outline"></span> di samping <strong>Trigger race condition</strong> untuk mengirim permintaan 20 kali secara paralel.</p></li>
        <li><p>Segarkan keranjang di browser dan pastikan potongan 20% diterapkan berkali-kali hingga harga pesanan turun drastis.</p></li>
    </ol>
    <h2>Membuktikan eksploitasi</h2>
    <ol>
        <li><p>Kosongkan kupon serta barang sebelumnya, lalu masukkan jaket kulit ke keranjang.</p></li>
        <li><p>Kirim ulang grup permintaan [[C8]] secara paralel.</p></li>
        <li>
            <p>Segarkan keranjang dan cek total pesanan:</p>
            <ul>
                <li>Jika masih melebihi sisa saldo kredit toko, hapus kode diskon lalu ulangi serangan.</li>
                <li>Jika sudah di bawah sisa saldo Anda, beli jaket tersebut untuk menyelesaikan lab.</li>
            </ul>
        </li>
    </ol>
</div></div>
LABHTML,
            1 => <<<'LABHTML'
<div class="content"><div>
    <h2>Memprediksi potensi tabrakan (collision)</h2>
    <ol>
        <li><p>Login dan beli item termurah memakai kode diskon yang tersedia untuk mempelajari alur pembelian.</p></li>
        <li><p>Amati mekanisme keranjang belanja serta batasan apa saja yang mungkin dilewati.</p></li>
        <li><p>Di proxy history Burp, identifikasi endpoint keranjang seperti [[C0]] untuk menambah item dan [[C1]] untuk menerapkan kupon diskon.</p></li>
        <li><p>Jika kupon diterapkan lebih dari sekali, server membalas [[C2]].</p></li>
        <li><p>Masukkan satu barang ke keranjang, lalu kirim permintaan [[C3]] ke Burp Repeater.</p></li>
        <li>
            <p>Uji [[C4]] dengan dan tanpa cookie sesi. Tanpa cookie sesi, keranjang kosong, yang menandakan:</p>
            <ul>
                <li>Status keranjang disimpan di sisi server pada sesi Anda.</li>
                <li>Operasi keranjang dikunci berdasarkan ID sesi atau ID pengguna Anda.</li>
            </ul>
            <p>Hal ini menunjukkan adanya potensi collision.</p>
        </li>
        <li><p>Kemungkinan ada race window antara penerapan diskon pertama kali dan pembaruan status di basis data.</p></li>
    </ol>
    <h2>Mengukur perilaku normal</h2>
    <ol>
        <li><p>Pastikan belum ada kode diskon di keranjang.</p></li>
        <li><p>Kirim permintaan penerapan kupon ([[C5]]) ke Repeater.</p></li>
        <li><p>Masukkan tab ke sebuah grup baru di Repeater; lihat <a href="/burp/documentation/desktop/tools/repeater/groups#creating-a-new-tab-group">Membuat grup tab baru</a>.</p></li>
        <li>Klik kanan tab di grup lalu pilih <strong>Duplicate tab</strong> hingga total ada 20 tab dalam grup tersebut.</li>
        <li><p>Kirim grup permintaan secara berurutan lewat koneksi terpisah (<a href="/burp/documentation/desktop/tools/repeater/send-group#sending-requests-in-sequence">Sending requests in sequence</a>).</p></li>
        <li><p>Hanya permintaan pertama yang berhasil menerapkan diskon, sementara sisanya ditolak dengan pesan <strong>Coupon already applied</strong>.</p></li>
    </ol>
    <h2>Menguji celah</h2>
    <ol>
        <li><p>Hapus kode diskon dari keranjang Anda.</p></li>
        <li><p>Di Repeater, kirim ulang grup permintaan tersebut secara paralel (<a href="/burp/documentation/desktop/tools/repeater/send-group#sending-requests-in-parallel">Sending requests in parallel</a>).</p></li>
        <li><p>Periksa respons dan pastikan beberapa permintaan berhasil menerapkan diskon. Jika gagal, hapus kupon lalu ulangi.</p></li>
        <li><p>Segarkan keranjang di browser dan pastikan potongan 20% diterapkan berkali-kali.</p></li>
    </ol>
    <h2>Membuktikan eksploitasi</h2>
    <ol>
        <li><p>Kosongkan kupon dan item awal, lalu tambahkan jaket kulit ke keranjang.</p></li>
        <li><p>Kirim ulang grup permintaan [[C6]] secara paralel.</p></li>
        <li>
            <p>Segarkan keranjang dan periksa total pesanan:</p>
            <ul>
                <li>Jika masih lebih mahal daripada saldo kredit toko, hapus kode diskon lalu ulangi serangan.</li>
                <li>Jika sudah lebih murah daripada sisa saldo Anda, selesaikan pembelian jaket untuk menyelesaikan lab.</li>
            </ul>
        </li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '29118bf96eda68696455206d01f5dcd44e5dfd57fc51f8be70d4146bf8c49072' => [
        'title' => 'Melewati pembatasan laju melalui race condition',
        'description_html' => '<p>Mekanisme login lab ini memakai rate limiting untuk menahan serangan brute-force, tetapi dapat dilewati melalui race condition.</p><p>Untuk menyelesaikan lab:</p><ol><li>Temukan cara mengeksploitasi race condition untuk melewati batas laju.</li><li>Lakukan brute-force kata sandi pengguna [[C0]].</li><li>Login dan akses panel admin.</li><li>Hapus pengguna [[C1]].</li></ol><p>Anda dapat masuk ke akun Anda dengan kredensial berikut: [[C2]].</p><p>Gunakan daftar kandidat kata sandi berikut:</p><div class="component-solution expandable-container"><details><summary><h4><span class="icon-bulb"></span> Kata sandi</h4></summary><div class="content"><div>[[C3]]</div></div></details></div><div class="highlightedarea"><h4>Catatan</h4><ul><li>Menyelesaikan lab ini memerlukan Burp Suite 2023.9 atau lebih baru serta versi terbaru Turbo Intruder dari <a href="https://portswigger.net/bappstore/9abaa233088242e8be252cd4ff534988">BApp Store</a>.</li><li>Batas waktu pengerjaan adalah 15 menit. Jika habis, Anda dapat me-reset lab dan kata sandi Carlos akan berubah setiap kali reset.</li></ul></div>',
        'sections' => [
            0 => '<div class="content"><div>[[C0]]</div></div>',
            1 => <<<'LABHTML'
<div class="content"><div>
    <h2>Memprediksi potensi tabrakan (collision)</h2>
    <ol>
        <li><p>Uji fitur login dengan sengaja mengirim kata sandi salah ke akun Anda.</p></li>
        <li><p>Setelah salah lebih dari tiga kali, akun diblokir sementara dari percobaan login berikutnya.</p></li>
        <li><p>Coba login memakai username lain dan amati muncul pesan normal [[C0]], menandakan rate limit diterapkan per-username, bukan per-sesi.</p></li>
        <li><p>Artinya penghitung kegagalan login per-username disimpan di sisi server.</p></li>
        <li>
            <p>Mungkin terdapat race window antara:</p>
            <ul>
                <li>Saat Anda mengirimkan percobaan login.</li>
                <li>Saat situs menambah penghitung percobaan gagal untuk username terkait.</li>
            </ul>
        </li>
    </ol>
    <h2>Mengukur perilaku normal</h2>
    <ol>
        <li><p>Dari proxy history, temukan permintaan [[C1]] yang gagal untuk akun Anda.</p></li>
        <li><p>Kirim permintaan tersebut ke Burp Repeater.</p></li>
        <li><p>Tambahkan tab ke grup baru (<a href="/burp/documentation/desktop/tools/repeater/groups#creating-a-new-tab-group">Creating a new tab group</a>).</p></li>
        <li>Klik kanan tab di grup lalu pilih <strong>Duplicate tab</strong> hingga ada 20 tab di grup.</li>
        <li><p>Kirim grup permintaan secara berurutan lewat koneksi terpisah (<a href="/burp/documentation/desktop/tools/repeater/send-group#sending-requests-in-sequence">Sending requests in sequence</a>).</p></li>
        <li><p>Amati bahwa setelah beberapa kegagalan, akun langsung terkunci sementara.</p></li>
    </ol>
    <h2>Menguji celah</h2>
    <ol>
        <li><p>Kirim ulang grup permintaan tadi secara paralel (<a href="/burp/documentation/desktop/tools/repeater/send-group#sending-requests-in-parallel">Sending requests in parallel</a>).</p></li>
        <li><p>Perhatikan responsnya: lebih dari tiga permintaan menerima balasan normal [[C2]] sebelum penguncian aktif.</p></li>
        <li><p>Dengan cukup cepat, Anda bisa mengirim lebih dari tiga percobaan login sebelum kunci terpicu.</p></li>
    </ol>
    <h2>Membuktikan eksploitasi</h2>
    <ol>
        <li><p>Di Repeater, sorot nilai parameter [[C3]] pada permintaan [[C4]].</p></li>
        <li><p>Klik kanan dan pilih <strong>Extensions &gt; Turbo Intruder &gt; Send to turbo intruder</strong>.</p></li>
        <li><p>Di editor Turbo Intruder, nilai parameter [[C5]] otomatis ditandai dengan placeholder [[C6]].</p></li>
        <li><p>Ubah parameter [[C7]] menjadi [[C8]].</p></li>
        <li><p>Dari menu drop-down, pilih templat [[C9]].</p></li>
        <li>
            <p>Ubah skrip Python agar mengantrekan permintaan satu kali untuk tiap kandidat kata sandi:</p>
            [[C10]]
        </li>
        <li><p>Karena daftar kata sandi dibaca dari [[C11]], salin seluruh daftar kata sandi ke clipboard Anda.</p></li>
        <li><p>Jalankan serangan.</p></li>
        <li>
            <p>Periksa respons yang masuk:</p>
            <ul>
                <li>Jika tidak ada login berhasil, tunggu kunci akun pulih lalu ulangi serangan (Anda boleh menghapus kata sandi yang sudah teruji gagal).</li>
                <li>Jika ada respons 302, login tersebut berhasil; catat kata sandinya dari kolom <strong>Payload</strong>.</li>
            </ul>
        </li>
        <li><p>Tunggu kunci akun pulih lalu masuk sebagai [[C12]] memakai kata sandi tersebut.</p></li>
        <li><p>Buka panel admin dan hapus pengguna [[C13]] untuk menyelesaikan lab.</p></li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '167394bd4478dd05f683affd8d0bf579e9daf428cb0808509ba8f76b1a12c046' => [
        'title' => 'Race condition multi-endpoint',
        'description_html' => '<p>Alur pembelian pada lab ini mengandung race condition yang memungkinkan Anda membeli barang dengan harga tidak semestinya.</p><p>Untuk menyelesaikan lab, beli produk <strong>Lightweight L33t Leather Jacket</strong>.</p><p>Anda dapat masuk ke akun Anda dengan kredensial berikut: [[C0]].</p><div class="highlightedarea"><h4>Catatan</h4><p>Menyelesaikan lab ini memerlukan Burp Suite 2023.9 atau lebih baru.</p></div><div class="highlightedarea"><h4>Tip</h4><p>Saat bereksperimen, disarankan membeli gift card karena dapat ditukarkan kembali agar kredit toko tidak habis.</p></div>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <h2>Memprediksi potensi tabrakan (collision)</h2>
    <ol>
        <li><p>Login lalu beli sebuah gift card untuk mempelajari alur pembelian.</p></li>
        <li><p>Pertimbangkan mekanisme keranjang belanja serta batasan apa yang layak dilewati.</p></li>
        <li><p>Dari proxy history, temukan seluruh endpoint keranjang, misalnya [[C0]] untuk menambah barang dan [[C1]] untuk mengirim pesanan.</p></li>
        <li><p>Tambahkan satu gift card ke keranjang lalu kirim [[C2]] ke Burp Repeater.</p></li>
        <li>
            <p>Uji [[C3]] dengan dan tanpa cookie sesi. Tanpa cookie sesi keranjang kosong, yang berarti:</p>
            <ul>
                <li>Status keranjang disimpan di server pada sesi Anda.</li>
                <li>Operasi keranjang diindeks oleh ID sesi atau ID pengguna Anda.</li>
            </ul>
            <p>Hal ini menunjukkan adanya potensi collision.</p>
        </li>
        <li><p>Pengiriman dan konfirmasi pesanan terjadi dalam satu siklus permintaan/respons tunggal.</p></li>
        <li><p>Kemungkinan ada race window antara saat pesanan divalidasi dan saat pesanan dikonfirmasi, sehingga item tambahan bisa masuk setelah pengecekan saldo.</p></li>
    </ol>
    <h2>Mengukur perilaku normal</h2>
    <ol>
        <li><p>Kirim permintaan [[C4]] dan [[C5]] ke Burp Repeater.</p></li>
        <li><p>Masukkan kedua tab ke satu grup baru (<a href="/burp/documentation/desktop/tools/repeater/groups#creating-a-new-tab-group">Creating a new tab group</a>).</p></li>
        <li><p>Kirim kedua permintaan secara berurutan lewat satu koneksi (<a href="/burp/documentation/desktop/tools/repeater/send-group#sending-requests-in-sequence">Sending requests in sequence</a>) dan amati permintaan pertama jauh lebih lambat daripada kedua.</p></li>
        <li><p>Tambahkan permintaan [[C6]] ke beranda di awal grup tab Anda.</p></li>
        <li><p>Kirim ketiga permintaan secara berurutan lewat satu koneksi. Dengan "menghangatkan" koneksi terlebih dahulu, permintaan kedua dan ketiga selesai dalam selisih waktu jauh lebih rapat.</p></li>
        <li><p>Artinya keterlambatan awal tadi berasal dari arsitektur jaringan front-end/back-end, bukan waktu proses endpoint-nya, sehingga tidak mengganggu serangan.</p></li>
        <li><p>Hapus permintaan [[C7]] beranda tersebut dari grup tab.</p></li>
        <li><p>Pastikan ada tepat satu gift card di keranjang Anda.</p></li>
        <li><p>Di Repeater, ubah parameter [[C9]] di permintaan [[C8]] menjadi [[C10]] (ID produk <strong>Lightweight L33t Leather Jacket</strong>).</p></li>
        <li><p>Kirim kedua permintaan secara berurutan lagi.</p></li>
        <li><p>Amati pesanan ditolak karena saldo tidak mencukupi sesuai dugaan.</p></li>
    </ol>
    <h2>Membuktikan eksploitasi</h2>
    <ol>
        <li><p>Keluarkan jaket dari keranjang lalu tambahkan satu gift card lagi.</p></li>
        <li><p>Di Repeater, kirim ulang grup permintaan tersebut secara paralel (<a href="/burp/documentation/desktop/tools/repeater/send-group#sending-requests-in-parallel">Sending requests in parallel</a>).</p></li>
        <li>
            <p>Periksa respons [[C11]]:</p>
            <ul>
                <li>Jika muncul pesan dana kurang, keluarkan jaket dari keranjang dan ulangi serangan (mungkin perlu beberapa percobaan).</li>
                <li>Jika mendapat respons 200, periksa apakah jaket kulit berhasil terbeli untuk menyelesaikan lab.</li>
            </ul>
        </li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '71c6fcf0f90655384236e0540795d7a265f823ea1258f995b615cf351fe32a56' => [
        'title' => 'Race condition single-endpoint',
        'description_html' => '<p>Fitur ubah email pada lab ini mengandung race condition yang memungkinkan Anda mengaitkan alamat email sembarang ke akun Anda.</p><p>Pengguna beralamat [[C0]] memiliki undangan tertunda menjadi administrator situs namun belum membuat akun. Siapa pun yang berhasil mengklaim alamat ini otomatis mewarisi hak akses admin.</p><p>Untuk menyelesaikan lab:</p><ol><li>Temukan race condition untuk mengklaim alamat email sembarang.</li><li>Ubah email Anda menjadi [[C1]].</li><li>Akses panel admin.</li><li>Hapus pengguna [[C2]]</li></ol><p>Anda dapat masuk ke akun Anda dengan kredensial berikut: [[C3]].</p><p>Anda juga memiliki akses ke klien email untuk membaca seluruh email ke alamat [[C4]].</p><div class="highlightedarea"><h4>Catatan</h4><p>Menyelesaikan lab ini memerlukan Burp Suite 2023.9 atau lebih baru.</p></div>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <h2>Memprediksi potensi tabrakan (collision)</h2>
    <ol>
        <li><p>Login dan coba ubah email Anda ke [[C0]]. Email konfirmasi berisi tautan bertoken unik akan dikirim ke kotak masuk.</p></li>
        <li><p>Selesaikan konfirmasi dan pastikan alamat email Anda diperbarui di halaman akun.</p></li>
        <li><p>Kirim dua alamat [[C1]] berbeda secara berturutan lalu periksa klien email.</p></li>
        <li><p>Tautan konfirmasi pertama menjadi tidak valid. Situs hanya menyimpan satu email tertunda sekaligus dengan menimpa entri basis data, sehingga berpotensi mengalami collision.</p></li>
    </ol>
    <h2>Mengukur perilaku normal</h2>
    <ol>
        <li><p>Kirim permintaan [[C2]] ke Repeater.</p></li>
        <li><p>Tambahkan tab ke grup baru (<a href="/burp/documentation/desktop/tools/repeater/groups#creating-a-new-tab-group">Creating a new tab group</a>).</p></li>
        <li>Klik kanan tab di grup lalu pilih <strong>Duplicate tab</strong> hingga total ada 20 tab.</li>
        <li><p>Pada tiap tab, buat alamat email unik seperti [[C3]].</p></li>
        <li><p>Kirim grup permintaan secara berurutan lewat koneksi terpisah (<a href="/burp/documentation/desktop/tools/repeater/send-group#sending-requests-in-sequence">Sending requests in sequence</a>).</p></li>
        <li><p>Periksa klien email dan amati tiap permintaan menerima email konfirmasinya masing-masing dengan tepat.</p></li>
    </ol>
    <h2>Menguji celah</h2>
    <ol>
        <li><p>Kirim ulang grup permintaan secara paralel (<a href="/burp/documentation/desktop/tools/repeater/send-group#sending-requests-in-parallel">Sending requests in parallel</a>).</p></li>
        <li><p>Periksa email konfirmasi yang baru masuk; kali ini alamat tujuan penerima tidak selalu cocok dengan alamat email yang tertera di isi pesan.</p></li>
        <li>
            <p>Terdapat race window antara saat situs:</p>
            <ol>
                <li>Memulai tugas pengiriman email ke alamat yang diberikan.</li>
                <li>Mengambil data dari basis data untuk merender isi templat email.</li>
            </ol>
        </li>
        <li><p>Permintaan paralel yang menimpa email tertunda di basis data pada jendela ini membuat email konfirmasi terkirim ke penerima yang keliru.</p></li>
    </ol>
    <h2>Membuktikan eksploitasi</h2>
    <ol>
        <li><p>Di Repeater, buat grup baru berisi dua salinan permintaan [[C4]].</p></li>
        <li><p>Ubah parameter [[C5]] pada permintaan pertama menjadi [[C6]].</p></li>
        <li><p>Ubah parameter [[C7]] pada permintaan kedua menjadi [[C8]].</p></li>
        <li><p>Kirim kedua permintaan secara paralel.</p></li>
        <li>
            <p>Periksa kotak masuk Anda:</p>
            <ul>
                <li>Jika alamat di isi email konfirmasi masih milik Anda sendiri, kirim ulang secara paralel.</li>
                <li>Jika isi email konfirmasi menyebut [[C9]], klik tautan konfirmasi tersebut untuk mengubah email akun Anda.</li>
            </ul>
        </li>
        <li><p>Buka halaman akun Anda dan amati muncul tautan menuju panel admin.</p></li>
        <li><p>Kunjungi panel admin lalu hapus pengguna [[C10]] untuk menyelesaikan lab.</p></li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '78911fb5a8391a1df80981ae967ce751b903dcbed81805da32763871a68ac88a' => [
        'title' => 'Mengeksploitasi kerentanan berbasis waktu',
        'description_html' => '<p>Lab ini memiliki mekanisme reset kata sandi. Meski tidak memakai race condition tradisional, Anda dapat mengeksploitasi kriptografinya yang lemah lewat permintaan berwaktu tepat.</p><p>Untuk menyelesaikan lab:</p><ol><li>Identifikasi kelemahan dalam cara situs membuat token reset kata sandi.</li><li>Dapatkan token reset valid untuk pengguna [[C0]].</li><li>Masuk sebagai [[C1]].</li><li>Akses panel admin dan hapus pengguna [[C2]].</li></ol><p>Anda dapat masuk ke akun Anda dengan kredensial berikut: [[C3]].</p><div class="highlightedarea"><h4>Catatan</h4><p>Menyelesaikan lab ini memerlukan Burp Suite 2023.9 atau lebih baru.</p></div>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <h2>Mempelajari perilaku sistem</h2>
    <ol>
        <li><p>Ajukan reset kata sandi untuk akun Anda sendiri dan amati email berisi tautan reset dengan parameter query username dan token.</p></li>
        <li><p>Kirim permintaan [[C0]] ke Burp Repeater.</p></li>
        <li><p>Kirim permintaan beberapa kali lalu cek kotak masuk.</p></li>
        <li><p>Setiap permintaan reset menghasilkan tautan dengan token berbeda.</p></li>
        <li>
            <p>Perhatikan pola token tersebut:</p>
            <ul>
                <li>Panjang token selalu konsisten, menandakan token merupakan hash dari data internal, bukan string acak murni.</li>
                <li>Karena selalu berubah, hash tersebut pasti menyertakan status internal seperti RNG, counter, atau stempel waktu (timestamp).</li>
            </ul>
        </li>
        <li><p>Duplikasikan tab Repeater dan masukkan keduanya ke satu grup baru (<a href="/burp/documentation/desktop/tools/repeater/groups#creating-a-new-tab-group">Creating a new tab group</a>).</p></li>
        <li><p>Kirim kedua permintaan reset secara paralel (<a href="/burp/documentation/desktop/tools/repeater/send-group#sending-requests-in-parallel">Sending requests in parallel</a>).</p></li>
        <li><p>Terdapat jeda jelas antar-respons dan token di kedua email tetap berbeda, menandakan permintaan masih diproses berurutan, bukan bersamaan.</p></li>
    </ol>
    <h2>Melewati pembatasan penguncian per-sesi</h2>
    <ol>
        <li><p>Cookie sesi menunjukkan back-end menggunakan PHP, sehingga server hanya memproses satu permintaan pada satu waktu per sesi.</p></li>
        <li><p>Kirim permintaan [[C1]] ke Repeater, hapus cookie sesi, lalu kirim permintaan.</p></li>
        <li><p>Salin cookie sesi dan token CSRF baru dari respons untuk mengganti nilai pada salah satu permintaan [[C2]] agar keduanya berada di dua sesi terpisah.</p></li>
        <li><p>Kirim kedua permintaan [[C3]] secara paralel beberapa kali hingga waktu pemrosesannya hampir atau tepat bersamaan.</p></li>
    </ol>
    <h2>Mengonfirmasi kerentanan</h2>
    <ol>
        <li><p>Periksa kotak masuk; saat waktu respons cocok, kedua email konfirmasi memuat token yang identik. Ini membuktikan timestamp menjadi salah satu masukan fungsi hash.</p></li>
        <li><p>Hal ini menandakan token dapat diprediksi bila masukan lainnya diketahui.</p></li>
        <li><p>Parameter [[C4]] terpisah menunjukkan username mungkin tidak ikut di-hash, sehingga dua akun berbeda bisa memperoleh token yang sama pada waktu bersamaan.</p></li>
        <li><p>Di Repeater, pada salah satu permintaan [[C5]], ubah parameter [[C6]] menjadi [[C7]].</p></li>
        <li><p>Kirim ulang keduanya secara paralel agar kedua pengguna mendapat token reset yang sama pada stempel waktu yang sama.</p></li>
        <li><p>Periksa kotak masuk Anda: kini hanya satu email konfirmasi baru yang masuk karena email satunya (dengan token identik) dikirim ke Carlos.</p></li>
        <li><p>Salin tautan dari email Anda lalu ubah username di query string menjadi [[C8]].</p></li>
        <li><p>Buka URL tersebut di browser dan lihat formulir pengaturan kata sandi baru.</p></li>
        <li><p>Tetapkan kata sandi baru pilihan Anda lalu kirim formulir.</p></li>
        <li>
            <p>Coba masuk sebagai [[C9]] memakai kata sandi baru itu:</p>
            <ul>
                <li>Jika gagal, kirim ulang pasangan reset paralel dan coba lagi.</li>
                <li>Jika berhasil login, buka panel admin dan hapus [[C10]] untuk menyelesaikan lab.</li>
            </ul>
        </li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '36e4a9ea055e676d694da84e3520445fb2fa3bbc8f0fce922c9100971a4e90a9' => [
        'title' => 'Race condition konstruksi parsial',
        'description_html' => '<p>Lab ini memiliki mekanisme pendaftaran pengguna. Race condition memungkinkan Anda melewati verifikasi email dan mendaftar memakai alamat email sembarang yang tidak Anda miliki.</p><p>Untuk menyelesaikan lab, eksploitasi race condition ini untuk membuat akun, lalu login dan hapus pengguna [[C0]].</p><div class="highlightedarea"><h4>Catatan</h4><p>Menyelesaikan lab ini memerlukan Burp Suite 2023.9 atau lebih baru serta versi terbaru Turbo Intruder dari <a href="https://portswigger.net/bappstore/9abaa233088242e8be252cd4ff534988">BApp Store</a>.</p></div><div class="component-solution expandable-container"><details><summary><h4><span class="icon-bulb"></span> Petunjuk</h4></summary><div class="content"><div><p>Anda mungkin perlu mencoba beberapa variasi penjadwalan agar permintaan tepat menyentuh race window untuk mengeksploitasi celah ini.</p></div></div></details></div>',
        'sections' => [
            0 => '<div class="content"><div><p>Anda mungkin perlu mencoba beberapa variasi penjadwalan agar permintaan tepat menyentuh race window untuk mengeksploitasi celah ini.</p></div></div>',
            1 => <<<'LABHTML'
<div class="content"><div>
    <h2>Memprediksi potensi tabrakan (collision)</h2>
    <ol>
        <li>
            <p>Pelajari alur pendaftaran akun dan amati bahwa:</p>
            <ul>
                <li>Pendaftaran hanya diizinkan memakai email [[C0]].</li>
                <li>Pendaftaran harus diselesaikan lewat tautan konfirmasi yang dikirim ke email.</li>
                <li>Karena Anda tidak memiliki kotak masuk [[C1]], Anda tidak bisa menerima tautan konfirmasi valid.</li>
            </ul>
        </li>
        <li><p>Di proxy history Burp, temukan permintaan pengambilan skrip [[C2]].</p></li>
        <li><p>Skrip tersebut membangun formulir halaman konfirmasi yang mengirim konfirmasi akhir lewat permintaan [[C3]] ke [[C4]] dengan token di query string.</p></li>
        <li>
            <p>Di Burp Repeater, buat permintaan setara dengan yang dikirim browser saat mengklik tautan konfirmasi:</p>
            [[C5]]
        </li>
        <li>
            <p>Uji variasi parameter [[C6]] pada permintaan konfirmasi:</p>
            <ul>
                <li>Token acak membalas [[C7]].</li>
                <li>Tanpa parameter membalas [[C8]].</li>
                <li>Token kosong membalas [[C9]].</li>
            </ul>
        </li>
        <li><p>Respons [[C10]] mengisyaratkan pengembang sempat menambal eksploitasi lewat token kosong.</p></li>
        <li>
            <p>Kemungkinan ada race window singkat antara:</p>
            <ol>
                <li>Saat permintaan pendaftaran dikirim.</li>
                <li>Saat token pendaftaran baru selesai disimpan di basis data.</li>
            </ol>
            <p>Pada sub-status sementara itu, nilai [[C11]] (atau setara) bisa jadi cocok sebagai token konfirmasi yang sah.</p>
        </li>
        <li>
            <p>Coba kirim nilai setara [[C12]], misalnya array kosong:</p>
            [[C13]]
        </li>
        <li><p>Alih-alih [[C14]], respons kini berbunyi [[C15]], membuktikan array kosong dapat diteruskan ke pengecekan token.</p></li>
    </ol>
    <h2>Mengukur perilaku normal</h2>
    <ol>
        <li><p>Kirim permintaan [[C16]] ke Burp Repeater.</p></li>
        <li><p>Uji pendaftaran; mendaftarkan username sama dua kali menghasilkan balasan berbeda.</p></li>
        <li>
            <p>Di tab Repeater lain, susun permintaan konfirmasi dengan token acak:</p>
            [[C17]]
        </li>
        <li><p>Masukkan kedua tab ke satu grup baru.</p></li>
        <li><p>Kirim kedua permintaan berurutan dan paralel beberapa kali (<a href="/burp/documentation/desktop/tools/repeater/send-group">Sending grouped HTTP requests</a>), sambil mengganti username di tiap percobaan agar tidak terkena pesan [[C18]].</p></li>
        <li><p>Amati respons konfirmasi selalu tiba jauh lebih cepat daripada respons pendaftaran.</p></li>
    </ol>
    <h2>Membuktikan eksploitasi</h2>
    <ol>
        <li><p>Anda harus memastikan server sudah mulai menulis data pengguna ke basis data sebelum membandingkan token pada permintaan konfirmasi.</p></li>
        <li><p>Karena konfirmasi selesai lebih cepat, pengiriman konfirmasi perlu dijadwalkan agar mengenai celah race window tersebut.</p></li>
        <li><p>Pada permintaan [[C19]], sorot nilai parameter [[C20]] lalu pilih <strong>Extensions &gt; Turbo Intruder &gt; Send to turbo intruder</strong>.</p></li>
        <li>
            <p>Di editor permintaan Turbo Intruder:</p>
            <ol>
                <li>Nilai parameter [[C21]] otomatis ditandai dengan placeholder [[C22]].</li>
                <li>Pastikan parameter [[C23]] memakai alamat [[C24]] yang belum pernah terdaftar.</li>
                <li>Catat nilai statis parameter [[C25]] untuk login nanti.</li>
            </ol>
        </li>
        <li><p>Pilih templat [[C26]] dari menu drop-down.</p></li>
        <li>
            <p>Sesuaikan skrip Python agar mendefinisikan permintaan konfirmasi, mengantrekan satu registrasi dan banyak konfirmasi per iterasi menggunakan [[C27]] yang sama, lalu melepaskannya serentak:</p>
            [[C28]]
        </li>
        <li><p>Jalankan serangan.</p></li>
        <li><p>Di tabel hasil, urutkan berdasarkan kolom <strong>Length</strong>.</p></li>
        <li><p>Jika berhasil, satu atau beberapa permintaan konfirmasi mendapat kode 200 dengan pesan [[C29]].</p></li>
        <li><p>Catat username dari respons tersebut, misalnya [[C30]].</p></li>
        <li><p>Di browser, login memakai username itu beserta kata sandi statis yang tadi dipakai.</p></li>
        <li><p>Buka panel admin dan hapus [[C31]] untuk menyelesaikan lab.</p></li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
];
