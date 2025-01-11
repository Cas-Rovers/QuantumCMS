<div class="data-card {{ Str::lower($dataCardType) }} rounded-1">
    <div class="p-4">
        <div class="content-wrapper d-flex justify-content-between align-items-center">
            <div class="content d-flex flex-column justify-content-center">
                @isset($title)
                    <span class="title h4">{{ $title }}</span>
                @endisset

                @isset($cardData)
                    <span class="data h2">{{ $cardData }}</span>
                @endisset

                @isset($cardSubData)
                    <span class="sub-data h6">{{ $cardSubData }}</span>
                @endisset
            </div>

            <div class="icon">
                @isset($iconPath)
                    @include($iconPath)
                @elseif(isset($faIcon))
                    <i class="fa-{{ $faIcon }} {{ $iconColor }}"></i>
                @endisset
            </div>
        </div>
    </div>
</div>
