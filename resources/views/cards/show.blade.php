@extends('layouts.app')
@extends('layouts.navbar')
@section('content')
<div class="container">
    <h1>{{$card->card_question}}</h1>
    <li><small>Created at {{$card->created_at}}</small></li>
    <li><small>Updated at {{$card->updated_at}}</small></li>
    <hr>
    <h2>Dit was het antwoord op de vraag:</h2>
    <h3>{{$card->card_response}}</h3>
    <hr>
    <div class="row">
        <a href="/cards/edit/{{$card->card_id}}">
            <button type="button" class="btn btn-primary">Pas de kaart aan</button>
        </a>
        <a href="/cards">
            <button type="button" class="btn btn-secondary">Ga terug</button>
        </a>
    </div>
</div>
@endsection