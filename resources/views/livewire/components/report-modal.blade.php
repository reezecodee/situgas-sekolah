<div>
    @if ($student)
        <div
            class="modal fade show d-block"
            tabindex="-1"
            role="dialog"
            style="background: rgba(0, 0, 0, 0.5);"
        >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Cetak Raport</h5>
                        <button
                            type="button"
                            class="btn-close"
                            wire:click="closeModal"
                        ></button>
                    </div>
                    <div class="modal-body">
                        <p>
                            Apakah Anda yakin ingin mencetak raport untuk
                            <strong>{{ $student->name }}</strong>?
                        </p>
                        <p><strong>NIS:</strong> {{ $student->nis }}</p>
                        <p><strong>NISN:</strong> {{ $student->nisn }}</p>
                    </div>
                    <div class="modal-footer">
                        <button
                            type="button"
                            class="btn btn-secondary"
                            wire:click="closeModal"
                        >
                            Batal
                        </button>
                        <button
                            type="button"
                            class="btn btn-primary"
                            wire:click="printReport"
                        >
                            Cetak
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
