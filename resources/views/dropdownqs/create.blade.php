@extends('layouts.app')
@extends('layouts.navbar')
@section('content')
<div class="container">
    <form method="GET" action="/dropdownqs/store">
        @csrf
        <div class="form-row">
            <div class="form-group col-sm-6">
                <label for="dropdownq_name">Hoe heet de dropdown vraag?</label>
                <input type="text" class="form-control" name="dropdownq_name" aria-describedby="dropdownq_name" placeholder="Hoe heet de vraag?">
            </div>
        </div>
        <hr>
        <div class="form-row">
            <a href="/dropdownqs">
                <button type="button" class="btn btn-secondary">Terug</button>
            </a>
                <button type="submit" class="btn btn-primary">Toevoegen</button>
        </div>
    </form>
</div>
@endsection
