<div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
    <div class="card-header">{{ $title }}</div>
    <div class="card-body">
        @if ($value)
            <h5 class="card-title">{{ $value }}</h5>
        @endif

        @if ($text)
            <p class="card-text">
                <span>{{ $text }}</span>
                @if ($percentageChange)
                    (<span class="{{ $percentageChange > 0 ? 'text-success' : 'text-danger' }}">
                        {{ $percentageChange > 0 ? '+' : '-' }}{{ round($percentageChange, 2) }}%
                    </span>)
                @else ()
                    (<span>
                        <code>null</code>
                    </span>)
                @endif
            </p>
        @endif

        @if ($iconClass)
            <div class="position-absolute top-0 end-0 p-3">
                <i class="{{ $iconClass }} fa-2x {{ $iconColor }}"></i>
            </div>
        @endif
    </div>
</div>
