<?php

return [
    '417528e487706565f7a124cb5aa164335f05b77861a2c4875a5165d750de9d3d' => [
        'title' => 'Mengakses postingan GraphQL privat',
        'description_html' => '<p>Halaman blog pada lab ini berisi postingan tersembunyi yang menyimpan kata sandi rahasia. Untuk menyelesaikan lab, temukan postingan tersembunyi tersebut lalu masukkan kata sandinya.</p><p>Pelajari lebih lanjut di <a href="/burp/documentation/desktop/testing-workflow/working-with-graphql">Working with GraphQL in Burp Suite</a>.</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content">
    <div>
        <p><strong>Mengidentifikasi kerentanan</strong></p>
        <ol>
            <li><p>Di browser Burp, buka halaman blog.</p></li>
            <li>
                <p>Di Burp, buka <strong>Proxy &gt; HTTP history</strong> dan perhatikan hal berikut:</p>
                <ul>
                    <li>Postingan blog diambil menggunakan query GraphQL.</li>
                    <li>Pada respons query GraphQL tersebut, setiap postingan memiliki nilai [[C0]] berurutan.</li>
                    <li>Postingan blog dengan [[C1]] 3 tidak muncul di daftar. Hal ini menandakan ada postingan tersembunyi.</li>
                </ul>
            </li>
            <li><p>Temukan permintaan [[C2]]. Klik kanan permintaan tersebut lalu pilih <strong>Send to Repeater</strong>.</p></li>
            <li><p>Di Repeater, klik kanan di area panel Request pada editor pesan lalu pilih <strong>GraphQL &gt; Set introspection query</strong> untuk menyisipkan introspection query ke isi permintaan.</p></li>
            <li><p>Kirim permintaan tersebut. Perhatikan pada respons bahwa tipe [[C3]] memiliki field [[C4]] yang tersedia.</p></li>
        </ol>
        <p><strong>Mengeksploitasi kerentanan untuk menemukan kata sandi</strong></p>
        <ol>
            <li><p>Di HTTP history, temukan kembali permintaan [[C5]]. Klik kanan lalu pilih <strong>Send to Repeater</strong>.</p></li>
            <li><p>Di Repeater, buka tab <strong>GraphQL</strong>. Pada panel <strong>Variables</strong>, ubah variabel [[C6]] menjadi 3 (ID dari postingan blog tersembunyi).</p></li>
            <li><p>Di panel <strong>Query</strong>, tambahkan field [[C7]] ke dalam query.</p></li>
            <li><p>Kirim permintaan tersebut.</p></li>
            <li><p>Salin isi field [[C8]] dari respons dan tempelkan ke dialog <strong>Submit solution</strong> untuk menyelesaikan lab. Anda mungkin perlu memuat ulang halaman.</p></li>
        </ol>
    </div>
</div>
LABHTML,
        ],
    ],
    'ccda6760929ebeccab51242f59b1573dd478087800b63c88fc8aa308db137802' => [
        'title' => 'Eksposur tidak sengaja pada field GraphQL privat',
        'description_html' => '<p>Fungsi manajemen pengguna pada lab ini ditenagai oleh endpoint GraphQL. Lab ini memiliki kerentanan kontrol akses yang memungkinkan Anda memancing API untuk mengungkap field kredensial pengguna.</p><p>Untuk menyelesaikan lab, masuk sebagai administrator dan hapus pengguna bernama [[C0]].</p><p>Pelajari lebih lanjut di <a href="/burp/documentation/desktop/testing-workflow/working-with-graphql">Working with GraphQL in Burp Suite</a>.</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content">
    <div>
        <p><strong>Mengidentifikasi kerentanan</strong></p>
        <ol>
            <li><p>Di browser Burp, buka lab dan pilih <strong>My account</strong>.</p></li>
            <li><p>Coba masuk ke situs.</p></li>
            <li><p>Di Burp, buka <strong>Proxy &gt; HTTP history</strong> dan perhatikan bahwa percobaan login dikirim sebagai mutasi GraphQL berisi username dan kata sandi.</p></li>
            <li><p>Klik kanan permintaan login lalu pilih <strong>Send to Repeater</strong>.</p></li>
            <li><p>Di Repeater, klik kanan di panel Request pada editor pesan dan pilih <strong>GraphQL &gt; Set introspection query</strong> untuk menyisipkan introspection query ke isi permintaan.</p></li>
            <li><p>Kirim permintaan tersebut.</p></li>
            <li><p>Klik kanan pesan tersebut lalu pilih <strong>GraphQL &gt; Save GraphQL queries to site map</strong>.</p></li>
            <li>
                <p>Buka <strong>Target &gt; Site map</strong> dan tinjau query GraphQL yang tersimpan. Perhatikan hal berikut:</p>
                <ul>
                    <li>Ada query [[C0]] yang mengembalikan username dan kata sandi pengguna.</li>
                    <li>Query ini mengambil informasi pengguna melalui referensi langsung ke angka [[C1]].</li>
                </ul>
            </li>
        </ol>
        <p><strong>Memodifikasi query untuk mengambil kredensial administrator</strong></p>
        <ol>
            <li><p>Klik kanan query [[C2]] lalu pilih <strong>Send to Repeater</strong>.</p></li>
            <li><p>Di Repeater, klik <strong>Send</strong>. Perhatikan bahwa nilai default [[C3]] sebesar [[C4]] tidak mengembalikan data pengguna.</p></li>
            <li><p>Pilih tab GraphQL dan uji nilai lain untuk variabel [[C5]] hingga API mengembalikan kredensial administrator. Pada lab ini, ID administrator adalah [[C6]].</p></li>
            <li><p>Masuk ke situs sebagai administrator, buka panel <strong>Admin</strong>, lalu hapus [[C7]] untuk menyelesaikan lab.</p></li>
        </ol>
    </div>
</div>
LABHTML,
        ],
    ],
    '3a73e7aa263f5e0db7ac8a1c6cd9ec592206484cee2ac6fde2dc304cb2d13129' => [
        'title' => 'Menemukan endpoint GraphQL tersembunyi',
        'description_html' => '<p>Fungsi manajemen pengguna pada lab ini ditenagai oleh endpoint GraphQL tersembunyi. Anda tidak akan menemukannya hanya dengan mengklik halaman di situs. Endpoint ini juga memiliki pertahanan terhadap introspection.</p><p>Untuk menyelesaikan lab, temukan endpoint tersembunyi tersebut dan hapus [[C0]].</p><p>Pelajari lebih lanjut di <a href="/burp/documentation/desktop/testing-workflow/working-with-graphql">Working with GraphQL in Burp Suite</a>.</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content">
    <div>
        <p><strong>Menemukan endpoint GraphQL tersembunyi</strong></p>
        <ol>
            <li><p>Di Repeater, kirim permintaan ke beberapa akhiran endpoint GraphQL yang umum lalu periksa hasilnya.</p></li>
            <li><p>Perhatikan bahwa saat Anda mengirim permintaan GET ke [[C0]], respons berisi galat "Query not present". Ini mengisyaratkan adanya endpoint GraphQL yang merespons permintaan GET di lokasi tersebut.</p></li>
            <li>
                <p>Ubah permintaan agar berisi universal query. Karena endpoint merespons permintaan GET, kirim query sebagai parameter URL.</p>
                <p>Contohnya: [[C1]].</p>
            </li>
            <li>
                <p>Perhatikan bahwa respons mengonfirmasi lokasi ini sebagai endpoint GraphQL:</p>
                [[C2]]
            </li>
        </ol>
        <p><strong>Melewati pertahanan introspection</strong></p>
        <ol>
            <li>
                <p>Kirim permintaan baru berisi introspection query yang di-encode URL sebagai parameter query.</p>
                <p>Untuk melakukannya, klik kanan permintaan lalu pilih <strong>GraphQL &gt; Set introspection query</strong>:</p>
                [[C3]]
            </li>
            <li><p>Perhatikan dari respons bahwa introspection ditolak.</p></li>
            <li>
                <p>Ubah query agar menyertakan karakter baris baru setelah [[C4]] lalu kirim ulang.</p>
                <p>Contohnya:</p>
                [[C5]]
            </li>
            <li><p>Perhatikan bahwa respons kini menyertakan detail introspection lengkap. Hal ini terjadi karena server dikonfigurasi untuk memblokir query yang cocok dengan regex [[C6]], yang tidak lagi cocok meski query tersebut tetap valid.</p></li>
        </ol>
        <p><strong>Mengeksploitasi kerentanan untuk menghapus carlos</strong></p>
        <ol>
            <li><p>Klik kanan permintaan lalu pilih <strong>GraphQL &gt; Save GraphQL queries to site map</strong>.</p></li>
            <li><p>Buka <strong>Target &gt; Site map</strong> untuk melihat query API. Gunakan tab <strong>GraphQL</strong> dan temukan query [[C7]]. Klik kanan permintaan tersebut lalu pilih <strong>Send to Repeater</strong>.</p></li>
            <li>
                <p>Di Repeater, kirim query [[C8]] ke endpoint yang Anda temukan.</p>
                <p>Perhatikan bahwa respons mengembalikan:</p>
                [[C9]]
            </li>
            <li><p>Klik tab GraphQL dan ubah variabel [[C10]] untuk mencari ID pengguna [[C11]]. Pada kasus ini, ID yang sesuai adalah [[C12]].</p></li>
            <li><p>Di <strong>Target &gt; Site map</strong>, telusuri ulang skema dan temukan mutasi [[C13]]. Perhatikan bahwa mutasi ini menerima ID pengguna sebagai parameter.</p></li>
            <li><p>Kirim permintaan tersebut ke Repeater.</p></li>
            <li>
                <p>Di Repeater, kirim mutasi [[C14]] dengan ID pengguna [[C15]] untuk menghapus [[C16]] dan menyelesaikan lab.</p>
                <p>Contohnya:</p>
                [[C17]]
            </li>
        </ol>
    </div>
</div>
LABHTML,
        ],
    ],
    '1ff12f295e639070b0200de527e0d58cd54ffe26907088691be7155d78305dc9' => [
        'title' => 'Melewati proteksi brute force GraphQL',
        'description_html' => '<p>Mekanisme login pengguna pada lab ini menggunakan API GraphQL. Endpoint API memiliki pembatas laju (rate limiter) yang mengembalikan galat jika menerima terlalu banyak permintaan dari origin yang sama dalam waktu singkat.</p><p>Untuk menyelesaikan lab, lakukan brute force pada mekanisme login agar dapat masuk sebagai [[C0]]. Gunakan daftar <a href="/web-security/authentication/auth-lab-passwords">kata sandi lab autentikasi</a> sebagai sumber kata sandi Anda.</p><p>Pelajari lebih lanjut di <a href="/burp/documentation/desktop/testing-workflow/working-with-graphql">Working with GraphQL in Burp Suite</a>.</p><div class="component-solution expandable-container"><details><summary><h4><span class="icon-bulb"></span>Tip</h4></summary><div class="content"><div><p>Lab ini membutuhkan permintaan besar yang memakai alias untuk mengirim banyak percobaan login sekaligus. Karena menyusun permintaan secara manual cukup memakan waktu, Anda disarankan menggunakan skrip.</p><p>Contoh JavaScript di bawah membangun daftar alias untuk setiap kata sandi dari daftar autentikasi lalu menyalin permintaannya ke clipboard Anda. Cara menjalankannya:</p><ol><li>Buka lab di browser Burp.</li><li>Klik kanan halaman dan pilih <strong>Inspect</strong>.</li><li>Pilih tab <strong>Console</strong>.</li><li>Tempelkan skrip lalu tekan Enter.</li></ol><p>Anda lalu dapat memakai alias yang dihasilkan saat menyusun permintaan di Repeater.</p>[[C1]]</div></div></details></div>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content">
    <div>
        <p>Lab ini membutuhkan permintaan besar yang memakai alias untuk mengirim banyak percobaan login sekaligus. Karena menyusun permintaan secara manual cukup memakan waktu, Anda disarankan menggunakan skrip.</p>
        <p>Contoh JavaScript di bawah membangun daftar alias untuk setiap kata sandi dari daftar autentikasi lalu menyalin permintaannya ke clipboard Anda. Cara menjalankannya:</p>
        <ol>
            <li>Buka lab di browser Burp.</li>
            <li>Klik kanan halaman dan pilih <strong>Inspect</strong>.</li>
            <li>Pilih tab <strong>Console</strong>.</li>
            <li>Tempelkan skrip lalu tekan Enter.</li>
        </ol>
        <p>Anda lalu dapat memakai alias yang dihasilkan saat menyusun permintaan di Repeater.</p>
        [[C0]]
    </div>
</div>
LABHTML,
            1 => <<<'LABHTML'
<div class="content">
    <div>
        <ol>
            <li><p>Di browser Burp, buka lab dan pilih <strong>My account</strong>.</p></li>
            <li><p>Coba masuk ke situs dengan kredensial yang salah.</p></li>
            <li><p>Di Burp, buka <strong>Proxy &gt; HTTP history</strong>. Perhatikan bahwa permintaan login dikirim sebagai mutasi GraphQL.</p></li>
            <li><p>Klik kanan permintaan login tersebut lalu pilih <strong>Send to Repeater</strong>.</p></li>
            <li><p>Di Repeater, coba kirim beberapa permintaan login lagi dengan kredensial salah. Perhatikan bahwa setelah beberapa saat API mulai mengembalikan galat batas laju.</p></li>
            <li>
                <p>Di tab GraphQL, susun permintaan yang memakai alias untuk mengirim banyak mutasi login dalam satu pesan. Lihat bagian tip pada lab ini untuk cara menyusunnya lebih cepat.</p>
                <p>Perhatikan hal berikut saat menyusun permintaan:</p>
                <ul>
                    <li>Daftar alias harus berada di dalam tipe [[C0]].</li>
                    <li>Setiap mutasi beralias harus memakai username [[C1]] dan kata sandi berbeda dari daftar autentikasi.</li>
                    <li>Jika Anda memodifikasi permintaan yang dikirim ke Repeater, hapus kamus variabel dan field [[C2]] sebelum mengirimkannya. Anda dapat melakukannya dari tab <strong>Pretty</strong> di Repeater.</li>
                    <li>Pastikan setiap alias meminta field [[C3]], seperti contoh ringkas di bawah:</li>
                </ul>
                [[C4]]
            </li>
            <li><p>Klik <strong>Send</strong>.</p></li>
            <li><p>Perhatikan bahwa respons mencantumkan setiap percobaan login beserta status keberhasilannya.</p></li>
            <li><p>Gunakan bilah pencarian di bawah respons untuk mencari string [[C5]]. Ini menandakan mutasi beralias mana yang berhasil masuk sebagai [[C6]].</p></li>
            <li><p>Periksa permintaan untuk mengetahui kata sandi yang dipakai oleh alias yang berhasil tersebut.</p></li>
            <li><p>Masuk ke situs memakai kredensial [[C7]] untuk menyelesaikan lab.</p></li>
        </ol>
    </div>
</div>
LABHTML,
        ],
    ],
    'ee2c12983456a4312f8435c1ffb0292d55c10e35dd899de6fb8bb3560257ef75' => [
        'title' => 'Melakukan eksploitasi CSRF melalui GraphQL',
        'description_html' => '<p>Fungsi manajemen pengguna pada lab ini menggunakan endpoint GraphQL. Endpoint ini menerima permintaan dengan content-type [[C0]] sehingga rentan terhadap serangan cross-site request forgery (CSRF).</p><p>Untuk menyelesaikan lab, buat HTML yang memanfaatkan serangan CSRF untuk mengubah alamat email target, lalu unggah ke server eksploitasi Anda.</p><p>Anda dapat masuk ke akun sendiri memakai kredensial berikut: [[C1]].</p><p>Pelajari lebih lanjut di <a href="/burp/documentation/desktop/testing-workflow/working-with-graphql">Working with GraphQL in Burp Suite</a>.</p>',
        'sections' => [
            0 => <<<'LABHTML'
<div class="content">
    <div>
        <ol>
            <li><p>Buka browser Burp, akses lab, lalu masuk ke akun Anda.</p></li>
            <li><p>Masukkan alamat email baru, kemudian klik <strong>Update email</strong>.</p></li>
            <li><p>Di Burp, buka <strong>Proxy &gt; HTTP history</strong> dan periksa permintaan yang dihasilkan. Perhatikan bahwa perubahan email dikirim sebagai mutasi GraphQL.</p></li>
            <li><p>Klik kanan permintaan perubahan email tersebut lalu pilih <strong>Send to Repeater</strong>.</p></li>
            <li><p>Di Repeater, ubah query GraphQL agar mengganti email ke alamat lain kedua.</p></li>
            <li><p>Klik <strong>Send</strong>.</p></li>
            <li><p>Pada respons, perhatikan bahwa email berhasil diubah lagi. Hal ini menunjukkan Anda dapat menggunakan ulang cookie sesi untuk mengirim beberapa permintaan.</p></li>
            <li><p>Ubah permintaan menjadi permintaan POST dengan [[C0]] bernilai [[C1]]. Untuk melakukannya, klik kanan permintaan lalu pilih <strong>Change request method</strong> dua kali.</p></li>
            <li>
                <p>Perhatikan bahwa isi permintaan mutasi terhapus. Tambahkan kembali isi permintaan tersebut dalam format URL-encoded.</p>
                <p>Isinya harus tampak seperti di bawah:</p>
                <p>[[C2]]</p>
            </li>
            <li><p>Klik kanan permintaan dan pilih <strong>Engagement tools &gt; Generate CSRF PoC</strong>. Burp akan menampilkan dialog <strong>CSRF PoC generator</strong>.</p></li>
            <li><p>Ubah HTML di dialog <strong>CSRF PoC generator</strong> agar mengganti email ke alamat ketiga. Langkah ini penting karena bila tidak, eksploitasi tidak akan mengubah alamat email saat dijalankan. Jika Anda mengujinya terlebih dahulu sebelum dikirim ke korban, pastikan email pada HTML berbeda dari email yang aktif saat itu.</p></li>
            <li><p>Salin HTML tersebut.</p></li>
            <li><p>Di lab, klik <strong>Go to exploit server</strong>.</p></li>
            <li><p>Tempelkan HTML ke server eksploitasi lalu klik <strong>Deliver exploit to victim</strong> untuk menyelesaikan lab.</p></li>
        </ol>
    </div>
</div>
LABHTML,
        ],
    ],
];
