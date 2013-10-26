<h2>Edit: <?=$page[0]['Pages']['title'];?></h2>
<?= $this->Form->create('page'); ?>
<?= $this->Form->input('title'); ?>
<? $options = array(1 => 'Active', 0 => 'Inactive');?>
<?= $this->Form->select('status', $options); ?>
<?= $this->Form->textarea('content'); ?>
<?= $this->Form->end('Save'); ?>

<a href="/dashboard/pages" title="Back to page listing">Back</a>