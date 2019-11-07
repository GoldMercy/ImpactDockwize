@extends('layouts.app')
@extends('layouts.navbar')
@section('content')
<div class="container">
    <form method="GET" action="/openqs/store">
        @csrf
        <div class="form-row">
            <div class="form-group col-sm-6">
                <label for="openq_name">Hoe heet de vraag?</label>
                <input type="text" class="form-control" name="openq_name" aria-describedby="openq_name" placeholder="Hoe heet de vraag?">
            </div>
            <div class="col-sm-6">
                <select name="survey_id" class="form-control">
                    @foreach($surveys as $s)
                        <option placeholder="" value="{{$s->id}}">{{$s->titel}}</option>
                    @endforeach
                </select>
            </div>
            <div class="row">
                <a href="/openqs">
                    <button type="button" class="btn btn-secondary">Terug</button>
                </a>
                    <button type="submit" class="btn btn-primary">Toevoegen</button>
            </div>
        </div>
    </form>
</div>
@endsection
