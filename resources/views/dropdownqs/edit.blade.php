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
            @foreach($options as $option)
                <div class="form row">
                    <div class="form-group col-sm-6">
                        <label for="dropdownoption_name{{$loop->iteration}}">Optie {{$loop->iteration}}</label>
                        <input type="text" class="form-control" name="dropdownoption_name{{$loop->iteration}}" aria-describedby="dropdownoption_name{{$loop->iteration}}" value="{{$option->dropdownoption_name}}">
                    </div>
                </div>
            @endforeach
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="survey_id">Bij welke vragenlijst hoort de vraag?</label>
                    <select name="survey_id" class="form-control">
                        @foreach($surveys as $s)
                            @if($s->id == $dpq->survey_id)
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
            <a href="/dropdownqs/show/{{$dpq->dropdownq_id}}">
                <button type="button" class="btn btn-secondary">Ga terug</button>
            </a>
                <button type="submit" class="btn btn-primary">Vraag aanpassen</button>
            <div style="float:right;">
                <a href="delete/{{$dpq->dropdownq_id}}">
                    <button type="button" class="btn btn-danger">Verwijderen</button>
                </a>
            </div>
        </div>
    </form>
</div>
@endsection
