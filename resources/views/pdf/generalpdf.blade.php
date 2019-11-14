<style>
h1 {
    text-align: center;
}

.container {
    font-style: inherit;
    font-family: Arial, Helvetica, sans-serif;
}

table {
  border-collapse: collapse;
}

.table th,
.table td {
  padding: 0.75rem;
  vertical-align: top;
  border-top: 1px solid black;
}

.table-bordered,
.table-bordered th,
.table-bordered td {
  border: 1px solid black;
}
</style>

<div class="container">
    <h1>test content voor algemene data view</h1>
    <table class="table table-bordered">
        <tr>
            <th>Openq name</th>
            <th>Scaleq name</th>
        </tr>
    
        @foreach($openqs as $oq)
        <tr>
                <td>{{$oq->openq_name}}</td>
                <td>{{$oq->scaleq_name}}</td>
            </tr> 
        @endforeach

    </table>
</div>