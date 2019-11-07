@extends('layouts.app')
@extends('layouts.navbar')
@section('content')
<div class="container">
    <h1>Bekijk uw schalenvragen!</h1>
        @if(count($scaleqs) > 0)
            @foreach($scaleqs as $scaleq)
                <div class="card">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><a href="/scaleqs/show/{{$scaleq->scaleq_id}}">{{$scaleq->scaleq_name}}</a></li>
                    </ul>
                </div> 
            @endforeach
        @else
            <div class="alert alert-danger">
                {{session('error', 'Geen schalen vragen gevonden.')}}
            </div>
        @endif
        <hr>
        <a href="/scaleqs/create">
            <button class='btn btn-primary'>Voeg een schalenvraag toe!</button>
        </a>
</div>
@endsection