@extends('master')



@section('page-title')

    Dashboard

@endsection



@section('content')

    <div class="row">

        @foreach($stations as $station)
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="/stations/{{ $station->name }}">
                            <h5 class="card-title">{{ $station->name }}</h5>
                        </a>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>

                    <div class="card-footer" style="display: block;">
                        <div class="row">

                            <div class="col-sm-2 col-6">
                                <div class="description-block border-right">
                                    <h5 class="description-header">{{ $station->temperature ?? 'N/A' }}°C</h5>
                                    <span class="description-text">Temperature</span>
                                </div>
                            </div>

                            <div class="col-sm-2 col-6">
                                <div class="description-block border-right">
                                    <h5 class="description-header">{{ $station->humidity ?? 'N/A' }}%</h5>
                                    <span class="description-text">Humidity</span>
                                </div>
                            </div>

                            <div class="col-sm-2 col-6">
                                <div class="description-block border-right">
                                    <h5 class="description-header">{{ $station->pressure ?? 'N/A' }}</h5>
                                    <span class="description-text">Pressure</span>
                                </div>
                            </div>

                            <div class="col-sm-2 col-6">
                                <div class="description-block">
                                    <h5 class="description-header">{{ $station->gas ?? 'N/A' }}</h5>
                                    <span class="description-text">Gas</span>
                                </div>
                            </div>

                            <div class="col-sm-2 col-6">
                                <div class="description-block">
                                    <h5 class="description-header">{{ $station->p25 ?? 'N/A' }}</h5>
                                    <span class="description-text">P 2.5</span>
                                </div>
                            </div>

                            <div class="col-sm-2 col-6">
                                <div class="description-block">
                                    <h5 class="description-header">{{ $station->p10 ?? 'N/A' }}</h5>
                                    <span class="description-text">P 10</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
