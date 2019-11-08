@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
    <div class="container">
        <form method="GET" action="/surveys/store">
            @csrf
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="titel">Titel</label>
                    <input type="text" class="form-control" name="titel" aria-describedby="titel" placeholder="Vragenlijst titel">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="beschrijving">Beschrijving</label>
                    <input type="text" class="form-control" name="beschrijving" placeholder="Beschrijving van de vragenlijst">
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-1">
                    <a href="/surveys">
                        <button type="button" class="btn btn-secondary">Terug</button>
                    </a>
                </div>
                <div class="col-sm-1">
                    <button type="submit" class="btn btn-primary">Toevoegen</button>
                </div>
            </div>
        </form>
    </div>
@endsection