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
<<<<<<< HEAD
=======
        <div class="row">
            <a href="/surveys">
                <button type="button" class="btn btn-secondary">Ga terug</button>
            </a>
        </div>
>>>>>>> 4bd08c6443f3daace82ddcbb8ce394482e5faab8
    </table>
    <hr>
    <table class="container">
        <tr>
            <th>Vragen die bij deze vragenlijst horen</th>
        </tr>
        @foreach($openqs as $oq)
        <tr>
            <td>{{$oq->openq_name}}</td>
        </tr>
            @endforeach
    </table>
    <hr>
    <div class="row">
            <a href="/surveys">
                <button type="button" class="btn btn-secondary">Ga terug</button>
            </a>
        </div>
@endsection