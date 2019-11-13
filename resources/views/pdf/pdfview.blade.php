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
    <h1>test view</h1>
    <h2>test data</h2>
    @foreach($openqs as $oq)
        <table class="table table-bordered">
            <tr>
                <th>Openqid</th>
                <th>Openqname</th>
            </tr>
            <tr>
                <td>{{$oq->openq_id}}</td>
                <td>{{$oq->openq_name}}</td>
            </tr>
        </table>
    @endforeach
</div>