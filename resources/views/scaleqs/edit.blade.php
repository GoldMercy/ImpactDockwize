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
            <a href="/scaleqs/show/{{$scaleq->scaleq_id}}">
                <button type="button" class="btn btn-secondary">Ga terug</button>
            </a>
                <a href="delete/{{$scaleq->scaleq_id}}">
                    <button type="button" class="btn btn-danger">Verwijderen</button>
                </a>
            </div>
        </div>
    </div>
@endsection