@extends('master')
@section('title', 'ADD ADMIN')
@section('content')
    <section id="main" class="column">
    <link href="../Css/css2/bootstrap.css" rel="stylesheet">
      <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <div class="container col-md-6 col-md-offset-3">
        <div class="well well bs-component">
                @foreach ($errors->all() as $error)
                    <p class="alert alert-danger">{{ $error }}</p>
                @endforeach
			<form class="form-horizontal" method="post" action={!! action('admin\AdminController@edit',$admin->userName) !!}>
                 {!! csrf_field() !!}

                <fieldset>
                    <legend>Change Password for {{$admin->userName}}</legend>
                    
                    <div class="form-group">
                        <label for="password" class="col-lg-2 control-label">Password</label>
                        <div class="col-lg-10">
                            <input type="password" class="form-control"  name="password">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="col-lg-2 control-label">Confirm password</label>
                        <div class="col-lg-10">
                            <input type="password" class="form-control"  name="password_confirmation">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <button type="reset" class="btn btn-default">Cancel</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
	</section>
@endsection