@extends('layout')
@section('content')
    <table class="table table-striped">
        <thead>
        <tr>
        <th>ID</th>
        <th>Titel</th>
        <th>Beschrijving</th>
        <th>Vragen</th>
        </tr>
        </thead>
        <tbody>
        @foreach($survey as $s)
            <tr>
                <td>{{$s->id}}</td>
                <td>{{$s->titel}}</td>
                <td>{{$s->beschrijving}}</td>
                <td><a href="{{action('OutputController@downloadPDF', $s->id)}}">Download PDF</a></td>
            </tr>
        @endforeach
        </tbody>
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