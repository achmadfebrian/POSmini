<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();

    // login first
    if (empty($this->session->userdata('email'))) {
      redirect('login');
    }

    // model
    $this->load->model('Key_model', 'Key');
  }

  public function index()
  {
    // get category
    $urlcategory = $this->Key->baseurl_api() . 'category/show_category';
    $resultcategory = $this->Key->api_get($urlcategory);



    $data['categoryList'] = $resultcategory['data'];
    $data['title'] = 'Category';

    $this->load->view('templates/header', $data);
    $this->load->view('sidebar');
    $this->load->view('templates/content-open', $data);
    $this->load->view('category', $data);
    $this->load->view('templates/content-closed');
    $this->load->view('templates/footer');
  }

  public function add()
  {

    $post = $this->input->post();

    $url = $this->Key->baseurl_api() . 'category/add_category';
    $params = [
      'category_name' => $post['category-name']
    ];

    $result = $this->Key->api_post($url, $params);

    if ($result['status'] == true) {
      $this->session->set_flashdata('message', '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          ' . $result['message'] . '
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      ');

      redirect('category');
    } else {
      $this->session->set_flashdata('message', '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          ' . $result['message'] . '
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      ');

      redirect('category');
    }
  }

  public function get_category_id()
  {
    $id = $this->input->post('id');
    $url = $this->Key->baseurl_api() . 'category/show_category_id';
    $params = ['id' => $id];

    $result = $this->Key->api_post($url, $params);

    echo json_encode($result);
  }

  public function update()
  {
    $post = $this->input->post();

    $url = $this->Key->baseurl_api() . 'category/update_category';
    $params = [
      'category_name' => $post['_category-name'],
      'id' => $post['_id'],
    ];

    $result = $this->Key->api_post($url, $params);

    if ($result['status'] == true) {
      $this->session->set_flashdata('message', '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          ' . $result['message'] . '
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      ');

      redirect('category');
    } else {
      $this->session->set_flashdata('message', '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          ' . $result['message'] . '
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      ');

      redirect('category');
    }
  }

  public function delete()
  {
    $url = $this->Key->baseurl_api() . 'category/delete_category';
    $params = [
      'id' => $this->input->get('id')
    ];

    $result = $this->Key->api_post($url, $params);

    if ($result['status'] == true) {
      $this->session->set_flashdata('message', '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          ' . $result['message'] . '
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      ');

      redirect('category');
    } else {
      $this->session->set_flashdata('message', '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          ' . $result['message'] . '
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      ');

      redirect('category');
    }
  }
}
