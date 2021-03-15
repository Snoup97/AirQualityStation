@extends('master')



@section('page-title')

    List of all Measurements

@endsection



@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Measurements</h3>
                </div>

                <div class="card-body p-0">
                    <table class="table table-sm table-hover">
                        <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Station Name</th>
                            <th>Temperature</th>
                            <th>Humidity</th>
                            <th>Pressure</th>
                            <th>Gas</th>
                            <th>P2.5</th>
                            <th>P10</th>
                            <th>Rating</th>
                            <th>Time</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($measurements as $measurement)
                            <tr>
                                <td>{{ $measurement->id }}</td>
                                <td>
                                    <a href="/stations/{{ $measurement->name }}">
                                        {{ $measurement->name }}
                                    </a>
                                </td>
                                <td>{{ $measurement->temperature ?? 'N/A' }}</td>
                                <td>{{ $measurement->humidity ?? 'N/A' }}</td>
                                <td>{{ $measurement->pressure ?? 'N/A' }}</td>
                                <td>{{ $measurement->gas ?? 'N/A' }}</td>
                                <td>{{ $measurement->p25 ?? 'N/A' }}</td>
                                <td>{{ $measurement->p10 ?? 'N/A' }}</td>
                                <td><span class="badge bg-danger">Bad</span></td>
                                <td>{{ $measurement->created_at->diffForHumans() }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
