<div>
    <div class="mb-4 d-flex justify-content-end">
        <a wire:navigate href="{{ route('teacher.task') }}">
            <button class="btn btn-danger">Kembali</button>
        </a>
    </div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Link tugas</th>
            <th scope="col">Status</th>
            <th scope="col">Diupload pada</th>
            <th scope="col">Nilai</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>Otto</td>
            <td>Otto</td>
            <td>
                <input type="text" class="form-control" placeholder="0 - 100">
            </td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>Otto</td>
            <td>Otto</td>
            <td>
                <input type="text" class="form-control" placeholder="0 - 100">
            </td>
          </tr>
        </tbody>
    </table>
</div>
