<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="app.css">
    <title>PDF test</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <tr>
                    {{--<td>{{$question}}</td>--}}
                    <td>{{$openqs->openq_id}}</td>
                    <td>{{$openqs->openq_name}}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
</body>
</html>

{{--<div class="container container-smaller">--}}
    {{--<div class="col-lg-10 col-lg-offset-1" style="margin-top:20px; text-align: right">--}}
        {{--<div class="btn-group mb-4">--}}
            {{--<a href="{{ url('/pdf') }}" class="btn btn-success">Save as PDF</a>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}