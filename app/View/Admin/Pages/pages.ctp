<h2>Pages</h2>
<? foreach($pages as $page): ?>
	<a href="/dashboard/pages/edit/<?=$page['Pages']['id'];?>" title="Edit <?=$page['Pages']['title']; ?>"><?=$page['Pages']['title']; ?></a>
<? endforeach; ?>

<a href="/dashboard" title="Back to dashboard">Return to dashboard</a>