@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
{{-- <head> <script src="https://kit.fontawesome.com/11ccc7b6bb.js" crossorigin="anonymous"></script></head> <i class="fas fa-edit"></i> --}}
<div class="container">
    <h1>Bekijk uw vragen!</h1>
        @if(count($questions) > 0)
            @foreach($questions as $question)
                <div class="card">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><a href="/questions/show/{{$question->id}}">{{$question->questionName}}</a></li>
                    </ul>
                </div> 
            @endforeach
        @else
            <div class="alert alert-danger">
                {{session('error', 'Geen vragen gevonden.')}}
            </div>
        @endif
        <a href="/questions/create">
            <button class='btn btn-primary'>Voeg een vraag toe!</button>
        </a>
</div>
@endsection
