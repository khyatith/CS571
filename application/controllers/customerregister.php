<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Customerregister extends CI_Controller
{public function __construct()
{
parent:: __construct();
$this->load->library('session');
$this->load->helper('url');
$this->load->library('javascript');
//$this->load->model('pc_model');
//$data['query'] = $this->pc_model->productcategory();
//$this->load->view('topmenu',$data);

}
public function signup()
{
$this->load->helper(array('form', 'url'));
$this->load->library('form_validation');
$this->form_validation->set_rules('custfname', 'First Name', 'trim|required|xss_clean');
$this->form_validation->set_rules('custlname', 'Last Name', 'trim|required|xss_clean');
$this->form_validation->set_rules('custuname', 'UserName', 'trim|required|xss_clean');
//$this->form_validation->set_rules('custpass', 'Password', 'trim|required|xss_clean');

if ($this->form_validation->run() == FALSE)
{
$this->load->model('pc_model');
$data['query8'] = $this->pc_model->productcategory();
//$confirmmessage="Congratulations!Successful signup!Now You just need to Login and start cake shopping!"
$this->load->view('signup.php',$data);
}
else
{
$custfname=$this->input->post('custfname');
$custlname=$this->input->post('custlname');
$custuname=$this->input->post('custuname');
$custpassword=$this->input->post('custpass');
if(!preg_match("/^[a-zA-Z ]*$/",$custuname))
{
$this->load->model('pc_model');
$data['query8'] = $this->pc_model->productcategory();
$data['errormessage']='Only Characters allowed in userName!';
$this->load->view('signup.php',$data);
}
else
{
$this->load->model('pc_model');
$count=$this->pc_model->signupinsert($custfname,$custlname,$custuname,$custpassword);

if($count==0)
{
$this->load->model('pc_model');
$data['query8'] = $this->pc_model->productcategory();
$data['errormessage']='UserName already Exists.If you already have an account,please Login!';
$this->load->view('signup.php',$data);
} 
else if($count>0)
{
$this->load->model('pc_model');
$data['query8'] = $this->pc_model->productcategory();

$data['errormessage']="Congratulations!Successful signup!Now You just need to Login and start cake shopping!";
$this->load->view('customerlogin_view.php',$data);

}
}
}
}
}
?>