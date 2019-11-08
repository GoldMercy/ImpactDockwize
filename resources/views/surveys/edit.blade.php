@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
<div class="container">
    <form method="GET" action="/surveys/store">
        @csrf
        <div class="form-group">
            <div class="form-group col-sm-6">
                <label for="titel">Titel</label>
                <input type="text" class="form-control" name="titel" aria-describedby="titel" value="{{$survey->titel}}">
            </div>
            <div class="form-group col-sm-6">
                <label for="beschrijving">Beschrijving</label>
                <input type="text" class="form-control" name="beschrijving" value="{{$survey->beschrijving}}">
            </div>
        </div>
        <hr>
        <div class="form-group">
            <a href="/surveys/show/{{$survey->id}}">
                <button type="button" class="btn btn-secondary">Ga terug</button>
            </a>
                <button type="submit" class="btn btn-primary">Vragenlijst aanpassen</button>
            <div style="float:right;">
                <a href="destroy/{{$survey->id}}">
                    <button type="button" class="btn btn-danger">Verwijderen</button>
                </a>
            </div>
        </div>
    </form>
</div>
@endsection