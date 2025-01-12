<div>
    <div class="row align-items-center g-4">
        <div class="col-lg">
            <div class="container-tight">
                <div class="card card-md">
                    <div class="card-body">
                        <h2 class="h2 text-center mb-4">Selamat Datang</h2>
                        @if (session('success') || session()->has('success'))
                        <x-alert.success />
                        @elseif(session('failed') || session()->has('failed'))
                        <x-alert.failed />
                        @endif
                        <form wire:submit.prevent="check">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    placeholder="example@email.com" autocomplete="off" wire:model.lazy="email">
                                @error('email')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label class="form-label">
                                    Password
                                </label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    placeholder="Password" autocomplete="off" wire:model.lazy="password">
                                @error('password')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-footer">
                                <button type="submit" class="btn btn-primary w-100">Masuk</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12"><a href="{{ route('landing') }}" class="btn btn-danger w-100">
                                    Kembali
                                </a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg d-none d-lg-block">
            <img src="/images/auth/login.png" height="300" class="d-block mx-auto" alt="">
        </div>
    </div>
</div>