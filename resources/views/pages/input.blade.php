@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
<div class="container">
    <a href="/openqs">
        <button class='btn btn-primary'>Beheer uw vragen!</button>
    </a>

    <a href="/cards">
        <button class='btn btn-primary'>Beheer uw fysiek ingevoerde kaartjes!</button>
    </a>

    <a href="/scaleqs">
        <button class='btn btn-primary'>Voer een schalenvraag in!</button>
    </a>
</div>
@endsection