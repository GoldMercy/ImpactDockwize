@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
<div class="container">
    <h1>{{$scaleq->scaleq_name}}</h1>
    <h3>Meest recente score: {{$scaleq->scaleq_score}}</h3>
    <hr>
    <div class="form-group">
        <a href="/scaleqs">
            <button type="button" class="btn btn-secondary">Ga terug</button>
        </a>
        <a href="/scaleqs/edit/{{$scaleq->scaleq_id}}">
            <button type="button" class="btn btn-primary">Pas de vraag aan</button>
        </a>
    </div>
</div>
@endsection