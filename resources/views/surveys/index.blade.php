@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
    <head> <script src="https://kit.fontawesome.com/11ccc7b6bb.js" crossorigin="anonymous"></script></head>
    <div class="container">
        <h1>Bekijk uw vragenlijsten!</h1>
        @if(count($survey) > 0)
            @foreach($survey as $surveys)
                <div class="card">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><a href="/surveys/show/{{$surveys->id}}">{{$surveys->titel}}</a></li>
                    </ul>
                </div>
            @endforeach
        @else
            <div class="alert alert-danger">
                {{session('error', 'Geen vragenlijsten gevonden.')}}
            </div>
        @endif
    <div class="container">
        <div class="col-sm-1 p-2">
            <a href="{{ url('/surveys/create') }}">
                <button type="button" class="btn btn-primary">
                    Toevoegen
                </button>
            </a>
        </div>
    </div>
@endsection
