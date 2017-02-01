<?php

class Role_model extends CI_Model {
  private $table = 'access';
  private $list = ['NONE', 'USER', 'ADMIN', 'SUPER_ADMIN'];

  public function __construct() {
    $this->load->database();
  }

  public function getName($index) {
    return $this->list[$index] ?? $this->list[0];
  }

  public function getLevel($name) {
    foreach ($this->list as $index => $access) {
      if ($access === $name) {
        return $index;
      }
    }
    return 0;
  }
}

 ?>
