@extends('layouts.academy')

@php
    $brandName = config('app.name') ?: 'SecDevLab';
@endphp
@section('title', ($mode === 'report' ? __('academy.certificate.report_title') : __('academy.certificate.cert_title')).' | '.$brandName)

@section('content')
<div class="vla-card no-print" style="margin-bottom:22px">
    <div class="vla-badge-row" style="justify-content:space-between">
        <div class="vla-btn-group">
            <a href="/certificate?mode=certificate" class="vla-btn {{ $mode === 'certificate' ? 'vla-btn--primary' : 'vla-btn--outline' }} vla-btn--sm">{{ __('academy.certificate.switch_cert') }}</a>
            <a href="/certificate?mode=report" class="vla-btn {{ $mode === 'report' ? 'vla-btn--primary' : 'vla-btn--outline' }} vla-btn--sm">{{ __('academy.certificate.switch_report') }}</a>
            <a href="/web-security/dashboard" class="vla-btn vla-btn--outline vla-btn--sm">{{ __('academy.nav.dashboard') }}</a>
        </div>
        <span class="vla-badge vla-badge--accent">{{ __('academy.certificate.print_hint') }}</span>
    </div>
</div>

@if ($mode === 'certificate')
    <div class="vla-certificate-sheet">
        <span class="vla-badge vla-badge--accent">{{ $brandName }}</span>
        <h1 style="margin:16px 0 8px;font-size:2rem">{{ __('academy.certificate.cert_title') }}</h1>
        <p class="vla-muted">{{ __('academy.certificate.presented_to') }}</p>
        <div class="vla-certificate-name">{{ $user->name }}</div>
        <p style="max-width:660px;margin:14px auto;font-size:1.05rem">
            {{ __('academy.certificate.cert_body') }} <strong>{{ $brandName }}</strong>.
        </p>

        <div class="vla-badge-row" style="justify-content:center;margin:20px 0">
            <span class="vla-badge vla-badge--orange">{{ __('academy.certificate.tier_label') }}: {{ $tier }}</span>
            <span class="vla-badge vla-badge--solved">{{ __('academy.certificate.summary_badge', ['solved' => $summary['total_solved'], 'total' => $totalLabs, 'pct' => $completionPct]) }}</span>
            <span class="vla-badge vla-badge--accent">{{ $summary['points'] }} {{ __('academy.certificate.points_label') }}</span>
        </div>

        <div class="vla-certificate-meta">
            <div>
                <div class="vla-muted-sm">{{ __('academy.certificate.verification_id') }}</div>
                <strong><code>{{ $verificationCode }}</code></strong>
            </div>
            <div>
                <div class="vla-muted-sm">{{ __('academy.certificate.issued_date') }}</div>
                <strong>{{ now()->translatedFormat('d F Y') }}</strong>
            </div>
            <div>
                <div class="vla-muted-sm">{{ __('academy.auth.email') }}</div>
                <strong>{{ $user->email }}</strong>
            </div>
            <div>
                <div class="vla-muted-sm">{{ __('academy.certificate.authorized_by') }}</div>
                <strong>{{ $brandName }}</strong>
            </div>
        </div>
    </div>
@else
    <div class="vla-card">
        <div class="vla-badge-row" style="justify-content:space-between;border-bottom:2px solid var(--vla-border);padding-bottom:14px;margin-bottom:18px">
            <div>
                <h1 style="margin:0">{{ __('academy.certificate.report_title') }}</h1>
                <div class="vla-muted-sm">{{ $brandName }} &bull; {{ __('academy.certificate.issued_date') }}: {{ now()->translatedFormat('d F Y H:i') }}</div>
            </div>
            <div class="vla-cert-report-user">
                <strong>{{ $user->name }}</strong> ({{ strtoupper($user->isOwner() ? __('academy.common.role_owner') : __('academy.common.role_user')) }})<br>
                <span class="vla-muted-sm">{{ $user->email }} &bull; <code>{{ $verificationCode }}</code></span>
            </div>
        </div>

        <div class="vla-grid vla-grid--4" style="margin-bottom:22px">
            <div class="vla-stat-box">
                <div class="vla-stat-box__num">{{ $summary['total_solved'] }} / {{ $totalLabs }}</div>
                <div class="vla-stat-box__label">{{ __('academy.certificate.solved_labs_ratio', ['pct' => $completionPct]) }}</div>
            </div>
            <div class="vla-stat-box">
                <div class="vla-stat-box__num">{{ $summary['apprentice'] }}</div>
                <div class="vla-stat-box__label">Apprentice</div>
            </div>
            <div class="vla-stat-box">
                <div class="vla-stat-box__num">{{ $summary['practitioner'] }}</div>
                <div class="vla-stat-box__label">Practitioner</div>
            </div>
            <div class="vla-stat-box">
                <div class="vla-stat-box__num">{{ $summary['expert'] }}</div>
                <div class="vla-stat-box__label">Expert ({{ $summary['points'] }} {{ __('academy.common.pts') }})</div>
            </div>
        </div>

        <h3>{{ __('academy.dashboard.category_breakdown') }}</h3>
        <div class="vla-table-wrap" style="margin-bottom:24px">
            <table class="vla-table">
                <thead>
                    <tr>
                        <th>{{ __('academy.certificate.col_category') }}</th>
                        <th>{{ __('academy.certificate.col_solved') }}</th>
                        <th>{{ __('academy.certificate.col_total') }}</th>
                        <th>{{ __('academy.certificate.col_completion') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categoryBreakdown as $cb)
                        <tr>
                            <td>{{ $cb['title'] }}</td>
                            <td>{{ $cb['solved'] }}</td>
                            <td>{{ $cb['total'] }}</td>
                            <td>{{ $cb['pct'] }}%</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <h3>{{ __('academy.certificate.solved_labs_list') }}</h3>
        <div class="vla-table-wrap">
            <table class="vla-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('academy.certificate.col_lab_title') }}</th>
                        <th>{{ __('academy.certificate.col_category') }}</th>
                        <th>{{ __('academy.certificate.col_difficulty') }}</th>
                        <th>{{ __('academy.certificate.col_completed_at') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($solvedSessions as $idx => $sess)
                        <tr>
                            <td>{{ $idx + 1 }}</td>
                            <td>{{ $sess->lab?->title ?? $sess->lab_id }}</td>
                            <td>{{ $sess->lab?->category?->title ?? '-' }}</td>
                            <td>{{ $sess->lab?->difficulty ?? '-' }}</td>
                            <td>{{ $sess->solved_at?->translatedFormat('d M Y H:i') ?? '-' }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="5">{{ __('academy.dashboard.no_solves') }}</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endif
@endsection
