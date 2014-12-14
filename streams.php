<?php // Template Name: Streams

if ( ! is_user_logged_in() )
{
	wp_redirect( wp_login_url( get_permalink() ), 302 ); exit;
}

?>

<?php get_header( 'streams' ); ?>
	
	<nav class="navbar navbar-default" role="navigation" ng-controller="navbarCtrl">
	  <div class="container">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="navbar">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="#/">Streams</a>
	    </div>
			
	    <div class="collapse navbar-collapse" id="navbar">
				<ul class="nav navbar-nav navbar-left">
					<li class="dropdown">
						
						<a class="dropdown-toggle" data-toggle="dropdown">
							Categories
							<span class="caret"></span>
						</a>
						
						<ul class="dropdown-menu">
							<li ng-repeat="cat in cats">
								<a href="#/category/{{cat.ID - 2}}">{{cat.name}}</a>
							</li>
						</ul>
						
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						
						<a class="dropdown-toggle" data-toggle="dropdown">
							<img ng-src="{{user.avatar}}&s=16" />
							{{user.name}}
						</a>
						
						<ul class="dropdown-menu">
							<li>
								<a href="{{urls.profile}}">Profile</a>
							</li>
							<li>
								<a href="{{urls.admin}}">WordPress</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="{{urls.logout}}">Log out</a>
							</li>
						</ul>
						
					</li>
				</ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
	
	<div ng-view></div>
	
<?php get_footer( 'streams' ); ?>
