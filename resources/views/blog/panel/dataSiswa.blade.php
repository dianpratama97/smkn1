<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h1 class="mb-5"><u>DATA SISWA SMKN 1 SINGKEP</u></h1>

            <div class="col-md-12">
                <div id="container"></div>
            </div>
        </div>

    </div>
</div>
@push('js')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/highcharts-3d.js"></script>
    <script src="https://code.highcharts.com/modules/cylinder.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
@endpush
@push('js-internal')
    <script>
        Highcharts.chart('container', {
            chart: {
                type: 'cylinder',
                options3d: {
                    enabled: true,
                    alpha: 15,
                    beta: 15,
                    depth: 100,
                    viewDistance: 25
                }
            },
            title: {
                text: 'Jumlah Siswa SMK Negri 1 Singkep'
            },
            subtitle: {
                text: 'T.A 2022/2023'
            },
            xAxis: {
                categories: ['Kelas 10', 'Kelas 11', 'Kelas 12'],
                title: {
                    margin: 40,
                    text: 'Siswa SMK Negeri 1 Singkep'
                }
            },
            yAxis: {
                title: {
                    margin: 40,
                    text: 'Jumlah Siswa'
                }
            },
            tooltip: {
                headerFormat: '<b>Jumlah: {point.x}</b><br>'
            },
            plotOptions: {
                series: {
                    depth: 100,
                    colorByPoint: true
                }
            },
            series: [{
                data: [{{ jumlah_siswa_kelas10() }}, {{ jumlah_siswa_kelas11() }},
                    {{ jumlah_siswa_kelas12() }}
                ],
                name: 'Cases',
                showInLegend: false
            }]
        });
    </script>
@endpush
