@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
    <head> <script src="https://kit.fontawesome.com/11ccc7b6bb.js" crossorigin="anonymous"></script></head>
    <div class="container">
        <h1>Bekijk uw vragenlijsten!</h1>
        @if(count($surveys) > 0)
            @foreach($surveys as $s)
                <div class="card">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><a href="/surveys/show/{{$s->id}}">{{$s->titel}}</a></li>
                    </ul>
                </div>
            @endforeach
        @else
            <div class="alert alert-danger">
                {{session('error', 'Geen vragenlijsten gevonden.')}}
            </div>
        @endif
        <div>{{$surveys->links()}}</div>
    <div class="container">
        <div class="col-sm-1 p-2">
            <a href="{{ url('/surveys/create') }}">
                <button type="button" class="btn btn-primary">
                    Toevoegen
                </button>
            </a>
        </div>
    @endif
    <hr>
        <a href="/surveys/create">
            <button class='btn btn-primary'>Voeg een vragenlijst toe!</button>
        </a>
        <div class="row justify-content-center">
                {{$surveys->links()}}
            </div>
</div>
@endsection