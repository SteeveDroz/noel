<?php

class User_model extends CI_Model {
  private $table = 'user';
  public function __construct() {
    $this->load->database();
  }

  public function hasAccess($access) {
    $sessionUser = $this->session->authenticatedUser;
    $query = $this->db
    ->from($this->table)
    ->get_where('id', $sessionUser->id);
    $dbUser = $query->result_object();
    return $user->username == $sessionUser->username && $user->password == $sessionUser->password;
  }

  public function logIn($username, $password) {
    $query = $this->db
    ->from($this->table)
    ->get_where('username', $username);
    $user = $query->result_object();
    if ($user->password == $this->cryptedPassword($password)) {
      $this->saveToSession($user);
    }
  }

  public function findAll() {
    return $this->db
    ->get($this->table)
    ->result_object();
  }

  public function add($name, $password) {
    $this->load->model('role_model');
    $data = [
      'name' => $name,
      'password' => $this->cryptedPassword($password),
      'role' => $this->role_model->getLevel('USER')
    ];
    return $this->db->insert($this->table, $data);
  }

  private function cryptedPassword($password) {
    return sha1($password); // TODO Make it better
  }

  private function saveToSession($user) {
    $this->session->authenticatedUser = $user;
  }
}

 ?>
