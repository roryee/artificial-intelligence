<?php // Template Name: Streams ?>

<?php get_header( 'streams' ); ?>
	
	<nav class="navbar navbar-default" role="navigation">
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
	
	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="navbar">
	      <div class="nav navbar-nav navbar-left">
					<button class="btn btn-success navbar-btn"
					ng-click="new()">New Post</button>
	      </div>
				<form class="form navbar-form navbar-left" role="search">
					<input class="form-control" placeholder="Search" />
				</form>
	      <ul class="nav navbar-nav navbar-right">
	        <li><a href="#"></a></li>
	
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
	
	<div ng-view></div>
	
<?php get_footer( 'streams' ); ?>
