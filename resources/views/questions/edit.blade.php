@extends('layouts.app')
@extends('layouts.navbar')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
    $(document).ready(function () {
    $('.group').hide();
    $('#dropdown').show();
    $('#selectAnsTy').change(function () {
        $('.group').hide();
        $('#'+$(this).val()).show();
    })
    });
</script>
<div class="container">
    <form method="GET" action="/questions/update/{{$question->id}}">
        @csrf
        <div class="form-row">
            <div class="form-group col-sm-6">
                <label for="question_name">Hoe heet de vraag?</label>
                <input type="text" class="form-control" name="question_name" aria-describedby="question_name" value="{{$question->question_name}}">
            </div>
            <div class="form-group col-sm-6">
                <label for="answer_type">Wat voor type vraag is het?</label>
                <select id="selectAnsTy" name="answer_type" class="form-control">
                    <option value="dropdown">Dropdown</option>
                    <option value="meerkeuze">Meerkeuze</option>
                    <option value="open vraag">Open vraag</option>
                </select>
            </div>
            <div>
                <div id="dropdown" class="group">Uit welke opties moet het antwoord bestaan?

                </div>
                <div id="meerkeuze" class="group">Uit welke opties moet het antwoord bestaan?
                        
                </div>
            </div>
            <a href="/questions/show/{{$question->id}}">
                <button type="button" class="btn btn-secondary">Terug</button>
            </a>
            <button type="submit" class="btn btn-primary">Aanpassen</button>
            <a href="delete/{{$question->id}}">
                <button type="button" class="btn btn-danger">Verwijderen</button>
            </a>
        </div>
    </form>
</div>
@endsection
