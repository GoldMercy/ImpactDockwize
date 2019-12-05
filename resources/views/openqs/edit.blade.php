@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <div class="container">
        @csrf
        <div class="form-row">
            <div class="form-group col-sm-6">
                <label for="openq_name">Hoe moet de vraag gaan heten?</label>
                <form method="GET" action="/openqs/update/{{$openq->id}}">
                    <input type="text" class="form-control" name="openq_name" aria-describedby="openq_name" value="{{$openq->openq_name}}">
                    <input type="hidden" id="survey_id" name="survey_id" value="{{$openq->survey_id}}">
                    <button type="submit" class="btn btn-primary" value="edit">Vraag aanpassen</button>
                </form>
                <form method="GET" action="/openqs/add/{{$openq->id}}">
                    <label for="survey_id">Bij welke vragenlijst hoort de vraag?</label>
                    <input type="hidden" id="openq_id" name="openq_id" value="{{$openq->openq_id}}">
                    <input type="hidden" id="id" name="id" value="{{$openq->id}}">
                    <select name="survey_id" class="form-control">
                        @foreach($surveys as $s) @if($s->id == $openq->survey_id)
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
            <a href="/openqs/show/{{$openq->id}}">
                <button type="button" class="btn btn-secondary">Ga terug</button>
            </a>
            <div style="float:right;">
                <a href="delete/{{$openq->id}}">
                    <button onclick="return confirm('Are you sure?')" type="button" class="btn btn-danger">Verwijder vraag uit geselecteerde vragenlijst.</button>
                </a>
            </div>
            <div style="float:right;">
                <a href="deletealloq/{{$openq->id}}">
                    <button onclick="return confirm('Are you sure?')" type="button" class="btn btn-danger">Verwijder vraag uit alle vragenlijsten.</button>
                </a>
            </div>
        </div>
    </div>
@endsection