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
    <div class="clearfix">
    <div class="float-left">
    <table class="table-surveys">
        <tr>
            <th>Open vragen</th>
        </tr>
        @foreach($oqs as $oq)
            <tr>
                <td>{{$oq->openq_name}}</td>
            </tr>
        @endforeach
    </table>
    </div>
    <div class="float-left">
    <table class="table-surveys">
        <tr>
            <th>Dropdown vragen</th>
        </tr>
        @foreach($dpqs as $dq)
            <tr>
                <td>{{$dq->dropdownq_name}}</td>
            </tr>
        @endforeach
    </table>
    </div>
    <div class="float-left">
        <table class="table-surveys">
            <tr>
                <th>Schalen vragen</th>
            </tr>
            @foreach($scaleqs as $sq)
                <tr>
                    <td>{{$sq->scaleq_name}}</td>
                </tr>
            @endforeach
        </table>
    </div>
    <div class="float-left">
        <table class="table-surveys">
            <tr>
                <th>Multiple choice vragen</th>
            </tr>
            @foreach($mpqs as $mq)
                <tr>
                    <td>{{$mq->multiplechoice_name}}</td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
</div>
<hr>
    <div class="float-surveys">
        <a href="/surveys">
            <button type="button" class="btn btn-secondary">Ga terug</button>
        </a>
        <a href="/surveys/edit/{{$survey->id}}">
            <button type="button" class="btn btn-primary">Pas de vragenlijst aan</button>
        </a>
    </div>
@endsection