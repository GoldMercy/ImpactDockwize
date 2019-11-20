@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Vragenlijst ingevuld door {{explode(',', $answer->values)[0]}}</div>
                    <div class="card-body">
                        @for($i = 1; $i < count(explode(',', $answer->values)); $i++)
                            <div class="card">
                                <div class="card-header">{{str_replace('_', ' ', explode(',', $answer->keys)[$i])}}</div>
                                <div class="card-body">{{str_replace('_', ' ', explode(',', $answer->values)[$i])}}</div>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection