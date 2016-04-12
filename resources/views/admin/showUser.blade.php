@extends('master')
@section('title', 'View Users')
@section('content')

   <section id="main" class="column">
   <form method="post" action={!! action('admin\UserController@update', $user->UserID ) !!}  class="pull-left">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
<div class="table-responsive" width = "750">
<table class="table table-bordered table-striped table-condensed table-hover">
@foreach ($errors->all() as $error)
<p class="alert alert-danger">{{ $error }}</p>
@endforeach
@if (session('status'))
<div class="alert alert-success">
{{ session('status') }}
</div>
@endif
@foreach($colName as $col)
<tr><td> {{ $col->COLUMN_NAME }} </td>
<?php $a=$col->COLUMN_NAME; ?>
<td>{{ $user->$a }} 
@if($col->COLUMN_NAME == 'UserName')
<?php $UserId = $user->$a ;?>
@endif
</td>

</tr>
@endforeach

</table>		
<div class = "pull-right">
@if($user->isActive)
                <button type="submit" class="btn btn-warning">DEACTIVATE USER</button>
				@else
				<button type="submit" class="btn btn-success">ACTIVATE USER</button>
				@endif
				</form>
                <form method="post" action={!! action('admin\UserController@destroy',$user->UserID) !!}  class="pull-right">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <div class="form-group">
                            <div>
                                <button type="submit" class="btn btn-success" Onclick = 'return ConfirmDelete();'>Delete</button>
                            </div>
                        </div>
                </form>
<form method="get" action={!! action('admin\UserController@pics',$user->UserID) !!}  class="pull-right">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <div class="form-group">
                            <div>
                                <button type="submit" class="btn btn-warning">Show Images By This User</button>
                            </div>
                        </div>
                </form>
				</div>
</div>		
</section>
   <script>

       function ConfirmDelete()
       {
           var x = confirm("Are you sure you want to delete?");
           if (x)
               return true;
           else
               return false;
       }

   </script>
@endsection