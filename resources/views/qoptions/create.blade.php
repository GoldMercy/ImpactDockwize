@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
<div class="container">
    <form method="GET" action="/qoptions/store">
        @csrf
        <div class="form-row">
            <div class="form-group col-sm-6">
                <label for="dropdownq_fk">Bij welke dropdown vraag hoort de optie?</label>
                <select name="dropdownq_fk" class="form-control">
                    @foreach($dropdownqs as $dqs)
                        <option value="{{$dqs->dropdownq_id}}">{{$dqs->dropdownq_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-sm-6">
                <label for="option_name">Wat voor optie wilt u toevoegen?</label>
                <input type="text" class="form-control" name="option_name" aria-describedby="option_name" placeholder="Optie">
            </div>
        </div>
        <hr>
        <div class="form-group col-sm-6">
            <a href="/input">
                <button type="button" class="btn btn-secondary">Ga terug</button>
            </a>
                <button type="submit" class="btn btn-success">Toevoegen</button>
        </div>
    </form>
</div>
@endsection
