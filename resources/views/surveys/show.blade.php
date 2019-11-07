@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
    <table class="container">
        <tr>
            <th>Survey</th>
            <th>beschrijving</th>
        </tr>
        <tr>
            <td>{{$survey->titel}}</td>
            <td>{{$survey->beschrijving}}</td>
        </tr>
        <div class="row">
            <a href="/surveys">
                <button type="button" class="btn btn-secondary">Ga terug</button>
            </a>
            <div class="container container-smaller">
                <div class="col-lg-10 col-lg-offset-1" style="margin-top:20px; text-align: right">
                    <div class="btn-group mb-4">
                        <a href="{{ url('/pdf') }}" class="btn btn-success">Save as PDF</a>
                    </div>
                </div>
            </div>
        </div>
    </table>
    <br>
    <table class="container">
        <tr>
            <th>Vraag</th>
        </tr>
        @foreach($openqs as $oq)
        <tr>
            <td>{{$oq->openq_name}}</td>
        </tr>
            @endforeach
    </table>
@endsection