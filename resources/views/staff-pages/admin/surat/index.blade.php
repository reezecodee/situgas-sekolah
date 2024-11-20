<x-layout.staff :title="$title">
    <div class="row">
        <div class="col-md-6">
            <a href="">
                <div class="card shadow">
                    <div class="card-body bg-primary text-white rounded d-flex align-items-center">
                        <div class="icon-container d-flex justify-content-center align-items-center me-3"
                            style="height: 70px; width: 70px; background-color: rgba(255, 255, 255, 0.2); border-radius: 50%;">
                            <i class="ti ti-user-plus" style="font-size: 24px;"></i>
                        </div>
                        <div>
                            <h5 class="mb-0 text-white fw-bold">Buat Surat Undangan Rapat</h5>
                            <p class="mb-0 text-white-50">Klik untuk memulai membuat surat</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-6">
            <a href="">
                <div class="card shadow">
                    <div class="card-body bg-success text-white rounded d-flex align-items-center">
                        <div class="icon-container d-flex justify-content-center align-items-center me-3"
                            style="height: 70px; width: 70px; background-color: rgba(255, 255, 255, 0.2); border-radius: 50%;">
                            <i class="ti ti-adjustments" style="font-size: 24px;"></i>
                        </div>
                        <div>
                            <h5 class="mb-0 text-white fw-bold">Buat Surat Penyesuaian Mandiri</h5>
                            <p class="mb-0 text-white-50">Klik untuk memulai membuat surat</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <form action="{{ route('cetak') }}" method="get">
        <button type="submit" class="btn btn-primary">Cetak</button>
    </form>
    <x-slot name="script">

    </x-slot>
</x-layout.staff>
