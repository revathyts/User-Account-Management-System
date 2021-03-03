<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class main extends CI_Controller {

/**
* Index Page for this controller.
*
* Maps to the following URL
* http://example.com/index.php/welcome
* - or -
* http://example.com/index.php/welcome/index
* - or -
* Since this controller is set as the default controller in
* config/routes.php, it's displayed at http://example.com/
*
* So any other public methods not prefixed with an underscore will
* map to /index.php/welcome/<method_name>
* @see https://codeigniter.com/user_guide/general/urls.html
*/

/*****@revathy*****/

/***index page***/
public function index()
{
	$this->load->view('index');
}

/****@admin module****/
/****adminhome****/
public function adminhome()
{
	$this->load->view('adminhome');
}

/****admin viewing user details as table and perform actions like approve,reject,delete****/
public function view_table()
{
if($_SESSION['logged_in']==true && $_SESSION['utype']=='1')
	{
		$this->load->model('mainmodel');
		$data['n']=$this->mainmodel->view_table();
		$this->load->view('view',$data);
	}
else
	{
		redirect('main/login','refresh');
    }
}
	
public function approve()
	{
		$this->load->model('mainmodel');
		$id=$this->uri->segment(3);
		$this->mainmodel->approve($id);
		redirect('main/view_table','refresh');
	}
public function reject()
	{
		$this->load->model('mainmodel');
		$id=$this->uri->segment(3);
		$this->mainmodel->reject($id);
		redirect('main/view_table','refresh');
	}
public function delete()
	{
	if($_SESSION['logged_in']==true && $_SESSION['utype']=='1')
	{
	
		$this->load->model('mainmodel');
		$id=$this->uri->segment(3);
		$this->mainmodel->deletedetails($id);
		redirect('main/view_table','refresh');
	}

else
{
	redirect('main/login','refresh');
}
}

/****login page for both admin and user****/
public function login()
{
	$this->load->view('login');
}
public function new_login()
{
	$this->load->library('form_validation');
	$this->form_validation->set_rules("uname","username",'required');
	$this->form_validation->set_rules("password","password",'required');
	if($this->form_validation->run())
	{
	$this->load->model('mainmodel');
	$unm=$this->input->post("uname");
	$pass=$this->input->post("password");
	$rslt=$this->mainmodel->slctpass($unm,$pass);

	if ($rslt)
	{
	$id=$this->mainmodel->getusrid($unm);
	$user=$this->mainmodel->getusr($id);
	$this->load->library(array('session'));
	$this->session->set_userdata(array('id'=>(int)$user->id,
	'status'=>$user->status,'utype'=>$user->utype,'logged_in'=>(bool)true));
	if($_SESSION['logged_in']==true && $_SESSION['status']=='1'&& $_SESSION['utype']=='1')
	{
	redirect(base_url().'main/adminhome');
	}

	elseif($_SESSION['status']=='1'&& $_SESSION['utype']=='0')
	{
	redirect(base_url().'main/userhome');
	}
	else
	{
	echo "Waiting for Approval";
	}
	    }
	    else
	    {
	    echo "invalid user";
	    }
	}
	else
	{
	redirect('main/login','refresh');
	}

	}


/***@user module***/

/***user home***/

public function userhome()
{
	$this->load->view('userhome');
}

/***user registeration***/
public function registration()
{
$this->load->view('registration');
}
public function reg_access()
{
	$this->load->library('form_validation');
	$this->form_validation->set_rules("name","firstname",'required');
	$this->form_validation->set_rules("lname","lastname",'required');
	$this->form_validation->set_rules("address","address",'required');
	$this->form_validation->set_rules("district","district",'required');
	$this->form_validation->set_rules("dob","dob",'required');
	$this->form_validation->set_rules("mobile","mobile",'required');
	$this->form_validation->set_rules("pincode","pincode",'required');
	$this->form_validation->set_rules("uname","username",'required');
	$this->form_validation->set_rules("password","password",'required');
	$this->form_validation->set_rules("mobile","mobile",'required');
	$this->form_validation->set_rules("email","email",'required');

	if($this->form_validation->run())
	{
	$this->load->model('mainmodel');
	$pass=$this->input->post("password");
	$encpass=$this->mainmodel->encpswd($pass);
	$a= array("name" => $this->input->post('name'),
	"lastname" => $this->input->post('lname'),
	"address" => $this->input->post('address'),
	"district" => $this->input->post('district'),
	"dob" => $this->input->post('dob'),
	"mobile" => $this->input->post('mobile'),
	"pincode" => $this->input->post('pincode'),
	"email" => $this->input->post('email'));
	$b= array("username" => $this->input->post('uname'),
	"password" =>$encpass );
	$this->mainmodel->regist($a,$b);
	redirect(base_url().'main/registration');

}
}

/***updating user profile***/
public function profile()
        {	
        if($_SESSION['logged_in']==true && $_SESSION['utype']=='0')
		{
	
        	$this->load->model('mainmodel');
        	$id=$this->session->id;
        	$data['userdata']=$this->mainmodel->profile($id);
            $this->load->view('profileupdate',$data);	
        }
    
    else
	{
		redirect('main/login','refresh');
	}
	}

public function updtdtls()
	{
	   if($_SESSION['logged_in']==true && $_SESSION['utype']=='0')
	{
		$u= array("name" => $this->input->post('name'),
		"lastname" => $this->input->post('lname'),
		"address" => $this->input->post('address'),
		"district" => $this->input->post('district'),
		"dob" => $this->input->post('dob'),
		"mobile" => $this->input->post('mobile'),
		"pincode" => $this->input->post('pincode'),
		"email" => $this->input->post('email'));
			     
		$v= array("username" => $this->input->post('uname'));
	
		$this->load->model('mainmodel');
		if($this->input->post("update"))
		{
			$id=$this->session->id;
			$this->mainmodel->updtdtls($u,$v,$id);
			redirect('main/profile','refresh');
			
		}
}

else
	{
		redirect('main/login','refresh');
	}
}

/****logout***********/
public function logout()
    {
        $data=new stdClass();
        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']===true)
        {
            foreach ($_SESSION as $key => $value)
            {
               unset($_SESSION[$key]);
            }
            $this->session->set_flashdata('logout_notification','logged_out');
            redirect('/','refresh');
        }
        else{
            redirect('/','refresh');
        }
    }
    /**********logout end**************/
	
/****forgot password****/

public function forget()
{
$this->load->view('forgotpsw');
}

public function send()
{
    $to =  $this->input->post('from');  // User email pass here
    $subject = 'Welcome To Elevenstech';

    $from = 'team3orisys@gmail.com';              // Pass here your mail id

    $emailContent = '<!DOCTYPE><html><head></head><body><table width="600px" style="border:1px solid #cccccc;margin: auto;border-spacing:0;"><tr><td style="background:#000000;padding-left:3%"><img src="http://elevenstechwebtutorials.com/assets/logo/logo.png" width="300px" vspace=10 /></td></tr>';
    $emailContent .='<tr><td style="height:20px"></td></tr>';


    $emailContent .= $this->input->post('message');  //   Post message available here


    $emailContent .='<tr><td style="height:20px"></td></tr>';
    $emailContent .= "<tr><td style='background:#000000;color: #999999;padding: 2%;text-align: center;font-size: 13px;'><p style='margin-top:1px;'><a href='http://elevenstechwebtutorials.com/' target='_blank' style='text-decoration:none;color: #60d2ff;'>www.elevenstechwebtutorials.com</a></p></td></tr></table></body></html>";
               


    $config['protocol']    = 'smtp';
    $config['smtp_host']    = 'ssl://smtp.gmail.com';
    $config['smtp_port']    = '465';
    $config['smtp_timeout'] = '60';

    $config['smtp_user']    = 'team3orisys@gmail.com';    //Important
    $config['smtp_pass']    = 'karr@orisys';  //Important

    $config['charset']    = 'utf-8';
    $config['newline']    = "\r\n";
    $config['mailtype'] = 'html'; // or html
    $config['validation'] = TRUE; // bool whether to validate email or not

     

    $this->email->initialize($config);
    $this->email->set_mailtype("html");
    $this->email->from($from);
    $this->email->to($to);
    $this->email->subject($subject);
    $this->email->message($emailContent);
    $this->email->send();

    $this->session->set_flashdata('msg',"Mail has been sent successfully");
    $this->session->set_flashdata('msg_class','alert-success');
    return redirect('main/forget');
}


/*****email avaliability check *****/

public function email_availibility()  
      {  
      if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))  

           {  
                echo '<label class="text-danger"><span class="glyphicon glyphicon-remove"></span> Invalid Email</span></label>';  
           }  
           else  
           {  
                $this->load->model("mainmodel");  
                if($this->mainmodel->is_email_available($_POST["email"]))  
                {  
                     echo '<label class="text-danger"><span class="glyphicon glyphicon-remove"></span> Email Already register</label>';  
                }  
                else  
                {  
                     echo '<label class="text-success"><span class="glyphicon glyphicon-ok"></span> </label>';  
                }  
           }  
       

      }

/*****phone number avaliability check start*****/
public function phno_availability()
      {

                $this->load->model("mainmodel");  
                if($this->mainmodel->is_phno_available($_POST["mobile"]))  
                {  
                     echo '<label class="text-danger"><span class="glyphicon glyphicon-remove"></span> Phone number Already register</label>';  
                }  
                else  
                {  
                     echo '<label class="text-success"><span class="glyphicon glyphicon-ok"></span> </label>';  
                }  
       }

/*****username avaliability check start*****/
public function uname_availability()
      {

                $this->load->model("mainmodel");  
                if($this->mainmodel->is_uname_available($_POST["uname"]))  
                {  
                     echo '<label class="text-danger"><span class="glyphicon glyphicon-remove"></span> user name Already register</label>';  
                }  
                else  
                {  
                     echo '<label class="text-success"><span class="glyphicon glyphicon-ok"></span> </label>';  
                }  
      }
	
	


}
