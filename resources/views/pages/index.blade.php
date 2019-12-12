@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
    <div class="container-admin">
        <form method="get" action="/questionsselect">
            <div class="form-row align-items-end">
        <div class="form-group col-sm-2">
            <label for="value">Zoeken naar:</label>
            <input type="text" class="form-control" name="value" aria-describedby="value">
        </div>
        <div class="form-group col-sm-2">
            <button type="submit" class="btn btn-primary">Zoeken</button>
            <a href="/questions">
                <button type="button" class="btn btn-primary">Toon Alles</button>
            </a>
        </div>
    </div>
    </form>
        <div class="float-left">
            <table class="table table-bordered">
                <tr>
                    <th>Open vragen</th>
                </tr>
                @foreach($openqs as $oq)
                    <tr>
                        <td><a href="/openqs/show/{{$oq->openq_id}}">{{$oq->openq_name}}</a></td>
                        @endforeach
                    </tr>
            </table>
        </div>

        <div class="float-left">
            <table class="table table-bordered">
                <tr>
                    <th>Dropdown vragen</th>
                </tr>
                @foreach($dropdownqs as $dq)
                    <tr>
                        <td><a href="/dropdownqs/show/{{$dq->dropdownq_id}}">{{$dq->dropdownq_name}}</a></td>
                        @endforeach
                    </tr>
            </table>
        </div>

        <div class="float-left">
            <table class="table table-bordered">
                <tr>
                    <th>Schalen vragen</th>
                </tr>
                @foreach($scaleqs as $sq)
                    <tr>
                        <td><a href="/scaleqs/show/{{$sq->scaleq_id}}">{{$sq->scaleq_name}}</a></td>
                        @endforeach
                    </tr>
            </table>
        </div>

        <div class="float-left">
            <table class="table table-bordered">
                <tr>
                    <th>Multiplechoice vragen</th>
                </tr>
                @foreach($multiqs as $mq)
                    <tr>
                        <td><a href="/multiplechoice/show/{{$mq->multiplechoice_id}}">{{$mq->multiplechoice_name}}</a></td>
                        @endforeach
                    </tr>
            </table>
        </div>
    </div>
@endsection