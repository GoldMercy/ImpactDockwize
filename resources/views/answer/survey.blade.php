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
                            <div class="form-group col-sm-8">
                                <label for="Onderneming">Selecteer uw Onderneming</label>
                                <select name="Onderneming" class="form-control">
                                    @foreach($businesses as $business)
                                        <option>{{$business->Onderneming}}</option>
                                    @endforeach
                                </select>
                            </div>
                        @foreach($openqs as $openq)
                                <div class="form-group col-sm-8">
                                    <label for="{{$openq->openq_name}}">{{$openq->openq_name}}</label>
                                    <input type="text" class="form-control" name="{{$openq->openq_name}}">
                                </div>
                        @endforeach
                            @foreach($scaleqs as $scaleq)
                                <div class="form-group col-sm-8">
                                    <label for="{{$scaleq->scaleq_name}}">{{$scaleq->scaleq_name}}</label>
                                    <input type="number" min="1" max="10" class="form-control" name="{{$scaleq->scaleq_name}}">
                                </div>
                            @endforeach
                            @foreach($dropdownqs as $dropdownq)
                                <div class="form-group col-sm-8">
                                    <label for="{{$dropdownq->dropdownq_name}}">{{$dropdownq->dropdownq_name}}</label>
                                    <select class="form-control" name="{{$dropdownq->dropdownq_name}}">
                                        {{$qoptions = $dropdownqs_options->where('dropdown_id', '=', $dropdownq->dropdownq_id)}}
                                    @foreach($qoptions as $qoption)
                                        <option>{{$qoption->dropdownoption_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endforeach
                            @foreach($multiplechoiceqs as $multiq)
                                <div class="form-group col-sm-8">
                                    <label for="{{$multiq->multiplechoice_name}}">{{$multiq->multiplechoice_name}}</label><br>
                                        <?php $multioptions = $multiplechoiceoptions->where('multiplechoice_id', '=', $multiq->multiplechoice_id) ?>
                                        @foreach($multioptions as $multioption)
                                        <input type="checkbox" name="{{$multiq->multiplechoice_name}} Antwoord {{$loop->iteration}}" value="{{$multioption->multiplechoice_option}}">{{$multioption->multiplechoice_option}}<br>
                                            @endforeach
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
