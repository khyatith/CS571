<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Birthdaycakes extends CI_Controller
{
public function __construct()
{
parent:: __construct();
session_start();
$this->load->library('session');
$this->load->helper('url');
$this->load->library('javascript');
$this->load->model('pc_model');
$data['query'] = $this->pc_model->productcategory();
$this->load->view('topmenu',$data);
$this->session->set_userdata('prevpage', uri_string());


}

public function display_cakes($category)
{
$data=array();
//$category=$this->input->get("category");
$this->load->model('birthdaycake_model');
$data['query'] = $this->birthdaycake_model->birthdaycakeretrieve($category);
$data['query1']= $this->birthdaycake_model->specialsalesretrieve($category);
//$query=$this->birthdaycake_model->birthdaycakeretrieve($category);
$this->load->view('birthdaycake_view',$data);

}
public function special_sales()
{
$this->load->model('birthdaycake_model');
$data['query2'] = $this->birthdaycake_model->specialsalesproduct();
$data['query3'] = $this->birthdaycake_model->specialsalesproduct();
$this->load->view('specialsales_view',$data);
}

}