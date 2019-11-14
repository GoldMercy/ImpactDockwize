@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
$(document).ready(function(){
    //hides dropdown content
    $(".department_content").hide();
    //unhides first option content
    $("#algemeen").show();
   //listen to dropdown for change
    $("#department_select").change(function(){
    //rehide content on change
    $('.department_content').hide();
    //unhides current item
    $('#'+$(this).val()).show();
    });

});
</script>
<div class="container">
    <div class="form-group col-sm-6">
        <select id="department_select" class="form-control">
            <option value="algemeen">Algemeen</option>
            <option value="impuls">Impuls</option>
            <option value="huisvesting">Huisvesting</option>
            <option value="programmas">Programma's</option>
        </select>       
    </div>
    <div id="algemeen" class="department_content">
        <h1>Dit is content voor algemene zaken.</h1>
    </div>
    <div id="impuls" class="department_content">
        <h1>Dit is content voor Impuls.</h1>
    </div>
    <div id="huisvesting" class="department_content">
        <h1>Dit is content voor huisvesting.</h1>
        <table class="table table-bordered">
        <thead>
        <tr>
            <th>Type</th>
            <th>Aantal Huurders</th>
        </tr>
        </thead>
            <tr>
                <td>Flex</td>
                <td>{{$businesses->where('Huisvesting', '=', 'Flex')->count()}}</td>
            </tr>
            <tr>
                <td>Kantoor</td>
                <td>{{$businesses->where('Huisvesting', '=', 'Kantoor')->count()}}</td>
            </tr>
            <tr>
                <td>Loodsunit</td>
                <td>{{$businesses->where('Huisvesting', '=', 'Loodsunit')->count()}}</td>
            </tr>
        </table>
    </div>
    <div id="programmas" class="department_content">
        <h1>Dit is content voor programma's.</h1>
    </div>
</div>

@endsection