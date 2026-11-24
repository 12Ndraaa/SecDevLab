<?php

return [
    '1eb25c72bba9c28a06ef2ee3f090ecb4ab93adf38414a9d0ae9f017f2208b937' => [
        'title' => 'File path traversal, kasus sederhana',
        'descriptionHtml' => <<<'LABHTML'
<p>
            Lab ini memiliki kerentanan path traversal pada tampilan gambar produk.
        </p><p>
            Untuk menyelesaikan lab ini, ambil isi file <code>/etc/passwd</code>.
        </p>
LABHTML,
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
                <ol>
                    <li>
                        Gunakan Burp Suite untuk mencegat dan memodifikasi permintaan yang mengambil gambar produk.
                    </li>
                    <li>
                        <p>
                            Ubah parameter <code>filename</code> menjadi bernilai:
                        </p>
                        <code class="code-scrollable">../../../etc/passwd</code>
                    </li>
                    <li>
                        Amati bahwa respons memuat isi file <code>/etc/passwd</code>.
                    </li>
                </ol>
            </div></div>
LABHTML,
        ],
    ],
    '9901aea6b495868d278afd6098c443f412658d4bb95b4b7a22066bf79e0c6259' => [
        'title' => 'File path traversal, urutan traversal diblokir dengan bypass path absolut',
        'descriptionHtml' => <<<'LABHTML'
<p>
            Lab ini memiliki kerentanan path traversal pada tampilan gambar produk.
        </p><p>
            Aplikasi memblokir urutan traversal tetapi memperlakukan nama file yang dikirimkan seolah relatif terhadap direktori kerja bawaan.
        </p><p>
            Untuk menyelesaikan lab ini, ambil isi file <code>/etc/passwd</code>.
        </p>
LABHTML,
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
                <ol>
                    <li>
                        Gunakan Burp Suite untuk mencegat dan memodifikasi permintaan yang mengambil gambar produk.
                    </li>
                    <li>
                        Ubah parameter <code>filename</code> menjadi bernilai <code>/etc/passwd</code>.
                    </li>
                    <li>
                        Amati bahwa respons memuat isi file <code>/etc/passwd</code>.
                    </li>
                </ol>
            </div></div>
LABHTML,
        ],
    ],
    '18706d204e31e279885e0113ec3b6474ddaaac7690c0a0dce2b84db0119691fe' => [
        'title' => 'File path traversal, urutan traversal dihapus secara non-rekursif',
        'descriptionHtml' => <<<'LABHTML'
<p>
            Lab ini memiliki kerentanan path traversal pada tampilan gambar produk.
        </p><p>
            Aplikasi menghapus urutan path traversal dari nama file kiriman pengguna sebelum menggunakannya.
        </p><p>
            Untuk menyelesaikan lab ini, ambil isi file <code>/etc/passwd</code>.
        </p>
LABHTML,
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
                <ol>
                    <li>
                        Gunakan Burp Suite untuk mencegat dan memodifikasi permintaan yang mengambil gambar produk.
                    </li>
                    <li>
                        <p>
                            Ubah parameter <code>filename</code> menjadi bernilai:
                        </p>
                        <code class="code-scrollable">....//....//....//etc/passwd</code>
                    </li>
                    <li>
                        Amati bahwa respons memuat isi file <code>/etc/passwd</code>.
                    </li>
                </ol>
            </div></div>
LABHTML,
        ],
    ],
    '0ff4cb8691cfff7dc5d2c45682d859b9a5c3ba47cb98e42aa05a3391cd0cfc03' => [
        'title' => 'File path traversal, urutan traversal dihapus dengan URL-decode berlebih',
        'descriptionHtml' => <<<'LABHTML'
<p>
            Lab ini memiliki kerentanan path traversal pada tampilan gambar produk.
        </p><p>
            Aplikasi memblokir input yang mengandung urutan path traversal, lalu melakukan URL-decode pada input tersebut sebelum memakainya.
        </p><p>
            Untuk menyelesaikan lab ini, ambil isi file <code>/etc/passwd</code>.
        </p>
LABHTML,
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
                <ol>
                    <li>
                        Gunakan Burp Suite untuk mencegat dan memodifikasi permintaan yang mengambil gambar produk.
                    </li>
                    <li>
                        <p>
                            Ubah parameter <code>filename</code> menjadi bernilai:
                        </p>
                        <code class="code-scrollable">..%252f..%252f..%252fetc/passwd</code>
                    </li>
                    <li>
                        Amati bahwa respons memuat isi file <code>/etc/passwd</code>.
                    </li>
                </ol>
            </div></div>
LABHTML,
        ],
    ],
    '7f09a80ec4ca0acdbe9e0fd29231b98a8249b834ac60b8e2b296b470ad0f82a5' => [
        'title' => 'File path traversal, validasi awal path',
        'descriptionHtml' => <<<'LABHTML'
<p>
            Lab ini memiliki kerentanan path traversal pada tampilan gambar produk.
        </p><p>
            Aplikasi mengirimkan path file lengkap lewat parameter permintaan dan memvalidasi bahwa path tersebut diawali oleh direktori yang diharapkan.
        </p><p>
            Untuk menyelesaikan lab ini, ambil isi file <code>/etc/passwd</code>.
        </p>
LABHTML,
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
                <ol>
                    <li>
                        Gunakan Burp Suite untuk mencegat dan memodifikasi permintaan yang mengambil gambar produk.
                    </li>
                    <li>
                        <p>
                            Ubah parameter <code>filename</code> menjadi bernilai:
                        </p>
                        <code class="code-scrollable">/var/www/images/../../../etc/passwd</code>
                    </li>
                    <li>
                        Amati bahwa respons memuat isi file <code>/etc/passwd</code>.
                    </li>
                </ol>
            </div></div>
LABHTML,
        ],
    ],
    '563206d375aae19b45b636fbd08faf36892e8229b2f84d5908110bbdb7798561' => [
        'title' => 'File path traversal, validasi ekstensi file dengan bypass null byte',
        'descriptionHtml' => <<<'LABHTML'
<p>
            Lab ini memiliki kerentanan path traversal pada tampilan gambar produk.
        </p><p>
            Aplikasi memvalidasi bahwa nama file yang dikirimkan diakhiri dengan ekstensi file yang diharapkan.
        </p><p>
            Untuk menyelesaikan lab ini, ambil isi file <code>/etc/passwd</code>.
        </p>
LABHTML,
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
                <ol>
                    <li>
                        Gunakan Burp Suite untuk mencegat dan memodifikasi permintaan yang mengambil gambar produk.
                    </li>
                    <li>
                        <p>
                            Ubah parameter <code>filename</code> menjadi bernilai:
                        </p>
                        <code class="code-scrollable">../../../etc/passwd%00.png</code>
                    </li>
                    <li>
                        Amati bahwa respons memuat isi file <code>/etc/passwd</code>.
                    </li>
                </ol>
            </div></div>
LABHTML,
        ],
    ],
];
