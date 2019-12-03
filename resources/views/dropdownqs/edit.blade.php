@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
<div class="container">
<<<<<<< HEAD
    <form method="GET" action="/dropdownqs/update/{{$dpq->dropdownq_id}}">
        <div class="form-row">
            <div class="form-group col-sm-6">
=======
    <form method="GET" action="/dropdownqs/update/{{$dpq->id}}">
        @csrf
        <div class="form-group col-sm-6">
>>>>>>> cdbe801e2177e0bf85f74a157debd56e6409aa8f
                <label for="dropdownq_name">Hoe moet de vraag gaan heten?</label>
                <form method="GET" action="/dropdownqs/update/{{$dpq->id}}">
                    <input type="text" class="form-control" name="dropdownq_name" aria-describedby="dropdownq_name" value="{{$dpq->dropdownq_name}}">
                    <input type="hidden" id="survey_id" name="survey_id" value="{{$dpq->survey_id}}">
                    <button type="submit" class="btn btn-primary" value="edit">Vraag aanpassen</button>
                </form>
            </div>
        </div>
            @foreach($dpqos as $dpqo)
<<<<<<< HEAD
            <div class="form row">
                <div class="form-group col-sm-6">
                    <label for="dropdownoption_name{{$loop->iteration}}">Optie {{$loop->iteration}}</label>
                    <input type="text" class="form-control" name="dropdownoption_name{{$loop->iteration}}" aria-describedby="dropdownoption_name{{$loop->iteration}}" value="{{$dpqo->dropdownoption_name}}">
                    <a href="destroydpo/{{$dpq->id}}">
                        <button type="button" class="btn btn-danger">Optie van vraag verwijderen.</button>
                    </a> 
                </div>
            </div>
        @endforeach
=======
                <div class="form row">
                    <div class="form-group col-sm-6">
                        <label for="dropdownoption_name{{$loop->iteration}}">Optie {{$loop->iteration}}</label>
                        <input type="text" class="form-control" name="dropdownoption_name{{$loop->iteration}}" aria-describedby="dropdownoption_name{{$loop->iteration}}" value="{{$dpqo->dropdownoption_name}}">
                    </div>
                </div>
            @endforeach
>>>>>>> cdbe801e2177e0bf85f74a157debd56e6409aa8f
        @csrf
        <div class="form-row">
            <div class="form-group col-sm-6">
                <form method="GET" action="/dropdownqs/add/{{$dpq->id}}">
                    <label for="survey_id">Bij welke vragenlijst hoort de vraag?</label>
                    <input type="hidden" id="dropdownq_id" name="dropdownq_id" value="{{$dpq->dropdownq_id}}">
                    <input type="hidden" id="id" name="id" value="{{$dpq->id}}">
                    <select name="survey_id" class="form-control">
<<<<<<< HEAD
                        @foreach($surveys as $s) @if($s->id == $dpq->survey_id)
                            <option selected value="{{$s->id}}">{{$s->titel}}</option>
=======
                        @foreach($surs as $sur) @if($sur->id == $dpq->survey_id)
                            <option selected value="{{$sur->id}}">{{$sur->titel}}</option>
>>>>>>> cdbe801e2177e0bf85f74a157debd56e6409aa8f
                        @else
                            <option value="{{$sur->id}}">{{$sur->titel}}</option>
                        @endif
                        @endforeach
                    </select>
                    <button class="btn btn-primary" name="action" value="add">Toevoegen</button>
                </form>
            </div>
        </div>
        <hr>
        <div class="form-group">
            <a href="/dropdownqs/show/{{$dpq->id}}">
                <button type="button" class="btn btn-secondary">Ga terug</button>
            </a>
                <button type="submit" class="btn btn-primary">Vraag aanpassen</button>
            <div style="float:right;">
                <a href="delete/{{$dpq->id}}">
                    <button type="button" class="btn btn-danger">Verwijderen</button>
                </a>
            </div>
            <div style="float:right;">
                <a href="deletealldpq/{{$dpq->id}}">
                    <button type="button" class="btn btn-danger">Verwijder vraag uit alle vragenlijsten.</button>
                </a>
            </div>
        </div>
    </div>
@endsection
