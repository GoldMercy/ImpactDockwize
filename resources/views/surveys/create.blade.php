@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
<div class="container">
    <form method="GET" action="/surveys/store">
        @csrf
        <div class="form-group">
            <div class="form-group col-sm-6">
                <label for="titel">Titel</label>
                <input type="text" class="form-control" name="titel" aria-describedby="titel" placeholder="Vragenlijst titel">
            </div>
            <div class="form-group col-sm-6">
                <label for="beschrijving">Beschrijving</label>
                <input type="text" class="form-control" name="beschrijving" placeholder="Beschrijving van de vragenlijst">
            </div>
        </div>
        <hr>
        <div class="form-group col-sm-6">
            <a href="/input">
                <button type="button" class="btn btn-secondary">Ga terug</button>
            </a>
                <button type="submit" class="btn btn-success">Toevoegen</button>
        </div>
    </form>
</div>
@endsection