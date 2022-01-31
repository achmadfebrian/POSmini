<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Show_product extends CI_Controller
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

    // get data product
    $urlproduct = $this->Key->baseurl_api() . 'product/show_product';
    $resultproduct = $this->Key->api_get($urlproduct);



    $data['productList'] = $resultproduct['data'];
    $data['title'] = 'Product';

    $this->load->view('templates/header', $data);
    $this->load->view('sidebar');
    $this->load->view('templates/content-open', $data);
    $this->load->view('show_product', $data);
    $this->load->view('templates/content-closed');
    $this->load->view('templates/footer');
  }

  public function add()
  {
    $upload = $this->do_upload($_FILES);

    $post = $this->input->post();

    $url = $this->Key->baseurl_api() . 'product/add_product';
    $params = [
      'product_name' => $post['product-name'],
      'category_id' => $post['category'],
      'price' => $post['price'],
      'image' => $upload,
      'description' => $post['description'],
    ];

    $result = $this->Key->api_post($url, $params);

    if ($result['status'] == true) {
      $this->session->set_flashdata('message', '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          ' . $result['message'] . '
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      ');

      redirect('product');
    } else {
      $this->session->set_flashdata('message', '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          ' . $result['message'] . '
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      ');

      redirect('product');
    }
  }

  public function do_upload($file)
  {
    $config['upload_path']          = './assets/product_image/';
    $config['allowed_types']        = 'gif|jpg|png';
    $config['max_size']             = 100;
    $config['max_width']            = 1024;
    $config['max_height']           = 768;

    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('image')) {
      $error = array('error' => $this->upload->display_errors());
      return $error;
    } else {
      $data = array('upload_data' => $this->upload->data());
      return $data['upload_data']['file_name'];
    }
  }

  public function get_product_id()
  {
    $id = $this->input->post('id');
    $url = $this->Key->baseurl_api() . 'product/show_product_id';
    $params = ['id' => $id];

    $result = $this->Key->api_post($url, $params);

    echo json_encode($result);
  }

  public function update()
  {
    $post = $this->input->post();

    if ($_FILES['_image']['name'] != "") {
      $upload = $this->do_upload($_FILES);
    } else {
      $upload = $this->input->post('_old_image');
    }

    $url = $this->Key->baseurl_api() . 'product/update_product';
    $params = [
      'product_name' => $post['_product-name'],
      'category_id' => $post['_category'],
      'price' => $post['_price'],
      'image' => $upload,
      'description' => $post['_description'],
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

      redirect('product');
    } else {
      $this->session->set_flashdata('message', '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          ' . $result['message'] . '
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      ');

      redirect('product');
    }
  }

  public function delete()
  {
    $url = $this->Key->baseurl_api() . 'product/delete_product';
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

      redirect('product');
    } else {
      $this->session->set_flashdata('message', '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          ' . $result['message'] . '
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      ');

      redirect('product');
    }
  }
}
