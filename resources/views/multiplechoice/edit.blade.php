@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
<div class="container">
        @csrf
        <div class="form-row">
            <div class="form-group col-sm-6">
                <label for="multiplechoice_name">Hoe moet de vraag gaan heten?</label>
                <form method="GET" action="/multiplechoice/update/{{$mp->id}}">
                    <input type="text" class="form-control" name="multiplechoice_name" aria-describedby="multiplechoice_name" value="{{$mp->multiplechoice_name}}">
                    <input type="hidden" id="survey_id" name="survey_id" value="{{$mp->survey_id}}">
                    <button type="submit" class="btn btn-primary" value="edit">Vraag aanpassen</button>
                </form>
                </div>
                </div>
                @foreach($mpos as $mpo)
                    <div class="form row">
                        <div class="form-group col-sm-6">
                            <label for="multiplechoice_option{{$loop->iteration}}">Optie {{$loop->iteration}}</label>
                            <input type="text" class="form-control" name="multiplechoice_option{{$loop->iteration}}" aria-describedby="multiplechoice_option{{$loop->iteration}}" value="{{$mpo->multiplechoice_option}}">
                            <a href="destroympo/{{$mp->id}}">
                                <button onclick="return confirm('Are you sure?')" type="button" class="btn btn-danger">Optie van vraag verwijderen.</button>
                            </a>
                        </div>
                    </div>
                @endforeach
                <form method="GET" action="/multiplechoice/add/{{$mp->id}}">
                    <label for="survey_id">Bij welke vragenlijst hoort de vraag?</label>
                    <input type="hidden" id="multiplechoice_id" name="multiplechoice_id" value="{{$mp->multiplechoice_id}}">
                    <input type="hidden" id="id" name="id" value="{{$mp->id}}">
                    <select name="survey_id" class="form-control">
                        @foreach($surs as $sur)
                            @if($sur->id == $mp->survey_id)
                                <option selected value="{{$sur->id}}">{{$sur->titel}}</option>
                            @else
                                <option value="{{$sur->id}}">{{$sur->titel}}</option>
                            @endif
                        @endforeach
                    </select>
                    <button class="btn btn-primary" name="action" value="add">Toevoegen</button>
                </form>
        <hr>
        <div class="form-group">
            <a href="/multiplechoice/show/{{$mp->id}}">
                <button type="button" class="btn btn-secondary">Ga terug</button>
            </a>
            <div style="float:right;">
                <a href="delete/{{$mp->id}}">
                    <button onclick="return confirm('Are you sure?')" type="button" class="btn btn-danger">Verwijder vraag uit geselecteerde vragenlijst.</button>
                </a>
            </div>
                <div style="float:right;">
                <a href="deleteallmpq/{{$mp->id}}">
                    <button onclick="return confirm('Are you sure?')" type="button" class="btn btn-danger">Verwijder vraag uit alle vragenlijsten.</button>
                </a>
                <a href="delete/{{$mp->id}}">
                    <button onclick="return confirm('Are you sure?')" type="button" class="btn btn-danger">Verwijderen</button>
                </a>
                </div>
            </div>
    </div>
@endsection
