<?php

class Unit extends CI_Controller {
  public function tests() {
    $this->load->library('unit_test');
    $this->unit->use_strict();
    $this->role();
    echo $this->unit->report();
  }

  private function role() {
    $this->load->model('role_model');

    $this->levelToRole();
    $this->roleToLevel();
  }

  private function levelToRole() {
    $this->unit->run($this->role_model->getName(0), 'NONE', 'Role 0 = NONE');
    $this->unit->run($this->role_model->getName(1), 'USER', 'Role 1 = USER');
    $this->unit->run($this->role_model->getName(2), 'ADMIN', 'Role 2 = ADMIN');
    $this->unit->run($this->role_model->getName(3), 'SUPER_ADMIN', 'Role 3 = SUPER_ADMIN');
  }

  private function roleToLevel() {
    $this->unit->run($this->role_model->getLevel('NONE'), 0, 'Role NONE = 0');
    $this->unit->run($this->role_model->getLevel('USER'), 1, 'Role USER = 1');
    $this->unit->run($this->role_model->getLevel('ADMIN'), 2, 'Role ADMIN = 2');
    $this->unit->run($this->role_model->getLevel('SUPER_ADMIN'), 3, 'Role SUPER_ADMIN = 3');
  }
}

 ?>
