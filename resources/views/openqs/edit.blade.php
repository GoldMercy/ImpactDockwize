@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
<div class="container">
    <form method="GET" action="/openqs/update/{{$openq->openq_id}}">
        @csrf
        <div class="form-row">
            <div class="form-group col-sm-6">
                <label for="openq_name">Hoe moet de vraag gaan heten?</label>
                <input type="text" class="form-control" name="openq_name" aria-describedby="openq_name" value="{{$openq->openq_name}}">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-sm-6">
                <label for="survey_id">Bij welke vragenlijst hoort de vraag?</label>
                <select name="survey_id" class="form-control">
                    @foreach($surveys as $s)
                        <option value="{{$s->id}}" <?php if($s->id == $openq->survey_id ){ ?> selected="selected" <?php } ?>>{{$s->titel}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <hr>
        <div class="form-group">
            <a href="/openqs/show/{{$openq->openq_id}}">
                <button type="button" class="btn btn-secondary">Ga terug</button>
            </a>
                <button type="submit" class="btn btn-primary">Vraag aanpassen</button>
            <div style="float:right;">
                <a href="delete/{{$openq->openq_id}}">
                    <button type="button" class="btn btn-danger">Verwijderen</button>
                </a>
            </div>
        </div>
    </form>
</div>
@endsection
