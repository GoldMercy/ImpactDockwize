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
                                    <label for="Ontvanger">Ontvanger(s) (Optioneel)</label>
                                    <select name="Ontvanger" class="form-control">
                                        <option selected>nvt.</option>
                                        @foreach($programs as $program)
                                            <option value="{{$program->name}}">{{$program->name}}</option>
                                        @endforeach
                                    </select>
                                    <label for="Ontvanger2">En/of</label>
                                    <select name="Ontvanger2" class="form-control">
                                        <option selected>nvt.</option>
                                        @foreach($housings as $housing)
                                            <option value="{{$housing->housing_name}}">{{$housing->housing_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary" name="action" value="survey">Vragenlijst nu invullen</button>
                                <button type="submit" class="btn btn-primary" name="action" value="mail">Vragenlijst versturen per e-mail</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection