@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
<div class="container">
        @csrf
    <div class="form-row">
        <div class="form-group col-sm-6">
            <table>
                <tr>
                    <th>Vragenlijsten waar deze vraag bij hoort!</th>
                </tr>
                @foreach($connectedsurveys as $cs)
                    <tr>
                        <td>{{App\Survey::find($cs->survey_id)->titel}}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-sm-6">
            <label for="multiplechoice_name">Hoe moet de vraag gaan heten?</label>
            <form method="GET" action="/multiplechoice/update/{{$multiplechoice->id}}">
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
                <input type="hidden" id="survey_id" name="survey_id" value="{{$multiplechoice->survey_id}}">
                <button type="submit" class="btn btn-primary" value="edit">Vraag aanpassen</button>
            </form>
            <form method="GET" action="/multiplechoice/add/{{$multiplechoice->id}}">
                <label for="survey_id">Bij welke vragenlijst hoort de vraag?</label>
                <input type="hidden" id="multiplechoice_id" name="multiplechoice_id" value="{{$multiplechoice->multiplechoice_id}}">
                <input type="hidden" id="id" name="id" value="{{$multiplechoice->id}}">
                <select name="survey_id" class="form-control">
                    @foreach($surveys as $s) @if($s->id == $multiplechoice->multiplechoice_id)
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
            <a href="/multiplechoice/show/{{$multiplechoice->multiplechoice_id}}">
                <button type="button" class="btn btn-secondary">Ga terug</button>
            </a>
                <a href="delete/{{$multiplechoice->multiplechoice_id}}">
                    <button type="button" class="btn btn-danger">Verwijderen</button>
                </a>
            </div>
        </div>
@endsection
