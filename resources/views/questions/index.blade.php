@extends('layouts.app')
@extends('layouts.navbar')
@section('content')
{{-- <head> <script src="https://kit.fontawesome.com/11ccc7b6bb.js" crossorigin="anonymous"></script></head> <i class="fas fa-edit"></i> --}}
<div class="container">
    <h1>Bekijk uw vragen!</h1>
        @if(count($questions) > 0)
            @foreach($questions as $question)
                <p><a href="/questions/{$question->$id}">{{$question->questionName}}</a></p> 
            @endforeach
        @else
            <div class="alert alert-danger">
                {{session('error', 'Geen vragen gevonden!')}}
            </div>
        @endif
        <a href="/questions/create">
            <button class='btn btn-primary'>Voeg een vraag toe!</button>
        </a>
</div>
@endsection
