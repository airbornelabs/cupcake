<h2>Update: <?= $user[0]['Users']['username']; ?></h2>
<?= $this->Form->create('user'); ?>
<?= $this->Form->input('id', array('type' => 'hidden', 'value' => $user[0]['Users']['id'])); ?>
<?= $this->Form->input('username', array('value' => $user[0]['Users']['username'])); ?>
<?= $this->Form->input('password', array('type' => 'password')); ?>
<?= $this->Form->end('Update'); ?>