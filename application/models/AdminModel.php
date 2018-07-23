<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Administrator
 *
 * @author Jithin Jacob
 */
class AdminModel  extends CI_Model
{
public function __construct() {   parent::__construct();}

public function getprofilephoto($data)
{
$this->db->where($data);
$this->db->select('photo');
$result=$this->db->get('administrators');
$photo='none.png';
if($result->num_rows()>0) {
    $photo=$result->row()->photo;
}
else{
    $photo='none.png';
}
    return $photo;
}

public function signin($data=null,$select=null)
{
    $this->db->where($data);
    $this->db->select($select);
    $result=$this->db->get("administrators");
    if($result->num_rows()>0){
        $datas["admin"]=$result->result_array();
    }
    else {
        $datas["error"]="user not exist in the database";
    }
    return $datas;
}
public function updatetime($id,$option)
{
$this->db->where(array("admid"=>$id));
$this->db->update('administrators',$option);
}
public function savesubadmin($data=null)
{
$this->db->insert('administrators',$data);
return $this->db->affected_rows();
}


public function updatesubadmin($data=null)
{
 $this->db->where(array('admid'=>$data['upid'])) ;
unset($data['upid']);
$this->db->update('administrators',$data);
return $this->db->affected_rows();
}



    public function saveadminprofile($data=null)
    {
        $this->db->where(array('admid'=>$data['admid'])) ;
        unset($data['admid']);
        $this->db->update('administrators',$data);
        return $this->db->affected_rows();
    }

public function loadsubadmin($id=null)
{
    $this->db->where(array("admid !="=>$id));
    $this->db->select('*');
    $this->db->order_by("admid","desc");
    $result=$this->db->get("administrators");
    if($result->num_rows()>0){
        $data["admin"]=$result->result_array();
    }
    else {
        $data["error"]="user not exist in the database";
    }
    return $data;
}
public function getadminbyid($id=null)
{
    $this->db->where(array("admid"=>$id));
    $this->db->select('*');
    $result=$this->db->get("administrators");
     if($result->num_rows()>0){
         $data["admin"]=$result->result_array();
     }else { $data["error"]="user not exist in the database";}
    return $data;
}
public function changeactive($data=null,$id=null)
{
    $this->db->where(array('admid'=>$id));
    $update=array('active'=>$data);
    $this->db->update('administrators',$update);
    return $this->db->affected_rows();
}
public function getcollegebyid($data=null)
{
    $this->db->where(array('institute.id'=>$data["id"]));

    $this->db->select('institute.*,institute.username,institute.logo,institute.district','institute.city');
    $this->db->from("institute");
    //$this->db->join("institute","institute.id=institute.userid");
    $result=$this->db->get();
    if($result->num_rows()>0){

        $data["colleges"]=$result->result_array();
    }
    else { $data["error"]="no information found at server";}
   return $data;
}

public function incompletedprofile($data=null,$value=null){


    $pagesize = 9;
    $page = $data['page'];
    $offset = ($page - 1) * $pagesize;
    $this->db->limit($pagesize, $offset);

    $this->db->where($value);
    if(isset($data["type"])) {

        $this->db->where('institute.type', $data['type']);
    }

    if(isset($data["search"])) {
        $this->db->like('institute.title',$data['search'],'both');
    }

    $this->db->order_by('institute.id',"DESC");


    $this->db->select('*');
    $result=$this->db->get('institute');

    if($result->num_rows()>0) {

        $data["colleges"]=$result->result_array();
    }
    else{

        $data['error']="Something went wrong";
    }
    return $data;
}


public function getcollegedata($data=null)
{
    $pagesize = 9;
    $page = $data['page'];
    $offset = ($page - 1) * $pagesize;
    $this->db->limit($pagesize, $offset);

    if(isset($data["active"])){
        $this->db->where(array('isblocked'=>$data['active']));
    }


    if(isset($data["type"])) {

        $this->db->like('institute.type', $data['type']);
    }

    if(isset($data["search"])) {

        $this->db->like('institute.title',$data['search'],'both');
    }

    $this->db->order_by('institute.id',"DESC");


    $this->db->select('*');
    $result=$this->db->get('institute');

    if($result->num_rows()>0) {

        $data["colleges"]=$result->result_array();
    }

    else{

        $data['error']="Something went wrong";
    }
    return $data;
}


    public function samplefn(){

        $this->db->where('isblocekd',1);
        $this->db->get('*');
        $result=$this->db->get('institute');

        if($result->num_rows()>0){

            $data['college']=$result->result_array();
        }
        else{
            $data['error']="kop";
        }
        return $data;
    }


public function countcollege($data=null)
{

        $this->db->where(array("isblocked"=>$data["active"]));

         if(isset($data["type"]))
       $this->db->where('type',$data['type']);
      if(isset($data["search"]))
       $this->db->like('title',$data["search"],'both');
        $query=$this->db->get('institute');
        return $query->num_rows();
}

    public function changecollegeactive($data=null)
    {
        $this->db->where(array('id'=>$data['id'])) ;
        $this->db->update('institute',$data);
        return $this->db->affected_rows();
    }

public function uploadprofilepic($filename,$id)
{
          $this->db->where(array("admid"=>$id));
          $this->db->update('administrators',array('photo'=>$filename));
           return $this->db->affected_rows();
}
public function savepassword($data=null)
{
         $this->db->where(array('admid'=>$data['id'],'password'=>$data['oldpassword'])) ;
        $this->db->update('administrators',array('password'=>$data['password']));
        return $this->db->affected_rows();
}



    public function getEnquiry($column=null,$like=null,$page=null,$pagesize=null)
    {

        if($page!=null &&$pagesize!=null)    {           $offset=($page-1)*$pagesize; $this->db->limit($pagesize,$offset);  }
        if($like!=null){$this->db->like( $like );}

        $this->db->order_by('enquiry.mdate','desc');
        $this->db->select($column);
        $this->db->from('enquiry');
        $this->db->join("stud_tb","stud_tb.studid=enquiry.student");
        $this->db->join("institute","institute.id=enquiry.institute");
        $result=$this->db->get();
        $data["query"]=$this->db->last_query();
        if($result->num_rows()>0){         $data["enquirys"]=$result->result_array();    }
        else { $data["error"]="course not exist in the database";}
        return $data;
    }

    public function getenqmesages($where=null){
        $this->db->where($where);
        $result=$this->db->get('enquiry');
        if($result->num_rows()>0){
            $data['value']=$result->result_array();
        }
       else{
           $data['error']='No values found';
       }
       return $data;
    }

    public function countEnquiry($like=null)
    {
        if($like!=null){$this->db->like( $like );}

        $query=$this->db->get('enquiry');
        return $query->num_rows();
    }

    public function setadminRead($where=null){

        $this->db->where($where);
        $data=array('isaview'=>1);
        $this->db->update('enquiry',$data);
    }

    public function getStudentlist($where=null,$column=null,$like=null,$page=null,$pagesize=null){
        if($page!=null &&$pagesize!=null)    {           $offset=($page-1)*$pagesize; $this->db->limit($pagesize,$offset);  }
        if($like!=null){$this->db->like( $like );}
        if($where!=null){$this->db->where(array('isblocked'=>1) );}
        $this->db->order_by('stud_tb.date','desc');
        $this->db->select($column);
        $this->db->from('stud_tb');
        $result=$this->db->get();
        $data["query"]=$this->db->last_query();
        if($result->num_rows()>0){         $data["studentslist"]=$result->result_array();      }
        else { $data["error"]="student not exist in the database";}
        return $data;
    }

    public function countStudent($like=null)
    {
        if($like!=null){$this->db->like( $like );}

        $query=$this->db->get('stud_tb');
        return $query->num_rows();
    }


    public function Blockstudents($stud=null){
        $data=array('isblocked'=>1);
        $this->db->where(array('studid'=>$stud));
        $this->db->update('stud_tb',$data);
        return $this->db->affected_rows();

    }


    public function Unblockstudents($stud=null){
        $data=array('isblocked'=>0);
        $this->db->where(array('studid'=>$stud));
        $this->db->update('stud_tb',$data);
        return $this->db->affected_rows();

    }
    public function getCollegegrid($select=null){
        $this->db->order_by('institute.regdate',"desc");
        $this->db->select($select);
        $this->db->limit(8);
        $res=$this->db->get('institute');

        $data['values']=$res->result_array();
        return $data;
    }

    public function getStudentgrid($select=null){
        $this->db->order_by('stud_tb.date',"desc");
        $this->db->select($select);
        $this->db->limit(8);
        $res=$this->db->get('stud_tb');

        $data['values']=$res->result_array();
        return $data;
    }

    public function Checknewrequests(){

        $this->db->where(array('isaview'=>0));
        $value=$this->db->get('enquiry');
        return $value->num_rows();

    }

    public function getcollegecategory(){
        $results=$this->db->get('ins_category');
     if($results->num_rows()>0){
         $return['value']=$results->result_array();
     }else{
         $return['error']="No value found";
     }
        return $return;
    }

    public function sendcustommail($data=null){

        $this->db->insert('mailbox_college',$data);
        return $this->db->affected_rows();
    }

    public function sendmultiplemail($data=null){


        $this->db->insert('mailbox_college',$data);
        return $this->db->affected_rows();
    }

    public function getmailinstitute($check=null){
        $this->db->where_in('type',$check);
        $this->db->select(array('emailid','title'));
        $res=$this->db->get('institute');
        $result['count']=$res->num_rows();
        $result['colleges']=$res->result_array();
        return $result;
    }

    public function getallmails($pages=null,$like=null){
        $pagesize = 10;
        $page = $pages;
        $offset = ($page - 1) * $pagesize;
        $this->db->limit($pagesize, $offset);
        $this->db->order_by('date',"desc");
        if($like!=null){$this->db->like( $like );}
        $return=$this->db->get('mailbox_college');
        if($return->num_rows()>0){
            $data['value']=$return->result_array();
        }
        else{
            $data['error']="Nothing found";
        }
        return $data;
    }


    public function countmail($like=null)
    {
        if($like!=null){$this->db->like( $like );}
        $query=$this->db->get('mailbox_college');
        return $query->num_rows();
    }

    public function getmailcontent($id=null){
        $this->db->where(array('id'=>$id));
        $return=$this->db->get('mailbox_college');
        if($return->num_rows()>0){
            $data['value']=$return->result_array();
        }
        else{
            $data['error']="Nothing found";
        }
        return $data;
    }

    public function deletemailbyid($id=null){

        $this->db->where(array('id'=>$id));
        $this->db->delete('mailbox_college');
        return $this->db->affected_rows();
    }

    public function getinact_colleges($page=null,$like=null){
        //$this->db->where(array('isactivated'=>0));

        $pagesize = 10;
        $pages = $page;
        $offset = ($pages - 1) * $pagesize;
        $this->db->limit($pagesize, $offset);

        $this->db->like('title',$like);
        $this->db->order_by("regdate","desc");
        $return=$this->db->get('institute');
        $data['values']=$return->result_array();
        return $data;
    }


    public function countgetinact_colleges($like=null){
        $this->db->like('title',$like);
        $query=$this->db->get('institute');
        return $query->num_rows();
    }


    public function deleteinactiveclg($data=null){
        $this->db->where($data);
        $this->db->delete('institute');
        return $this->db->affected_rows();
    }

    public function inactiveclg($pages=null){
        $pagesize = 9;
        $page = $pages;
        $offset = ($page - 1) * $pagesize;
        $this->db->limit($pagesize, $offset);
        $this->db->where(array('isactivated'=>0));
        $return=$this->db->get('institute');
        $data['values']=$return->result_array();
        $data['count']=$return->num_rows();
        return $data;
    }

    public function countinactive(){

        $this->db->where(array('isactivated'=>0));
        $return=$this->db->get('institute');
        return $return->num_rows();
    }

    public function makecollegeactive($data=null)
    {
        $this->db->where(array('id'=>$data));
        $update=array('isactivated'=>1);
        $this->db->update('institute',$update);
        return $this->db->affected_rows();
    }

    public function getcollegeTag($id=null,$select=null){

        $this->db->where(array('id'=>$id));
        $this->db->select($select);
        $data=$this->db->get('institute');
        return $data->result_array();
    }
    public function updateClgtag($id=null,$update=null){

        $this->db->where(array('id'=>$id));
        $this->db->update('institute',$update);

        return $this->db->affected_rows();
    }

    public function adminclgcount($check=null){
        if($check!=""){$this->db->where($check);}
        $data=$this->db->get('institute');
        return $data->num_rows();
    }
    public function adminstudcount(){
        $data=$this->db->get('stud_tb');
        return $data->num_rows();
    }


    public function admincoursecount(){
        $data=$this->db->get('courses_list');
        return $data->num_rows();
    }
    public function adminstudinactcount(){
        $this->db->where('isblocked',1);
        $data=$this->db->get('stud_tb');
        return $data->num_rows();
    }


    public function countfeatured(){
        $this->db->where('isfeatured',1);
        $data=$this->db->get('institute');
        return $data->num_rows();
    }

    public function countvisitors(){
        $data=$this->db->get('inst_visitors');
        return $data->num_rows();
    }


    public function countreq(){
        $data=$this->db->get('enquiry');
        return $data->num_rows();
    }

    public function clgcat(){
        $data=$this->db->get('ins_category');
        return $data->num_rows();
    }


    public function coursecat(){
        $data=$this->db->get('course_category');
        return $data->num_rows();
    }

    public function getadminreviews($page=null,$pagesize=null){

        if($page!=null &&$pagesize!=null)    {           $offset=($page-1)*$pagesize; $this->db->limit($pagesize,$offset);  }


        $this->db->from('reviews');
        $this->db->order_by('reviews.rid',"desc");
        $this->db->join('institute','institute.id=reviews.college');
        $data=$this->db->get();
        if($data->num_rows()>0){
            $return['value']=$data->result_array();
        }
        else{
            $return['error']="No value";
        }
        return $return;
    }

    public function countadminReviews(){


        $query=$this->db->get('reviews');
        return $query->num_rows();
    }

    public function createCoursecontent($data=null){

        $this->db->insert('coursecontent',$data);
        return $this->db->affected_rows();

    }


    public function getCoursecontent($page=null,$pagesize=null)
    {
        if($page!=null &&$pagesize!=null)    {           $offset=($page-1)*$pagesize; $this->db->limit($pagesize,$offset);  }

        $this->db->order_by('id',"desc");
        $result=$this->db->get('coursecontent');
        if($result->num_rows()>0){
            $data["courses"]=$result->result_array();    }
        else {
            $data["error"]="course not exist in the database";}
        return $data;
    }

    public function countCoursecontent()
    {
        $query=$this->db->get('coursecontent');
        return $query->num_rows();
    }


    public function blockcontent($id=null,$flag=null){
        $this->db->where(array('id'=>$id));
        $update=array('active'=>$flag);
        $this->db->update('coursecontent',$update);
    }

    public function updateCoursecontent($data=null,$where=null){
        if($where!=null){$this->db->where( $where );}
        $this->db->update("coursecontent",$data);     return $this->db->affected_rows();
    }

    public function getCoursescot($where=null)
    {

        if($where!=null){$this->db->where( $where );}

        $result=$this->db->get('coursecontent');
        if($result->num_rows()>0){
            $data["courses"]=$result->result_array();      }
        else { $data["error"]="course not exist in the database";}
        return $data;
    }

    public function updateCoursepic($where=null,$data=null)
    {
        $this->db->where($where);
        $this->db->update("coursecontent",$data);
        return $this->db->affected_rows();
    }

    public function deletecoursecontent($id=null){
        $this->db->where(array('id'=>$id));

        $this->db->delete('coursecontent');
        return $this->db->affected_rows();
    }

    public function createcareer($data=null){

        $this->db->insert('career',$data);
        return $this->db->affected_rows();

    }

    public function getcareerbypage($page=null,$pagesize=null)
    {
        if($page!=null &&$pagesize!=null)    {           $offset=($page-1)*$pagesize; $this->db->limit($pagesize,$offset);  }

        $this->db->order_by('id',"desc");
        $result=$this->db->get('career');
        if($result->num_rows()>0){
            $data["courses"]=$result->result_array();    }
        else {
            $data["error"]="course not exist in the database";}
        return $data;
    }

    public function countcareer()
    {
        $query=$this->db->get('career');
        return $query->num_rows();
    }

    public function updateCareerpic($where=null,$data=null)
    {
        $this->db->where($where);
        $this->db->update("career",$data);
        return $this->db->affected_rows();
    }

    public function getCareercot($where=null)
    {

        if($where!=null){$this->db->where( $where );}

        $result=$this->db->get('career');
        if($result->num_rows()>0){
            $data["courses"]=$result->result_array();      }
        else { $data["error"]="course not exist in the database";}
        return $data;
    }

    public function blockcareer($id=null,$flag=null){
        $this->db->where(array('id'=>$id));
        $update=array('active'=>$flag);
        $this->db->update('career',$update);
    }

    public function deletecareer($id=null){
        $this->db->where(array('id'=>$id));

        $this->db->delete('career');
        return $this->db->affected_rows();
    }

    public function updateCareer($data=null,$where=null){
        if($where!=null){$this->db->where( $where );}
        $this->db->update("career",$data);
        return $this->db->affected_rows();
    }

    public function gettitle($where){
        $this->db->where($where);
        $this->db->select('title');
        $q=$this->db->get('institute');
        return $q->row('title');
    }

    public function createslug($where,$data){
        $this->db->where($where);
        $this->db->update('institute',$data);
        return $this->db->affected_rows();
    }




}
