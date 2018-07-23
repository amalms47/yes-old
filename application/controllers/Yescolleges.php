<?php


class Yescolleges extends CI_Controller{



    public function __construct() {      parent::__construct();     }
    private $data=array('pageview'=>"index","seo"=>"none");



    public function testmail(){

        $this->load->library('email');
        $this->email->set_newline("\r\n");
        $this->email->from('info@yescolleges.com');
        $this->email->to('amal@technorip.com');
        $this->email->subject('testmail');
        $this->email->message('Checking zoho smtp');
        if ($this->email->send()) {
            echo "Mail success";
        }
        else{
            echo $this->email->print_debugger();
        }

    }


    public function index(){

        $this->data["pageview"]="index";
        $this->load->model('Yes_Institute');
        $where=array('id'=>1);
        $content=$this->Yes_Institute->getpagesdata($where);
        foreach ($content as $val=>$value){
            $this->data["title"]=$value['title'];
            $this->data["metaname"]=$value['metaname'];
            $this->data["metadesc"]=$value['metadescription'];
        }
        $this->load->view('common/template',$this->data);

    }


    public function error400()
    {
        $this->load->view("error/error_400");
    }

    public function adwithus(){


        $this->data["pageview"]="advertisewithus";
        $this->load->model('Yes_Institute');
        $where=array('id'=>7);
        $content=$this->Yes_Institute->getpagesdata($where);
        foreach ($content as $val=>$value){
            $this->data["title"]=$value['title'];
            $this->data["metaname"]=$value['metaname'];
            $this->data["metadesc"]=$value['metadescription'];
        }
        $this->load->view('common/template',$this->data);


    }

    public function courseicons(){

        $this->data["pageview"]="coursesicon";
        $this->load->view('common/template',$this->data);

    }

    public function faq(){

        $this->data["pageview"]="faq";
        $this->load->view('common/template',$this->data);

    }

    public function coursesection(){

        $this->data["pageview"]="institute/coursecontent";
        $this->load->model('Yes_Institute');
        $where=array('id'=>19);
        $content=$this->Yes_Institute->getpagesdata($where);
        foreach ($content as $val=>$value){
            $this->data["title"]=$value['title'];
            $this->data["metaname"]=$value['metaname'];
            $this->data["metadesc"]=$value['metadescription'];
        }
        $this->load->view('common/template',$this->data);



    }

    public function careersection(){

        $this->data["pageview"]="career";
        $this->load->model('Yes_Institute');
        $where=array('id'=>13);
        $content=$this->Yes_Institute->getpagesdata($where);
        foreach ($content as $val=>$value){
            $this->data["title"]=$value['title'];
            $this->data["metaname"]=$value['metaname'];
            $this->data["metadesc"]=$value['metadescription'];
        }
        $this->load->view('common/template',$this->data);




    }

    public function coursesinglesection($cat,$term){

        $data["term"]="";
        if(isset($term)||($cat))

        {
            $this->data["term"]=  str_replace('+',' ',$term);
            $this->data["cat"]=  str_replace('+',' ',$cat);
            $this->data["pageview"]="institute/coursesinglesection";
            $this->load->view('common/template',$this->data);

        }
        else{
            redirect(base_url() . "Exceptions");
        }
    }


    public function careersinglesection($cat,$term){

        $data["term"]="";
        if(isset($term)||($cat))

        {
            $this->data["term"]=  str_replace('+',' ',$term);
            $this->data["cat"]=  str_replace('+',' ',$cat);
            $this->data["pageview"]="careerindividual";
            $this->load->view('common/template',$this->data);

        }
        else{
            redirect(base_url() . "Exceptions");
        }



    }


    public function sitemap()
    {

        $this->load->model('SeoModel');
        $res=$this->SeoModel->getallslug();
        $course=$this->SeoModel->getallcouslug();
        $career=$this->SeoModel->getallcarslug();

        $this->data['course']=$course;
        $this->data['career']=$career;

        $this->data['count']=$res['num'];
        $this->data['seos']=$res['seo'];
        //echo $res['seo'];
        $this->load->view("location",$this->data);

        //$this->load->view("sitemap.xml",$this->data);
    }

    public function topcolleges(){


        $this->data["pageview"]="topcolleges";
        $this->load->model('Yes_Institute');
        $where=array('id'=>8);
        $content=$this->Yes_Institute->getpagesdata($where);
        foreach ($content as $val=>$value){
            $this->data["title"]=$value['title'];
            $this->data["metaname"]=$value['metaname'];
            $this->data["metadesc"]=$value['metadescription'];
        }
        $this->load->view('common/template',$this->data);
    }

    public function reviews(){


        $this->data["pageview"]="reviewpage";
        $this->load->model('Yes_Institute');
        $where=array('id'=>10);
        $content=$this->Yes_Institute->getpagesdata($where);
        foreach ($content as $val=>$value){
            $this->data["title"]=$value['title'];
            $this->data["metaname"]=$value['metaname'];
            $this->data["metadesc"]=$value['metadescription'];
        }
        $this->load->view('common/template',$this->data);



    }

    public function vision(){

        $this->data["pageview"]="vision";
        $this->load->model('Yes_Institute');
        $where=array('id'=>4);
        $content=$this->Yes_Institute->getpagesdata($where);
        foreach ($content as $val=>$value){
            $this->data["title"]=$value['title'];
            $this->data["metaname"]=$value['metaname'];
            $this->data["metadesc"]=$value['metadescription'];
        }
        $this->load->view('common/template',$this->data);
    }

    public function contact(){

        $this->data["pageview"]="contact";
        $this->load->model('Yes_Institute');
        $where=array('id'=>5);
        $content=$this->Yes_Institute->getpagesdata($where);
        foreach ($content as $val=>$value){
            $this->data["title"]=$value['title'];
            $this->data["metaname"]=$value['metaname'];
            $this->data["metadesc"]=$value['metadescription'];
        }
        $this->load->view('common/template',$this->data);


    }
    public function about(){

        $this->data["pageview"]="aboutus";
        $this->load->model('Yes_Institute');
        $where=array('id'=>3);
        $content=$this->Yes_Institute->getpagesdata($where);
        foreach ($content as $val=>$value){
            $this->data["title"]=$value['title'];
            $this->data["metaname"]=$value['metaname'];
            $this->data["metadesc"]=$value['metadescription'];
        }
        $this->load->view('common/template',$this->data);



    }

    public function error_browser(){
        $this->load->view('error/error_browser');
    }

    public function notavailable(){
        $this->load->view('error/notavaliable');
    }



    public function infopage(){

        $this->data["pageview"]="infopage";
        $this->load->model('Yes_Institute');
        $where=array('id'=>2);
        $content=$this->Yes_Institute->getpagesdata($where);
        foreach ($content as $val=>$value){
            $this->data["title"]=$value['title'];
            $this->data["metaname"]=$value['metaname'];
            $this->data["metadesc"]=$value['metadescription'];
        }
        $this->load->view('common/template',$this->data);
    }

    public function subpage1(){

        $this->data["pageview"]="subpage1";
        $this->load->model('Yes_Institute');
        $where=array('id'=>14);
        $content=$this->Yes_Institute->getpagesdata($where);
        foreach ($content as $val=>$value){
            $this->data["title"]=$value['title'];
            $this->data["metaname"]=$value['metaname'];
            $this->data["metadesc"]=$value['metadescription'];
        }
        $this->load->view('common/template',$this->data);

    }

    public function subpage2(){
        $this->data["pageview"]="subpage2";
        $this->load->model('Yes_Institute');
        $where=array('id'=>15);
        $content=$this->Yes_Institute->getpagesdata($where);
        foreach ($content as $val=>$value){
            $this->data["title"]=$value['title'];
            $this->data["metaname"]=$value['metaname'];
            $this->data["metadesc"]=$value['metadescription'];
        }
        $this->load->view('common/template',$this->data);
    }
  public function subpage3(){
        $this->data["pageview"]="subpage3";
        $this->load->model('Yes_Institute');
        $where=array('id'=>20);
        $content=$this->Yes_Institute->getpagesdata($where);
        foreach ($content as $val=>$value){
            $this->data["title"]=$value['title'];
            $this->data["metaname"]=$value['metaname'];
            $this->data["metadesc"]=$value['metadescription'];
        }
        $this->load->view('common/template',$this->data);
    }

    public function subpage4(){
        $this->data["pageview"]="subpage4";
        $this->load->model('Yes_Institute');
        $where=array('id'=>16);
        $content=$this->Yes_Institute->getpagesdata($where);
        foreach ($content as $val=>$value){
            $this->data["title"]=$value['title'];
            $this->data["metaname"]=$value['metaname'];
            $this->data["metadesc"]=$value['metadescription'];
        }
        $this->load->view('common/template',$this->data);
    }


    public function subpage5(){
        $this->data["pageview"]="subpage5";
        $this->load->model('Yes_Institute');
        $where=array('id'=>17);
        $content=$this->Yes_Institute->getpagesdata($where);
        foreach ($content as $val=>$value){
            $this->data["title"]=$value['title'];
            $this->data["metaname"]=$value['metaname'];
            $this->data["metadesc"]=$value['metadescription'];
        }
        $this->load->view('common/template',$this->data);
    }

    public function subpage6(){
        $this->data["pageview"]="subpage6";
        $this->load->model('Yes_Institute');
        $where=array('id'=>18);
        $content=$this->Yes_Institute->getpagesdata($where);
        foreach ($content as $val=>$value){
            $this->data["title"]=$value['title'];
            $this->data["metaname"]=$value['metaname'];
            $this->data["metadesc"]=$value['metadescription'];
        }
        $this->load->view('common/template',$this->data);
    }

    public function compareclg(){
        $this->data["pageview"]="institute/comparepage";
        $this->load->view('common/template',$this->data);
    }

    public function comparepage($clgname=null,$clgid=null){

        if(!empty($clgid)) {
            $this->data['clgname'] = urldecode($clgname);
            $this->data['clgid'] = urldecode($clgid);
            $this->data["pageview"] = "institute/comparepage";

            $this->load->view("common/template", $this->data);
        }
        else{
            redirect('Exceptions');
        }
    }


    public  function getsearchcollege(){

        if($this->input->is_ajax_request()==false) {     redirect(base_url() . "yescolleges-error-400");    }//bad rrequest
        $this->output->set_content_type('application/json');
        $search=$this->input->post('datas');
        $this->load->model("Yes_Institute","college");
        $select=array('title','shortname','id');
        //$like=array('title'=>$search);
        $result=$this->college->getindexsearch($select,$search);
        if(!isset($result['error'])){

            $collegedata=$result['institute'];


            $this->output->set_output(json_encode(['content'=>$collegedata,'error'=>0]));

        }
        else{
            $this->output->set_output(json_encode(['message'=>"no colleges found on server",'error'=>1]));
        }
    }



    public  function getsearchcourse(){

        if($this->input->is_ajax_request()==false) {      redirect(base_url() . "yescolleges-error-400");    }//bad rrequest
        $this->output->set_content_type('application/json');
        $search=$this->input->post('datas');

        $this->load->model("Yes_Institute","college");
        $select=array('name','cid','shortname');
        //$like=array('name'=>$search);
        $result=$this->college->getindexcoursesearch($select,$search);
        if(!isset($result['error'])){

            $collegedata=$result['course'];


            $this->output->set_output(json_encode(['content'=>$collegedata,'error'=>0]));

        }
        else{
            $this->output->set_output(json_encode(['message'=>"no colleges found on server",'error'=>1]));
        }
    }


    public function getSimiliarcollege()
    {
        if($this->input->is_ajax_request()==false) {      redirect(base_url() . "yescolleges-error-400");    }//bad rrequest
        $this->output->set_content_type('application/json');
        $this->load->model('Yes_Institute');
        $select = array('title','slug', 'logo', 'id', 'state', 'district', 'profile');
        $res = $this->Yes_Institute->getSimiliarcolleges($select);
        $value = $res['value'];

        foreach ($value as $key => $values) {
            $value[$key]['logo'] = base_url() . "assets/backend/images/collegelogo/" . $value[$key]['logo'];
            $value[$key]['profile'] = base_url() . "assets/backend/images/collegeprofile/" . $value[$key]['profile'];
            $value[$key]['id'] = 1394 * $value[$key]['id'];
        }
        $this->output->set_output(json_encode(['content' => $value]));
    }






    public function collegeview($collegename=null)
    {

        if(($collegename)==""){ redirect(base_url() . "yescolleges-error-400");  }

        $data["collegename"]="";

        $this->load->model('Yes_Institute');
        $result=$this->Yes_Institute->id_exists($collegename);
        if(!isset($result['error'])){

            $tags=$this->Yes_Institute->getCollegetags($result['value']);

            foreach ($tags as $val=>$value){
                $this->data["title"]=$value['titletag'];
                $this->data["metaname"]=$value['metanametag'];
                $this->data["metadesc"]=$value['metakeytag'];
            }

            $this->data["collegeid"]=  $result['value']*1394;
                $this->data["collegename"]=  urldecode($collegename);
             $this->data['pageview']="institute/collegeprofileview";
             $this->load->view('common/template',$this->data);
        }
        else{
            redirect('Exceptions');
        }
    }




    public function test1(){
        echo "test funcion";
    }


    public function search()
    {

        $data["term"]="";
        $term=$this->input->post('search_term');
        $term = substr($term, 0, strpos($term, "("));

        if(isset($term))

        {
            $this->data["term"]=  str_replace('+',' ',$term);

        }
        $this->data["pageview"]="institute/collegelist";
        $this->load->view('common/template',$this->data);

    }


    public function coursesearch()
    {

        $data["term"]="";
        $term=$this->input->post('courseterm');
        $term = substr($term, 0, strpos($term, "("));
        if(isset($term))

        {
            $this->data["term"]=  str_replace('+',' ',$term);

        }

        $this->data["pageview"]="institute/courselist";
        $this->load->view('common/template',$this->data);
    }


    public function categorysearch($term=null)
    {

        $data["term"]="";
        if(isset($term))

        {
            $this->data["term"]=  str_replace('+',' ',$term);

        }

        $this->data["pageview"]="institute/categorylist";
        $this->load->view('common/template',$this->data);
    }

    public function getResult()
    {

        $id="";
        $this->load->library('encrypt');
        if ($this->input->is_ajax_request() == false) {  redirect(base_url() . "yescolleges-error-400");}//bad rrequest
        $page = $this->input->post("page");
        $term = $this->input->post("term");
        $stream=$this->input->post("stream");
        $stream2=$this->input->post("stream2");
        $state=$this->input->post("state");
        $city=$this->input->post("city");
        if($stream2!=""){$choice=array('type'=>$stream2);}
        if($stream2=="topcolleges"){$choice=array('ispayed'=>1);}
        if($stream2=="featured"){$choice=array('ispayed'=>1);}
        if($stream!=""){$choice=array('type'=>$stream);}
        if($state!=""){$location=array('institute.state'=>$state);}
        if($city!=""){$citylocation=array('district'=>$city);}
        $where = array("masterkey" => 1, "isblocked" => 0);
        $like = array("title" => $term);
        //if(isset($like)){unset($choice);}
        $mike = array("shortname" => $term);
        $select = array('id','slug','emailid','contactno','title','shortname','subtitle','logo','profile','cover','type','university','address','state','district','city','pincode','faxno','url','mapcode');
        $this->load->model('Yes_Institute');
        $result = $this->Yes_Institute->getInstituteBy($choice,$location,$citylocation, $like, $mike, $select, $page, 4);
        $num = $this->Yes_Institute->countInstituteBy($choice,$location,$citylocation,$like, $mike);
        $tot_pages = ceil($num / 4);

        $this->output->set_content_type('application/json');
        if (!isset($result["error"])) {


            $inscount=$num;
            $collegedata = $result['institutes'];
            foreach ($collegedata as $key => $value) {


                $collegedata[$key]['id']=1394*($collegedata[$key]['id']);

                $collegedata[$key]['logo'] = base_url() . "assets/backend/images/collegelogo/" . $collegedata[$key]['logo'];
                $collegedata[$key]['profile'] = base_url() . "assets/backend/images/collegeprofile/" . $collegedata[$key]['profile'];
            }
            $this->output->set_output(json_encode(['institutes' => $collegedata, 'page_count' => $tot_pages, 'query' => $result["query"],'inst_count'=>$inscount, 'iserror' => "0"]));

        }
        else{
            $this->output->set_output(json_encode(['message' => $result["error"], 'iserror' => "1"]));
        }
    }





    public function getcourseResult()
    {

        if ($this->input->is_ajax_request() == false) {  redirect(base_url() . "yescolleges-error-400");}
            $this->output->set_content_type('application/json');

        $term = $this->input->post("term");
        $level = $this->input->post("level");
        $page = $this->input->post("page");
        $stream = $this->input->post("stream");
        $urlsearch = $this->input->post("urlcourse");
        $urlsearch=  str_replace('-',' ',$urlsearch);


        $choice="";
        if($stream!=""){$choice=array('category_id'=>$stream);}
        if($level!=""){$level=array('level'=>$level);}

        $select=array('allcourse.couid','allcourse.inst_id','allcourse.course_id','allcourse.shortname','allcourse.category_id','courses.level',
           'institute.id','institute.username','institute.contactno','institute.shortname','institute.subtitle','institute.profile',
            'institute.type','institute.university','institute.address','institute.state','institute.district','institute.city');

        $this->load->model('Yes_Institute');


        $res=$this->Yes_Institute->getCourseby($urlsearch,$choice,$level,$term,$page,4);
        $num = $res['pcount']; //$this->Yes_Institute->countCoursesby($choice,$level,$term);

        //$num=10;
        $tot_pages = ceil($num / 4);
        if(!isset($res['error'])){


            $inscount=$num;
            $collegedata = $res['courses'];
            foreach ($collegedata as $key => $value) {


                $collegedata[$key]['id']=1394*$collegedata[$key]['id'];

                $collegedata[$key]['logo'] = base_url() . "assets/backend/images/collegelogo/" . $collegedata[$key]['logo'];
                $collegedata[$key]['profile'] = base_url() . "assets/backend/images/collegeprofile/" . $collegedata[$key]['profile'];
            }
            $this->output->set_output(json_encode(['c'=>$urlsearch,'t'=>$term,'course' => $collegedata,'page_count'=>$tot_pages,'inst_count'=>$num, 'iserror' => "0"]));
        }
        else {
            $this->output->set_output(json_encode(['message' => $res["error"],'t'=>$tot_pages,'term'=>$term, 'iserror' => "1"]));
        }



    }



    public function getCategoryResult()
    {

        if ($this->input->is_ajax_request() == false) {  redirect(base_url() . "yescolleges-error-400");}
        $this->output->set_content_type('application/json');

        $term = $this->input->post("term");
        $level = $this->input->post("level");
        $page = $this->input->post("page");
        $this->load->model('Yes_Institute');
        if($level!=""){$level=array('level'=>$level);}

        /*$select=array('courses.id','courses.inst_id','courses.name','courses.shortname','courses.category','courses.level',
            'institute.id','institute.title','institute.username','institute.contactno','institute.shortname','institute.subtitle','institute.profile',
            'institute.type','institute.university','institute.address','institute.state','institute.district','institute.city');
        $this->load->model('Yes_Institute');*/
        //$select=('*');
        $res=$this->Yes_Institute->getCategoryby($level,$term,$page,4);
        $num =$res['pcount']; //$this->Yes_Institute->countCategorysby($level,$term);

        $tot_pages = ceil($num / 4);
        if(!isset($res['error'])){


            $collegedata = $res['courses'];
            foreach ($collegedata as $key => $value) {


                $collegedata[$key]['id']=1394*$collegedata[$key]['id'];

                $collegedata[$key]['logo'] = base_url() . "assets/backend/images/collegelogo/" . $collegedata[$key]['logo'];
                $collegedata[$key]['profile'] = base_url() . "assets/backend/images/collegeprofile/" . $collegedata[$key]['profile'];
            }
            $this->output->set_output(json_encode(['course' => $collegedata,'page_count'=>$tot_pages,'inst_count'=>$num, 'iserror' => "0"]));
        }
        else {
            $this->output->set_output(json_encode(['message' => $res["error"],'term'=>$level, 'iserror' => "1"]));
        }



    }


    public function testenc($data){
        $this->load->library('encrypt');
        $enc=$this->encrypt->encode($data);
        return $enc;
    }

    public function getSimiliarcollege2()
    {

        $this->output->set_content_type('application/json');
        $category=$this->input->post('cat');
        $id=$this->input->post('cid')/1394;
        $this->load->model('Yes_Institute');
        $select = array('title','slug','logo', 'id', 'state', 'district', 'profile');
        $res = $this->Yes_Institute->getSimiliarcolleges2(array('type'=>$category,'id!='=>$id),$select);
        $value = $res['value'];

        foreach ($value as $key => $values) {
            $value[$key]['logo'] = base_url() . "assets/backend/images/collegelogo/" . $value[$key]['logo'];
            $value[$key]['profile'] = base_url() . "assets/backend/images/collegeprofile/" . $value[$key]['profile'];
            $value[$key]['id'] = 1394 * $value[$key]['id'];
        }
        $this->output->set_output(json_encode(['content' => $value]));
    }



    public function getalldata(){
        if($this->input->is_ajax_request()==false) {     redirect(base_url() . "yescolleges-error-400");    }//bad rrequest
        $this->load->library('encrypt');
        $this->output->set_content_type('application/json');
        //$id=1;
        $name=$this->input->post('data');


        $select = array('details','slug','titletag','metanametag','metakeytag','collegetype','emailid','f_entertainment','f_pool','f_parking','f_gym','f_hostel','f_library','f_wifi','f_canteen','f_bus','f_atm','f_sports','f_placement','contactno','title','shortname','subtitle','logo','cover','type','university','address','state','district','city','pincode','faxno','url','mapcode');

        $this->load->model("Yes_Institute","college");
        $result=$this->college->getinstitutedata($name,$select);
        if(!isset($result['error'])){
            $data=$result['value'];
            foreach($data as $key => $value)
                $data[$key]['logo'] = base_url()."assets/backend/images/collegelogo/".$data[$key]['logo'];
            $data[$key]['cover'] = base_url()."assets/backend/images/collegecover/".$data[$key]['cover'];
            $this->output->set_output(json_encode(['message'=>"value is here",'content'=>$data]));
        }
        else{

            $this->output->set_output(json_encode(['message'=>"value no"]));
        }

    }
    public function test(){

    $this->load->view('test');

    }

    public function location(){
      //  $this->load->view('location');
    }

    public function getLocation(){
        $this->output->set_content_type('application/json');

        $this->load->model('Yes_Institute');
        $res=$this->Yes_Institute->getlocation();
        $data=$res['value'];
       $this->output->set_output(json_encode(['message'=>"value is here",'content'=>$data]));
    }

    public function getComparedcollege(){

        $this->output->set_content_type('application/json');

        $val=$this->input->post('clgid');
        $id = $val / 1394;
        $this->load->model('Yes_Institute');
        $select=array('institute.id','institute.title','institute.profile','institute.shortname','institute.subtitle','institute.type','institute.university','institute.address','institute.state','institute.district','institute.city','institute.f_hostel','institute.f_canteen','institute.f_sports','institute.f_atm','institute.f_bus','institute.f_wifi');

            $res = $this->Yes_Institute->getComparedcolleges($id,$select);

        foreach ($res as $key => $value) {
            $res[$key]['profile'] = base_url()."assets/backend/images/collegeprofile/".$res[$key]['profile'];
        }

            $this->output->set_output(json_encode(['message' => "value is here", 'content' => $res]));


    }


    public function getComparedcollegebyname(){

        $this->output->set_content_type('application/json');

        $val=$this->input->post('id');
        $val = substr($val, 0, strpos($val, "("));
        if(!empty($val)) {
            $this->load->model('Yes_Institute');
            $select = array('institute.id','institute.profile', 'institute.title', 'institute.shortname', 'institute.subtitle', 'institute.type', 'institute.university', 'institute.address', 'institute.state', 'institute.district', 'institute.city', 'institute.f_hostel', 'institute.f_canteen', 'institute.f_sports', 'institute.f_atm', 'institute.f_bus', 'institute.f_wifi');

            $res = $this->Yes_Institute->getComparedcollegesbyname($val, $select);
            $data = $res['value'];

            foreach ($data as $key => $value) {
                $data[$key]['profile'] = base_url()."assets/backend/images/collegeprofile/".$data[$key]['profile'];
            }
            $this->output->set_output(json_encode(['message' => "value is here", 'content' => $data]));
        }

    }



    public function getCourses(){

        $this->output->set_content_type('application/json');
        $val=$this->input->post('id');
        $id=$val/1394;
        $this->load->model('Yes_Institute');
        $res=$this->Yes_Institute->getComparecourses($id);

        if(!isset($res['error'])) {
            $this->output->set_output(json_encode(['message' => "value is here",'error'=>0, 'content' => $res['value']]));
        }
        else{
            $this->output->set_output(json_encode(['message' => "no courses found",'error'=>1]));
        }
    }


    public function getCourses2(){

        $this->output->set_content_type('application/json');
        $val=$this->input->post('id');
        //$id=$val*1394;
        $this->load->model('Yes_Institute');
        $res=$this->Yes_Institute->getComparecourses($val);

        if(!isset($res['error'])) {
            $this->output->set_output(json_encode(['message' => "value is here",'error'=>0, 'content' => $res['value']]));
        }
        else{
            $this->output->set_output(json_encode(['message' => "no courses found",'error'=>1]));
        }
    }

    public function getSelectedCourse(){

        $this->output->set_content_type('application/json');
        $val=$this->input->post('id');
        $id=$val/1394;
        $course=$this->input->post('select');
        $where=array('inst_id'=>$id,'couid'=>$course);
        $this->load->model('Yes_Institute');
        $res=$this->Yes_Institute->getSelected($where);
        $this->output->set_output(json_encode(['message'=>"value is here",'content'=>$res]));
    }

    public function getSelectedCourse2(){

        $this->output->set_content_type('application/json');
        $val=$this->input->post('id');

        $course=$this->input->post('select');
        $where=array('inst_id'=>$val,'couid'=>$course);
        $this->load->model('Yes_Institute');
        $res=$this->Yes_Institute->getSelected($where);
        $this->output->set_output(json_encode(['message'=>"value is here",'id'=>$val,'content'=>$res]));
    }


    public function getComparesimiliar(){

        $this->output->set_content_type('application/json');
        $idd=$this->input->post('id');
        $id=$idd/1394;
        $this->load->model('Yes_Institute');
        $res=$this->Yes_Institute->getcompSimiliar($id);
        $clg=$res['clg'];
        foreach ($clg as $key => $value) {
            $clg[$key]['logo'] = base_url() . "assets/backend/images/collegelogo/" . $clg[$key]['logo'];
        }
        $this->output->set_output(json_encode(['message'=>"value is here",'content'=>$clg]));
    }

    public function slidercolleges(){

        $this->output->set_content_type('application/json');


        $this->load->model('Yes_Institute');
        $res=$this->Yes_Institute->getsliderclg();
        $clg=$res['clg'];
        foreach ($clg as $key => $value) {
            $clg[$key]['id'] = 1394*$clg[$key]['id'];
            $clg[$key]['logo'] = base_url() . "assets/backend/images/collegelogo/" . $clg[$key]['logo'];
        }
        $this->output->set_output(json_encode(['message'=>"value is here",'content'=>$clg]));
    }

    public function sortcolleges(){


        $location="";
        $like="";
        $mike="";
        $page=$this->input->post('page');
        $stream=$this->input->post('stream');
        if($stream==1){$choice=array('type'=>"Engineering");}
        $select = array('id','emailid','contactno','title','shortname','subtitle','logo','cover','type','university','address','state','district','city','pincode','faxno','url','mapcode');
        $this->load->model('Yes_Institute');
        $result = $this->Yes_Institute->getInstituteBy($choice,$location, $like, $mike, $select, $page, 4);
        $num = $this->Yes_Institute->countInstituteBy($choice,$location, $like, $mike);
        $tot_pages = ceil($num / 4);
        $this->output->set_content_type('application/json');
        if (!isset($result["error"])) {


            $inscount=$num;
            $collegedata = $result['institutes'];
            foreach ($collegedata as $key => $value) {


                $collegedata[$key]['id']=1394*$collegedata[$key]['id'];

                $collegedata[$key]['logo'] = base_url() . "assets/backend/images/collegelogo/" . $collegedata[$key]['logo'];
            }
            $this->output->set_output(json_encode(['institutes' => $collegedata, 'page_count' => $tot_pages, 'query' => $result["query"],'inst_count'=>$inscount, 'iserror' => "0"]));

        }
        else{
            $this->output->set_output(json_encode(['message' => $result["error"], 'iserror' => "1"]));
        }

    }

    public function addvisitor(){

        if($this->input->is_ajax_request()==false) {     redirect(base_url() . "yescolleges-error-400");    }//bad rrequest

        $this->output->set_content_type('application/json');
        $id=$this->input->post('id')/1394;
        $clgname=$this->input->post('name');
        if(!empty(($this->session->userdata('studid'))&&($id))){
            $msg="user exists";
            $studid=$this->session->userdata('studid');
            $this->load->model('Yes_Institute');
            $res=$this->Yes_Institute->setvisited($studid,$id);
            if(!isset($res['emaillimit'])) {
                $msg='visitor mail added';

                $to = $this->session->userdata('email');
                $from=$clgname;
                $subject = 'College enquiry';
                $message = $clgname.'&nbsp;'.' Admission details goes here';
                $mail=$this->custommail($to,$from,$subject,$message);

                if($mail==1){$this->Yes_Institute->updatevisited(array('student' => $studid, 'institute' => $id));$msg='mail send';}
            }
            $this->output->set_output(json_encode(['name'=>$clgname,'message'=>$msg]));

        }
        else{
            $this->output->set_output(json_encode(['message'=>'Student not logged in']));
        }
    }

    public function custommail($to,$from,$subject,$message){


        $this->load->library('email');

        $config['protocol']    = 'smtp';

        $config['smtp_host']    = 'smtp.sendgrid.net';

        $config['smtp_port']    = '465';

        $config['smtp_timeout'] = '7';

        $config['smtp_user']    = 'yescollegessendgrid';

        $config['smtp_pass']    = 'asd123##';

        $config['charset']    = 'utf-8';

        $config['newline']    = "\r\n";

        $config['mailtype'] = 'text'; // or html

        $config['validation'] = TRUE; // bool whether to validate email or not

        $this->email->initialize($config);
        $this->email->set_newline("\r\n");
        $this->email->from('yescollegesinfotech@gmail.com',$from);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);

        $this->email->send();

        echo $this->email->print_debugger();
    }

    public function mailtest($to='amal@technorip.com',$collegename='scms',$subject='mail testing',$message='ni messages'){


        $this->load->library('email');
        $this->email->set_newline("\r\n");
        $this->email->from('info@yescolleges.com',$collegename);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);

        $isdone=-1;
        if ($this->email->send()) {
            $isdone = 1;
            echo 'mail send';
        }
        echo 'mail not send';
    }



    public function getReviews(){

        $this->output->set_content_type('application/json');
        $this->load->model('Yes_Institute');
        $page=$this->input->post('page');
        $select=array('institute.id','institute.slug','institute.title','institute.state','institute.city','institute.profile','reviews.rid',
            'reviews.student','reviews.college','reviews.date','reviews.content','reviews.stars');
        $res=$this->Yes_Institute->getCollegereviews($select,$page,4);

        $num = $this->Yes_Institute->countReviews();
        $tot_pages = ceil($num / 4);
        if(!isset($res['error'])){

            $review=$res['value'];

            foreach ($review as $key => $value) {


                $review[$key]['college']=1394*$review[$key]['college'];
                $review[$key]['profile'] = base_url() . "assets/backend/images/collegeprofile/" . $review[$key]['profile'];
                $review[$key]['date']=date('d/m/Y h:i  A', strtotime($review[$key]['date'] ));
            }
            $this->output->set_output(json_encode(['reviews'=>$review,'pagecount'=>$tot_pages,'error'=>0]));
        }
        else{
            $this->output->set_output(json_encode(['message'=>"no reviews found",'error'=>1]));
        }
    }


    public function submitReview(){

        $this->output->set_content_type('application/json');
        $content=$this->input->post('rcontent');
        $student=$this->input->post('studname');
        $star=$this->input->post('rate');
        $college=$this->input->post('cid')/1394;
        $this->load->model('Yes_Institute');
        if(!empty($student&&$college)) {
            $data = array('student' => $student, 'college' => $college, 'content' => $content, 'stars' => $star);
            $res = $this->Yes_Institute->submitcollegeReview($data);

            if ($res > 0) {
                $message = "succesfully submitted";

            }
            if ($res == -1) {
                $message = "You already submit a review";
            }
            $this->output->set_output(json_encode(['message' => $message, 'error' => 0]));
        }
        else{
            $this->output->set_output(json_encode(['message'=>"something went wrong",'error'=>1]));
        }

    }

    public function gettopcolleges(){
        $this->output->set_content_type('application/json');
        $this->load->model('Yes_Institute');
        $res=$this->Yes_Institute->getTopclg();

        foreach ($res as $key => $value) {


            $res[$key]['id']=1394*$res[$key]['id'];
            $res[$key]['profile'] = base_url() . "assets/backend/images/collegeprofile/" . $res[$key]['profile'];
        }

        $this->output->set_output(json_encode(['value'=>$res]));
    }

    public function getcid(){

        $this->output->set_content_type('application/json');
        $this->load->model('Yes_Institute');
        $value=$this->input->post('value');
        $value = substr($value, 0, strpos($value, "("));
        $res=$this->Yes_Institute->getCid($value);

        $this->output->set_output(json_encode(['values'=>$res]));
    }

    public function getCoursecontent(){

        $this->output->set_content_type('application/json');
        $this->load->model('Yes_Institute');
        $page=$this->input->post('pages');
        if($page==""){$page=1;}
        $like=$this->input->post('like');
        $res=$this->Yes_Institute->getcoursecontent($like,$page,3);
        $num = $this->Yes_Institute->countCoursecontent($like);
        $tot_pages = ceil($num / 3);
        if(!$res['error']){
            $contents=$res['datas'];

            foreach ($contents as $key => $value) {

                $contents[$key]['image'] = base_url() . "assets/backend/images/courseimages/" . $contents[$key]['image'];
            }

            $this->output->set_output(json_encode(['values'=>$contents,'page'=>$page,'page_count' => $tot_pages,'error'=>0]));

        }
        else{
            $this->output->set_output(json_encode(['error'=>1]));
        }
    }

    public function getCoursedetails(){

        $this->output->set_content_type('application/json');
        $this->load->model('Yes_Institute');
        $name=$this->input->post('name');
        $res=$this->Yes_Institute->getdetailedContent($name);
        if(!$res['error']) {


            $this->output->set_output(json_encode(['error'=>0,'values'=>$res['value']]));
        }else{
            $this->output->set_output(json_encode(['error'=>1,'names'=>$name]));
        }
    }


    public function getCareerdetails(){

        $this->output->set_content_type('application/json');
        $this->load->model('Yes_Institute');
        $name=$this->input->post('name');
        $res=$this->Yes_Institute->getdetailedCareer($name);
        if(!$res['error']) {
            $contents=$res['value'];
            foreach ($contents as $key => $value) {

                $contents[$key]['photo'] = base_url() . "assets/backend/images/careerimages/" . $contents[$key]['photo'];
            }
            $this->output->set_output(json_encode(['error'=>0,'values'=>$contents]));
        }else{
            $this->output->set_output(json_encode(['error'=>1,'names'=>$name]));
        }
    }

    public function getSimiliarcoursecont(){

        $this->output->set_content_type('application/json');
        $this->load->model('Yes_Institute');
        $cat=$this->input->post('cat');
        $name=$this->input->post('name');
        $res=$this->Yes_Institute->getsimiliarContent($cat,$name);
        foreach ($res as $key => $value) {

            $res[$key]['image'] = base_url() . "assets/backend/images/courseimages/" . $res[$key]['image'];
        }
            $this->output->set_output(json_encode(['datas'=>$res]));

    }

    public function getSimiliarcareer(){

        $this->output->set_content_type('application/json');
        $this->load->model('Yes_Institute');
        $cat=$this->input->post('cat');
        $name=$this->input->post('name');
        $res=$this->Yes_Institute->getsimiliarCareer($cat,$name);
        foreach ($res as $key => $value) {

            $res[$key]['image'] = base_url() . "assets/backend/images/courseimages/" . $res[$key]['image'];
        }
        $this->output->set_output(json_encode(['datas'=>$res]));

    }


    public function getCareer(){

        $this->output->set_content_type('application/json');
        $this->load->model('Yes_Institute');
        $page=$this->input->post('pages');
        if($page==""){$page=1;}
        $like=$this->input->post('like');
        $res=$this->Yes_Institute->getcareer($like,$page,3);
        $num = $this->Yes_Institute->countcareer($like);
        $tot_pages = ceil($num / 3);
        if(!$res['error']){
            $contents=$res['datas'];

            foreach ($contents as $key => $value) {

                $contents[$key]['photo'] = base_url() . "assets/backend/images/careerimages/" . $contents[$key]['photo'];
            }

            $this->output->set_output(json_encode(['values'=>$contents,'page'=>$page,'page_count' => $tot_pages,'error'=>0]));

        }
        else{
            $this->output->set_output(json_encode(['error'=>1]));
        }
    }

    public function allcolleges($stream,$place){


        $stream=str_replace('+',' ',$stream);
        $this->data["term"]= $stream;
        $this->data["place"]= $place;
        $page=$this->input->get('page');
        if($page==""){$page=1;}
        $this->load->model('Yes_Institute');
        $this->data['colleges']=$this->Yes_Institute->getallcolleges($stream,$place,$this->input->get('page'),3);
        $this->data['count']=$this->Yes_Institute->countallclgs($stream,$place);
        $this->data['tot_pages'] = ceil($this->data['count'] / 3);
        $this->data["pageview"]="allcolleges";
        $this->load->view('common/template',$this->data);
    }

    public function sendgrid(){


        $from = new SendGrid\Email("Example User", "test@example.com");
        $subject = "Sending with SendGrid is Fun";
        $to = new SendGrid\Email("Example User", "test@example.com");
        $content = new SendGrid\Content("text/plain", "and easy to do anywhere, even with PHP");
        $mail = new SendGrid\Mail($from, $subject, $to, $content);
        $apiKey = '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';
        $sg = new \SendGrid($apiKey);
        $response = $sg->client->mail()->send()->post($mail);
        echo $response->statusCode();
        print_r($response->headers());
        echo $response->body();
    }
}
?>