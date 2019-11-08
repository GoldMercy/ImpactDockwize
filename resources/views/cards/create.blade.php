@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
<div class="container">
    <form method="GET" action="/cards/store">
        @csrf
        <div class="form-group">
            <div class="form-group col-sm-6">
                <label for="card_question">Wat was de vraag op de kaart?</label>
                <input type="text" class="form-control" name="card_question" aria-describedby="card_question" placeholder="Wat was de vraag op de kaart?">
            </div>
            <div class="form-group col-sm-6">
                <label for="card_response">Wat was het antwoord op de kaart?</label>
                <input type="text" class="form-control" name="card_response" aria-describedby="card_response" placeholder="Wat was het antwoord op de kaart?">
            </div>
        </div>
        <hr>
        <div class="form-group col-sm-6">
            <a href="/cards">
                <button type="button" class="btn btn-secondary">Ga terug</button>
            </a>
                <button type="submit" class="btn btn-success">Toevoegen</button>
        </div>
    </form>
</div>
@endsection