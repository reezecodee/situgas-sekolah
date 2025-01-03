<div>
    <x-slot name="header">
        <x-student.navigation.page-header page-pretitle="overview" :page-title="$title">
        </x-student.navigation.page-header>
    </x-slot>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div id="main" style="width: 600px; height: 400px;"></div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <img src="https://via.placeholder.com/150" alt="Foto Wali Kelas" class="rounded-circle mb-3"
                            style="width: 100px; height: 100px; object-fit: cover;">
                        <h5>Nama Wali Kelas</h5>
                        <p class="text-muted">{{ $class->teacher->nama }}</p>
                        <h5>Kelas</h5>
                        <p class="text-muted">{{ $class->tingkat }} {{ $class->nama }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @php
    $chartData = collect($totalAssignments)->map(function ($item) {
    return [
    'value' => $item['total_tugas'],
    'name' => $item['mapel'],
    ];
    })->values();
    @endphp

    <x-slot name="script">
        <script>
            var chart = echarts.init(document.getElementById('main'));

            var option = {
                title: {
                    text: 'Total Tugas Siswa',
                    subtext: 'Tahun Ajaran Saat Ini',
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
                    name: 'Mata pelajaran',
                    type: 'pie',
                    radius: '50%',
                    data: @json($chartData),
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
</div>