@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
<div class="container">
    <a href="/questions">
        <button class='btn btn-primary'>Beheer uw vragen!</button>
    </a>
    <a href="/surveys">
        <button class='btn btn-primary'>Beheer uw vragenlijsten!</button>
    </a>
</div>
@endsection