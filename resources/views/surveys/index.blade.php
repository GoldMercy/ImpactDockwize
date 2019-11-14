@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
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
    <hr>
        <a href="/surveys/create">
            <button class='btn btn-primary'>Voeg een vragenlijst toe!</button>
        </a>
        <div class="row justify-content-center">
            {{$survey->links()}}
        </div>
</div>
@endsection