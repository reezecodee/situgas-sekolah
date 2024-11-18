<x-layout.staff :title="$title">
    <form action="" method="post">
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="" class="form-label">Judul notifikasi</label>
                    <input type="text" class="form-control" placeholder="Masukkan judul" autocomplete="off"
                        name="judul" required>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="" class="form-label">Pilih penerima</label>
                    <select class="form-select" name="" required>
                        <option>Pilih penerima</option>
                        <option value=""></option>
                    </select>
                </div>
            </div>
            <div class="col-md-12 mb-3">
                <div class="form-group">
                    <label for="" class="form-label">Pesan notifikasi</label>
                    <textarea name="pesan" class="form-control" placeholder="Isi pesan" id="" cols="30" rows="10"></textarea>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Kirim notifikasi</button>
        </div>
    </form>
</x-layout.staff>
