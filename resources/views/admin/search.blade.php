@extends('layouts.app')
@extends('layouts.sidebar')
<!DOCTYPE html>
<html>
<head>
    <meta name="_token" content="{{ csrf_token() }}">
    <title>Live Search</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
</head>
<body>
<div class="container">
    <div class="form-row justify-content-center">
        <div class="form-row col-sm-12">
                <div class="form-group col-sm-6">
                    <label for="datestart">Vanaf Datum</label>
                    <input type="date" class="form-control" id="datestart" name="datestart">
                </div>
                <div class="form-group col-sm-6">
                    <label for="dateend">Tot Datum</label>
                    <input type="date" class="form-control" id="dateend" name="dateend">
                </div>
        </div>
        <div class="form-row col-sm-12">
                <div class="form-group col-sm-6">
                    <label for="search">Naam Ondernemer/Onderneming</label>
                    <input type="text" class="form-control" id="search" name="search">
                </div>
        </div>

            <div>
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Gemeten op</th>
                        <th>Ondernemer</th>
                        <th>Onderneming</th>
                        <th>Telefoonnummer</th>
                        <th>E-mail</th>
                        <th>Plaats</th>
                        <th>Idee</th>
                        <th>Jaar</th>
                        <th>Thema</th>
                        <th>Doelgroep</th>
                        <th>Programma</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            </div>
    </div>
</div>
<script type="text/javascript">
    $('#search').on('keyup',function(){
        $value=$(this).val();
        $start=$('#datestart').val();
        $end=$('#dateend').val();
        $.ajax({
            type : 'get',
            url : '{{URL::to('search')}}',
            data:{'search':$value, 'datestart':$start, 'dateend':$end},
            success:function(data){
                $('tbody').html(data);
            }
        });
    })
</script>
<script type="text/javascript">
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>
</body>
</html>
