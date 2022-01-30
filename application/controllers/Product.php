<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();

    // login first
    if (empty($this->session->userdata('email'))) {
      redirect('login');
    }
  }

  public function index()
  {

    var_dump($this->session->userdata());
    echo "Product";
  }
}
