@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
<div class="container">
    <h1>Bekijk uw kaarten!</h1>
    @if(count($cards) > 0)
        @foreach($cards as $card)
            <div class="card">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><a href="/cards/show/{{$card->card_id}}">{{$card->card_question}}</a>
                </ul>
            </div> 
        @endforeach
    @else
        <div class="alert alert-danger">
            {{session('error', 'Geen fysieke kaarten gevonden.')}}
        </div>
    @endif
    <hr>
    <a href="/cards/create">
        <button class='btn btn-primary'>Voeg een kaart toe!</button>
    </a>
</div>


@endsection