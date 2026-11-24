<?php

return [
    '7e1d5befa5a46838a8c5416c70e5a41374a9709ab774f18059501beeb902525d' => [
        'title' => 'Mengeksploitasi pemetaan path untuk web cache deception',
        'description_html' => '<p>Untuk menyelesaikan lab, temukan API key milik pengguna [[C0]]. Anda dapat masuk ke akun Anda menggunakan kredensial berikut: [[C1]].</p><div class="highlightedarea"><h4>Pengetahuan yang dibutuhkan</h4><p>Untuk menyelesaikan lab ini, Anda perlu mengetahui:</p><ul><li>Cara endpoint regex memetakan path URL ke resource.</li><li>Cara mendeteksi dan mengeksploitasi ketidaksesuaian cara cache dan origin server memetakan path URL.</li></ul><p>Poin ini dibahas di topik Academy <a href="/web-security/web-cache-deception">Web cache deception</a>.</p></div>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content">
    <div>
        <h2>Mengidentifikasi endpoint target</h2>
        <ol>
            <li><p>Di browser Burp, masuk ke aplikasi menggunakan kredensial [[C0]].</p></li>
            <li><p>Perhatikan bahwa respons berisi API key Anda.</p></li>
        </ol>
        <h2>Mengidentifikasi ketidaksesuaian pemetaan path</h2>
        <ol>
            <li><p>Di <strong>Proxy &gt; HTTP history</strong>, klik kanan permintaan [[C1]] lalu pilih <strong>Send to Repeater</strong>.</p></li>
            <li><p>Buka tab <strong>Repeater</strong>. Tambahkan segmen acak ke path dasar, misalnya ubah path menjadi [[C2]].</p></li>
            <li><p>Kirim permintaan. Perhatikan bahwa Anda tetap menerima respons berisi API key Anda. Ini menandakan origin server menyederhanakan path URL ke [[C3]].</p></li>
            <li><p>Tambahkan ekstensi statis ke path URL, misalnya [[C4]].</p></li>
            <li><p>Kirim permintaan. Perhatikan bahwa respons memuat header [[C5]] dan [[C6]]. Header [[C7]] menandakan respons ini tidak disajikan dari cache, sedangkan [[C8]] menandakan respons yang di-cache akan disimpan selama 30 detik.</p></li>
            <li><p>Kirim ulang permintaan dalam waktu 30 detik. Perhatikan nilai header [[C9]] berubah menjadi [[C10]], yang berarti respons disajikan dari cache. Dari sini kita dapat menyimpulkan cache menafsirkan path sebagai [[C11]] dan memiliki aturan cache berdasarkan ekstensi statis [[C12]]. Anda dapat memakai payload ini untuk eksploitasi.</p></li>
        </ol>
        <h2>Menyusun eksploitasi</h2>
        <ol>
            <li><p>Di browser Burp, klik <strong>Go to exploit server</strong>.</p></li>
            <li>
                <p>Di bagian <strong>Body</strong>, buat eksploitasi yang mengarahkan korban [[C13]] ke URL berbahaya yang tadi dibuat. Pastikan mengubah segmen path acak agar korban tidak menerima respons Anda yang sudah tersimpan di cache:</p>
                [[C14]]
            </li>
            <li><p>Klik <strong>Deliver exploit to victim</strong>. Saat korban membuka eksploitasi, respons yang mereka terima disimpan ke cache.</p></li>
            <li>
                <p>Buka URL yang Anda kirimkan ke [[C15]] pada eksploitasi:</p>
                [[C16]]
            </li>
            <li><p>Perhatikan bahwa respons memuat API key milik [[C17]]. Salin nilai tersebut.</p></li>
            <li><p>Klik <strong>Submit solution</strong>, lalu kirimkan API key milik [[C18]] untuk menyelesaikan lab.</p></li>
        </ol>
    </div>
</div>
LABHTML,
        ],
    ],
    '0c221a151722d2c5972eecae320718fcccc5d98a38b52914a5099c3837335f2f' => [
        'title' => 'Mengeksploitasi delimiter path untuk web cache deception',
        'description_html' => '<p>Untuk menyelesaikan lab, temukan API key milik pengguna [[C0]]. Anda dapat masuk ke akun Anda menggunakan kredensial berikut: [[C1]].</p><p>Kami menyediakan daftar karakter delimiter yang mungkin digunakan untuk membantu Anda menyelesaikan lab: <a chunk-keep-link="" href="/web-security/web-cache-deception/wcd-lab-delimiter-list">Daftar delimiter lab web cache deception</a>.</p><div class="highlightedarea"><h4>Pengetahuan yang dibutuhkan</h4><p>Untuk menyelesaikan lab ini, Anda perlu mengetahui:</p><ul><li>Cara mengidentifikasi ketidaksesuaian cara cache dan origin server menafsirkan karakter sebagai delimiter.</li><li>Cara memanfaatkan perbedaan delimiter untuk mengeksploitasi aturan cache direktori statis.</li></ul><p>Poin ini dibahas di topik Academy <a href="/web-security/web-cache-deception">Web cache deception</a>.</p></div>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content">
    <div>
        <h2>Mengidentifikasi endpoint target</h2>
        <ol>
            <li><p>Di browser Burp, masuk ke aplikasi menggunakan kredensial [[C0]].</p></li>
            <li><p>Perhatikan bahwa respons berisi API key Anda.</p></li>
        </ol>
        <h2>Mengidentifikasi delimiter path yang dipakai origin server</h2>
        <ol>
            <li><p>Di <strong>Proxy &gt; HTTP history</strong>, klik kanan permintaan [[C1]] lalu pilih <strong>Send to Repeater</strong>.</p></li>
            <li><p>Buka tab <strong>Repeater</strong>. Tambahkan segmen acak ke path, misalnya ubah menjadi [[C2]].</p></li>
            <li><p>Kirim permintaan. Perhatikan respons [[C3]] tanpa tanda caching. Ini menandakan origin server tidak mengabstraksikan path ke [[C4]].</p></li>
            <li><p>Hapus segmen acak lalu tambahkan string acak ke path asli, misalnya ubah menjadi [[C5]].</p></li>
            <li><p>Kirim permintaan. Perhatikan respons [[C6]] tanpa tanda cache. Anda akan memakai respons ini sebagai pembanding untuk mengenali karakter yang tidak diperlakukan sebagai delimiter.</p></li>
            <li><p>Klik kanan permintaan lalu pilih <strong>Send to Intruder</strong>.</p></li>
            <li><p>Buka tab <strong>Intruder</strong>. Pastikan <strong>Sniper attack</strong> dipilih dan tambahkan posisi payload setelah [[C7]] seperti ini: [[C8]].</p></li>
            <li><p>Di panel samping <strong>Payloads</strong>, pada <strong>Payload configuration</strong>, tambahkan daftar karakter yang berpotensi menjadi delimiter.</p></li>
            <li><p>Di bagian <strong>Payload encoding</strong>, hapus centang pada <strong>URL-encode these characters</strong>.</p></li>
            <li><p>Klik <strong><span class="icon-play-circle-outline"></span> Start attack</strong>. Serangan berjalan di jendela baru.</p></li>
            <li><p>Setelah serangan selesai, urutkan hasil berdasarkan <strong>Status code</strong>. Perhatikan karakter [[C9]] dan [[C10]] mendapat respons [[C11]] beserta API key Anda, sedangkan karakter lain mendapat [[C12]]. Hal ini menandakan origin server memakai [[C13]] dan [[C14]] sebagai delimiter path.</p></li>
        </ol>
        <h2>Menyelidiki perbedaan delimiter path</h2>
        <ol>
            <li><p>Buka tab <strong>Repeater</strong> yang memuat permintaan [[C15]].</p></li>
            <li><p>Tambahkan karakter [[C16]] setelah [[C17]] diikuti ekstensi file statis, misalnya ubah path menjadi [[C18]].</p></li>
            <li><p>Kirim permintaan. Perhatikan respons tidak memuat tanda caching. Hal ini menandakan cache kemungkinan juga memakai [[C19]] sebagai delimiter path.</p></li>
            <li><p>Ulangi pengujian menggunakan karakter [[C20]] sebagai pengganti [[C21]]. Perhatikan bahwa respons memuat header [[C22]].</p></li>
            <li><p>Kirim ulang permintaan. Perhatikan nilai header [[C23]] berubah menjadi [[C24]]. Hal ini menandakan cache tidak memakai [[C25]] sebagai delimiter dan memiliki aturan cache berbasis ekstensi statis [[C26]]. Anda dapat memakai payload ini untuk eksploitasi.</p></li>
        </ol>
        <h2>Menyusun eksploitasi</h2>
        <ol>
            <li><p>Di browser Burp, klik <strong>Go to exploit server</strong>.</p></li>
            <li>
                <p>Di bagian <strong>Body</strong>, buat eksploitasi yang mengarahkan korban [[C27]] ke URL berbahaya tadi. Pastikan mengubah string acak agar cache membuat kunci unik sehingga [[C28]] menyimpan detail akunnya alih-alih menerima cache Anda sebelumnya:</p>
                [[C29]]
            </li>
            <li><p>Klik <strong>Deliver exploit to victim</strong>. Saat korban membuka eksploitasi, respons mereka disimpan ke cache.</p></li>
            <li>
                <p>Buka URL yang Anda kirimkan ke [[C30]]:</p>
                [[C31]]
            </li>
            <li><p>Perhatikan bahwa respons berisi API key milik [[C32]]. Salin nilai ini.</p></li>
            <li><p>Klik <strong>Submit solution</strong>, lalu kirimkan API key milik [[C33]] untuk menyelesaikan lab.</p></li>
        </ol>
    </div>
</div>
LABHTML,
        ],
    ],
    '3c315ac6a411798fea7dd926a886c9943732dc14b1de47567bafce994f37d818' => [
        'title' => 'Mengeksploitasi normalisasi origin server untuk web cache deception',
        'description_html' => '<p>Untuk menyelesaikan lab, temukan API key milik pengguna [[C0]]. Anda dapat masuk ke akun Anda menggunakan kredensial berikut: [[C1]].</p><p>Kami menyediakan daftar karakter delimiter yang mungkin digunakan untuk membantu Anda menyelesaikan lab: <a chunk-keep-link="" href="/web-security/web-cache-deception/wcd-lab-delimiter-list">Daftar delimiter lab web cache deception</a>.</p><div class="highlightedarea"><h4>Pengetahuan yang dibutuhkan</h4><p>Untuk menyelesaikan lab ini, Anda perlu mengetahui:</p><ul><li>Cara mengenali apakah cache dan origin server menormalisasi path URL.</li><li>Cara mengidentifikasi aturan cache direktori statis.</li><li>Cara mengeksploitasi normalisasi oleh origin server.</li></ul><p>Poin ini dibahas di topik Academy <a href="/web-security/web-cache-deception">Web cache deception</a>.</p></div>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content">
    <div>
        <h2>Mengidentifikasi endpoint target</h2>
        <ol>
            <li><p>Di browser Burp, masuk ke aplikasi menggunakan kredensial [[C0]].</p></li>
            <li><p>Perhatikan bahwa respons berisi API key Anda.</p></li>
        </ol>
        <h2>Menyelidiki perbedaan delimiter path</h2>
        <ol>
            <li><p>Di <strong>Proxy &gt; HTTP history</strong>, klik kanan permintaan [[C1]] lalu pilih <strong>Send to Repeater</strong>.</p></li>
            <li><p>Buka tab <strong>Repeater</strong>. Ubah path menjadi [[C2]] lalu kirim. Perhatikan respons [[C3]] yang menunjukkan origin server tidak mengabstraksikan path ke [[C4]].</p></li>
            <li><p>Ubah path menjadi [[C5]] lalu kirim. Perhatikan respons [[C6]] tanpa tanda cache.</p></li>
            <li><p>Klik kanan pesan lalu pilih <strong>Send to Intruder</strong>.</p></li>
            <li><p>Buka tab <strong>Intruder</strong>. Pastikan <strong>Sniper attack</strong> dipilih dan tambahkan posisi payload setelah [[C7]] seperti berikut: [[C8]].</p></li>
            <li><p>Di panel samping <strong>Payloads</strong> pada bagian <strong>Payload configuration</strong>, tambahkan daftar karakter kandidat delimiter. Di <strong>Payload encoding</strong>, hapus centang pada <strong>URL-encode these characters</strong>.</p></li>
            <li><p>Klik <strong><span class="icon-play-circle-outline"></span> Start attack</strong>. Serangan berjalan di jendela baru.</p></li>
            <li><p>Setelah serangan selesai, urutkan hasil berdasarkan <strong>Status code</strong>. Perhatikan hanya karakter [[C9]] yang menerima respons [[C10]] berisi API key Anda, yang berarti origin server hanya memakai [[C11]] sebagai delimiter path. Karena [[C12]] dipakai secara universal sebagai delimiter, lanjutkan memeriksa perbedaan normalisasi.</p></li>
        </ol>
        <h2>Menyelidiki perbedaan normalisasi</h2>
        <ol>
            <li><p>Di <strong>Repeater</strong>, hapus string acak [[C13]] lalu tambahkan direktori acak diikuti segmen titik terenkode di awal path asli. Contohnya: [[C14]].</p></li>
            <li><p>Kirim permintaan. Perhatikan ini menghasilkan respons [[C15]] berisi API key Anda, yang menandakan origin server mendekode dan memproses segmen titik sehingga menafsirkan path sebagai [[C16]].</p></li>
            <li><p>Di <strong>Proxy &gt; HTTP history</strong>, perhatikan bahwa seluruh path resource statis diawali awalan direktori [[C17]] dan responsnya menunjukkan tanda caching.</p></li>
            <li><p>Klik kanan permintaan berawalan [[C18]] lalu pilih <strong>Send to Repeater</strong>.</p></li>
            <li><p>Di <strong>Repeater</strong>, tambahkan segmen titik terenkode setelah awalan path [[C19]], misalnya [[C20]] menjadi [[C21]].</p></li>
            <li><p>Kirim permintaan. Perhatikan respons [[C22]] memuat header [[C23]].</p></li>
            <li><p>Kirim ulang permintaan. Perhatikan nilai header [[C24]] berubah ke [[C25]]. Ini mengisyaratkan cache tidak mendekode segmen titik dan memiliki aturan cache berbasis awalan [[C26]]. Untuk memastikannya, lakukan uji lanjut karena bisa saja respons di-cache oleh aturan lain.</p></li>
            <li><p>Ubah path setelah [[C27]] menjadi string acak seperti [[C28]]. Kirim permintaan dan perhatikan respons [[C29]] memuat [[C30]].</p></li>
            <li><p>Kirim ulang permintaan dan perhatikan nilai [[C31]] menjadi [[C32]]. Ini memastikan adanya aturan cache direktori statis berdasarkan awalan [[C33]].</p></li>
        </ol>
        <h2>Menyusun eksploitasi</h2>
        <ol>
            <li><p>Buka tab <strong>Repeater</strong> berisi permintaan [[C34]]. Coba susun eksploitasi seperti [[C35]]. Kirim permintaan dan perhatikan respons [[C36]] berisi API key Anda beserta header [[C37]].</p></li>
            <li><p>Kirim ulang permintaan dan perhatikan nilai header [[C38]] berubah menjadi [[C39]].</p></li>
            <li><p>Di browser Burp, klik <strong>Go to exploit server</strong>.</p></li>
            <li>
                <p>Di bagian <strong>Body</strong>, buat eksploitasi yang mengarahkan korban [[C40]] ke URL berbahaya. Pastikan menambah parameter acak sebagai cache buster agar korban tidak menerima respons cache Anda sebelumnya:</p>
                [[C41]]
            </li>
            <li><p>Klik <strong>Deliver exploit to victim</strong>. Saat korban membuka eksploitasi, respons mereka tersimpan ke cache.</p></li>
            <li>
                <p>Buka URL yang Anda kirimkan ke [[C42]] pada eksploitasi:</p>
                [[C43]]
            </li>
            <li><p>Perhatikan bahwa respons memuat API key milik [[C44]]. Salin nilainya.</p></li>
            <li><p>Klik <strong>Submit solution</strong>, lalu kirimkan API key milik [[C45]] untuk menyelesaikan lab.</p></li>
        </ol>
    </div>
</div>
LABHTML,
        ],
    ],
    '8154d34b0b2f71eb7f02a610af2cf34f8bd1bffb9583b7c5b75bbe6ab66c201b' => [
        'title' => 'Mengeksploitasi normalisasi server cache untuk web cache deception',
        'description_html' => '<p>Untuk menyelesaikan lab, temukan API key milik pengguna [[C0]]. Anda dapat masuk ke akun Anda menggunakan kredensial berikut: [[C1]].</p><p>Kami menyediakan daftar karakter delimiter yang mungkin digunakan untuk membantu Anda menyelesaikan lab: <a chunk-keep-link="" href="/web-security/web-cache-deception/wcd-lab-delimiter-list">Daftar delimiter lab web cache deception</a>.</p><div class="highlightedarea"><h4>Pengetahuan yang dibutuhkan</h4><p>Untuk menyelesaikan lab ini, Anda perlu mengetahui:</p><ul><li>Cara mengenali apakah cache dan origin server menormalisasi path URL.</li><li>Cara mengidentifikasi aturan cache direktori statis.</li><li>Cara mengidentifikasi perbedaan penafsiran delimiter antara cache dan origin server.</li><li>Cara mengeksploitasi normalisasi oleh server cache.</li></ul><p>Poin ini dibahas di topik Academy <a href="/web-security/web-cache-deception">Web cache deception</a>.</p></div>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content">
    <div>
        <h2>Mengidentifikasi endpoint target</h2>
        <ol>
            <li><p>Di browser Burp, masuk ke aplikasi menggunakan kredensial [[C0]].</p></li>
            <li><p>Perhatikan bahwa respons berisi API key Anda.</p></li>
        </ol>
        <h2>Menyelidiki delimiter path yang dipakai origin server</h2>
        <ol>
            <li><p>Di <strong>Proxy &gt; HTTP history</strong>, klik kanan permintaan [[C1]] lalu pilih <strong>Send to Repeater</strong>.</p></li>
            <li><p>Ubah path menjadi [[C2]] lalu kirim. Perhatikan respons [[C3]] yang menunjukkan origin server tidak mengabstraksikan path ke [[C4]].</p></li>
            <li><p>Ubah path menjadi [[C5]] lalu kirim. Perhatikan respons [[C6]] tanpa tanda cache.</p></li>
            <li><p>Klik kanan pesan lalu pilih <strong>Send to Intruder</strong>.</p></li>
            <li><p>Buka tab <strong>Intruder</strong>. Pastikan <strong>Sniper attack</strong> aktif dan tambahkan posisi payload setelah [[C7]] sebagai berikut: [[C8]].</p></li>
            <li><p>Di panel samping <strong>Payloads</strong> pada bagian <strong>Payload configuration</strong>, masukkan daftar karakter kandidat delimiter.</p></li>
            <li><p>Di bagian <strong>Payload encoding</strong>, hapus centang pada <strong>URL-encode these characters</strong>.</p></li>
            <li><p>Klik <strong><span class="icon-play-circle-outline"></span> Start attack</strong>. Serangan berjalan di jendela baru.</p></li>
            <li><p>Setelah serangan selesai, urutkan hasil berdasarkan <strong>Status code</strong>. Perhatikan karakter [[C9]], [[C10]], [[C11]], dan [[C12]] mengembalikan respons [[C13]] berisi API key Anda. Artinya origin server memakainya sebagai delimiter path. Abaikan karakter [[C14]] karena browser korban akan memperlakukannya sebagai fragment sebelum permintaan dikirim ke cache.</p></li>
        </ol>
        <h2>Menyelidiki perbedaan delimiter path</h2>
        <ol>
            <li><p>Buka tab <strong>Repeater</strong> berisi permintaan [[C15]]. Tambahkan [[C16]] setelah [[C17]] diikuti ekstensi statis, misalnya [[C18]].</p></li>
            <li><p>Kirim permintaan. Perhatikan respons tidak memuat tanda caching. Ini menandakan cache juga memakai [[C19]] sebagai delimiter atau tidak memiliki aturan cache berbasis ekstensi [[C20]].</p></li>
            <li><p>Ulangi uji memakai karakter [[C21]] dan [[C22]] alih-alih [[C23]]. Perhatikan respons juga tidak menunjukkan tanda caching.</p></li>
        </ol>
        <h2>Menyelidiki perbedaan normalisasi</h2>
        <ol>
            <li><p>Hapus query string lalu tambahkan direktori acak diikuti segmen titik terenkode di awal path asli, misalnya [[C24]].</p></li>
            <li><p>Kirim permintaan. Perhatikan respons [[C25]] yang menunjukkan origin server tidak mendekode segmen titik untuk menormalisasi path menjadi [[C26]].</p></li>
            <li><p>Di <strong>Proxy &gt; HTTP history</strong>, perhatikan bahwa resource statis berbagi awalan direktori [[C27]] dan responsnya menunjukkan tanda caching.</p></li>
            <li><p>Klik kanan permintaan berawalan [[C28]] lalu pilih <strong>Send to Repeater</strong>.</p></li>
            <li><p>Di <strong>Repeater</strong>, tambahkan segmen titik terenkode dan direktori acak sebelum awalan [[C29]] atau ubah [[C30]] seperti contoh [[C31]].</p></li>
            <li><p>Kirim permintaan. Perhatikan respons [[C32]] memuat header [[C33]].</p></li>
            <li><p>Kirim ulang permintaan. Perhatikan nilai header [[C34]] berubah menjadi [[C35]]. Ini menandakan cache kemungkinan mendekode segmen titik dan memiliki aturan cache berawalan [[C36]]. Lakukan uji lanjutan untuk memastikan.</p></li>
            <li><p>Tambahkan segmen titik terenkode setelah awalan path [[C37]] seperti berikut: [[C38]].</p></li>
            <li><p>Kirim permintaan. Perhatikan respons [[C39]] tidak lagi memuat tanda caching. Ini membuktikan cache mendekode serta menyelesaikan segmen titik dan memiliki aturan cache berbasis awalan [[C40]].</p></li>
        </ol>
        <h2>Menyusun eksploitasi</h2>
        <ol>
            <li>
                <p>Buka tab <strong>Repeater</strong> berisi permintaan [[C41]]. Gunakan delimiter [[C42]] untuk menyusun eksploitasi sebagai berikut:</p>
                [[C43]]
            </li>
            <li><p>Kirim permintaan. Perhatikan respons [[C44]] mengembalikan API key Anda tetapi tanpa tanda cache.</p></li>
            <li><p>Ulangi uji dengan karakter [[C45]] dan [[C46]] alih-alih [[C47]]. Saat memakai [[C48]], responsnya [[C49]] berisi API key Anda serta header [[C50]]. Kirim ulang dan nilainya berubah menjadi [[C51]]. Anda dapat memakai delimiter ini untuk eksploitasi.</p></li>
            <li><p>Di browser Burp, klik <strong>Go to exploit server</strong>.</p></li>
            <li>
                <p>Di bagian <strong>Body</strong>, buat eksploitasi yang mengarahkan korban [[C52]] ke URL berbahaya tersebut. Pastikan menyertakan parameter acak sebagai cache buster:</p>
                [[C53]]
            </li>
            <li><p>Klik <strong>Deliver exploit to victim</strong>.</p></li>
            <li>
                <p>Buka URL yang Anda kirimkan ke [[C54]] pada eksploitasi:</p>
                [[C55]]
            </li>
            <li><p>Perhatikan respons memuat API key milik [[C56]]. Salin nilai tersebut.</p></li>
            <li><p>Klik <strong>Submit solution</strong>, lalu kirimkan API key milik [[C57]] untuk menyelesaikan lab.</p></li>
        </ol>
    </div>
</div>
LABHTML,
        ],
    ],
    '988579f4180d533b4ca2e244a488d7d252f5b1aef28508ea8c5284936740d9ac' => [
        'title' => 'Mengeksploitasi aturan cache exact-match untuk web cache deception',
        'description_html' => '<p>Untuk menyelesaikan lab, ubah alamat email milik pengguna [[C0]]. Anda dapat masuk ke akun Anda menggunakan kredensial berikut: [[C1]].</p><p>Kami menyediakan daftar karakter delimiter yang mungkin digunakan untuk membantu Anda menyelesaikan lab: <a chunk-keep-link="" href="/web-security/web-cache-deception/wcd-lab-delimiter-list">Daftar delimiter lab web cache deception</a>.</p><div class="highlightedarea"><h4>Pengetahuan yang dibutuhkan</h4><p>Untuk menyelesaikan lab ini, Anda perlu mengetahui:</p><ul><li>Cara mengidentifikasi aturan cache nama file exact-match.</li><li>Cara mengeksploitasi aturan cache nama file exact-match memanfaatkan perbedaan delimiter dan normalisasi.</li><li>Cara menyusun serangan CSRF. Untuk informasi selengkapnya, lihat topik Academy <a href="/web-security/csrf">Cross-site request forgery</a>.</li></ul><p>Poin ini dibahas di topik Academy <a href="/web-security/web-cache-deception">Web cache deception</a>.</p></div>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content">
    <div>
        <h2>Mengidentifikasi endpoint target</h2>
        <ol>
            <li><p>Di browser Burp, masuk ke aplikasi menggunakan kredensial [[C0]], lalu ubah alamat email Anda.</p></li>
            <li><p>Di <strong>Proxy &gt; HTTP history</strong>, perhatikan bahwa formulir ubah email pada respons [[C1]] memuat token CSRF sebagai parameter tersembunyi.</p></li>
        </ol>
        <h2>Menyelidiki perbedaan delimiter path</h2>
        <ol>
            <li><p>Klik kanan permintaan [[C2]] lalu pilih <strong>Send to Repeater</strong>.</p></li>
            <li><p>Di <strong>Repeater</strong>, ubah path menjadi [[C3]] lalu kirim. Perhatikan respons [[C4]] yang menandakan origin server tidak mengabstraksikan path ke [[C5]].</p></li>
            <li><p>Ubah path menjadi [[C6]] lalu kirim. Perhatikan respons [[C7]] tanpa tanda cache.</p></li>
            <li><p>Klik kanan permintaan lalu pilih <strong>Send to Intruder</strong>.</p></li>
            <li><p>Di <strong>Intruder</strong>, buat serangan untuk mengidentifikasi apakah origin server menggunakan delimiter path. Gunakan payload: [[C8]]. Perhatikan bahwa [[C9]] dan [[C10]] sama-sama digunakan sebagai delimiter.</p></li>
            <li><p>Buka tab <strong>Repeater</strong> berisi permintaan [[C11]]. Ubah path menjadi [[C12]] lalu kirim. Perhatikan respons tidak memuat tanda caching.</p></li>
            <li><p>Ulangi pengujian memakai karakter [[C13]] alih-alih [[C14]]. Perhatikan respons tetap tidak memuat tanda caching.</p></li>
        </ol>
        <h2>Menyelidiki perbedaan normalisasi</h2>
        <ol>
            <li><p>Tambahkan direktori acak diikuti segmen titik terenkode di awal path asli, misalnya [[C15]].</p></li>
            <li><p>Kirim permintaan. Perhatikan respons [[C16]] yang menandakan origin server tidak mendekode atau menyelesaikan segmen titik untuk menormalisasi path ke [[C17]].</p></li>
            <li><p>Di <strong>Proxy &gt; HTTP history</strong>, perhatikan bahwa resource statis memakai awalan direktori path URL [[C18]], tetapi tidak satu pun menunjukkan tanda caching. Ini menandakan tidak ada aturan cache direktori statis.</p></li>
            <li><p>Di <strong>Repeater</strong>, ubah path URL dari permintaan [[C19]] menjadi [[C20]].</p></li>
            <li><p>Kirim permintaan. Perhatikan respons memuat header [[C21]]. Kirim ulang dan nilainya berubah menjadi [[C22]]. Ini menandakan cache memiliki aturan penyimpanan berdasarkan nama file [[C23]].</p></li>
            <li><p>Tambahkan segmen titik terenkode dan direktori acak sebelum [[C24]], misalnya [[C25]].</p></li>
            <li><p>Kirim permintaan. Perhatikan respons [[C26]] tersimpan di cache. Hal ini menunjukkan cache menormalisasi path ke [[C27]].</p></li>
        </ol>
        <h2>Mengeksploitasi kerentanan untuk menemukan token CSRF administrator</h2>
        <ol>
            <li><p>Gunakan delimiter [[C28]] untuk mencoba menyusun eksploitasi seperti berikut: [[C29]]. Kirim permintaan dan perhatikan respons [[C30]] tidak memuat tanda cache.</p></li>
            <li><p>Ulangi pengujian memakai delimiter [[C31]] alih-alih [[C32]]. Respons [[C33]] kini memuat API key Anda serta header [[C34]], lalu berubah menjadi [[C35]] saat dikirim ulang. Ini berarti cache menormalisasi path ke [[C36]] dan menyimpan responsnya.</p></li>
            <li><p>Di browser Burp, klik <strong>Go to exploit server</strong>.</p></li>
            <li>
                <p>Di bagian <strong>Body</strong>, buat eksploitasi yang mengarahkan korban ke URL berbahaya yang Anda susun. Pastikan menambahkan parameter acak sebagai cache buster:</p>
                [[C37]]
            </li>
            <li><p>Klik <strong>Deliver exploit to victim</strong>.</p></li>
            <li>
                <p>Buka URL yang Anda kirimkan ke korban pada eksploitasi:</p>
                [[C38]]
            </li>
            <li><p>Perhatikan bahwa di browser Burp halaman mengalihkan ke halaman login akun karena data sesi tidak valid. Lanjutkan uji melalui Repeater.</p></li>
            <li><p>Buka tab <strong>Repeater</strong> berisi permintaan [[C39]]. Ubah path agar sesuai dengan URL eksploitasi yang dikirim ke korban, misalnya [[C40]].</p></li>
            <li><p>Kirim permintaan dalam 30 detik setelah mengirim eksploitasi ke korban. Jika terlambat, kirim ulang eksploitasi dengan cache buster berbeda.</p></li>
            <li><p>Perhatikan respons memuat token CSRF milik pengguna [[C41]]. Salin nilainya.</p></li>
        </ol>
        <h2>Menyusun eksploitasi</h2>
        <ol>
            <li><p>Di <strong>Proxy &gt; HTTP history</strong>, klik kanan permintaan [[C42]] lalu pilih <strong>Send to Repeater</strong>.</p></li>
            <li><p>Di <strong>Repeater</strong>, ganti token CSRF dengan token milik administrator.</p></li>
            <li><p>Ubah alamat email di eksploitasi Anda agar berbeda dengan milik Anda sendiri.</p></li>
            <li><p>Klik kanan permintaan lalu pilih <strong>Engagement tools &gt; Generate CSRF PoC</strong>.</p></li>
            <li><p>Klik <strong>Copy HTML</strong>.</p></li>
            <li><p>Tempelkan HTML ke bagian <strong>Body</strong> pada server eksploitasi.</p></li>
            <li><p>Klik <strong>Deliver exploit to victim</strong> untuk menyelesaikan lab.</p></li>
        </ol>
    </div>
</div>
LABHTML,
        ],
    ],
];
