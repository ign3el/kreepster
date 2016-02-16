@extends('master')
@section('title', 'Admins')

@section('content')


<body>
<section id="main" class="column">
<div class="table-responsive">
<button class="btn btn-lg btn-primary btn-block" onClick="location.href='/admin/register'">Register a New Admin</button>
<table class="table table-bordered table-striped table-condensed table-hover fsop" width="744">
{{Session::put('backUrl',Request::fullUrl())}}
@foreach ($errors->all() as $error)
<p class="alert alert-danger">{{ $error }}</p>
@endforeach
@if (session('status'))
<div class="alert alert-success">
{{ session('status') }}
</div>
@endif
@foreach($colName as $col)

@if($col->COLUMN_NAME != 'remember_token' and $col->COLUMN_NAME != 'password')
	<th>
{{ $col->COLUMN_NAME  }}
</th>
@endif

@endforeach

<tr>
@foreach($admin as $key=>$value)
@foreach($colName as $col)

<?php $a=$col->COLUMN_NAME; ?>
@if($a == 'username')
	<td>
 <a href="{!! action('admin\AdminController@show', $value->username) !!}" style="text-align:center; display:block;">{{ $value->$a }}</a>
 </td>
@elseif($a!='remember_token' and $a != 'password')
	<td>{{ $value->$a }}</td>
@endif



@endforeach
</tr>
@endforeach
{!! $admin->render() !!}
</table>
</div>		
</section>
@endsection