<li class="nav-item {{ Request::is("student/{$pageTarget}*") ? 'active' : '' }}">
    <a wire:navigate class="nav-link" href="{{ $href }}">
        {{ $slot }}
        <span class="nav-link-title">
            {{ $title }}
        </span>
    </a>
</li>