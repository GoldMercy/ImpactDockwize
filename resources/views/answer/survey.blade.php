@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{$survey->titel}}</div>
                    <div class="card-body">
                        {{$survey->beschrijving}}
                        <form method="get" action="/answer/submit">
                        @foreach($openqs as $openq)
                                <div class="form-group col-sm-8">
                                    <label for="openvraag{{$openq->openq_id}}">{{$openq->openq_name}}</label>
                                    <input type="text" class="form-control" name="openvraag{{$openq->openq_id}}">
                                </div>
                        @endforeach
                            @foreach($scaleqs as $scaleq)
                                <div class="form-group col-sm-8">
                                    <label for="schaalvraag{{$scaleq->scaleq_id}}">{{$scaleq->scaleq_name}}</label>
                                    <input type="number" min="1" max="10" class="form-control" name="schaalvraag{{$scaleq->scaleq_id}}">
                                </div>
                            @endforeach
                            <div class="col-sm-1">
                                <button type="submit" class="btn btn-primary">Toevoegen</button>
                            </div>
                        </form>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection