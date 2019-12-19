@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
<div class="container-admin">
        <form method="get" action="/admin/windex">
            <div class="form-row align-items-end">
                <div class="form-group col-sm-3">
                    <a href="{{ url('/admin/create') }}">
                        <button id="addbtn" type="button" class="btn btn-primary">
                            Toevoegen
                        </button>
                    </a>
                </div>
                <div class="form-group col-sm-2">
                    <a href="{{ url('/admin/export') }}">
                        <button id="addbtne" type="button" class="btn btn-primary">
                            Export
                        </button>
                    </a>
                </div>
                <div class="form-group col-sm-2">
            <label for="column">Filteren op:</label>
            <select name="column" class="form-control">
                <option>Onderneming</option>
                <option>Ondernemer</option>
                <option>Plaats</option>
                <option>Relatie</option>
                <option>Thema</option>
                <option>Programma</option>
                <option>Huisvesting</option>
                <option>Organisatievorm</option>
            </select>
                </div>
            <div class="form-group col-sm-2">
                <label for="value">Zoeken naar:</label>
                <input type="text" class="form-control" name="value" aria-describedby="value">
            </div>
                <div class="form-group col-sm-2">
            <button type="submit" class="btn btn-primary">Zoeken</button>
                    <a href="/admin/index">
                    <button type="submit" class="btn btn-primary">Toon Alles</button>
                    </a>
                </div>
            </div>
        </form>
    <div>
            <table class="table-admin table-bordered">
                <thead>
                    <tr>
                        <th id="ad-md" >Onderneming</th>
                        <th id="ad-md" >Ondernemer</th>
                        <th id="ad-md" >Telefoonnummer</th>
                        <th id="ad-md" >E-mail</th>
{{--                        <th id="ad-md" >Plaats</th>--}}
                        <th id="ad-md" >Idee</th>
{{--                        <th id="ad-md" >Jaar</th>--}}
{{--                        <th id="ad-md"scope="col">Relatie</th>
                        <th id="ad-md"scope="col">Thema</th>
                        <th id="ad-sm"scope="col">Programma</th>
                        <th id="ad-sm"scope="col">Huisvesting</th>
                        <th id="ad-sm"scope="col">Organisatievorm</th>--}}
                    </tr>
                </thead>
            @foreach ($businesses as $business)
            <div>
                <tr>
                    <td id="ad-td">
                        <a href="/admin/show/{{$business->id}}">
                {{ $business->Onderneming }}
                        </a>
                    </td>
                    <td id="ad-td">
                {{ $business->Ondernemer }}
                    </td>
                    <td id="ad-td">
                {{ $business->Telefoonnummer }}
                    </td>
                    <td id="ad-td">
                {{ $business->Email }}
                    </td>
{{--                    <td id="ad-td">
                {{ $business->Plaats }}
                    </td>--}}
                    <td id="ad-td">
                {{ $business->Idee }}
                    </td>
 {{--                   <td id="ad-td">
                {{ $business->Jaar }}
                    </td>--}}
{{--                    <td id="ad-td">
                {{ $business->Relatie }}
                    </td>
                    <td id="ad-td">
                {{ $business->Thema }}
                    </td>
                    <td id="ad-td">
                {{ $business->Programma }}
                    </td>
                    <td id="ad-td">
                {{ $business->Huisvesting }}
                    </td>
                    <td id="ad-td">
                {{ $business->Organisatievorm }}
                    </td>--}}
                </tr>
                </tr>
            </div>
            @endforeach
            </table>

        {{$businesses->links()}}
    </div>
</div>


@endsection
