<?php
/**
 * Created by PhpStorm.
 * User: Amal
 * Date: 2/2/2017
 * Time: 5:29 PM
 */
class Yes_Student extends CI_Model{


    public function studentregister($data=null,$email=null)
    {


        if($this->is_exist_registration($email)==0)
        {
            $this->db->insert("stud_tb",$data);
            return $this->db->affected_rows();
        }
        return -1;
    }

    public function is_exist_registration($email=null)
    {
        $this->db->where(array("email"=>$email));
        $result=$this->db->get("stud_tb");
        return $result->num_rows();
    }

    public function isStudprocomplete($id=null){

        $this->db->where(array('studid'=>$id));
        $check = '(firstname="" or lastname = "" or fathername="" or mobile = "" or  gender="" or dob = "" or state = "" or city="" or address = "" or religion="" or caste = "" or  nationality="")';

        $this->db->where($check);
        $result=$this->db->get('stud_tb');
        if($result->num_rows()>0){
            $return['error']="row found error";
        }
        else{
            $return['val']="no error";
        }
        return $return;

    }

    public function completeprofile1($id=null,$data=null){

        $this->db->where(array('studid'=>$id));
        $result=$this->db->update('stud_tb',$data);

        return $this->db->affected_rows();
    }

    public function completeprofile2($id=null,$data=null){

        $this->db->where(array('studid'=>$id));
        $result=$this->db->update('stud_tb',$data);

        return $this->db->affected_rows();
    }

    public function completeprofile3($id=null,$data=null){

        $this->db->where(array('studid'=>$id));
        $result=$this->db->insert('studentdetails',$data);

        return $this->db->affected_rows();
    }


    public function isstudentuser($data=null,$select=null)
    {
        $this->db->where($data);
        $this->db->select($select);
        $result=$this->db->get("stud_tb");
        if($result->num_rows()>0){
            $data["user"]=$result->result_array();      }
        else {
            $data["error"]="user not exist in the database";}
        return $data;
    }


    public function updatelogdate($id=null,$date=null){

        $this->db->where(array('studid'=>$id));
        $data=array('lastlogin'=>$date);
        $this->db->update('stud_tb',$data);

    }

    public function activatestudentaccount($emailid=null)
    {
        if($emailid!=null)$this->db->where(array("email"=>$emailid));
        $this->db->update("stud_tb",array("active"=>1));
        return $this->db->affected_rows();
    }



    public function resetpassword($data=null)
    {
        $this->db->where(array("email"=>$data["email"],"active"=>1));
        $result=$this->db->update("stud_tb",array("password"=>$data["password"]));
        return $this->db->affected_rows();
    }


    public function uploadstudpropic($filename,$id)
    {
        $this->db->where(array("studid"=>$id));
        $this->db->update('stud_tb',array('photo'=>$filename));
        return $this->db->affected_rows();
    }

    public function isQualificationuserexist($id){

        $this->db->where(array('studentid'=>$id));
        $result=$this->db->get('studentdetails');
        $value=0;
        if($result->num_rows()>0){
            $value=1;
            return $value;
        }

    }


    public function insertQualification($data=null){


        /*   if($this->isQualificationuserexist($data['studentid'])==0){

               $this->db->insert('studentdetails',$data);
               return $this->db->affected_rows();
           }
           else{*/

        //$this->db->where(array('studentid'=>$data['studentid']));
        $this->db->insert('studentdetails',$data);
        return $this->db->affected_rows();
    }

    public function updateQualification($data=null,$id=null,$sid=null){


        /*   if($this->isQualificationuserexist($data['studentid'])==0){

               $this->db->insert('studentdetails',$data);
               return $this->db->affected_rows();
           }
           else{*/

        //$this->db->where(array('studentid'=>$data['studentid']));

        $this->db->where(array('id'=>$id,'studentid'=>$sid));
        $this->db->update('studentdetails',$data);
        return $this->db->affected_rows();
    }



    public function getstudentalldata($id=null){

        $this->db->where(array("studentid"=>$id));

        $result= $this->db->get("studentdetails");
        if($result->num_rows()>0) {
            $value["student"] = $result->result_array();

        }
        else {
            $value["error"]="course not exist in the database";
        }
        return $value;
    }

    public function deletestudentqual($data)
    {

        $this->db->where($data);
        $result=$this->db->delete('studentdetails');

        return $this->db->affected_rows();


    }

    public function editstudpassword($data=null,$pass=null){

        $this->db->where($data);
        $password=array('password'=>$pass);
        $this->db->update('students',$password);
        return $this->db->affected_rows();
    }



    public function testdata($data=null){

        $this->db->insert('test',$data);
        return $this->db->affected_rows();
    }

    public function getEnquiry($column=null,$where=null,$like=null,$page=null,$pagesize=null)
    {


       if($page!=null &&$pagesize!=null)    {           $offset=($page-1)*$pagesize; $this->db->limit($pagesize,$offset);  }
        if($like!=null){$this->db->like( $like );}
        if($where!=null){$this->db->where( $where );}
        $this->db->order_by('enquiry.mdate','desc');
        $this->db->select($column);
        $this->db->from('enquiry');
        $this->db->join("stud_tb","stud_tb.studid=enquiry.student");
        $result=$this->db->get();
        $data["query"]=$this->db->last_query();
        if($result->num_rows()>0){
            $data["enquirys"]=$result->result_array();
        }
        else { $data["error"]="course not exist in the database";}
        return $data;

  /*      if($page!=null &&$pagesize!=null)    {           $offset=($page-1)*$pagesize; $this->db->limit($pagesize,$offset);  }
        if($like!=null){$this->db->like( $like );}
        if($where!=null){$this->db->where( $where );}
        $this->db->order_by('enquiry.mdate','desc');
       // $this->db->distinct('students.studid');
        $this->db->select($column);
        $this->db->from('enquiry');
        $this->db->join("students","students.studid=enquiry.student");
        //$this->db->group_by('enquiry.student');
        $result=$this->db->get();
        $data["query"]=$this->db->last_query();
        if($result->num_rows()>0){         $data["enquirys"]=$result->result_array();      }
        else { $data["error"]="course not exist in the database";}
        return $data;*/
    }
    public function countEnquiry($where=null,$like=null)
    {
        if($like!=null){$this->db->like( $like );}
        if($where!=null){$this->db->where( $where );}
        $query=$this->db->get('enquiry');
        return $query->num_rows();
    }

    public function getQual($where=null)
    {
        if($where!=null){$this->db->where( $where );}
        $result=$this->db->get('studentdetails');
        if($result->num_rows()>0){         $data["quals"]=$result->result_array();      }
        else { $data["error"]="course not exist in the database";}
        return $data;

    }

    public function saveEnquiry($data=null,$where=null) {
        $this->db->where($where);    $this->db->update("enquiry",$data);     return $this->db->affected_rows();
    }


    public function applyadmission($id=null,$collegeid=null,$courseid=null,$message=null,$coursename=null){

        $data=array('student'=>$id,'coursename'=>$coursename,'institute'=>$collegeid,'course'=>$courseid,'message'=>$message);
        $this->db->insert('enquiry',$data);
        return $this->db->affected_rows();
    }

    public function setRead($where=null,$time=null){

        $this->db->where($where);
        $data=array('isiview'=>1,'status'=>"Pending",'rdate'=>$time);
        $this->db->update('enquiry',$data);
    }

    public function getrequests($id=null,$select=null){

        $this->db->where('student',$id);
        $this->db->select($select);
        $this->db->order_by('enquiry.mdate',"desc");
        $this->db->from('enquiry');
        $this->db->join("institute","institute.id=enquiry.institute");
        $result=$this->db->get();
        if($result->num_rows()>0){
            $return['value']=$result->result_array();
        }
        else{
            $return['error']="No value found";
        }
        return $return;
    }


    public function getnotifications($id=null,$select=null){

        $where=array('student'=>$id,'reply!='=>NULL);
        $this->db->where($where);
        $this->db->order_by("id","desc");
        $this->db->limit(5);
        $this->db->select($select);
        $this->db->from('enquiry');
        $this->db->join("institute","institute.id=enquiry.institute");
        $result=$this->db->get();
        if($result->num_rows()>0){
            $return['value']=$result->result_array();
        }
        else{
            $return['error']="No value found";
        }
        return $return;
    }

    public function checkapplied($where=null){

        $this->db->where($where);
        $res=$this->db->get('enquiry');
        return $res->num_rows();

    }

    public function getattachs($id){

        $this->db->where(array('student'=>$id));
        $return=$this->db->get('attachments');
        if($return->num_rows()>0){
            $data['value']=$return->result_array();
        }
        else{
            $data['error']=$return->result_array();
        }
        return $data;
    }



    public function uploadAttach($data){

        $this->db->insert('attachments',$data);
        return $this->db->affected_rows();

    }

    public function getStud($where=null,$data=null)
    {
        $this->db->where($where);
        $this->db->select($data);
        $result=$this->db->get("attachments");
        if($result->num_rows()>0){
            $return["institute"]=$result->result_array();
        }
        else {
            $return["error"]="user not exist in the database";}
        return $return;
    }

    public function deleteAttach($where=null){
        $this->db->where($where);
        $this->db->delete("attachments");
        return $this->db->affected_rows();
    }

    public function getstudentprofile($id=null){

        $this->db->where(array('studid'=>$id));
        $res=$this->db->get('stud_tb');
        if($res->num_rows()>0){
            $return['value']=$res->result_array();
        }
        else{
            $return['error']="Something went wronmg";
        }
        return $return;
    }

    public function getStudentPro($id=null){

        $this->db->where(array('studid'=>$id));
       // $this->db->select();
        $res=$this->db->get('stud_tb');
        if($res->num_rows()>0){
            $data['value']=$res->result_array();
        }
        else{
            $data['error']="No syudent found";
        }
        return $data;
    }

    public function markreadnotification($where=null)
    {
        $this->db->where($where);
        $update=array('issview'=>1);
        $this->db->update('enquiry',$update);
        return $this->db->affected_rows();
    }

    public function isunreadnotifications($where=null)
    {
        $this->db->where($where);
        $data=$this->db->get('enquiry');
        return $data->num_rows();
    }

    public function getQualificationbyid($id=null,$sid=null){

        $this->db->where(array('id'=>$id,'studentid'=>$sid));
        $data=$this->db->get('studentdetails');
        if($data->num_rows()>0){
             $return['value']=$data->result_array();
        }
        else{
             $return['error']='error found';
        }
        return $return;
    }
}
