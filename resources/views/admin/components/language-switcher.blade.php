<div class="dropdown end-0 rounded-3 language-switcher">
    <button type="button" class="btn btn-secondary dropdown-toggle dropdown-btn" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="{{ asset('images/flags/' . $current_locale . '.svg') }}" alt="{{ $current_locale }}" class="me-2">
        {{ array_search($current_locale, config('app.supported_locales')) }}
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        @foreach($supported_locales as $full_locale_name => $locale)
            @if($locale === $current_locale)
                <li>
                    <a class="dropdown-item active" href="#">
                        <img src="{{ asset('images/flags/' . $locale . '.svg') }}" alt="{{ $locale }}" class="me-2">
                        {{ $full_locale_name }}
                    </a>
                </li>
            @else
                <li>
                    <form method="get" action="{{ route('admin.language.switch', $locale) }}">
                        @csrf
                        <button type="submit" class="dropdown-item">
                            <img src="{{ asset('images/flags/' . $locale . '.svg') }}" alt="{{ $locale }}" class="me-2">
                            {{ $full_locale_name }}
                        </button>
                    </form>
                </li>
            @endif
        @endforeach
    </ul>
</div>
