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
    <hr>
    <div class="form-group">
        <a href="/questions">
            <button type="button" class="btn btn-secondary">Ga terug</button>
        </a>
        <a href="/dropdownqs/edit/{{$dpq->dropdownq_id}}">
            <button type="button" class="btn btn-primary">Pas de vraag aan</button>
        </a>
    </div>
</div>
@endsection