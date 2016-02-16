
    <section id="main" class="column">
    <link href="../Css/css2/bootstrap.css" rel="stylesheet">
      <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <div class="container col-md-6 col-md-offset-3">
        <div class="well well bs-component">
                @foreach ($errors->all() as $error)
                    <p class="alert alert-danger">{{ $error }}</p>
                @endforeach
			<form class="form-horizontal" method="post">
                 {!! csrf_field() !!}

                <fieldset>
                    <legend>Create an Admin</legend>
                    <div class="form-group">
                        <label for="userName" class="col-lg-2 control-label">userName</label>
                        <div class="col-lg-10">
                            <input type="text"   id="userName" placeholder="User Name" name="userName" value="{{ old('name') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-lg-2 control-label">Email</label>
                        <div class="col-lg-10">
                            <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="{{ old('email') }}">
                        </div>
                    </div>
  <div class="form-group">
                        <label for="name" class="col-lg-2 control-label">First Name</label>
                        <div class="col-lg-10">
                            <input type="name" class="form-control" id="FirstName" placeholder="First Name" name="FirstName" value="{{ old('FirstName') }}">
                        </div>
                    </div>
					  <div class="form-group">
                        <label for="name" class="col-lg-2 control-label">Last Name</label>
                        <div class="col-lg-10">
                            <input type="name" class="form-control" id="LastName" placeholder="Last Name" name="LastName" value="{{ old('LastName') }}">
                        </div>
                    </div>
					
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
