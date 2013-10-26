<h2>Edit: <?=$page[0]['Pages']['title'];?></h2>
<?= $this->Form->create('page'); ?>
<?= $this->Form->input('id', array('type' => 'hidden', 'value' => $page[0]['Pages']['id'])); ?>
<?= $this->Form->input('title', array('value' => $page[0]['Pages']['title'])); ?>
<? $options = array(1 => 'Active', 0 => 'Inactive');?>
<?= $this->Form->select('status', $options, array('value' => $page[0]['Pages']['status'])); ?>
<?= $this->Form->textarea('content', array('value' => $page[0]['Pages']['content'])); ?>
<?= $this->Form->end('Update'); ?>

<a href="/dashboard/pages" title="Back to page listing">Back</a>