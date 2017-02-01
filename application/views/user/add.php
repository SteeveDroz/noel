<?php echo form_open() ?>
<?php $this->table->add_row(form_label('Name', 'name'), form_input('name', $name ?? '', 'id="name"'), form_error('name')) ?>
<?php $this->table->add_row(form_label('Password', 'password'), form_password('password', '', 'id="password"'), form_error('password')) ?>
<?php $this->table->add_row(['data' => form_submit('add_user', 'Add user', 'style="width:100%"'), 'colspan' => 2, 'style' => 'text-align: center']) ?>
<?php echo $this->table->generate() ?>
<?php echo form_close() ?>
