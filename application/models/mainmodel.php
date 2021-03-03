<?php
/**
 *
 */
class mainmodel extends CI_model
{

/****password encryption****/
public function encpswd($pass)
{
  return password_hash($pass, PASSWORD_BCRYPT);
}

/****inserting registeration details into database****/
public function regist($a,$b)
{
  $this->db->insert("emp_table",$b);
  $loginid=$this->db->insert_id();
  $a['loginid']=$loginid;
  $this->db->insert("registeration",$a);
}

/****accesing values from 2 tables****/
public function view_table()
{
  $this->db->select('*');
  $this->db->join('emp_table','emp_table.id=registeration.loginid','inner');
  $n=$this->db->get("registeration");
  return $n;
}

/****approve****/
public function approve($id)
{
  $this->db->set('status','1');
  $this->db->where("id",$id);
  $qry=$this->db->update("emp_table",$b);
  return $qry;
}

/****reject ****/
public function reject($id)
{
  $this->db->set('status','2');
  $this->db->where("id",$id);
  $qry=$this->db->update("emp_table",$b);
  return $qry;

}

/**** selecting password****/
public function slctpass($unm,$pass)
{
  $this->db->select('password');
  $this->db->from("emp_table");
  $this->db->where("username",$unm);
  $qry=$this->db->get()->row('password');
  return $this->verfypass($pass,$qry);
}

/****verifying password****/
public function verfypass($pass,$qry)
{
  return password_verify($pass,$qry);
}

/****for getting id ****/
public function getusrid($unm)
{
  $this->db->select('id');
  $this->db->from("emp_table");
  $this->db->where("username",$unm);
  return $this->db->get()->row('id');
}
public function getusr($id)
{
  $this->db->select('*');
  $this->db->from("emp_table");
  $this->db->where("id",$id);
  return $this->db->get()->row();
}

/****delete****/
public function deletedetails($id)
  {
  		$this->db->where('id',$id);
  		$qry=$this->db->join('registeration','registeration.loginid=emp_table.id','inner');
  		$this->db->delete("registeration");
  		$qry=$this->db->where("emp_table.id",$id);
  		$this->db->delete("emp_table");

}

/****profile updation****/
public function profile($id)
	{
		$this->db->select('*');
		$qry=$this->db->join('emp_table','registeration.loginid=emp_table.id','inner');
		$qry=$this->db->where("registeration.loginid",$id);
		$qry=$this->db->get('registeration');
		return $qry;

	}
	public function updtdtls($u,$v,$id)
	{
		$this->db->select('*');
		$qry=$this->db->where("loginid",$id);
		$this->db->join('emp_table','registeration=emp_table.id','inner');
		$qry=$this->db->update("registeration",$u);
		$qry=$this->db->where("id",$id);
		$qry=$this->db->update("emp_table",$v);
		return $qry;
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

/****email availability****/

function is_email_available($email)  
      {  
           $this->db->where('email', $email);  
           $query = $this->db->get("registeration");  
           if($query->num_rows() > 0)  
           {  
                return true;  
           }  
           else  
           {  
                return false;  
           }  
      }  

/****phone number availability****/
public function is_phno_available($mobile)  
      {  
           $this->db->where('mobile', $mobile);  
           $query = $this->db->get("registeration");  
           if($query->num_rows() > 0)  
           {  
                return true;  
           }  
           else  
           {  
                return false;  
           }  
      }

/****username availability****/
public function is_uname_available($uname)
       {  
           $this->db->where('username', $uname);  
           $query = $this->db->get("emp_table");  
           if($query->num_rows() > 0)  
           {  
                return true;  
           }  
           else  
           {  
                return false;  
           }  
      }
}