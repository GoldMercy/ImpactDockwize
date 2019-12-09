@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
<div class="container">
        @csrf
        <div class="form-row">
            <div class="form-group col-sm-6">
                <label for="scaleq_name">Hoe moet de vraag gaan heten?</label>
                <form method="GET" action="/scaleqs/update/{{$sq->id}}">
                    <input type="text" class="form-control" name="scaleq_name" aria-describedby="scaleq_name" value="{{$sq->scaleq_name}}">
                    <input type="hidden" id="survey_id" name="survey_id" value="{{$sq->survey_id}}">
                    <button type="submit" class="btn btn-primary" value="edit">Vraag aanpassen</button>
                </form>
                <form method="GET" action="/scaleqs/add/{{$sq->id}}">
                    <label for="survey_id">Bij welke vragenlijst hoort de vraag?</label>
                    <input type="hidden" id="scaleq_id" name="scaleq_id" value="{{$sq->scaleq_id}}">
                    <input type="hidden" id="id" name="id" value="{{$sq->id}}">
                    <select name="survey_id" class="form-control">
                        @foreach($surs as $sur) @if($sur->id == $sq->survey_id)
                            <option selected value="{{$sur->id}}">{{$sur->titel}}</option>
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
            <a href="/scaleqs/show/{{$sq->id}}">
                <button type="button" class="btn btn-secondary">Ga terug</button>
            </a>
                <a href="delete/{{$sq->id}}">
                    <button onclick="return confirm('Are you sure?')" type="button" class="btn btn-danger">Verwijderen</button>
                </a>

            <div style="float:right;">
                <a href="deleteallsq/{{$sq->id}}">
                    <button onclick="return confirm('Are you sure?')" type="button" class="btn btn-danger">Verwijder vraag uit alle vragenlijsten.</button>
            </div>
        </div>
    </div>
@endsection