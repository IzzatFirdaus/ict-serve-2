@props(['total_users' => 0, 'pending_approvals' => 0])

<div class="fi-overview-widget" role="region" aria-labelledby="overview-title">
    <div class="fi-overview-card">
        <h3 id="overview-title" class="fi-overview-title">{{ __('filament.widget.overview.title') }}</h3>
        <div class="fi-overview-stats">
            <div class="fi-overview-item">
                <p class="fi-overview-label">{{ __('filament.widget.overview.total_users') }}</p>
                <p class="fi-overview-value" role="status" aria-live="polite">{{ $total_users }}</p>
            </div>
            <div class="fi-overview-item">
                <p class="fi-overview-label">{{ __('filament.widget.overview.pending_approvals') }}</p>
                <p class="fi-overview-value" role="status" aria-live="polite">{{ $pending_approvals }}</p>
            </div>
        </div>
    </div>
</div>
