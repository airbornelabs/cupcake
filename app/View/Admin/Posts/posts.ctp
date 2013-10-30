<h2>posts</h2>
<? foreach ($posts as $post): ?>
	<a href="/dashboard/posts/edit/<?=$post['Posts']['id'];?>" title="Edit <?=$post['Posts']['title'];?>"><?=$post['Posts']['title'];?></a>
<? endforeach; ?>