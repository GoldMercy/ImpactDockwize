@extends('layouts.app')
@extends('layouts.sidebar')

<div class="container">
    <a href="{{url('output/pdf')}}" class="btn btn-danger">Convert to PDF</a>
</div>
<div class="container" id="main">
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Open vraag id</th>
                    <th>Open vraag</th>
                </tr>
            </thead>
            <tbody>
                @foreach($openqs as $oq)
                    <tr>
                        <td>{{$oq->openq_id}}</td>
                        <td>{{$oq->openq_name}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
