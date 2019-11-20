@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
<div class="container">
    <form method="GET" action="/dropdownqs/store">
        @csrf
        <div class="form-group">
            <div class="form-row">
            <div class="form-group col-sm-6">
                <label for="dropdownq_name">Hoe heet de dropdown vraag?</label>
                <input type="text" class="form-control" name="dropdownq_name" aria-describedby="dropdownq_name" placeholder="Hoe heet de vraag?">
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
        </div>
        <hr>
        <div class="form-group col-sm-6">
            <a href="/input">
                <button type="button" class="btn btn-secondary">Ga terug</button>
            </a>
                <button type="submit" class="btn btn-success">Toevoegen</button>
        </div>
    </form>
</div>
@endsection
