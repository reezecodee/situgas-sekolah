<div>
    <x-slot name="style">

    </x-slot>

    <x-slot name="header">
        <x-student.navigation.page-header page-pretitle="overview" :page-title="$title" />
    </x-slot>

    <div class="row">
        <div class="col-md-4">
            <!-- Informasi Wali Kelas -->
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    Informasi Wali Kelas
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-center mb-3">
                        <!-- Foto Wali Kelas -->
                        <div class="col-md-5 text-center">
                            <img src="https://via.placeholder.com/150" alt="Foto Wali Kelas"
                                class="img-fluid rounded-circle border">
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <!-- Detail Wali Kelas -->
                        <div class="col-md-9">
                            <p class="card-text">
                                <strong>Kelas:</strong> {{ $class->nama }} <br>
                                <strong>Wali Kelas:</strong> {{ $class->teacher->nama }} <br>
                                <strong>Email:</strong> {{ $class->teacher->user->email }} <br>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <!-- Daftar Siswa -->
            <div class="card">
                <div class="card-header bg-success text-white">
                    Daftar Siswa
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>NIS</th>
                                <th>NISN</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->nis }}</td>
                                    <td>{{ $item->nisn }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <x-slot name="script">

    </x-slot>
</div>
