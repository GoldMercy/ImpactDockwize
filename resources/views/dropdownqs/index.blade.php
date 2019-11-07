@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
<div class="container">
    <h1>Bekijk uw dropdown vragen!</h1>
        @if(count($dropdownqs) > 0)
            @foreach($dropdownqs as $dropdownq)
                <div class="card">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><a href="/dropdownqs/show/{{$dropdownq->dropdownq_id}}">{{$dropdownq->dropdownq_name}}</a></li>
                    </ul>
                </div> 
            @endforeach
        @else
            <div class="alert alert-danger">
                {{session('error', 'Geen dropdown vragen gevonden.')}}
            </div>
        @endif
        <a href="/dropdownqs/create">
            <button class='btn btn-primary'>Voeg een vraag toe!</button>
        </a>
</div>
@endsection