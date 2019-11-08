@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
<div class="container">
        <a href="/openqs">
        <button id="input-page-btn" class='btn btn-primary'>Voer een open vraag in!</button>
        </a>
        <a href="/scaleqs">
        <button id="input-page-btn" class='btn btn-primary'>Voer een schalenvraag in!</button>
        </a>
        <a href="/dropdownqs">
        <button id="input-page-btn" class='btn btn-primary'>Voer een dropdownvraag in!</button>
        </a>  
        <a href="/qoptions/create">
        <button id="input-page-btn" class='btn btn-primary'>Voer een opties voor vragen in!</button>
        </a> 
        <a href="/surveys">
        <button id="input-page-btn" class='btn btn-primary'>Beheer uw vragenlijsten!</button>
        </a>
        <a href="/cards">
        <button id="input-page-btn" class='btn btn-primary'>Beheer uw fysiek ingevoerde kaartjes!</button>
        </a>
</div>
@endsection