@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
<div class="container">
    <form method="GET" action="/surstat/addstat">
        @csrf
            <table>
                <tr>
                    <th style="padding:5px 25px 0 0;">Vragenlijst</th>
                    <th style="padding:5px 25px 0 0;">Bedrijf</th>
                    <th style="padding:5px 25px 0 0;">Status</th>
                <tr> 
                <tr>         
                    <td style="padding:5px 25px 0 0;">
                        <label for="survey_name"> 
                                                   
                            <select name="survey_name" id="survey_name" class="form-control">
                                    @foreach($surveys as $sur)  
                                <option>{{$sur->titel}}</option>
                                @endforeach
                            </select>
                            
                        </label>                
                    </td>
                    
                    <td style="padding:5px 25px 0 0;">
                        
                        <label for="business_name">                          
                            <select name="business_name" id="business_name" class="form-control">
                                    @foreach($allbuss as $abuss)
                                <option>{{$abuss->Onderneming}}</option>
                                @endforeach 
                            </select>
                        </label>  
                         
                    </td>            
                    
                    
                    <td style="padding:5px 25px 0 0;">
                        <label for="status">
                            <select name="status" id="status" class="form-control">
                                <option>Nog niet verzonden</option>
                                <option>Verzonden</option>
                                <option>Ontvangen</option>
                            </select>  
                        </label>                  
                    </td>
                    <td style="padding:5px 25px 0 0;"><button type="submit" class="btn btn-success">Sla status op</td>
                
                </tr>
            </table>
        </form>
</div>
@endsection