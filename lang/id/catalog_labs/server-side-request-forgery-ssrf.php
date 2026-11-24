<?php

return [
    'c12feb39a2450b08c055e9e00a51dc9457d91c3b07b1c435d560f7a0a1cd959a' => [
        'title' => 'SSRF dasar terhadap server lokal',
        'description_html' => '<p>Lab ini memiliki fitur cek stok yang mengambil data dari sistem internal.</p><p>Untuk menyelesaikan lab, ubah URL cek stok agar mengakses antarmuka admin di [[C0]] lalu hapus pengguna [[C1]].</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Buka [[C0]] dan amati bahwa Anda tidak bisa mengakses halaman admin secara langsung.</li>
        <li>Buka salah satu produk, klik "Check stock", intersep permintaannya di Burp Suite, lalu kirim ke Burp Repeater.</li>
        <li>Ubah URL pada parameter [[C1]] menjadi [[C2]] hingga menampilkan antarmuka administrasi.</li>
        <li>
            <p>Baca HTML responsnya untuk menemukan URL penghapusan pengguna target, yaitu:</p>
            [[C3]]
        </li>
        <li>Kirimkan URL tersebut di parameter [[C4]] untuk melancarkan serangan SSRF.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '41b2fc5f623ce28dcc489f78c8f94ef2b7de75258c86cff17b68ecc861409328' => [
        'title' => 'SSRF dasar terhadap sistem back-end lain',
        'description_html' => '<p>Lab ini memiliki fitur cek stok yang mengambil data dari sistem internal.</p><p>Untuk menyelesaikan lab, gunakan fungsi cek stok untuk memindai rentang internal [[C0]] mencari antarmuka admin di port [[C1]], lalu pakai antarmuka itu untuk menghapus pengguna [[C2]].</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Buka produk, klik <strong>Check stock</strong>, intersep permintaannya di Burp Suite, lalu kirim ke Burp Intruder.</li>
        <li>Ubah parameter [[C0]] menjadi [[C1]], lalu sorot oktet terakhir alamat IP (angka [[C2]]) dan klik <strong>Add §</strong>.</li>
        <li>Di panel samping <strong>Payloads</strong>, ubah tipe payload ke <strong>Numbers</strong>, lalu masukkan 1, 255, dan 1 pada kolom <strong>From</strong>, <strong>To</strong>, dan <strong>Step</strong>.</li>
        <li>Klik <strong><span class="icon-play-circle-outline"></span> Start attack</strong>.</li>
        <li>Klik kolom <strong>Status</strong> untuk mengurutkan kode status secara menaik. Anda akan menemukan satu entri berstatus [[C3]] yang menampilkan antarmuka admin.</li>
        <li>Klik permintaan tersebut, kirim ke Burp Repeater, lalu ubah path pada [[C4]] menjadi: [[C5]]</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '47869588c5b299d864f0e0fb23d97cb0ba5c5a686fcdc0de3a03637daf1ba3af' => [
        'title' => 'Blind SSRF dengan deteksi out-of-band',
        'description_html' => '<p>Situs ini memakai perangkat lunak analitik yang mengambil URL dari header Referer saat halaman produk dibuka.</p><p>Untuk menyelesaikan lab, manfaatkan fungsi ini untuk memicu permintaan HTTP ke server publik Burp Collaborator.</p><div class="highlightedarea"><h4>Catatan</h4><p>Agar platform Academy tidak disalahgunakan menyerang pihak ketiga, firewall kami memblokir interaksi antara lab dan sistem eksternal sembarang. Anda harus memakai server publik bawaan Burp Collaborator.</p></div>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Buka sebuah produk, intersep permintaannya di Burp Suite, lalu kirim ke Burp Repeater.</li>
        <li>Buka tab Repeater. Pilih nilai header Referer, klik kanan dan pilih "Insert Collaborator Payload" untuk mengganti domain asli dengan domain hasil Burp Collaborator, lalu kirim permintaan.</li>
        <li>Buka tab Collaborator dan klik "Poll now". Jika belum ada interaksi, tunggu beberapa detik lalu coba lagi karena perintah server dijalankan secara asinkron.</li>
        <li>Anda akan melihat beberapa interaksi DNS dan HTTP yang dipicu oleh aplikasi akibat payload Anda.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    'f97f7df5a96da8563edc18e5544b8ef962f8ee47abd9b9bb3d30706f15bff341' => [
        'title' => 'SSRF dengan filter input berbasis blacklist',
        'description_html' => '<p>Lab ini memiliki fitur cek stok yang mengambil data dari sistem internal.</p><p>Untuk menyelesaikan lab, ubah URL cek stok agar mengakses antarmuka admin di [[C0]] lalu hapus pengguna [[C1]].</p><p>Pengembang telah memasang dua pertahanan anti-SSRF lemah yang perlu Anda lewati.</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Buka produk, klik "Check stock", intersep permintaannya di Burp Suite, lalu kirim ke Burp Repeater.</li>
        <li>Ubah URL di parameter [[C0]] menjadi [[C1]] dan amati bahwa permintaan diblokir.</li>
        <li>Lewati pemblokiran dengan mengubah URL menjadi: [[C2]]</li>
        <li>Ubah URL menjadi [[C3]] dan amati bahwa URL kembali diblokir.</li>
        <li>Samarkan huruf "a" dengan double-URL encoding menjadi %2561 untuk mengakses antarmuka admin lalu menghapus pengguna target.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '3bd839053db0960daf7046201a4b58936ba21cbb4a15840db8237690eb2c4be7' => [
        'title' => 'SSRF dengan bypass filter melalui kerentanan open redirection',
        'description_html' => '<p>Lab ini memiliki fitur cek stok yang mengambil data dari sistem internal.</p><p>Untuk menyelesaikan lab, ubah URL cek stok agar mengakses antarmuka admin di [[C0]] lalu hapus pengguna [[C1]].</p><p>Pemeriksa stok dibatasi agar hanya mengakses aplikasi lokal, jadi Anda harus menemukan open redirect di aplikasi terlebih dahulu.</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Buka produk, klik "Check stock", intersep permintaannya di Burp Suite, lalu kirim ke Burp Repeater.</li>
        <li>Coba ubah parameter [[C0]] dan amati bahwa Anda tidak bisa langsung membuat server mengirim permintaan ke host lain.</li>
        <li>Klik "next product" dan amati bahwa parameter [[C1]] dimasukkan ke header Location respons pengalihan, yang menimbulkan kerentanan open redirection.</li>
        <li>
            <p>Buat URL yang mengeksploitasi open redirection ke antarmuka admin, lalu masukkan ke parameter [[C2]] pada fitur cek stok:</p>
            [[C3]]
        </li>
        <li>Amati bahwa pemeriksa stok mengikuti pengalihan dan menampilkan halaman admin.</li>
        <li>
            <p>Ubah path tersebut untuk menghapus pengguna target:</p>
            [[C4]]
        </li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    'd453c6b39efc515eb918548d6ff29ddde86d0d0361ab5453b626309de0e3a958' => [
        'title' => 'Blind SSRF dengan eksploitasi Shellshock',
        'description_html' => '<p>Situs ini memakai perangkat lunak analitik yang mengambil URL dari header Referer saat halaman produk dibuka.</p><p>Untuk menyelesaikan lab, gunakan fungsi ini untuk melancarkan serangan blind SSRF terhadap server internal di rentang [[C0]] pada port 8080, lalu pakai payload Shellshock untuk mengekfiltrasi nama pengguna OS.</p><div class="highlightedarea"><h4>Catatan</h4><p>Agar platform Academy tidak disalahgunakan menyerang pihak ketiga, firewall kami memblokir interaksi antara lab dan sistem eksternal sembarang. Anda harus memakai server publik bawaan Burp Collaborator.</p></div>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Di Burp Suite Professional, pasang ekstensi Collaborator Everywhere dari BApp Store.</li>
        <li>Tambahkan domain lab ke <a href="/burp/documentation/desktop/tools/target/scope">target scope</a> Burp Suite agar ditargetkan oleh Collaborator Everywhere.</li>
        <li>Telusuri situs tersebut.</li>
        <li>Amati bahwa membuka halaman produk memicu interaksi HTTP ke Burp Collaborator melalui header [[C0]].</li>
        <li>Amati bahwa interaksi HTTP tersebut menyertakan string [[C1]] Anda di dalam permintaan HTTP.</li>
        <li>Kirim permintaan ke halaman produk ke Burp Intruder.</li>
        <li>
            <p>Buka tab <a href="/burp/documentation/desktop/tools/collaborator">Collaborator</a> dan buat payload unik Burp Collaborator, lalu masukkan ke payload Shellshock berikut:</p>
            [[C2]]
        </li>
        <li>Ganti string [[C3]] di permintaan Burp Intruder dengan payload Shellshock berisi domain Collaborator Anda.</li>
        <li>Ubah header [[C4]] menjadi [[C5]] lalu sorot oktet terakhir alamat IP (angka [[C6]]) dan klik <strong>Add §</strong>.</li>
        <li>Di panel samping <strong>Payloads</strong>, ubah tipe payload ke <strong>Numbers</strong>, dan isi kolom <strong>From</strong>, <strong>To</strong>, serta <strong>Step</strong> dengan 1, 255, dan 1.</li>
        <li>Klik <strong><span class="icon-play-circle-outline"></span> Start attack</strong>.</li>
        <li>Setelah serangan selesai, buka tab <strong>Collaborator</strong> dan klik <strong>Poll now</strong>. Tunggu beberapa detik jika interaksi belum muncul. Anda akan melihat interaksi DNS dari sistem back-end yang terkena serangan, dengan nama pengguna OS tampil sebagai subdomain DNS.</li>
        <li>Untuk menyelesaikan lab, masukkan nama pengguna OS tersebut.</li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
    '7e946e5cc74a1c4df272ba01df0415b53548e0dfdb326d35f1d58e9b38dcbda4' => [
        'title' => 'SSRF dengan filter input berbasis whitelist',
        'description_html' => '<p>Lab ini memiliki fitur cek stok yang mengambil data dari sistem internal.</p><p>Untuk menyelesaikan lab, ubah URL cek stok agar mengakses antarmuka admin di [[C0]] lalu hapus pengguna [[C1]].</p><p>Pengembang telah memasang pertahanan anti-SSRF yang perlu Anda lewati.</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
    <ol>
        <li>Buka produk, klik "Check stock", intersep permintaannya di Burp Suite, lalu kirim ke Burp Repeater.</li>
        <li>Ubah URL di parameter [[C0]] menjadi [[C1]] dan amati bahwa aplikasi mengurai URL, mengekstrak hostname, dan memvalidasinya terhadap whitelist.</li>
        <li>Ubah URL menjadi [[C2]] dan amati bahwa permintaan diterima, menandakan parser URL mendukung kredensial tertanam.</li>
        <li>Tambahkan [[C3]] setelah username dan amati bahwa URL kini ditolak.</li>
        <li>Lakukan double-URL encode pada [[C4]] menjadi [[C5]] dan amati respons mencurigakan "Internal Server Error" yang menandakan server mencoba terhubung ke "username".</li>
        <li>
            <p>Untuk mengakses antarmuka admin dan menghapus pengguna target, ubah URL menjadi:</p>
            [[C6]]
        </li>
    </ol>
</div></div>
LABHTML,
        ],
    ],
];
