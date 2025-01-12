@props(['route' => 'admin.dashboard', 'type' => 'solid', 'icon' => 'code', 'label' => 'admin.dashboard.sidebar.buttons.default_label'])

<ul class="nav nav-pills flex-column">
    <li class="nav-item">
        <a href="{{ route($route) }}"
           class="nav-link @if(request()->routeIs($route)) active @endif d-flex align-items-center gap-2">
            <i class=" fa-{{ $type }} fa-{{ $icon }}"></i>
            <span>{{ __($label) }}</span>
        </a>
    </li>
</ul>
