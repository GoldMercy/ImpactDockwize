@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
<div class="container">
    <form method="GET" action="/dropdownqs/update/{{$dropdownq->dropdownq_id}}">
        @csrf
        <div class="form-group">
            <div class="form-row">
            <div class="form-group col-sm-6">
                <label for="dropdownq_name">Hoe moet de vraag gaan heten?</label>
                <input type="text" class="form-control" name="dropdownq_name" aria-describedby="dropdownq_name" value="{{$dropdownq->dropdownq_name}}">
            </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="survey_id">Bij welke vragenlijst hoort de vraag?</label>
                    <select name="survey_id" class="form-control">
                        @foreach($surveys as $s)
                            @if($s->id == $dropdownq->survey_id)
                                <option selected value="{{$s->id}}">{{$s->titel}}</option>
                            @else
                                <option value="{{$s->id}}">{{$s->titel}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <hr>
        <div class="form-group">
            <a href="/dropdownqs/show/{{$dropdownq->dropdownq_id}}">
                <button type="button" class="btn btn-secondary">Ga terug</button>
            </a>
                <button type="submit" class="btn btn-primary">Vraag aanpassen</button>
            <div style="float:right;">
                <a href="delete/{{$dropdownq->dropdownq_id}}">
                    <button type="button" class="btn btn-danger">Verwijderen</button>
                </a>
            </div>
        </div>
    </form>
</div>
@endsection
