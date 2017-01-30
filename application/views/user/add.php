<?php echo form_open() ?>
<?php echo validation_errors() ?>
<?php echo $this->table->generate($tableData) ?>
<?php echo form_close() ?>
