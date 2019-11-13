@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Selecteer een vragenlijst</div>
                    <div class="card-body">
                        <form method="get" action="/answer/select">
                            <div class="form-row">
                                <div class="form-group col-sm-6">
                                    <label for="Vragenlijst">Vragenlijst</label>
                                    <select name="Vragenlijst" class="form-control">
                                        @foreach($surveys as $survey)
                                            <option value={{$survey->id}}>{{$survey->titel}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <button type="submit" class="btn btn-primary">Vragenlijst nu invullen</button>
                            </div>
                            {{$json}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection