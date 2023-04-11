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
        <div class="col-md-4">
            <div id="kelas10"></div>
        </div>
        <div class="col-md-4">
            <div id="kelas11"></div>
        </div>
        <div class="col-md-4">
            <div id="kelas12"></div>
        </div>
    </div>
@endsection

@push('js')
    <script src="https://code.highcharts.com/highcharts.js"></script>
@endpush

@push('js-internal')
    <script>
        Highcharts.chart('kelas10', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Jumlah Siswa kelas 10'
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
                    text: 'Jumlah Siswa Kelas 10'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">Jumlah Siswa</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.f} Siswa</b></td></tr>',
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

            }, ]
        });

        Highcharts.chart('kelas11', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Jumlah Siswa Kelas 11'
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
                    text: 'Jumlah Siswa Kelas 11'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">Jumlah Siswa</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.f} Siswa</b></td></tr>',
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
                name: 'Kelas 11',
                data: [{{ $kelas11 }}]

            }, ]
        });

        Highcharts.chart('kelas12', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Jumlah Siswa Kelas 12'
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
                    text: 'Jumlah Siswa Kelas 12'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">Jumlah Siswa</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.f} Siswa</b></td></tr>',
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
                name: 'Kelas 12',
                data: [{{ $kelas12 }}]

            }, ]
        });
    </script>
@endpush
