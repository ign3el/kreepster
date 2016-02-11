
@extends('master')
@section('title', 'Import')

@section('content')


<body>
<section id="main" class="column">
<div class="alert alert-success">
Following has been successfully imported to Database!!
</div>
<table class="table table-bordered table-striped table-condensed table-hover fsop" width="744">

@foreach($worksheet as $sheet)
<tr>
@foreach($sheet as $row)
<td>{{$row}}</td>
@endforeach
</tr>
@endforeach
</table>
</section>
@endsection