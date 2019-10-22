@extends('layouts.app')
@extends('layouts.navbar')
@section('content')
<div class="container">
    <h1>{{$question->question_name}}</h1>
    <p>Dit is een {{$question->answer_type}} type vraag.</p>
    <div class="row">
        <a href="/questions/edit/{{$question->id}}">
            <button type="button" class="btn btn-primary">Pas de vraag aan</button>
        </a>
        <a href="/questions">
            <button type="button" class="btn btn-secondary">Ga terug</button>
        </a>
    </div>
</div>
@endsection