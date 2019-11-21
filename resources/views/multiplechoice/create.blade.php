@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
<div class="container">
    <form method="GET" action="/multiplechoice/store">
        @csrf
        <div class="form-row">
            <div class="form-group col-sm-6">
                <label for="multiplechoice_name">Hoe heet de multiplechoice vraag?</label>
                <input type="text" class="form-control" name="multiplechoice_name" aria-describedby="multiplechoice_name" placeholder="Hoe heet de vraag?">
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dynamic_field">
                    <tr>
                        <td><input type="text"  class="form-control" name="multiplechoice_option" aria-describedby="multiplechoice_option" placeholder="Vul hier een optie in" /></td>
                        <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
                    </tr>
                </table>
            </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="survey_id">Bij welke vragenlijst hoort de vraag?</label>
                    <select name="survey_id" class="form-control">
                        @foreach($surveys as $s)
                            <option value="{{$s->id}}">{{$s->titel}}</option>
                        @endforeach
                    </select>
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
<script type="text/javascript">
    $(document).ready(function(){
        var postURL = "<?php echo url('addmore'); ?>";
        var i=1;

        $('#add').click(function(){
            i++;
            $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="multiplechoice_option" placeholder="Vul hier een optie in" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
        });

        $(document).on('click', '.btn_remove', function(){
            var button_id = $(this).attr("id");
            $('#row'+button_id+'').remove();
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });
</script>
@endsection
