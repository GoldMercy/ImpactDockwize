@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
<div class="container">
    <form method="GET" action="/scaleqs/update/{{$scaleq->scaleq_id}}">
        @csrf
        <div class="form-row">
            <div class="form-group col-sm-6">
                <label for="scaleq_name">Hoe heet de vraag?</label>
                <input type="text" class="form-control" name="scaleq_name" aria-describedby="openq_name" value="{{$scaleq->scaleq_name}}">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-sm-6">
                <label for="survey_id">Bij welke vragenlijst hoort de vraag?</label>
                <select name="survey_id" class="form-control">
                    @foreach($surveys as $s)
                        @if($s->id == $scaleq->survey_id)
                        <option selected value="{{$s->id}}">{{$s->titel}}</option>
                        @else
                        <option value="{{$s->id}}">{{$s->titel}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <hr>
        <div class="form-group">
            <a href="/scaleqs/show/{{$scaleq->scaleq_id}}">
                <button type="button" class="btn btn-secondary">Ga terug</button>
            </a>
                <button type="submit" class="btn btn-primary">Vraag aanpassen</button>
            <div style="float:right;">
                <a href="delete/{{$scaleq->scaleq_id}}">
                    <button type="button" class="btn btn-danger">Verwijderen</button>
                </a>
            </div>
        </div>
    </form>
</div>
@endsection