@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<div class="container">
    <h1>Bekijk alle informatie van bedrijf {{$business->Onderneming}}</h1>
    <table>
        <tr>
            <th style="padding:5px 25px 0 0;">Vragenlijst</th>
            <th style="padding:5px 25px 0 0;">Status</th>
        </tr>
        <tr>
                @foreach($surstats as $surstat)
                <td style="padding:5px 25px 0 0;">{{$surstat->survey_name}}</td>
                <td style="padding:5px 25px 0 0;">{{$surstat->status}}</td>
        </tr>  
        @endforeach
    </table>
    <hr>
    <div class="form-group">
        <a href="/admin">
            <button class="btn btn-secondary">Terug</button>
        </a>
        <a href="/admin/edit/{{$business->id}}">
            <button type="button" class="btn btn-primary">Pas het bedrijf aan</button>
        </a>
    </div>
</div>
@endsection