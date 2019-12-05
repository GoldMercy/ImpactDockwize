@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
<div class="container">
    <table class="container">
        <tr>
            <th>Survey</th>
            <th>beschrijving</th>
        </tr>
        <tr>
            <td>{{$survey->titel}}</td>
            <td>{{$survey->beschrijving}}</td>
        </tr>
    </table>
    <br>
    <table>
        <tr>
            <th>Vragen die bij deze vragenlijst horen</th>
        </tr>
        @foreach($oqs as $oq)
            <tr>
                <td>{{$oq->openq_name}}</td>
            </tr>
        @endforeach
        @foreach($dpqs as $dpq)
            <tr>
                <td>{{$dpq->dropdownq_name}}</td>
            </tr>
        @endforeach
        @foreach($mpqs as $mpq)
            <tr>
                <td>{{$mpq->multiplechoice_name}}</td>
            </tr>
        @endforeach
        @foreach($scaleqs as $sq)
            <tr>
                <td>{{$sq->scaleq_name}}</td>
            </tr>
        @endforeach
    </table>
    <hr>
    <div class="form-group">
        <a href="/surveys">
            <button type="button" class="btn btn-secondary">Terug</button>
        </a>
        <a href="/surveys/edit/{{$survey->id}}">
            <button type="button" class="btn btn-primary">Pas de vragenlijst aan</button>
        </a>
    </div>
</div>
@endsection