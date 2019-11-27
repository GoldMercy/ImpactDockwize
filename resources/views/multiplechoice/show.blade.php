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
    <hr>
    <div class="form-group">
        <a href="/multiplechoice">
            <button type="button" class="btn btn-secondary">Ga terug</button>
        </a>
        <a href="/multiplechoice/edit/{{$multiplechoice->multiplechoice_id}}">
            <button type="button" class="btn btn-primary">Pas de kaart aan</button>
        </a>
    </div>
</div>
@endsection