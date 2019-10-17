@extends('layouts.app')
@extends('layouts.navbar')
@section('content')
<div class="container">
    <h1>{{$question->questionName}}</h1>
    <h1>{{$question->answer_type_fk}}</h1>
    <hr>
    <a href="/questions/{{$question->id}}/edit" class="btn btn-primary">Aanpassen</a>
        {!!Form::open(['action'=> ['QuestionsController@destroy', $question->id], 'method' => 'POST'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
        {!!Form::close()!!}
</div>
@endsection