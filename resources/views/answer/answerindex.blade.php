@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>Ingevulde vragenlijsten</h2>
                @foreach($answers as $answer)
                    <a href="show/{{$answer->id}}">
                <div class="card">
                    <div class="card-body">{{explode(',', $answer->values)[0]}}</div>
                </div>
                    </a>
                    @endforeach
            </div>
        </div>
    </div>
@endsection