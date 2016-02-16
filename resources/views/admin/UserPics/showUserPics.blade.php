@extends('master')

@section('content')
    <section id="main" class="column">
        @foreach ($errors->all() as $error)
            <p class="alert alert-danger">{{ $error }}</p>
        @endforeach
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif
            {{Session::put('backUrl',Request::fullUrl())}}
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
                            <th>Id </th>
                            <th>UserID </th>
                            <th>Thumbnail </th>
                            <th>IS_ACTIVE</th>
                            <th>Make Active </th>
                            <th>Delete </th>
                        </tr>
                        @foreach($images as $image )

                            <tr>
                                <td>
                                    {{ $image->U_PictureId }}
                                </td>
                                <td>
                                            {{ $user->FirstName }}
                                </td>

                                <td>
                                    <img src="/{{ $image->PictureLink }}" width = "50px" height = "50px">  </td>
                                <td>{{ $image->IsPictureActive }}</td>
                                <td>  <a href="/admin/UserPictures/{{ $image->U_PictureId }}/edit">
                                <span class="glyphicon glyphicon-edit"
                                      aria-hidden="true"> </span> </a> </td>
                                <td>{!! Form::model($image, ['route' => ['admin.UserPictures.destroy', $image->U_PictureId],
                                    'method' => 'DELETE'
                      ]) !!}
                                    <div class="form-group">

                                        {!! Form::submit('Delete', array('class'=>'btn btn-danger', 'Onclick' => 'return ConfirmDelete();')) !!}

                                    </div>
                                    {!! Form::close() !!} </td>
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

