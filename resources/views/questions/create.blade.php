@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
<div class="container">
    <h1>Voeg een nieuwe vraag toe!</h1>
    {!! Form::open(['action' => 'QuestionsController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('questionName', 'Hoe heet de vraag?')}}
            {{Form::text('questionName', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        {{Form::submit('Vraag opslaan', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
</div>
@endsection
