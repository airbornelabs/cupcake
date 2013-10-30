<?= $this->Form->create('post'); ?>
<?= $this->Form->input('title'); ?>
<? $options = array(1 => 'Active', 0 => 'Inactive');?>
<?= $this->Form->select('status', $options); ?>
<?= $this->Form->textarea('content'); ?>
<?= $this->Form->end('Save'); ?>