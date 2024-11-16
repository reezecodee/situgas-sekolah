<x-layout.student :title="$title">
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
                                <strong>Kelas:</strong> XII RPL 1 <br>
                                <strong>Wali Kelas:</strong> Ibu Kartini <br>
                                <strong>Email:</strong> kartini@example.com <br>
                                <strong>No. Telepon:</strong> 0812-3456-7890
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
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Ahmad Fauzi</td>
                                <td>123456</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Siti Nurhaliza</td>
                                <td>123457</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Bagas Saputra</td>
                                <td>123458</td>
                            </tr>
                            <!-- Tambahkan data siswa lainnya -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <x-slot name="script">

    </x-slot>
</x-layout.student>
