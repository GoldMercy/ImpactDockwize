@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
<div class="container">
    <a href="/questions">
        <button class='btn btn-primary'>Beheer uw vragen!</button>
    </a>

    <a href="/cards">
        <button class='btn btn-primary'>Beheer uw fysiek ingevoerde kaartjes!</button>
    </a>
</div>
@endsection