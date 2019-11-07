@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
<div class="container">
    <h3>Dropdown vraag</h3>     
    <h3>{{$dropdownq->dropdownq_name}}</h3>  
</div>
<div class="container">
    <table class="container">
        <tr>
            <th>Opties</th>
        </tr>
        @foreach($qoptions as $qo)
        <tr>
            <td>{{$qo->option_name}}</td>
        </tr>
        @endforeach
    </table>

    <a href="/dropdownqs/edit/{{$dropdownq->dropdownq_id}}">
        <button type="button" class="btn btn-primary">Pas de vraag aan</button>
    </a>
</div>
@endsection