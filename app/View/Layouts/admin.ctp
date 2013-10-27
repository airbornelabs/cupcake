<!DOCTYPE html>
<html>
	<head>
		<?php echo $this->Html->charset(); ?>
		<title>Cupcake</title>

	
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">

		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	</head>
<body>
	<div id="container">
		<header>
			<nav class="navbar navbar-default" role="navigation">
				<ul class="nav navbar-nav">
			    <li><a href="/dashboard" class="navbar-brand">Welcome <?=$this->session->read('User.name');?></a></li>
			    <li class="dropdown">
		        <a href="/dashboard/pages" class="dropdown-toggle" data-toggle="dropdown">Pages <b class="caret"></b></a>
		        <ul class="dropdown-menu">
		          <li><a href="/dashboard/pages">All</a></li>
		          <li><a href="/dashboard/pages/add">Add a page</a></li>
		        </ul>
		      </li>
		    </ul>
			</nav>
		</header>

		<div id="content">
			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<footer>
		</footer>
	</div>
</body>
</html>
