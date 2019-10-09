@extends('layouts.app')
@extends('layouts.navbar')
@section('content')
<div class="container">
    <div class="row justify-content-center">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Ondernemer</th>
                        <th scope="col">Onderneming</th>
                        <th scope="col">Telefoonnummer</th>
                        <th scope="col">Email</th>
                        <th scope="col">Plaats</th>
                        <th scope="col">Idee</th>
                        <th scope="col">Jaar</th>
                        <th scope="col">Thema</th>
                        <th scope="col">Doelgroep</th>
                        <th scope="col">Programma</th>
                    </tr>
                </thead>
            @foreach ($businesses as $business)
                <tr>
                    <td>
                {{ $business->Ondernemer }}
                    </td>
                    <td>
                {{ $business->Onderneming }}
                    </td>
                    <td>
                {{ $business->Telefoonnummer }}
                    </td>
                    <td>
                {{ $business->Email }}
                    </td>
                    <td>
                {{ $business->Plaats }}
                    </td>
                    <td>
                {{ $business->Idee }}
                    </td>
                    <td>
                {{ $business->Jaar }}
                    </td>
                    <td>
                {{ $business->Thema }}
                    </td>
                    <td>
                {{ $business->Doelgroep }}
                    </td>
                    <td>
                {{ $business->Programma }}
                    </td>
                </tr>
            @endforeach
            </table>

        {{$businesses->links()}}
    </div>
</div>


@endsection
