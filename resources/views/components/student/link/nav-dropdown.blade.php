<li class="nav-item dropdown {{ Request::is(" student/{$pageTarget}*") ? 'active' : '' }}">
    <button class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="outside"
        role="button" aria-expanded="false">
        <span class="nav-link-icon d-md-none d-lg-inline-block">
            {{ $slot }}
        </span>
        <span class="nav-link-title">
            {{ $title }}
        </span>
    </button>
    <div class="dropdown-menu">
        <div class="dropdown-menu-columns">
            <div class="dropdown-menu-column">
                {{ $subitem }}
            </div>
        </div>
    </div>
</li>