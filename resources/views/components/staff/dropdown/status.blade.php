<div class="dropdown">
    <button class="btn btn-{{ $btnClass }} dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        {{ $status }}
    </button>
    <ul class="dropdown-menu">
        @if ($status != 'Aktif')
            <li>
                <form method="POST" action="{{ route($routeName, ['id' => $id, 'status' => 'Aktif']) }}">
                    @csrf
                    <button type="submit" class="dropdown-item">Ubah ke Aktif</button>
                </form>
            </li>
        @endif
        @if ($status != 'Tidak aktif')
        <li>
            <form method="POST" action="{{ route($routeName, ['id' => $id, 'status' => 'Tidak aktif']) }}">
                @csrf
                <button type="submit" class="dropdown-item">Ubah ke Tidak aktif</button>
            </form>
        </li>
        @endif
    </ul>
</div>

