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
<br>
<div class="container">
    <h2>Laat data zien:</h2>
    <div class="form-row justify-content-center">
        <div class="form-row col-sm-12">
                <div class="form-group col-sm-2">
                    <label for="datestart">Vanaf datum</label>
                    <input type="date" class="form-control" id="datestart" name="datestart">
                </div>
                <div class="form-group col-sm-2">
                    <label for="dateend">Tot datum</label>
                    <input type="date" class="form-control" id="dateend" name="dateend">
                </div>
                <div class="form-group col-sm-4">
                    <label for="search">Naam ondernemer/onderneming</label>
                    <input type="text" class="form-control" id="search" name="search">
                </div>
        </div>

            <div class="row justify-content-center">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th id="ad-md" scope="col">Gemeten op</th>
                        <th id="ad-md" scope="col">Ondernemer</th>
                        <th id="ad-md" scope="col">Onderneming</th>
                        <th id="ad-md" scope="col">Telefoonnummer</th>
                        <th id="ad-md" scope="col">E-mail</th>
                        <th id="ad-md" scope="col">Plaats</th>
                        <th id="ad-lg" scope="col">Idee</th>
                        <th id="ad-xsm" scope="col">Jaar</th>
                        <th id="ad-md" scope="col">Relatie</th>
                        <th id="ad-md" scope="col">Doelgroep</th>
                        <th id="ad-sm" scope="col">Programma</th>
                        <th id="ad-sm" scope="col">Huisvesting</th>
                        <th id="ad-sm" scope="col">Organisatievorm</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
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
