<h2>Edit: <?=$post[0]['Posts']['title'];?></h2>
<?= $this->Form->create('post'); ?>
<?= $this->Form->input('id', array('type' => 'hidden', 'value' => $post[0]['Posts']['id'])); ?>
<?= $this->Form->input('title', array('value' => $post[0]['Posts']['title'])); ?>
<? $options = array(1 => 'Active', 0 => 'Inactive');?>
<?= $this->Form->select('status', $options, array('value' => $post[0]['Posts']['status'])); ?>
<?= $this->Form->textarea('content', array('value' => $post[0]['Posts']['content'])); ?>
<?= $this->Form->end('Update'); ?>

<a href="/dashboard/pages" title="Back to page listing">Back</a>