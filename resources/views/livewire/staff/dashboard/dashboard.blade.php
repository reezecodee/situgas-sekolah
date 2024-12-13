<div>
    @role('Admin')
    <div class="row">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Total Admin</div>
                <div class="card-body -mt-5">
                    <h5 class="card-title fw-bold">{{ $countOfAdmin }}</h5>
                    <p class="card-text">Jumlah admin terdaftar.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Total Guru</div>
                <div class="card-body">
                    <h5 class="card-title fw-bold">{{ $countOfTeacher }}</h5>
                    <p class="card-text">Jumlah guru terdaftar.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header">Total Siswa</div>
                <div class="card-body">
                    <h5 class="card-title fw-bold">{{ $countOfStudent }}</h5>
                    <p class="card-text">Jumlah siswa yang aktif.</p>
                </div>
            </div>
        </div>
    </div>

    <x-slot name="script">
        <script>
            var chart = echarts.init(document.getElementById('main'));

            var option = {
                title: {
                    text: 'Distribusi Penjualan',
                    subtext: 'Data Tahun 2024',
                    left: 'center'
                },
                tooltip: {
                    trigger: 'item'
                },
                legend: {
                    orient: 'vertical',
                    left: 'left'
                },
                series: [{
                    name: 'Penjualan',
                    type: 'pie',
                    radius: '50%',
                    data: [{
                            value: 1048,
                            name: 'Produk A'
                        },
                        {
                            value: 735,
                            name: 'Produk B'
                        },
                        {
                            value: 580,
                            name: 'Produk C'
                        },
                        {
                            value: 484,
                            name: 'Produk D'
                        }
                    ],
                    emphasis: {
                        itemStyle: {
                            shadowBlur: 10,
                            shadowOffsetX: 0,
                            shadowColor: 'rgba(0, 0, 0, 0.5)'
                        }
                    }
                }]
            };

            chart.setOption(option);
        </script>
    </x-slot>
    @endrole
</div>
