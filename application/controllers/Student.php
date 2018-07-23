<?php
/**
 * Created by PhpStorm.
 * User: Amal
 * Date: 2/2/2017
 * Time: 5:28 PM
 */

class Student extends CI_Controller{

    private $signupdata=array("name"=>"unknown");
    private $data= array("username"=>"unknown","lastname"=>"unknown","emailid"=>"unknown","gender"=>"unknown","dob"=>"unknown","phoneno"=>"unknown","log_date"=>"unknown","photo"=>"none.jpg","active"=>0);

    public function studentloginform(){

        $this->load->view('students/student_login');
    }


    public function isAuthorized()
    {
        if (!($this->session->has_userdata('studid')))   {           redirect(base_url() . "Exceptions");         }// you are not authorized
        else
        {

            $this->data["firstname"]=$this->session->userdata("firstname");
            $this->data["lastname"]=$this->session->userdata("lastname");
            $this->data["frname"]=$this->session->userdata("fathername");
            $this->data["emailid"]=$this->session->userdata("email");
            $this->data["phoneno"]=$this->session->userdata("mobile");
            $this->data["state"]=$this->session->userdata("state");
            $this->data["city"]=$this->session->userdata("city");
            //$this->data["logdate"]=$this->session->userdata("lastlogin");
            $this->data["logdate"]=date('d/m/Y h:i  A', strtotime($this->session->userdata("lastlogin")));
            $this->data["photo"]=$this->session->userdata("photo");
            $this->data["gender"]=$this->session->userdata("gender");
            $this->data["dob"]=$this->session->userdata("dob");
            $this->data["country"]=$this->session->userdata("nationality");
            $this->data["religion"]=$this->session->userdata("religion");
            $this->data["caste"]=$this->session->userdata("caste");
            $this->data["address"]=$this->session->userdata("address");
            $this->data["active"]=$this->session->userdata("active");
        }

    }
    public function studenthome()
    {
        //should perform criteria for home activity
        $this->isAuthorized();
        $this->data["pageview"]="students/studentprofile";
        $this->load->view("common/template",$this->data);

    }

    public  function application(){
        $this->isAuthorized();
        $this->data["pageview"]="students/applicationpage";
        $this->load->view("common/template",$this->data);
    }

    public function studentsignin()//must be call through ajax - to authorize the user/college
    {
        if($this->input->is_ajax_request()==false) {      redirect(base_url() . "Exceptions/page_400");    }//bad rrequest

        $this->output->set_content_type('application/json');
        $this->load->helper('date');
        $username=$this->input->post('studemailid');
        $password=$this->input->post('studpassword');
        $pass=hash('sha256',$password.SALT);
        //$data=$this->input->input_stream();
        //$data["active"]=1;$data["password"]=hash('sha256',$data["password"].SALT);
        $data=array('email'=>$username,'password'=>$pass,'isblocked'=>0);
        $this->load->model("Yes_Student");
        $select=array('studid','fathername','firstname','lastname','photo','email','gender','dob','mobile','address','state','city','date','lastlogin','nationality','religion','caste','active');
        $result=$this->Yes_Student->isstudentuser($data,$select);
        $message="Invalid username or password";
        if(!isset($result["error"]))
        {
            $user = $result['user'][0];
            $this->session->set_userdata($user);
            $id=$this->session->userdata('studid');
            $date=date("Y/m/d H:i:s");

            /*****set session content here****/

            $check=$this->isProfilecomplete();
            if(!isset($check['error'])) {
                $this->output->set_output(json_encode(['url' => base_url() . "student-home", 'action' => "1"]));
            }
            else{
                $this->output->set_output(json_encode(['url' => base_url() . "application-form", 'action' => "0"]));
            }
            $this->Yes_Student->updatelogdate($id,$date);
        }
        else
        {
            $this->output->set_output(json_encode(['message' =>$message,'action'=>"-1"]));
        }

    }

    public function isProfilecomplete(){

        $this->output->set_content_type('application/json');
        $id=$this->session->userdata('studid');
        $this->load->model("Yes_Student");
        $res=$this->Yes_Student->isStudprocomplete($id);
        if(!isset($res['error'])){
            $return['value']='profile completed';
            $this->output->set_output(json_encode(["error"=>0]));
        }
        else {
            $return['error']='profile not completed';
            $this->output->set_output(json_encode(["error" => 1]));
        }
        return $return;
    }

    public function checkProfilecomplete(){

        $this->output->set_content_type('application/json');
        $id=$this->session->userdata('studid');
        $this->load->model("Yes_Student");
        $res=$this->Yes_Student->isStudprocomplete($id);
        if(!isset($res['error'])){
            $return['value']='profile completed';
            $this->output->set_output(json_encode(["error"=>0]));
        }
        else {

            $this->output->set_output(json_encode(["error" => 1]));
        }

    }

    public function checkloginstatus(){

        $this->output->set_content_type('application/json');
        $isid=$this->session->userdata('studid');
        if(isset($isid)!=""){
            $name=$this->session->userdata('firstname');

            $this->output->set_output(json_encode(['value'=>1,'name'=>$name]));
        }
        else{
            $this->output->set_output(json_encode(['value'=>0,'message'=>"Please login to continue"]));
        }

    }

    public function completeStudentProfile1(){

        if($this->input->is_ajax_request()==false) {      redirect(base_url() . "Exceptions/page_400");    }//bad rrequest

        $this->output->set_content_type('application/json');

        $datas=$this->input->input_stream();

        if(!empty($datas['fname']&&$datas['lname']&&$datas['frname']&&$datas['dob']&&$datas['mobile'])) {
            $this->load->model("Yes_Student");

            $id = $this->session->userdata('studid');
            $data = array('firstname' => ucfirst($datas['fname']), 'lastname' => ucfirst($datas['lname']),
                'fathername' => ucfirst($datas['frname']), 'dob' => $datas['dob'],
                'gender' => $datas['gender'], 'mobile' => $datas['mobile'],

                'religion' => $datas['religion'], 'caste' => $datas['caste']);
            $result = $this->Yes_Student->completeprofile1($id, $data);
            if ($result>0) {
                $this->session->set_userdata($data);
                $this->output->set_output(json_encode(['value' => 1, 'message' => "Successfully saved your data"]));
            } else {
                $this->output->set_output(json_encode(['value' => 0, 'message' => "Failed  to saved your data"]));
            }
        }
        else{
            $this->output->set_output(json_encode(['value'=>0,'message'=>"something went wrong"]));
       }

    }


    public function completeStudentProfile2(){

        if($this->input->is_ajax_request()==false) {      redirect(base_url() . "Exceptions/page_400");    }//bad rrequest

        $this->output->set_content_type('application/json');

        $datas=$this->input->input_stream();

        if(!empty($datas['pincode']&&$datas['city']&&$datas['address']&&$datas['address2']&&$datas['state']&&$datas['district']&&$datas['country'])) {
            $this->load->model("Yes_Student");

            $id = $this->session->userdata('studid');
            $data = array(
                'address' => $datas['address'],
                'address2' => $datas['address2'],
                'state' => $datas['state'],
                'city' => $datas['city'],
                'pincode' => $datas['pincode'],
                'district' => $datas['district'],
                'nationality' => $datas['country'],


                'tstate' => $datas['state2'],
                'tdistrict' => $datas['district2'],
                'tcity' => $datas['tcity'],
                'tpincode' => $datas['tpincode'],
                'tnationality' => $datas['tcountry'],
                'taddress' => $datas['taddress'],
                'taddress2' => $datas['taddress2']);


            $result = $this->Yes_Student->completeprofile1($id, $data);
            if ($result>0) {
                $this->session->set_userdata($data);
                $this->output->set_output(json_encode(['value' => 1, 'message' => "Successfully saved your data"]));
            } else {
                $this->output->set_output(json_encode(['value' => 0, 'message' => "Failed  to saved your data"]));
            }
        }
        else{
            $this->output->set_output(json_encode(['value'=>0,'message'=>"something went wrong"]));
        }

    }


    public function completeStudentqual(){

        if($this->input->is_ajax_request()==false) {      redirect(base_url() . "Exceptions/page_400");    }//bad rrequest

        $this->output->set_content_type('application/json');

        $datas=$this->input->input_stream();
        $id = $this->session->userdata('studid');

      if(!empty($datas['qualname']&&$datas['qualuniversity']&&$datas['qualpercent']&&$datas['qualinstitution']&&$datas['qualyear'])) {
          $this->load->model("Yes_Student");

          $data = array('studentid'=>$id,'coursetitle' => $datas['qualname'], 'courseuniversity' => $datas['qualuniversity'], 'coursepassdate' => $datas['qualyear'], 'coursemarks' => $datas['qualpercent'], 'collegename' => $datas['qualinstitution']);
          $result = $this->Yes_Student->completeprofile3($id, $data);
          if ($result > 0) {
              //$this->session->set_userdata($data);
              $this->output->set_output(json_encode(['value' => 1, 'message' => "Successfully saved"]));
          } else {
              $this->output->set_output(json_encode(['value' => 0, 'message' => "Failed  to save"]));
          }
      }

       else{
            $this->output->set_output(json_encode(['value'=>0,'message'=>"something went wrong"]));
        }

    }

    public function getstudentprofile()
    {
        if($this->input->is_ajax_request()==false) {      redirect(base_url() . "Exceptions/page_400");    }//bad rrequest
        //$this->isAuthorized();
        $this->output->set_content_type('application/json');
        $this->load->model("Yes_Student","Yes_Student");
        $res=$this->Yes_Student->getstudentprofile($this->session->userdata("studid"));
        if(!isset($res['error']))
        {


            $this->output->set_output(json_encode(['content' =>$res['value'],'error'=>0]));
        }
        else
        {
            $this->output->set_output(json_encode(['error'=>1]));
        }
    }


    /*
        public function studentview(){

            $this->load->view('students/studentfrontview');

        }
    */
    public function studentregisters(){

        $this->load->view('students/student_register');
    }




    public function studentsignup()//must be call through ajax - to register the information
    {

        if($this->input->is_ajax_request()==false) {      redirect(base_url() . "Exceptions/page_400");    }//bad rrequest



        $this->output->set_content_type('application/json');

        $email = $this->input->post('email');
        $password = $this->input->post ('cpass');
        $name = ucfirst($this->input->post('name'));
        $mobile = $this->input->post ('mobile');

        if(!empty($password&&$email&&$mobile&&$name)) {
            $pass=hash('sha256', $password. SALT);
            $data = array('firstname'=>$name,'mobile'=>$mobile,'email' => $email, 'password' => $pass);
            $message = "Something went wrong";
            $result = $this->Yes_Student->studentregister($data,$email);
            if ($result > 0) {
                $this->load->library('encrypt');
                $subject = 'Activate your Yescollege.com account';
                $emailid = $this->encrypt->encode($email);
                $emailid = str_replace(array('+', '/', '='), array('-', '_', '~'), $emailid);
                $url = base_url() . "activate-user-account/" . $emailid;
                $message = 'Hi,' . $name . "<br>" . 'To finalize your account registration click here' . "<br><a href='" . $url . "' target='_blank'>Activate Account</a>";
                $results = $this->sendmail($email, $message, $subject);
                $message = "successfully registered<br>Activation link has been send to your emailid";

                $this->output->set_output(json_encode(['message' => $message, 'action' => "0"]));
            }
            elseif($result == -1) {

                $message = "sorry you are already registered !...";
                $this->output->set_output(json_encode(['message' => $message, 'action' => "1"]));
            }
        }
        else{
            $message="Something went wrong";
            $this->output->set_output(json_encode(['message' => $message, 'action' => "1"]));

        }
    }


    public function sendmail($to = null, $message = null, $subject = null)
    {
       /* // $config = Array('protocol' => 'smtp','smtp_host' => 'ssl://smtp.zoho.com','smtp_port' => 465,'smtp_user' => 'info@yescolleges.com','smtp_pass' => 'tUG0FzFQFj2h`','charset' => 'iso-8859-1','wordwrap' => TRUE);
        $this->load->library('email');
        $this->email->set_newline("\r\n");
        $this->email->from('info@yescolleges.com');
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);
        $isdone = -1;
        if ($this->email->send()) {
            $isdone = 1;
        }
        return $isdone;*/


        $this->load->library('email');

        $config['protocol']    = 'smtp';

        $config['smtp_host']    = 'smtp.sendgrid.net';

        $config['smtp_port']    = '465';

        $config['smtp_timeout'] = '7';

        $config['smtp_user']    = 'yescollegessendgrid';

        $config['smtp_pass']    = 'asd123##';

        $config['charset']    = 'utf-8';

        $config['newline']    = "\r\n";

        $config['mailtype'] = 'html'; // or html

        $config['validation'] = TRUE; // bool whether to validate email or not

        $this->email->initialize($config);
        $this->email->set_newline("\r\n");
        $this->email->from('yescollegesinfotech@gmail.com');
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);
        $isdone = -1;
        if ($this->email->send()) {
            $isdone = 1;
        }
        return $isdone;
    }

    public function activate($token=null)
    {

        $this->load->library('encrypt');
        $this->load->model("Yes_Student");
        $token=str_replace(array('-', '_', '~'), array('+', '/', '='), $token);
        $result=$this->Yes_Student->activatestudentaccount($this->encrypt->decode($token));
        $message="account activation unsuccessfull";
        if($result>0)$message="successfully activated your account";
        redirect(base_url()."student-information/".$message);

    }
    public function information($message=null){
        $info["message"]=urldecode($message);
        $this->load->view("students/information",$info);
    }


    public function sendlink()
    {
        if($this->input->is_ajax_request()==false) {      redirect(base_url() . "Exceptions/page_400");    }//bad rrequest

        $this->output->set_content_type('application/json');
        $forgotemail=$this->input->post('emailid');

        //$data=$this->input->input_stream();
        $this->load->model("Yes_Student");
        $message="you have no account in Yescolleges.com!...";
        $result=$this->Yes_Student->is_exist_registration($forgotemail);
        if($result>0)
        {
            $this->load->library('encrypt');
            $subject='Yescolleges.com Password Resetting';
            $emailid=$this->encrypt->encode($forgotemail);
            $emailid= str_replace(array('+', '/', '='), array('-', '_', '~'), $emailid);
            /*** updation code ***/
            $date= date('d-m-Y');

            $url=base_url()."student-password/".$emailid."/$date";
            $message ='Hi,' . $forgotemail . "<br>".'To reset your account password click here.(These link have only 24 hours validity)'."<br><a href='".$url."' target='_blank'>Reset Password</a>";
            $result=$this->sendmail($forgotemail, $message,$subject);
            $message="Check your email account to reset the password!...";
        }

        $this->output->set_output(json_encode(['message' =>$message]));
    }


    public function passwordform($emailid=null,$date=null)
    {
        echo $emailid."and ".$date;
        $currentdate=date('d-m-Y');
        if($date==$currentdate)
        {
            $this->load->library('encrypt');
            $emailid=str_replace(array('-', '_', '~'), array('+', '/', '='), $emailid);
            $emailid=$this->encrypt->decode($emailid);
            $this->session->set_flashdata("emailid",$emailid);
            redirect(base_url()."student-showpassform");
        }
        else {redirect(base_url() . "Exceptions"); }
    }


    public function showpassword()
    {
        //echo  "emailid is " .$this->session->flashdata("emailid");
        $emailid=$this->session->flashdata("emailid");
        if(isset($emailid))
        {
            $data["emailid"]=$this->session->flashdata("emailid");
            $this->load->view("students/resetpassword",$data);
        }
        else {redirect(base_url() . "Exceptions"); }
    }



    public function resetpassword()
    {
        if($this->input->is_ajax_request()==false) {      redirect(base_url() . "Exceptions/page_400");    }//bad rrequest
        $this->output->set_content_type('application/json');
        $data=$this->input->input_stream();
        $data["password"]=hash('sha256',$data["password"].SALT);
        $this->load->model("Yes_Student");
        $result=$this->Yes_Student->resetpassword($data);
        $message="password reset was unsuccessfull";
        if($result>0)$message="successfully reset your  password";
        $this->output->set_output(json_encode(['message' =>$message,'action'=> base_url()."student-information/".$message]));
    }

    public function uploadstudpropic()
    {
        if($this->input->is_ajax_request()==false) {      redirect(base_url() . "Exceptions/page_400");    }//bad rrequest
        $this->output->set_content_type('application/json');

        $this->load->helper('form');
        $config['upload_path']="./assets/backend/images/studimages/";
        $config['allowed_types'] = 'jpg|png';
        $name='userphoto'.mt_rand(100000, 999999);
        $config['file_name'] = $name;
        $config['max_height']='300';
        $config['max_width']='300';
        $config['max_size']='110';
        $config["overwrite"]=true;
        $this->load->library('upload',$config);
        if(!$this->upload->do_upload("propic"))
        {

            $error = array('error' => $this->upload->display_errors());
            $this->output->set_output(json_encode(['message' => "file is not specified or not supported (size should be below 100kb)<br>Allowed type should be png or jpg type<br> Width X Height (300px X 300px) ", 'error'=>1]));
            return false;
        }
        else
        {
            $data=$this->upload->data();

            $config['image_library']='gd2';
            $config['source_image']="./assets/backend/images/studimages/".$data['file_name'];
            $config['create_thumb']=FALSE;
            $config['maintain_ratio']=TRUE;
            $config['quality']='40%';
            $config['width']=200;
            $config['height']=200;
            $config['new_image']="./assets/backend/images/studimages/".$data['file_name'];
            $this->load->library('image_lib',$config);
            $this->image_lib->resize();
            $this->load->model("Yes_Student");
            $result=$this->Yes_Student->uploadstudpropic($data['file_name'],$this->session->userdata("studid"));

            $users=$this->Yes_Student->isstudentuser(array("studid"=>$this->session->userdata("studid")));
            $user = $users['user'][0];$this->session->set_userdata($user);
            $this->output->set_output(json_encode(['message' =>"successfully saved information",'error'=>"0"]));
        }

    }



    public function saveQualification(){

        $this->output->set_content_type('application/json');
        $marks=$this->input->post('marks');
        $year=$this->input->post('year');
        $board=$this->input->post('board');
        $name=$this->input->post('name');
        $university=$this->input->post('inst');

        $data=array('coursetitle'=>$name,'courseuniversity'=>$board,'coursepassdate'=>$year,'coursemarks'=>$marks,'collegename'=>$university);
        $data['studentid']=$this->session->userdata('studid');
        $this->load->model("Yes_Student");
        $result=$this->Yes_Student->insertQualification($data);

        if($result>0){

            $message="Successfully saved";
        }
        else{
            $message="Failed to save data";
        }

        $this->output->set_output(json_encode(['message' =>"$message"]));
    }


    public function updateQualification(){

        $this->output->set_content_type('application/json');
        $marks=$this->input->post('marks');
        $year=$this->input->post('year');
        $board=$this->input->post('board');
        $name=$this->input->post('name');
        $university=$this->input->post('inst');

        $id=$this->input->post('id');
        $sid=$this->session->userdata('studid');

        $data=array('coursetitle'=>$name,'courseuniversity'=>$board,'coursepassdate'=>$year,'coursemarks'=>$marks,'collegename'=>$university);
        $data['studentid']=$this->session->userdata('studid');
        $this->load->model("Yes_Student");
        $result=$this->Yes_Student->updateQualification($data,$id,$sid);

        if($result>0){

            $message="Successfully updated";
        }
        else{
            $message="Failed to update data";
        }

        $this->output->set_output(json_encode(['message' =>"$message"]));
    }



    public function signout()//need not be call from ajax - clear the session and redirect to the college loginform
    {
        $this->session->sess_destroy();
        redirect("Yescolleges");
    }




    public function getstudentdata(){

        $this->output->set_content_type('application/json');
        if($this->input->is_ajax_request()==false) {      redirect(base_url() . "Exceptions/page_400");    }
        $data = $this->session->userdata('studid');
        $this->load->model("Yes_Student");

        $result=$this->Yes_Student->getstudentalldata($data);


        if(!isset($result["error"])){
            $user=$result['student'];
            $this->output->set_output(json_encode(['students' => $user, 'error' => 0]));
        }
        else{
            $this->output->set_output(json_encode(['error'=>1]));
        }
    }

    public function deletequalification(){

        $this->output->set_content_type('application/json');
        $id=$this->input->post('id_data');
        $studid=$this->session->userdata('studid');

        $data=array('id'=>$id,'studentid'=>$studid);
        $this->load->model('Yes_Student');
        $result=$this->Yes_Student->deletestudentqual($data);

        if($result>0){

            $this->output->set_output(json_encode(['message' =>"succesfully deleted",'action'=>"1"]));
        }
        else{
            $this->output->set_output(json_encode(['message' =>"Failed to delete data",'action'=>"0"]));
        }
    }


    public function editstudpassword(){


        $this->output->set_content_type('application/json');
        $newpass=$this->input->post('cnewpass');
        $oldpass=$this->input->post('oldpass');
        $id=$this->session->userdata('studid');
        $data=array('studid'=>$id,'password'=>$oldpass);
        $this->load->model("Yes_Student");
        $result=$this->Yes_Student->editstudpassword($data,$newpass);
        if($result>0){

            $message="Password succesfully changed";
        }
        else{

            $message="Failed to update password";
        }
        $this->output->set_output(json_encode(['message'=>$message]));
    }



    public function getrequests(){

        $this->output->set_content_type('application/json');
        $id=$this->session->userdata('studid');
        $this->load->model('Yes_Student');
        $select=array('enquiry.student','enquiry.institute','enquiry.course','enquiry.message','enquiry.mdate','enquiry.coursename','enquiry.reply','enquiry.rdate','enquiry.isiview','enquiry.isaview','enquiry.status','institute.title','institute.city','institute.logo');
        $res=$this->Yes_Student->getrequests($id,$select);
        if(!isset($res['error'])){
            $data=$res['value'];
            foreach($data as $key => $value)
            {
                $data[$key]['logo'] = base_url()."assets/backend/images/collegelogo/".$data[$key]['logo'];
                $data[$key]["mdate"]=date('d/m/Y h:i:s  A', strtotime( $data[$key]["mdate"]));

            }
            $this->output->set_output(json_encode(['values'=>$data,'error'=>0]));
        }
        else{
            $this->output->set_output(json_encode(['message'=>"Currently you made no requets",'error'=>1]));
        }

    }




    public function getnotifications(){

        $this->output->set_content_type('application/json');
        $id=$this->session->userdata('studid');
        $this->load->model('Yes_Student');
        $select=array('enquiry.id','enquiry.student','enquiry.institute','enquiry.coursename','enquiry.course','enquiry.message','enquiry.mdate','enquiry.reply','enquiry.rdate','enquiry.issview','enquiry.isiview','enquiry.isaview','enquiry.status','institute.title','institute.city','institute.logo');
        $res=$this->Yes_Student->getnotifications($id,$select);
        if(!isset($res['error'])){
            $data=$res['value'];
            foreach($data as $key => $value)
            {
                $data[$key]['logo'] = base_url()."assets/backend/images/collegelogo/".$data[$key]['logo'];
                $data[$key]["mdate"]=date('d/m/Y h:i:s  A', strtotime( $data[$key]["mdate"]));

            }
            $this->output->set_output(json_encode(['values'=>$data,'error'=>0]));
        }
        else{
            $this->output->set_output(json_encode(['message'=>"Currently you have no notifications",'error'=>1]));
        }

    }



    public function test(){

        $this->load->view('test');
    }

    public function testdata()
    {


        $this->output->set_content_type('application/json');

        $name = $this->input->post('studname');
        $num = $this->input->post('studnum');

        if (isset($name,$num)){

            $data = array('name' => $name, 'number' => $num);
            $this->load->model('Yes_Student');
            $result = $this->Yes_Student->testdata($data);
            if ($result > 0) {

                $message = "success";
            } else {

                $message = "failed";
            }
            $this->output->set_output(json_encode(['message' => "$message", 'action' => 1]));
        }
        else{

            $message="Something went wrong";

            $this->output->set_output(json_encode(['message' => "$message", 'action' => 1]));
        }
    }

    public function sendadmissionRequest(){
        $this->output->set_content_type('application/json');

        $collegeid=$this->input->post('clgid');
        $cid=$collegeid/1394;
        $courseid=$this->input->post('courseid');
        $message=$this->input->post('message');
        $id=$this->session->userdata('studid');
        $coursename=$this->input->post('coursename');

        if(!empty($courseid&&$message&&$id&&$collegeid&&$coursename)) {
            $this->load->model("Yes_Student");
            $result = $this->Yes_Student->applyadmission($id,$cid, $courseid,$message,$coursename);
            if ($result > 0) {
                $this->output->set_output(json_encode(['message' => "Request succesfully send"]));
            }
            else{
                $this->output->set_output(json_encode(['message'=>"Failed to send request"]));
            }
        }
        else{

            $this->output->set_output(json_encode(['message'=>"Something went wrong "]));}
    }

    public function checkapplied(){

        $this->output->set_content_type('application/json');

        $course = $this->input->post('courseid');

        $studid=$this->session->userdata('studid');

        $where=array('student'=>$studid,'course'=>$course);
        $this->load->model('Yes_Student');
        $check=$this->Yes_Student->checkapplied($where);
        if($check>0) {
            $this->output->set_output(json_encode(['message' => 'You already applied for this course', 'error' => 1]));
        }
        else{
            $this->output->set_output(json_encode(['error' =>0 ]));
        }

    }

    public function getAttachments(){

        $this->output->set_content_type('application/json');
        $studid=$this->session->userdata('studid');
        $this->load->model('Yes_Student');
        $res=$this->Yes_Student->getattachs($studid);

        if(!isset($res['error'])){

            $value=$res['value'];

            foreach ($value as $key=>$values) {



                $value[$key]['attachment']=base_url()."assets/backend/studattachments/".$value[$key]['attachment'];
            }

            $this->output->set_output(json_encode(['contents' => $value, 'error' => 0]));
        }
        else{
            $this->output->set_output(json_encode(['content' => 'No attachments found', 'error' => 1]));
        }
    }

    public function uploadAttach()
    {
        $this->isAuthorized();
        if($this->input->is_ajax_request()==false) {      redirect(base_url() . "institute-error400");    }//bad rrequest
        $this->output->set_content_type('application/json');
        $this->load->helper('string');
        $name= random_string('alnum',8);
        $this->load->helper('form');$config['upload_path']="./assets/backend/studattachments/";
        $config['allowed_types'] = 'pdf';$config['file_name']=$name;
        $config['max_size']='1024';
        $aname=$this->input->post('attchname');
        $config["overwrite"]=true;
        $this->load->library('upload',$config);

        if(!$this->upload->do_upload("brofile"))
        {
            $error = array('error' => $this->upload->display_errors());
            $this->output->set_output(json_encode(['message' => "file is not specified or not supported (size should be below 1 mb)<br>Allowed type should be pdf <br>  ", 'iserror'=>1]));
            return false;
        }
        else
        {
            $data=$this->upload->data();

            $this->load->model('Yes_Student');
          //  $mydata=$this->Yes_Institute->getInstitute(array("id"=>$this->session->userdata("studid")),array("brochure"));
            //$mybrochure=$mydata["institute"][0]["brochure"];

           // $path="./assets/brochure/".$mybrochure;
            //if(file_exists($path)&&$mycover!="none.pdf"&&$mycover!="none.pdf")  {   unlink($path); }
            $datas=array("student"=>$this->session->userdata("studid"),"attachment"=>$data['file_name'],'name'=>$aname);
            $this->Yes_Student->uploadAttach($datas);
        }
        $this->output->set_output(json_encode(['message' =>" Successfully uploaded",'error'=>"0"]));


    }

    public function deleteattach()
    {
        $this->isAuthorized();
        if($this->input->is_ajax_request()==false) {     redirect(base_url() . "institute-error400");    }//bad rrequest
        $id=$this->input->post('id');
        $this->load->model('Yes_Student');
        $studid=$this->session->userdata('studid');
        $result=$this->Yes_Student->deleteAttach(array("id"=>$id,'student'=>$studid));
        $message="Something went wrong Please try after some time ";
        if($result>0)$message="successfully deleted";
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode(['message'=>$message]));
    }

    public function completeProfile()
    {
        $this->isAuthorized();
        if($this->input->is_ajax_request()==false) {     redirect(base_url() . "institute-error400");    }//bad rrequest
        $id=$this->input->post('id');
        $this->load->model('Yes_Student');
        $studid=$this->session->userdata('studid');
        $result=$this->Yes_Student->deleteAttach(array("id"=>$id,'student'=>$studid));
        $message="Something went wrong Please try after some time ";
        if($result>0)$message="successfully deleted";
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode(['message'=>$message]));
    }

    public function test1(){
        $this->output->set_content_type('application/json');
        $data=$this->input->input_stream();
        $this->output->set_output(json_encode(['message'=>$data]));
    }

    public function marknotificationread(){
        $this->isAuthorized();
        $this->output->set_content_type('application/json');

        $cid=$this->input->post('id');
        $studid=$this->session->userdata('studid');
        $this->load->model('Yes_Student');
        $result=$this->Yes_Student->markreadnotification(array("id"=>$cid,'student'=>$studid));
        if($result>0){
            $this->output->set_output(json_encode(['message'=>'success']));
        }
        else{
            $this->output->set_output(json_encode(['message'=>'failed to update','res'=>$result,'error'=>1]));
        }

    }


    public function getunreadnoti(){
        $this->isAuthorized();
        $this->output->set_content_type('application/json');
        $studid=$this->session->userdata('studid');
        $this->load->model('Yes_Student');
        $result=$this->Yes_Student->isunreadnotifications(array("issview"=>0,'reply!='=>NULL,'student'=>$studid));
        if($result>0){
            $this->output->set_output(json_encode(['message'=>'You have unread messages','error'=>1]));
        }

       else{
            $this->output->set_output(json_encode(['message'=>'You have no messages','error'=>0]));
        }
    }


    public function getQualbyid(){

        $this->isAuthorized();
        $this->output->set_content_type('application/json');
        $id=$this->input->post('id');
        $sid=$this->session->userdata('studid');
        $this->load->model('Yes_Student');
        $res=$this->Yes_Student->getQualificationbyid($id,$sid);
        if(!isset($res['error'])){
            $this->output->set_output(json_encode(['message'=>'You have  courses','content'=>$res['value'],'error'=>0]));
        }
        else{
            $this->output->set_output(json_encode(['message'=>'You have no courses','error'=>1]));
        }

    }
}