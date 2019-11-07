@extends('layouts.app')
@extends('layouts.navbar')
@section('content')
<div class="container">
    <form method="GET" action="/dropdownqs/update/{{$dropdownq->dropdownq_id}}">
        @csrf
        <div class="form-row">
            <div class="form-group col-sm-6">
                <label for="dropdownq_name">Hoe moet de vraag gaan heten?</label>
                <input type="text" class="form-control" name="dropdownq_name" aria-describedby="dropdownq_name" value="{{$dropdownq->dropdownq_name}}">
            </div>
        </div>
        <hr>
        <div class="form-row">
            <a href="/dropdownqs/show/{{$dropdownq->dropdownq_id}}">
                <button type="button" class="btn btn-secondary">Terug</button>
            </a>
            <button type="submit" class="btn btn-primary">Aanpassen</button>
            <a href="delete/{{$dropdownq->dropdownq_id}}">
                <button type="button" class="btn btn-danger">Verwijderen</button>
            </a>
        </div>
    </form>
</div>
@endsection
