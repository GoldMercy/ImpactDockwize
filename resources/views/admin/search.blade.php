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
    <div class="row justify-content-center">
        <div class="card card-header">
                <h3>Zoek onderneming</h3>
                <div class="form-group">
                    <input type="text" class="form-controller" id="search" name="search">
                </div>
            <div class="card card-body">
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
</div>
<script type="text/javascript">
    $('#search').on('keyup',function(){
        $value=$(this).val();
        $.ajax({
            type : 'get',
            url : '{{URL::to('search')}}',
            data:{'search':$value},
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
