<?php

class Seoadmin extends CI_Controller{


    public function __construct() {      parent::__construct();     }
    private $data=array('pageview'=>"index");


    public function seoAuthorized()
    {
        if (!($this->session->has_userdata('seoid'))) {
            redirect(base_url() . "institute-error-401");
        }// you are not authorized
        else {
            $this->data["username"] = $this->session->userdata("username");
            $this->data["emailid"] = $this->session->userdata("emailid");
            $this->data["logdate"] = date('d/m/Y h:i:s  A', strtotime($this->session->userdata("logdate")));
        }
    }

    public function loginpage(){


        $this->load->view('seoadmin/seologin');
    }


    public function dashboard(){

        $this->seoAuthorized();

        $this->data["pageview"]="home";
        $this->load->view("seoadmin/common/template",$this->data);

    }



    public function login()
    {
        if ($this->input->is_ajax_request() == false) {
            redirect(base_url() . "Pagenotfounds");
        }//bad rrequest
        $data = $this->input->input_stream();
        //$data["password"] = hash('sha256', $data["password"] . SALT);
        //$data["isblocked"] = 0; //$data["isactivated"]=1;
        $this->load->model('SeoModel');
        $result = $this->SeoModel->seologin($data);
        $this->output->set_content_type('application/json');
        if (!isset($result["error"])) {
            $seo = $result['seo'][0];
            $this->session->set_userdata($seo);
            $date = date('Y-m-d H:i:s');
            $result = $this->SeoModel->updateseologin($data, array("logdate" => $date));
            $subject = "Yescolleges.com Account Login Information";



            $this->output->set_output(json_encode(['url' => base_url() . "seoadmin-home", 'iserror' => "0"]));
        } else {
            $this->output->set_output(json_encode(['message' => "Invalid username or password", 'iserror' => "1"]));
        }

    }


    public function logout()
    {
        if (!($this->session->has_userdata('seoid')))   {           redirect(base_url() . "page404");         }// you are not authorized
        $this->seoAuthorized();
        $this->session->sess_destroy();
        redirect(base_url());
    }


    public function getpages(){

        $this->output->set_content_type('application/json');

        $this->load->model('SeoModel');
        $res=$this->SeoModel->getallpages();
        $this->output->set_output(json_encode(['message' => $res]));

    }



    public function getTags()
    {
        $this->seoAuthorized();
        $this->output->set_content_type('application/json');
        $id = $this->input->post('id');
        $this->load->model('SeoModel');
        $result = $this->SeoModel->getpageTag($id);

        $this->output->set_output(json_encode(['content' => $result[0]]));

    }


    public function getTagsfront()
    {

        $this->output->set_content_type('application/json');
        $id = $this->input->post('id');
        $this->load->model('SeoModel');
        $result = $this->SeoModel->getpageTag($id);

        $this->output->set_output(json_encode(['content' => $result]));

    }

    public function updatatTags(){

        $this->seoAuthorized();
        $this->output->set_content_type('application/json');
        $id=$this->input->post('id');
        $ntag=$this->input->post('ntag');
        $ktag=$this->input->post('ktag');
        $ttag=$this->input->post('ttag');
        $date = date('Y-m-d H:i:s');
        $update=array('title'=>$ttag,'metaname'=>$ntag,'metadescription'=>$ktag,'updatedon'=>$date);
        $this->load->model('SeoModel');
        $result=$this->SeoModel->updatepagetag($id,$update);
        if($result>0) {
            $this->output->set_output(json_encode(['id'=>$id, 'message' => 'succesfully updated']));
        }else
        {
            $this->output->set_output(json_encode(['id'=>$id,'message' => 'Failed to update']));
        }

    }
}
?>