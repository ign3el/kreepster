@extends('master')
@section('title', 'In Apt Images')
@section('content')
{{Session::put('backUrl',Request::fullUrl())}}
   <section id="main" class="column">

   			@foreach ($errors->all() as $error)
<p class="alert alert-danger">{{ $error }}</p>
@endforeach
@if (session('status'))
<div class="alert alert-success">
{{ session('status') }}
</div>

@endif
<!--<div class="quick_search" center>
 <form method="post" action="/admin/UserPictures/search"  class="pull-left">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
			<table><tr>
			<td><input type="text" placeholder="Quick Search For Any User Name" name="stext" size="50"></td>
			<td><input type="submit" value="Search"/></td>
			</tr></table>
			</form>
</div>
-->

    <div>
        <div class="panel panel-default">
            <table class="table">
                <tr>
                    <th>Picture ID </th>
                    <th>Posted-By ID </th>
                    <th>Marked-By ID </th>
                    <th>Thumbnail </th>
                    <th>Beauty Count </th>
                    <th>Kreep Count </th>
                    <th>Delete </th>
                </tr>
    @foreach($images as $image )
	
                    <tr>
                        <td>
						{{ $image->PictureID }}
						</td>
                        <td>
						{{ $image->UserName }}
						</td>
						<td>
						{{ $image->MarkedBy }}
						</td>
                        <td> 
                                <img src="/{{ $image->PictureURL }}" width = "100px" height = "100px">  </td>
                        
                        <td>
                          {{$image->BeautyCount}}
                        </td>
                          
                        <td>
                          {{$image->KreepCount}}
                        </td>
                        <td>
                       <form method="post" action={!! action('admin\ImagesController@destroy',$image->PictureID) !!} >
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <div class="form-group">
                            <div>
                                <button type="submit" class="btn btn-success" Onclick = 'return ConfirmDelete();'>Delete</button>
                            </div>
                        </div>
                </form>
                </td></td>
                    </tr>
		
        @endforeach
		{!! $images->render() !!}
            </table>
        </div>
    </div>
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


</section>

