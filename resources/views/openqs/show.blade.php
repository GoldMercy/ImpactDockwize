@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
<div class="container">
    <h1>{{$openq->openq_name}}</h1>
    <hr>
    <div class="form-group">
        <a href="/openqs">
            <button type="button" class="btn btn-secondary">Ga terug</button>
        </a>
        <a href="/openqs/edit/{{$openq->openq_id}}">
            <button type="button" class="btn btn-primary">Pas de vraag aan</button>
        </a>
    </div>
</div>
@endsection