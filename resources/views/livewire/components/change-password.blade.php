<div>
    <form wire:submit.prevent="changePassword">
        <div class="row mb-2">
            <div class="col-md-4 mb-2">
                <div class="form-group">
                    <div class="form-label">Password saat ini</div>
                    <input type="password" class="form-control @error('current_password') is-invalid @enderror"
                        wire:model.blur="current_password" placeholder="Password saat ini">
                    @error('current_password')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 mb-2">
                <div class="form-group">
                    <div class="form-label">Password baru</div>
                    <input type="password" class="form-control @error('new_password') is-invalid @enderror"
                        wire:model.blur="new_password" placeholder="Password baru">
                    @error('new_password')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 mb-2">
                <div class="form-group">
                    <div class="form-label">Konfirmasi password baru</div>
                    <input type="password" class="form-control @error('new_password_confirmation') is-invalid @enderror"
                        wire:model.blur="new_password_confirmation" placeholder="Konfirmasi password">
                    @error('new_password_confirmation')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Ganti Password</button>
        </div>
    </form>
</div>