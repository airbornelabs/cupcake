<?php if(!empty($pages)): ?>
	<nav>
	<?php foreach($pages as $page): ?>
		<a href="#"><?=$page['Pages']['title'];?></a>
	<?php endforeach; ?>
	</nav>
<?php endif; ?>
<p>blog home</p>