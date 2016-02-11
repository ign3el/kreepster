<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
  <!--   

  -->
    <title>Kreepster Admin Panel</title>
    <!-- Bootstrap core CSS -->
    <link href="../Css/css2/bootstrap.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../Css/css2/signin.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="js/js2/html5shiv.js"></script>
      <script src="js/js2/respond.min.js"></script>
    <![endif]-->
      <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script>
            $(function() {

                if (localStorage.chkbx && localStorage.chkbx != '') {
                    $('#remember_me').attr('checked', 'checked');
                    $('#username').val(localStorage.usrname);
                    $('#pass').val(localStorage.pass);
                } else {
                    $('#remember_me').removeAttr('checked');
                    $('#username').val('');
                    $('#pass').val('');
                }

                $('#remember_me').click(function() {

                    if ($('#remember_me').is(':checked')) {
                        // save username and password
                        localStorage.usrname = $('#username').val();
                        localStorage.pass = $('#pass').val();
                        localStorage.chkbx = $('#remember_me').val();
                    } else {
                        localStorage.usrname = '';
                        localStorage.pass = '';
                        localStorage.chkbx = '';
                    }
                });
            });

        </script>
        
  </head>

  <body>

        <form class="form-signin panel" method="POST" action="/auth/login">
		 @foreach ($errors->all() as $error)
                    <p class="alert alert-danger">{{ $error }}</p>
                @endforeach
		 {!! csrf_field() !!}
        <h2 class="form-signin-heading">Please sign in</h2>
        <input type="text" class="form-control" placeholder="UserName" name="username" id="username" autofocus value="{{ old('username') }}">
        <input type="password" id="pass" class="form-control" placeholder="Password" name="password">
        <label class="checkbox">
            <input type="checkbox" value="remember-me" id="remember" name="remember">Remember me
        </label>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
		
      </form>
	
    </div> <!-- /container -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
