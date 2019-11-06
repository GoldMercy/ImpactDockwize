@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
<div class="container">
    <form method="GET" action="/questions/store">
        @csrf
        <div class="form-row">
            <div class="form-group col-sm-6">
                <label for="questionName">Hoe heet de vraag?</label>
                <input type="text" class="form-control" name="questionName" aria-describedby="questionname" placeholder="Hoe heet de vraag?">
            </div>
            <div class="form-group col-sm-6">
                <label for="answer_type">Wat voor type vraag is het?</label>
                <select name="answer_type" class="form-control">
                    <option value="Dropdown">Dropdown</option>
                    <option value="Meerkeuze">Meerkeuze</option>
                    <option value="Open vraag">Open vraag</option>
                </select>
            </div>
            <div class="col-sm-6">
                <select name="survey_id" class="form-control">
                    @foreach($surveys as $s)
                        <option value="{{$s->id}}">{{$s->titel}}</option>
                        @endforeach
                </select>
            </div>
            <div class="row">
                <a href="/questions">
                    <button type="button" class="btn btn-secondary">Terug</button>
                </a>
                    <button type="submit" class="btn btn-primary">Toevoegen</button>
            </div>
        </div>
    </form>
</div>
@endsection
