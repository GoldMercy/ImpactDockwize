@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
<div class="container-admin">
    <div class="col-sm-1 p-2">
        <a href="{{ url('/admin/create') }}">
            <button id="addbtn" type="button" class="btn btn-primary">
                Toevoegen
            </button>
        </a>
    </div>
    <div class="row justify-content-center">
            <table id="ad-tbl" class="table table-bordered">
                <thead>
                    <tr>
                        <th id="ad-md"scope="col">Onderneming</th>
                        <th id="ad-md"scope="col">Ondernemer</th>
                        <th id="ad-md"scope="col">Telefoonnummer</th>
                        <th id="ad-md"scope="col">E-mail</th>
                        <th id="ad-md"scope="col">Plaats</th>
                        <th id="ad-lg"scope="col">Idee</th>
                        <th id="ad-xsm"scope="col">Jaar</th>
                        <th id="ad-md"scope="col">Relatie</th>
                        <th id="ad-md"scope="col">Thema</th>
                        <th id="ad-sm"scope="col">Programma</th>
                        <th id="ad-sm"scope="col">Huisvesting</th>
                        <th id="ad-sm"scope="col">Organisatievorm</th>
                    </tr>
                </thead>
            @foreach ($businesses as $business)
            <div>
                <tr>
                    <td id="ad-td">
                        <a href="/admin/edit/{{$business->id}}">
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
                    <td id="ad-td">
                {{ $business->Plaats }}
                    </td>
                    <td id="ad-td">
                {{ $business->Idee }}
                    </td>
                    <td id="ad-td">
                {{ $business->Jaar }}
                    </td>
                    <td id="ad-td">
                {{ $business->Doelgroep }}
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
                    </td>
                </tr>
                </tr>
            </div>
            @endforeach
            </table>

        {{$businesses->links()}}
    </div>
</div>


@endsection
