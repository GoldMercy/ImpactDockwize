@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
<div class="container">
    <form method="GET" action="/cards/update/{{$card->card_id}}">
        @csrf
        <div class="form-group">
            <div class="form-group col-sm-6">
                <label for="card_question">Wat was de vraag op de kaart?</label>
                <input type="text" class="form-control" name="card_question" aria-describedby="card_question" value="{{$card->card_question}}">
            </div>
            <div class="form-group col-sm-6">
                <label for="card_response">Wat was het antwoord op de kaart?</label>
                <input type="text" class="form-control" name="card_response" aria-describedby="card_response" value="{{$card->card_response}}">
            </div>
        </div>
        <hr>
        <div class="form-group">
            <a href="/cards/show/{{$card->card_id}}">
                <button type="button" class="btn btn-secondary">Ga terug</button>
            </a>
                <button type="submit" class="btn btn-primary">Kaart aanpassen</button>
            <div style="float:right;">
                <a href="delete/{{$card->card_id}}">
                    <button type="button" class="btn btn-danger">Verwijderen</button>
                </a>
            </div>
        </div>
    </form>
</div>
@endsection