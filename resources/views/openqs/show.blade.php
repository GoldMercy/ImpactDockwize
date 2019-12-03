@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
<div class="container">
<<<<<<< HEAD
    <h1>{{$openq->openq_name}}</h1>
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
=======
    <h1>{{$oq->openq_name}}</h1>
    <div class="form-row">
            <div class="form-group col-sm-6">
                <table>
                    <tr>
                        <th>Vragenlijsten waar deze vraag bij hoort:</th>
                    </tr>
                    @foreach($css as $cs)
                        <tr>
                            <td>{{App\Survey::find($cs->survey_id)->titel}}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
>>>>>>> cdbe801e2177e0bf85f74a157debd56e6409aa8f
    <hr>
    <div class="form-group">
        <a href="/questions">
            <button type="button" class="btn btn-secondary">Ga terug</button>
        </a>
<<<<<<< HEAD
        <a href="/openqs/edit/{{$openq->id}}">
            <button type="button" class="btn btn-primary">Pas de vraag aan</button>
        </a>
    </div>
=======
        <a href="/openqs/edit/{{$oq->id}}">
            <button type="button" class="btn btn-primary">Pas de vraag aan</button>
        </a>
    </div>

>>>>>>> cdbe801e2177e0bf85f74a157debd56e6409aa8f
</div>
@endsection