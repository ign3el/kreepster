
<html lang="en">

<head>
	<meta charset="utf-8"/>
	<title>Dashboard - Admin Panel</title>
	
	<link rel="stylesheet" href="../css/layout.css" type="text/css" media="screen" />
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<script src="../js/jquery-1.5.2.min.js" type="text/javascript"></script>
	<script src="../js/hideshow.js" type="text/javascript"></script>
	<script src="../js/jquery.tablesorter.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="../js/jquery.equalHeight.js"></script>
	<script type="text/javascript">
	$(document).ready(function() 
    	{ 
      	  $(".tablesorter").tablesorter(); 
   	 } 
	);
	$(document).ready(function() {

	//When page loads...
	$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content

	//On Click Event
	$("ul.tabs li").click(function() {

		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content

		var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active ID content
		return false;
	});

});
    </script>
    <script type="text/javascript">
    $(function(){
        $('.column').equalHeight();
    });
</script>

</head>


<body>
<?php
$user = Auth::user();
?>
	<header id="header">
		<hgroup>
			<h1 class="site_title"><a href="Dashboard.php">Website Admin</a></h1>
			<h2 class="section_title">Dashboard</h2><div class="btn_view_site"><a href="http://www.ShortOnPeople.com">View Site</a></div>
		</hgroup>
	</header> <!-- end of header bar -->
	
	<section id="secondary_bar">
		<div class="user">
			<p><?php echo $user->FirstName ?></p>
			<a class="logout_user" href="auth/logout" title="Logout">Logout</a>
		</div>
		<div class="breadcrumbs_container">
			<article class="breadcrumbs"><a href="admin">Website Admin</a> <div class="breadcrumb_divider"></div><a class = "current"><?php echo ucwords( str_ireplace(array('_', '.php'), array(' ', ''), basename($_SERVER['PHP_SELF'])  ) ) ; ?> </a> </article>
		</div>
	</section><!-- end of secondary bar -->

	
	<aside id="sidebar" class="column">
		
		<hr/>
		<h3>Users</h3>
		<ul class="toggle">
			
			<li class="icn_edit_article"><a href="Users.php">Users</a></li>
			
		</ul>
		<h3>Night Life </h3>
		<ul class="toggle">
			<li class="icn_photo"><a href="Bars.php">Bars</a></li>
			<li class="icn_photo"><a href="Lounge.php">Lounge</a></li>
			<li class="icn_photo"><a href="Clubs.php">Clubs</a></li>
		</ul>
		<h3>Sports Club</h3>
        <ul class="toggle">
            <li class="icn_photo"><a href="SportsClub.php">Sports Club Table</a></li>
        </ul>
		<h3>Admins</h3>
		<ul class="toggle">
            <li class="icn_edit_article"><a href="select_Admin.php">Admin Users</a></li>
		</ul>
        <h3>Night Life Pictures</h3>
        <ul class="toggle">
            <li class="icn_folder"><a href="NightPics.php">File Manager</a></li>

        </ul>
        <h3>Sports Club Pictures</h3>
        <ul class="toggle">
            <li class="icn_folder"><a href="SportsPics.php">File Manager</a></li>
      
        </ul>
		<h3>User Pictures</h3>
        <ul class="toggle">
            <li class="icn_folder"><a href="UserPics.php">File Manager</a></li>
      
        </ul>
		<h3>Notifications</h3>
        <ul class="toggle">
            <li class="icn_edit_article"><a href="Notifications.php">Select Notoficatios Table</a></li>
      
        </ul>
		<h3>Notification Types</h3>
        <ul class="toggle">
            <li class="icn_edit_article"><a href="NotificationsType.php">Select Notification Types Table</a></li>
      
        </ul>
	</aside><!-- end of sidebar -->
	