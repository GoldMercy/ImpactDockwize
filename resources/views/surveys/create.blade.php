@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
    <head>

    </head>
    <div class="container">
        <form method="GET" action="/surveys/store">
            @csrf
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="Titel">Titel</label>
                    <input type="text" class="form-control" name="Titel" aria-describedby="titel" placeholder="Vragenlijst titel">
                </div>
            </div>
            <div class="form-row">
            <div class="form-group col-sm-6">
                <label for="Beschrijving">Beschrijving</label>
                <input type="text" class="form-control" name="Beschrijving" placeholder="Beschrijving van de vragenlijst">
            </div>
            </div>
            <div class="form-row">
                <table>
                    <tr>
                        <td>questionName</td>
                        <td>id</td>
                    </tr>
                    @foreach($question as $value)
                       <tr>
                           <td>{{$value->questionName}}</td>
                           <td>{{$value->id}}</td>
                       </tr>
                        @endforeach
                </table>
            </div>
            <div class="row">
                <div class="col-sm-1">
                    <a href="/surveys">
                        <button type="button" class="btn btn-secondary">Terug</button>
                    </a>
                </div>
                <div class="col-sm-1">
                    <button type="submit" class="btn btn-primary">Toevoegen</button>
                </div>
            </div>
        </form>
    </div>
@endsection