@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
    <table class="table table-striped">
        <thead>
        <th>ID</th>
        <th>Vraag</th>
        <th>Antwoord type</th>
        <th>Action</th>
        </thead>
    <tbody>
        @foreach($questions as $question)
            <tr>
                <td>{{$question->id}}</td>
                <td>{{$question->questionName}}</td>
                <td>{{$question->answer_type}}</td>
                <td><a href="{{action('QuestionController@downloadPDF', $question->id)}}">Download PDF</a></td>
            </tr>
        @endforeach
    </tbody>
    </table>
@endsection
