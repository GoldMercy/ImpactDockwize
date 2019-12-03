@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
<div class="container">
        <form method="GET" action="/admin/store">
            @csrf
            <div class="form-row">
            <div class="form-group col-sm-6">
                <label for="Ondernemer">Ondernemer</label>
                <input type="text" class="form-control" name="Ondernemer" aria-describedby="ondernemer" placeholder="Naam Ondernemer">
            </div>
            <div class="form-group col-sm-6">
                <label for="Onderneming">Onderneming</label>
                <input type="text" class="form-control" name="Onderneming" placeholder="Naam Onderneming">
            </div>
            </div>
            <div class="form-row">
            <div class="form-group col-sm-3">
                <label for="Telefoonnummer">Telefoonnummer</label>
                <input type="text" class="form-control" name="Telefoonnummer" placeholder="Telefoonnummer">
            </div>
            <div class="form-group col-sm-3">
                <label for="Plaats">Plaats</label>
                <input type="text" class="form-control" name="Plaats" placeholder="Plaats">
            </div>
            <div class="form-group col-sm-6">
                <label for="Email">E-mail</label>
                <input type="email" class="form-control" name="Email" placeholder="E-mail">
            </div>
            </div>
            <div class="form-row">
            <div class="form-group col-sm-6">
                <label for="Idee">Idee</label>
                <input type="text" class="form-control" name="Idee" placeholder="Korte omschrijving idee">
            </div>
            <div class="form-group col-sm-3">
                <label for="Jaar">Jaar</label>
                <input type="text" class="form-control" name="Jaar" placeholder="Jaar van deelname">
            </div>
            <div class="form-group col-sm-3">
                <label for="Relatie">Relatie</label>
                <select name="Relatie" class="form-control">
                    @foreach($relationships as $relationship)
                        <option>{{$relationship->relationship}}</option>
                    @endforeach
                </select>
            </div>
            </div>
            <div class="form-row">
            <div class="form-group col-sm-3">
                <label for="Thema">Thema</label>
                <select name="Thema" class="form-control">
                    @foreach($themes as $theme)
                        <option>{{$theme->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-sm-3">
                <label for="Programma">Programma</label>
                <select name="Programma" class="form-control">
                    @foreach($programs as $program)
                        <option>{{$program->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-sm-3">
                <label for="Huisvesting">Huisvesting</label>
                    <select name="Huisvesting" class="form-control">
                        @foreach($housings as $housing)
                            <option>{{$housing->housing_name}}</option>
                        @endforeach
                    </select>
                </div>
            <div class="form-group col-sm-3">
                    <label for="Organisatievorm">Organisatievorm</label>
                    <select name="Organisatievorm" class="form-control">
                        @foreach($organisation_types as $organisation_type)
                            <option>{{$organisation_type->organisation_type}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-sm-3">
                    <label for="Omzet">Omzet</label>
                    <select name="Omzet" class="form-control">
                            @foreach($revenues as $revenue)
                                <option>{{$revenue->revenue}}</option>
                                @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-1">
            <a href="/admin">
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
