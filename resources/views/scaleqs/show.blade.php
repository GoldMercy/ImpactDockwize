@extends('layouts.app')
@extends('layouts.navbar')
@section('content')
<div class="container">
    <h1>De vraag was "{{$scaleq->scaleq_name}}"</h1>
    <p>De meeste recente score was {{$scaleq->scaleq_score}}</p>
    <div class="row">
        <a href="/scaleqs/edit/{{$scaleq->scaleq_id}}">
            <button type="button" class="btn btn-primary">Pas de vraag aan</button>
        </a>
        <a href="/scaleqs">
            <button type="button" class="btn btn-secondary">Ga terug</button>
        </a>
    </div>
</div>
@endsection