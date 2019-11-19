@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
<div class="container">
    <h1>Welk bedrijf wilt u aan welke vragenlijst koppelen?</h1>
    <form method="GET" action="/bissurrels/store">
        @csrf
        <div class="form-row">
            <div class="form-group col-sm-4">
                <label for="survey_id">Vragenlijst</label>
                <select name="survey_id" class="form-control">
                    @foreach($surveys as $sur)
                        <option value="{{$sur->id}}">{{$sur->titel}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-sm-4">
                <label for="business_id">Bedrijf</label>
                <select name="business_id" class="form-control">
                    @foreach($businesses as $bus)
                        <option value="{{$bus->id}}">{{$bus->Onderneming}}</option>
                    @endforeach
                </select>
            </div>
        </div>

    <div class="form-group col-sm-6">
            <a href="/home">
                <button type="button" class="btn btn-secondary">Home</button>
            </a>
                <button type="submit" class="btn btn-success">Toevoegen</button>
        </div>
    </form>
</div>
@endsection