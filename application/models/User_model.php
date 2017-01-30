<?php

class User_model extends CI_Model {
  private $table = 'user';
  public function __construct() {
    $this->load->database();
  }

  public function hasAccess($access) {
    $sessionUser = $this->session->authenticatedUser;
    $query = $this->db->get_where('id', $sessionUser->id);
    $dbUser = $query->result_object();
    return $user->username == $sessionUser->username && $user->password == $sessionUser->password;
  }

  public function logIn($username, $password) {
    $query = $this->db->get_where('username', $username);
    $user = $query->result_object();
    if ($user->password == $this->saltedPassword($password)) {
      $this->saveToSession($user);
    }
  }

  private function saltedPassword($password) {
    return sha1($password); // TODO Make it better
  }

  private function saveToSession($user) {
    $this->session->authenticatedUser = $user;
  }
}

 ?>
