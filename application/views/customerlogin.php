<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Customerlogin extends CI_Controller
{

public function __construct()
{
parent:: __construct();
$this->load->library('session');
$this->load->helper('url');
$this->load->library('javascript');
$this->load->model('pc_model');
$data['query'] = $this->pc_model->productcategory();
//$this->load->view('topmenu',$data);
$this->load->library('form_validation');

}


public function customer_login()
{
if ($this->form_validation->run() == FALSE)
		{
		    //$this->data['errormessage']='';
			//$this->data1['errormessage1']='';
			$this->load->model('customerlogin_model');
			$data['query']=$this->customerlogin_model->ssretrieve();
			$this->load->model('pc_model');
            $data['query8'] = $this->pc_model->productcategory();
			//$this->load->view('customerlogin_view.php',$data);
			$this->load->view('customerlogin_view.php',$data);
			
		}

}
public function validations()
{
$custusername=$this->input->post('custusername');
$custpassword=$this->input->post('custpassword');
if(strlen($custusername)==0 && strlen($custpassword)==0)
{
$this->data['errormessage'] = 'Please Enter a UserName and Password!';
$this->load->view('customerlogin_view',$this->data);

}
else if(strlen($custusername)==0)
{


$this->data['errormessage'] = 'Please Enter UserName';
$this->load->view('customerlogin_view', $this->data);
}
else if(strlen($custpassword)==0)
{


$this->data['errormessage'] = 'Please Enter A Password!';
$this->load->view('customerlogin_view', $this->data);
}
else if(preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$custusername))
{


$this->data['errormessage'] = 'Invalid UserName!';
$this->load->view('customerlogin_view', $this->data);
}
else if(preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$custpassword))
{


$this->data['errormessage'] = 'Invalid Password!';
$this->load->view('customerlogin_view', $this->data);
}
else
{
//$this->load->model('customerlogin_model');
//$data1['query'] = $this->customerlogin_model->custlogin($custusername,$custpassword);
/*if($data1['query']==false)
{
$this->data['errormessage'] = 'You Do Not Seem To Have An Account With Us. Please Register First!';
$this->load->view('customerlogin_view',$this->data);
}*/

$this->load->model('customerlogin_model');
$check  = $this->customerlogin_model->custlogin($custusername, $custpassword);
if(!$check)
{
$this->data['errormessage'] = 'Invalid Credentials!';
$this->load->view('customerlogin_view', $this->data);
}
else if($check)
{
$this->session->set_userdata('customerusername', $custusername);
$this->session->set_userdata('customerpassword', $custpassword);
}
}
}