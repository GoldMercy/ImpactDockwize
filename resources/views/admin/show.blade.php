@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
<div class="container">
    <h1>Bekijk alle informatie van uw bedrijf!</h1>
    <table>
            <tr>
                <th>Vragenlijsten die bij deze organisatie horen</th>
            </tr>
            @foreach($bissurrel as $bsr)
                <tr>
                    <td>{{$bsr->survey_id}}</td>
                </tr>
            @endforeach
        </table>
</div>
@endsection