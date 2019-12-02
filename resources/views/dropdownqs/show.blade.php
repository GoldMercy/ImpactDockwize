@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
<div class="container">
    <h1>{{$dpq->dropdownq_name}}</h1>  
    <table>
        <tr>
            <th>Opties</th>
        </tr>   
        @foreach($dpqo as $do)
            <tr>
                <td>{{$do->dropdownoption_name}}</td>
            </tr>
        @endforeach
    </table>
    <div class="form-row">
            <div class="form-group col-sm-6">
                <table>
                    <tr>
                        <th>Vragenlijsten waar deze vraag bij hoort!</th>
                    </tr>
                    @foreach($css as $cs)
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
        <a href="/dropdownqs/edit/{{$dpq->id}}">
            <button type="button" class="btn btn-primary">Pas de vraag aan</button>
        </a>
    </div>
</div>
@endsection