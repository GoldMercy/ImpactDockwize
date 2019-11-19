@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
<div class="container">
    <form method="GET" action="/surveys/storesur">
        @csrf
        <h1>Voeg een vragenlijst toe aan een onderneming</h1>
        <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="business_id">Bij welk bedrijf hoort de vragenlijst?</label>
                    <select name="business_id" class="form-control">
                        @foreach($business as $bus)
                            <option value="{{$bus->id}}">{{$bus->Onderneming}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        <div class="form-group col-sm-6">
            {{-- <a href="/admin/show/{{$business->id}}">
                <button type="button" class="btn btn-secondary">Terug</button>
            </a> --}}
                <button type="submit" class="btn btn-success">Toevoegen</button>
        </div>
    </form>
</div>
@endsection