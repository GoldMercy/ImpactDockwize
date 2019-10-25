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
        <div class="container container-smaller">
            <div class="col-lg-10 col-lg-offset-1" style="margin-top:20px; text-align: right">
                <div class="btn-group mb-4">
                    <a href="{{ url('/pdf') }}" class="btn btn-success">Save as PDF</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection