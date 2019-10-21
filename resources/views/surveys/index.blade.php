@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
    <head> <script src="https://kit.fontawesome.com/11ccc7b6bb.js" crossorigin="anonymous"></script></head>
    <div class="container">
        <div class="col-sm-1 p-2">
            <a href="{{ url('/surveys/create') }}">
                <button type="button" class="btn btn-primary fas fa-edit">

                </button>
            </a>
        </div>
    </div>
@endsection
