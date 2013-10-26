<h2>Welcome <?$this->session->read('User.username');?> to the dashboard</h2>

<p>Statistics:</p>
<p><?= $total['Pages'];?> Pages</p>

<a href="/logout" title="Logout">Logout</a>