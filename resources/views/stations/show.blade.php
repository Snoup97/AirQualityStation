@extends('master')



@section('custom-css')
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/chart.js/Chart.min.css') }}">
@endsection



@section('custom-js')
    <script src="{{ asset('adminlte/plugins/chart.js/Chart.min.js') }}"></script>

    <script>
        $(function () {
            var temperatureCanvas = $('#temperatureChart').get(0).getContext('2d')
            var humidityCanvas = $('#humidityChart').get(0).getContext('2d')
            var pressureCanvas = $('#pressureChart').get(0).getContext('2d')
            var gasCanvas = $('#gasChart').get(0).getContext('2d')
            var p25Canvas = $('#p25Chart').get(0).getContext('2d')
            var p10Canvas = $('#p10Chart').get(0).getContext('2d')

            var temperatureData = {
                labels: [@foreach($measurements as $measurement) '{{ $measurement->created_at }}', @endforeach],
                datasets: [
                    {
                        label: 'Temperature',
                        backgroundColor: 'rgba(60,141,188,0.9)',
                        borderColor: 'rgba(60,141,188,0.8)',
                        pointRadius: false,
                        pointColor: '#3b8bba',
                        pointStrokeColor: 'rgba(60,141,188,1)',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(60,141,188,1)',
                        data: [@foreach($measurements as $measurement) {{ $measurement->temperature }}, @endforeach]
                    }
                ]
            }

            var humidityData = {
                labels: [@foreach($measurements as $measurement) '{{ $measurement->created_at }}', @endforeach],
                datasets: [
                    {
                        label: 'Humidity',
                        backgroundColor: 'rgba(141,60,188,0.9)',
                        borderColor: 'rgba(141,60,188,0.8)',
                        pointRadius: false,
                        pointColor: '#3b8bba',
                        pointStrokeColor: 'rgba(141,60,188,1)',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(141,60,188,1)',
                        data: [@foreach($measurements as $measurement) {{ $measurement->humidity }}, @endforeach]
                    }
                ]
            }

            var pressureData = {
                labels: [@foreach($measurements as $measurement) '{{ $measurement->created_at }}', @endforeach],
                datasets: [
                    {
                        label: 'Pressure',
                        backgroundColor: 'rgba(60,188,141,0.9)',
                        borderColor: 'rgba(60,188,141,0.8)',
                        pointRadius: false,
                        pointColor: '#3b8bba',
                        pointStrokeColor: 'rgba(60,188,141,1)',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(60,188,141,1)',
                        data: [@foreach($measurements as $measurement) {{ $measurement->pressure }}, @endforeach]
                    }
                ]
            }

            var gasData = {
                labels: [@foreach($measurements as $measurement) '{{ $measurement->created_at }}', @endforeach],
                datasets: [
                    {
                        label: 'Gas',
                        backgroundColor: 'rgba(188,141,60,0.9)',
                        borderColor: 'rgba(188,141,60,0.8)',
                        pointRadius: false,
                        pointColor: '#3b8bba',
                        pointStrokeColor: 'rgba(188,141,60,1)',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(188,141,60,1)',
                        data: [@foreach($measurements as $measurement) {{ $measurement->gas }}, @endforeach]
                    }
                ]
            }

            var p25Data = {
                labels: [@foreach($measurements as $measurement) '{{ $measurement->created_at }}', @endforeach],
                datasets: [
                    {
                        label: 'P2.5',
                        backgroundColor: 'rgba(188,141,60,0.9)',
                        borderColor: 'rgba(188,141,60,0.8)',
                        pointRadius: false,
                        pointColor: '#3b8bba',
                        pointStrokeColor: 'rgba(188,141,60,1)',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(188,141,60,1)',
                        data: [@foreach($measurements as $measurement) {{ $measurement->p25 }}, @endforeach]
                    }
                ]
            }

            var p10Data = {
                labels: [@foreach($measurements as $measurement) '{{ $measurement->created_at }}', @endforeach],
                datasets: [
                    {
                        label: 'P10',
                        backgroundColor: 'rgba(188,141,60,0.9)',
                        borderColor: 'rgba(188,141,60,0.8)',
                        pointRadius: false,
                        pointColor: '#3b8bba',
                        pointStrokeColor: 'rgba(188,141,60,1)',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(188,141,60,1)',
                        data: [@foreach($measurements as $measurement) {{ $measurement->p10 }}, @endforeach]
                    }
                ]
            }

            var areaChartOptions = {
                maintainAspectRatio: false,
                responsive: true,
                legend: {
                    display: false
                },
                scales: {
                    xAxes: [{
                        gridLines: {
                            display: false,
                        }
                    }],
                    yAxes: [{
                        gridLines: {
                            display: false,
                        }
                    }]
                }
            }

            // This will get the first returned node in the jQuery collection.
            var temperatureChart = new Chart(temperatureCanvas, {
                type: 'line',
                data: temperatureData,
                options: areaChartOptions
            })
            var humidityChart = new Chart(humidityCanvas, {
                type: 'line',
                data: humidityData,
                options: areaChartOptions
            })
            var pressureChart = new Chart(pressureCanvas, {
                type: 'line',
                data: pressureData,
                options: areaChartOptions
            })
            var gasChart = new Chart(gasCanvas, {
                type: 'line',
                data: gasData,
                options: areaChartOptions
            })
            var p25Chart = new Chart(p25Canvas, {
                type: 'line',
                data: p25Data,
                options: areaChartOptions
            })
            var p10Chart = new Chart(p10Canvas, {
                type: 'line',
                data: p10Data,
                options: areaChartOptions
            })
        })
    </script>
@endsection



@section('page-title')

    {{ $station }}

@endsection



@section('content')


    <div class="row">
        @if(count($measurements))
            <div class="col-md-6">

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Temperature</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                    class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <div class="chartjs-size-monitor">
                                <div class="chartjs-size-monitor-expand">
                                    <div class=""></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink">
                                    <div class=""></div>
                                </div>
                            </div>
                            <canvas id="temperatureChart"
                                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 763px;"
                                    width="763" height="250" class="chartjs-render-monitor"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Humidity</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                    class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <div class="chartjs-size-monitor">
                                <div class="chartjs-size-monitor-expand">
                                    <div class=""></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink">
                                    <div class=""></div>
                                </div>
                            </div>
                            <canvas id="humidityChart"
                                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 763px;"
                                    width="763" height="250" class="chartjs-render-monitor"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Pressure</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                    class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <div class="chartjs-size-monitor">
                                <div class="chartjs-size-monitor-expand">
                                    <div class=""></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink">
                                    <div class=""></div>
                                </div>
                            </div>
                            <canvas id="pressureChart"
                                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 763px;"
                                    width="763" height="250" class="chartjs-render-monitor"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Gas</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                    class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <div class="chartjs-size-monitor">
                                <div class="chartjs-size-monitor-expand">
                                    <div class=""></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink">
                                    <div class=""></div>
                                </div>
                            </div>
                            <canvas id="gasChart"
                                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 763px;"
                                    width="763" height="250" class="chartjs-render-monitor"></canvas>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">P2.5</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                    class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <div class="chartjs-size-monitor">
                                <div class="chartjs-size-monitor-expand">
                                    <div class=""></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink">
                                    <div class=""></div>
                                </div>
                            </div>
                            <canvas id="p25Chart"
                                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 763px;"
                                    width="763" height="250" class="chartjs-render-monitor"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">P10</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                    class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <div class="chartjs-size-monitor">
                                <div class="chartjs-size-monitor-expand">
                                    <div class=""></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink">
                                    <div class=""></div>
                                </div>
                            </div>
                            <canvas id="p10Chart"
                                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 763px;"
                                    width="763" height="250" class="chartjs-render-monitor"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="col-sm-12">
                <h5>
                    No Measurements yet by this Station
                </h5>
            </div>
        @endif
    </div>

@endsection
