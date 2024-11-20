<x-layout.student :title="$title">
    <x-slot name="style">

    </x-slot>

    <x-slot name="header">
        <x-student.navigation.page-header page-pretitle="overview" :page-title="$title" />
    </x-slot>

    {{-- your code --}}

    <x-slot name="script">

    </x-slot>
</x-layout.student>

<x-layout.staff :title="$title">
    ppp
</x-layout.staff>

<div class="mb-4 d-flex justify-content-end">
    <a href="">
        <button class="btn btn-primary">Buat Tahun Ajaran Baru</button>
    </a>
</div>


<div class="form-group">
    <label for="" class="form-label">Periode tahun ajaran</label>
    <input type="text" name="tahun-ajaran"
        class="form-control @error('tahun-ajaran') is-invalid @enderror"
        value="{{ old('tahun-ajaran') }}" autocomplete="off" placeholder="Masukkan periode tahun ajaran" required>
    @error('tahun-ajaran')
        <span class="invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label for="" class="form-label">Semester</label>
    <select name="semester" class="form-select @error('semester') is-invalid @enderror" required>
        <option selected {{ old('semester') ? 'value="'.old('semester').'"' : '' }}>{{ old('semester') ? old('semester') : 'Pilih semester' }}</option>
        <option value="Ganjil">Ganjil</option>
        <option value="Genap">Genap</option>
    </select>
    @error('semester')
        <span class="invalid-feedback">{{ $message }}</span>
    @enderror
</div>
