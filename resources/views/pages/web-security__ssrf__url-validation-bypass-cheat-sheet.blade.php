@extends('layouts.academy')

@php
    $isId = ($uiLocale ?? app()->getLocale()) === 'id';
    $brand = config('app.name') ?: 'SecDevLab';
@endphp

@section('title', ($isId ? 'Lembar Contekan Bypass Validasi URL (SSRF/CORS/Redirect)' : 'URL validation bypass cheat sheet for SSRF/CORS/Redirect').' | '.$brand)

@section('academy_body')
<div class="sdl-page">
    <ul class="breadcrumb-list" style="margin-bottom:14px">
        <li><a href="/web-security">{{ $brand }}</a></li>
        <li><a href="/web-security/ssrf">SSRF</a></li>
        <li>{{ $isId ? 'Lembar contekan bypass validasi URL' : 'URL validation bypass cheat sheet' }}</li>
    </ul>

    <section class="sdl-hero">
        <span class="sdl-eyebrow">{{ $isId ? 'Referensi Payload Offline' : 'Offline Payload Reference' }}</span>
        <h1>{{ $isId ? 'Lembar contekan bypass validasi URL' : 'URL validation bypass cheat sheet' }}</h1>
        <p class="sdl-lead">
            @if ($isId)
                Daftar pola payload untuk menguji kelemahan parser URL dan filter domain pada kerentanan <a href="/web-security/ssrf">SSRF</a>, <a href="/web-security/cors">CORS</a>, maupun <a href="/web-security/dom-based/open-redirection">open redirection</a>.
            @else
                Reference vectors for auditing URL parsers, host allowlists, and regex checks across <a href="/web-security/ssrf">SSRF</a>, <a href="/web-security/cors">CORS</a>, and <a href="/web-security/dom-based/open-redirection">open redirection</a>.
            @endif
        </p>
        <div class="sdl-hero__actions">
            <a href="/web-security/ssrf" class="vla-btn vla-btn--primary">{{ $isId ? 'Materi & Lab SSRF' : 'SSRF Labs & Docs' }}</a>
            <a href="/web-security/cors" class="vla-btn vla-btn--outline">{{ $isId ? 'Materi CORS' : 'CORS Docs' }}</a>
        </div>
    </section>

    <div class="sdl-grid sdl-grid--2 sdl-section">
        <div class="sdl-card">
            <h3>{{ $isId ? '1. Representasi Alternatif Alamat Loopback & Internal' : '1. Loopback & Internal IP Encoding Tricks' }}</h3>
            <p>{{ $isId ? 'Saat filter memblokir 127.0.0.1 atau localhost secara literal, parser sistem operasi sering tetap menerima format numerik dan IPv6 alternatif.' : 'When denylists match literal 127.0.0.1 or localhost strings, network stacks often normalize alternate IPv4 and IPv6 notations.' }}</p>
            <div class="vla-table-wrap">
                <table class="vla-table">
                    <thead>
                        <tr><th>{{ $isId ? 'Teknik' : 'Technique' }}</th><th>{{ $isId ? 'Contoh Payload' : 'Sample Vector' }}</th></tr>
                    </thead>
                    <tbody>
                        <tr><td>Decimal / DWORD</td><td><code>http://2130706433/</code></td></tr>
                        <tr><td>Octal / Hex</td><td><code>http://0177.0.0.1/</code> &bull; <code>http://0x7f.0.0.1/</code></td></tr>
                        <tr><td>Shortened IPv4</td><td><code>http://127.1/</code> &bull; <code>http://0/</code></td></tr>
                        <tr><td>IPv6 Mapped</td><td><code>http://[::1]/</code> &bull; <code>http://[::ffff:127.0.0.1]/</code></td></tr>
                        <tr><td>Cloud Metadata (IPv6 / Hex)</td><td><code>http://0xa9fea9fe/latest/meta-data/</code></td></tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="sdl-card">
            <h3>{{ $isId ? '2. Diferensial Parser URL & Otoritas (@)' : '2. URL Parser Differentials & Authority Confusion' }}</h3>
            <p>{{ $isId ? 'Perbedaan penafsiran antara validator library (seperti regex atau parse_url) dan klien HTTP tujuan.' : 'Discrepancies between allowlist validators and the downstream HTTP client fetching the URL.' }}</p>
            <div class="vla-table-wrap">
                <table class="vla-table">
                    <thead>
                        <tr><th>{{ $isId ? 'Vektor' : 'Vector' }}</th><th>{{ $isId ? 'Pola Uji' : 'Test Pattern' }}</th></tr>
                    </thead>
                    <tbody>
                        <tr><td>Userinfo (@)</td><td><code>https://trusted.example@127.0.0.1/admin</code></td></tr>
                        <tr><td>Backslash Normalization</td><td><code>https://127.0.0.1\@trusted.example/</code></td></tr>
                        <tr><td>Fragment Before Host</td><td><code>https://trusted.example#@127.0.0.1/</code></td></tr>
                        <tr><td>Substring Allowlist</td><td><code>https://trusted.example.attacker.tld/</code></td></tr>
                        <tr><td>Nested Redirect + SSRF</td><td><code>https://trusted.example/redirect?next=http://169.254.169.254/</code></td></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="sdl-card sdl-section">
        <h3>{{ $isId ? '3. Pola Pengujian CORS & Open Redirection' : '3. CORS Allowlist & Open Redirect Patterns' }}</h3>
        <div class="vla-table-wrap">
            <table class="vla-table">
                <thead>
                    <tr><th>{{ $isId ? 'Konteks' : 'Context' }}</th><th>{{ $isId ? 'Pola Bypass' : 'Bypass Pattern' }}</th><th>{{ $isId ? 'Catatan' : 'Notes' }}</th></tr>
                </thead>
                <tbody>
                    <tr><td>CORS Prefix / Suffix Regex</td><td><code>Origin: https://trusted.example.evil.com</code></td><td>{{ $isId ? 'Jangkar regex ^ dan $ tidak dipasang ketat.' : 'Unanchored regex checks allow prefix/suffix domains.' }}</td></tr>
                    <tr><td>CORS Null Origin</td><td><code>Origin: null</code></td><td>{{ $isId ? 'Dipicu via sandboxed iframe atau skema file/data.' : 'Triggered from sandboxed iframes across origins.' }}</td></tr>
                    <tr><td>Protocol-Relative Redirect</td><td><code>//attacker.tld/%2f..</code></td><td>{{ $isId ? 'Melewati pengecekan path yang tidak diawali skema http.' : 'Bypasses relative-path filters missing leading // validation.' }}</td></tr>
                    <tr><td>Whitespace / Control Prefix</td><td><code>/%09/attacker.tld</code></td><td>{{ $isId ? 'Browser membuang karakter tab/spasi di awal URL.' : 'Browsers strip leading tabs and whitespace in Location.' }}</td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
