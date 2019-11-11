@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
<div class="container">
    <form method="GET" action="/scaleqs/update/{{$scaleq->scaleq_id}}">
        @csrf
        <div class="form-group">
            <div class="form-group col-sm-6">
                <label for="scaleq_name">Wat was de gestelde vraag?</label>
                <input type="text" class="form-control" name="scaleq_name" aria-describedby="scaleq_name" value="{{$scaleq->scaleq_name}}"/>
            </div>
            <div class="form-group col-sm-6">
                <label for="scaleq_name">Hoe scoorde de gestelde vraag op een schaal van 1 op 10?</label>
                <input type="number" name="scaleq_score" min="1" max="10" class="form-control" value="{{$scaleq->scaleq_score}}">
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