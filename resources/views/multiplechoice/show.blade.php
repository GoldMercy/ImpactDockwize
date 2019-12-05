@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
<div class="container">
    <h1>{{$multiplechoice->multiplechoice_name}}</h1>
    <table>
        <tr>
            <th>Opties</th>
        </tr>
        @foreach($multiplechoiceoptions as $multiplechoiceoption)
            <tr>
                <td>{{$multiplechoiceoption->multiplechoice_option}}</td>
            </tr>
        @endforeach  
    </table>
    <div class="form-row">
            <div class="form-group col-sm-6">
                <table>
                    <tr>
                        <th>Vragenlijsten waar deze vraag bij hoort!</th>
                    </tr>
                    @foreach($connectedsurveys as $cs)
                        <tr>
                            <td>{{App\Survey::find($cs->survey_id)->titel}}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    <hr>
    <div class="form-group">
        <a href="/questions">
            <button type="button" class="btn btn-secondary">Ga terug</button>
        </a>
        <a href="/multiplechoice/edit/{{$multiplechoice->id}}">
            <button type="button" class="btn btn-primary">Pas de kaart aan</button>
        </a>
    </div>
</div>
@endsection