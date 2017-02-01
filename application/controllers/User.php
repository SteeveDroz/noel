<?php

class User extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model('user_model');
  }

  public function index() {
    $users = $this->user_model->findAll();

    $this->load->view('header');
    $this->load->view('user/list', ['users' => $users]);
    $this->load->view('footer');
  }

  public function add() {
    $this->load->helper('form');
    $this->load->library(['form_validation', 'table']);

    $name = $this->input->post('name');
    $password = $this->input->post('password');

    $this->form_validation->set_rules('name', 'Name', 'trim|required|is_unique[user.name]');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');

    if ($this->form_validation->run()) {
      $this->user_model->add($name, $password);
      redirect('/');
    }

    $this->load->view('header', ['title' => 'Add user']);
    $this->load->view('user/add', ['name' => $name]);
    $this->load->view('footer');
  }
}

?>
