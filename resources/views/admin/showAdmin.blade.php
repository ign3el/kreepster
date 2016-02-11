@extends('master')
@section('title', 'View Admin')
@section('content')

   <section id="main" class="column">
   <form method="post" action={!! action('admin\AdminController@update', $admin->userName ) !!}  class="pull-left">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
<div class="table-responsive" width = "750">
<table class="table table-bordered table-striped table-condensed fsop table-hover">
{{Session::put('adminurl',Request::fullUrl())}}
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
@if($col->COLUMN_NAME == 'userName')
<?php $userName = $admin->$a ;?>
@endif
@if($col->COLUMN_NAME =='userName' or $col->COLUMN_NAME == 'created_at' or $col->COLUMN_NAME == 'updated_at' or $col->COLUMN_NAME == 'lastLoggedIn' or $col->COLUMN_NAME == 'lastUpdatedBy' or $col->COLUMN_NAME == 'password')
<td>{{ $admin->$a }}</td>
@else
<td><input type = "text" name ="{{$a}}" value = "{{ $admin->$a }}" /></td>
@endif
</tr>
@endforeach

</table>
            <div class = "pull-left">
                        
                                <button type="submit" class="btn btn-info">Update</button>
                          </form>
						  <form method="post" action={!! action('admin\AdminController@destroy',$admin->userName) !!}  class="pull-right">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <div class="form-group">
                            <div>
                                <button type="submit" class="btn btn-success" Onclick = 'return ConfirmDelete();'>Delete</button>
                            </div>
                        </div>
                </form>
				<form method="get" action={!! action('admin\AdminController@changepwd',$admin->userName) !!}  class="pull-right">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <div class="form-group">
                            <div>
                                <button type="submit" class="btn btn-warning">Change Password</button>
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