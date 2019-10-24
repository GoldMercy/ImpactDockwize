@extends('layouts.app')
@extends('layouts.navbar')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $('.group').hide();
    $('#dropdown').show();
    $('#selectAnsTy').change(function () {
        $('.group').hide();
        $('#'+$(this).val()).show();
    })
});

$(document).ready(function(e) {
    //Variables
    var html = '<p /><div><input type="text" class="form-control" name="answeroption[]" id="answeroption"/><a href="#" id="remove" style="color:black;">Verwijder deze optie.</a></div>';

    //Add rows to the form
    $("#add").click(function(e){ 
        $("#dropdown").append(html);
    });

    //Remove rows from the form
    $("#dropdown").on('click', '#remove', function(e) {
        $(this).parent('div').remove();
    });

});
</script>

<div class="container">
    <form method="GET" action="/questions/store">
        @csrf
        <div class="form-row">
            <div class="form-group col-sm-6">
                <label for="question_name">Hoe heet de vraag?</label>
                <input type="text" class="form-control" name="question_name" aria-describedby="question_name" placeholder="Hoe heet de vraag?">
            </div>
                <div class="form-group col-sm-6">
                    <label for="answer_type">Wat voor type vraag is het?</label>
                    <select id="selectAnsTy" name="answer_type" class="form-control">
                        <option value="dropdown">Dropdown</option>
                        <option value="meerkeuze">Meerkeuze</option>
                        <option value="open vraag">Open vraag</option>
                        <option value="schalenvraag">Schaalvraag</option>
                    </select>
                </div>
                <div>
                    <div id="dropdown" class="group">Uit welke opties moet het antwoord bestaan?
                        <div id="dropdownoption">
                            <label for="answeroption">Antwoordoptie</label>
                            <input type="text" class="form-control" name="answeroption[]" id="answeroption" placeholder="Wat voor antwoordoptie hoort bij deze vraag?"/>
                            <a href="#" id="add" style="color:black;">Voeg een optie toe.</a>
                        </div>
                    </div>
                    <div id="meerkeuze" class="group">Uit welke opties moet het antwoord bestaan?

                    </div>
                    <div id="schalenvraag" class="group">
                        {{Form::label('schale', 'Schaal van 1 op 10')}}
                        {{Form::radio('schale', '1')}} 1
                        {{Form::radio('schale', '2')}} 2
                        {{Form::radio('schale', '3')}} 3
                        {{Form::radio('schale', '4')}} 4
                        {{Form::radio('schale', '5')}} 5
                        {{Form::radio('schale', '6')}} 6
                        {{Form::radio('schale', '7')}} 7
                        {{Form::radio('schale', '8')}} 8
                        {{Form::radio('schale', '9')}} 9
                        {{Form::radio('schale', '10')}} 10
                    </div>  
                </div>
            </div>
            <div class="row">
                <a href="/questions">
                    <button type="button" class="btn btn-secondary">Terug</button>
                </a>
                    <button type="submit" class="btn btn-primary">Toevoegen</button>
            </div>
        </div>
    </form>
</div>
@endsection
