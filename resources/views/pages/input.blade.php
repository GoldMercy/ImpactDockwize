@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
<div class="container-input">
    <div class="column-manage">
        <h3>Beheren!</h3>
        <p>Beheer hier alle mooie dingen</p>
        <br>
        <ul class="nobull">
            <li><a href="/cards/create"><button class='btn btn-primary' id='addbtn'>Beheer uw fysiek ingevoerde kaartjes!</button></a></li>
            <br>
            <li><a href="/questions"><button class='btn btn-primary' id='addbtn'>Bekijk al uw vragen!</button></a></li>
            <br>
            <li><a href="/surveys"><button class='btn btn-primary' id='addbtn'>Bekijk al uw vragenlijsten!</button></a></li>
            <br>
            <li><a href="/answer/index"><button class='btn btn-primary' id='addbtn'>Vul een vragenlijst in!</button></a></li>
            <br>
            <li><a href="/answer/answerIndex"><button class='btn btn-primary' id='addbtn'>Bekijk ingevulde vragenlijsten! (Admin only)</button></a></li>
        </ul>
    </div>
    <div class="column-add">
        <h3>Voeg iets toe!</h3>
        <p>Voeg een nieuwe vraag toe zodat deze later ingevuld kan worden.</p>
        <ul class="nobull">
            <li><a href="/openqs/create"><button class='btn btn-primary' id='addbtn'>Voeg een open vraag toe!</button></a></li> 
            <br>         
            <li><a href="/scaleqs/create"><button class='btn btn-primary' id='addbtn'>Voeg een schalenvraag toe!</button></a></li>
            <br>
            <li><a href="/dropdownqs/create"><button class='btn btn-primary' id='addbtn'>Voeg een dropdownvraag toe!</button></a></li>
            <br>
            <li><a href="/qoptions/create"><button class='btn btn-primary' id='addbtn'>Voeg een opties voor vragen toe!</button></a></li> 
            <br>
            <li><a href="/surveys/create"><button class='btn btn-primary' id='addbtn'>Voeg een vragenlijst toe!</button></a></li>
            <br>
            <li><a href="/multiplechoice/create"><button class='btn btn-primary' id='addbtn'>Voeg een multiplechoice vraag toe!</button></a></li>
        </ul>
    </div>
</div>
@endsection