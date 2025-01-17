<div>
    <x-slot name="style">

    </x-slot>

    <x-slot name="header">
        <x-student.navigation.page-header page-pretitle="overview" :page-title="$title" />
    </x-slot>

    <div class="card">
        <div class="card-body">
            <div class="row g-0">
                <div class="col-3 d-none d-md-block border-end">
                    <x-student.navigation.sidebar />
                </div>
                <div class="col d-flex flex-column">
                    <div class="card-body">
                        <h2 class="mb-4">{{ $title }}</h2>
                        <div class="row">
                            <div class="col-md-4 mb-2">
                                <div class="form-label">Nama</div>
                                <input type="text" class="form-control" value="{{ $userActive->nama }}" readonly>
                            </div>
                            <div class="col-md-4 mb-2">
                                <div class="form-label">Email</div>
                                <input type="text" class="form-control" value="{{ $userActive->user->email }}" readonly>
                            </div>
                            <div class="col-md-4 mb-2">
                                <div class="form-label">Kelas</div>
                                <input type="text" class="form-control"
                                    value="{{ $userActive->classroom->tingkat }} {{ $userActive->classroom->nama }}"
                                    readonly>
                            </div>
                            <div class="col-md-4 mb-2">
                                <div class="form-label">NIS</div>
                                <input type="text" class="form-control" value="{{ $userActive->nis }}" readonly>
                            </div>
                            <div class="col-md-4 mb-2">
                                <div class="form-label">NISN</div>
                                <input type="text" class="form-control" value="{{ $userActive->nisn }}" readonly>
                            </div>
                            <div class="col-md-4 mb-2">
                                <div class="form-label">Tanggal lahir</div>
                                <input type="text" class="form-control" value="{{ $userActive->tgl_lahir }}" readonly>
                            </div>
                            <div class="col-md-4 mb-2">
                                <div class="form-label">Jenis kelamin</div>
                                <input type="text" class="form-control" value="{{ $userActive->jk }}" readonly>
                            </div>
                            <div class="col-md-4 mb-2">
                                <div class="form-label">Alamat</div>
                                <input type="text" class="form-control" value="{{ $userActive->alamat }}" readonly>
                            </div>
                            <div class="col-md-4 mb-2">
                                <div class="form-label">Status</div>
                                <input type="text" class="form-control" value="{{ $userActive->status }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h2 class="mb-4">Ganti Password</h2>
                        <livewire:components.change-password />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-slot name="script">

    </x-slot>
</div>