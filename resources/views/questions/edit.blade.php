@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
<div class="container">
    <h1>Pas hier de vraag aan!</h1>
    {!! Form::open(['action' => ['QuestionsController@update', $question->id], 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('questionName', 'Hoe heet de vraag?')}}
            {{Form::text('questionName', $question->questionName, ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Vraag opslaan', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
</div>
@endsection
