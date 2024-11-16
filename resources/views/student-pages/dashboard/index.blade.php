<x-layout.student :title="$title">
    <x-slot name="header">
        <x-student.navigation.page-header page-pretitle="overview" :page-title="$title">
            <button class="btn btn-primary">Hello World</button>
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
                    <div id="chart"></div>
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
</x-layout.student>
