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

                            <div class="col-sm-3 col-6">
                                <div class="description-block border-right">
                                    <h5 class="description-header">{{ $station->temperature }}°C</h5>
                                    <span class="description-text">Temperature</span>
                                </div>
                            </div>

                            <div class="col-sm-3 col-6">
                                <div class="description-block border-right">
                                    <h5 class="description-header">{{ $station->humidity }}%</h5>
                                    <span class="description-text">Humidity</span>
                                </div>
                            </div>

                            <div class="col-sm-3 col-6">
                                <div class="description-block border-right">
                                    <h5 class="description-header">{{ $station->pressure }}</h5>
                                    <span class="description-text">Pressure</span>
                                </div>
                            </div>

                            <div class="col-sm-3 col-6">
                                <div class="description-block">
                                    <h5 class="description-header">{{ $station->gas }}</h5>
                                    <span class="description-text">Gas</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
