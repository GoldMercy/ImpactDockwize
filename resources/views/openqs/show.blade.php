@extends('layouts.app')
@extends('layouts.navbar')
@section('content')
<div class="container">
    <h1>{{$openq->openq_name}}</h1>
    <div class="row">
        <a href="/openqs/edit/{{$openq->openq_id}}">
            <button type="button" class="btn btn-primary">Pas de vraag aan</button>
        </a>
        <a href="/openqs">
            <button type="button" class="btn btn-secondary">Ga terug</button>
        </a>
    </div>
</div>
@endsection