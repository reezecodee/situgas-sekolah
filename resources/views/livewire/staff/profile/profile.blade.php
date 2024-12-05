<div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <form id="profileForm">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="name"
                            value="{{ $userActive->nama }}" readonly>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="nuptk" class="form-label">NUPTK</label>
                        <input type="text" class="form-control" id="nuptk"
                            value="{{ $userActive->nuptk }}" readonly>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email"
                            value="{{ $userActive->user->email }}" readonly>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="tgl-lahir" class="form-label">Taggal lahir</label>
                        <input type="text" class="form-control" id="tgl-lahir"
                            value="{{ $userActive->tgl_lahir }}" readonly>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="tgl-lahir" class="form-label">Jenis kelamin</label>
                        <input type="text" class="form-control" id="tgl-lahir"
                            value="{{ $userActive->jk }}" readonly>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="tgl-lahir" class="form-label">Status akun</label>
                        <input type="text" class="form-control" id="tgl-lahir"
                            value="{{ $userActive->status }}" readonly>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <x-slot name="script">

    </x-slot>
</div>
