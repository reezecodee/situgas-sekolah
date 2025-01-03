<a wire:navigate class="dropdown-item {{ Request::is("student/{$pageTarget}*") ? 'active' : '' }}" href="{{ $href }}">
    {{ $slot }}
</a>