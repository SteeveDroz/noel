<?php

class User extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model('user_model');
  }

  public function index() {
    $this->load->view('header');
    $this->load->view('footer');
  }

  public function add() {
    $this->load->helper('form');
    $this->load->library(['form_validation', 'table']);

    $this->form_validation->set_rules('username', 'Username', 'trim|required');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');

    if ($this->form_validation->run()) {
      echo 'OK';
    }

    $tableData = [
      [
        'Label',
        'Field'
      ],
      [
        form_label('Username', 'username'),
        form_input('username', '', 'id="username"')
      ],
      [
        form_label('Password', 'password'),
        form_password('password', '', 'id="password"')
      ],
      [
        ['data' => form_submit('add_user', 'Add user'), 'colspan' => 2, 'style' => 'text-align:center']
      ]
    ];

    $this->load->view('header', ['title' => 'Add user']);
    $this->load->view('user/add', ['tableData' => $tableData]);
    $this->load->view('footer');
  }
}

 ?>
