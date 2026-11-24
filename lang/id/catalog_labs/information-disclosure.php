<?php

return [
    '8743ae75bedd9ef19ce2134472f6df1c700ed51e9a571f0b56ae678ec844177a' => [
        'title' => 'Pengungkapan informasi pada pesan error',
        'descriptionHtml' => <<<'LABHTML'
<p>
            Pesan error yang terlalu rinci pada lab ini mengungkapkan bahwa aplikasi memakai versi framework pihak ketiga yang rentan. Untuk menyelesaikan lab ini, temukan dan kirimkan nomor versi framework tersebut.
        </p>
LABHTML,
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
                <ol>
                    <li>
                        Saat Burp berjalan, buka salah satu halaman produk.
                    </li>
                    <li>
                        Di Burp, buka "Proxy" &gt; "HTTP history" dan perhatikan bahwa permintaan <code>GET</code> untuk halaman produk membawa parameter <code>productID</code>. Kirim permintaan <code>GET /product?productId=1</code> ke Burp Repeater. Nilai <code>productId</code> bisa berbeda tergantung produk yang Anda buka.
                    </li>
                    <li>
                        <p>
                            Di Burp Repeater, ubah nilai parameter <code>productId</code> menjadi tipe data non-integer, misalnya string, lalu kirim permintaan:
                        </p>
                        <code class="code-scrollable">GET /product?productId="example"</code>
                    </li>
                    <li>
                        Tipe data tak terduga memicu pengecualian dan stack trace lengkap tampil di respons. Ini mengungkapkan bahwa lab memakai Apache Struts 2 2.3.31.
                    </li>
                    <li>
                        Kembali ke lab, klik "Submit solution", lalu masukkan <strong>2 2.3.31</strong> untuk menyelesaikan lab.
                    </li>
                </ol>
            </div></div>
LABHTML,
        ],
    ],
    '18ebd0ac7489cd1770d58baec6ec290f6d15c7346d25a11f0e64cc1ad3329348' => [
        'title' => 'Pengungkapan informasi pada halaman debug',
        'descriptionHtml' => <<<'LABHTML'
<p>
            Lab ini memiliki halaman debug yang membocorkan informasi sensitif aplikasi. Untuk menyelesaikan lab ini, dapatkan dan kirimkan variabel lingkungan <code>SECRET_KEY</code>.
        </p>
LABHTML,
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
                <ol>
                    <li>
                        Saat Burp berjalan, buka halaman beranda.
                    </li>
                    <li>
                        Buka tab "Target" &gt; "Site Map". Klik kanan entri tingkat atas untuk lab, lalu pilih "Engagement tools" &gt; "Find comments". Perhatikan bahwa halaman beranda menyimpan komentar HTML berisi tautan bernama "Debug" yang mengarah ke <code>/cgi-bin/phpinfo.php</code>.
                    </li>
                    <li>
                        Di site map, klik kanan entri <code>/cgi-bin/phpinfo.php</code> lalu pilih "Send to Repeater".
                    </li>
                    <li>
                        Di Burp Repeater, kirim permintaan untuk mengambil file tersebut. Amati bahwa file mengungkap berbagai info debugging, termasuk variabel lingkungan <code>SECRET_KEY</code>.
                    </li>
                    <li>
                        Kembali ke lab, klik "Submit solution", lalu masukkan nilai <code>SECRET_KEY</code> untuk menyelesaikan lab.
                    </li>
                </ol>
            </div></div>
LABHTML,
        ],
    ],
    '2ef78ab0fd73d035439230bb1d8172796d5d9d0be65f1476072db63c5cd95c04' => [
        'title' => 'Pengungkapan kode sumber melalui file backup',
        'descriptionHtml' => <<<'LABHTML'
<p>
            Lab ini membocorkan kode sumbernya melalui file backup di dalam direktori tersembunyi. Untuk menyelesaikan lab ini, temukan dan kirimkan password database yang di-hardcode di dalam kode sumber yang bocor.
        </p>
LABHTML,
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
                <ol>
                    <li>
                        Buka <code>/robots.txt</code> dan amati bahwa file tersebut mengungkap keberadaan direktori <code>/backup</code>. Buka <code>/backup</code> untuk menemukan file <code>ProductTemplate.java.bak</code>. Sebagai alternatif, klik kanan domain lab di site map, pilih "Engagement tools" &gt; "Discover content", lalu jalankan sesi penemuan konten untuk menemukan direktori <code>/backup</code> dan isinya.
                    </li>
                    <li>
                        Buka <code>/backup/ProductTemplate.java.bak</code> untuk melihat kode sumbernya.
                    </li>
                    <li>
                        Di dalam kode sumber, amati bahwa pembangun koneksi database memuat password hard-coded untuk database Postgres.
                    </li>
                    <li>
                        Kembali ke lab, klik "Submit solution", lalu masukkan password database tersebut untuk menyelesaikan lab.
                    </li>
                </ol>
            </div></div>
LABHTML,
        ],
    ],
    '2c1ffa3c35d94beac72d213f5134c9b53f43a31758c8a61bc1a4d3bd8153c226' => [
        'title' => 'Bypass autentikasi melalui pengungkapan informasi',
        'descriptionHtml' => <<<'LABHTML'
<p>
            Antarmuka administrasi pada lab ini memiliki kerentanan bypass autentikasi, tetapi sulit dieksploitasi tanpa mengetahui header HTTP kustom yang dipakai front-end.
        </p><p>
            Untuk menyelesaikan lab ini, temukan nama header tersebut lalu gunakan untuk melewati autentikasi lab. Akses antarmuka admin dan hapus pengguna <code>carlos</code>.
        </p><p>
            Anda dapat masuk ke akun Anda menggunakan kredensial berikut: <code>wiener:peter</code>
        </p>
LABHTML,
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
                <ol>
                    <li>
                        Di Burp Repeater, buka <code>GET /admin</code>. Respons menjelaskan bahwa panel admin hanya dapat diakses jika masuk sebagai administrator atau jika diminta dari IP lokal.
                    </li>
                    <li>
                        <p>
                            Kirim ulang permintaan yang sama, tetapi kali ini gunakan metode <code>TRACE</code>:
                        </p>
                        <code class="code-scrollable">TRACE /admin</code>
                    </li>
                    <li>
                        Periksa responsnya. Amati bahwa header <code>X-Custom-IP-Authorization</code> berisi alamat IP Anda ditambahkan secara otomatis ke permintaan, yang dipakai menentukan apakah permintaan berasal dari IP <code>localhost</code>.
                    </li>
                    <li>Buka <strong>Proxy &gt; Match and replace</strong>.</li>
                    <li>Di bawah <strong>HTTP match and replace rules</strong>, klik <strong>Add</strong> untuk membuka dialog <strong>Add match/replace rule</strong>.</li>
                    <li>Biarkan kolom <strong>Match</strong> kosong.</li>
                    <li>Pada <strong>Type</strong>, pastikan <strong>Request header</strong> dipilih.</li>
                    <li>
                        <p>Di kolom <strong>Replace</strong>, masukkan:</p>
                        <code class="code-scrollable">X-Custom-IP-Authorization: 127.0.0.1</code>
                    </li>
                    <li>Klik <strong>Test</strong>.</li>
                    <li>Di bawah <strong>Auto-modified request</strong>, pastikan Burp sudah menambahkan header <code>X-Custom-IP-Authorization</code> ke permintaan.</li>
                    <li>Klik <strong>OK</strong>. Kini Burp Proxy menyertakan header <code>X-Custom-IP-Authorization</code> pada setiap permintaan Anda.</li>
                    <li>Buka halaman beranda. Kini Anda memiliki akses ke panel admin untuk menghapus <code>carlos</code>.</li>
                </ol>
            </div></div>
LABHTML,
        ],
    ],
    '45ef28e2b8b6f9b623c8d0485cb4e2b7ded96458fedd8d7d5e0adf9427a5d3af' => [
        'title' => 'Pengungkapan informasi dalam riwayat version control',
        'descriptionHtml' => <<<'LABHTML'
<p>
            Lab ini membocorkan informasi sensitif melalui riwayat version control miliknya. Untuk menyelesaikan lab ini, dapatkan password pengguna <code>administrator</code> lalu masuk dan hapus pengguna <code>carlos</code>.
        </p>
LABHTML,
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
                <ol>
                    <li>
                        Buka lab dan akses <code>/.git</code> untuk melihat data version control Git milik lab.
                    </li>
                    <li>
                        <p>
                            Unduh salinan seluruh direktori tersebut. Pada Linux, cara termudah adalah dengan perintah:
                        </p>
                        <code class="code-scrollable">wget -r https://YOUR-LAB-ID.web-security-academy.net/.git/</code>
                        <p>
                            Pengguna Windows perlu mencari metode alternatif atau memasang lingkungan mirip UNIX seperti Cygwin untuk menjalankan perintah ini.
                        </p>
                    </li>
                    <li>
                        Telusuri direktori hasil unduhan menggunakan instalasi Git lokal. Amati terdapat commit dengan pesan <code>&quot;Remove admin password from config&quot;</code>.
                    </li>
                    <li>
                        Periksa diff pada file <code>admin.conf</code> yang diubah. Commit tersebut mengganti password admin hard-coded dengan variabel lingkungan <code>ADMIN_PASSWORD</code>, namun password lama masih terlihat jelas di dalam diff.
                    </li>
                    <li>
                        Kembali ke lab dan masuk ke akun administrator memakai password yang bocor tersebut.
                    </li>
                    <li>
                        Untuk menyelesaikan lab ini, buka antarmuka admin dan hapus pengguna <code>carlos</code>.
                    </li>
                </ol>
            </div></div>
LABHTML,
        ],
    ],
];
