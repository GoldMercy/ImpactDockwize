@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
<div class="container">
    <div>
        <h1>Bekijk uw open vragen!</h1>
        @if(count($openqs) > 0)
            @foreach($openqs as $openq)
                <div class="card">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><a href="/openqs/show/{{$openq->openq_id}}">{{$openq->openq_name}}</a>
                    </ul>
                </div> 
            @endforeach
        @else
            <div class="alert alert-danger">
                {{session('error', 'Geen open vragen gevonden.')}}
            </div>
        @endif
    </div>
    <hr>
    <div class="form-group">
        <a href="/openqs/create">
            <button class='btn btn-primary'>Voeg een open vraag toe!</button>
        </a>
    </div>
    <div class="row justify-content-center">
        {{$openqs->links()}}
    </div>
</div>
@endsection
