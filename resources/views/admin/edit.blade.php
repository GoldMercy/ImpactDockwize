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
                <label for="Relatie">Relatie</label>
                <select name="Relatie" class="form-control">
                    @foreach($relationships as $relationship)
                        @if($business->Relatie == $relationship->relationship)
                        <option selected>{{$relationship->relationship}}</option>
                        @else
                            <option>{{$relationship->relationship}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            </div>
            <div class="form-row">
            <div class="form-group col-sm-3">
                <label for="Thema">Thema</label>
                <select name="Thema" class="form-control">
                    @foreach($themes as $theme)
                        @if($business->Thema == $theme->name)
                            <option selected>{{$theme->name}}</option>
                        @else
                        <option>{{$theme->name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group col-sm-3">
                <label for="Programma">Programma</label>
                <select name="Programma" class="form-control">
                    @foreach($programs as $program)
                        @if($business->Programma == $program->name)
                            <option selected>{{$program->name}}</option>
                        @else
                            <option>{{$program->name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
                <div class="form-group col-sm-3">
                    <label for="Huisvesting">Huisvesting</label>
                    <select name="Huisvesting" class="form-control">
                        @foreach($housings as $housing)
                            @if($business->Huisvesting == $housing->housing_name)
                                <option selected>{{$housing->housing_name}}</option>
                            @else
                                <option>{{$housing->housing_name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-sm-3">
                    <label for="Organisatievorm">Organisatievorm</label>
                    <select name="Organisatievorm" class="form-control">
                        @foreach($organisation_types as $organisation_type)
                            @if($business->Organisatievorm == $organisation_type->organisation_type)
                                <option selected>{{$organisation_type->organisation_type}}</option>
                            @else
                                <option>{{$organisation_type->organisation_type}}</option>
                            @endif
                        @endforeach
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
                <div class="p-2">
                    <a href="deleteall/{{$business->id}}">
                        <button type="button" class="btn btn-danger">Verwijder alles</button>
                    </a>
                </div>
            </div>

        </form>
</div>


@endsection
