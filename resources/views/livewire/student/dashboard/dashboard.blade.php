<div>
    <x-slot name="header">
        <x-student.navigation.page-header page-pretitle="overview" :page-title="$title">
        </x-student.navigation.page-header>
    </x-slot>


    <div class="card">
        <div class="card-body">
            <div id="main" style="height: 400px;"></div>
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