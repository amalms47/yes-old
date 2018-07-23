<?php



class Administrator extends CI_Controller
{
private $data= array("fullname"=>"unknown","username"=>"unknown","role"=>"unknown","emailid"=>"unknown","phoneno"=>"unknown","log_date"=>"unknown","photo"=>"none.jpg","active"=>0);
public function __construct() {     parent::__construct();   }

//************************common function to validate or redirect**********************//
public function isAuthorized()
{
if (!($this->session->has_userdata('admid')))   {           redirect(base_url() . "Exceptions");         }// you are not authorized
else
{
    $this->data["username"]=$this->session->userdata("username");
    $this->data["fullname"]=$this->session->userdata("fullname");
     $this->data["role"]=$this->session->userdata("role");
     $this->data["active"]=$this->session->userdata("active");
    $this->data["emailid"]=$this->session->userdata("emailid");
    $this->data["phoneno"]=$this->session->userdata("phoneno");
    $this->data["logdate"]=date('d/m/Y h:i:s  A', strtotime($this->session->userdata("logdate")));//date("d/m/Y ", strtotime($this->session->userdata("logdate")));
    $this->data["photo"]= base_url()."assets/backend/images/adminlogo/".$this->session->userdata("photo");
}
}

public function updateTime(){
if (!($this->session->has_userdata('admid')))   {           redirect(base_url() . "page404");         }// you are not authorized
$this->load->model("AdminModel","Admin");
  date_default_timezone_set('Asia/Calcutta');
$this->Admin->updatetime($this->session->userdata('admid'),array('logdate'=>date('Y-m-d H:i:s')));
}

public function isLocked(){return false;}
public function unLock(){ return true;}


//************************common function to validate or redirect**********************//

//*******************url redirection********************//
public function login(){
    $this->load->view("administrator/login");

}

public function mailbox(){

        $this->isAuthorized();$this->data["pageview"]="mailbox";
        $this->load->view("administrator/common/template",$this->data);

}
public function composemail(){

    $this->isAuthorized();$this->data["pageview"]="composemail";
    $this->load->view("administrator/common/template",$this->data);
}


public function home(){

    $this->isAuthorized();$this->data["pageview"]="home";
    $this->load->view("administrator/common/template",$this->data);

}

public function subadminlist(){
    $this->isAuthorized();
    $this->data["pageview"]="subadmin";
    $this->load->view("administrator/common/template",$this->data);
}

    public function studentlist(){
    $this->isAuthorized();
    $this->data["pageview"]="studentlist";
    $this->load->view("administrator/common/template",$this->data);
}
public function collegelist(){
    $this->isAuthorized();
    $this->data["pageview"]="colleges";
    $this->load->view("administrator/common/template",$this->data);
}


    public function notactivatedcolleges(){
        $this->isAuthorized();
        $this->data["pageview"]="notactivated";
        $this->load->view("administrator/common/template",$this->data);
    }


    public function inactiveclg(){
        $this->isAuthorized();
        $this->data["pageview"]="inactiveclg";
        $this->load->view("administrator/common/template",$this->data);
    }

    public function enquirylist(){
        $this->isAuthorized();
        $this->data["pageview"]="isenquiry";
        $this->load->view("administrator/common/template",$this->data);
    }
public function profilesetting(){
    $this->isAuthorized();
    $this->data["pageview"]="settings";
    $this->load->view("administrator/common/template",$this->data);
}

public function courses(){
    $this->isAuthorized();
    $this->data["pageview"]="courses";
    $this->load->view("administrator/common/template",$this->data);
}


    public function category(){
        $this->isAuthorized();
        $this->data["pageview"]="category";
        $this->load->view("administrator/common/template",$this->data);
    }

public function logout()
{
if (!($this->session->has_userdata('admid')))   {           redirect(base_url() . "page404");         }// you are not authorized
$this->isAuthorized();
    $this->session->sess_destroy();
    redirect("yessecure-adminlogin");
}
//*******************url redirection********************//



//*******************login form page******************//
public function getprofilephoto()
{
if($this->input->is_ajax_request()==false) {      redirect(base_url() . "Exceptions/page_400");    }//bad rrequest
    $this->output->set_content_type('application/json');
    $username=$this->input->post("username");
    $this->load->model("AdminModel","Admin");
    $result=$this->Admin->getprofilephoto(array("username"=>$username));
    $this->output->set_output(json_encode(['photo' => base_url()."assets/backend/images/adminlogo/".$result]));
}

public function signin()
{

if($this->input->is_ajax_request()==false) {      redirect(base_url() . "Exceptions/page_400");    }//bad rrequest
$this->output->set_content_type('application/json');
$data=$this->input->input_stream();
$data["active"]=1;$data["superkey"]=1;$data["password"]=hash('sha256',$data["password"].SALT);
$this->load->model("AdminModel","Admin");
$result=$this->Admin->signin($data);
$message="Sorry!... User Authorization Process  Failed";
 if(!isset($result["error"]))
{
$user = $result['admin'][0];
$this->session->set_userdata($user);
/*** send email to notify the admin  to change the super key***/

/*** send email to notify the admin  to change the super key***/
$this->updateTime();
$this->output->set_output(json_encode(['url' => base_url()."admin-home",'error'=>0]));
}
else
{
$this->output->set_output(json_encode(['message' =>$message,'error'=>1]));
}
}
//*******************login form page******************//
//
//
//
//******************subadmin form page***************//
public function savesubadmin()
{
    if($this->input->is_ajax_request()==false) {      redirect(base_url() . "Exceptions/page_400");    }//bad rrequest
    $this->isAuthorized();
    $data=$this->input->input_stream();
    $data["password"]=hash('sha256',$data["password"].SALT);
    $this->load->model("AdminModel","Admin");
    $result=$this->Admin->savesubadmin($data);
    $this->output->set_content_type('application/json');
    if($result>0)
    $this->output->set_output(json_encode(['message' =>"Your request was successfully performed",'error'=>0]));
    else
    $this->output->set_output(json_encode(['message' =>"Your request was unsuccessfully performed",'error'=>1]));
}

    public function sendadminmail($to=null,$message=null,$subject=null)
    {
        $config = Array('protocol' => 'smtp','smtp_host' => 'ssl://smtp.googlemail.com','smtp_port' => 25,'smtp_user' => 'code.buildfromzero@gmail.com','smtp_pass' => 'zxsaqw21`','charset' => 'iso-8859-1','wordwrap' => TRUE);
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");

        $this->email->from('code.buildfromzero@gmail.com');
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);
        $isdone=-1;
        if ($this->email->send()) {
            $isdone = 1;
        }
        return $isdone;
    }


public function updatesubadmin()
{
    if($this->input->is_ajax_request()==false) {      redirect(base_url() . "Exceptions/page_400");    }//bad rrequest
    $this->isAuthorized();
    $data=$this->input->input_stream();   unset($data['password']);
    $this->load->model("AdminModel","Admin");
    $result=$this->Admin->updatesubadmin($data);
    $this->output->set_content_type('application/json');
    if($result>0)
    $this->output->set_output(json_encode(['message' =>"Your request was successfully performed",'error'=>0]));
    else
    $this->output->set_output(json_encode(['message' =>"Your request was unsuccessfully performed",'error'=>1]));
}


public function loadsubadmin()
{
    if($this->input->is_ajax_request()==false) {      redirect(base_url() . "Exceptions/page_400");    }//bad rrequest
    $this->isAuthorized();
    $this->load->model("AdminModel","Admin");
    $result=$this->Admin->loadsubadmin($this->session->userdata("admid"));
      $this->output->set_content_type('application/json');
    if(!isset($result["error"]))
    {
     $data= $result["admin"];
    foreach($data as $key => $value)
    $data[$key]['photo'] = base_url()."assets/backend/images/".$data[$key]['photo'];
    $this->output->set_output(json_encode(['admins' =>$data,'error'=>0]));
    }
    else
    $this->output->set_output(json_encode(['message' =>"No  administrator list is found at server",'error'=>1]));
}

public function getadminbyid()
{
    if($this->input->is_ajax_request()==false) {      redirect(base_url() . "Exceptions/page_400");    }//bad rrequest
    $this->isAuthorized();
    $this->load->model("AdminModel","Admin");
    $id=$this->input->post('id');
    $result=$this->Admin->getadminbyid($id);
    $this->output->set_content_type('application/json');
    $this->output->set_output(json_encode(['admins' =>$result["admin"][0],'error'=>0]));
}

public function changeactive()
{
    if($this->input->is_ajax_request()==false) {      redirect(base_url() . "Exceptions/page_400");    }//bad rrequest
    $this->isAuthorized();
    $data=$this->input->input_stream();
    $this->load->model("AdminModel","Admin");
    $result=$this->Admin->changeactive($data);
    $this->output->set_content_type('application/json');
    if($result>0)
    $this->output->set_output(json_encode(['message' =>"Your request was successfully performed",'error'=>0]));
    else
    $this->output->set_output(json_encode(['message' =>"Your request was unsuccessfully performed",'error'=>1]));
}
//******************subadmin form page***************//
//******************colleges form page***************//
public function getcollegebyid()
{
 if($this->input->is_ajax_request()==false) {      redirect(base_url() . "Exceptions/page_400");    }//bad rrequest
$this->isAuthorized();
$data=$this->input->input_stream();
$this->output->set_content_type('application/json');
$this->load->model("AdminModel","Admin");
 $result=$this->Admin->getcollegebyid($data);
 $result["colleges"][0]["cover"]= base_url()."assets/backend/images/collegecover/". $result["colleges"][0]["cover"];
 $result["colleges"][0]["logo"]= base_url()."assets/backend/images/collegelogo/". $result["colleges"][0]["logo"];
  $result["colleges"][0]["brochure"]= base_url()."assets/backend/brochure/". $result["colleges"][0]["brochure"];
$this->output->set_output(json_encode(['colleges' =>$result["colleges"][0]]));
}


    public function sample(){

        $this->output->set_content_type('application/json');

        $this->load->model("AdminModel","admin");
        $result=$this->admin->samplefn();
        //$a=1;
        //if($a>0){

        if(!isset($result['error'])){

            $data="amalmsasd";
            $this->output->set_output(json_encode(['colleges' =>$data,'error'=>"0"]));
        }
        else{

            $data="po";
            $this->output->set_output(json_encode(['colleges' =>$data,'error'=>"1"]));
        }

    }


public function getcolleges()
{
    if($this->input->is_ajax_request()==false) {      redirect(base_url() . "Exceptions/page_400");    }//bad rrequest
    $this->isAuthorized();

    $this->output->set_content_type('application/json');
    $data=$this->input->input_stream();
    $this->load->model("AdminModel","admin");

    if($data['option']==1){$data['active']=0;}
    if($data['option']==0){$data['active']=1;}

        if ($data['search'] == "") {
            unset($data['search']);
        }
    if($data['category']!=""){$data['type']=$data['category'];}
        unset($data['option']);
        unset($data['category']);


    $result = $this->admin->getcollegedata($data);

     $num=$this->admin->countcollege($data);
    $tot_pages=ceil($num/9);

    if(!isset($result["error"]))
    {

        $data= $result["colleges"];
        foreach($data as $key => $value)
            $data[$key]['logo'] = base_url()."assets/backend/images/collegelogo/".$data[$key]['logo'];
        $this->output->set_output(json_encode(['colleges' =>$data,'page_count'=>$tot_pages,'error'=>"0"]));
    }
    else {
        $this->output->set_output(json_encode(['message' => "No  administrator list is found at server", 'error' => 1]));
    }
}
//******************colleges form page***************//


public function changecollegeactive(){

    if($this->input->is_ajax_request()==false) {      redirect(base_url() . "Exceptions/page_400");    }//bad rrequest
    $this->isAuthorized();
    $data=$this->input->input_stream();

    $this->load->model("AdminModel","Admin");
    $result=$this->Admin->changecollegeactive($data);
    $this->output->set_content_type('application/json');
    if($result>0)
        $this->output->set_output(json_encode(['message' =>"Your request was successfully performed",'error'=>0]));
    else
        $this->output->set_output(json_encode(['message' =>"Your request was unsuccessfully performed",'error'=>1]));

}




//******************administrator profile management**************************//
public function uploadprofilepic()
{
    if($this->input->is_ajax_request()==false) {      redirect(base_url() . "Exceptions/page_400");    }//bad rrequest
    $this->output->set_content_type('application/json');
    $this->isAuthorized();
    $this->load->helper('form');$config['upload_path']="./assets/backend/images/adminlogo/";
    $config['allowed_types'] = 'jpg|gif|png';$config['file_name']='admin'.mt_rand(100000, 999999);
    $config['max_height']='250';$config['max_width']='250'; $config['max_size']='50kb';$config["overwrite"]=true;
    $this->load->library('upload',$config);
    if(!$this->upload->do_upload("propic"))
    {
    $error = array('error' => $this->upload->display_errors());
    $this->output->set_output(json_encode(['message' => "file is not specified or not supported (size should be below 50kb)<br>Allowed type should be png,gif or jpeg type<br> Width X Height (250px X 250px) ", 'error'=>1]));
    return false;
    }
    else
    {
       $data=$this->upload->data();
       $path="./assets/backend/images/adminlogo/".$this->session->userdata("photo");
       $option=false;
       if(file_exists($path))
       {
           $option=true;
           unlink($path);
       }
       $this->load->model("AdminModel","Admin");
      $result=$this->Admin->uploadprofilepic($data['file_name'],$this->session->userdata("admid"));
        $users=$this->Admin->getadminbyid($this->session->userdata("admid"));
      $user = $users['admin'][0];$this->session->set_userdata($user);
      $this->output->set_output(json_encode(['message' =>"Your request was successfully performed!..",'error'=>"0"]));

      }
}

public function saveprofile()
{
    if($this->input->is_ajax_request()==false)  {      redirect(base_url() . "Exceptions/page_400");    }//bad rrequest
     $this->isAuthorized();
      $data=$this->input->input_stream();
      $data["id"]=$this->session->userdata("admid");
     $this->load->model("AdminModel","Admin");
     $result=$this->Admin->updatesubadmin($data);
     $this->output->set_content_type('application/json');
    if($result>0)
    {
        $users=$this->Admin->getadminbyid($this->session->userdata("admid"));
      $user = $users['admin'][0];$this->session->set_userdata($user);
    $this->output->set_output(json_encode(['message' =>"Your request was successfull performed",'error'=>0]));
    }
    else
    $this->output->set_output(json_encode(['message' =>"Your request was unsuccessfull performed",'error'=>1]));
}
public function savepassword()
{
    if($this->input->is_ajax_request()==false) {      redirect(base_url() . "Exceptions/page_400");    }//bad rrequest
     $this->isAuthorized();
     $data=$this->input->input_stream();
    $data["oldpassword"]= hash('sha256',$data["oldpass"].SALT);
    $data["password"]=hash('sha256',$data["newpass"].SALT);
     $data["id"]=$this->session->userdata("admid");
    unset($data["reppass"]);unset($data["newpass"]);unset($data["oldpass"]);
     $this->load->model("AdminModel","Admin");
     $result=$this->Admin->savepassword($data);
          $this->output->set_content_type('application/json');
      if($result>0)
    $this->output->set_output(json_encode(['message' =>"Your request was successfull performed",'error'=>0]));
        else
    $this->output->set_output(json_encode(['message' =>"Your request was unsuccessfull performed",'error'=>1]));
}
//******************administrator profile management**************************//

//**************************** administrator course section*************************************//
public function getcoursecategory()
{
    if($this->input->is_ajax_request()==false) {      redirect(base_url() . "Exceptions/page_400");    }//bad rrequest
     $this->isAuthorized();
     $this->load->model("Course","Course");
     $result=$this->Course->getcoursecategory();
           $this->output->set_content_type('application/json');
     if(!isset($result["error"]))
     {
     $this->output->set_output(json_encode(['category' => $result["category"],'error'=>0]));
     }
     else
     {
         $this->output->set_output(json_encode(['category' => 'no information found','error'=>1]));
     }
}
public function getcourselevel()
{
   if($this->input->is_ajax_request()==false) {      redirect(base_url() . "Exceptions/page_400");    }//bad rrequest
     $this->isAuthorized();
     $this->load->model("Course","Course");
     $result=$this->Course->getcourselevel();
      $this->output->set_content_type('application/json');
     if(!isset($result["error"]))
     {
     $this->output->set_output(json_encode(['level' => $result["level"],'error'=>0]));
     }
     else
     {
         $this->output->set_output(json_encode(['level' => 'no information found','error'=>1]));
     }
}

public function savecourse()
{
     if($this->input->is_ajax_request()==false) {      redirect(base_url() . "Exceptions/page_400");    }//bad rrequest
     $this->isAuthorized();
    $data=$this->input->input_stream();
    $this->load->model("Course","Course");
     $result=$this->Course->saveallcourse($data);
     $this->output->set_content_type('application/json');
      if ($result > 0)  {$this->output->set_output(json_encode(['message' =>"succesfully saved data",'error'=>"0"]));    }
     else{$this->output->set_output(json_encode(['message' =>"requested action was unsuccessfull",'error'=>"1"]));    }


}

public function updateallcourse()
{
     if($this->input->is_ajax_request()==false) {      redirect(base_url() . "Exceptions/page_400");    }//bad rrequest
     $this->isAuthorized();
    $data=$this->input->input_stream();
    $this->load->model("Course","Course");
     $result=$this->Course->updateallcourse($data);
     $this->output->set_content_type('application/json');
      if ($result > 0)  {$this->output->set_output(json_encode(['message' =>"succesfully saved data",'error'=>"0"]));    }
     else{$this->output->set_output(json_encode(['message' =>"requested action was unsuccessfull",'error'=>"1"]));    }
}
public function getcourses()
{
    if($this->input->is_ajax_request()==false) {      redirect(base_url() . "Exceptions/page_400");    }//bad rrequest
    $this->isAuthorized();

    $data=$this->input->input_stream();
    $page=$data["page"];unset($data["page"]);
    $this->load->model("Course","Course");
    $result=$this->Course->getallcourses($data,$page);
    $num=$this->Course->countcourses($data);
    $tot_pages=ceil($num/10);

    $this->output->set_content_type('application/json');
      if(!isset($result["error"]))
     {
     $this->output->set_output(json_encode(['courses' => $result["courses"],'page_count'=>$tot_pages,'error'=>0]));
     }
     else
     {
         $this->output->set_output(json_encode(['courses' => 'no information found','error'=>1]));
     }
}

public function getallcoursebyid()
{
    if($this->input->is_ajax_request()==false) {      redirect(base_url() . "Exceptions/page_400");    }//bad rrequest
    $this->isAuthorized();

    $data=$this->input->input_stream();
     $this->load->model("Course","Course");
    $result=$this->Course->getallcoursebyid($data);
    $this->output->set_content_type('application/json');
      if(!isset($result["error"]))
     {
     $this->output->set_output(json_encode(['courses' => $result["courses"][0],'error'=>0]));
     }
     else
     {
         $this->output->set_output(json_encode(['courses' => 'no information found','error'=>1]));
     }
}

//**************************** administrator  course section*************************************//

    public function getCourseById()
    {
        $this->isAuthorized();
        if($this->input->is_ajax_request()==false) {     redirect(base_url() . "admin-error400");    }//bad rrequest
        $data=$this->input->input_stream();
        $where=$data;   $like=null; $select=array('*');
        $this->load->model('Yes_Institute');
        $result=$this->Yes_Institute->getCourse($where,$like,$select,null,null);
        $this->output->set_content_type('application/json');
        if(!isset($result["error"]))
        {

            $this->output->set_output(json_encode(['courses' =>$result["courses"],'iserror'=>"0"]));
        }
        else
            $this->output->set_output(json_encode(['message' =>"no information found at server",'iserror'=>"1"]));
    }
    public function getFeature()
    {
        $this->isAuthorized();
        if($this->input->is_ajax_request()==false) {     redirect(base_url() . "institute-error400");    }//bad rrequest
        $where=$this->input->input_stream();
        $this->load->model('Yes_Institute');
        $data=array("*");

        $result=$this->Yes_Institute->getFeature($data,$where);
        $this->output->set_content_type('application/json');
        if(!isset($result["error"]))
        {
            $data= $result["features"];
            foreach($data as $key => $value)
                $data[$key]['picture'] = base_url()."assets/backend/images/collegefeatures/".$data[$key]['picture'];
            $this->output->set_output(json_encode(['features' =>$data,'iserror'=>"0"]));
        }
        else
            $this->output->set_output(json_encode(['message' =>"no information found at server",'iserror'=>"1"]));
    }


    public function getEnquiry()
    {
        $this->isAuthorized();
        if($this->input->is_ajax_request()==false) {     redirect(base_url() . "institute-error400");    }//bad rrequest
        $search=$this->input->post("search");
        $page=$this->input->post("page");
        $this->load->model('AdminModel');
        $data=array('enquiry.course','enquiry.mdate','enquiry.id','enquiry.coursename','stud_tb.firstname','stud_tb.lastname','enquiry.isaview','enquiry.rdate','enquiry.student','enquiry.institute','stud_tb.lastname','stud_tb.dob','stud_tb.gender','stud_tb.email','stud_tb.photo','stud_tb.mobile','stud_tb.active','stud_tb.isblocked','institute.title');
        $like=array('enquiry.coursename'=>$search);
        $result=$this->AdminModel->getEnquiry($data,$like,$page,9);
        $num=$this->AdminModel->countEnquiry($like);
        $tot_pages=ceil($num/9);
        $this->output->set_content_type('application/json');
        if(!isset($result["error"]))
        {
            $data= $result["enquirys"];
            foreach($data as $key => $value)
            {
                $data[$key]['photo'] = base_url()."assets/backend/images/studimages/".$data[$key]['photo'];
                $data[$key]["mdate"]=date('d/m/Y h:i:s  A', strtotime( $data[$key]["mdate"]));

            }

            $this->output->set_output(json_encode(['enquirys' =>$data,'page_count'=>$tot_pages,'iserror'=>"0"]));
        }
        else
            $this->output->set_output(json_encode(['message' =>"no information found at server",'iserror'=>"1"]));
    }

    public function getEnqMsg()
    {
        $this->isAuthorized();
        if($this->input->is_ajax_request()==false) {     redirect(base_url() . "institute-error400");    }//bad rrequest
        $student=$this->input->post("student");
        $this->load->model('AdminModel');
        $data=array("enquiry.message","enquiry.id","enquiry.reply");
        $where=array("enquiry.student"=>$student);
        $result=$this->AdminModel->getEnquiry($data,$where,null,null,null);
        $this->AdminModel->setadminRead($where);

        $this->output->set_content_type('application/json');

        if(!isset($result["error"]))
            $this->output->set_output(json_encode(['enquiry' =>$result["enquirys"][0],'iserror'=>"0"]));
        else
            $this->output->set_output(json_encode(['message' =>"no information found at server",'iserror'=>"1"]));

    }

    public function getStudentlist()
    {
        $this->isAuthorized();
        if($this->input->is_ajax_request()==false) {     redirect(base_url() . "institute-error400");    }//bad rrequest
        $search=$this->input->post("search");
        $check="";
        $page=$this->input->post("page");
        $category=$this->input->post('option');
        $this->load->model('AdminModel');
        $data=array('students.name','students.studid','students.lastname','students.dob','students.gender','students.emailid','students.photo','students.mobileno','students.active','students.state','students.city','students.date','students.isblocked');
        if($category==1){$check=0;}
        if($category==0){$check=1;}
        $like=array('students.name'=>$search);
        $result=$this->AdminModel->getStudentlist($check,$data,$like,$page,9);
        $num=$this->AdminModel->countStudent($like);
        $tot_pages=ceil($num/9);
        $this->output->set_content_type('application/json');
        if(!isset($result["error"]))
        {
            $data= $result["studentslist"];
            foreach($data as $key => $value)
            {
                $data[$key]['photo'] = base_url()."assets/backend/images/studimages/".$data[$key]['photo'];
                $data[$key]["date"]=date('d/m/Y h:i  A', strtotime( $data[$key]["date"]));

            }

            $this->output->set_output(json_encode(['enquirys' =>$data,'page_count'=>$tot_pages,'iserror'=>"0"]));
        }
        else
            $this->output->set_output(json_encode(['message' =>"no information found at server",'iserror'=>"1"]));
    }

    public function Blockstudent(){

        $this->isAuthorized();
        $this->output->set_content_type('application/json');
        $studentid=$this->input->post('student');
        $this->load->model('AdminModel');
        $result=$this->AdminModel->Blockstudents($studentid);
        if($result>0){
            $this->output->set_output(json_encode(['message'=>"Operation succesfully performed"]));
        }
        else{
        $this->output->set_output(json_encode(['message'=>"Failed to update"]));
        }
    }

    public function Unblockstudent(){

        $this->isAuthorized();
        $this->output->set_content_type('application/json');
        $studentid=$this->input->post('student');
        $this->load->model('AdminModel');
        $result=$this->AdminModel->Unblockstudents($studentid);
        if($result>0){
            $this->output->set_output(json_encode(['message'=>"Operation succesfully performed"]));
        }
        else{
            $this->output->set_output(json_encode(['message'=>"Failed to update"]));
        }
    }

    public function getCollegegrid(){
        $this->isAuthorized();
        $this->output->set_content_type('application/json');
        $select=(array('institute.shortname','institute.logo','institute.regdate'));
        $this->load->model('AdminModel');
        $result=$this->AdminModel->getCollegegrid($select);
        $data= $result["values"];
        foreach($data as $key => $value)
            $data[$key]['logo'] = base_url()."assets/backend/images/collegelogo/".$data[$key]['logo'];
        $this->output->set_output(json_encode(['content'=>$data]));

    }


    public function getStudentgrid(){
        $this->isAuthorized();
        $this->output->set_content_type('application/json');
        $select=(array('students.name','students.lastname','students.date','students.photo'));
        $this->load->model('AdminModel');
        $result=$this->AdminModel->getStudentgrid($select);
        $data= $result["values"];
        foreach($data as $key => $value)
            $data[$key]['photo'] = base_url()."assets/backend/images/studimages/".$data[$key]['photo'];
        $this->output->set_output(json_encode(['content'=>$data]));

    }

    public function isnewRequests()
    {
        $this->isAuthorized();
        $this->output->set_content_type('application/json');
        $this->load->model('AdminModel');
        $result=$this->AdminModel->Checknewrequests();
        if($result>0) {
            $this->output->set_output(json_encode(['newreq' => 1,'rowcount'=>$result]));
        }
        else{
            $this->output->set_output(json_encode(['newreq' => 0]));
        }
    }

    public function getcollegecategorylist(){

        $this->isAuthorized();
        $this->output->set_content_type('application/json');
        $this->load->model('AdminModel');
        $result=$this->AdminModel->getcollegecategory();
        if(!isset($result['error'])) {
            $res=$result['value'];
            $this->output->set_output(json_encode(['content' => $res,'iserror'=>0]));
        }
        else{
            $this->output->set_output(json_encode(['message' => "No value found on server",'iserror'=>1]));
        }

    }

    public function sendcustommail(){

        $this->isAuthorized();
        $this->output->set_content_type('application/json');
        $this->load->model('AdminModel');
        $to=$this->input->post('to');
        $collegename=$this->input->post('mailtocollege');
        $subject=$this->input->post('mailsubject');
        $message=$this->input->post('message');
        $data=array('collegeemail'=>$to,'subject'=>$subject,'message'=>$message,'collegename'=>$collegename);
        $res=$this->AdminModel->sendcustommail($data);
        $this->sendadminmail($to,$message,$subject);
        if($res>0){

            $this->output->set_output(json_encode(['message'=>"Mail succesfully send",'iserror'=>0]));
        }
        else{
            $this->output->set_output(json_encode(['message'=>"Failed to send",'iserror'=>1]));
        }
    }

    public function sendmultiplemail(){

        $this->isAuthorized();
        $this->output->set_content_type('application/json');
        $this->load->model('AdminModel');
        $checkcategory=$this->input->post('to');
        $subject=$this->input->post('mailsubject');
        $message=$this->input->post('message');
        $getcollege=$this->AdminModel->getmailinstitute($checkcategory);

           if($getcollege['count']>0) {

               $colleges = $getcollege['colleges'];
                foreach ($colleges as $key=>$value) {

                    $insert = array('subject' => $subject, 'message' => $message, 'collegeemail' => $colleges[$key]['emailid'], 'collegename' => $colleges[$key]['title']);

                    $this->sendadminmail($colleges[$key]['emailid'],$message,$subject);
                    $res = $this->AdminModel->sendmultiplemail($insert);
                }
               if ($res > 0) {

                    $this->output->set_output(json_encode(['message' => "Mail send succesfully"]));
                }

            }
                else{
                    $this->output->set_output(json_encode(['message'=>"no colleges found in this category",'iserror'=>1,'coleges'=>$checkcategory]));
                }
    }



    public function getallmails(){

        $this->isAuthorized();
        $this->output->set_content_type('application/json');
        $page=$this->input->post('page');
        $search=$this->input->post('search');
        $like=array('collegeemail'=>$search);
        $this->load->model('AdminModel');
        $res=$this->AdminModel->getallmails($page,$like);
        $num=$this->AdminModel->countmail($like);
        $tot_pages=ceil($num/10);
        if(!isset($res['error'])) {
            $value=$res['value'];
            foreach($value as $key => $values)
            {
                $value[$key]["subject"]=implode(' ', array_slice(explode(' ', $value[$key]["subject"]), 0, 4));
                $value[$key]["message"]=trim(implode(' ', array_slice(explode(' ', $value[$key]["message"]), 0, 5)));
                $value[$key]["date"]=date('d/m/Y h:i  A', strtotime( $value[$key]["date"]));
            }
            $this->output->set_output(json_encode(['message' => "Value is here",'value'=>$value ,'iserror' => 0,'page_count'=>$tot_pages]));
        }
        else{
            $this->output->set_output(json_encode(['message' => "Failed  to found data", 'iserror' => 1]));
        }
    }

    public function getmailcontent(){
        $this->isAuthorized();
        $id=$this->input->post('id');
        $this->output->set_content_type('application/json');
        $this->load->model('AdminModel');
        $res=$this->AdminModel->getmailcontent($id);


        if(!isset($res['error'])) {
            $value = $res['value'];
            foreach ($value as $key => $values) {
                $value[$key]["date"] = date('d/m/Y h:i  A', strtotime($value[$key]["date"]));
            }
            $this->output->set_output(json_encode(['message' => "Value is here", 'value' => $value, 'iserror' => 0]));
        }
        else{
                $this->output->set_output(json_encode(['message' => "No data found on server", 'iserror' => 1]));
            }
    }

    public function deletemailbyid(){
        $this->output->set_content_type('application/json');
        $id=$this->input->post('id');
        $this->load->model('AdminModel');
        $res=$this->AdminModel->deletemailbyid($id);
        if($res>0) {
            $this->output->set_output(json_encode(['message' => "Succesfully deleted"]));
        }
        else{
            $this->output->set_output(json_encode(['message' => "Operation failed"]));
        }
    }

    public function getnotactivated(){

        $this->output->set_content_type('application/json');
        $this->load->model('AdminModel');
        $page=$this->input->post('page');
        $res=$this->AdminModel->getinact_colleges($page);
        $num=$this->AdminModel->countgetinact_colleges();
        $tot_pages=ceil($num/10);
        if(isset($res['values'])) {
            $value = $res['values'];
            foreach ($value as $key => $values) {
                $value[$key]["regdate"] = date('d/m/Y h:i  A', strtotime($value[$key]["regdate"]));
            }

            $this->output->set_output(json_encode(['colleges' => $value,'iserror'=>0,'page_count'=>$tot_pages,'clgcount'=>$num]));
        }
        else{
            $this->output->set_output(json_encode(['message'=>"No colleges found on server",'iserror'=>1]));
        }
}

    public function deleteinactiveclg(){

        $this->output->set_content_type('application/json');
        $id=$this->input->post('id');
        $deletedata=array('id'=>$id);
        $this->load->model('AdminModel');
        $res=$this->AdminModel->deleteinactiveclg($deletedata);
        if($res>0){
            $this->output->set_output(json_encode(['msg'=>"Succesfully deleted"]));
        }
        else{
            $this->output->set_output(json_encode(['msg'=>"Failed to delete data"]));
        }
    }

    public function getinactiveclg(){

        $this->output->set_content_type('application/json');
        $this->load->model('AdminModel');
        $pages=$this->input->post('page');
        $res=$this->AdminModel->inactiveclg($pages);
        $num=$this->AdminModel->countinactive();
        $tot_pages=ceil($num/9);
        if($res['count']>0) {
            $value = $res['values'];
            foreach ($value as $key => $values) {
                $value[$key]['logo'] = base_url()."assets/backend/images/collegelogo/".$value[$key]['logo'];
                $value[$key]["regdate"] = date('d/m/Y h:i  A', strtotime($value[$key]["regdate"]));
            }

            $this->output->set_output(json_encode(['colleges' => $value,'error'=>0,'page_count'=>$tot_pages,'message'=>"colleges found on server"]));
        }
        else{
            $this->output->set_output(json_encode(['message'=>"No colleges found on server",'error'=>1]));
        }

    }


    public function makecollegeactive(){

        if($this->input->is_ajax_request()==false) {      redirect(base_url() . "Exceptions/page_400");    }//bad rrequest
        $this->isAuthorized();
        $data=$this->input->post('id');

        $this->load->model("AdminModel","Admin");
        $result=$this->Admin->makecollegeactive($data);
        $this->output->set_content_type('application/json');
        if($result>0)
            $this->output->set_output(json_encode(['message' =>"Your request was successfully performed",'error'=>0]));
        else
            $this->output->set_output(json_encode(['message' =>"Your request was unsuccessfully performed",'error'=>1]));

    }


    public function getCategory(){

        if($this->input->is_ajax_request()==false) {      redirect(base_url() . "Exceptions/page_400");    }//bad rrequest
        $this->isAuthorized();
        $this->output->set_content_type('application/json');
        $this->load->model('Category');
        $page=$this->input->post('page');
        $search=$this->input->post('search');
        $like=array("category"=>$search);
        $data=$this->Category->getCategorylist($page,$like);
        $num=$this->Category->countCategory($like);
        $tot_pages=ceil($num/10);
        if(isset($data)) {
            $this->output->set_output(json_encode(['content' => $data,'page_count'=>$tot_pages, 'error' => 0]));
        }
        else{
            $this->output->set_output(json_encode(['message' => "No values found on server", 'error' => 1]));
        }
    }

    public function newCategory()
    {
        if($this->input->is_ajax_request()==false) {      redirect(base_url() . "Exceptions/page_400");    }//bad rrequest
        $this->isAuthorized();
        $this->output->set_content_type('application/json');
        $category=$this->input->post('category');
         $date=date("Y-m-d");
         $name=$this->session->userdata('username');
         $data=array('category'=>$category,'date'=>$date,'addedby'=>$name);
            if(!empty($data['category'])) {
            $this->load->model("Category", "Category");
            $result = $this->Category->newCategory($data);

            if ($result > 0) {
                $this->output->set_output(json_encode(['message' => "succesfully saved data", 'error' => "0"]));
            }
            else {
                $this->output->set_output(json_encode(['message' => "requested action was unsuccessfull", 'error' => "1"]));
            }
        }
        else{
            $this->output->set_output(json_encode(['message' => "something went wrong", 'error' => "2"]));
        }
    }

    public function updateCategory(){


        if($this->input->is_ajax_request()==false) {      redirect(base_url() . "Exceptions/page_400");    }//bad rrequest
        $this->isAuthorized();
        $this->output->set_content_type('application/json');
        $category=$this->input->post('category');
        $date=date("Y-m-d");
        $name=$this->session->userdata('username');
        $id=$this->input->post('catid');
        $data=array('category'=>$category,'date'=>$date,'addedby'=>$name);
        if(!empty($data['category'])) {
            $this->load->model("Category", "Category");
            $result = $this->Category->updateCategory($id,$data);

            if ($result > 0) {
                $this->output->set_output(json_encode(['message' => "succesfully updated", 'error' => "0"]));
            }
            else {
                $this->output->set_output(json_encode(['message' => "Request Failed", 'error' => "1"]));
            }
        }
        else{
            $this->output->set_output(json_encode(['message' => "something went wrong", 'error' => "2"]));
        }
    }

    public function blockCategory(){

        if($this->input->is_ajax_request()==false) {      redirect(base_url() . "Exceptions/page_400");    }//bad rrequest
        $this->isAuthorized();
        $this->output->set_content_type('application/json');
        $value=$this->input->post('option');
        $id=$this->input->post('id');
        $this->load->model("Category", "Category");
        $res=$this->Category->blockCategory($id,$value);
        if($res>0){$this->output->set_output(json_encode(['message' => "succesfully updated", 'error' => "0"]));}
    }

}
