@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
    <div class="container">
        <div class="float-left">
        <table class="table table-bordered">
            <tr>
                <th>Open vragen</th>
            </tr>
            @foreach($openqs as $oq)
                <tr>
                    <td><a href="/openqs/show/{{$oq->id}}">{{$oq->openq_name}}</a></td>
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
    </div>
@endsection
