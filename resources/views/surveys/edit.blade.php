@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
<div class="container">
    <form method="GET" action="/surveys/update/{{$survey->id}}">
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
        @foreach($oqs as $oq)
            <div class="form row">
                <div class="form-group col-sm-6">
                    <label for="openq_name{{$loop->iteration}}">Open vraag {{$loop->iteration}}</label>
                    <input type="text" class="form-control" name="openq_name{{$loop->iteration}}" aria-describedby="openq_name{{$loop->iteration}}" value="{{$oq->openq_name}}">
                </div>
            </div>
        @endforeach
        @foreach($scaleqs as $sq)
            <div class="form row">
                <div class="form-group col-sm-6">
                    <label for="scaleq_name{{$loop->iteration}}">Schalenvraag {{$loop->iteration}}</label>
                    <input type="text" class="form-control" name="scaleq_name{{$loop->iteration}}" aria-describedby="scaleq_name{{$loop->iteration}}" value="{{$sq->scaleq_name}}">
                </div>
            </div>
        @endforeach
        @foreach($dpqs as $dpq)
            <div class="form row">
                <div class="form-group col-sm-6">
                    <label for="dropdownq_name{{$loop->iteration}}">Dropdown vraag {{$loop->iteration}}</label>
                    <input type="text" class="form-control" name="dropdownq_name{{$loop->iteration}}" aria-describedby="dropdownq_name{{$loop->iteration}}" value="{{$dpq->dropdownq_name}}">
                </div>
            </div>
        @endforeach
        @foreach($mpqs as $mpq)
            <div class="form row">
                <div class="form-group col-sm-6">
                    <label for="multiplechoice_name{{$loop->iteration}}">Multiplechoice vraag {{$loop->iteration}}</label>
                    <input type="text" class="form-control" name="multiplechoice_name{{$loop->iteration}}" aria-describedby="multiplechoice_name{{$loop->iteration}}" value="{{$mpq->multiplechoice_name}}">
                </div>
            </div>
        @endforeach
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