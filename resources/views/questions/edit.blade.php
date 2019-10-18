@extends('layouts.app')
@extends('layouts.navbar')
@section('content')
<div class="container">
    <form method="GET" action="/questions/update/{{$question->id}}">
        @csrf
        <div class="form-row">
            <div class="form-group col-sm-6">
                <label for="questionName">Hoe heet de vraag?</label>
                <input type="text" class="form-control" name="questionName" aria-describedby="questionname" placeholder="{{$question->questionName}}">
            </div>
            <div class="form-group col-sm-6">
                <label for="answer_type">Wat voor type vraag is het?</label>
                <select name="answer_type" class="form-control">
                    <option value="Dropdown">Dropdown</option>
                    <option value="Meerkeuze">Meerkeuze</option>
                    <option value="Open vraag">Open vraag</option>
                </select>
            </div>
            <a href="/questions/show/{{$question->id}}">
                <button type="button" class="btn btn-secondary">Terug</button>
            </a>
            <button type="submit" class="btn btn-primary">Aanpassen</button>
            <a href="delete/{{$question->id}}">
                <button type="button" class="btn btn-danger">Verwijderen</button>
            </a>
        </div>
    </form>
</div>
@endsection
