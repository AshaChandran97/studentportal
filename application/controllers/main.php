 
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class main extends CI_Controller {

  /**
   * Index Page for this controller.
   *
   * Maps to the following URL
   *    http://example.com/index.php/welcome
   *  - or -
   *    http://example.com/index.php/welcome/index
   *  - or -
   * Since this controller is set as the default controller in
   * config/routes.php, it's displayed at http://example.com/
   *
   * So any other public methods not prefixed with an underscore will
   * map to /index.php/welcome/<method_name>
   * @see https://codeigniter.com/user_guide/general/urls.html
   // */
 
    /*@function name:loginaction+**
     *@function:login process
     @author:Varsha S
    **@date:04/03/2021**/
    public function loginaction()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules("username","username",'required');
        $this->form_validation->set_rules("password","password",'required');
            if($this->form_validation->run())
            {
                $this->load->model('mainmodel');
                $username=$this->input->post("username");
                $pass=$this->input->post("password");
                $rslt=$this->mainmodel->selectpass($username,$pass);
                if($rslt)
                {
                    $id=$this->mainmodel->getuserid($username);
                    $user=$this->mainmodel->getuser($id);
                    $this->load->library(array('session'));
                    $this->session->set_userdata(array('id'=>$user->id,'status'=>$user->userstatus,'usertype'=>$user->usertype,'logged_in'=>(bool)true));
                    if($_SESSION['status']=='1' && $_SESSION['usertype']=='1'&& $_SESSION['logged_in']==true)
                     {
                                redirect(base_url().'main/studindex');
                     }
                    elseif($_SESSION['status']=='1' && $_SESSION['usertype']=='0' && $_SESSION['logged_in']==true)
                      {
                            redirect(base_url().'main/adminindex');
                      }
                  elseif($_SESSION['status']=='1' && $_SESSION['usertype']=='2' && $_SESSION['logged_in']==true)
                    {
                            redirect(base_url().'main/trainerindex');
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
                   redirect(base_url().'main/index');
                }
        }
    
   /*@function name:trainerindex**
     @function:viewing trainer index page
      *@module:trainer
     @author:Varsha S
    **@date:04/03/2021**/
   public function trainerindex()
   {
         if($_SESSION['usertype']=='2'&& $_SESSION['logged_in']==true)
         {
                $this->load->view('trainerindex');  
         }
         else
         {
            redirect(base_url().'main/index');
         }
       }
   /*@function name:studindex**
    @function:viewing student index page
     *@module:student
    @author:Varsha S
    **@date:04/03/2021**/
   public function studindex()
    {  
       if($_SESSION['usertype']=='1'&& $_SESSION['logged_in']==true)
         {
            $this->load->view('studindex');  
         }
         else
         {
      redirect(base_url().'main/index');
         }  
    }   
     /*@function name:adminindex**
    @function:viewing admin index page
     *@module:admin
    @author:Varsha S
    **@date:04/03/2021**/
   public function adminindex()
    {  
       if($_SESSION['usertype']=='0'&& $_SESSION['logged_in']==true)
         {
            $this->load->view('adminindex');  
         }
         else
         {
             redirect(base_url().'main/index');
         }  
    }     

  /*@function name:grievance**
    @function:viewing grievance form
     *@module:student
    @author:Asha Chandran
    **@date:04/03/2021**/

public function grievance()
{
  if($_SESSION['usertype']=='1'&& $_SESSION['logged_in']==true)
   {
    $this->load->view('grievance');
   }
   else
   {
     redirect(base_url().'main/index');
   }
 }
  /*@function name:grievanceaction**
    @function:inserting grievance 
     *@module:student
    @author:Asha Chandran
    **@date:04/03/2021**/

public function grievanceaction()
{   
   if($_SESSION['usertype']=='1'&& $_SESSION['logged_in']==true)
   {

    $this->load->library('form_validation');
    $this->form_validation->set_rules("griev_to","griev_to",'required');
    $this->form_validation->set_rules("subject","subject",'required');
    $this->form_validation->set_rules("message","message",'required');
    if($this->form_validation->run())
    {

      $this->load->model('mainmodel');
      $a=array("griev_to"=>$this->input->post("griev_to"),
           "subject"=>$this->input->post("subject"),
           "message"=>$this->input->post("message"));
        $this->mainmodel->grievanceaction($a);
        redirect(base_url().'main/grievance');
    }
  }
  else
  {
      redirect(base_url().'main/index');
  }
}
  /*
  @function name:leaveapplication**
    @function:viewing leave application form
     *@module:student
    @author:Asha Chandran
    **@date:04/03/2021**/

public function leaveapplication()
{
  if($_SESSION['usertype']=='1'&& $_SESSION['logged_in']==true)
   {

    $this->load->view('leaveapplication');
   }
   else
   {
     redirect(base_url().'main/index');
   }
 }
 /*@function name:leave_action**
    @function:inserting leave details
     *@module:student
    @author:Asha Chandran
    **@date:04/03/2021**/
public function leave_action()
{
  if($_SESSION['usertype']=='1'&& $_SESSION['logged_in']==true)
   {
  $this->load->library('form_validation');
  $this->form_validation->set_rules("leavetype","leavetype",'required');
  $this->form_validation->set_rules("fromdate","fromdate",'required');
  $this->form_validation->set_rules("todate","todate",'required');
  $this->form_validation->set_rules("reason","reason",'required');
  if($this->form_validation->run())
  {

  $this->load->model('mainmodel');
  $config['upload_path']='./files/';
  $config['allowed_types']='gif|jpg|png|pdf|doc';
  $config['max_size']=1000;
  $config['max_height']=1024;
  $config['max_width']=750;
  $this->load->library('upload',$config);
  if(!$this->upload->do_upload('file_upload'))
  {
  $error=array('error'=>$this->upload->display_errors());
  //print_r($error);
  }
  else{

  $data=array('file_upload'=>$this->upload->data());
  $img=$data['file_upload']['file_name'];
  }
  // $lid=$_SESSION['id'];
  // $sid=$this->mainmodel->insert_sid($lid);
  $id=$this->session->id;
  $a=array("leave_type"=>$this->input->post("leavetype"),
  "from_date"=>$this->input->post("fromdate"),
  "to_date"=>$this->input->post("todate"),
  "reason"=>$this->input->post("reason"),
       "file_upload"=>$img,"sid"=>$id);
  $this->mainmodel->insert_leave($a);
  redirect(base_url().'main/leaveapplication');
  }
}
else
{
   redirect(base_url().'main/index');
}
}

   /*@function name:addstudent**
    *@function:viewing student registration form**
    @author:Varsha S
     *@module:trainer
    **@date:05/03/2021**/
   
        public function addstudent()
        {
          if($_SESSION['logged_in']==true && $_SESSION['usertype']=='2')
         {

            $this->load->view('addstudent');
        }
        else
        {
           redirect(base_url().'main/index');
        }
      }
   /*@function name:studinsert**
    *@function:insertion of student details**
     *@module:trainer
     @author:Varsha S
    **@date:05/03/2021**/
    public function studinsert()
    {
       if($_SESSION['logged_in']==true && $_SESSION['usertype']=='2')
         {
        $this->load->library('form_validation');
        $this->form_validation->set_rules("name","name",'required');
        $this->form_validation->set_rules("ad_no","ad_no",'required');
        $this->form_validation->set_rules("ad_date","ad_date",'required');
        $this->form_validation->set_rules("rollno","rollno",'required');
        $this->form_validation->set_rules("dob","dob",'required');
        $this->form_validation->set_rules("aadhar","aadhar",'required');
        $this->form_validation->set_rules("email","email",'required');
        $this->form_validation->set_rules("gender","gender",'required');
        $this->form_validation->set_rules("address","address",'required');
        $this->form_validation->set_rules("father","father",'required');
        $this->form_validation->set_rules("mother","mother",'required');
        $this->form_validation->set_rules("phone","phone",'required');
        $this->form_validation->set_rules("p_phone","p_phone",'required');
        $this->form_validation->set_rules("religion","religion",'required');
        $this->form_validation->set_rules("cast","cast",'required');
        $this->form_validation->set_rules("category","category",'required');
        $this->form_validation->set_rules("blood","blood",'required');
        $this->form_validation->set_rules("nationality","nationality",'required');
        $this->form_validation->set_rules("state","state",'required');
        $this->form_validation->set_rules("district","district",'required');
        $this->form_validation->set_rules("taluk","taluk",'required');
        $this->form_validation->set_rules("panchayath","panchayath",'required');
        $this->form_validation->set_rules("block","block",'required');
        $this->form_validation->set_rules("income","income",'required');
        $this->form_validation->set_rules("project","project",'required');
        $this->form_validation->set_rules("batch","batch",'required');
        $this->form_validation->set_rules("skills","skills",'required');
        $this->form_validation->set_rules("h_qualification","h_qualification",'required');
        $this->form_validation->set_rules("stream","stream",'required');
        $this->form_validation->set_rules("passingdate","passingdate",'required');
        $this->form_validation->set_rules("sslcmark","sslcmark",'required');
        $this->form_validation->set_rules("hsemark","hsemark",'required');
        $this->form_validation->set_rules("ugmark","ugmark",'required');
        $this->form_validation->set_rules("pgmark","pgmark",'required');
        $this->form_validation->set_rules("username","username",'required');
        $this->form_validation->set_rules("password","password",'required');
        if($this->form_validation->run())
        {
        
         $this->load->model('mainmodel');
         $pass=$this->input->post("password");
         $encpass=$this->mainmodel->encpas($pass);
          $a=array("ad_no"=>$this->input->post("ad_no"),
                 "rollno"=>$this->input->post("rollno"),
                "name"=>$this->input->post("name"),
                "email"=>$this->input->post("email"),
                "gender"=>$this->input->post("gender"),
                "dob"=>$this->input->post("dob"),
                "father"=>$this->input->post("father"),
                 "mother"=>$this->input->post("mother"),
                "address"=>$this->input->post("address"),
                "phone"=>$this->input->post("phone"),
                "p_phone"=>$this->input->post("p_phone"),
                "ad_date"=>$this->input->post("ad_date"),
                "religion"=>$this->input->post("religion"),
                 "cast"=>$this->input->post("cast"),
                "category"=>$this->input->post("category"),
                "blood"=>$this->input->post("blood"),
                "nationality"=>$this->input->post("nationality"),
                "state"=>$this->input->post("state"),
                "district"=>$this->input->post("district"),
                 "taluk"=>$this->input->post("taluk"),
                "panchayath"=>$this->input->post("panchayath"),
                "block"=>$this->input->post("block"),
                "income"=>$this->input->post("income"),
                "aadhar"=>$this->input->post("aadhar"),
                "project"=>$this->input->post("project"),
                 "batch"=>$this->input->post("batch"),
                "skills"=>$this->input->post("skills"),
                "h_qualification"=>$this->input->post("h_qualification"),
                "stream"=>$this->input->post("stream"),
                "passingdate"=>$this->input->post("passingdate"),
                "sslcmark"=>$this->input->post("sslcmark"),
                 "hsemark"=>$this->input->post("hsemark"),
                "ugmark"=>$this->input->post("ugmark"),
                "pgmark"=>$this->input->post("pgmark")
               );
         $b=array("username"=>$this->input->post("username"),
                  "password"=>$encpass,
                    "usertype"=>'1');
        $this->mainmodel->studinsert($a,$b);
        redirect(base_url().'main/addstudent');  
        }
       }
       else
      {
       redirect(base_url().'main/index');
       }
    } 
     
    /*@function name:updatestud**
     *@function:viewing updation form**
      *@module:student
    *@author:Varsha S
    **@date:05/03/2021**/
      public function updatestud()
        {
        if($_SESSION['logged_in']==true && $_SESSION['usertype']=='1')
         {
            $this->load->model('mainmodel');
            $id=$this->session->id;
            $data['user_data']=$this->mainmodel->updatestud($id);
            $this->load->view("student_profile",$data);
        }
        else
        {
            redirect(base_url().'main/index');
        }
                   
        }
    /*@function name:updateaction**
     *@function:updating student details**
      *@module:student
    *@author:Varsha S
    **@date:05/03/2021**/
public function updateaction()
    { 
       if($_SESSION['logged_in']==true && $_SESSION['usertype']=='1')
         {

        $a = array("name"=>$this->input->post("name"),
                   "email"=>$this->input->post("email"),
                   "dob"=>$this->input->post("dob"),
                  "father"=>$this->input->post("father"),
                   "mother"=>$this->input->post("mother"),
                  "address"=>$this->input->post("address"),
                  "phone"=>$this->input->post("phone"),
                  "p_phone"=>$this->input->post("p_phone"),
                 "blood"=>$this->input->post("blood"),
                "nationality"=>$this->input->post("nationality"),
                "state"=>$this->input->post("state"),
                 "district"=>$this->input->post("district"),
                 "taluk"=>$this->input->post("taluk"),
                 "panchayath"=>$this->input->post("panchayath"),
                  "block"=>$this->input->post("block"),  
                  "income"=>$this->input->post("income"),
                  "aadhar"=>$this->input->post("aadhar"),
                  "skills"=>$this->input->post("skills"),
                  "h_qualification"=>$this->input->post("h_qualification"),
                 "passingdate"=>$this->input->post("passingdate"));
        if($this->input->post("update"))
        {   //echo "hi";exit();
            $this->load->model('mainmodel');
            $id=$this->input->post("id");
            $this->mainmodel->updateaction($a,$id);
            redirect('main/updatestud','refresh');
        }
    }
    else
    {
          redirect(base_url().'main/index');

    }
  }
 /*@function name:adno**
 
    *@function:Page for selecting admission number**
     *@module:admin
    *@author:Varsha S
    **@date:06/03/2021**/
public function adno()
{
 if($_SESSION['logged_in']==true && $_SESSION['usertype']=='0')
   {  
  $this->load->view('adno');
   }
  else
  {
    redirect(base_url().'main/index');
  }
  
}
/*@function name:resume**
    *@function:viewing short resume**
     *@module:admin
    *@author:Varsha S
    **@date:06/03/2021**/
public function resume()
{ 
  if($_SESSION['logged_in']==true && $_SESSION['usertype']=='0')
           {
            $this->load->model('mainmodel');
            $id=$this->input->post("ad_no");
            $data['user_data']=$this->mainmodel->resume($id);
            $this->load->view("shortresume",$data);
             
     }
  else
  {
    redirect(base_url().'main/index');
  }
  
}
/*****@author:revathy*****/
/***@date:05/03/2021**/
/***@module:trainer***/
/***@function:viewing page to add subject name and upload course materials***/

public function upload()
{
  if($_SESSION['logged_in']==true && $_SESSION['usertype']=='2')
           {
                $this->load->view('fileupload');
            }
  else
  {
    redirect(base_url().'main/index');
  }
  
}
/*****@@author:revathy*****/
/***@date:05/03/2021**/
/***@module:trainer ***/
/***@function: uploading course materials***/
public function fileupload()
{
if($_SESSION['logged_in']==true && $_SESSION['usertype']=='2')
{

$this->load->library('form_validation');
$this->form_validation->set_rules("subject","subject",'required');
$this->form_validation->set_rules("date","date",'required');
$this->load->model('mainmodel');
$config['upload_path']='./files/';
$config['allowed_types']='gif|jpg|png|pdf|doc';
$config['max_size']=1000;
$config['max_height']=1024;
$config['max_width']=70;
$this->load->library('upload',$config);
if(!$this->upload->do_upload('file'))
{
$error=array('error'=>$this->upload->display_errors());
//print_r($error);
}
else
{
$data=array('file'=>$this->upload->data());
$img=$data['file']['file_name'];
}
$a=array("subject"=>$this->input->post("subject"),
"date"=>$this->input->post("date"),'file'=>$img);
$this->mainmodel->uploadfile($a);
redirect(base_url().'main/upload');

}

  else
        {
            redirect(base_url().'main/index');
        }
                   
        }
/*****@author:revathy*****/
/***@date:05/03/2021**/
/***@module:trainer module***/
/***@function:course materials***/

public function pdf()
{ 
if($_SESSION['logged_in']==true && $_SESSION['usertype']=='1'|'2')
{
$this->load->model('mainmodel');
$data['n']=$this->mainmodel->view_materials();
$this->load->view('pdfview',$data);
}
else
        {
            redirect(base_url().'main/index');
        }
                   
 }

/*****@author:revathy*****/
/***@date:05/03/2021**/
/***@module:trainer and admin***/
/***@function:viewing leave application ***/

public function view_leave()
{ 
  
if($_SESSION['logged_in']==true && $_SESSION['usertype']=='2')
{ 
  $this->load->model('mainmodel');
  $data['n']=$this->mainmodel->leaveview();
  $this->load->view('appliedleave',$data);
}
else
        {
            redirect(base_url().'main/index');
        }
                   
}

public function view_leave2()
{
  
if($_SESSION['logged_in']==true && $_SESSION['usertype']=='0')
{ 
  $this->load->model('mainmodel');
  $data['n']=$this->mainmodel->leaveview2();
  $this->load->view('trainerleaveview',$data);
}
  else
  {
    redirect(base_url().'main/index');
  }
}
/********** and view grievance
  @author:asha
  @5/03/2021
  @module student
  @view grievance
  ********/
   public function viewgrievance()
    {
if($_SESSION['logged_in']==true && $_SESSION['usertype']=='0')
{ 
        $this->load->model('mainmodel');
        $data['n']=$this->mainmodel->viewgrievance();
        $this->load->view('addgrievanceview',$data);
    }  
  else
  {
    redirect(base_url().'main/index');
  }
}
  /**********Add mark and view functions
  @author:asha
  @5/03/2021
  @module trainer
  @add and view mark
  ********/
  public function addmark()
{
if($_SESSION['logged_in']==true && $_SESSION['usertype']=='2')
{   

    $this->load->view('addmark');
}
  else
  {
    redirect(base_url().'main/index');
  }
}
public function addmarkaction()
{
if($_SESSION['logged_in']==true && $_SESSION['usertype']=='2')
{

    $this->load->library('form_validation');
    $this->form_validation->set_rules("ad_no","addmission number",'required');
    $this->form_validation->set_rules("assesment","assesment",'required');
    $this->form_validation->set_rules("sub1","sub1",'required');
    $this->form_validation->set_rules("sub1mark","sub1mark",'required');
    $this->form_validation->set_rules("sub2","sub2",'required');
    $this->form_validation->set_rules("sub2mark","sub2mark",'required');
    $this->form_validation->set_rules("sub3","sub3",'required');
    $this->form_validation->set_rules("sub3mark","sub3mark",'required');
    $this->form_validation->set_rules("sub4","sub4",'required');
    $this->form_validation->set_rules("sub4mark","sub4mark",'required');
    $this->form_validation->set_rules("sub5","sub5",'required');
    $this->form_validation->set_rules("sub5mark","sub5mark",'required');
    $this->form_validation->set_rules("lab1","lab1",'required');
    $this->form_validation->set_rules("lab2","lab2",'required');
    $this->form_validation->set_rules("total","total",'required');
    $this->form_validation->set_rules("percentage","percentage",'required');
 
    if($this->form_validation->run())
    {
       $id=$this->session->id;
      $this->load->model('mainmodel');
      $a=array("ad_no"=>$this->input->post("ad_no"),
           "assesment"=>$this->input->post("assesment"),
           "sub1"=>$this->input->post("sub1"),
           "sub1mark"=>$this->input->post("sub1mark"),
           "sub2"=>$this->input->post("sub2"),
           "sub2mark"=>$this->input->post("sub2mark"),
           "sub3"=>$this->input->post("sub3"),
           "sub3mark"=>$this->input->post("sub3mark"),
            "sub4"=>$this->input->post("sub4"),
           "sub4mark"=>$this->input->post("sub4mark"),
            "sub5"=>$this->input->post("sub5"),
           "sub5mark"=>$this->input->post("sub5mark"),
            "lab1"=>$this->input->post("lab1"),
           "lab2"=>$this->input->post("lab2"),
            "total"=>$this->input->post("total"),
           "percentage"=>$this->input->post("percentage"));
        $this->mainmodel->addmarkaction($a);
        redirect(base_url().'main/addmark');
    }
  }
else
{
  redirect(base_url().'main/index');
}
}
    /**********home page
  @author:asha
  @5/03/2021
  @index.php
  ********/
   public function index()
  {

       $this->load->view('index');
  }

   /**********add trainers page
  @author:asha
  @5/03/2021
  @module admin
  @addtrainer.php
  ********/
  public function addtrainer()
  {
if($_SESSION['logged_in']==true && $_SESSION['usertype']=='0')
{
       $this->load->view('addtrainer');
  }
else
{
  redirect(base_url().'main/index');
}
}   
  public function addtraineraction()
{
    if($_SESSION['logged_in']==true && $_SESSION['usertype']=='0')
{

    $this->load->library('form_validation');
    $this->form_validation->set_rules("name","name",'required');
    $this->form_validation->set_rules("address","address",'required');
    $this->form_validation->set_rules("phoneno","phoneno",'required');
    $this->form_validation->set_rules("email","email",'required');
    $this->form_validation->set_rules("gender","gender",'required');
    $this->form_validation->set_rules("dob","dob",'required');
    $this->form_validation->set_rules("qualification","qualification",'required');
    $this->form_validation->set_rules("certifications","certifications",'required');
    $this->form_validation->set_rules("skills","skills",'required');
    $this->form_validation->set_rules("username","username",'required');
    $this->form_validation->set_rules("password","password",'required');
 
    if($this->form_validation->run())
    {
         $this->load->model('mainmodel');
         $pass=$this->input->post("password");
         $encpas=$this->mainmodel->encpas($pass);
    $a=array("name"=>$this->input->post("name"),
             "address"=>$this->input->post("address"),
             "phoneno"=>$this->input->post("phoneno"),
             "email"=>$this->input->post("email"),
             "gender"=>$this->input->post("gender"),
             "dob"=>$this->input->post("dob"),
             "qualification"=>$this->input->post("qualification"),
             "certifications"=>$this->input->post("certifications"),
             "skills"=>$this->input->post("skills"));
    $b=array("username"=>$this->input->post("username"),
                  "password"=>$encpas,
                    "usertype"=>'2');

    $this->mainmodel->addtraineraction($a,$b);
 
  redirect(base_url().'main/addtrainer');
    }
}
    else
{
  redirect(base_url().'main/index');
}
}
/*@function name:viewtrainer**
    *@function:Viewing trainer's**
     *@module:admin
    *@author:Asha Chandran
    **@date:06/03/2021**/


         public function viewtrainer()
    {
     if($_SESSION['logged_in']==true && $_SESSION['usertype']=='0')
     {
        $this->load->model('mainmodel');
        $data['n']=$this->mainmodel->viewtrainer();
        $this->load->view('addtrainerview',$data);
    } 
       else
{
  redirect(base_url().'main/index');
}
}


/*@function name:logout**
    *@function:logout process**
     *@module:admin
    *@author:Varsha S
    **@date:06/03/2021**/

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
            redirect('main/index','refresh');
        }
        else{
            redirect('/');
        }
    }
  /*@function name:reject**
    *@function:Rejecting student's leave request**
     *@module:trainer
    *@author:Varsha S
    **@date:05/03/2021**/
     public function reject()
    {
     
       if($_SESSION['logged_in']==true && $_SESSION['usertype']=='2')
                  {
        $this->load->model('mainmodel');
        $id=$this->uri->segment(3);
        $this->mainmodel->reject($id);
        redirect('main/view_leave','refresh');
                   }
     else
                {
              redirect(base_url().'main/index');
                }
     }       
    /*@function name:approve**
    *@function:approval of student's leave request**
     *@module:trainer
    *@author:Varsha S
    **@date:06/03/2021**/
      public function approve()
    {
         
if($_SESSION['logged_in']==true && $_SESSION['usertype']=='2')
  {
        $this->load->model('mainmodel');
        $id=$this->uri->segment(3);
        $this->mainmodel->approve($id);
        redirect('main/view_leave','refresh');
    }   
   else
                {
              redirect(base_url().'main/index');
                }
     }              
     /*@function name:tr_reject**
    *@function:rejecting trainer's leave request**
     *@module:admin
    *@author:Revathy T S
    **@date:06/03/2021**/
    public function tr_reject()
    {
      if($_SESSION['logged_in']==true && $_SESSION['usertype']=='0')
         {
        $this->load->model('mainmodel');
        $id=$this->uri->segment(3);
        $this->mainmodel->tr_reject($id);
        redirect('main/view_leave2','refresh');
         }
      else
                {
              redirect(base_url().'main/index');
                }
     }  
    /*@function name:tr_reject**
    *@function:approval of trainer's leave request**
     *@module:admin
    *@author:Revathy T S
    **@date:06/03/2021**/
      public function tr_approve()
    {
  if($_SESSION['logged_in']==true && $_SESSION['usertype']=='0')
         {
        $this->load->model('mainmodel');
        $id=$this->uri->segment(3);
        $this->mainmodel->tr_approve($id);
        redirect('main/view_leave2','refresh');
    } 
          else
                {
              redirect(base_url().'main/index');
                }
     }  
  
  /*@function name:selectadno**
    *@function:for selecting admission number**
     *@module:student
    *@author:Varsha S
    **@date:06/03/2021**/
public function selectadno()
{
if($_SESSION['logged_in']==true && $_SESSION['usertype']=='1')
{ 
  $this->load->view('selectadno');
}
 else
      {
    redirect(base_url().'main/index');
       }
     }  
public function selectadno2()
{
if($_SESSION['logged_in']==true && $_SESSION['usertype']=='2')
{ 
  $this->load->view('selectadno_trainer');
}
 else
      {
    redirect(base_url().'main/index');
       }
     }  
    
/*@function name:viewmarks**
    *@function:viewing marks**
     *@module:student
    *@author:Varsha S
    **@date:06/03/2021**/

public function viewmarks()
{      
if($_SESSION['logged_in']==true && $_SESSION['usertype']=='1')
{
            $this->load->model('mainmodel');
            $id=$this->input->post("adno");
            $data['user_data']=$this->mainmodel->viewmarks($id);
            $this->load->view("addmarkview",$data);
}
   else
      {
    redirect(base_url().'main/index');
       }
     }  

  public function viewmarks2()
{      
if($_SESSION['logged_in']==true && $_SESSION['usertype']=='2')
{
            $this->load->model('mainmodel');
            $id=$this->input->post("adno");
            $data['user_data']=$this->mainmodel->viewmarks_tr($id);
            $this->load->view("markview_tr",$data);
}
   else
      {
    redirect(base_url().'main/index');
       }
     }  
    

    /*@function name:trainerleave**
    @function:viewing leave form
     *@module:trainer
    @author:Revathy T S
    **@date:06/03/2021**/

public function trainerleave()
{
if($_SESSION['logged_in']==true && $_SESSION['usertype']=='2')
{
$this->load->view('trainerleave');
}
  else
      {
    redirect(base_url().'main/index');
       }
     }  
    /*@function name:tr_leave_action**
    @function:inserting leave details
     *@module:trainer,student
    @author:Revathy T S
    **@date:06/03/2021**/
public function tr_leave_action()
{
if($_SESSION['logged_in']==true && $_SESSION['usertype']=='2')
{
$this->load->library('form_validation');
$this->form_validation->set_rules("leavetype","leavetype",'required');
$this->form_validation->set_rules("fromdate","fromdate",'required');
$this->form_validation->set_rules("todate","todate",'required');
$this->form_validation->set_rules("reason","reason",'required');
if($this->form_validation->run())
{

$this->load->model('mainmodel');
$config['upload_path']='./files/';
$config['allowed_types']='gif|jpg|png|pdf|doc';
$config['max_size']=1000;
$config['max_height']=1024;
$config['max_width']=750;
$this->load->library('upload',$config);
if(!$this->upload->do_upload('file_upload'))
{
$error=array('error'=>$this->upload->display_errors());
//print_r($error);
}
else{

$data=array('file_upload'=>$this->upload->data());
$img=$data['file_upload']['file_name'];
}
// $lid=$_SESSION['id'];
// $sid=$this->mainmodel->insert_sid($lid);
$id=$this->session->id;
$a=array("leave_type"=>$this->input->post("leavetype"),
"from_date"=>$this->input->post("fromdate"),
"to_date"=>$this->input->post("todate"),
"reason"=>$this->input->post("reason"),
     "file_upload"=>$img,"tid"=>$id);
$this->mainmodel->insert_leave2($a);
redirect(base_url().'main/leaveapplication');
}
}


else
      {
    redirect(base_url().'main/index');
       }
} 
/**********trainerview grievance
  @author:revathy
  @5/03/2021
  @module trainer
  @view grievance
  ********/
    public function viewgrievance2()
    {
      if($_SESSION['logged_in']==true && $_SESSION['usertype']=='2')
        {

              $this->load->model('mainmodel');
              $data['n']=$this->mainmodel->viewgrievance2();
              $this->load->view('tr_view_grievance',$data);
        }  
        else
      {
    redirect(base_url().'main/index');
       }
} 
public function rules()
{
  if($_SESSION['logged_in']==true && $_SESSION['usertype']=='1')
        {
             $this->load->view('rules');
        }
     else
      {
    redirect(base_url().'main/index');
       }
}        
  public function rules1()
{
  if($_SESSION['logged_in']==true && $_SESSION['usertype']=='2')
        {
         $this->load->view('rules1');
        }
    else
      {
    redirect(base_url().'main/index');
       }
}          
public function rules2()
{
  if($_SESSION['logged_in']==true && $_SESSION['usertype']=='0')
        {
           $this->load->view('rules2');

      }
      else
      {
    redirect(base_url().'main/index');
       }
}         


}
