<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();

    // model
    $this->load->model('Key_model', 'Key');

    // library
    $this->load->library('form_validation');
  }

  public function index()
  {
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    $this->form_validation->set_rules(
      'password',
      'Password',
      'required',
      array('required' => 'You must provide a %s.')
    );

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('templates/header');
      $this->load->view('login');
      $this->load->view('templates/footer');
    } else {
      //set data 
      $email = $this->input->post('email');
      $password = $this->input->post('password');

      $url = $this->Key->baseurl_api() . 'admin/login';
      $params = [
        'email' => $email,
        'password' => $password
      ];

      $result = $this->Key->api_post($url, $params);

      if ($result['status'] == false) {
        $this->session->set_flashdata('message', '
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            ' . $result['message'] . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        ');

        redirect('login');
      } else {
        $data = $result['data'];

        $this->session->set_userdata($data);

        redirect('product');
      }
    }
  }

  public function logout()
  {
    session_destroy();
    redirect('login');
  }
}
