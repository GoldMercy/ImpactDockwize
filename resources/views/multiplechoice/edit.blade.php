@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
<div class="container">
    <form method="GET" action="/multiplechoice/update/{{$multiplechoice->multiplechoice_id}}">
        @csrf
        <div class="form-row">
            <div class="form-group col-sm-6">
                <label for="multiplechoice_name">Hoe moet de vraag gaan heten?</label>
                <input type="text" class="form-control" name="multiplechoice_name" aria-describedby="multiplechoice_name" value="{{$multiplechoice->multiplechoice_name}}">
            </div>
            </div>
            @foreach($options as $option)
                <div class="form row">
                    <div class="form-group col-sm-6">
                        <label for="multiplechoice_option{{$loop->iteration}}">Optie {{$loop->iteration}}</label>
                        <input type="text" class="form-control" name="multiplechoice_option{{$loop->iteration}}" aria-describedby="multiplechoice_option{{$loop->iteration}}" value="{{$option->multiplechoice_option}}">
                    </div>
                </div>
            @endforeach
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="survey_id">Bij welke vragenlijst hoort de vraag?</label>
                    <select name="survey_id" class="form-control">
                        @foreach($surveys as $s)
                            @if($s->id == $multiplechoice->survey_id)
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
            <a href="/multiplechoice/show/{{$multiplechoice->multiplechoice_id}}">
                <button type="button" class="btn btn-secondary">Ga terug</button>
            </a>
                <button type="submit" class="btn btn-primary">Vraag aanpassen</button>
            <div style="float:right;">
                <a href="delete/{{$multiplechoice->multiplechoice_id}}">
                    <button type="button" class="btn btn-danger">Verwijderen</button>
                </a>
            </div>
        </div>
    </form>
</div>
@endsection
