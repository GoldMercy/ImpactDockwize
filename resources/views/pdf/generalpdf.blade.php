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

.nobull {
   list-style-type: none;
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
    <ul class="nobull">
        @foreach($openqs as $oq)
            <li>{{$oq->openq_name}}</li>
        @endforeach
        @foreach($scaleqs as $sq)
            <li>{{$sq->scaleq_name}}</li>
        @endforeach
    </ul>
</div>