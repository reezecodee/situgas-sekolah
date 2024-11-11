<li class="sidebar-item {{ Request::is("staff/{$pageTarget}*") ? 'active' : '' }}">
    <a class="sidebar-link" href="{{ $href ?: url("staff/{$pageTarget}") }}" aria-expanded="false">
        <span>
            <i class="ti {{ $icon }}"></i>
        </span>
        <span class="hide-menu">
            {{ $slot }}
        </span>
    </a>
</li>
