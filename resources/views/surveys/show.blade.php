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