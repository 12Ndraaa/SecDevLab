@extends('layouts.academy')

@php $isId = ($uiLocale ?? app()->getLocale()) === 'id'; @endphp
@section('title', ($isId ? 'Tantangan Lab Misteri' : 'Mystery lab challenge').' | '.(config('app.name') ?: 'SecDevLab'))
@section('legacy_css', '/content/psgenerictheme.css')

@section('academy_body')
<div class="wrapper" id="academy-started">
    @if ($isId)
        <div class="section-full-width theme-white">
            <h1 id="put-your-recon-skills-to-the-test" class="heading-2">Uji kemampuan analisis Anda tanpa petunjuk awal</h1>
            <p class="intro">Coba selesaikan lab acak dengan judul dan deskripsi tersembunyi. Karena jenis kerentanannya belum diketahui, latihan ini cocok untuk mengasah pengintaian dan identifikasi celah dari nol.</p>
        </div>

        <div class="section-full-width theme-grey-5">
            <p class="margin-bottom-medium">Pada sebagian lab, Anda memiliki akun uji bawaan dengan kredensial <code>wiener:peter</code>. Jika berhasil melakukan enumerasi username, Anda dapat memanfaatkan daftar kata
                <a href="/web-security/authentication/auth-lab-usernames">username</a> dan <a href="/web-security/authentication/auth-lab-passwords">password</a> berikut.
            </p>
            @include('partials.widget', ['id' => 'academy-launch-mystery-lab'])
        </div>

        <div class="section-full-width theme-white">
            <p>Memahami dampak kerentanan dan cara mengeksploitasinya memang penting, tetapi tanpa kemampuan mencari dan menemukan titik celahnya, teknik eksploitasi belum bisa diterapkan.</p>
            <p>Pada tantangan lab misteri di atas, Anda berlatih menentukan sendiri jenis celah dan cara menyelesaikannya tanpa konteks awal, seperti saat menguji aplikasi di lapangan.</p>
        </div>

        <div class="section theme-white">
            <div class="highlightedarea">
                <h4>Catatan</h4>
                <p>Anda perlu menyelesaikan lima tantangan lab misteri tingkat Practitioner sebagai persiapan ujian sertifikasi praktis. <a href="/web-security/dashboard">Buka dasbor akun untuk melihat progres Anda</a>.</p>
            </div>
        </div>

        <div class="section-full-width theme-grey-5">
            <div class="container-cards-white-medium-space-between">
                <a href="/web-security/dashboard">
                    <h3>Dasbor peserta</h3>
                    <div class="chevron-after">Selengkapnya</div>
                </a>
                <a href="/web-security/hall-of-fame">
                    <h3>Papan Peringkat</h3>
                    <div class="chevron-after">Selengkapnya</div>
                </a>
                <a href="/web-security/certification/how-to-prepare">
                    <h3>Panduan persiapan sertifikasi</h3>
                    <div class="chevron-after">Selengkapnya</div>
                </a>
            </div>
        </div>
    @else
        <div class="section-full-width theme-white">
            <h1 id="put-your-recon-skills-to-the-test" class="heading-2">Put your recon skills to the test</h1>
            <p class="intro">Try solving a random lab with the title and description hidden. As you'll be unaware of the type of vulnerability that you need to find and exploit, this is great for practicing recon and analysis.</p>
        </div>

        <div class="section-full-width theme-grey-5">
            <p class="margin-bottom-medium">In some of the labs, you have access to your own account with the credentials <code>wiener:peter</code>. If you can enumerate usernames, you may also be able to brute-force the login using the following
                <a href="/web-security/authentication/auth-lab-usernames">username</a> and <a href="/web-security/authentication/auth-lab-passwords">password</a> wordlists.
            </p>
            @include('partials.widget', ['id' => 'academy-launch-mystery-lab'])
        </div>

        <div class="section-full-width theme-white">
            <p>Learning about the impact of vulnerabilities, and how to exploit them of course, is a huge part of understanding web security. However, if you don't know how to look for and discover the vulnerabilities,
                you'll have nowhere to apply all those exploitation skills you've developed.
            </p>
            <p>When using the mystery lab challenge above, you'll have to try and work out how to solve each challenge with no context, exactly as you would when performing recon in a real-world testing environment.</p>
        </div>

        <div class="section theme-white">
            <div class="highlightedarea">
                <h4>Note</h4>
                <p>You will need to complete five practitioner-level mystery lab challenges as part of preparing for the {{ config('app.name') ?: 'SecDevLab' }} Certified Practitioner exam. <a href="/web-security/dashboard">Visit your account dashboard to check your progress</a>.</p>
            </div>
        </div>

        <div class="section-full-width theme-grey-5">
            <div class="container-cards-white-medium-space-between">
                <a href="/web-security/dashboard">
                    <h3>User dashboard</h3>
                    <div class="chevron-after">Read more</div>
                </a>
                <a href="/web-security/hall-of-fame">
                    <h3 cms-ignore-validation="HEADING_CAPITALIZATION">Hall of Fame</h3>
                    <div class="chevron-after">Read more</div>
                </a>
                <a href="/web-security/certification/how-to-prepare">
                    <h3>Certification preparation guide</h3>
                    <div class="chevron-after">Read more</div>
                </a>
            </div>
        </div>
    @endif
</div>
@endsection
