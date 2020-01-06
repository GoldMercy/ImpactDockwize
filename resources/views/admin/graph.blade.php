@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <div class="container">
    Omzet van {{$business->Onderneming}}
    {!! $revenuechart->script() !!}

    {!! $revenuechart->container() !!}
        <a href="/admin">
            <button type="button" class="btn btn-secondary">Ga terug</button>
        </a>
    </div>


@endsection