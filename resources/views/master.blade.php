<html>
<head>
    <title> @yield('title') </title>
    <link href="/css/bootstrap.css" rel="stylesheet">
    <!-- Include roboto.css to use the Roboto web font, material.css to include the theme and ripples.css to style the ripple effect -->
    <link href="/css/roboto.min.css" rel="stylesheet">
    <link href="/css/material.min.css" rel="stylesheet">
    <link href="/css/ripples.min.css" rel="stylesheet">

</head>
<body>

@include('admin.sidebar')

@yield('content')

<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="/css/bootstrap.js"></script>

<script src="/js/ripples.min.js"></script>
<script src="/js/material.min.js"></script>
<script>
    $(document).ready(function() {
        // This command is used to initialize some elements and make them work properly
        $.material.init();
    });
</script>
</body>

</html>