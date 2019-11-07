@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
<div class="container">
    <h1>Bekijk uw vragen!</h1>
        @if(count($openqs) > 0)
            @foreach($openqs as $openq)
                <div class="card">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><a href="/openqs/show/{{$openq->openq_id}}">{{$openq->openq_name}}</a></li>
                    </ul>
                </div> 
            @endforeach
        @else
            <div class="alert alert-danger">
                {{session('error', 'Geen vragen gevonden.')}}
            </div>
        @endif
        <a href="/openqs/create">
            <button class='btn btn-primary'>Voeg een vraag toe!</button>
        </a>
</div>
@endsection
