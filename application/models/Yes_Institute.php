<?php

class Yes_Institute extends CI_Model
{
public function __construct() {    parent::__construct();   }

    public function getindexsearch($select=null,$like=null){

        $this->db->group_start();
        $this->db->like('institute.title',$like,'both');
        $this->db->or_like('institute.shortname',$like,'both');
        $this->db->group_end();
        $check=array('isblocked'=>0);
        $this->db->where($check);
        $this->db->select($select);
        $result=$this->db->get('institute');
        if($result->num_rows()>0){
            $data['institute']=$result->result_array();
        }
        else{
            $data['error']="no data found";
        }
        return $data;
    }

    public function getindexcoursesearch($select=null,$like=null){

        $this->db->group_start();
        $this->db->like('courses_list.name',$like,'both');
        $this->db->or_like('courses_list.shortname',$like,'both');
        $this->db->group_end();
        $check=array('cactive'=>1);
        $this->db->where($check);
        $this->db->select($select);
        //$this->db->limit(10,0);
        $result=$this->db->get('courses_list');
        if($result->num_rows()>0){
            $data['course']=$result->result_array();
        }
        else{
            $data['error']="no data found";
        }
        return $data;
    }


    public function getSimiliarcolleges($select=null){
        $this->db->limit(8);
        $this->db->where(array('topcollege'=>1,'isblocked'=>0));
        $this->db->select($select);
        $return=$this->db->get('institute');
        $data['value']=$return->result_array();
        return $data;
    }



    public function setvisited($sid=null,$cid=null)
    {
        $datas="";
        if(($this->is_visitor_exist($sid,$cid)==0))
        {
            $data=array('student'=>$sid,'institute'=>$cid);
            $this->db->insert("inst_visitors",$data);
            $return=$this->db->get('inst_visitors');
            $datas['value']=$return->result_array();

            if($this->is_email_limit($sid)<3){
                $datas['emaillimit']="User exists";

        }

        }
        else{
            $datas['visitorexists']="User exists";
        }
        return $datas;
    }


    public function updatevisited($where){

        $this->db->where($where);
        $update=array('ismail'=>1);
        $this->db->update('inst_visitors',$update);
    }


    public function is_visitor_exist($stud=null,$clg=null)
    {
        $where=array('student'=>$stud,'institute'=>$clg);
        $this->db->where($where);
        $result=$this->db->get("inst_visitors");
        return $result->num_rows();
    }

    public function is_email_limit($stud=null)
    {
        $where=array('student'=>$stud);
        $this->db->where($where);
        $result=$this->db->get("inst_visitors");
        return $result->num_rows();
    }

public function isExist($data=null,$slug=null){

        if($data!="")$this->db->where($data);
        if($slug!="")$this->db->where($slug);
        $this->db->select(array('id','slug','title','emailid'));
        $res=$this->db->get('institute');
        return $res->num_rows();

    }


public function registerInstitute($data=null){

    $this->db->insert("institute",$data);
    return $this->db->affected_rows();
}

    public function updateInstitute($where=null,$data=null)
    {
    $this->db->where($where);
    $this->db->update("institute",$data);
    return $this->db->affected_rows();
}


    public function updateFeestruct($where=null,$data=null){

        $this->db->where($where);
        $this->db->update("allcourse",$data);
        return $this->db->affected_rows();
    }

    public function checkblocked($where){

        $this->db->where($where);
        $this->db->select('username');
        $data=$this->db->get('institute');
        return $data->num_rows();

    }

    public function getInstitute($where=null,$data=null)
{ 
    $this->db->where($where);
    $this->db->select($data);
    $result=$this->db->get("institute");
    if($result->num_rows()>0){
        $return["institute"]=$result->result_array();
    }
    else {
        $return["error"]="user not exist in the database";}
    return $return;
}


    public function getFeestruct($where=null,$data=null)
    {
        $this->db->where($where);
        $this->db->select($data);
        $result=$this->db->get("allcourse");
        if($result->num_rows()>0){
            $return["course"]=$result->result_array();
        }
        else {
            $return["error"]="user not exist in the database";}
        return $return;
    }

public function getCategory()
{
$this->db->select('*');
$this->db->where('active',1);
$result=$this->db->get("ins_category");
if($result->num_rows()>0){
    $data["category"]=$result->result_array();
}else {
    $data["error"]="no information found at server";
}
return $data;
}
public function getCourseCategory()
{
    $this->db->where('active',1);
$this->db->select('*');
$this->db->order_by("categoryname","asc");
$result=$this->db->get("course_category");
if($result->num_rows()>0){         $data["category"]=$result->result_array();      }else { $data["error"]="no information found at server";}       
return $data ;
}


    public function getCoursesbycategory($category=null)
    {
        $this->db->where(array('cactive'=>1,'category'=>$category));
        $this->db->select('*');
        $this->db->order_by("name","asc");
        $result=$this->db->get("courses_list");
        if($result->num_rows()>0){
            $data["courses"]=$result->result_array();
        }else {
            $data["error"]="no information found at server";
        }
        return $data ;
    }


public function getCourseLevel()
{
$this->db->select('*');    $result=$this->db->get("course_level");
if($result->num_rows()>0){         $data["levels"]=$result->result_array();      }else { $data["error"]="no information found at server";}       
return $data ;
}
public function createCourse($data=null){

        $this->db->insert("allcourse",$data);
        return $this->db->affected_rows();
    }

public function getCourse($where=null,$like=null,$data=null,$page=null,$pagesize=null)
{
if($page!=null &&$pagesize!=null)    {           $offset=($page-1)*$pagesize; $this->db->limit($pagesize,$offset);  } 
if($like!=null){$this->db->like( $like );}
if($where!=null){$this->db->where( $where );}
$this->db->select($data);
$this->db->from('allcourse');
    $this->db->join('course_category','course_category.id=allcourse.category_id');
$this->db->join('courses_list','courses_list.cid=allcourse.course_id');
$result=$this->db->get();
if($result->num_rows()>0){
    $data["courses"]=$result->result_array();      }
else { $data["error"]="course not exist in the database";}       
return $data;
}
public function countCourse($where=null,$like=null)
{
 if($like!=null){$this->db->like( $like );}
if($where!=null){$this->db->where( $where );}
 $query=$this->db->get('allcourse');
  return $query->num_rows();
}

public function saveCourse($where=null,$data=null){
    $this->db->where($where);
    unset($data['couid']);
    $this->db->update("allcourse",$data);
    return $this->db->affected_rows(); }


public function deleteCourse($where=null){
    $this->db->where($where);
$this->db->delete("allcourse");
return $this->db->affected_rows();
}
//exceptional
public function deleteSession($where=null){
    $this->db->where($where);
    $this->db->delete("ci_sessions");
    return $this->db->affected_rows();
}

public function getinstitutedata($name=null,$select=null){

    $this->db->where('slug',$name);
    $this->db->select($select);
    $count=$this->db->get('institute');
    if($count->num_rows()>0){

        $data['value']=$count->result_array();
    }
    else{
        $data['error']="no data found";
    }
    return $data;

}

    public function id_exists($name=null){

        $this->db->where('slug',$name);
        $this->db->select('id');
        $result=$this->db->get('institute');
        if($result->num_rows()>0){

           $data['value']=$result->row('id');
        }
        else{
            $data['error']="sorry";
        }
        return $data;
    }

    public function getcollegeprofile($value){

        $check=array('id'=>$value);
        $this->db->where($check);
        $result=$this->db->get('institute');
        if($result->num_rows()>0){
            $data['res']=$result->result_array();
        }
        else{
            $data['error']="Failed";
        }

        return $data;
    }




    public function getInstituteBy($stream=null,$region=null,$city=null,$like=null,$mlike=null,$select=null,$page=null,$pagesize=null)
    {
        if($page!=null &&$pagesize!=null)    {           $offset=($page-1)*$pagesize; $this->db->limit($pagesize,$offset);  }
        if($like!=null){  $this->db->group_start();$this->db->like( $like ); $this->db->or_like( $mlike );  $this->db->group_end();}
        //$this->db->limit(20);
        //if($where!=null){$this->db->where( $where );}
        $this->db->where('isblocked',0);
        if($stream!=null){$this->db->like($stream);}
        if($region!=null){$this->db->like($region);}
        if($city!=null){$this->db->like($city);}
        $this->db->select($select);
        $result=$this->db->get("institute");
        //$data["query"]=$this->db->last_query();
        if($result->num_rows()>0){
            $data["institutes"]=$result->result_array();
        }
        else {
            $data["error"]="no nformation found at server";
        }
        return $data;
    }

   
    public function getCourseby($urlsearch=null,$stream=null,$level=null,$term=null,$page=null,$pagesize=null)
    {
        /*
         stream     category id (allcourse) 
         level          level(allcourse) 
         term          name(courses_list)
         * 
         */
         
        $data=array();

        if($term!=""||$term!=null){$this->db->like(array('name'=>$term));}
        if($urlsearch!=""||$urlsearch!=null){$this->db->like(array('name'=>$urlsearch));}
         $this->db->select('cid');  
        $c_result=$this->db->get('courses_list');
        $data["query1"]= $this->db->last_query();
        if($c_result->num_rows()>0)
       {
                     $course=$c_result->result_array();
                    $course_id = array_column($course, 'cid');
                    
                    /* getcourse*/
                    /* get unique college id and seacrh here*/
                    $this->db->distinct('inst_id');
                    if($stream!=null){             $this->db->where($stream);    }
                    if($level!=null){             $this->db->where($level);    }
                    $this->db->select('inst_id');
                    $this->db->where_in('course_id',$course_id);
                    $institute=$this->db->get('allcourse');    
                        $data["query2"]= $this->db->last_query();
                    $inst_id=array_column($institute->result_array(), 'inst_id');   
                      if($institute->num_rows()>0)
                    {
                      
                           /** get all distinct institute **/
                          if($page!=null &&$pagesize!=null)    {           $offset=($page-1)*$pagesize; $this->db->limit($pagesize,$offset);  }
                           $this->db->select('*');
                            $this->db->where_in('id',$inst_id);
                         $allinstitute=$this->db->get('institute');
                             $data["query3"]= $this->db->last_query();
                         if($allinstitute->num_rows()>0){
                            $data["courses"]=$allinstitute->result_array();
                              $data["pcount"]=$institute->num_rows();
                             
                             
                         }
                            
                         else{
                             $data["error"]="no information found at server";
                             $data["pcount"]=0;
                         }
                          
                    }
             else{
                             $data["error"]="no information found at server";
                             $data["pcount"]=0;
                         }
                  
        }
        return $data;
    }


  /*  public function countCoursesby($stream=null,$level=null,$choice=null)
    {
        $ret=0;
        if($term!=""||$term!=null){$this->db->like(array('name'=>$term));}
         $this->db->select('cid');  
        $c_result=$this->db->get('courses_list');
        if($c_result->num_rows()>0)
       {
                     $course=$c_result->result_array();
                    $course_id = array_column($course, 'cid');
                    
                    /* getcourse*/
                    /* get unique college id and seacrh here*/
              /*      $this->db->distinct('inst_id');
                    if($stream!=null){             $this->db->where($stream);    }
                    if($level!=null){             $this->db->where($level);    }
                    $this->db->select('inst_id');
                    $this->db->where_in('course_id',$course_id);
                    $institute=$this->db->get('allcourse');    
                    $inst_id=array_column($institute->result_array(), 'inst_id');   
                      if($institute->num_rows()>0)
                    {
                      
                           /** get all distinct institute **/
                     /*      $this->db->select('*');
                            $this->db->where_in('id',$inst_id);
                         $allinstitute=$this->db->get('institute');
                             $ret=$allinstitute->num_rows();
                        
                          
                    }                  
        }
        return $ret;
        
    }*/

   



    public function getCategoryby($level=null,$term=null,$page=null,$pagesize=null)
    {


        $data=array();
        if($term!=""||$term!=null){$this->db->like(array('categoryname'=>$term));}
        $this->db->select('id');
        $c_result=$this->db->get('course_category');
        $data["query1"]= $this->db->last_query();
        if($c_result->num_rows()>0)
        {
            $course=$c_result->result_array();
            $course_id = array_column($course, 'id');

            /* getcourse*/
            /* get unique college id and seacrh here*/
            $this->db->distinct('inst_id');

            if($level!=null){             $this->db->where($level);    }
            $this->db->select('inst_id');
            $this->db->where_in('category_id',$course_id);
            $institute=$this->db->get('allcourse');
            $data["query2"]= $this->db->last_query();
            $inst_id=array_column($institute->result_array(), 'inst_id');
            if($institute->num_rows()>0)
            {

                /** get all distinct institute **/
                if($page!=null &&$pagesize!=null)    {           $offset=($page-1)*$pagesize; $this->db->limit($pagesize,$offset);  }
                $this->db->select('*');
                $this->db->where_in('id',$inst_id);
                $allinstitute=$this->db->get('institute');
                $data["query3"]= $this->db->last_query();
                if($allinstitute->num_rows()>0){
                    $data["courses"]=$allinstitute->result_array();
                    $data["pcount"]=$institute->num_rows();


                }

                else{
                    $data["error"]="no information found at server";
                    $data["pcount"]=0;
                }

            }
            else{
                $data["error"]="no information found at server";
                $data["pcount"]=0;
            }

        }
        return $data;




    }



  public function getcourseby2($level=null,$term=null,$page=null,$pagesize=null){
      if($page!=null &&$pagesize!=null)    {           $offset=($page-1)*$pagesize; $this->db->limit($pagesize,$offset);  }

      if($term!=null){$this->db->where(array('category_id'=>$term));}
      //if($level!=null){$this->db->like(array('level'=>$level));}

      $data="";
      /* get course*/
      $this->db->select('cid');
      $c_result=$this->db->get('courses_list');
      if($c_result->num_rows()>0){


          $course=$c_result->result_array();
          $course_id = array_column($course, 'cid');
          /* getcourse*/

          /* get unique college id and seacrh here*/
          $this->db->distinct('inst_id');
         // if($category!=null){             $this->db->where(array("category_id"=>$category));    }
          if($level!=null){             $this->db->like(array("level"=>$level));    }
          $this->db->select('inst_id');
          $this->db->where_in('course_id',$course_id);
          $institute=$this->db->get('allcourse');
          $inst_id=array_column($institute->result_array(), 'inst_id');
          /* get unique college id and seacrh here*/

          /** get all distinct institute **/
          if($institute->num_rows()>0){
              $this->db->select('title');
              $this->db->where_in('id',$inst_id);
              $allinstitute=$this->db->get('institute');
              $data=$allinstitute->result_array();
          }
      }
      /** get all distinct institute **/
      return $data;
      //return $c_result->result_array();
  }


    public function countCategorysby($level=null,$choice=null)
    {

        if($level!=null){$this->db->like(array('level'=>$level,'category_id'=>$choice));}

        if($choice!=null){ $this->db->where(array('category_id'=>$choice));}
        $query=$this->db->get("allcourse");
        return $query->num_rows();
    }


    public function countInstituteBy($choice=null,$region=null,$city=null,$like=null,$mlike=null)
    {

        //$this->db->limit(20);
        $this->db->where('isblocked',0);
        if($like!=null){  $this->db->group_start();$this->db->like( $like );$this->db->or_like($mlike); $this->db->group_end();}

        if($choice!=null){$this->db->like($choice);}
        //if($where!=null){$this->db->where( $where );}
        if($region!=null){$this->db->like( $region );}
        if($city!=null){$this->db->like( $city );}
        $query=$this->db->get("institute");
        return $query->num_rows();
    }

    public function test(){

        $this->db->where('shortname !=', 'NULL');
        $this->db->select('id');
       // $data=$this->db->where('shortname',NULL);

        $data=$this->db->get('institute');
        if($data->num_rows()>0){
            $value['val']=$data->result_array();
        }
        else{
            $value['error']="no";
        }
        return $value;
    }


    public function checkprocomplete($id=null){

        $this->db->where('id',$id);
        $check = '(url="" or address = "" or shortname="" or title="" or subtitle="" or type="" or university="" or state="" or district="" or city="" or pincode="")';

           $this->db->where($check);
        $data=$this->db->get('institute');

        if($data->num_rows()>0){

            $return['error']="row found error";
        }
        else{
            $return['val']="no row found";
        }
        return $return;


    }

    public function countUnread($id=null,$select=null){
        $this->db->where(array('institute'=>$id,'isiview'=>0));
        $this->db->select($select);
        $this->db->order_by('enquiry.mdate',"desc");
        $this->db->limit(4);
        $this->db->join('stud_tb',"stud_tb.studid=enquiry.student");
        $return=$this->db->get('enquiry');
        if($return->num_rows()>0){
            $data['values']=$return->result_array();
        }
        else{
            $data['error']="No data found";
        }
        return $data;
    }


    public function createFeature($data=null)
    {
        if ($data['type'] != "") {
            $this->db->insert("ins_feature", $data);
            return $this->db->affected_rows();
    }
    else{
            return 0;
        }
    }

    public function saveFeature($data=null,$where=null){
        if($where!=null){$this->db->where( $where );}
        $this->db->update("ins_feature",$data);     return $this->db->affected_rows();
    }
    public function getFeature($data=null,$where=null)
    {
        if($where!=null){$this->db->where( $where );}
        $this->db->select($data);
        $result=$this->db->get("ins_feature");
        if($result->num_rows()>0){         $data["features"]=$result->result_array();      }
        else { $data["error"]="course not exist in the database";}
        return $data;
    }

    public function getFeatureById($data=null,$where=null)
    {
        if($where!=null){$this->db->where( $where );}
        $this->db->select($data);
        $result=$this->db->get("ins_feature");
        if($result->num_rows()>0){         $data["features"]=$result->result_array();      }
        else { $data["error"]="course not exist in the database";}
        return $data;
    }

    public function deleteFeature($where=null)
    {

        if($where!=null){$this->db->where( $where );}
        $this->db->delete("ins_feature");
        return $this->db->affected_rows();
    }

    public function getfacilityimages($id=null){

    if($id!=null){$this->db->where(array('institute'=>$id,'type'=>'feature'));}
    $result=$this->db->get('ins_feature');
    if($result->num_rows()>0) {
        $data['features'] = $result->result_array();
    }
    else{
        $data["error"]="No images found";
    }
    return $data;
    }

    public function getCourses($id=null){

        if($id!=null){$this->db->where(array('institute'=>$id));}
        $result=$this->db->get('ins_feature');
        $data['features']=$result->result_array();
        return $data;

    }
    public function Updateseat($id=null,$seat=null){

      $this->db->where(array('couid'=>$id));
        $seatvalue=array('seats'=>$seat);
        $this->db->update('allcourse',$seatvalue);
        return $this->db->affected_rows();
    }

    public function getseat($id=null){

        if($id!=null)$this->db->where(array('couid'=>$id));
        $this->db->select('seats');
        $return=$this->db->get('allcourse');
        $data['seats']=$return->result_array();
        return $data;
    }

    public function getallmail($email=null,$pages=null,$like=null){
        $pagesize = 10;
        $page = $pages;
        $offset = ($page - 1) * $pagesize;
        $this->db->limit($pagesize, $offset);
        if($like!=null){$this->db->like( $like );}
        $this->db->order_by('mailbox_college.date',"desc");
        $this->db->where(array('collegeemail'=>$email));
        $return=$this->db->get('mailbox_college');
        if($return->num_rows()>0){
            $data['value']=$return->result_array();
        }
        else{
            $data['error']="Nothing found";
        }
        return $data;
    }


    public function countmail($like=null,$email=null)
    {
        $this->db->where(array('collegeemail'=>$email));
        if($like!=null){$this->db->like( $like );}
        $query=$this->db->get('mailbox_college');
        return $query->num_rows();
    }

    public function getlocation(){

        $result=$this->db->get('samplelocation');
        $data['value']=$result->result_array();
        return $data;
    }

    public function updatemail($id=null){
        $this->db->where('id',$id);
        $update = array('isiview' => 1);
        $this->db->update('mailbox_college', $update);

    }
    public function getmailcontent($id=null){
            $this->db->where(array('id' => $id));

        $return=$this->db->get('mailbox_college');
        if($return->num_rows()>0){
            $data['value']=$return->result_array();
        }
        else{
            $data['error']="Nothing found";
        }
        return $data;
    }

    public function checknewmail($email=null){
        $check=array('collegeemail'=>$email,'isiview'=>0);
        $this->db->where($check);
        $this->db->select('id');
        $data=$this->db->get('mailbox_college');
        $num=$data->num_rows();
        if($data->num_rows()>0){
            $datas['value']=$num;
        }
        else{
            $datas['value']=0;
        }
        return $datas;
    }

    public function Applyservice($id=null,$data=null,$check=null){

        if($this->collegeid_exists($id)==0) {
            $data['collegeid']=$id;
            $this->db->insert('services',$data);
            $return['insert']=$this->db->affected_rows();
        }
        else {
            $this->db->where($check,NULL);
            $this->db->where(array('collegeid'=>$id));
            $this->db->update('services',$data);
            $return['update']=$this->db->affected_rows();

        }
        return $return;
    }

    public function collegeid_exists($id=null){

        $this->db->where(array('collegeid'=>$id));
        $res=$this->db->get('services');
        return $res->num_rows();
    }

    public function getapplied($id=null){
        $this->db->where('collegeid',$id);

        //$this->db->select(array('featured','telecalling','ad','social','email'));
        $return=$this->db->get('services');
        return $return->result_array();
    }

    public function getComparedcolleges($val=null,$select=null){

        $this->db->where('id',$val);
        $this->db->select($select);
        $result=$this->db->get('institute');
        return $result->result_array();
    }

    public function getComparedcollegesbyname($val=null,$select=null){

        $this->db->limit(1);
        $this->db->like('title',$val);
        $this->db->select($select);
        $result=$this->db->get('institute');
        $data['value']=$result->result_array();
        return $data;
    }


    public function getComparecourses($id=null){

        $this->db->where('inst_id',$id);

        $this->db->from('allcourse');
        $this->db->join('course_category','course_category.id=allcourse.category_id');
        $this->db->join('courses_list','courses_list.cid=allcourse.course_id');
        $result=$this->db->get();

        if($result->num_rows()>0) {
            $data['value']=$result->result_array();
        }
        else{
            $data['error']="No courses found";
        }
        return $data;
    }

    public function getSelected($where=null){

        $this->db->where($where);
        $this->db->from('allcourse');
        $this->db->join('course_category','course_category.id=allcourse.category_id');
        $this->db->join('courses_list','courses_list.cid=allcourse.course_id');
        $result=$this->db->get();
        return $result->result_array();

    }


    public function getSimiliarcolleges2($where=null,$select=null){

        $this->db->where('isblocked',0);
        if($where!=null){$this->db->where($where);}
        $this->db->limit(3);
        $this->db->select($select);
        $return=$this->db->get('institute');
        $data['value']=$return->result_array();
        return $data;
    }

    public function getFeaturedcolleges($select=null){
        $this->db->select($select);
        $this->db->where('isblocked',0);
        $return=$this->db->get('institute');
        $data['value']=$return->result_array();
        return $data;
    }

    public function getEvent($data=null,$where=null)
    {
        if($where!=null){$this->db->where( $where );}
        $this->db->select($data);
        $result=$this->db->get("ins_feature");
        if($result->num_rows()>0){         $data["features"]=$result->result_array();      }
        else { $data["error"]="course not exist in the database";}
        return $data;
    }


    public function getcompSimiliar($id=null){

        $this->db->where(array("id !="=>$id,'isblocked'=>0));
        $return=$this->db->get('institute');
        $data['clg']=$return->result_array();
        return $data;
    }

    public function getsliderclg(){

        $this->db->where('isblocked',0);
        $return=$this->db->get('institute');
        $data['clg']=$return->result_array();
        return $data;
    }

    public function getclgBrochure($id=null,$select=null){

    $this->db->where(array('id'=>$id));
    $this->db->select($select);
    $res=$this->db->get('institute');
    if($res->num_rows()>0) {
        $data['brochure'] = $res->result_array();
    }
    else{
        $data['error']="Not found";
    }
    return $data;
    }









    public function getVisitors($cid=null){

        $this->db->where(array('institute'=>$cid));
		$this->db->order_by('inst_visitors.id',"desc");
        $this->db->from('inst_visitors');
		
        $this->db->join("stud_tb","stud_tb.studid=inst_visitors.student");
        $this->db->join("institute","institute.id=inst_visitors.institute");
        $value=$this->db->get();
        if($value->num_rows()>0){
            $data['value']=$value->result_array();
            $data['row']=$value->num_rows();

        }
        else{
            $data['error']="No value found";
        }
        return $data;

    }

    public function countvisitors($cid=null,$pages=null){
        $pagesize = 9;
        $page = $pages;
        $offset = ($page - 1) * $pagesize;
        $this->db->limit($pagesize, $offset);
        $this->db->where(array('institute'=>$cid));
        $query=$this->db->get('inst_visitors');
        return $query->num_rows();
    }


    public function submitcollegeReview($data=null)
    {

        if ($this->isReviewExist($data['student'], $data['college'])==0){
        $value = $this->db->insert('reviews', $data);
        return $this->db->affected_rows();
        }
        return -1;
    }

    public function isReviewExist($stud=null,$clg=null){

        $this->db->where(array('student'=>$stud,'college'=>$clg));
        $res=$this->db->get('reviews');
        return $res->num_rows();
    }

    public function getCollegereviews($select=null,$page=null,$pagesize=null,$id=null){
        if($page!=null &&$pagesize!=null)    {           $offset=($page-1)*$pagesize; $this->db->limit($pagesize,$offset);  }
        $this->db->where('active',1);
        if($id!=null){
            $this->db->where('college',$id);
        }
        $this->db->from('reviews');

        $this->db->order_by("reviews.rid","desc");
        $this->db->select($select);
        $this->db->join("institute","institute.id=reviews.college");
        $data=$this->db->get();
        if($data->num_rows()>0){
            $return['value']=$data->result_array();
        }
        else{
            $return['error']="No value";
        }
        return $return;
    }

    public function countReviews($id=null){

        if($id!=null){
            $this->db->where('college',$id);
        }
        $query=$this->db->get('reviews');
        return $query->num_rows();
    }

    public function getCollegeadminreviews($where=null,$page=null,$pagesize=null){

        if($page!=null &&$pagesize!=null)    {           $offset=($page-1)*$pagesize; $this->db->limit($pagesize,$offset);  }

            $this->db->where('college',$where);
			$this->db->order_by('rid',"desc");
        $data=$this->db->get('reviews');
        if($data->num_rows()>0){
            $return['value']=$data->result_array();
        }
        else{
            $return['error']="No value";
        }
        return $return;
    }

    public function countadminReviews($id=null){


            $this->db->where('college',$id);

        $query=$this->db->get('reviews');
        return $query->num_rows();
    }

    public function countclgvisitors($id=null){

        $this->db->where('institute',$id);
        $res=$this->db->get('inst_visitors');
        return $res->num_rows();
    }

    public function countclgreviews($id=null){

        $this->db->where('college',$id);
        $res=$this->db->get('reviews');
        return $res->num_rows();
    }

    public function countcourses($id=null){

        $this->db->where('inst_id',$id);
        $res=$this->db->get('allcourse');
        return $res->num_rows();
    }

    public function countenquiry($id=null){

        $this->db->where('institute',$id);
        $res=$this->db->get('enquiry');
        return $res->num_rows();
    }

    public function getTopclg(){

        $this->db->limit(10);
        $this->db->where(array('topcollege'=>1,'isblocked'=>0));
        $data=$this->db->get('institute');
        return $data->result_array();
    }
    public function getcid($value=null){
    if($value!="") {
        $this->db->where('name', $value);
        $this->db->select('cid');
        $data = $this->db->get('courses_list');
        return $data->row()->cid;
    }
    else{
        return 0;
    }
    }

    public function updaterevadmin($where=null,$status=null){

        $this->db->where($where);
        $update=array('active'=>$status);
        $this->db->update('reviews',$update);
    }

    public function getpagesdata($where=null){
        $this->db->where($where);
        $res=$this->db->get('seopages');
        return $res->result_array();
    }

    public function getCollegetags($where=null){

        $this->db->where('id',$where);
        $this->db->select(array('titletag','metanametag','metakeytag'));
        $res=$this->db->get('institute');
        return $res->result_array();

    }

    public function getcoursecontent($like=null,$page=null,$pagesize=null){
        if($page!=null &&$pagesize!=null)    {           $offset=($page-1)*$pagesize; $this->db->limit($pagesize,$offset);  }
        $this->db->like('name',$like);
        $this->db->where('active',1);
        $ret=$this->db->get('coursecontent');
        if($ret->num_rows()>0){
            $data['datas']=$ret->result_array();
        }
        else{
            $data['error']="Error found";
        }
        return $data;
    }

    public function countCoursecontent($like=null)
    {
        $this->db->like('name',$like);
        $this->db->where('active',1);
        $query=$this->db->get('coursecontent');
        return $query->num_rows();
    }

    public function getdetailedContent($name=null){

        $this->db->where('name',$name);
        $data=$this->db->get('coursecontent');
        if($data->num_rows()>0){

            $ret['value']=$data->result_array();
        }
        else{
            $ret['error']="errr";
        }
        return $ret;
    }

    public function getsimiliarContent($cat,$name){
        $this->db->limit(4);
        $this->db->where(array('catname'=>$cat,'name !='=>$name));
        $data=$this->db->get('coursecontent');
        return $data->result_array();

    }

    public function getcareer($like=null,$page=null,$pagesize=null){
        if($page!=null &&$pagesize!=null)    {           $offset=($page-1)*$pagesize; $this->db->limit($pagesize,$offset);  }
        $this->db->like('name',$like);
        $this->db->where('active',1);
        $ret=$this->db->get('career');
        if($ret->num_rows()>0){
            $data['datas']=$ret->result_array();
        }
        else{
            $data['error']="Error found";
        }
        return $data;
    }

    public function countcareer($like=null)
    {
        $this->db->like('name',$like);
        $this->db->where('active',1);
        $query=$this->db->get('career');
        return $query->num_rows();
    }

    public function getdetailedCareer($name=null){

        $this->db->where('name',$name);
        $data=$this->db->get('career');
        if($data->num_rows()>0){

            $ret['value']=$data->result_array();
        }
        else{
            $ret['error']="errr";
        }
        return $ret;
    }

    public function getsimiliarCareer($cat,$name){
        $this->db->limit(4);
        $this->db->where(array('category'=>$cat,'name !='=>$name));
        $data=$this->db->get('career');
        return $data->result_array();

    }

    public function getallcolleges($stream,$place,$page,$pagesize){

        if($page!=null && $pagesize!=null)    {           $offset=($page-1)*$pagesize; $this->db->limit($pagesize,$offset);  }
        $this->db->select(array('id','title','slug','state','city','type','profile'));
        if($place!="" && $place!="null") {
            $this->db->group_start();
            $this->db->like('institute.state', $place, 'both');
            $this->db->or_like('institute.district', $place, 'both');
            $this->db->group_end();
        }
        if($stream!="" && $stream!="null")$this->db->where('type',$stream);


        $return=$this->db->get('institute');
        return $return->result_array();
    }

    public function countallclgs($stream,$place){

        if($place!="" && $place!="null") {
            $this->db->group_start();
            $this->db->like('institute.state', $place, 'both');
            $this->db->or_like('institute.district', $place, 'both');
            $this->db->group_end();
        }
        if($stream!="" && $stream!="null")$this->db->where('type',$stream);

        $return=$this->db->get('institute');
        return $return->num_rows();
    }
}
