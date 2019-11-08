@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
<div class="container">
    <form method="GET" action="/openqs/store">
        @csrf
        <div class="form-row">
            <div class="form-group col-sm-6">
                <label for="openq_name">Hoe heet de vraag?</label>
                <input type="text" class="form-control" name="openq_name" aria-describedby="openq_name" placeholder="Hoe heet de vraag?">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-sm-6">
                <label for="survey_id">Bij welke vragenlijst hoort de vraag?</label>
                <select name="survey_id" class="form-control">
                    @foreach($surveys as $s)
                        <option value="{{$s->id}}">{{$s->titel}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <hr>
        <div class="form-group col-sm-6">
            <a href="/openqs">
                <button type="button" class="btn btn-secondary">Terug</button>
            </a>
                <button type="submit" class="btn btn-success">Toevoegen</button>
        </div>
    </form>
</div>
@endsection
