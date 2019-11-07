@extends('layouts.app')
@extends('layouts.navbar')
@section('content')
<div class="container">
    <form method="GET" action="/cards/update/{{$card->card_id}}">
        @csrf
        <div class="form-group">
            <div class="form-group col-sm-6">
                <label for="card_question">Hoe heette de kaart?</label>
                <input type="text" class="form-control" name="card_question" aria-describedby="card_question" value="{{$card->card_question}}">
            </div>
            <div class="form-group col-sm-6">
                <label for="card_response">Wat was het antwoord op de kaart?</label>
                <input type="text" class="form-control" name="card_response" aria-describedby="card_response" value="{{$card->card_response}}">
            </div>
        </div>
        <div class="form-group col-sm-6">
            <a href="/cards/show/{{$card->card_id}}">
                <button type="button" class="btn btn-secondary">Terug</button>
            </a>
                <button type="submit" class="btn btn-primary">Kaart aanpassen</button>
            <a href="delete/{{$card->card_id}}">
                <button type="button" class="btn btn-danger">Verwijderen</button>
            </a>
        </div>
    </form>
</div>
@endsection