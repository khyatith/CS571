<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Customerlogin extends CI_Controller
{
public function __construct()
{
parent:: __construct();
session_start();
$this->load->library('session');
$this->load->helper('url');
$this->load->library('javascript');

//$this->load->model('pc_model');
//$data['query'] = $this->pc_model->productcategory();

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
			$this->load->view('customerlogin_view.php',$data);
			
		}

}
public function validations()
{
$custusername=$this->input->post('custusername');
$custpassword=$this->input->post('custpassword');
$this->load->model('pc_model');
$data['query8'] = $this->pc_model->productcategory();
if(strlen($custusername)==0 && strlen($custpassword)==0)
{
$data['errormessage'] = 'Please Enter a UserName and Password!';
$this->load->model('customerlogin_model');
$this->load->model('pc_model');
$data['query8'] = $this->pc_model->productcategory();
$data['query']=$this->customerlogin_model->ssretrieve();
$this->load->view('customerlogin_view',$data);

}
else if(strlen($custusername)==0)
{


$data['errormessage'] = 'Please Enter UserName';
$this->load->model('customerlogin_model');
$this->load->model('pc_model');
$data['query8'] = $this->pc_model->productcategory();
$data['query']=$this->customerlogin_model->ssretrieve();
$this->load->view('customerlogin_view', $data);
}
else if(strlen($custpassword)==0)
{


$data['errormessage'] = 'Please Enter A Password!';
$this->load->model('customerlogin_model');
$this->load->model('pc_model');
$data['query8'] = $this->pc_model->productcategory();


$data['query']=$this->customerlogin_model->ssretrieve();
$this->load->view('customerlogin_view', $data);
}
else if(preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$custusername))
{


$data['errormessage'] = 'Invalid UserName!';
$this->load->model('customerlogin_model');
$this->load->model('pc_model');
$data['query8'] = $this->pc_model->productcategory();

$data['query']=$this->customerlogin_model->ssretrieve();
$this->load->view('customerlogin_view', $data);
}
/*else if(preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$custpassword))
{


$data['errormessage'] = 'Invalid Password!';
$this->load->model('customerlogin_model');
$data['query']=$this->customerlogin_model->ssretrieve();
$this->load->view('customerlogin_view', $data);
}*/
else
{
$this->load->model('customerlogin_model');
$check  = $this->customerlogin_model->custlogin($custusername, $custpassword);
if(!$check)
{
$this->load->model('pc_model');
$data['query8'] = $this->pc_model->productcategory();
$this->load->model('customerlogin_model');

$data['query']=$this->customerlogin_model->ssretrieve();
$data['errormessage'] = 'Invalid Credentials!';
$this->load->view('customerlogin_view', $data);
}
else 
{
$this->session->set_userdata('customerusername', $custusername);
$this->session->set_userdata('customerpassword', $custpassword);
$custid=$this->session->userdata('cid');
$selectedproductid=$_SESSION['p_d'];
if($selectedproductid!="")
{
$this->load->model('customerlogin_model');
$this->customerlogin_model->insertincart($custid);
 
}

$prevpage = $this->session->userdata('prevpage');
					if(isset($prevpage) && $prevpage != ''){
								redirect(site_url($prevpage));
					} 
/*$user[]=$this->session->userdata['cart'];
foreach($user as $value)
{
$count=count($value);
}
if($count==0)
{

}
else
{
$this->load->model('customerlogin_model');
$this->customerlogin_model->insertincart($custusername);

}*/

					//else $this->index($msg);
}

}
}
function customerlogout()
{
$this->session->sess_destroy();
redirect('http://cs-server.usc.edu:5928/CodeIgniter/index.php/cakedesc');
}
}