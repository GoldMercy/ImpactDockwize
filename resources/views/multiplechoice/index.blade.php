@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
<div class="container">
    <h1>Bekijk uw multiplechoice vragen!</h1>
        @if(count($multiplechoice) > 0)
            @foreach($multiplechoice as $mc)
                <div class="card">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><a href="/multiplechoice/show/{{$mc->multiplechoice_id}}">{{$mc->multiplechoice_name}}</a></li>
                    </ul>
                </div> 
            @endforeach
        @else
            <div class="alert alert-danger">
                {{session('error', 'Geen multiplechoice vragen gevonden.')}}
            </div>
        @endif
        <hr>
        <a href="/multiplechoice/create">
            <button class='btn btn-primary'>Voeg een vraag toe!</button>
        </a>
        <div class="row justify-content-center">
                {{$multiplechoice->links()}}
        </div>
</div>
@endsection