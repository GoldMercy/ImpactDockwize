@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
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
</div>
<br>
<div id="algemeen" class="container department_content">
    <a href="{{url('output/generalpdf')}}" class="btn btn-danger">Print algemene data naar PDF</a>
</div>
<div id="impuls" class="container department_content">
    <a href="{{url('output/impulspdf')}}" class="btn btn-danger">Print Impuls data naar PDF</a>
</div>
<div id="huisvesting" class="container department_content">
    <a href="{{url('output/housingpdf')}}" class="btn btn-danger">Print huisvesting data naar PDF</a>
</div>
<div id="programmas" class="container department_content">
    <a href="{{url('output/programpdf')}}" class="btn btn-danger">Print programma data naar PDF</a>
</div>
@endsection