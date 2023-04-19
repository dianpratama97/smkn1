@extends('layouts.app')
@section('title', 'Pilih Kelas')
@section('content')

    <div class="row">
        <div class="col-sm-6 col-md-4">
            <a style="text-decoration:none" href="/siswa/kelas10">
                <div class="card card-stats card-round">
                    <div class="card-body ">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-primary bubble-shadow-small">
                                    <i class="flaticon-users"></i>
                                </div>
                            </div>
                            <div class="col col-stats ml-3 ml-sm-0">
                                <div class="numbers">
                                    <h3>Kelas 10</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-sm-6 col-md-4">
            <a style="text-decoration:none" href="{{ route('siswa.kelas11') }}">
                <div class="card card-stats card-round">
                    <div class="card-body ">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-warning bubble-shadow-small">
                                    <i class="flaticon-users"></i>
                                </div>
                            </div>
                            <div class="col col-stats ml-3 ml-sm-0">
                                <div class="numbers">
                                    <h3>Kelas 11</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-sm-6 col-md-4">
            <a style="text-decoration:none" href="{{ route('siswa.kelas12') }}">
                <div class="card card-stats card-round">
                    <div class="card-body ">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-success bubble-shadow-small">
                                    <i class="flaticon-users"></i>
                                </div>
                            </div>
                            <div class="col col-stats ml-3 ml-sm-0">
                                <div class="numbers">
                                    <h3>Kelas 12</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div id="jumlah_siswa"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 mt-4">
            <div id="bio10"></div>
        </div>
        <div class="col-md-4 mt-4">
            <div id="bio11"></div>
        </div>
        <div class="col-md-4 mt-4">
            <div id="bio12"></div>
        </div>
    </div>
@endsection

@push('js')
    <script src="https://code.highcharts.com/highcharts.js"></script>
@endpush

@push('js-internal')
    <script>
        //10
        Highcharts.chart('bio10', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'BIODATA SISWA KELAS 10',
                align: 'left'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                    }
                }
            },
            series: [{
                name: 'Brands',
                colorByPoint: true,
                data: [{
                    name: 'BIODATA SUDAH LENGKAP',
                    y: {{ $biodata_kelas10 }},
                    sliced: true,
                    selected: true
                }, {
                    name: 'BIODATA BELUM LENGKAP',
                    y: {{ $biodata_belum_kelas10 }}
                }, ]
            }]
        });

        //11
        Highcharts.chart('bio11', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'BIODATA SISWA KELAS 11',
                align: 'left'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                    }
                }
            },
            series: [{
                name: 'Brands',
                colorByPoint: true,
                data: [{
                    name: 'BIODATA SUDAH LENGKAP',
                    y: {{ $biodata_kelas11 }},
                    sliced: true,
                    selected: true
                }, {
                    name: 'BIODATA BELUM LENGKAP',
                    y: {{ $biodata_belum_kelas11 }}
                }, ]
            }]
        });

        // 12
        Highcharts.chart('bio12', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'BIODATA SISWA KELAS 12',
                align: 'left'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                    }
                }
            },
            series: [{
                name: 'Brands',
                colorByPoint: true,
                data: [{
                    name: 'BIODATA SUDAH LENGKAP',
                    y: {{ $biodata_kelas12 }},
                    sliced: true,
                    selected: true
                }, {
                    name: 'BIODATA BELUM LENGKAP',
                    y: {{ $biodata_belum_kelas12 }}
                }, ]
            }]
        });
    </script>



    <script>
        Highcharts.chart('jumlah_siswa', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Jumlah Siswa SMKN 1 Singkep'
            },
            xAxis: {
                categories: [
                    'Siswa'
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Jumlah Siswa SMKN 1 Singkep'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">Jumlah Siswa</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name} : </td>' +
                    '<td style="padding:0"><b> {point.y:.f} Siswa</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.4,
                    borderWidth: 0
                }
            },
            series: [{
                    name: 'Kelas 10',
                    data: [{{ $kelas10 }}]

                },
                {
                    name: 'Kelas 11',
                    data: [{{ $kelas11 }}]

                },
                {
                    name: 'Kelas 12',
                    data: [{{ $kelas12 }}]

                },
            ]
        });
    </script>
@endpush
