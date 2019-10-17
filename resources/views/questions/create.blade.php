@extends('layouts.app')
@extends('layouts.navbar')
@section('content')
<div class="container">
    <h1>Voeg een nieuwe vraag toe!</h1>
    {!! Form::open(['action' => 'QuestionsController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('questionName', 'Hoe heet de vraag?')}}
            {{Form::text('questionName', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
            <hr>
            {!! Form::Label('', 'Wat voor type vraag is het?') !!}
            {!! Form::select('answer_type_fk', $answer_type, null, ['class' => 'form-control', 'placeholder' => 'None']) !!}
        </div>
        {{Form::submit('Vraag opslaan', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
</div>
@endsection
