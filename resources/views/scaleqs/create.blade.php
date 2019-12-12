@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
<div class="container">
    <form method="GET" action="/store">
        @csrf
        <div class="form-row">
            <div class="form-group col-sm-6">
                <label for="scaleq_name">Hoe heet de vraag?</label>
                <input type="text" class="form-control" name="scaleq_name" aria-describedby="scaleq_name" placeholder="Hoe heet de vraag?">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-sm-6">
                <label for="survey_id">Bij welke vragenlijst hoort de vraag?</label>
                <select name="survey_id" class="form-control">
                    @foreach($surveys as $sur)
                        <option value="{{$sur->id}}">{{$sur->titel}}</option>
                    @endforeach
                </select>
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