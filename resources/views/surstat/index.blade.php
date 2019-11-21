@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
<div class="container">
    <h1>Beheer de relaties van bedrijven met vragenlijsten</h1>
    {{-- <table class="table table-bordered">
        <tr>
            <th>Bedrijf</th>
            <th>Vragenlijst</th>
        </tr>
            @foreach($businesses as $bus)
            <tr>
                <td value="{{$bus->id}}">{{$bus->Onderneming}}</td>
            </tr>
            @endforeach
            @foreach($surveys as $sur)
            <tr>
                <td value="{{$sur->id}}">{{$sur->titel}}</td>
            </tr>
            @endforeach
    </table> --}}
<hr>
</div>
@endsection