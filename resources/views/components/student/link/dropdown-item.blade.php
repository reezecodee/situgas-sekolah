<a class="dropdown-item {{ Request::is("student/{$pageTarget}*") ? 'active' : '' }}" :href="$href">
    {{ $slot }}
</a>
