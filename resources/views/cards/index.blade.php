@extends('layouts.app')
@extends('layouts.navbar')
@section('content')
<div class="container">
    <div>
        <h1>Bekijk uw kaarten!</h1>
        @if(count($cards) > 0)
            @foreach($cards as $card)
                <div class="card">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><a style="color:black;" href="/cards/show/{{$card->card_id}}">{{$card->card_question}}</a>
                        <small class="list-group-item">Created at {{$card->created_at}}</small></li>
                    </ul>
                </div> 
            @endforeach
        @else
            <div class="alert alert-danger">
                {{session('error', 'Geen vragen gevonden.')}}
            </div>
        @endif
    </div>
    <hr>
    <div>
        <a href="/cards/create">
            <button class='btn btn-primary'>Voeg een kaart toe!</button>
        </a>
    </div>
</div>


@endsection