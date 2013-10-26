<h2>Users</h2>
<? foreach($users as $user): ?>
	<a href="/dashboard/users/edit/<?=$user['Users']['id']?>"><?=$user['Users']['username'];?></a>
<? endforeach; ?>