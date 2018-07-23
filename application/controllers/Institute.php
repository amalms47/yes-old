<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


class Institute  extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

    }


    private $data = array("username" => "unknown","slug"=>"unknown","emailid" => "unknown", "collegetype"=>"unknown","contactno" => "unknown", "logdate" => "unknown", "logo" => "none.jpg", "title" => "no informations", "ispayed" => 0, "isblocked" => 0);

    public function isAuthorized()
    {
        if (!($this->session->has_userdata('id'))) {
            redirect(base_url() . "institute-error-401");
        }// you are not authorized
        else {
            $this->data["username"] = $this->session->userdata("username");
            $this->data["emailid"] = $this->session->userdata("emailid");
            $this->data["contactno"] = $this->session->userdata("contactno");
            $this->data["logdate"] = date('d/m/Y h:i:s  A', strtotime($this->session->userdata("logdate")));
            $this->data["logo"] = $this->session->userdata("logo");
            $this->data["propic"] = $this->session->userdata("profile");
            $this->data["title"] = $this->session->userdata("title");
            $this->data["ispayed"] = $this->session->userdata("ispayed");
            $this->data["collegetype"] = $this->session->userdata("collegetype");
            $this->data["slug"] = $this->session->userdata("slug");

        }
    }


    public function error_401()
    {
        $this->load->view("institute/errors/page401");
    }

    public function error_400()
    {
        $this->load->view("institute/errors/page400");
    }

    public function error_403()
    {
        $this->load->view("institute/errors/page403");
    }

    public function error_404()
    {
        $this->load->view("institute/errors/page404");
    }

    public function inserror_404()
    {
        $this->isAuthorized();
        $this->data["pageview"] = "inspage404";
        $this->load->view("institute/common/template", $this->data);
    }

    public function inserror_400()
    {
        $this->isAuthorized();
        $this->data["pageview"] = "inspage400";
        $this->load->view("institute/common/template", $this->data);
    }



    public function login()
    {
        $this->load->view("institute/login");
    }

    public function yesservices()
    {
        $this->isAuthorized();
        $this->data["pageview"] = "services";
        $this->load->view("institute/common/template", $this->data);
    }

    public function adminclgreviewpage()
    {
        $this->isAuthorized();
        $this->data["pageview"] = "adminreviewpage";
        $this->load->view("institute/common/template", $this->data);
    }
    public function home()
    {
        $this->isAuthorized();
        $this->data["pageview"] = "home";
        $this->load->view("institute/common/template", $this->data);

    }

    public function profile()
    {
        $this->isAuthorized();

        $this->data["pageview"] = "profile";
        $this->load->view("institute/common/template", $this->data);
    }

    public function userProfile()
    {
        $this->isAuthorized();
        $this->data["pageview"] = "userprofile";
        $this->load->view("institute/common/template", $this->data);
    }

    public function faq()
    {
        $this->isAuthorized();
        $this->data["pageview"] = "faq";
        $this->load->view("institute/common/template", $this->data);
    }

    public function moreInformation()
    {
        $this->isAuthorized();
        $this->data["pageview"] = "moreinfo";
        $this->load->view("institute/common/template", $this->data);
    }

    public function courses()
    {
        $this->isAuthorized();
        $this->data["pageview"] = "courses";
        $this->load->view("institute/common/template", $this->data);
    }


    public function collegemailbox()
    {

        $this->isAuthorized();
        $this->data["pageview"] = "mailboxcollege";
        $this->load->view("institute/common/template", $this->data);

    }

    public function visitors()
    {

        $this->isAuthorized();
        $this->data["pageview"] = "collegevisitors";
        $this->load->view("institute/common/template", $this->data);

    }

    public function createmail()
    {

        $this->isAuthorized();
        $this->data["pageview"] = "institutemail";
        $this->load->view("institute/common/template", $this->data);

    }

    public function enquiry()
    {

        $this->isAuthorized();
        $this->data["pageview"] = "enquiry";
        $this->load->view("institute/common/template", $this->data);
    }

    public function features()
    {

        $this->isAuthorized();
        $this->data["pageview"] = "features";
        $this->load->view("institute/common/template", $this->data);
    }

    public function registerInstitute()
    {

        $this->load->helper('string');
        if ($this->input->is_ajax_request() == false) {
            redirect(base_url() . "institute-error-404");
        }//bad rrequest
        $this->load->model('Yes_Institute');
        $data = $this->input->input_stream();
        $slug=strtolower($data['title']);
        $data['slug'] = str_replace(' ', '-', $slug);
        $isexist = $this->Yes_Institute->isExist(array("emailid" => $data['emailid']),null);
        $slugexist = $this->Yes_Institute->isExist(null,array("slug" => $data['slug']));
        $data["password"] = hash('sha256', $data["password"] . SALT);
        $data["hashcode"] = md5($data['emailid'] . SALT);

        if($slugexist>0) {

            $data['slug']=$data['slug'].' '. random_string('alpha', 2);
            $data['slug']= str_replace(' ', '-', $data['slug']);
        }

        unset($data["reppassword"]);
        unset($data["terms"]);
        $this->output->set_content_type('application/json');


        if ($isexist == 0) {
            $result = $this->Yes_Institute->registerInstitute($data);
            if ($result > 0) {
                $emailid = md5($data['emailid'] . SALT);
                $url = base_url() . "activate-account/" . $emailid;
                $subject = "Yescolleges.com - Email Verification";
                $message = 'Hi,' . $data["emailid"] . "<br>" . 'To finalize your account activation  click  here' . "<br><a href='" . $url . "' target='_blank'>Activate Account</a>";
                $result = $this->sendmail($data["emailid"], $message, $subject);
                $this->output->set_output(json_encode(['message' => 'Succesfully registered check your mail..', 'iserror' => "0"]));
            } else {
                $this->output->set_output(json_encode(['message' => 'Something went wrong, Please try after some time', 'iserror' => "1"]));
            }
        } else {
            $this->output->set_output(json_encode(['message' => 'You are already registered in our site', 'iserror' => "1"]));
        }
    }

    public function sendmail($to = null, $message = null, $subject = null)
    {
      /*  // $config = Array('protocol' => 'smtp','smtp_host' => 'ssl://smtp.zoho.com','smtp_port' => 465,'smtp_user' => 'info@yescolleges.com','smtp_pass' => 'tUG0FzFQFj2h`','charset' => 'iso-8859-1','wordwrap' => TRUE);
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

    public function activateInstitute($hashcode = null)
    {
        $this->load->model('Yes_Institute');
        $result = $this->Yes_Institute->updateInstitute(array("hashcode" => $hashcode, "isactivated" => 0), array("isactivated" => 1));
        $message = "Sorry some thing went wrong Please contact administrator!....";
        if ($result > 0)
            $message = "Congratualation, Your account has been activated successfully!....";
        $this->session->set_flashdata('message', $message);
        redirect("institution-messages");

    }

    public function showMessage()
    {
        $mydata["message"] = $this->session->flashdata('message');
        if (isset($mydata["message"])) {
            $this->load->view("institute/messagebox", $mydata);
        } else             redirect("institution-login");
    }

    public function getLogo()
    {
        if ($this->input->is_ajax_request() == false) {
            redirect(base_url() . "institute-error-404");
        }//bad rrequest
        $data = $this->input->input_stream();
        $this->load->model('Yes_Institute');
        $result = $this->Yes_Institute->getInstitute($data, array("logo"));
        $this->output->set_content_type('application/json');
        $photo = "none.png";
        if (!isset($result["error"])) {
            $institute = $result['institute'][0];
            $photo = $institute["logo"];
        }
        $this->output->set_output(json_encode(['photo' => base_url() . 'assets/backend/images/collegelogo/' . $photo]));
    }

    public function test()
    {
        if ($this->input->is_ajax_request() == false) {
            redirect(base_url() . "Pagenotfound");
        }
        $this->load->helper('string');
        $data['slug']="fisat-engg-erna";
         $data['slug']=$data['slug'].' '. random_string('alpha', 2);
        echo $data['slug']= str_replace(' ', '-',  $data['slug']);
    }

    public function loginInstitute()
    {
        if ($this->input->is_ajax_request() == false) {
            redirect(base_url() . "institute-error-404");
        }//bad rrequest
        $data = $this->input->input_stream();
        $data["password"] = hash('sha256', $data["password"] . SALT);
        $data["isblocked"] = 0; //$data["isactivated"]=1;
        $this->load->model('Yes_Institute');
        $check=$this->Yes_Institute->checkblocked(array('emailid'=>$data['emailid'],'isblocked'=>1));
        if($check>0){
            $this->output->set_output(json_encode(['message' => "Your account is blocked contact admin", 'iserror' => "-1"]));
        }else {
            $result = $this->Yes_Institute->getInstitute($data, array("id", "username", "collegetype", "emailid", "contactno", "logo", "title", "ispayed", "logdate", 'profile'));
            $this->output->set_content_type('application/json');
            if (!isset($result["error"])) {
                $institute = $result['institute'][0];
                $this->session->set_userdata($institute);
                $date = date('Y-m-d H:i:s');
                $result = $this->Yes_Institute->updateInstitute($data, array("logdate" => $date));
                $subject = "Yescolleges.com Account Login Information";
                $url = base_url() . "retrieve-account/" . session_id() . "/" . $this->session->userdata("id");
                $message = 'If the login activity is not authorized by you then please clear  the session by clicking the lnk below , and change your password immeadiatly<br> <a href="' . $url . '" target="_blank">Deactivate Account</a>';
                // $result = $this->sendmail($data["emailid"], $message, $subject);


                $this->output->set_output(json_encode(['url' => base_url() . "institution-home", 'iserror' => "0"]));
            } else {
                $this->output->set_output(json_encode(['message' => "Invalid username or password", 'iserror' => "1"]));
            }
        }

    }

    public function retrieveInstitute($sessionid = null, $id = null)
    {
        $this->load->model('Yes_Institute');
        $result = $this->Yes_Institute->deleteSession(array("id" => $sessionid));
        $message = "Sorry some thing went wrong Please contact administrator!....";
        if ($result > 0) {
            $data = $this->Yes_Institute->getInstitute(array("id" => $id), array("emailid"));
            $emailid = $data["institute"][0]["emailid"];
            $this->load->helper('string');
            $password = random_string('alnum', 10);
            $newpass = hash('sha256', $password . SALT);
            $result = $this->Yes_Institute->updateInstitute(array("emailid" => $emailid, "isactivated" => 1, "isblocked" => 0), array("password" => $newpass));
            if ($result > 0) {
                $subject = "Yescolleges.com New Account Password";
                $message = "Your sesion hasbeen logged-out  successfully, Your new password   is <b>" . $password . "</b>,Please change  your password after login!...";
                $isdone = $this->sendmail($emailid, $message, $subject);
            }

            $message = "Congratualation, Your account has been retrieved and new password send to your email successfully!....";
        }
        $this->session->set_flashdata('message', $message);
        redirect("showMessage");
    }

    public function resetInstitute()
    {
        if ($this->input->is_ajax_request() == false) {
            redirect(base_url() . "institute-error-404");
        }//bad rrequest
        $this->output->set_content_type('application/json');
        $data = $this->input->input_stream();
        $this->load->model('Yes_Institute');
        if ($data["option"] == "Password") {
            $isexist = $this->Yes_Institute->isExist(array("emailid" => $data['emailid']));
            if ($isexist > 0) {
                $this->load->helper('string');
                $password = random_string('alnum', 6);
                $s=rand(1,9);
                $c="@";
                $p=$password.$c.$s;
                $newpass = hash('sha256', $p . SALT);
                $result = $this->Yes_Institute->updateInstitute(array("emailid" => $data["emailid"]), array("password" => $newpass));
                if ($result > 0) {
                    $subject = "Yescolleges.com New Account Password";
                    $message = "Your new password   is <b>" . $p . "</b>,Please change password after login!...";
                    $isdone = $this->sendmail($data["emailid"], $message, $subject);
                    $this->output->set_output(json_encode(['message' => 'New password information send to  your email', 'iserror' => "0"]));
                } else {
                    $this->output->set_output(json_encode(['message' => 'Something went wrong, Please contact administrator', 'iserror' => "0"]));
                }
            } else {
                $this->output->set_output(json_encode(['message' => 'You donot have any account or already activated  in our site', 'iserror' => "0"]));
            }
        }

        if ($data["option"] == "Activation") {
            $isexist = $this->Yes_Institute->isExist(array("emailid" => $data['emailid'], "isactivated" => 0));
            if ($isexist > 0) {
                $emailid = md5($data['emailid'] . SALT);
                $url = base_url() . "activate-account/" . $emailid;
                $subject = "Yescolleges.com - Email Verification";
                $message = 'Hi,' . $data["emailid"] . "<br>" . 'To finalize your account activation  click  here' . "<br><a href='" . $url . "' target='_blank'>Activate Account</a>";
                $result = $this->sendmail($data["emailid"], $message, $subject);
                $this->output->set_output(json_encode(['message' => 'Please verify your emailid to finalize your account activation', 'iserror' => "0"]));
            } else {
                $this->output->set_output(json_encode(['message' => 'You donot have any account or already activated  in our site', 'iserror' => "0"]));
            }
        }

    }

    public function logoutInstitute()//need not be call from ajax - clear the session and redirect to the college loginform
    {
        $this->isAuthorized();
        $this->session->sess_destroy();
        redirect(base_url());
    }

    function compress_image($source_url, $quality) {

        $info = getimagesize($source_url);

        if ($info['mime'] == 'image/jpeg')
            $image = imagecreatefromjpeg($source_url);

        elseif ($info['mime'] == 'image/gif')
            $image = imagecreatefromgif($source_url);

        elseif ($info['mime'] == 'image/png')
            $image = imagecreatefrompng($source_url);

        $img=imagejpeg($image, $quality);
        return $img;
    }


    public function uploadLogo()
    {
        $this->isAuthorized();
        if ($this->input->is_ajax_request() == false) {
            redirect(base_url() . "institute-error-404");
        }//bad rrequest

        $this->output->set_content_type('application/json');
        $this->load->helper('string');
        $name = random_string('alnum', 8);
        $this->load->helper('form');
        $config['upload_path'] = "./assets/backend/images/collegelogo";
        $config['allowed_types'] = 'jpg|gif|png';
        $config['file_name'] = $name;
        //$savepath=$data['logo'];


        $cc=$_FILES['logo']['tmp_name'];

        $info = getimagesize($cc);

        $image="";
        if ($info['mime'] == 'image/jpeg')
            $image = imagecreatefromjpeg($cc);

        elseif ($info['mime'] == 'image/gif')
            $image = imagecreatefromgif($cc);

        elseif ($info['mime'] == 'image/png')
            $image = imagecreatefrompng($cc);

        //$img=imagejpeg($image, 50);

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload("logo")) {
            $error = array('error' => $this->upload->display_errors());
            $this->output->set_output(json_encode(['message' => "file is not specified or not supported (size should be below 50kb)<br>Allowed type should be png,gif or jpg type<br> Width X Height (160px X 160px) ", 'iserror' => 1]));
            return false;
        } else {

            $data = $this->upload->data();

            $this->load->model('Yes_Institute');
            $mydata = $this->Yes_Institute->getInstitute(array("id" => $this->session->userdata("id")), array("logo"));
            $mylogo = $mydata["institute"][0]["logo"];

            $path = "./assets/backend/images/collegelogo" . $mylogo;
            $option = "1";
            if (file_exists($path) && $mylogo != "none.png" && $mylogo != "none.jpg") {
                $option = "0";
                unlink($path);
            }
            $this->Yes_Institute->updateInstitute(array("id" => $this->session->userdata("id")), array("logo" => $data['file_name']));
            $this->session->set_userdata('logo', $data['file_name']);
        }
        $this->output->set_output(json_encode(['message' => "  Your logo was successfully updated.....",'img'=>$image, 'error' => "0"]));
    }






    /*public function uploadLogo()
    {
        $this->isAuthorized();
        if ($this->input->is_ajax_request() == false) {
            redirect(base_url() . "institute-error400");
        }//bad rrequest

        $this->output->set_content_type('application/json');
        $this->load->helper('string');
        $name = random_string('alnum', 8);
        $this->load->helper('form');
        $config['upload_path'] = "./assets/backend/images/collegelogo";
        $config['allowed_types'] = 'jpg|gif|png';
        $config['file_name'] = $name;
        $config['max_height'] = '160';
        $config['max_width'] = '160';
        $config['max_size'] = '50kb';
        $config["overwrite"] = true;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload("logo")) {
            $error = array('error' => $this->upload->display_errors());
            $this->output->set_output(json_encode(['message' => "file is not specified or not supported (size should be below 50kb)<br>Allowed type should be png,gif or jpg type<br> Width X Height (160px X 160px) ", 'iserror' => 1]));
            return false;
        } else {
            $data = $this->upload->data();

            $this->load->model('Yes_Institute');
            $mydata = $this->Yes_Institute->getInstitute(array("id" => $this->session->userdata("id")), array("logo"));
            $mylogo = $mydata["institute"][0]["logo"];

            $path = "./assets/backend/images/collegelogo" . $mylogo;
            $option = "1";
            if (file_exists($path) && $mylogo != "none.png" && $mylogo != "none.jpg") {
                $option = "0";
                unlink($path);
            }
            $this->Yes_Institute->updateInstitute(array("id" => $this->session->userdata("id")), array("logo" => $data['file_name']));
            $this->session->set_userdata('logo', $data['file_name']);
        }
        $this->output->set_output(json_encode(['message' => "  Your logo was successfully updated.....", 'error' => "0"]));
    }*/





    public function uploadPropic()
    {
        $this->isAuthorized();
        if ($this->input->is_ajax_request() == false) {
            redirect(base_url() . "institute-error-404");
        }//bad rrequest

        $this->output->set_content_type('application/json');
        $this->load->helper('string');
        $name = random_string('alnum', 8);
        $this->load->helper('form');
        $config['upload_path'] = "./assets/backend/images/collegeprofile/";
        $config['allowed_types'] = 'jpg|gif|png';
        $config['file_name'] = $name;
        $config['min_height'] = '300';
        $config['min_width'] = '300';
        $config['max_size'] = '300';
        $config["overwrite"] = true;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload("profilepic")) {
            $error = array('error' => $this->upload->display_errors());
            $this->output->set_output(json_encode(['message' => "file is not specified or not supported (size should be below 300kb)<br>Allowed type should be png,gif or jpg type<br> Width X Height (500px X 500px) ", 'iserror' => 1]));
            return false;
        } else {
            $data = $this->upload->data();

            $config['image_library']='gd2';
            $config['source_image']="./assets/backend/images/collegeprofile/".$data['file_name'];
            $config['create_thumb']=FALSE;
            $config['maintain_ratio']=FALSE;
            $config['quality']='70%';
            $config['width']=500;
            $config['height']=500;
            $config['new_image']="./assets/backend/images/collegeprofile/".$data['file_name'];
            $this->load->library('image_lib',$config);
            $this->image_lib->resize();

            $this->load->model('Yes_Institute');
            $mydata = $this->Yes_Institute->getInstitute(array("id" => $this->session->userdata("id")), array("profile"));
            $mylogo = $mydata["institute"][0]["profile"];

            $path = "./assets/backend/images/collegeprofile" . $mylogo;
            $option = "1";
            if (file_exists($path) && $mylogo != "none.png" && $mylogo != "none.jpg") {
                $option = "0";
                unlink($path);
            }
            $this->Yes_Institute->updateInstitute(array("id" => $this->session->userdata("id")), array("profile" => $data['file_name']));
            $this->session->set_userdata('profile', $data['file_name']);
        }
        $this->output->set_output(json_encode(['message' => "  Your Profile photo  successfully updated.....", 'error' => "0"]));
    }


    public function uploadBrochure()
    {
        $this->isAuthorized();
        if ($this->input->is_ajax_request() == false) {
            redirect(base_url() . "institute-error-404");
        }//bad rrequest
        $this->output->set_content_type('application/json');
        $this->load->helper('string');
        $name = random_string('alnum', 8);
        $this->load->helper('form');
        $config['upload_path'] = "./assets/brochure/";
        $config['allowed_types'] = 'pdf';
        $config['file_name'] = $name;
        $config['max_size'] = '1024';
        $config["overwrite"] = true;
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload("brofile")) {
            $error = array('error' => $this->upload->display_errors());
            $this->output->set_output(json_encode(['message' => "file is not specified or not supported (size should be below 1 mb)<br>Allowed type should be pdf <br>  ", 'iserror' => 1]));
            return false;
        } else {
            $data = $this->upload->data();

            $this->load->model('Yes_Institute');
            $mydata = $this->Yes_Institute->getInstitute(array("id" => $this->session->userdata("id")), array("brochure"));
            $mybrochure = $mydata["institute"][0]["brochure"];

            $path = "./assets/brochure/" . $mybrochure;
            if (file_exists($path) && $mycover != "none.pdf" && $mycover != "none.pdf") {
                unlink($path);
            }
            $this->Yes_Institute->updateInstitute(array("id" => $this->session->userdata("id")), array("brochure" => $data['file_name']));
        }
        $this->output->set_output(json_encode(['message' => "  Your brochure was successfully updated!..", 'error' => "0"]));


    }

    public function uploadFeestructure()
    {
        $this->isAuthorized();
        if ($this->input->is_ajax_request() == false) {
            redirect(base_url() . "institute-error-404");
        }//bad rrequest
        $this->output->set_content_type('application/json');
        $this->load->helper('string');
        $name = random_string('alnum', 8);
        $cid = $this->input->post('couid');
        $this->load->helper('form');
        $config['upload_path'] = "./assets/backend/feestructure/";
        $config['allowed_types'] = 'pdf|jpg';
        $config['file_name'] = $name;
        $config['max_size'] = '1024';
        $config["overwrite"] = true;
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload("feefile")) {
            $error = array('error' => $this->upload->display_errors());
            $this->output->set_output(json_encode(['message' => "file is not specified or not supported (size should be below 1 mb)<br>Allowed type should be pdf,jpg <br>  ", 'iserror' => 1]));

            return false;
        } else {
            $data = $this->upload->data();

            $this->load->model('Yes_Institute');
            $mydata = $this->Yes_Institute->getFeestruct(array("couid" => $cid, 'inst_id' => $this->session->userdata('id')), array("feesstructure"));
            $mybrochure = $mydata["course"][0]["feesstructure"];

            $path = "./assets/backend/feestructure/" . $mybrochure;
            if (file_exists($path) && $mycover != "none.pdf" && $mycover != "none.pdf") {
                unlink($path);
            }
            $this->Yes_Institute->updateFeestruct(array("couid" => $cid, 'inst_id' => $this->session->userdata('id')), array("feesstructure" => $data['file_name']));
        }
        $this->output->set_output(json_encode(['message' => "Fee structure successfully updated!..", 'error' => "0"]));


    }


    public function uploadCover()
    {
        $this->isAuthorized();
        if ($this->input->is_ajax_request() == false) {
            redirect(base_url() . "institute-error-404");
        }//bad rrequest

        $this->output->set_content_type('application/json');
        $this->load->helper('string');
        $name = random_string('alnum', 8);
        $this->load->helper('form');
        $config['upload_path'] = "./assets/backend/images/collegecover/";
        $config['allowed_types'] = 'jpg|gif|png';
        $config['file_name'] = $name;
        $config['max_size'] = '500';
        $config['min_height'] = '400';
        //$config['max_height'] = '800';
        $config['min_width'] = '800';
        //$config['max_width'] = '300';
        $config["overwrite"] = true;
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload("icover")) {
            $error = array('error' => $this->upload->display_errors());
            $this->output->set_output(json_encode(['message' => "file is not specified or not supported (size should be below 500kb)<br>Allowed type should be png,gif or jpg <br> Width X Height (1000px X 400px) ", 'iserror' => 1]));
            return false;
        } else {
            $data = $this->upload->data();

            $config['image_library']='gd2';
            $config['source_image']="./assets/backend/images/collegecover/".$data['file_name'];
            $config['create_thumb']=FALSE;
            $config['maintain_ratio']=FALSE;
            $config['quality']='60%';
            $config['width']=1200;
            $config['height']=400;
            $config['new_image']="./assets/backend/images/collegecover/".$data['file_name'];
            $this->load->library('image_lib',$config);
            $this->image_lib->resize();

            $this->load->model('Yes_Institute');
            $mydata = $this->Yes_Institute->getInstitute(array("id" => $this->session->userdata("id")), array("cover"));
            $mycover = $mydata["institute"][0]["cover"];

            $path = "./assets/backend/images/collegecover/" . $mycover;
            if (file_exists($path) && $mycover != "none.png" && $mycover != "none.jpg") {
                unlink($path);
            }
            $this->Yes_Institute->updateInstitute(array("id" => $this->session->userdata("id")), array("cover" => $data['file_name']));
        }
        $this->output->set_output(json_encode(['message' => "  Your cover was successfully updated!..", 'error' => "0"]));
    }

    public function getInstitute()
    {
        $this->isAuthorized();
        if ($this->input->is_ajax_request() == false) {
            redirect(base_url() . "institute-error-404");
        }//bad rrequest

        $data = $this->input->input_stream();
        $this->load->model('Yes_Institute');
        $result = $this->Yes_Institute->getInstitute(array("id" => $this->session->userdata("id")), $data["data"]);
        if (isset($result["institute"][0]["logo"])) {
            $result["institute"][0]["logo"] = base_url() . "assets/backend/images/collegelogo/" . $result["institute"][0]["logo"];

        }
        if (isset($result["institute"][0]["cover"])) {
            $result["institute"][0]["cover"] = base_url() . "assets/backend/images/collegecover/" . $result["institute"][0]["cover"];
        }
        if (isset($result["institute"][0]["brochure"])) {
            $result["institute"][0]["brochureurl"] = base_url() . "assets/brochure/" . $result["institute"][0]["brochure"];
        }
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode(['data' => $result["institute"][0]]));
    }

    public function updateInstitute()
    {
        $this->isAuthorized();
        if ($this->input->is_ajax_request() == false) {
            redirect(base_url() . "institute-error-404");
        }//bad rrequest

        $data = $this->input->input_stream();
        $this->load->model('Yes_Institute');
        $result = $this->Yes_Institute->updateInstitute(array("id" => $this->session->userdata("id")), $data);
        $message = "Something went wrong Please try after some time ";
        if ($result > 0) $message = "Your information successfully saved";
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode(['message' => $message, 'error' => 0]));
    }

    public function getCategory()
    {
        $this->isAuthorized();
        if ($this->input->is_ajax_request() == false) {
            redirect(base_url() . "institute-error-404");
        }//bad rrequest

        $this->load->model('Yes_Institute');
        $result = $this->Yes_Institute->getCategory();
        $this->output->set_content_type('application/json');
        if (!isset($result["error"]))
            $this->output->set_output(json_encode(['category' => $result["category"], 'iserror' => "0"]));
        else
            $this->output->set_output(json_encode(['category' => "no infromation found at server", 'iserror' => "1"]));
    }

    public function getCourseCategory()
    {
        $this->isAuthorized();
        if ($this->input->is_ajax_request() == false) {
            redirect(base_url() . "institute-error400");
        }//bad rrequest

        $this->load->model('Yes_Institute');
        $result = $this->Yes_Institute->getCourseCategory();
        $this->output->set_content_type('application/json');
        if (!isset($result["error"]))
            $this->output->set_output(json_encode(['category' => $result["category"], 'iserror' => "0"]));
        else
            $this->output->set_output(json_encode(['category' => "no infromation found at server", 'iserror' => "1"]));
    }


    public function getCoursesbycategory()
    {
        $this->isAuthorized();
        if ($this->input->is_ajax_request() == false) {
            redirect(base_url() . "institute-error-404");
        }//bad rrequest

        $category=$this->input->post('cat');
        $this->load->model('Yes_Institute');
        $result = $this->Yes_Institute->getCoursesbycategory($category);
        $this->output->set_content_type('application/json');
        if (!isset($result["error"]))
            $this->output->set_output(json_encode(['courses' => $result["courses"], 'iserror' => "0"]));
        else
            $this->output->set_output(json_encode(['courses' => "no infromation found at server", 'iserror' => "1"]));
    }


    public function getCourseLevel()
    {
        $this->isAuthorized();
        if ($this->input->is_ajax_request() == false) {
            redirect(base_url() . "institute-error-404");
        }//bad rrequest

        $this->load->model('Yes_Institute');
        $result = $this->Yes_Institute->getCourseLevel();
        $this->output->set_content_type('application/json');
        if (!isset($result["error"]))
            $this->output->set_output(json_encode(['levels' => $result["levels"], 'iserror' => "0"]));
        else
            $this->output->set_output(json_encode(['levels' => "no infromation found at server", 'iserror' => "1"]));
    }

    public function saveInstitute()
    {
        $this->isAuthorized();
        if ($this->input->is_ajax_request() == false) {
            redirect(base_url() . "institute-error-404");
        }//bad rrequest
        $data = $this->input->input_stream();

        if (!isset($data["f_canteen"])) $data["f_canteen"] = 0; else $data["f_canteen"] = 1;
        if (!isset($data["f_atm"])) $data["f_atm"] = 0; else $data["f_atm"] = 1;
        if (!isset($data["f_hostel"])) $data["f_hostel"] = 0; else $data["f_hostel"] = 1;
        if (!isset($data["f_library"])) $data["f_library"] = 0; else $data["f_library"] = 1;
        if (!isset($data["f_wifi"])) $data["f_wifi"] = 0; else $data["f_wifi"] = 1;
        if (!isset($data["f_bus"])) $data["f_bus"] = 0; else $data["f_bus"] = 1;
        if (!isset($data["f_sports"])) $data["f_sports"] = 0; else $data["f_sports"] = 1;


        $this->load->model('Yes_Institute');
        //$data['title']='amal';
        $result = $this->Yes_Institute->updateInstitute(array("id" => $this->session->userdata("id")), $data);
        $message = "Something went wrong Please try after some time ";
        if ($result > 0) $message = "Your information successfully saved";
        $this->session->set_userdata("title", $data["title"]);
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode(['message' => $message]));

    }

    public function savePassword()
    {
        $this->isAuthorized();
        if ($this->input->is_ajax_request() == false) {
            redirect(base_url() . "institute-error-404");
        }//bad rrequest
        $oldpass = $this->input->post('oldpass');
        $newpass = $this->input->post('newpass');
        $this->load->model('Yes_Institute');
        $where = array("id" => $this->session->userdata("id"), "password" => hash('sha256', $oldpass . SALT));
        $data = array("password" => hash('sha256', $newpass . SALT));
        $result = $this->Yes_Institute->updateInstitute($where, $data);
        $message = "Something went wrong Please try after some time ";
        if ($result > 0) {
            $message = "Your information successfully saved";
        }
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode(['message' => $message]));
    }

    public function saveUserProfile()
    {
        $this->isAuthorized();
        if ($this->input->is_ajax_request() == false) {
            redirect(base_url() . "institute-error-404");
        }//bad rrequest
        $data = $this->input->input_stream();
        $this->load->model('Yes_Institute');
        $result = $this->Yes_Institute->updateInstitute(array("id" => $this->session->userdata("id")), $data);
        $message = "Something went wrong Please try after some time ";
        if ($result > 0) {
            $this->session->set_userdata("username", $data["username"]);
            $this->session->set_userdata("emailid", $data["emailid"]);
            $this->session->set_userdata("contactno", $data["contactno"]);
            $message = "Your information successfully saved";
        }
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode(['message' => $message]));
    }

    public function createCourse()
    {
        $this->isAuthorized();
        if ($this->input->is_ajax_request() == false) {
            redirect(base_url() . "institute-error-404");
        }//bad rrequest
        $data = $this->input->input_stream();
        if (isset($data['_wysihtml5_mode'])) unset($data['_wysihtml5_mode']);
        if (isset($data['category'])) unset($data['category']);
        $data["inst_id"] = $this->session->userdata("id");
        $data["course_id"]=$data['name'];
        unset($data['name']);

        $this->load->model('Yes_Institute');
        $result = $this->Yes_Institute->createCourse($data);
        $message = "Something went wrong Please try after some time ";
        if ($result > 0) $message = "Your information successfully saved";
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode(['message' => $message, "data" => $data]));
    }

    public function getCourseByPage()
    {
        $this->isAuthorized();
        if ($this->input->is_ajax_request() == false) {
            redirect(base_url() . "institute-error-404");
        }//bad rrequest
        $data = $this->input->input_stream();
        $where = array("allcourse.inst_id" => $this->session->userdata("id"));
        //$like = array("name" => $data["course"]);
        $select = array('*');
        $this->load->model('Yes_Institute');
        $result = $this->Yes_Institute->getCourse($where,null,$select, $data["page"], 10);
        $num = $this->Yes_Institute->countCourse($where,null);
        $tot_pages = ceil($num / 10);
        $this->output->set_content_type('application/json');
        if (!isset($result["error"])) {

            $data = $result['courses'];


            $this->output->set_output(json_encode(['courses' => $data, 'url' => base_url() . 'assets/backend/feestructure/', 'page_count' => $tot_pages, 'iserror' => "0"]));
        } else
            $this->output->set_output(json_encode(['message' => "no information found at server", 'iserror' => "1"]));
    }

    public function getCourseById()
    {
        $this->isAuthorized();
        if ($this->input->is_ajax_request() == false) {
            redirect(base_url() . "institute-error-404");
        }//bad rrequest
        $id = $this->input->post('id');
        $where = array('couid'=>$id);
        $like = null;
        $select = array('*');
        $this->load->model('Yes_Institute');
        $result = $this->Yes_Institute->getCourse($where, $like, $select, null, null);
        $this->output->set_content_type('application/json');
        if (!isset($result["error"])) {

            $this->output->set_output(json_encode(['courses' => $result["courses"][0], 'iserror' => "0"]));
        } else
            $this->output->set_output(json_encode(['message' => "no information found at server", 'iserror' => "1"]));
    }

    public function saveCourse()
    {
        $this->isAuthorized();
        if ($this->input->is_ajax_request() == false) {
            redirect(base_url() . "institute-error-404");
        }//bad rrequest
        $data = $this->input->input_stream();
        //$data['courseclgtype']=$data['type'];
        if (isset($data['_wysihtml5_mode'])) unset($data['_wysihtml5_mode']);
        $this->load->model('Yes_Institute');
        $data['course_id']=$data['name'];
        unset($data['name']);
        $result = $this->Yes_Institute->saveCourse(array("couid" => $data["couid"]), $data);
        $message = "Something went wrong Please try after some time ";
        if ($result > 0) $message = "Your information successfully saved";
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode(['message' => $message, 'data' => $data]));
    }


    public function updateAvalability()
    {
        $this->isAuthorized();
        if ($this->input->is_ajax_request() == false) {
            redirect(base_url() . "institute-error-404");
        }//bad rrequest
        $data = $this->input->input_stream();
        //$data['courseclgtype']=$data['type'];

        $this->load->model('Yes_Institute');

        $result = $this->Yes_Institute->saveCourse(array("couid" => $data["couid"]), $data);
        $message = "Something went wrong Please try after some time ";
        if ($result > 0) $message = "Your information successfully saved";
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode(['message' => $message, 'data' => $data]));
    }

    public function savecoursebycollege()
    {
        if($this->input->is_ajax_request()==false) {      redirect(base_url() . "institute-error-404");    }//bad rrequest
        $this->isAuthorized();
        $category=$this->input->post('category');
        $course=$this->input->post('course');
        $shortname=$this->input->post('shortname');
        $data['addedby']=$this->session->userdata('username');
        $this->load->model("Course","Course");
        $admin=$this->session->userdata('username');
        $result=$this->Course->savecollegecourse($course,$category,$shortname,$admin);
        $this->output->set_content_type('application/json');
        if ($result > 0)  {$this->output->set_output(json_encode(['message' =>"succesfully saved data",'error'=>"0"]));    }
        else{$this->output->set_output(json_encode(['message' =>"requested action was unsuccessfull",'error'=>"1"]));    }

    }

    public function deleteCourse()
    {
        $this->isAuthorized();
        if ($this->input->is_ajax_request() == false) {
            redirect(base_url() . "institute-error-404");
        }//bad rrequest
        $id = $this->input->post('id');
        $this->load->model('Yes_Institute');
        $result = $this->Yes_Institute->deleteCourse(array("couid" => $id));
        $message = "Something went wrong Please try after some time ";
        if ($result > 0) $message = "Your information successfully saved";
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode(['message' => $message]));
    }


    public function getengg()
    {

        $this->output->set_content_type('application/json');
        $this->load->model("Yes_Institute", "college");
        $result = $this->college->getenggcolleges();
        if (!isset($result['error'])) {


            $this->output->set_output(json_encode(['content' => $data, 'error' => "0"]));
        } else {
            $this->output->set_output(json_encode(['message' => "No information found on the server", 'error' => "1"]));
        }
    }


    public function getmedical()
    {

        $this->output->set_content_type('application/json');
        $this->load->model("Yes_Institute", "college");
        $result = $this->college->getmedcolleges();
        if (!isset($result['error'])) {

            $data = $result['value'];
            foreach ($data as $key => $value) {
                $data[$key]['logo'] = base_url() . "assets/backend/images/collegelogo/" . $data[$key]['logo'];
            }
            $this->output->set_output(json_encode(['content' => $data, 'error' => "0"]));
        } else {
            $this->output->set_output(json_encode(['message' => "No information found on the server", 'error' => "1"]));
        }
    }

    public function geteng()
    {
        $this->output->set_content_type('application/json');
        $da = 1;
        if ($da > 0) {

            $this->output->set_output(json_encode(['content' => "succs"]));
        } else {
            $this->output->set_output(json_encode(['content' => "dai"]));
        }
    }

    public function getcollegeview()
    {

        $this->load->library('encrypt');
        $this->output->set_content_type('application/json');
        $data = $this->input->post('id');
        $encdata = $this->encrypt->encode($data);
        $this->load->model("Yes_Institute", "college");
        $result = $this->college->getcollegeprofile($data);
        //$result="1";
        if (!isset($result['error'])) {
            //$this->load->view('institute/collegeprofileview');

            $this->output->set_output(json_encode(['url' => base_url() . "college-view?id=$encdata", 'error' => "0"]));
        } else {
            $this->output->set_output(json_encode(['content' => "no collleges found", 'error' => 1]));
        }
    }

    public function getsearchcollege()
    {

        $this->output->set_content_type('application/json');
        $search = $this->input->post('data');
        $this->load->model("Yes_Institute", "college");
        $select = array('title', 'id','slug');
        $like = array('title' => $search);
        $result = $this->college->getsearched($like, $select);
        if (!isset($result['error'])) {

            $collegedata = $result['institute'];

            $this->output->set_output(json_encode(['content' => $collegedata, 'error' => 0]));

        } else {
            $this->output->set_output(json_encode(['message' => "no colleges found on server", 'error' => 1]));
        }
    }

    public function tests1()
    {

        $message ='Hi,' . 'amal@technorip.com' . "<br>".'To reset your account password click here.(These link have only 24 hours validity)'."<br><a href='".'yescolleges.com'."' target='_blank'>Reset Password</a>";
        echo  $message;
        //$this->load->view('tests');

    }

    public function tests()
    {
        //$this->data["pageview"] = "tests";
        //$this->load->view("common/template", $this->data);


        $string = "MICROSOFT CORP CIK#: 0000789019 (see all company filings)";
        $string = substr($string, 0, strpos($string, "("));
        echo $string;
    }

    /*
        public function collegelistpage(){

            $this->load->view('institute/collegelist');
        }
    */

    public function getsearchlist()
    {

        $this->output->set_content_type('application/json');
        $search = $this->input->post('passquery');
        $page = $this->input->post('page');
        //$search="jai";
        $this->load->model("Yes_Institute", "college");

        $num = 0;
        $result = $this->college->getsearchedlist($search, $page);
        $num = $this->college->countsearchcollege($search);
        $total_pages = ceil($num / 5);


        if (!isset($result['error'])) {

            $collegedata = $result['institute'];

            foreach ($collegedata as $key => $value) {
                $collegedata[$key]['logo'] = base_url() . "assets/backend/images/collegelogo/" . $collegedata[$key]['logo'];
            }
            $this->output->set_output(json_encode(['content' => $collegedata, 'count' => $num, 'page_count' => $total_pages, 'error' => 0]));

        } else {
            $this->output->set_output(json_encode(['message' => "no colleges found on server", 'error' => 1]));
        }
    }

    public function tested()
    {
        $this->load->helper('url');
        $data = $this->uri->segment(3);

        $this->output->set_content_type('application/json');
        echo $data;


    }

    public function isprofilecomplete()
    {

        $this->output->set_content_type('application/json');
        $id = $this->session->userdata('id');

        $this->load->model("Yes_Institute");

        $res = $this->Yes_Institute->checkprocomplete($id);

        if (isset($res['error'])) {

            $this->output->set_output(json_encode(['error' => 1]));
        } else {
            $this->output->set_output(json_encode(['error' => 0]));
        }

    }


    public function getEnquiry()
    {
        $this->isAuthorized();
        if ($this->input->is_ajax_request() == false) {
            redirect(base_url() . "institute-error-404");
        }//bad rrequest
        $search = $this->input->post("search");
        $page = $this->input->post("page");
        $this->load->model('Yes_Student');
        $data = array('enquiry.course', 'enquiry.mdate', 'enquiry.id', 'stud_tb.firstname', 'enquiry.isiview', 'enquiry.coursename', ' enquiry.student', 'stud_tb.lastname', 'stud_tb.dob', 'stud_tb.gender', 'stud_tb.email', 'stud_tb.photo', 'stud_tb.mobile', 'stud_tb.active', 'stud_tb.isblocked');
        $clgid = $this->session->userdata("id");
        $where = array('enquiry.institute' => $clgid);
        $like = array('enquiry.coursename' => $search);
        $result = $this->Yes_Student->getEnquiry($data, $where, $like, $page, 9);
        $num = $this->Yes_Student->countEnquiry($where, $like);
        $tot_pages = ceil($num / 9);
        $this->output->set_content_type('application/json');
        if (!isset($result["error"])) {
            $data = $result["enquirys"];
            foreach ($data as $key => $value) {
                $data[$key]['photo'] = base_url() . "assets/backend/images/studimages/" . $data[$key]['photo'];
                $data[$key]["mdate"] = date('d/m/Y h:i:s  A', strtotime($data[$key]["mdate"]));

            }

            $this->output->set_output(json_encode(['enquirys' => $data, 'page_count' => $tot_pages, 'iserror' => "0"]));
        } else
            $this->output->set_output(json_encode(['message' => "no information found at server", 'id' => $clgid, 'iserror' => "1"]));
    }

    public function getQual()
    {
        $this->isAuthorized();
        if ($this->input->is_ajax_request() == false) {
            redirect(base_url() . "institute-error-404");
        }//bad rrequest
        $student = $this->input->post("student");
        $this->load->model('Yes_Student');
        $where = array("studentid" => $student);
        $result = $this->Yes_Student->getQual($where);
        $this->output->set_content_type('application/json');
        if (!isset($result["error"]))
            $this->output->set_output(json_encode(['quals' => $result["quals"], 'iserror' => "0"]));
        else
            $this->output->set_output(json_encode(['message' => "no information found at server", 'iserror' => "1"]));

    }

    public function getEnqMsg()
    {
        $this->isAuthorized();
        if ($this->input->is_ajax_request() == false) {
            redirect(base_url() . "institute-error-404");
        }//bad rrequest
        $student = $this->input->post("student");
        $this->load->model('Yes_Student');
        $data = array("enquiry.message", "enquiry.id", "enquiry.reply");
        $where = array("enquiry.id" => $student);
        $result = $this->Yes_Student->getEnquiry($data, $where, null, null, null);
        $time = date('Y/m/d H:i:s');
        $this->Yes_Student->setRead($where, $time);

        $this->output->set_content_type('application/json');

        if (!isset($result["error"]))
            $this->output->set_output(json_encode(['enquiry' => $result["enquirys"][0], 'iserror' => "0"]));
        else
            $this->output->set_output(json_encode(['message' => "no information found at server", 'iserror' => "1"]));

    }

    public function saveReply()
    {
        $this->isAuthorized();
        if ($this->input->is_ajax_request() == false) {
            redirect(base_url() . "institute-error-404");
        }//bad rrequest
        $this->output->set_content_type('application/json');
        $id = $this->input->post("id");
        $reply = $this->input->post("reply");
        $this->load->model('Yes_Student');
        $data = array("enquiry.reply" => $reply, 'enquiry.status' => "Replied");
        $where = array("enquiry.id" => $id);
        $result = $this->Yes_Student->saveEnquiry($data, $where);
        $message = "Something went wrong Please try after some time ";
        if ($result > 0) $message = "Your information successfully saved";

        $this->output->set_output(json_encode(['message' => $message]));
    }


    public function countUnread()
    {
        $this->output->set_content_type('application/json');
        $id = $this->session->userdata('id');
        $this->load->model('Yes_Institute');
        $select = array('enquiry.institute', 'enquiry.student', 'enquiry.mdate', 'enquiry.isiview', 'enquiry.course', 'enquiry.coursename', 'stud_tb.firstname', 'stud_tb.lastname', 'stud_tb.photo');
        $result = $this->Yes_Institute->countUnread($id, $select);
        if (!isset($result['error'])) {


            $data = $result['values'];
            foreach ($data as $key => $value) {
                $data[$key]['photo'] = base_url() . "assets/backend/images/studimages/" . $data[$key]['photo'];
                $data[$key]["mdate"] = date('d/m/Y', strtotime($data[$key]["mdate"]));
            }
            $this->output->set_output(json_encode(['datavalue' => $data, 'value' => 1]));
        } else {
            $this->output->set_output(json_encode(['message' => "no results found", 'value' => 0]));
        }

    }

    public function tes()
    {
        $a = "";
        $b = "";
        if (($a == "") && ($b == "")) {
            echo "value inside th esection";
        }
    }

    public function createFeature()
    {
        $this->isAuthorized();
        if ($this->input->is_ajax_request() == false) {
            redirect(base_url() . "institute-error-404");
        }//bad rrequest
        $this->output->set_content_type('application/json');
        $this->load->helper('form');
        $config['upload_path'] = "./assets/backend/images/collegefeatures/";
        $config['allowed_types'] = 'jpg|gif|png';
        $config['file_name'] = 'feature' . mt_rand(100000, 999999);
        $config['max_size'] = '300';
        $config['min_height'] = '800';
        $config['max_height'] = '800';
        $config['min_width'] = '800';
        $config['max_width'] = '800';
        $config["overwrite"] = true;
        $this->load->library('upload', $config);
        $type = $this->input->post('option');
        if (!$this->upload->do_upload("pic")) {
            $error = array('error' => $this->upload->display_errors());
            $this->output->set_output(json_encode(['message' => "file is not specified or not supported (size should be below 300kb)<br>Allowed type should be png,gif or jpg type<br> Width X Height (800 X 800px) ", 'error' => 1]));
            return false;
        } else {
            $data = $this->upload->data();
            $this->load->model("Yes_Institute");
            $mydata = array("type" => $type, "title" => $this->input->post('title'), "institute" => $this->session->userdata("id"), "content" => $this->input->post('details'), "picture" => $data['file_name']);
            $result = $this->Yes_Institute->createFeature($mydata);

            if ($result > 0) {
                $this->output->set_output(json_encode(['message' => "successfully saved information", 'error' => '0']));
            } else {
                $this->output->set_output(json_encode(['message' => "requested operation not successfull", 'error' => '1']));
            }
        }
    }

    public function getFeature()
    {
        $this->isAuthorized();
        if ($this->input->is_ajax_request() == false) {
            redirect(base_url() . "institute-error-404");
        }//bad rrequest
        $this->load->model('Yes_Institute');
        $data = array("*");
        $where = array("institute" => $this->session->userdata("id"));
        $result = $this->Yes_Institute->getFeature($data, $where);
        $this->output->set_content_type('application/json');
        if (!isset($result["error"])) {
            $data = $result["features"];
            foreach ($data as $key => $value)
                $data[$key]['picture'] = base_url() . "assets/backend/images/collegefeatures/" . $data[$key]['picture'];
            $this->output->set_output(json_encode(['features' => $data, 'iserror' => "0"]));
        } else
            $this->output->set_output(json_encode(['message' => "no information found at server", 'iserror' => "1"]));
    }

    public function getFeatureById()
    {
        $this->isAuthorized();
        if ($this->input->is_ajax_request() == false) {
            redirect(base_url() . "institute-error-404");
        }//bad rrequest
        $where = $this->input->input_stream();
        $this->load->model('Yes_Institute');
        $data = array("*");
        $result = $this->Yes_Institute->getFeatureById($data, $where);
        $this->output->set_content_type('application/json');
        if (!isset($result["error"]))
            $this->output->set_output(json_encode(['features' => $result["features"][0], 'iserror' => "0"]));
        else
            $this->output->set_output(json_encode(['message' => "no information found at server", 'iserror' => "1"]));
    }

    public function deleteFeature()
    {
        $this->isAuthorized();
        if ($this->input->is_ajax_request() == false) {
            redirect(base_url() . "institute-error-404");
        }//bad rrequest
        $where = $this->input->input_stream();
        $this->load->model('Yes_Institute');

        $data = array("picture");
        $mydata = $this->Yes_Institute->getFeatureById($data, $where);
        $path = "./assets/backend/images/" . $mydata["features"][0]["picture"];
        if (file_exists($path)) {
            unlink($path);
        }

        $result = $this->Yes_Institute->deleteFeature($where);
        $this->output->set_content_type('application/json');

        if ($result > 0) {
            $this->output->set_output(json_encode(['message' => "successfully deleted", 'error' => '0']));
        } else {
            $this->output->set_output(json_encode(['message' => "requested operation not successfull", 'error' => '1']));
        }
    }

    public function saveFeature()
    {
        $this->isAuthorized();
        if ($this->input->is_ajax_request() == false) {
            redirect(base_url() . "institute-error-404");
        }//bad rrequest
        $data = array("title" => $this->input->post("title"), "content" => $this->input->post("details"));
        $where = array("id" => $this->input->post("id"));
        $this->load->model('Yes_Institute');
        $result = $this->Yes_Institute->saveFeature($data, $where);
        $this->output->set_content_type('application/json');
        if ($result > 0) {
            $this->output->set_output(json_encode(['message' => "successfully saved information", 'error' => '0']));
        } else {
            $this->output->set_output(json_encode(['message' => "requested operation not successfull", 'error' => '1']));
        }
    }

    public function getCollegecategory()
    {

        $this->output->set_content_type('application/json');
        $idd = $this->input->post('id');
        $id = $idd / 1394;
        $this->load->model("Course");
        $res = $this->Course->getCategory($id);
        if (!isset($res['error'])) {
            $data = $res['category'];
            $this->output->set_output(json_encode(['url' => base_url() . 'assets/backend/feestructure/', 'content' => $data]));
        } else {
            $this->output->set_output(json_encode(['error' => 1]));
        }
    }

    public function getCoursesfront()
    {

        $this->output->set_content_type('application/json');
        $idd = $this->input->post('id');
        $id = $idd / 1394;
        $page=$this->input->post('page');
        $this->load->model("Course");
        $res = $this->Course->getCoursesfront($id,$page);
        $num = $this->Course->countcoursefront($id);
        $tot_pages = ceil($num / 8);
        if (!isset($res['error'])) {
            $data = $res['category'];
            $this->output->set_output(json_encode(['url' => base_url() . 'assets/backend/feestructure/','pagecount'=>$tot_pages,'content' => $data]));
        } else {
            $this->output->set_output(json_encode(['error' => 1]));
        }
    }

    public function getFacilityimages()
    {

        $this->output->set_content_type('application/json');
        $idd = $this->input->post('id');
        $id = $idd / 1394;
        $this->load->model('Yes_Institute');
        $res = $this->Yes_Institute->getfacilityimages($id);
        if (!isset($res["error"])) {
            $data = $res['features'];
            foreach ($data as $key => $value) {
                $data[$key]['picture'] = base_url() . "assets/backend/images/collegefeatures/" . $data[$key]['picture'];
            }
            $this->output->set_output(json_encode(['features' => $data, 'error' => 0]));
        } else {
            $this->output->set_output(json_encode(['error' => 1]));
        }
    }

    public function getseat()
    {
        $this->output->set_content_type('application/json');
        $id = $this->input->post('id');

        $this->load->model('Yes_Institute');
        $res = $this->Yes_Institute->getseat($id);
        $seat = $res['seats'];
        $this->output->set_output(json_encode(['seat' => $seat]));
    }

    public function Updateseat()
    {

        $this->isAuthorized();
        $this->output->set_content_type('application/json');
        $id = $this->input->post('id');
        $seat = $this->input->post('seatcount');
        $this->load->model('Yes_Institute');
        $res = $this->Yes_Institute->Updateseat($id, $seat);
        if ($res > 0) {
            $this->output->set_output(json_encode(['message' => "Update successfully"]));
        } else {
            $this->output->set_output(json_encode(['message' => "Failed to update"]));
        }
    }

    public function getcollegemail()
    {

        $this->isAuthorized();
        $this->output->set_content_type('application/json');
        $page = $this->input->post('page');
        $search = $this->input->post("search");
        $like = array('mailbox_college.subject' => $search);
        $this->load->model('Yes_Institute');
        $email = $this->session->userdata('emailid');
        $res = $this->Yes_Institute->getallmail($email, $page, $like);
        $num = $this->Yes_Institute->countmail($like, $email);
        $tot_pages = ceil($num / 10);
        if (!isset($res['error'])) {
            $value = $res['value'];
            foreach ($value as $key => $values) {
                $value[$key]["subject"] = implode(' ', array_slice(explode(' ', $value[$key]["subject"]), 0, 4));
                $value[$key]["message"] = trim(implode(' ', array_slice(explode(' ', $value[$key]["message"]), 0, 5)));
                $value[$key]["date"] = date('d/m/Y h:i  A', strtotime($value[$key]["date"]));
            }
            $this->output->set_output(json_encode(['message' => "Value is here", 'value' => $value, 'iserror' => 0, 'page_count' => $tot_pages]));
        } else {
            $this->output->set_output(json_encode(['message' => "Failed  to found data", 'iserror' => 1]));
        }
    }

    public function getmailcontent()
    {
        $this->isAuthorized();
        $id = $this->input->post('id');
        $this->output->set_content_type('application/json');
        $this->load->model('Yes_Institute');
        $this->Yes_Institute->updatemail($id);
        $res = $this->Yes_Institute->getmailcontent($id);


        if (!isset($res['error'])) {
            $value = $res['value'];
            foreach ($value as $key => $values) {
                $value[$key]["date"] = date('d/m/Y h:i  A', strtotime($value[$key]["date"]));
            }
            $this->output->set_output(json_encode(['message' => "Value is here", 'value' => $value, 'iserror' => 0]));
        } else {
            $this->output->set_output(json_encode(['message' => "No data found on server", 'iserror' => 1]));
        }
    }

    public function isnewmail()
    {
        $this->isAuthorized();

        $this->output->set_content_type('application/json');
        $email = $this->session->userdata('emailid');
        $this->load->model('Yes_Institute');
        $res = $this->Yes_Institute->checknewmail($email);
        if ($res['value'] > 0) {
            $this->output->set_output(json_encode(['value' => 1, 'count' => $res['value']]));
        }
    }

    public function applyfeatured()
    {

        $this->isAuthorized();


        $this->output->set_content_type('application/json');
        $id = $this->session->userdata('id');
        $this->load->model('Yes_Institute');
        $date = date("Y.m.d");
        $values = array('featured' => $date);
        $check = 'featured';
        $res = $this->Yes_Institute->Applyservice($id, $values, $check);
        if (isset($res['insert']) || ($res['update'])) {
            $this->output->set_output(json_encode(['message' => "Operation succesfully Performed"]));
        } else {
            $this->output->set_output(json_encode(['message' => "Operation failed"]));
        }
    }

    public function applytele()
    {

        $this->isAuthorized();

        $this->output->set_content_type('application/json');
        $id = $this->session->userdata('id');
        $this->load->model('Yes_Institute');
        $date = date("Y.m.d");
        $values = array('telecalling' => $date);
        $check = 'telecalling';
        $res = $this->Yes_Institute->Applyservice($id, $values, $check);
        if (isset($res['insert']) || ($res['update'])) {
            $this->output->set_output(json_encode(['message' => "Operation succesfully Performed"]));
        } else {
            $this->output->set_output(json_encode(['message' => "Operation failed", 's' => $check]));
        }
    }

    public function applyemail()
    {

        $this->isAuthorized();

        $data = $this->input->post('data');
        $this->output->set_content_type('application/json');
        $id = $this->session->userdata('id');
        $this->load->model('Yes_Institute');
        $date = date("Y.m.d");
        $values = array('email' => $date);
        $check = 'email';
        $res = $this->Yes_Institute->Applyservice($id, $values, $check);
        if (isset($res['insert']) || ($res['update'])) {
            $this->output->set_output(json_encode(['message' => "Operation succesfully Performed"]));
        } else {
            $this->output->set_output(json_encode(['message' => "Operation failed"]));
        }
    }

    public function applysocial()
    {

        $this->isAuthorized();

        $data = $this->input->post('data');
        $this->output->set_content_type('application/json');
        $id = $this->session->userdata('id');
        $this->load->model('Yes_Institute');
        $date = date("Y.m.d");
        $values = array('social' => $date);
        $check = 'social';
        $res = $this->Yes_Institute->Applyservice($id, $values, $check);
        if (isset($res['insert']) || ($res['update'])) {
            $this->output->set_output(json_encode(['message' => "Operation succesfully Performed"]));
        } else {
            $this->output->set_output(json_encode(['message' => "Operation failed"]));
        }
    }

    public function applyad()
    {

        $this->isAuthorized();

        $data = $this->input->post('data');
        $this->output->set_content_type('application/json');
        $id = $this->session->userdata('id');
        $this->load->model('Yes_Institute');
        $date = date("Y.m.d");
        $values = array('ad' => $date);
        $check = 'ad';
        $res = $this->Yes_Institute->Applyservice($id, $values, $check);
        if (isset($res['insert']) || ($res['update'])) {
            $this->output->set_output(json_encode(['message' => "Operation succesfully Performed"]));
        } else {
            $this->output->set_output(json_encode(['message' => "Operation failed"]));
        }
    }


    public function Getapplied()
    {

        $this->output->set_content_type('application/json');
        $this->load->model('Yes_Institute');
        $id = $this->session->userdata('id');
        $res = $this->Yes_Institute->getapplied($id);
        $this->output->set_output(json_encode(['datas' => $res]));

    }


    public  function isCategoryexist(){

        if($this->input->is_ajax_request()==false) {     redirect(base_url() . "yescolleges-error-400");    }//bad rrequest
        $this->output->set_content_type('application/json');
        $search=$this->input->post('data');
        $this->load->model("Category","college");
        $select=array('categoryname','id');
        $like=array('categoryname'=>$search);
        $result=$this->college->getExistCategory($select,$like);
        if(!isset($result['error'])){

            $collegedata=$result['institute'];


            $this->output->set_output(json_encode(['content'=>$collegedata,'error'=>0]));

        }
        else{
            $this->output->set_output(json_encode(['message'=>"no colleges found on server",'error'=>1]));
        }
    }


    public function savenewcourse()
    {
        if ($this->input->is_ajax_request() == false) {
            redirect(base_url() . "Exceptions/page_400");
        }//bad rrequest
        $this->isAuthorized();
        $this->output->set_content_type('application/json');
        $category = $this->input->post('category');
        $date = date("Y-m-d");
        $name = $this->session->userdata['username'];
        $data = array('categoryname' => $category, 'date' => $date, 'caddedby' => $name);

            $this->load->model("Category");
            $result = $this->Category->savenewcategory($data);

            if (!isset($result['error'])) {
                $this->output->set_output(json_encode(['message' => "succesfully saved data", 'error' => "0"]));
            }
             else if (isset($result['error'])) {
            $this->output->set_output(json_encode(['message' => "category already exists", 'error' => "0"]));
             }
            else {
                $this->output->set_output(json_encode(['message' => "requested action was unsuccessfull", 'error' => "1"]));
            }

    }


    public function getSimiliarcollege()
    {

        $this->output->set_content_type('application/json');
        $this->load->model('Yes_Institute');
        $select = array('title', 'logo', 'id', 'state', 'district', 'profile');
        $res = $this->Yes_Institute->getSimiliarcolleges($select);
        $value = $res['value'];

        foreach ($value as $key => $values) {
            $value[$key]['logo'] = base_url() . "assets/backend/images/collegelogo/" . $value[$key]['logo'];
            $value[$key]['profile'] = base_url() . "assets/backend/images/collegeprofile/" . $value[$key]['profile'];
            $value[$key]['id'] = 1394 * $value[$key]['id'];
        }
        $this->output->set_output(json_encode(['content' => $value]));
    }


    public function getSimiliarcollege2()
    {

        $this->output->set_content_type('application/json');
        $category=$this->input->post('cat');
        $id=$this->input->post('cid');
        $this->load->model('Yes_Institute');
        $select = array('title', 'logo', 'id', 'state', 'district', 'profile');
        $res = $this->Yes_Institute->getSimiliarcolleges2(array('type'=>$category,'id'=>$id),$select);
        $value = $res['value'];

        foreach ($value as $key => $values) {
            $value[$key]['logo'] = base_url() . "assets/backend/images/collegelogo/" . $value[$key]['logo'];
            $value[$key]['profile'] = base_url() . "assets/backend/images/collegeprofile/" . $value[$key]['profile'];
            $value[$key]['id'] = 1394 * $value[$key]['id'];
        }
        $this->output->set_output(json_encode(['content' => $value,'id!='=>$id]));
    }

    public function getNews()
    {
        //$this->isAuthorized();
        if ($this->input->is_ajax_request() == false) {
            redirect(base_url() . "institute-error400");
        }//bad rrequest
        $this->load->model('Yes_Institute');
        $data = array("*");
        $clgid = $this->input->post('id');
        $id = $clgid / 1394;
        $where = array('institute' => $id, 'type' => "event");
        $result = $this->Yes_Institute->getEvent($data, $where);
        $this->output->set_content_type('application/json');
        if (!isset($result["error"])) {
            $data = $result["features"];
            foreach ($data as $key => $value)
                $data[$key]['picture'] = base_url() . "assets/backend/images/collegefeatures/" . $data[$key]['picture'];
            $data[$key]['date'] = date('d/m/Y', strtotime($data[$key]['date']));
            $this->output->set_output(json_encode(['events' => $data, 'iserror' => "0"]));
        } else
            $this->output->set_output(json_encode(['message' => "no information found at server", 'iserror' => "1"]));
    }

    public function getFeaturedcollege()
    {

        $this->output->set_content_type('application/json');
        $this->load->model('Yes_Institute');
        $select = array('title', 'logo', 'id', 'state', 'district');
        $res = $this->Yes_Institute->getFeaturedcolleges($select);
        $value = $res['value'];

        foreach ($value as $key => $values) {
            $value[$key]['logo'] = base_url() . "assets/backend/images/collegelogo/" . $value[$key]['logo'];
            $value[$key]['id'] = 1394 * $value[$key]['id'];
        }
        $this->output->set_output(json_encode(['content' => $value]));
    }

    public function getclgBrochure()
    {

        $this->output->set_content_type('application/json');
        $this->load->model("Yes_Institute");
        $id = $this->input->post('id') / 1394;


        $select = array('brochure');
        $result = $this->Yes_Institute->getclgBrochure($id, $select);
        if (!isset($res['error'])) {

            $res["brochure"][0]["brochureurl"] = base_url() . "assets/brochure/" . $result["brochure"][0]["brochure"];

            $this->output->set_output(json_encode(['data' => $res["brochure"][0], 'value' => $result["brochure"][0]["brochure"]]));
        } else {

            $this->output->set_output(json_encode(['error' => 1]));
        }

    }

    public function getAttachments()
    {

        $this->output->set_content_type('application/json');
        $studid = $this->input->post('student');
        $this->load->model('Yes_Student');
        $res = $this->Yes_Student->getattachs($studid);

        if (!isset($res['error'])) {

            $value = $res['value'];
            foreach ($value as $key => $values) {

                $value[$key]['date'] = date('d/m/Y', $value[$key]['date']);
                $value[$key]['attachment'] = base_url() . "assets/backend/studattachments/" . $value[$key]['attachment'];
            }
            $this->output->set_output(json_encode(['contents' => $value, 'error' => 0]));
        } else {
            $this->output->set_output(json_encode(['message' => 'No attachments found', 'error' => 1]));
        }
    }

    public function collegetostudentmail()
    {

        $this->output->set_content_type('application/json');

        $to = $this->input->post('to');
        $subject = $this->input->post('mailsubject');
        $message = $this->input->post('message');


        $collegename = $this->session->userdata('username');
        $this->load->library('email');
        $this->email->set_newline("\r\n");
        $this->email->from('info@yescolleges.com', $collegename);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);


        if ($this->email->send()) {
            $this->output->set_output(json_encode(['message' => "Mail succesfully send", 'iserror' => 0]));
        } else {
            $this->output->set_output(json_encode(['message' => "Mail failed to sent", 'iserror' => 1]));
        }


    }


    public function getvisitors()
    {

        $this->output->set_content_type('application/json');
        $cid = $this->session->userdata('id');
        $this->load->model('Yes_Institute');
        $page = $this->input->post('page');
        $res = $this->Yes_Institute->getVisitors($cid);
        $num = $this->Yes_Institute->countvisitors($cid, $page);
        $tot_pages = ceil($num / 10);
        if (!isset($res['error'])) {

            $this->output->set_output(json_encode(['count' => $res['row'], 'page_count' => $tot_pages, 'value' => $res['value']]));
        } else {
            $this->output->set_output(json_encode(['message' => "No vistors found", 'iserror' => 1]));
        }

    }






    public function getstudentPro()
    {

        $this->output->set_content_type('application/json');
        $cid = $this->input->post('sid');
        $this->load->model('Yes_Student');

        $res = $this->Yes_Student->getStudentPro($cid);
        if (!isset($res['error'])) {

            $data = $res['value'];
            foreach ($data as $key => $value) {
                $data[$key]['photo'] = base_url() . "assets/backend/images/studimages/" . $data[$key]['photo'];
            }
            $this->output->set_output(json_encode(['value' => $data, 'iserror' => 0]));
        } else {
            $this->output->set_output(json_encode(['message' => "No student found", 'iserror' => 1]));
        }

    }

    public function countvisitors()
    {

        $this->output->set_content_type('application/json');
        $cid = $this->session->userdata('id');
        $this->load->model('Yes_Institute');

        $res = $this->Yes_Institute->countclgvisitors($cid);

            $this->output->set_output(json_encode(['count' => $res]));


    }


    public function countcourse()
    {

        $this->output->set_content_type('application/json');
        $cid = $this->session->userdata('id');
        $this->load->model('Yes_Institute');

        $res = $this->Yes_Institute->countcourses($cid);

            $this->output->set_output(json_encode(['count' => $res]));

    }

    public function countrequest()
    {

        $this->output->set_content_type('application/json');
        $cid = $this->session->userdata('id');
        $this->load->model('Yes_Institute');

        $res = $this->Yes_Institute->countenquiry($cid);

        $this->output->set_output(json_encode(['count' => $res]));

    }

    public function countreviews()
    {

        $this->output->set_content_type('application/json');
        $cid = $this->session->userdata('id');
        $this->load->model('Yes_Institute');

        $res = $this->Yes_Institute->countclgreviews($cid);



            $this->output->set_output(json_encode(['count' => $res]));




    }



    public function getclgReviews()
    {

        $this->output->set_content_type('application/json');
        $this->load->model('Yes_Institute');
        $page = $this->input->post('page');
        $id = $this->input->post('id')/1394;
        $select = array('institute.id', 'institute.title', 'institute.state', 'institute.city', 'institute.profile', 'reviews.rid',
            'reviews.student', 'reviews.college', 'reviews.date', 'reviews.content', 'reviews.stars');
        $res = $this->Yes_Institute->getCollegereviews($select,$page,3,$id);

        $num = $this->Yes_Institute->countReviews($id);
        $tot_pages = ceil($num / 3);
        if (!isset($res['error'])) {

            $review = $res['value'];

            foreach ($review as $key => $value) {


                $review[$key]['college'] = 1394 * $review[$key]['college'];
                $review[$key]['profile'] = base_url() . "assets/backend/images/collegeprofile/" . $review[$key]['profile'];
                $review[$key]['date'] = date('d/m/Y h:i  A', strtotime($review[$key]['date']));
            }
            $this->output->set_output(json_encode(['reviews' => $review,'num'=>$num, 'pagecount' => $tot_pages, 'error' => 0]));
        } else {
            $this->output->set_output(json_encode(['message' => "no reviews found", 'error' => 1]));
        }
    }


    public function adminclgreviews()
    {

        $this->output->set_content_type('application/json');
        $this->load->model('Yes_Institute');
        $page = $this->input->post('page');

        $where=$this->session->userdata('id');
        $res = $this->Yes_Institute->getCollegeadminreviews($where,$page,10);

        $num = $this->Yes_Institute->countadminReviews($where);
        $tot_pages = ceil($num / 10);
        if (!isset($res['error'])) {

            $review = $res['value'];

            foreach ($review as $key => $value) {


                $review[$key]['date'] = date('d/m/Y h:i  A', strtotime($review[$key]['date']));
            }
            $this->output->set_output(json_encode(['reviews' => $review,'page_count' => $tot_pages, 'error' => 0]));
        } else {
            $this->output->set_output(json_encode(['message' => "no reviews found",'error' => 1]));
        }
    }


}