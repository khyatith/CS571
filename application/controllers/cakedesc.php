<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Cakedesc extends CI_Controller
{
public function __construct()
{
parent:: __construct();
$this->load->library('session');
$this->load->library('javascript');
$this->load->helper('url');
$this->load->model('pc_model');
$data['query'] = $this->pc_model->productcategory();
//$this->load->view('topmenu',$data);
$this->session->set_userdata('prevpage', uri_string());
}
public function index()
{
$data['query'] = $this->pc_model->productcategory();
$this->load->view('cakedesc_view',$data);


}


}
















?>