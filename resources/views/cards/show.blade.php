@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
<div class="container">
    <h1>{{$card->card_question}}</h1>
    <h3>Antwoord: {{$card->card_response}}</h3>
    <hr>
    <div class="form-group">
        <a href="/cards">
            <button type="button" class="btn btn-secondary">Terug</button>
        </a>
        <a href="/cards/edit/{{$card->card_id}}">
            <button type="button" class="btn btn-primary">Pas de kaart aan</button>
        </a>
    </div>
</div>
@endsection