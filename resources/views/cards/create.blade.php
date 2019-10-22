@extends('layouts.app')
@extends('layouts.navbar')
@section('content')
<div class="container">
    <form method="GET" action="/cards/store">
        @csrf
        <div class="form-group">
            <div class="form-group col-sm-6">
                <label for="card_question">Hoe heet de kaart?</label>
                <input type="text" class="form-control" name="card_question" aria-describedby="card_question" placeholder="Hoe heet de kaart?">
            </div>
            <div class="form-group col-sm-6">
                <label for="card_response">Wat was het antwoord op de kaart?</label>
                <input type="text" class="form-control" name="card_response" aria-describedby="card_response" placeholder="Wat was het antwoord op de kaart?">
            </div>
        </div>
        <div class="form-group col-sm-6">
            <a href="/cards">
                <button type="button" class="btn btn-secondary">Terug</button>
            </a>
                <button type="submit" class="btn btn-primary">Toevoegen</button>
        </div>
    </form>
</div>
@endsection