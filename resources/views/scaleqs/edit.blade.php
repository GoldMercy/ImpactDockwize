@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
<div class="container">
        @csrf

        <div class="form-row">
            <div class="form-group col-sm-6">
                <label for="scaleq_name">Hoe moet de vraag gaan heten?</label>
                <form method="GET" action="/scaleqs/update/{{$scaleq->id}}">
                    <input type="text" class="form-control" name="scaleq_name" aria-describedby="scaleq_name" value="{{$scaleq->scaleq_name}}">
                    <input type="hidden" id="survey_id" name="survey_id" value="{{$scaleq->survey_id}}">
                    <button type="submit" class="btn btn-primary" value="edit">Vraag aanpassen</button>
                </form>
                <form method="GET" action="/scaleqs/add/{{$scaleq->id}}">
                    <label for="survey_id">Bij welke vragenlijst hoort de vraag?</label>
                    <input type="hidden" id="scaleq_id" name="scaleq_id" value="{{$scaleq->scaleq_id}}">
                    <input type="hidden" id="id" name="id" value="{{$scaleq->id}}">
                    <select name="survey_id" class="form-control">
                        @foreach($surveys as $s) @if($s->id == $scaleq->survey_id)
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
            <a href="/scaleqs/show/{{$scaleq->id}}">
                <button type="button" class="btn btn-secondary">Ga terug</button>
            </a>
            <div style="float:right;">
                <a href="delete/{{$scaleq->id}}">
                    <button type="button" class="btn btn-danger">Verwijder vraag uit geselecteerde vragenlijst.</button>
                </a>
            </div>
            <div style="float:right;">
                <a href="deleteallsq/{{$scaleq->id}}">
                    <button type="button" class="btn btn-danger">Verwijder vraag uit alle vragenlijsten.</button>
                </a>
            </div>
        </div>
    </div>
@endsection