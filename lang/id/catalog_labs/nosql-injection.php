<?php

return [
    '8878778fc200a649aa733122e9e01376459c5e0b2a67f4ab76ef510e2659d168' => [
        'title' => 'Mendeteksi NoSQL injection',
        'descriptionHtml' => <<<'LABHTML'
<p>
            Filter kategori produk pada lab ini didukung oleh database NoSQL MongoDB dan rentan terhadap NoSQL injection.
        </p><p>
            Untuk menyelesaikan lab ini, lakukan serangan NoSQL injection yang menyebabkan aplikasi menampilkan produk-produk yang belum dirilis.
        </p>
LABHTML,
        'sections' => [
            0 => <<<'LABHTML'
<div class="content">
                    <div>
                        <ol>
                            <li>
                                <p>
                                    Di browser Burp, buka lab lalu klik salah satu filter kategori produk.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Di Burp, buka <strong>Proxy &gt; HTTP history</strong>. Klik kanan permintaan filter kategori lalu pilih <strong>Send to Repeater</strong>.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Di Repeater, kirim karakter <code>'</code> pada parameter category. Amati bahwa input tersebut memicu error sintaks JavaScript, menandakan input pengguna tidak difilter atau disanitasi dengan benar.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Kirim payload JavaScript yang valid pada parameter query category. Anda dapat memakai payload berikut:
                                </p>
                                <code class="code-scrollable">Gifts'+'</code>
                                <p>
                                    Pastikan Anda melakukan URL-encode pada payload dengan menyorotnya dan menekan tombol pintas <code>Ctrl-U</code>. Amati bahwa payload ini tidak memicu error sintaks, menandakan kemungkinan terjadinya injeksi sisi server.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Identifikasi apakah Anda bisa menyuntikkan kondisi boolean untuk mengubah respons:
                                </p>
                                <ol>
                                    <li>
                                        <p>
                                            Masukkan kondisi bernilai salah pada parameter category, misalnya:
                                        </p>
                                        <code class="code-scrollable">Gifts' && 0 && 'x</code>
                                        <p>
                                            Pastikan Anda melakukan URL-encode pada payload. Amati bahwa tidak ada produk yang diambil.
                                        </p>
                                    </li>
                                    <li>
                                        <p>
                                            Masukkan kondisi bernilai benar pada parameter category, misalnya:
                                        </p>
                                        <code class="code-scrollable">Gifts' && 1 && 'x</code>
                                        <p>
                                            Pastikan Anda melakukan URL-encode pada payload. Amati bahwa produk dalam kategori <strong>Gifts</strong> ditampilkan.
                                        </p>
                                    </li>
                                </ol>
                            </li>
                            <li>
                                <p>
                                    Kirim kondisi boolean yang selalu bernilai benar pada parameter category, misalnya:
                                </p>
                                <code class="code-scrollable">Gifts'||1||'</code>
                            </li>
                            <li>
                                <p>
                                    Klik kanan pada respons dan pilih <strong>Show response in browser</strong>.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Salin URL dan muat di browser Burp. Pastikan respons kini memuat produk yang belum dirilis. Lab terselesaikan.
                                </p>
                            </li>
                        </ol>
                    </div>
                </div>
LABHTML,
        ],
    ],
    '522964eab6f4e4217f650c420f52a617e4cc1ec23db87621f575afde879e30e8' => [
        'title' => 'Mengeksploitasi injeksi operator NoSQL untuk bypass autentikasi',
        'descriptionHtml' => <<<'LABHTML'
<p>
            Fungsionalitas login pada lab ini menggunakan database NoSQL MongoDB dan rentan terhadap NoSQL injection melalui operator MongoDB.
        </p><p>
            Untuk menyelesaikan lab ini, masuk ke aplikasi sebagai pengguna <code>administrator</code>.
        </p><p>
            Anda dapat masuk ke akun Anda menggunakan kredensial berikut: <code>wiener:peter</code>.
        </p>
LABHTML,
        'sections' => [
            0 => <<<'LABHTML'
<div class="content">
                    <div>
                        <ol>
                            <li>
                                <p>
                                    Di browser Burp, masuk ke aplikasi memakai kredensial <code>wiener:peter</code>.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Di Burp, buka <strong>Proxy &gt; HTTP history</strong>. Klik kanan permintaan <code>POST /login</code> lalu pilih <strong>Send to Repeater</strong>.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Di Repeater, uji parameter username dan password untuk mengetahui apakah Anda bisa menyuntikkan operator MongoDB:
                                </p>
                                <ol>
                                    <li>Ubah nilai parameter <code>username</code> dari <code>"wiener"</code> menjadi <code>{"$ne":""}</code>, lalu kirim permintaan. Amati bahwa Anda tetap bisa login.</li>
                                    <li>Ubah nilai parameter username dari <code>{"$ne":""}</code> menjadi <code>{"$regex":"wien.*"}</code>, lalu kirim permintaan. Amati bahwa login juga berhasil saat memakai operator <code>$regex</code>.</li>
                                    <li>Dengan parameter username tetap disetel ke <code>{"$ne":""}</code>, ubah parameter password dari <code>"peter"</code> menjadi <code>{"$ne":""}</code>, lalu kirim ulang permintaan. Amati bahwa query mengembalikan jumlah record tak terduga, menandakan lebih dari satu pengguna terpilih.</li>
                                </ol>
                            </li>
                            <li>
                                <p>
                                    Dengan parameter password tetap <code>{"$ne":""}</code>, ubah nilai parameter username menjadi <code>{"$regex":"admin.*"},</code> lalu kirim ulang permintaan. Amati bahwa Anda berhasil masuk sebagai pengguna admin.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Klik kanan pada respons, lalu pilih <strong>Show response in browser</strong>. Salin URL tersebut.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Tempelkan URL ke browser Burp untuk masuk sebagai pengguna <code>administrator</code>. Lab terselesaikan.
                                </p>
                            </li>
                        </ol>
                    </div>
                </div>
LABHTML,
        ],
    ],
    '4a6884ba4c15a8785848b9e6bd721f6e7086c5ddfa9e3acce8d35f44effbca30' => [
        'title' => 'Mengeksploitasi NoSQL injection untuk mengekstrak data',
        'descriptionHtml' => <<<'LABHTML'
<p>
            Fungsionalitas pencarian pengguna pada lab ini memakai database NoSQL MongoDB dan rentan terhadap NoSQL injection.
        </p><p>
            Untuk menyelesaikan lab ini, ekstrak password pengguna <code>administrator</code> lalu masuk ke akunnya.
        </p><p>
            Anda dapat masuk ke akun Anda menggunakan kredensial berikut: <code>wiener:peter</code>.
        </p><div class="component-solution expandable-container">
            <details>
                <summary><h4><span class="icon-bulb"></span>Tips</h4></summary>
                <div class="content">
                    <div>
                        <p>
                            Password hanya memakai huruf kecil.
                        </p>
                    </div>
                </div>
            </details>
        </div>
LABHTML,
        'sections' => [
            0 => <<<'LABHTML'
<div class="content">
                    <div>
                        <p>
                            Password hanya memakai huruf kecil.
                        </p>
                    </div>
                </div>
LABHTML,
            1 => <<<'LABHTML'
<div class="content">
                    <div>
                        <ol>
                            <li>
                                <p>
                                    Di browser Burp, buka lab dan masuk ke aplikasi dengan kredensial <code>wiener:peter</code>.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Di Burp, buka <strong>Proxy &gt; HTTP history</strong>. Klik kanan permintaan <code>GET /user/lookup?user=wiener</code> dan pilih <strong>Send to Repeater</strong>.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Di Repeater, kirim karakter <code>'</code> pada parameter user. Amati bahwa input itu memicu error, menandakan input pengguna belum difilter atau disanitasi secara memadai.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Kirim payload JavaScript yang valid di parameter <code>user</code>, misalnya <code>wiener'+'</code>
                                </p>
                                <p>
                                    Pastikan melakukan URL-encode dengan menyorot payload lalu menekan <code>Ctrl-U</code>. Amati bahwa permintaan mengambil detail akun pengguna <code>wiener</code>, yang menandakan kemungkinan terjadinya injeksi sisi server.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Identifikasi apakah Anda dapat menyuntikkan kondisi boolean untuk mengubah respons:
                                </p>
                                <ol>
                                    <li>
                                        <p>
                                            Kirim kondisi bernilai salah pada parameter <code>user</code>, misalnya: <code>wiener' && '1'=='2</code>
                                        </p>
                                        <p>
                                            Pastikan Anda melakukan URL-encode. Amati bahwa pesan yang keluar adalah <code>Could not find user</code>.
                                        </p>
                                    </li>
                                    <li>
                                        <p>
                                            Kirim kondisi bernilai benar pada parameter user, misalnya: <code>wiener' &&
                                            '1'=='1</code>
                                        </p>
                                        <p>
                                            Pastikan Anda melakukan URL-encode. Amati bahwa error tidak muncul dan detail akun <code>wiener</code> dikembalikan, membuktikan perbedaan respons untuk kondisi benar dan salah.
                                        </p>
                                    </li>
                                </ol>
                            </li>
                            <li>
                                <p>
                                    Identifikasi panjang password:
                                </p>
                                <ol>
                                    <li>
                                        <p>
                                            Ubah parameter user menjadi <code>administrator' && this.password.length &lt; 30 || 'a'=='b</code>, lalu kirim permintaan.
                                        </p>
                                        <p>
                                            Pastikan URL-encode diterapkan. Amati bahwa respons mengembalikan detail akun <code>administrator</code>, menandakan kondisi benar karena panjang password kurang dari 30 karakter.
                                        </p>
                                    </li>
                                    <li>Kurangi angka panjang password pada payload lalu kirim ulang permintaan.</li>
                                    <li>Lanjutkan mencoba beberapa panjang berbeda.</li>
                                    <li>Amati bahwa saat Anda mengirim nilai <code>9</code> detail akun <code>administrator</code> dikembalikan, tetapi saat mengirim <code>8</code> muncul pesan error karena kondisinya salah. Ini menunjukkan panjang password adalah 8 karakter.</li>
                                </ol>
                            </li>
                            <li>
                                <p>
                                    Klik kanan permintaan lalu pilih <strong>Send to Intruder</strong>.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Di Intruder, enumerasi isi password:
                                </p>
                                <ol>
                                    <li>Ubah parameter user menjadi <code>administrator' && this.password[§0§]=='§a§</code> yang menyertakan dua posisi payload. Pastikan URL-encode diterapkan.</li>
                                    <li>Pilih <strong>Cluster bomb attack</strong> pada menu drop-down attack type.</li>
                                    <li>Di panel samping <strong>Payloads</strong>, pilih posisi <code>1</code> pada <strong>Payload position</strong>. Tambahkan angka 0 hingga 7 untuk setiap indeks karakter password.</li>
                                    <li>Pilih posisi <code>2</code>, lalu tambahkan huruf kecil a hingga z. Pada Burp Suite Professional, Anda dapat memakai daftar bawaan <code>a-z</code>.</li>
                                    <li>Klik <strong><span class="icon-play-circle-outline"></span> Start attack</strong>.</li>
                                    <li>Urutkan hasil serangan berdasarkan <strong>Payload 1</strong> lalu <strong>Length</strong>. Amati bahwa satu permintaan per indeks (0 hingga 7) bernilai benar dan mengembalikan detail <code>administrator</code>. Catat huruf-huruf dari kolom <strong>Payload 2</strong>.</li>
                                </ol>
                            </li>
                            <li>
                                <p>
                                    Di browser Burp, masuk sebagai <code>administrator</code> memakai password hasil enumerasi tersebut. Lab terselesaikan.
                                </p>
                            </li>
                        </ol>
                    </div>
                </div>
LABHTML,
        ],
    ],
    '41de2d2e1fe38de02af99bd28b3a70858514e70f701486d13b7eae2d40e4aeae' => [
        'title' => 'Mengeksploitasi injeksi operator NoSQL untuk mengekstrak field tersembunyi',
        'descriptionHtml' => <<<'LABHTML'
<p>
            Fungsionalitas pencarian pengguna pada lab ini memakai database NoSQL MongoDB dan rentan terhadap NoSQL injection.
        </p><p>
            Untuk menyelesaikan lab ini, masuk sebagai <code>carlos</code>.
        </p><div class="component-solution expandable-container">
            <details>
                <summary><h4><span class="icon-bulb"></span>Tips</h4></summary>
                <div class="content">
                    <div>
                        <p>
                            Untuk menyelesaikan lab ini, pertama Anda harus mengeksfiltrasi nilai token reset password milik pengguna <code>carlos</code>.
                        </p>
                    </div>
                </div>
            </details>
        </div>
LABHTML,
        'sections' => [
            0 => <<<'LABHTML'
<div class="content">
                    <div>
                        <p>
                            Untuk menyelesaikan lab ini, pertama Anda harus mengeksfiltrasi nilai token reset password milik pengguna <code>carlos</code>.
                        </p>
                    </div>
                </div>
LABHTML,
            1 => <<<'LABHTML'
<div class="content">
                    <div>
                        <ol>
                            <li>
                                <p>
                                    Di browser Burp, coba masuk dengan username <code>carlos</code> dan password <code>invalid</code>. Amati pesan error <code>Invalid username or password</code>.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Di Burp, buka <strong>Proxy &gt; HTTP history</strong>. Klik kanan permintaan <code>POST
                                    /login</code> lalu pilih <strong>Send to Repeater</strong>.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Di Repeater, ubah nilai parameter password dari <code>"invalid"</code> menjadi <code>{"$ne":"invalid"}</code>, lalu kirim permintaan. Amati bahwa Anda kini menerima pesan error <code>Account locked</code>. Meski belum bisa mengakses akun Carlos, respons ini menandakan operator <code>$ne</code> diterima dan aplikasi rentan.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Di browser Burp, coba reset password akun <code>carlos</code>. Saat mengirim username <code>carlos</code>, amati bahwa mekanisme reset memakai verifikasi email sehingga Anda tidak dapat langsung meresetnya sendiri.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Di Repeater, gunakan permintaan <code>POST /login</code> untuk menguji apakah aplikasi rentan terhadap injeksi JavaScript:
                                </p>
                                <ol>
                                    <li>Tambahkan <code>"$where": "0"</code> ke dalam data JSON sebagai parameter baru: <code>{"username":"carlos","password":{"$ne":"invalid"}, "$where": "0"}</code></li>
                                    <li>Kirim permintaan. Amati pesan error <code>Invalid username or password</code>.</li>
                                    <li>Ubah <code>"$where": "0" to "$where": "1"</code> lalu kirim ulang permintaan. Amati munculnya pesan error <code>Account locked</code>, yang membuktikan kode JavaScript pada klausa <code>$where</code> dievaluasi.</li>
                                </ol>
                            </li>
                            <li>
                                <p>
                                    Klik kanan permintaan lalu pilih <strong>Send to Intruder</strong>.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Di Intruder, susun serangan untuk mengidentifikasi semua field pada objek user:
                                </p>
                                <ol>
                                    <li>Perbarui parameter <code>$where</code> menjadi: <code>"$where":"Object.keys(this)[1].match('^.{}.*')"</code></li>
                                    <li>Tambahkan dua posisi payload; posisi pertama untuk indeks posisi karakter dan posisi kedua untuk karakter yang ditebak: <code>"$where":"Object.keys(this)[1].match('^.{§§}§§.*')"</code></li>
                                    <li>Pilih <strong>Cluster bomb attack</strong> pada drop-down attack type.</li>
                                    <li>Di panel samping <strong>Payloads</strong>, pilih posisi <code>1</code> lalu atur <strong>Payload type</strong> ke <strong>Numbers</strong> dengan rentang misalnya 0 sampai 20.</li>
                                    <li>Pilih posisi <code>2</code> dan pastikan tipe payload adalah <strong>Simple list</strong>. Tambahkan semua angka serta huruf kecil dan besar. Jika memakai Burp Suite Professional, Anda dapat memilih wordlist bawaan <code>a-z</code>, <code>A-Z</code>, dan <code>0-9</code>.</li>
                                    <li>Klik <strong><span class="icon-play-circle-outline"></span> Start attack</strong>.</li>
                                    <li>Urutkan hasil serangan berdasarkan <strong>Payload 1</strong> lalu <strong>Length</strong> untuk mencari respons dengan pesan <code>Account locked</code> alih-alih <code>Invalid username or password</code>. Amati karakter di kolom <strong>Payload 2</strong> yang mengeja nama parameter: <code>username</code>.</li>
                                    <li>
                                        <p>Ulangi langkah di atas untuk menemukan parameter JSON lainnya dengan menaikkan indeks array keys di tiap percobaan, misalnya: <code>"$where":"Object.keys(this)<strong>[2]</strong>.match('^.{}.*')"</code></p>
                                        <p>
                                            Perhatikan bahwa salah satu parameter JSON adalah field untuk token reset password.
                                        </p>
                                    </li>
                                </ol>
                            </li>
                            <li>
                                <p>Uji nama field token reset password tersebut sebagai parameter query pada endpoint yang relevan:</p>
                                <ol>
                                    <li>Di <strong>Proxy &gt; HTTP history</strong>, temukan permintaan <code>GET
                                        /forgot-password</code> yang berkaitan dengan fitur reset password dan kirim ke Repeater.</li>
                                    <li>Di Repeater, kirim field tidak valid pada URL: <code>GET
                                        /forgot-password?foo=invalid</code>. Amati responsnya sama seperti respons awal.</li>
                                    <li>Kirim nama field token reset password hasil eksfiltrasi pada URL: <code>GET /forgot-password?YOURTOKENNAME=invalid</code>. Amati munculnya pesan error <code>Invalid token</code>, yang memastikan Anda menemukan nama parameter dan endpoint yang tepat.</li>
                                </ol>
                            </li>
                            <li>
                                <p>
                                    Di Intruder, gunakan permintaan <code>POST /login</code> untuk menyusun serangan yang mengekstrak nilai token reset password milik Carlos:
                                </p>
                                <ol>
                                    <li>
                                        <p>
                                            Pertahankan pengaturan serangan sebelumnya, tetapi ubah parameter <code>$where</code> menjadi: <code>"$where":"this.YOURTOKENNAME.match('^.{§§}§§.*')"</code>
                                        </p>
                                        <p>
                                            Pastikan Anda mengganti <code>YOURTOKENNAME</code> dengan nama field token reset password yang ditemukan pada langkah sebelumnya.
                                        </p>
                                    </li>
                                    <li>
                                        Klik <strong><span class="icon-play-circle-outline"></span> Start attack</strong>.
                                    </li>
                                    <li>
                                        Urutkan hasil serangan berdasarkan <strong>Payload 1</strong> lalu <strong>Length</strong> untuk mengidentifikasi respons dengan pesan <code>Account locked</code> dan catat huruf demi huruf dari kolom <strong>Payload 2</strong>.
                                    </li>
                                </ol>
                            </li>
                            <li>
                                Di Repeater, kirim nilai token reset password tersebut pada URL permintaan <code>GET /
                                forgot-password</code>: <code>GET /forgot-password?YOURTOKENNAME=TOKENVALUE</code>.
                            </li>
                            <li>
                                Klik kanan respons lalu pilih <strong>Request in browser &gt; Original session</strong>. Tempelkan tautan tersebut ke browser Burp.
                            </li>
                            <li>Ubah password Carlos, lalu masuk sebagai <code>carlos</code> untuk menyelesaikan lab.</li>
                        </ol>
                    </div>
                </div>
LABHTML,
        ],
    ],
];
