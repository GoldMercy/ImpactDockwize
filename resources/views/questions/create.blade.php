@extends('layouts.app')
@extends('layouts.navbar')
@section('content')
<div class="container">
    <h1>Voeg een nieuwe vraag toe!</h1>
    {!! Form::open(['action' => 'QuestionsController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('questionName', 'Hoe heet de vraag?')}}
            {{Form::text('questionName', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <hr>
        <div class="form-group">
            <h3>Selecteer vraagtype</h3>
            {{Form::label('answerType', 'Wat voor vraag is het?')}}
            {{Form::select('answer_id', $answers, null, ['class' => 'form-control'])}}
        </div>
        {{Form::submit('Vraag opslaan', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
</div>
@endsection
