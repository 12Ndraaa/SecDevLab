<?php

return [
    '145baf066fe7fe27bb26a1a295e6a58d17ac101777181cc01014c893fdda06c6' => [
        'title' => 'Web cache poisoning melalui header tanpa kunci cache',
        'description_html' => '<p>Lab ini rentan terhadap web cache poisoning karena menangani masukan dari header yang tidak masuk kunci cache (unkeyed header) secara tidak aman. Seorang pengguna secara berkala mengunjungi beranda situs. Untuk menyelesaikan lab, racuni cache dengan respons yang mengeksekusi [[C0]] di browser pengunjung.</p><div class="component-solution expandable-container"><details><summary><h4><span class="icon-erlenmeyer"></span> Petunjuk</h4></summary><div class="content"><div><p>Lab ini mendukung header [[C1]].</p></div></div></details></div>',
        'sections' => [
            0 => '<div class="content"><div><p>Lab ini mendukung header [[C0]].</p></div></div>',
            1 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Dengan Burp berjalan, buka beranda situs web.</li>
        <li>Di Burp, buka "Proxy" &gt; "HTTP history", temukan permintaan [[C0]] untuk halaman beranda, lalu kirim ke Burp Repeater.</li>
        <li>Tambahkan parameter query cache-buster, misalnya [[C1]].</li>
        <li>Tambahkan header [[C2]] dengan hostname acak seperti [[C3]] lalu kirim permintaan.</li>
        <li>Amati bahwa header [[C4]] dipakai menyusun URL absolut secara dinamis untuk mengimpor file JavaScript di [[C5]].</li>
        <li>Kirim ulang permintaan dan amati respons memuat header [[C6]], menandakan respons berasal dari cache.</li>
        <li>
            <p>Buka server eksploitasi dan ubah nama file agar sesuai dengan path pada respons rentan:</p>
            [[C7]]
        </li>
        <li>Di bagian body, masukkan payload [[C8]] lalu simpan eksploitasi.</li>
        <li>Buka kembali permintaan [[C9]] beranda di Burp Repeater dan hapus cache buster-nya.</li>
        <li>
            <p>Tambahkan header berikut menggunakan ID server eksploitasi Anda sendiri:</p>
            [[C10]]
        </li>
        <li>Kirim ulang permintaan berbahaya tersebut hingga URL server eksploitasi Anda tercermin di respons dan muncul [[C11]] pada header.</li>
        <li>Untuk mensimulasikan korban, buka URL beracun di browser dan pastikan [[C12]] terpicu sebelum cache kedaluwarsa tiap 30 detik.</li>
        <li>Jika lab belum selesai, kirim ulang permintaan tiap beberapa detik untuk meracuni ulang cache sampai korban mengunjungi halaman.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    'd131a4d5f8a6a7e2ae584e9bc217208c223cad4bac3aed016482305228d68fb2' => [
        'title' => 'Web cache poisoning melalui cookie tanpa kunci cache',
        'description_html' => '<p>Lab ini rentan terhadap web cache poisoning karena cookie tidak dimasukkan ke kunci cache. Seorang pengguna secara berkala mengunjungi beranda situs. Untuk menyelesaikan lab, racuni cache dengan respons yang mengeksekusi [[C0]] di browser pengunjung.</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Dengan Burp berjalan, buka beranda situs web.</li>
        <li>Di Burp, buka "Proxy" &gt; "HTTP history" dan amati respons pertama menyetel cookie [[C0]].</li>
        <li>Muat ulang beranda dan amati bahwa nilai cookie [[C1]] tercermin di dalam objek JavaScript bertanda kutip ganda pada respons.</li>
        <li>Kirim permintaan tersebut ke Burp Repeater lalu tambahkan parameter query cache-buster.</li>
        <li>Ubah nilai cookie menjadi string acak lalu kirim ulang untuk memastikan nilainya memantul di respons.</li>
        <li>
            <p>Masukkan payload XSS yang sesuai di dalam cookie [[C2]], misalnya:</p>
            [[C3]]
        </li>
        <li>Kirim ulang permintaan hingga payload terlihat di respons dan muncul [[C4]] di header.</li>
        <li>Muat URL tersebut di browser dan pastikan [[C5]] terpicu.</li>
        <li>Kembali ke Burp Repeater, hapus cache buster, lalu kirim ulang permintaan untuk menjaga cache tetap beracun sampai korban berkunjung dan lab selesai.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    'ef8228ac8678117cd722c596ac9f2f9e76bbf7d6d2f09a53ce7cf28d04ccff7a' => [
        'title' => 'Web cache poisoning menggunakan beberapa header',
        'description_html' => '<p>Lab ini memiliki kerentanan web cache poisoning yang hanya dapat dieksploitasi dengan memadukan beberapa header. Seorang pengguna mengunjungi beranda sekitar satu menit sekali. Untuk menyelesaikan lab, racuni cache dengan respons yang mengeksekusi [[C0]] di browser pengunjung.</p><div class="component-solution expandable-container"><details><summary><h4><span class="icon-erlenmeyer"></span> Petunjuk</h4></summary><div class="content"><div><p>Lab ini mendukung header [[C1]] maupun [[C2]].</p></div></div></details></div>',
        'sections' => [
            0 => '<div class="content"><div><p>Lab ini mendukung header [[C0]] maupun [[C1]].</p></div></div>',
            1 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Dengan Burp berjalan, buka beranda situs web.</li>
        <li>Buka "Proxy" &gt; "HTTP history", temukan permintaan [[C0]] untuk file JavaScript [[C1]], lalu kirim ke Burp Repeater.</li>
        <li>Tambahkan parameter query cache-buster serta header [[C2]] bernilai acak seperti [[C3]]; header [[C4]] saja belum memengaruhi respons.</li>
        <li>Hapus header tersebut lalu tambahkan header [[C5]]. Jika nilainya selain [[C6]], respons mengembalikan pengalihan 302 dengan header [[C7]] ke URL yang sama memakai [[C8]].</li>
        <li>Tambahkan kembali [[C9]] bersama [[C10]] lalu kirim; header [[C11]] pada 302 kini mengarah ke [[C12]].</li>
        <li>
            <p>Buka server eksploitasi dan sesuaikan nama file dengan path respons rentan:</p>
            [[C13]]
        </li>
        <li>Di bagian body, masukkan payload [[C14]] lalu simpan eksploitasi.</li>
        <li>
            <p>Kembali di Burp Repeater, setel header [[C15]] dengan ID server eksploitasi Anda:</p>
            [[C16]]
        </li>
        <li>Pastikan header [[C17]] bernilai selain [[C18]].</li>
        <li>Kirim permintaan hingga URL server eksploitasi Anda tercermin di respons dan muncul [[C19]] di header.</li>
        <li>Klik kanan permintaan di Burp, pilih "Copy URL", lalu buka di browser Burp untuk memastikan skrip berisi payload [[C20]] tersimpan di cache (tidak mengeksekusi [[C21]] di sana).</li>
        <li>Kembali ke Burp Repeater, hapus cache buster, lalu kirim ulang hingga cache utama teracuni.</li>
        <li>Untuk mensimulasikan korban, muat ulang beranda di browser dan pastikan [[C22]] berjalan.</li>
        <li>Terus kirim ulang permintaan sampai korban mengunjungi situs dan lab selesai.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    'd6f044fd123351c4a58cf52862ce204541864a727f83fca937a5ebe40542a162' => [
        'title' => 'Web cache poisoning tertarget memakai header tak dikenal',
        'description_html' => '<p>Lab ini rentan terhadap web cache poisoning dan korban akan melihat komentar apa pun yang Anda kirimkan. Untuk menyelesaikan lab, racuni cache dengan respons yang mengeksekusi [[C0]] di browser pengunjung, sambil memastikan respons hanya disajikan kepada kelompok pengguna korban yang dituju.</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <p>Menyelesaikan lab ini memerlukan identifikasi celah, penentuan cara menargetkan subset pengguna yang tepat, lalu peracunan cache secara terarah.</p>
    <ol>
        <li>Dengan Burp berjalan, buka beranda situs web.</li>
        <li>Di Burp, buka "Proxy" &gt; "HTTP history" dan temukan permintaan [[C0]] ke halaman beranda.</li>
        <li>Dengan ekstensi <a href="/web-security/web-cache-poisoning#param-miner">Param Miner</a> aktif, klik kanan permintaan lalu pilih "Guess headers" hingga menemukan masukan rahasia berupa header [[C1]].</li>
        <li>Kirim permintaan ke Burp Repeater dan tambahkan parameter query cache-buster.</li>
        <li>Tambahkan header [[C2]] bernilai acak seperti [[C3]]; nilainya dipakai membentuk URL absolut untuk mengimpor skrip [[C4]].</li>
        <li>
            <p>Buka server eksploitasi dan sesuaikan nama file dengan path respons rentan:</p>
            [[C5]]
        </li>
        <li>Di bagian body, masukkan payload [[C6]] lalu simpan eksploitasi.</li>
        <li>
            <p>Di Burp Repeater, setel header [[C7]] memakai ID server eksploitasi Anda:</p>
            [[C8]]
        </li>
        <li>Kirim permintaan sampai URL server eksploitasi Anda tercermin di respons dan muncul [[C9]].</li>
        <li>Uji URL tersebut di browser untuk memastikan [[C10]] terpicu.</li>
        <li>Perhatikan header [[C11]] menandakan [[C12]] merupakan bagian dari kunci cache, sehingga Anda perlu mencari [[C13]] korban.</li>
        <li>
            <p>Fitur komentar situs mengizinkan beberapa tag HTML. Kirim komentar berisi elemen pemanggil server eksploitasi Anda, misalnya:</p>
            [[C14]]
        </li>
        <li>Buka halaman blog untuk memastikan komentar berhasil terbit.</li>
        <li>Buka "Access log" di server eksploitasi dan tunggu permintaan dari pengguna korban lalu salin nilai [[C15]]-nya.</li>
        <li>Di Burp Repeater, tempelkan [[C16]] korban ke header permintaan berbahaya Anda dan hapus cache buster.</li>
        <li>Kirim permintaan hingga URL server eksploitasi tercermin bersama header [[C17]].</li>
        <li>Kirim ulang secara berkala agar cache tetap beracun sampai korban mengunjungi situs dan lab selesai.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    'c3cbe5abaf85f50bfc76fb4c591a3811dcc7e393cbce37d987780b4c79ecf1c4' => [
        'title' => 'Web cache poisoning melalui query string tanpa kunci cache',
        'description_html' => '<p>Lab ini rentan terhadap web cache poisoning karena query string tidak masuk dalam kunci cache. Pengguna secara berkala mengunjungi beranda memakai Chrome.</p><p>Untuk menyelesaikan lab, racuni beranda dengan respons yang mengeksekusi [[C0]] di browser korban.</p><div class="component-solution expandable-container"><details><summary><h4><span class="icon-erlenmeyer"></span> Petunjuk</h4></summary><div class="content"><div><ul><li>Gunakan header [[C1]] untuk menampilkan kunci cache di respons jika kesulitan.</li><li>Walau parameter query tidak bisa menjadi cache buster, ada header permintaan umum yang masuk kunci cache; ekstensi <a href="https://portswigger.net/bappstore/17d2949a985c4b7ca092728dba871943">Param Miner</a> dapat menambahkannya otomatis.</li></ul></div></div></details></div>',
        'sections' => [
            0 => '<div class="content"><div><ul><li>Gunakan header [[C0]] untuk menampilkan kunci cache di respons jika kesulitan.</li><li>Walau parameter query tidak bisa menjadi cache buster, ada header permintaan umum yang masuk kunci cache; ekstensi <a href="https://portswigger.net/bappstore/17d2949a985c4b7ca092728dba871943">Param Miner</a> dapat menambahkannya otomatis.</li></ul></div></div>',
            1 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Dengan Burp berjalan, buka beranda situs, temukan permintaan [[C0]] di "HTTP history", dan kirim ke Burp Repeater.</li>
        <li>Tambahkan parameter query acak; cache hit tetap terjadi meski parameter berubah, membuktikan query string tidak masuk kunci cache.</li>
        <li>Identifikasi bahwa header [[C1]] dapat dipakai sebagai cache buster lalu tambahkan ke permintaan.</li>
        <li>Saat mendapat cache miss, parameter suntikan tercermin di respons dan tetap tertinggal di cache setelah parameter dihapus.</li>
        <li>
            <p>Tambahkan parameter acak untuk keluar dari string pantulan dan menyuntikkan payload XSS:</p>
            [[C2]]
        </li>
        <li>Kirim ulang permintaan hingga payload tercermin di respons dengan header [[C3]].</li>
        <li>Untuk mensimulasikan korban, hapus query string dan kirim ulang dengan cache buster sama untuk memastikan respons beracun tetap tersaji dari cache.</li>
        <li>Hapus header cache-buster [[C4]], kembalikan payload ke query string, lalu kirim ulang sampai cache utama teracuni. Buka beranda di browser untuk memverifikasi popup.</li>
        <li>Lab selesai saat korban membuka beranda beracun tersebut (racuni ulang bila belum selesai setelah 35 detik).</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    'f14385ab65ba5ac2e5d347c09f32b51bd9ac1e55946c15aec01dd0f3e902a863' => [
        'title' => 'Web cache poisoning melalui parameter query tanpa kunci cache',
        'description_html' => '<p>Lab ini rentan terhadap web cache poisoning karena mengecualikan parameter tertentu dari kunci cache. Pengguna secara berkala mengunjungi beranda memakai Chrome.</p><p>Untuk menyelesaikan lab, racuni cache dengan respons yang mengeksekusi [[C0]] di browser korban.</p><div class="component-solution expandable-container"><details><summary><h4><span class="icon-erlenmeyer"></span> Petunjuk</h4></summary><div class="content"><div><p>Situs web kerap mengecualikan parameter analitik UTM tertentu dari kunci cache.</p></div></div></details></div>',
        'sections' => [
            0 => '<div class="content"><div><p>Situs web kerap mengecualikan parameter analitik UTM tertentu dari kunci cache.</p></div></div>',
            1 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Amati beranda sebagai cache oracle: mengubah query string menghasilkan cache miss (berarti query string masuk kunci cache) sekaligus memantul di respons.</li>
        <li>Tambahkan parameter query cache-buster.</li>
        <li>Gunakan fitur "Guess GET parameters" di Param Miner untuk mendeteksi dukungan parameter [[C0]].</li>
        <li>Pastikan parameter [[C1]] tidak masuk kunci cache (tetap menghasilkan cache hit), lalu kirim ulang sampai mendapat cache miss untuk melihat pantulannya di respons.</li>
        <li>
            <p>Kirim permintaan dengan parameter berisi payload XSS pemecah string pantulan:</p>
            [[C2]]
        </li>
        <li>Setelah payload ter-cache, hapus parameter [[C3]], pilih "Copy URL", lalu buka di browser untuk memastikan [[C4]] terpicu.</li>
        <li>Hapus cache buster, pasang kembali parameter [[C5]] berisi payload, lalu kirim ulang sampai cache pengguna umum teracuni dan korban mengunjungi beranda.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '0e7fb21969d7178a1c1ae847cd2b80f7a277dee996bd1450604ba28d8d7a25da' => [
        'title' => 'Parameter cloaking',
        'description_html' => '<p>Lab ini rentan terhadap web cache poisoning karena mengecualikan parameter tertentu dari kunci cache disertai penguraian parameter yang tidak konsisten antara cache dan back-end. Pengguna secara berkala mengunjungi beranda memakai Chrome.</p><p>Untuk menyelesaikan lab, gunakan teknik parameter cloaking guna meracuni cache agar mengeksekusi [[C0]] di browser korban.</p><div class="component-solution expandable-container"><details><summary><h4><span class="icon-erlenmeyer"></span> Petunjuk</h4></summary><div class="content"><div><p>Situs mengecualikan salah satu parameter analitik UTM.</p></div></div></details></div>',
        'sections' => [
            0 => '<div class="content"><div><p>Situs mengecualikan salah satu parameter analitik UTM.</p></div></div>',
            1 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Identifikasi dukungan parameter [[C0]] dan amati bahwa parameter ini dikecualikan dari kunci cache.</li>
        <li>Jika titik koma ([[C1]]) dipakai menempelkan parameter lain ke [[C2]], cache menganggapnya satu parameter (atau gunakan "Bulk scan" &gt; "Rails parameter cloaking scan" di Param Miner).</li>
        <li>Setiap halaman mengimpor [[C3]] yang memanggil [[C4]]; kirim permintaan [[C5]] ke Burp Repeater.</li>
        <li>Nilai parameter [[C6]] mengendalikan nama fungsi pada respons, tetapi parameter [[C7]] tersebut masuk kunci cache.</li>
        <li>
            <p>Menambahkan parameter [[C8]] ganda hanya memakai yang terakhir namun tetap masuk kunci. Sebaliknya, menempelkannya ke [[C9]] memakai titik koma mengecualikannya dari kunci cache sekaligus tetap menimpa fungsi callback back-end:</p>
            [[C10]]
        </li>
        <li>
            <p>Kirim permintaan dengan meneruskan [[C11]] sebagai fungsi callback:</p>
            [[C12]]
        </li>
        <li>Setelah ter-cache, muat beranda di browser dan pastikan [[C13]] terpicu.</li>
        <li>Terus kirim ulang permintaan untuk menjaga cache tetap beracun sampai korban membuka halaman yang mengimpor resource tersebut.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '445170885a5022d81beaf56ed8c332d3ce302fe5d37e99e61a0674d3ac3e6260' => [
        'title' => 'Web cache poisoning melalui permintaan fat GET',
        'description_html' => '<p>Lab ini rentan terhadap web cache poisoning karena menerima permintaan [[C0]] yang memiliki body, tetapi tidak memasukkan isi body tersebut ke kunci cache. Pengguna secara berkala mengunjungi beranda memakai Chrome.</p><p>Untuk menyelesaikan lab, racuni cache dengan respons yang mengeksekusi [[C1]] di browser korban.</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Setiap halaman mengimpor skrip [[C0]] yang memanggil [[C1]]. Kirim permintaan [[C2]] ke Burp Repeater.</li>
        <li>
            <p>Anda dapat mengendalikan nama fungsi pada respons dengan menyelipkan parameter [[C3]] duplikat di body permintaan, sementara kunci cache tetap mengacu pada [[C4]] di baris permintaan:</p>
            [[C5]]
        </li>
        <li>Kirim ulang permintaan dengan nilai fungsi callback [[C6]] hingga berhasil meracuni cache.</li>
        <li>Hapus semua cache buster dan racuni ulang cache sampai korban membuka halaman yang mengimpor resource tersebut.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    'da7b121cfc61090ed5e7cecb6c6f31b595087c04ea02056591225cf659e72eec' => [
        'title' => 'Normalisasi URL',
        'description_html' => '<p>Lab ini mengandung kerentanan XSS yang tidak dapat langsung dieksploitasi karena URL-encoding otomatis browser.</p><p>Untuk menyelesaikan lab, manfaatkan proses normalisasi cache untuk mengeksploitasi celah tersebut, suntikkan payload pengeksekusi [[C0]], lalu kirimkan URL berbahaya ke korban.</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Di Burp Repeater, minta path yang tidak ada seperti [[C0]] dan amati path tersebut tercermin di pesan galat.</li>
        <li>
            <p>Tambahkan payload reflected XSS ke baris permintaan:</p>
            [[C1]]
        </li>
        <li>Meminta URL tersebut langsung dari browser tidak mengeksekusi payload karena browser otomatis melakukan URL-encoding.</li>
        <li>Di Burp Repeater, racuni cache dengan payload Anda lalu segera buka URL tersebut di browser. Kali ini [[C2]] berjalan karena cache menormalisasi (URL-decode) URL dari browser sehingga cocok dengan kunci cache permintaan Repeater.</li>
        <li>Racuni ulang cache lalu segera klik "Deliver link to victim" di lab dan kirimkan URL berbahaya tersebut.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    'c2431a0bc81d81ad810cc1a25bb19fba18e6fcc60b59e3c58fac444292f921d4' => [
        'title' => 'Web cache poisoning untuk mengeksploitasi kerentanan DOM pada cache beraturan ketat',
        'description_html' => '<p>Lab ini mengandung kerentanan berbasis DOM yang dapat dieksploitasi sebagai bagian serangan web cache poisoning. Pengguna mengunjungi beranda sekitar sekali semenit, dan cache memakai aturan kelayakan simpan yang lebih ketat.</p><p>Untuk menyelesaikan lab, racuni cache dengan respons yang mengeksekusi [[C0]] di browser pengunjung.</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Dengan Burp berjalan, buka beranda situs.</li>
        <li>Temukan permintaan [[C0]] ke halaman beranda di "HTTP history" dan kirim ke Burp Repeater.</li>
        <li>Gunakan <a href="/web-security/web-cache-poisoning#param-miner">Param Miner</a> untuk mendeteksi dukungan header [[C1]].</li>
        <li>Tambahkan cache buster serta header [[C2]] bernilai acak seperti [[C3]]; nilai ini menimpa variabel [[C4]] yang diteruskan ke fungsi [[C5]].</li>
        <li>Pelajari fungsi [[C6]] di [[C7]] dan amati adanya <a href="/web-security/cross-site-scripting/dom-based">DOM-XSS</a> dalam penanganan JSON masuk.</li>
        <li>
            <p>Buka server eksploitasi dan sesuaikan nama file dengan path respons rentan:</p>
            [[C8]]
        </li>
        <li>Di bagian head, tambahkan header [[C9]] untuk mengizinkan <a href="/web-security/cors/access-control-allow-origin">CORS</a>.</li>
        <li>
            <p>Di body, susun objek JSON berbahaya berisi payload XSS:</p>
            [[C10]]
        </li>
        <li>Simpan eksploitasi tersebut.</li>
        <li>Di Burp, kirim permintaan beranda ke Burp Repeater.</li>
        <li>
            <p>Tambahkan header berikut memakai ID server eksploitasi Anda:</p>
            [[C11]]
        </li>
        <li>Kirim permintaan sampai URL server eksploitasi Anda tercermin dengan header [[C12]].</li>
        <li>Jika tidak ter-cache, periksa apakah respons masih memuat [[C13]] (tidak layak cache). Muat ulang beranda di browser untuk memperoleh cookie sesi terlebih dahulu, lalu kirim permintaan baru ke Repeater.</li>
        <li>Ulangi pengiriman permintaan baru di Repeater hingga cache berhasil diracuni.</li>
        <li>Buka URL di browser untuk memastikan [[C14]] terpicu.</li>
        <li>Terus kirim ulang permintaan sampai korban mengunjungi situs dan lab selesai.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '552e7c56a4a7bcc6d371c2ef2481f24b901667060db0fc32531e717b73d4fd7a' => [
        'title' => 'Menggabungkan kerentanan web cache poisoning',
        'description_html' => '<p>Lab ini rentan terhadap web cache poisoning jika Anda menyusun rantai eksploitasi gabungan.</p><p>Pengguna mengunjungi beranda sekitar sekali semenit dengan setelan bahasa Inggris. Untuk menyelesaikan lab, racuni cache agar respons mengeksekusi [[C0]] di browser pengunjung.</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <p>Lab ini mengharuskan Anda meracuni cache dengan beberapa respons sekaligus dan menyelaraskannya dengan navigasi korban.</p>
    <ol>
        <li>Dengan Burp berjalan, buka beranda situs web.</li>
        <li>Gunakan <a href="/web-security/web-cache-poisoning#param-miner">Param Miner</a> untuk menemukan dukungan header [[C0]] dan [[C1]].</li>
        <li>Di Repeater, uji header [[C2]] untuk menggantikan file [[C3]] berisi terjemahan teks UI.</li>
        <li>Fungsi [[C4]] rentan terhadap DOM-XSS dalam mengolah data JSON untuk seluruh bahasa kecuali bahasa Inggris.</li>
        <li>
            <p>Buka server eksploitasi dan sesuaikan nama file ke path berikut:</p>
            [[C5]]
        </li>
        <li>Di head, tambahkan header [[C6]] untuk mengaktifkan <a href="/web-security/cors/access-control-allow-origin">CORS</a>.</li>
        <li>
            <p>Di body, buat JSON terjemahan palsu berisi payload XSS pada entri terjemahan bahasa lain (misalnya Spanyol):</p>
            [[C7]]
            Panduan berikut memakai contoh bahasa Spanyol; sesuaikan jika memakai bahasa lain.
        </li>
        <li>Simpan eksploitasi tersebut.</li>
        <li>
            <p>Di Burp, temukan permintaan [[C8]] ke [[C9]] yang membawa cookie [[C10]] bahasa Spanyol:</p>
            [[C11]]
        </li>
        <li>
            <p>Kirim permintaan ke Burp Repeater, tambahkan cache buster serta header berikut:</p>
            [[C12]]
        </li>
        <li>Kirim permintaan dan pastikan server eksploitasi Anda memantul di respons.</li>
        <li>Uji URL tersebut di browser untuk memastikan [[C13]] terpicu.</li>
        <li>Karena bahasa target masih Inggris, Anda harus memaksa korban beralih ke bahasa Spanyol terlebih dahulu.</li>
        <li>Di "HTTP history", amati perubahan bahasa memicu pengalihan ke [[C14]], menyetel cookie [[C15]], lalu memuat ulang beranda dengan [[C16]].</li>
        <li>Kirim permintaan [[C17]] beranda ke Burp Repeater dan tambahkan cache buster.</li>
        <li>Mengubah path via [[C18]] menjadi [[C19]] tidak dapat di-cache karena respons menyertakan header [[C20]].</li>
        <li>Namun server menormalisasi garis miring terbalik (backslash) lewat pengalihan 302: [[C21]] mengalihkan ke [[C22]], dan respons 302 ini dapat di-cache untuk memaksa semua pengguna pindah bahasa ke Spanyol.</li>
        <li>Racuni dahulu halaman [[C23]] memakai header [[C24]] agar mengimpor JSON berbahaya Anda.</li>
        <li>Selagi masih aktif di cache, racuni juga halaman [[C25]] memakai [[C26]] untuk memaksa korban beralih ke halaman berbahasa Spanyol.</li>
        <li>Buka halaman Inggris di browser untuk memverifikasi Anda dialihkan dan [[C27]] berjalan.</li>
        <li>Terus kirim ulang kedua permintaan secara berurutan sampai korban berkunjung dan lab selesai.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '998fb8feea47abfd2e2503c5ae92409006f19e4f2b2c6832bb01450185cefbb5' => [
        'title' => 'Injeksi kunci cache (cache key injection)',
        'description_html' => '<p>Lab ini mengandung beberapa kerentanan independen, termasuk cache key injection. Pengguna secara berkala mengunjungi beranda memakai Chrome.</p><p>Untuk menyelesaikan lab, gabungkan celah tersebut agar mengeksekusi [[C0]] di browser korban menggunakan header [[C1]].</p><div class="component-solution expandable-container"><details><summary><h4><span class="icon-erlenmeyer"></span> Petunjuk</h4></summary><div class="content"><div><p>Lab ini membutuhkan pemahaman beberapa topik kerentanan lain di <a href="/web-security">Web Security Academy</a>.</p></div></div></details></div><div class="component-solution expandable-container"><details><summary><h4><span class="icon-erlenmeyer"></span> Petunjuk</h4></summary><div class="content"><div><p>Ingatlah bahwa header origin suntikan harus huruf kecil agar sesuai spesifikasi HTTP/2 (lihat <a href="/burp/documentation/desktop/http2">Working with HTTP/2 in Burp Suite</a>).</p></div></div></details></div>',
        'sections' => [
            0 => '<div class="content"><div><p>Lab ini membutuhkan pemahaman beberapa topik kerentanan lain di <a href="/web-security">Web Security Academy</a>.</p></div></div>',
            1 => '<div class="content"><div><p>Ingatlah bahwa header origin suntikan harus huruf kecil agar sesuai spesifikasi HTTP/2 (lihat <a href="/burp/documentation/desktop/http2">Working with HTTP/2 in Burp Suite</a>).</p></div></div>',
            2 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>
            <p>Pengalihan di [[C0]] mengecualikan parameter [[C1]] dari kunci cache memakai regex cacat, sehingga Anda bisa menyelipkan konten tanpa kunci ke parameter [[C2]]:</p>
            [[C3]]
        </li>
        <li>Halaman [[C4]] mengimpor [[C5]] yang rentan terhadap client-side parameter pollution melalui [[C6]] karena nilainya tidak di-URL-encode.</li>
        <li>Endpoint [[C7]] juga rentan terhadap response header injection lewat header [[C8]] bila parameter [[C9]] bernilai [[C10]].</li>
        <li>Gunakan header [[C11]] untuk membuktikan cache key injection sehingga injeksi header dapat dipicu via URL terencana.</li>
        <li>
            <p>Gabungkan keempat perilaku ini dengan meracuni cache lewat dua permintaan berikut:</p>
            [[C12]]
            <p>Perhatikan bahwa header origin suntikan berhuruf kecil sesuai spesifikasi HTTP/2.</p>
        </li>
        <li>Ini meracuni [[C13]] agar mengalihkan ke halaman login bermuatan skrip lokalisasi beracun yang mengeksekusi [[C14]] dan menyelesaikan lab.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    'ef5f16230d33fe616215fe47487299d39980a2a94f3d006b7fc3abe6b08837c1' => [
        'title' => 'Peracunan cache internal (internal cache poisoning)',
        'description_html' => '<p>Lab ini rentan terhadap web cache poisoning dengan beberapa lapis caching. Pengguna secara berkala mengunjungi beranda memakai Chrome.</p><p>Untuk menyelesaikan lab, racuni cache internal agar beranda mengeksekusi [[C0]] di browser korban.</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Beranda berperan sebagai cache oracle; kirim permintaan [[C0]] ke Burp Repeater.</li>
        <li>Perubahan pada query string selalu tampak di respons, menandakan cache eksternal memasukkannya ke kunci cache. Gunakan Param Miner untuk menambah cache-buster dinamis guna melewati cache eksternal.</li>
        <li>
            <p>Header [[C1]] didukung; tambahkan berisi URL server eksploitasi Anda:</p>
            [[C2]]
        </li>
        <li>Kirim permintaan; biasanya hanya URL tautan kanonis dan impor [[C3]] yang berubah, sementara impor [[C4]] masih tetap sama.</li>
        <li>Kirim berulang kali hingga URL impor [[C5]] juga tertimpa URL server eksploitasi Anda, membuktikan fragmen itu di-cache terpisah oleh cache internal tanpa memasukkan query string ke kuncinya.</li>
        <li>Hapus header [[C6]] dan kirim ulang; fragmen dari cache internal tetap memantulkan server eksploitasi Anda sedangkan dua URL lainnya tidak. Header tersebut ternyata diabaikan kunci cache internal namun masuk kunci cache eksternal.</li>
        <li>Buka server eksploitasi dan buat file di [[C7]] berisi payload [[C8]] lalu simpan.</li>
        <li>Kembali di Burp Repeater, matikan cache buster dinamis di query string dan pasang ulang header [[C9]] ke server eksploitasi Anda.</li>
        <li>Kirim permintaan terus-menerus hingga ketiga URL dinamis mengarah ke server eksploitasi Anda dan pertahankan kondisi cache sampai korban berkunjung.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
];
