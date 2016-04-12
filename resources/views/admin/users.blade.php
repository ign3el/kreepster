@extends('master')
@section('title', 'Users')
{{Session::put('backUrl',Request::fullUrl())}}
@section('content')


<section id="main" class="column">

<div class="quick_search" center>
 <form method="post" action={!! action('admin\UserController@search') !!}  class="pull-left">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
			<table><tr>
			<td><input type="text" placeholder="Quick Search For User Name" name="stext" size="50"></td>
			<td><input type="submit" value="Search"/></td>
			</tr></table>
			</form>
</div>
<br>
<br>

<div class="table-responsive" width = "750">
<table class="table col-sm-12 table-bordered table-striped table-condensed fsop">
@foreach ($errors->all() as $error)
<p class="alert alert-danger">{{ $error }}</p>
@endforeach
@if (session('status'))
<div class="alert alert-success">
{{ session('status') }}
</div>
@endif
@foreach($colName as $col)
<th>
{{ $col->COLUMN_NAME  }}
</th>
@endforeach

<tr>
@foreach($users as $key=>$value)
@foreach($colName as $col)
<td>
<?php $a=$col->COLUMN_NAME; ?>
@if($a == 'UserName')
 <a href="{!! action('admin\UserController@show', $value->UserName) !!}" style="text-align:center; display:block;">{{ $value->$a }}</a>
@else
	{{ $value->$a }}
@endif
</td>


@endforeach
</tr>
@endforeach
{!! $users->render() !!}
</table>
</div>
</div>		
</section>
@endsection