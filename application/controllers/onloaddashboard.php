<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Onloaddashboard extends CI_Controller
{public function __construct()
{
parent:: __construct();
$this->load->library('session');
$this->load->helper('url');
$this->load->library('javascript');
//$this->load->model('pc_model');
//$data['query8'] = $this->pc_model->productcategory();
//$this->load->view('topmenu',$data);
$this->session->set_userdata('prevpage', uri_string());
//$this->load->view('makemyprofile.php',$data);
$this->load->library('form_validation');

}
public function display_dashboard()
{
$custusername=$this->session->userdata('customerusername');

$this->load->model('displaydashboard_model');
$data['query']=$this->displaydashboard_model->display_dashboard($custusername);
$this->load->model('pc_model');
$data['query8'] = $this->pc_model->productcategory();
$this->load->view('makemyprofile.php',$data);
$this->load->view('displaydashboard',$data);
}
public function display_profile()
{
$custusername=$this->session->userdata('customerusername');
$this->load->model('displaydashboard_model');
$data['query']=$this->displaydashboard_model->display_dashboard($custusername);
$this->load->model('pc_model');
$data['query8'] = $this->pc_model->productcategory();
$this->load->view('makemyprofile.php',$data);
$this->load->view('displayprofile_view',$data);
}
public function display_editprofiledetails($fname)
{
//$this->load->helper(array('form', 'url'));
//$this->load->library('form_validation');
if ($this->form_validation->run() == FALSE)
		{
		    $this->data['errormessage']='';
			$custusername=$this->session->userdata('customerusername');
            $this->load->model('displaydashboard_model');
            $data['query']=$this->displaydashboard_model->display_dashboard($custusername);
			$this->load->model('pc_model');
$data['query8'] = $this->pc_model->productcategory();
$this->load->view('makemyprofile.php',$data);
            $this->load->view('editprofiledetails_view',$data);
			
		}
}

public function validations()
{

$custid=$this->session->userdata('customerid');
$fname=htmlentities($this->input->post('fname'),ENT_QUOTES);
$lname=htmlentities($this->input->post('lname'),ENT_QUOTES);
$shippingstreet=htmlentities($this->input->post('shippingstreet'),ENT_QUOTES);
$shippingcity=htmlentities($this->input->post('shippingcity'),ENT_QUOTES);
$shippingstate=htmlentities($this->input->post('shippingstate'),ENT_QUOTES);
$shippingzip=htmlentities($this->input->post('shippingzip'),ENT_QUOTES);
$billingstreet=htmlentities($this->input->post('billingstreet'),ENT_QUOTES);
$billingcity=htmlentities($this->input->post('billingcity'),ENT_QUOTES);
$billingstate=htmlentities($this->input->post('billingstate'),ENT_QUOTES);
$billingzip=htmlentities($this->input->post('billingzip'),ENT_QUOTES);
$email=htmlentities($this->input->post('email'),ENT_QUOTES);
$contact=htmlentities($this->input->post('contact'),ENT_QUOTES);
$username=htmlentities($this->input->post('username'),ENT_QUOTES);
$expr = '/^\+?(\(?[0-9]{3}\)?|[0-9]{3})[-\.\s]?[0-9]{3}[-\.\s]?[0-9]{4}$/';
if(strlen($fname)==0 || strlen($lname)==0 || strlen($username)==0)
{
$data['errormessage'] = 'Username,first name and last name cannot be empty!';
$this->load->model('pc_model');
$data['query8'] = $this->pc_model->productcategory();
$this->load->view('makemyprofile.php',$data);
$this->load->view('editprofiledetails_view',$data);

}
else if(!preg_match("/^[a-zA-Z ]*$/",$username))
{

$data['errormessage'] = 'Username can just be characters!';
$this->load->model('pc_model');
$data['query8'] = $this->pc_model->productcategory();
$this->load->view('makemyprofile.php',$data);
$this->load->view('editprofiledetails_view',$data);
}
else if(preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$fname))
{
$data['errormessage'] = 'Invalid First Name!';
$this->load->model('pc_model');
$data['query8'] = $this->pc_model->productcategory();
$this->load->view('makemyprofile.php',$data);
$this->load->view('editprofiledetails_view',$data);
}
else if(preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$lname))
{
$data['errormessage'] = 'Invalid Last Name!';
$this->load->model('pc_model');
$data['query8'] = $this->pc_model->productcategory();
$this->load->view('makemyprofile.php',$data);
$this->load->view('editprofiledetails_view',$data);

}
else if(preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$shippingstreet))
{
$data['errormessage'] = 'Invalid Shipping Street!';
$this->load->model('pc_model');
$data['query8'] = $this->pc_model->productcategory();
$this->load->view('makemyprofile.php',$data);
$this->load->view('editprofiledetails_view',$data);

}
else if(preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$shippingstate))
{
$data['errormessage'] = 'Invalid Shipping State!';
$this->load->model('pc_model');
$data['query8'] = $this->pc_model->productcategory();
$this->load->view('makemyprofile.php',$data);
$this->load->view('editprofiledetails_view',$data);
}
else if(preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$shippingcity))
{
$data['errormessage'] = 'Invalid Shipping City!';
$this->load->model('pc_model');
$data['query8'] = $this->pc_model->productcategory();
$this->load->view('makemyprofile.php',$data);
$this->load->view('editprofiledetails_view',$data);
}
else if(preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$shippingzip))
{
$data['errormessage'] = 'Invalid Shipping Zip!';
$this->load->model('pc_model');
$data['query8'] = $this->pc_model->productcategory();
$this->load->view('makemyprofile.php',$data);
$this->load->view('editprofiledetails_view',$data);
}
else if(preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$billingstreet))
{
$data['errormessage'] = 'Invalid Billing Street!';
$this->load->model('pc_model');
$data['query8'] = $this->pc_model->productcategory();
$this->load->view('makemyprofile.php',$data);
$this->load->view('editprofiledetails_view',$data);

}
else if(preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$billingstate))
{
$data['errormessage'] = 'Invalid Billing State!';
$this->load->model('pc_model');
$data['query8'] = $this->pc_model->productcategory();
$this->load->view('makemyprofile.php',$data);
$this->load->view('editprofiledetails_view',$data);
}
else if(preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$billingcity))
{
$data['errormessage'] = 'Invalid Billing City!';
$this->load->model('pc_model');
$data['query8'] = $this->pc_model->productcategory();
$this->load->view('makemyprofile.php',$data);
$this->load->view('editprofiledetails_view',$data);
}
else if(preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$billingzip))
{
$data['errormessage'] = 'Invalid Billing Zip!';
$this->load->model('pc_model');
$data['query8'] = $this->pc_model->productcategory();
$this->load->view('makemyprofile.php',$data);
$this->load->view('editprofiledetails_view',$data);
}
else if(preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$contact))
{
$data['errormessage'] = 'Invalid Contact!';
$this->load->model('pc_model');
$data['query8'] = $this->pc_model->productcategory();
$this->load->view('makemyprofile.php',$data);
$this->load->view('editprofiledetails_view',$data);
}
else if( strlen($contact)>0 && !preg_match($expr, $contact))
{
$data['errormessage'] = 'Invalid Contact!';
$this->load->model('pc_model');
$data['query8'] = $this->pc_model->productcategory();
$this->load->view('makemyprofile.php',$data);
$this->load->view('editprofiledetails_view',$data);
}
else if(preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$username))
{
$data['errormessage'] = 'Invalid UserName!';
$this->load->model('pc_model');
$data['query8'] = $this->pc_model->productcategory();
$this->load->view('makemyprofile.php',$data);
$this->load->view('editprofiledetails_view',$data);
}
else if(strlen($email)>0 && !preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email))
{
$data['errormessage'] = 'Invalid Email!';
$this->load->model('pc_model');
$data['query8'] = $this->pc_model->productcategory();
$this->load->view('makemyprofile.php',$data);
$this->load->view('editprofiledetails_view',$data);
}
else if(!is_numeric($shippingzip))
{
$data['errormessage'] = 'Invalid Shipping Zip!';
$this->load->model('pc_model');
$data['query8'] = $this->pc_model->productcategory();
$this->load->view('makemyprofile.php',$data);
$this->load->view('editprofiledetails_view',$data);
}
else if(!is_numeric($billingzip))
{
$data['errormessage'] = 'Invalid Billing Zip!';
$this->load->model('pc_model');
$data['query8'] = $this->pc_model->productcategory();
$this->load->view('makemyprofile.php',$data);
$this->load->view('editprofiledetails_view',$data);
}
else
{
$this->load->model('displaydashboard_model');
$check=$this->displaydashboard_model->updateprofile($fname,$lname,$shippingstreet,$shippingcity,$shippingstate,$shippingzip,$billingstreet,$billingstate,$billingcity,$billingzip,$contact,$username,$email);


if($check>0)
{

$data['errormessage']='All Details Updated Successfully!';

}
$this->load->model('pc_model');
$data['query8'] = $this->pc_model->productcategory();
$this->load->view('makemyprofile.php',$data);
$this->load->view('editprofiledetails_view',$data);
}
}
		
public function editpassworddisplay()
{
if ($this->form_validation->run() == FALSE)
		{
		$data['errormessage']='';
		$this->load->model('pc_model');
$data['query8'] = $this->pc_model->productcategory();
$this->load->view('makemyprofile.php',$data);
		    
			$this->load->view('editpassword_view',$data);
			
		}

}
public function edit_password()
{


$oldpassword=$this->input->post('oldpassword');
$newpassword=$this->input->post('newpassword');
$oldpass=$this->session->userdata('customerpassword');
if(strlen($oldpassword)==0)
{
$this->load->model('pc_model');
$data['query8'] = $this->pc_model->productcategory();
$this->load->view('makemyprofile.php',$data);
$data['errormessage']='Please Enter Your Current Password!';
$this->load->view('editpassword_view',$data);
}
else if(strlen($newpassword)==0)
{
$this->load->model('pc_model');
$data['query8'] = $this->pc_model->productcategory();
$data['errormessage']='Please Enter A New Password!';
$this->load->view('makemyprofile.php',$data);
$this->load->view('editpassword_view',$data);
}
else if($oldpass!=$oldpassword)
{
$this->load->model('pc_model');
$data['query8'] = $this->pc_model->productcategory();
$data['errormessage']='Your current password does not match with our records!';
$this->load->view('makemyprofile.php',$data);
$this->load->view('editpassword_view',$data);
}
else
{
$newpassword=$this->input->post('newpassword');
$this->load->model('displaydashboard_model');
$check=$this->displaydashboard_model->edit_password($oldpassword,$newpassword);
		if($check>0)
		{
		$this->load->model('pc_model');
$data['query8'] = $this->pc_model->productcategory();
$data['errormessage']='Password Successfully Updated. Please Login Again to verify!';

$this->load->view('customerlogin_view',$data);
		}
		
		}

}

public function display_orders()
{
$this->load->model('displaydashboard_model');
$data['query1']=$this->displaydashboard_model->display_ordersummary();
$this->load->model('pc_model');
$data['query8'] = $this->pc_model->productcategory();
$this->load->view('makemyprofile.php',$data);
$this->load->view('ordersummary_view',$data);

}
public function displaydetails($ordernumber)
{
$this->load->model('displaydashboard_model');

$data['query']=$this->displaydashboard_model->display_order($ordernumber);
$this->load->model('pc_model');
$data['query8'] = $this->pc_model->productcategory();
$this->load->view('makemyprofile.php',$data);
$this->load->view('orderdetails_view',$data);
}

}


