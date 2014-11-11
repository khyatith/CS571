<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Test_controller extends CI_Controller
{
public function __construct()
{
parent:: __construct();
session_start();
$this->load->library('session');
$this->load->helper('url');
}
public function loadview()
{
$this->load->view('test_view.php');
}
}
