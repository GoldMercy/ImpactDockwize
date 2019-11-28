@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
<div class="container">
    <form method="GET" action="/dropdownqs/update/{{$dpq->dropdownq_id}}">
        @csrf
        <div class="form-row">
            <div class="form-group col-sm-6">
                <label for="dropdownq_name">Hoe moet de vraag gaan heten?</label>
                <input type="text" class="form-control" name="dropdownq_name" aria-describedby="dropdownq_name" value="{{$dpq->dropdownq_name}}">
            </div>
            </div>
            @foreach($dpqos as $dpqo)
                <div class="form row">
                    <div class="form-group col-sm-6">
                        <label for="dropdownoption_name{{$loop->iteration}}">Optie {{$loop->iteration}}</label>
                        <input type="text" class="form-control" name="dropdownoption_name{{$loop->iteration}}" aria-describedby="dropdownoption_name{{$loop->iteration}}" value="{{$option->dropdownoption_name}}">
                    </div>
                </div>
            @endforeach

        @csrf

        <div class="form-row">
            <div class="form-group col-sm-6">
                <label for="openq_name">Hoe moet de vraag gaan heten?</label>
                <form method="GET" action="/dropdownqs/update/{{$dropdownq->id}}">
                    <input type="text" class="form-control" name="dropdownq_name" aria-describedby="dropdownq_name" value="{{$dropdownq->dropdownq_name}}">
                    <input type="hidden" id="survey_id" name="survey_id" value="{{$dropdownq->survey_id}}">
                    <button type="submit" class="btn btn-primary" value="edit">Vraag aanpassen</button>
                </form>
                <form method="GET" action="/dropdownqs/add/{{$dropdownq->id}}">
                    <label for="survey_id">Bij welke vragenlijst hoort de vraag?</label>
                    <input type="hidden" id="dropdownq_id" name="dropdownq_id" value="{{$dropdownq->dropdownq_id}}">
                    <input type="hidden" id="id" name="id" value="{{$dropdownq->id}}">
                    <select name="survey_id" class="form-control">
                        @foreach($surveys as $s) @if($s->id == $dropdownq->survey_id)
                            <option selected value="{{$s->id}}">{{$s->titel}}</option>
                        @else
                            <option value="{{$s->id}}">{{$s->titel}}</option>
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
        </div>
    </div>
@endsection
