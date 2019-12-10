@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
{!! $housingchart->script() !!}
{!! $programmachart->script() !!}
{!! $progroupchart->script() !!}
{!! $orgtypechart->script() !!}
{!! $themachart->script() !!}
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
        {!! $orgtypechart->container() !!}
        {!! $themachart->container() !!}
    </div>
    <div id="impuls" class="department_content">
        <h1>Dit is content voor Impuls.</h1>
    </div>
    <div id="huisvesting" class="department_content">
        {!! $housingchart->container() !!}
    </div>
    <div id="programmas" class="department_content">
        {!! $programmachart->container() !!}
        {!! $progroupchart->container() !!}
    </div>
</div>

@endsection