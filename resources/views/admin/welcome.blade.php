@extends('master')
@section('title', 'Home')

@section('content')

	<section id="main" class="column">
		
		<h4 class="alert_info">Welcome to the Short On People admin panel.</h4>
		
		<article class="module width_full">
			<header><h3>Stats--> FUTURE IMPLEMENTATION</h3></header>
			<div class="module_content">
				<article class="stats_graph">
					<img src="http://chart.apis.google.com/chart?chxr=0,0,3000&chxt=y&chs=520x140&cht=lc&chco=76A4FB,80C65A&chd=s:Tdjpsvyvttmiihgmnrst,OTbdcfhhggcTUTTUadfk&chls=2|2&chma=40,20,20,30" width="520" height="140" alt="" />
				</article>
				
				<article class="stats_overview">
					<div class="overview_today">
						<p class="overview_day">Today</p>
						<p class="overview_count">1,876</p>
						<p class="overview_type">Hits</p>
						<p class="overview_count">2,103</p>
						<p class="overview_type">Views</p>
					</div>
					<div class="overview_previous">
						<p class="overview_day">Yesterday</p>
						<p class="overview_count">1,646</p>
						<p class="overview_type">Hits</p>
						<p class="overview_count">2,054</p>
						<p class="overview_type">Views</p>
					</div>
				</article>
				<div class="clear"></div>
			</div>
		</article><!-- end of stats article -->
			
		</div><!-- end of .tab_container -->
		
		</article> <!--end of content manager article -->
		
		<article class="module width_full">
			<header><h3><center>Notifications</h3></header>
			
			<div class="message_list">
				<div class="module_content">
				<table>
				
	
				@foreach ( $userNoti as $noti )
				<tr><td>
				@foreach ( $tblNoti as $type )
				User with ID {{ $noti-> CreatedUserId }} 
				@if($type->NotificationTypeId =1)
				{{ $type->NotificationText }} with Table ID {{ $noti->tableID }} to the table owner with ID {{ $noti->UserId }}
			
				@endif
				
				@endforeach	
				</td></tr>
				@endforeach
				</table>
				</div>
			</div>
			
		</article><!-- end of messages article -->
		
		<div class="clear"></div>
		
		<!-- end of post new article -->
		
		<!--<h4 class="alert_warning">A Warning Alert</h4>
		
		<h4 class="alert_error">An Error Message</h4>
		
		<h4 class="alert_success">A Success Message</h4>
		
<!-- end of styles article -->
		<div class="spacer"></div>
	</section>


@endsection