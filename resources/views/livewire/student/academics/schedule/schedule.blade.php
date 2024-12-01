<div>
    <x-slot name="style">

    </x-slot>

    <x-slot name="header">
        <x-student.navigation.page-header page-pretitle="overview" :page-title="$title" />
    </x-slot>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        <!-- Card Senin -->
        <div class="col">
            <div class="card border-primary h-100">
                <div class="card-header text-white bg-primary">Senin</div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <strong>Matematika</strong> <br>
                            <small>08:00 - 09:30</small> <br>
                            Guru: Bapak Ahmad
                        </li>
                        <li class="list-group-item">
                            <strong>Sejarah</strong> <br>
                            <small>10:00 - 11:30</small> <br>
                            Guru: Ibu Kartini
                        </li>
                        <li class="list-group-item">
                            <strong>Biologi</strong> <br>
                            <small>12:30 - 14:00</small> <br>
                            Guru: Pak Surya
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Card Selasa -->
        <div class="col">
            <div class="card border-success h-100">
                <div class="card-header text-white bg-success">Selasa</div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <strong>Bahasa Inggris</strong> <br>
                            <small>09:00 - 10:30</small> <br>
                            Guru: Ibu Sarah
                        </li>
                        <li class="list-group-item">
                            <strong>Kimia</strong> <br>
                            <small>11:00 - 12:30</small> <br>
                            Guru: Pak Doni
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Card Rabu -->
        <div class="col">
            <div class="card border-danger h-100">
                <div class="card-header text-white bg-danger">Rabu</div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <strong>Fisika</strong> <br>
                            <small>08:30 - 10:00</small> <br>
                            Guru: Pak Budi
                        </li>
                        <li class="list-group-item">
                            <strong>Seni Budaya</strong> <br>
                            <small>10:30 - 12:00</small> <br>
                            Guru: Bu Ratna
                        </li>
                        <li class="list-group-item">
                            <strong>Pendidikan Jasmani</strong> <br>
                            <small>13:00 - 14:30</small> <br>
                            Guru: Pak Arif
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <x-slot name="script">

    </x-slot>
</div>
