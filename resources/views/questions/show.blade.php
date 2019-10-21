@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
<div class="container">
    <h1>{{$question->questionName}}</h1>
    <h4>{{$question->answer_type}}</h4>
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