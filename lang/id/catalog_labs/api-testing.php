<?php

return [
    'bf4b41b2b1ee5aeff466344e71ce63ec8eb18e4e262005020f7e987b12bf5fef' => [
        'title' => 'Mengeksploitasi endpoint API menggunakan dokumentasi',
        'descriptionHtml' => <<<'LABHTML'
<p>
            Untuk menyelesaikan lab ini, temukan dokumentasi API yang terekspos dan hapus pengguna <code>carlos</code>. Anda dapat masuk ke akun Anda menggunakan kredensial berikut: <code>wiener:peter</code>.
        </p><div class="highlightedarea">
            <h4>Pengetahuan yang dibutuhkan</h4>
            <p>
                Untuk menyelesaikan lab ini, Anda perlu memahami:
            </p>
            <ul>
                <li>Apa itu dokumentasi API.</li>
                <li>Bagaimana dokumentasi API dapat dimanfaatkan oleh penyerang.</li>
                <li>Cara menemukan dokumentasi API.</li>
            </ul>
            <p>Poin-poin tersebut dibahas dalam topik Academy <a href="/web-security/api-testing">Pengujian API</a> kami.</p>
        </div>
LABHTML,
        'sections' => [
            0 => <<<'LABHTML'
<div class="content">
                    <div>
                        <ol>
                            <li>
                                <p>
                                    Di browser Burp, masuk ke aplikasi dengan kredensial <code>wiener:peter</code> lalu perbarui alamat email Anda.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Di <strong>Proxy &gt; HTTP history</strong>, klik kanan permintaan <code>PATCH /api/user/wiener</code> lalu pilih <strong>Send to Repeater</strong>.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Buka tab <strong>Repeater</strong> dan kirim permintaan <code>PATCH /api/user/wiener</code>. Amati bahwa respons mengambil kredensial pengguna <code>wiener</code>.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Hapus <code>/wiener</code> dari path permintaan sehingga endpoint menjadi <code>/api/user</code>, lalu kirim permintaan. Amati munculnya error karena tidak ada pengenal pengguna.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Hapus <code>/user</code> dari path sehingga endpoint menjadi <code>/api</code>, lalu kirim permintaan. Amati bahwa endpoint mengembalikan dokumentasi API.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Klik kanan pada respons lalu pilih <strong>Show response in browser</strong>. Salin URL-nya.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Tempelkan URL ke browser Burp untuk membuka dokumentasi. Perhatikan bahwa dokumentasi tersebut bersifat interaktif.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Untuk menghapus Carlos dan menyelesaikan lab, klik baris <code>DELETE</code>, masukkan <code>carlos</code>, lalu klik <strong>Send request</strong>.
                                </p>
                            </li>
                        </ol>
                    </div>
                </div>
LABHTML,
        ],
    ],
    'd74fc3117a595f2183eb88a24360bb9c2a7472a910e4e97b4907971835d1f4e3' => [
        'title' => 'Mengeksploitasi server-side parameter pollution dalam query string',
        'descriptionHtml' => <<<'LABHTML'
<p>
            Untuk menyelesaikan lab ini, masuk sebagai pengguna <code>administrator</code> dan hapus pengguna <code>carlos</code>.
        </p><div class="highlightedarea">
            <h4>Pengetahuan yang dibutuhkan</h4>
            <p>
                Untuk menyelesaikan lab ini, Anda perlu memahami:
            </p>
            <ul>
                <li>Cara memakai sintaks URL query untuk mencoba memengaruhi permintaan sisi server.</li>
                <li>Cara memanfaatkan pesan error untuk memahami cara API sisi server memproses input pengguna.</li>
            </ul>
            <p>Poin-poin tersebut dibahas dalam topik Academy <a href="/web-security/api-testing">Pengujian API</a> kami.</p>
        </div>
LABHTML,
        'sections' => [
            0 => <<<'LABHTML'
<div class="content">
                    <div>
                        <ol>
                            <li>
                                <p>
                                    Di browser Burp, picu reset password untuk pengguna <code>administrator</code>.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Di <strong>Proxy &gt; HTTP history</strong>, amati permintaan <code>POST /forgot-password</code> dan file JavaScript terkait <code>/static/js/forgotPassword.js</code>.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Klik kanan permintaan <code>POST /forgot-password</code> lalu pilih <strong>Send to Repeater</strong>.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Di tab <strong>Repeater</strong>, kirim ulang permintaan untuk memastikan responsnya konsisten.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Ubah nilai parameter <code>username</code> dari <code>administrator</code> menjadi username tidak valid, misalnya <code>administratorx</code>, lalu kirim permintaan. Amati munculnya pesan error <code>Invalid username</code>.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Coba tambahkan pasangan parameter-nilai kedua ke permintaan sisi server dengan karakter <code>&</code> yang di-URL-encode, misalnya <code>&x=y</code>:
                                </p>
                                <p>
                                    <code>username=administrator%26x=y</code>
                                </p>
                                <p>
                                    Kirim permintaan. Amati pesan error <code>Parameter is not supported</code>, menandakan API internal menafsirkan <code>&x=y</code> sebagai parameter terpisah alih-alih bagian dari username.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Coba potong query string sisi server menggunakan karakter <code>#</code> yang di-URL-encode:
                                </p>
                                <p>
                                    <code>username=administrator%23</code>
                                </p>
                                <p>
                                    Kirim permintaan. Amati pesan error <code>Field not specified</code>, yang menandakan query sisi server menyertakan parameter tambahan bernama <code>field</code> yang terhapus oleh karakter <code>#</code>.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Tambahkan parameter <code>field</code> bernilai tidak valid pada permintaan dan potong sisa query setelahnya, misalnya URL-encode <code>&field=x#</code>:
                                </p>
                                <p>
                                    <code>username=administrator%26field=x%23</code>
                                </p>
                                <p>
                                    Kirim permintaan. Amati munculnya pesan error <code>Invalid field</code>, menandakan aplikasi sisi server mengenali parameter field yang disuntikkan.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Lakukan brute-force untuk menemukan nilai parameter <code>field</code> yang valid:
                                </p>
                                <ol>
                                    <li>Klik kanan permintaan <code>POST /forgot-password</code> lalu pilih <strong>Send to Intruder</strong>.</li>
                                    <li>
                                        <p>Di tab <strong>Intruder</strong>, tambahkan posisi payload pada nilai parameter <code>field</code>:</p>
                                        <p><code>username=administrator%26field=§x§%23</code></p>
                                    </li>
                                    <li>Di panel samping <strong>Payloads</strong> pada <strong>Payload configuration</strong>, klik <strong>Add from list</strong>, pilih daftar payload bawaan <strong>Server-side variable names</strong>, lalu mulai serangan.</li>
                                    <li>Periksa hasilnya. Amati bahwa permintaan dengan payload username dan email sama-sama mengembalikan respons <code>200</code>.</li>
                                </ol>
                            </li>
                            <li>
                                <p>
                                    Ubah nilai parameter <code>field</code> dari <code>x#</code> menjadi <code>email</code>:
                                </p>
                                <p>
                                    <code>username=administrator%26field=email%23</code>
                                </p>
                                <p>
                                    Kirim permintaan dan pastikan ia mengembalikan respons awal, menandakan <code>email</code> adalah tipe field yang valid.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Di <strong>Proxy &gt; HTTP history</strong>, periksa file JavaScript <code>/static/js/forgotPassword.js</code> dan amati endpoint reset password yang merujuk pada parameter <code>reset_token</code>:
                                </p>
                                <p>
                                    <code>/forgot-password?reset_token=${resetToken}</code>
                                </p>
                            </li>
                            <li>
                                <p>
                                    Di tab <strong>Repeater</strong>, ubah nilai parameter <code>field</code> dari <code>email</code> menjadi <code>reset_token</code>:
                                </p>
                                <p>
                                    <code>username=administrator%26field=reset_token%23</code>
                                </p>
                                <p>
                                    Kirim permintaan dan catat token reset password yang dikembalikan.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Di browser Burp, masukkan endpoint reset password pada bilah alamat dengan menambahkan token reset Anda sebagai parameter <code>reset_token</code>, misalnya:
                                </p>
                                <p>
                                    <code>/forgot-password?reset_token=123456789</code>
                                </p>
                            </li>
                            <li>
                                <p>
                                    Tetapkan password baru.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Masuk sebagai pengguna <code>administrator</code> menggunakan password tersebut.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Buka <strong>Admin panel</strong> lalu hapus <code>carlos</code> untuk menyelesaikan lab.
                                </p>
                            </li>
                        </ol>
                    </div>
                </div>
LABHTML,
        ],
    ],
    '0784ab77e14f53e495ab0b8c4c39fc7008b9556c6d43961bcdba20bc43a58c3e' => [
        'title' => 'Menemukan dan mengeksploitasi endpoint API yang tidak terpakai',
        'descriptionHtml' => <<<'LABHTML'
<p>
            Untuk menyelesaikan lab ini, eksploitasi endpoint API tersembunyi untuk membeli <strong>Lightweight l33t Leather Jacket</strong>. Anda dapat masuk ke akun Anda menggunakan kredensial berikut: <code>wiener:peter</code>.
        </p><div class="highlightedarea">
            <h4>Pengetahuan yang dibutuhkan</h4>
            <p>
                Untuk menyelesaikan lab ini, Anda perlu memahami:
            </p>
            <ul>
                <li>Cara menggunakan pesan error untuk menyusun permintaan yang valid.</li>
                <li>Cara metode HTTP dipakai oleh API RESTful.</li>
                <li>Cara mengganti metode HTTP dapat mengungkap fungsionalitas tambahan.</li>
            </ul>
            <p>Poin-poin tersebut dibahas dalam topik Academy <a href="/web-security/api-testing">Pengujian API</a> kami.</p>
        </div>
LABHTML,
        'sections' => [
            0 => <<<'LABHTML'
<div class="content">
                    <div>
                        <ol>
                            <li>
                                <p>
                                    Di browser Burp, buka lab lalu klik salah satu produk.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Di <strong>Proxy &gt; HTTP history</strong>, amati permintaan API produk tersebut, misalnya <code>/api/products/3/price</code>.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Klik kanan permintaan API lalu pilih <strong>Send to Repeater</strong>.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Di tab <strong>Repeater</strong>, ubah metode HTTP permintaan API dari <code>GET</code> menjadi <code>OPTIONS</code>, lalu kirim permintaan. Amati bahwa respons menyebutkan metode <code>GET</code> dan <code>PATCH</code> diizinkan.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Ubah metode menjadi <code>PATCH</code> lalu kirim permintaan. Amati pesan <code>Unauthorized</code> yang menandakan Anda perlu terautentikasi untuk memperbarui harga.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Di browser Burp, masuk ke aplikasi memakai kredensial <code>wiener:peter</code>.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Klik produk <strong>Lightweight "l33t" Leather Jacket</strong>.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Di <strong>Proxy &gt; HTTP history</strong>, klik kanan permintaan <code>API/products/1/price</code> untuk jaket kulit dan pilih <strong>Send to Repeater</strong>.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Di tab <strong>Repeater</strong>, ubah metode menjadi <code>PATCH</code> lalu kirim permintaan. Amati error akibat <code>Content-Type</code> yang salah yang menyebutkan tipe seharusnya adalah <code>application/json</code>.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Tambahkan header <code>Content-Type</code> dengan nilai <code>application/json</code>.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Tambahkan objek JSON kosong <code>{}</code> sebagai body permintaan lalu kirim. Amati error karena parameter <code>price</code> tidak ada di body permintaan.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Tambahkan parameter <code>price</code> bernilai <code>0</code> ke dalam objek JSON: <code>{"price":0}</code>, lalu kirim permintaan.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Di browser Burp, muat ulang halaman produk jaket kulit. Amati bahwa harganya kini menjadi <code>$0.00</code>.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Tambahkan jaket kulit ke keranjang Anda.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Buka keranjang dan klik <strong>Place order</strong> untuk menyelesaikan lab.
                                </p>
                            </li>
                        </ol>
                    </div>
                </div>
LABHTML,
        ],
    ],
    '5d91c4a0e2767106aefce961db7e938299e9506731dc1a2de30bb258a82c697a' => [
        'title' => 'Mengeksploitasi kerentanan mass assignment',
        'descriptionHtml' => <<<'LABHTML'
<p>
            Untuk menyelesaikan lab ini, temukan dan eksploitasi kerentanan mass assignment guna membeli <strong>Lightweight l33t Leather Jacket</strong>. Anda dapat masuk ke akun Anda menggunakan kredensial berikut: <code>wiener:peter</code>.
        </p><div class="highlightedarea">
            <h4>Pengetahuan yang dibutuhkan</h4>
            <p>
                Untuk menyelesaikan lab ini, Anda perlu memahami:
            </p>
            <ul>
                <li>Apa itu mass assignment.</li>
                <li>Mengapa mass assignment dapat menimbulkan parameter tersembunyi.</li>
                <li>Cara mengidentifikasi parameter tersembunyi.</li>
                <li>Cara mengeksploitasi kerentanan mass assignment.</li>
            </ul>
            <p>Poin-poin tersebut dibahas dalam topik Academy <a href="/web-security/api-testing">Pengujian API</a> kami.</p>
        </div>
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
                                    Klik produk <strong>Lightweight "l33t" Leather Jacket</strong> dan tambahkan ke keranjang Anda.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Buka keranjang dan klik <strong>Place order</strong>. Amati bahwa saldo kredit Anda tidak mencukupi.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Di <strong>Proxy &gt; HTTP history</strong>, perhatikan adanya permintaan API <code>GET</code> dan <code>POST</code> untuk <code>/api/checkout</code>.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Amati bahwa respons permintaan <code>GET</code> memiliki struktur JSON serupa dengan permintaan <code>POST</code>, tetapi menyertakan parameter <code>chosen_discount</code> yang tidak ada pada permintaan <code>POST</code>.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Klik kanan permintaan <code>POST /api/checkout</code> lalu pilih <strong>Send to Repeater</strong>.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Di Repeater, tambahkan parameter <code>chosen_discount</code> ke dalam permintaan sehingga JSON tampak seperti berikut:
                                </p>
                                <p>
                                    <code class="code-scrollable">{
    "chosen_discount":{
        "percentage":0
    },
    "chosen_products":[
        {
            "product_id":"1",
            "quantity":1
        }
    ]
}</code>
                                </p>
                            </li>
                            <li>
                                <p>
                                    Kirim permintaan. Amati bahwa penambahan parameter <code>chosen_discount</code> tidak memicu error.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Ubah nilai <code>chosen_discount</code> menjadi string <code>"x"</code>, lalu kirim permintaan. Amati pesan error bahwa nilainya bukan angka, menandakan input pengguna benar-benar diproses.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Ubah persentase <code>chosen_discount</code> menjadi <code>100</code>, lalu kirim permintaan untuk menyelesaikan lab.
                                </p>
                            </li>
                        </ol>
                    </div>
                </div>
LABHTML,
        ],
    ],
    '4967cb9ad484265a5742afb7b567c2732e03c1753ec5232085b0d0fc48a426f5' => [
        'title' => 'Mengeksploitasi server-side parameter pollution dalam REST URL',
        'descriptionHtml' => <<<'LABHTML'
<p>
            Untuk menyelesaikan lab ini, masuk sebagai <code>administrator</code> dan hapus pengguna <code>carlos</code>.
        </p><div class="highlightedarea">
            <h4>Pengetahuan yang dibutuhkan</h4>
            <p>
                Untuk menyelesaikan lab ini, Anda perlu memahami:
            </p>
            <ul>
                <li>Cara mengenali apakah input pengguna dimasukkan ke path URL sisi server atau query string.</li>
                <li>Cara memakai urutan path traversal untuk mengubah permintaan sisi server.</li>
                <li>Cara menemukan dokumentasi API.</li>
            </ul>
            <p>Poin-poin tersebut dibahas dalam topik Academy <a href="/web-security/api-testing">Pengujian API</a> kami.</p>
        </div>
LABHTML,
        'sections' => [
            0 => <<<'LABHTML'
<div class="content">
                    <div>
                        <h2 cms-ignore-validation="DUPLICATE_HEADINGS" id="study-the-behavior">Pelajari perilaku sistem</h2>
                        <ol>
                            <li>
                                <p>
                                    Di browser Burp, picu reset password untuk pengguna <code>administrator</code>.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Di <strong>Proxy &gt; HTTP history</strong>, amati permintaan <code>POST /forgot-password</code> dan file JavaScript terkait <code>/static/js/forgotPassword.js</code>.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Klik kanan permintaan <code>POST /forgot-password</code> lalu pilih <strong>Send to Repeater</strong>.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Di tab <strong>Repeater</strong>, kirim ulang permintaan untuk memastikan responsnya konsisten.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Kirim beberapa variasi nilai parameter username untuk menguji apakah input dimasukkan ke path URL permintaan sisi server tanpa escaping:
                                </p>
                                <ol>
                                    <li><p>Kirim <code>administrator#</code> dalam bentuk URL-encode sebagai nilai parameter <code>username</code>.</p>
                                        <p>Amati munculnya pesan error <code>Invalid route</code>, menandakan input mungkin diletakkan di path permintaan sisi server dan fragmen tersebut memotong data setelahnya. Pesan ini juga menyinggung adanya definisi API.</p></li>
                                    <li><p>Ubah nilai parameter username dari <code>administrator%23</code> menjadi URL-encode <code>administrator?</code> lalu kirim.</p>
                                        <p>Amati munculnya pesan error <code>Invalid route</code> yang juga menunjukkan input diletakkan di path URL karena karakter <code>?</code> menandai awal query string dan memotong path URL.</p></li>
                                    <li><p>Ubah nilai parameter username dari <code>administrator%3F</code> menjadi <code>./administrator</code> lalu kirim.</p>
                                        <p>Amati bahwa respons kembali sama seperti permintaan awal, memperkuat indikasi bahwa input ditempatkan di dalam path URL.</p>
                                    </li>
                                    <li><p>Ubah nilai parameter username dari <code>./administrator</code> menjadi <code>../administrator</code> lalu kirim.</p>
                                        <p>Amati munculnya pesan error <code>Invalid route</code> karena permintaan mengarah ke path URL yang tidak valid.</p></li>
                                </ol>
                            </li>
                        </ol>
                        <h2 id="navigate-to-the-api-definition">Navigasi ke definisi API</h2>
                        <ol>
                            <li>
                                <p>
                                    Ubah nilai parameter username dari <code>../administrator</code> menjadi <code>../%23</code>. Amati respons <code>Invalid route</code>.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Tambahkan urutan <code>../</code> bertahap hingga mencapai <code>../../../../%23</code>. Amati munculnya respons <code>Not found</code> yang menandakan Anda sudah keluar dari root API.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Pada level ini, tambahkan nama file definisi API umum ke path URL, misalnya kirim:
                                </p>
                                <p>
                                    <code>username=../../../../openapi.json%23</code>
                                </p>
                                <p>
                                    Amati pesan error yang dikembalikan memuat endpoint API berikut untuk mencari pengguna:
                                </p>
                                <p>
                                    <code>/api/internal/v1/users/{username}/field/{field}</code>
                                </p>
                                <p>
                                    Endpoint ini menunjukkan bahwa path URL memiliki parameter bernama <code>field</code>.
                                </p>
                            </li>
                        </ol>
                        <h2 id="exploit-the-vulnerability">Eksploitasi kerentanan</h2>
                        <ol>
                            <li>
                                <p>
                                    Perbarui nilai parameter <code>username</code> sesuai struktur endpoint yang ditemukan dengan nilai tidak valid untuk parameter <code>field</code>:
                                </p>
                                <p>
                                    <code>username=administrator/field/foo%23</code>
                                </p>
                                <p>
                                    Kirim permintaan. Amati pesan error bahwa API hanya mendukung field email.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Masukkan <code>email</code> sebagai nilai parameter <code>field</code>:
                                </p>
                                <p>
                                    <code>username=administrator/field/email%23</code>
                                </p>
                                <p>
                                    Kirim permintaan. Amati responsnya kembali seperti semula, menandakan aplikasi sisi server mengenali parameter <code>field</code> yang disuntikkan dan <code>email</code> adalah tipe field valid.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Di <strong>Proxy &gt; HTTP history</strong>, periksa file JavaScript <code>/static/js/forgotPassword.js</code> dan temukan endpoint reset password yang memakai parameter <code>passwordResetToken</code>:
                                </p>
                                <p>
                                    <code>/forgot-password?passwordResetToken=${resetToken}</code>
                                </p>
                            </li>
                            <li>
                                <p>
                                    Di tab <strong>Repeater</strong>, ubah nilai parameter <code>field</code> dari <code>email</code> menjadi <code>passwordResetToken</code>:
                                </p>
                                <p>
                                    <code>username=administrator/field/passwordResetToken%23</code>
                                </p>
                                <p>
                                    Kirim permintaan. Amati error yang menyatakan parameter <code>passwordResetToken</code> tidak didukung pada versi API yang dipanggil aplikasi.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Memanfaatkan endpoint <code>/api/</code> yang ditemukan sebelumnya, ubah versi API dalam nilai parameter <code>username</code>:
                                </p>
                                <p>
                                    <code>username=../../v1/users/administrator/field/passwordResetToken%23</code>
                                </p>
                                <p>
                                    Kirim permintaan lalu catat token reset password yang dikembalikan.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Di browser Burp, masukkan endpoint reset password pada bilah alamat dengan menambahkan token reset password Anda sebagai nilai parameter <code>reset_token</code>, misalnya:
                                </p>
                                <p>
                                    <code>/forgot-password?passwordResetToken=123456789</code>
                                </p>
                            </li>
                            <li>
                                <p>
                                    Tetapkan password baru.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Masuk sebagai <code>administrator</code> menggunakan password tersebut.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Buka <strong>Admin panel</strong> dan hapus <code>carlos</code> untuk menyelesaikan lab.
                                </p>
                            </li>
                        </ol>
                    </div>
                </div>
LABHTML,
        ],
    ],
];
