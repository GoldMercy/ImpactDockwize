@extends('layouts.app')
@extends('layouts.navbar')
@section('content')
<div class="container">
    <h1>{{$question->questionName}}</h1>
    <hr>
    <a href="/questions/{{$question->id}}/edit" class="btn btn-primary">Aanpassen</a>
    
    {!!Form::open(['action'=> ['QuestionsController@destroy', $question->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!!Form::close()!!}
</div>
@endsection