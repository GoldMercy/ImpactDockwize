@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
<div class="container">
        <form method="GET" action="/admin/update/{{$business->id}}">
            @csrf
            <div class="form-row">
            <div class="form-group col-sm-6">
                <label for="Ondernemer">Ondernemer</label>
                <input type="text" class="form-control" name="Ondernemer" aria-describedby="ondernemer" placeholder="Naam Ondernemer" value="{{$business->Ondernemer}}">
            </div>
            <div class="form-group col-sm-6">
                <label for="Onderneming">Onderneming</label>
                <input type="text" class="form-control" name="Onderneming" placeholder="Naam Onderneming" value="{{$business->Onderneming}}">
            </div>
            </div>
            <div class="form-row">
            <div class="form-group col-sm-3">
                <label for="Telefoonnummer">Telefoonnummer</label>
                <input type="text" class="form-control" name="Telefoonnummer" placeholder="Telefoonnummer" value="{{$business->Telefoonnummer}}">
            </div>
            <div class="form-group col-sm-3">
                <label for="Plaats">Plaats</label>
                <input type="text" class="form-control" name="Plaats" placeholder="Plaats" value="{{$business->Plaats}}">
            </div>
            <div class="form-group col-sm-6">
                <label for="Email">E-mail</label>
                <input type="email" class="form-control" name="Email" placeholder="E-mail" value="{{$business->Email}}">
            </div>
            </div>
            <div class="form-row">
            <div class="form-group col-sm-6">
                <label for="Idee">Idee</label>
                <input type="text" class="form-control" name="Idee" placeholder="Korte omschrijving idee" value="{{$business->Idee}}">
            </div>
            <div class="form-group col-sm-2">
                <label for="Jaar">Jaar</label>
                <input type="text" class="form-control" name="Jaar" placeholder="Jaar van deelname" value="{{$business->Jaar}}">
            </div>
            <div class="form-group col-sm-4">
                <label for="Doelgroep">Doelgroep</label>
                <input type="text" class="form-control" name="Doelgroep" placeholder="Doelgroep" value="{{$business->Doelgroep}}">
            </div>
            </div>
            <div class="form-row">
            <div class="form-group col-sm-3">
                <label for="Thema">Thema</label>
                <select name="Thema" class="form-control">
                    <option selected>Geen</option>
                    <option>ICT</option>
                    <option>Dienstverlening</option>
                    <option>Gezondheid</option>
                    <option>Zorg</option>
                </select>
            </div>
            <div class="form-group col-sm-3">
                <label for="Programma">Programma</label>
                <select name="Programma" class="form-control">
                    <option selected>Geen</option>
                    <option>Kickstarter</option>
                    <option>Accelerator</option>
                    <option>X</option>
                    <option>etc.</option>
                </select>
            </div>
            </div>
            <div class="d-flex">
                <div class="p-2">
            <a href="/admin">
                <button type="button" class="btn btn-secondary">Terug</button>
            </a>
                </div>
                <div class="p-2">
            <button type="submit" class="btn btn-primary" name="action" value="edit">Aanpassen</button>
                </div>
                <div class="p-2">
                        <button type="submit" class="btn btn-primary" name="action" value="archive">Nieuw meetpunt</button>
                </div>
                <div class="ml-auto p-2">
                    <a href="delete/{{$business->id}}">
                        <button type="button" class="btn btn-danger">Verwijderen</button>
                    </a>
                </div>
            </div>

        </form>
</div>


@endsection
