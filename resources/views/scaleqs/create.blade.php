@extends('layouts.app')
@extends('layouts.navbar')
@section('content')
<div class="container">
    <form method="GET" action="/store">
        @csrf
        <div class="form-row">
            <div class="form-group col-sm-4">
                <label for="scaleq_name">Wat was de gestelde vraag?</label>
                <input type="text" class="form-control" name="scaleq_name" aria-describedby="scaleq_name"/>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-sm-4">
                <label for="scaleq_name">Hoe scoorde de gestelde vraag op een schaal van 1 op 10?</label>
                <input type="number" name="scaleq_score" min="1" max="10" class="form-control">
            </div>
        </div>
        <hr>
        <div class="form-row">
            <a href="/scaleqs">
                <button type="button" class="btn btn-secondary">Terug</button>
            </a>
                <button type="submit" class="btn btn-primary">Toevoegen</button>
        </div>
    </form>
</div>
@endsection