@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script>
    function getSelectedValue() {
        var selectedValue = document.getElementById("status").value;
        console.log(selectedValue);
    }
</script>
<div class="container">
    <h1>Bekijk alle informatie van bedrijf {{$business->Onderneming}}</h1>
    <table>
        <tr>
            <th style="padding:0 25px 0 0;">Vragenlijsten die bij dit bedrijf horen</th>
            <th style="padding:0 25px 0 0;">Status vragenlijst</th>
            <th></th>
        </tr>
        @foreach($surveys as $sur)
            <tr>
                <td style="padding:5px 25px 0 0;">{{$sur->titel}}</td>
                <td style="padding:5px 25px 0 0;">
                    <select name="status" class="form-control" id="status" onchange="getSelectedValue();">
                        <option value="not_sent">Nog niet verstuurd</option>
                        <option value="sent">Verstuurd</option>
                        <option value="received">Ontvangen</option>
                    </select>
                </td>
                <td style="padding:5px 25px 0 0;"></td>
            </tr>
        @endforeach             
    </table>
    <hr>
    <div class="form-row">
        <a href="/admin"><button class="btn btn-secondary">Terug</button></a>
    </div>
</div>
@endsection