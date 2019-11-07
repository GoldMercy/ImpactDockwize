@extends('layouts.app')
@extends('layouts.navbar')
@section('content')
<div class="container">
    <form method="GET" action="/openqs/update/{{$openq->openq_id}}">
        @csrf
        <div class="form-row">
            <div class="form-group col-sm-6">
                <label for="openq_name">Hoe moet de vraag gaan heten?</label>
                <input type="text" class="form-control" name="openq_name" aria-describedby="openq_name" value="{{$openq->openq_name}}">
            </div>

            <a href="/openqs/show/{{$openq->openq_id}}">
                <button type="button" class="btn btn-secondary">Terug</button>
            </a>
            <button type="submit" class="btn btn-primary">Aanpassen</button>
            <a href="delete/{{$openq->openq_id}}">
                <button type="button" class="btn btn-danger">Verwijderen</button>
            </a>
        </div>
    </form>
</div>
@endsection
