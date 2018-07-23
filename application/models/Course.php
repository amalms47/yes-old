<?php


class Course extends CI_Model{

    public function __construct() {
        parent::__construct();
    }


    public function courselist($data=null)
    {
       $pagesize=10;
       $page=$data['page'];
       $offset=($page-1)*$pagesize;
      if($data['course']!=""){$this->db->like(  array("title"=>$data['course']) );}
       $this->db->limit($pagesize,$offset);        
        $this->db->where(array("userid"=>$data["userid"]));
        $this->db->select('*');
       $result=$this->db->get("college_courses");
       if($result->num_rows()>0){         $data["courses"]=$result->result_array();      }
        else { $data["error"]="course not exist in the database";}       
        return $data;
    }
    public function countcourse($data=null)
    {
       if($data['course']!=""){$this->db->like(  array("title"=>$data['course']) );}
        $this->db->where(array("userid"=>$data["userid"]));
        $query=$this->db->get('college_courses');
        return $query->num_rows();
    }
    
    public function savecourse($data=null)
    {
        $this->db->insert("college_courses",$data);
        return $this->db->affected_rows();  
    }
    public function updatecourse($data=null)
    {
        $this->db->where(array("id"=>$data["id"]));
         $this->db->update("college_courses",$data);
          return $this->db->affected_rows();  
    }
    public function deletecourse($id=null)
    {
         $this->db->where(array("id"=>$id));
         $this->db->delete("college_courses");
          return $this->db->affected_rows();  
    }
    public function getcoursebyid($id=null)
    {
        $this->db->where(array("id"=>$id));
        $this->db->select('*');
        $result=$this->db->get("college_courses");
       if($result->num_rows()>0){         $data["courses"]=$result->result_array();      }
        else { $data["error"]="course not exist in the database";}       
        return $data;
    }
    
    public function getcoursecategory()
    {
        $this->db->select(array('id','categoryname'));
        $this->db->where('active',1);
        $this->db->order_by("categoryname","asc");

        $result=$this->db->get("course_category");
          if($result->num_rows()>0){         $data["category"]=$result->result_array();      }
        else { $data["error"]="course not exist in the database";}       
        return $data;
    }   
        public function getcourselevel()
    {
        $this->db->select('level');
        $this->db->order_by("level","asc");
        $result=$this->db->get("course_level");
          if($result->num_rows()>0){         $data["level"]=$result->result_array();      }
        else { $data["error"]="course not exist in the database";}       
        return $data;
    }  
    
     public function saveallcourse($data=null)
    {
        $this->db->insert("courses",$data);
        return $this->db->affected_rows();  
    }

    public function saveadminCourse($data=null)
    {
        $this->db->insert("courses_list",$data);
        return $this->db->affected_rows();
    }

    public function savecollegeCourse($cou=null,$cat=null,$short=null,$admin=null)
    {
        $data=array('category'=>$cat,'name'=>$cou,'addedby'=>$admin,'shortname'=>$short);
        $this->db->insert("courses_list",$data);
        return $this->db->affected_rows();
    }
    public function updateallcourse($data=null)
    {
        $this->db->where(array("cid"=>$data["cid"]));
        $this->db->update("courses_list",$data);
        return $this->db->affected_rows();
    }
    public function getallcourses($data=null,$page=null)
    {
        
        $pagesize=10;  $page=$page;   $offset=($page-1)*$pagesize;     $this->db->limit($pagesize,$offset);   
        $this->db->order_by("courses_list.cid","desc");
        $this->db->like('courses_list.name',$data["search"],'both');
        $this->db->or_like('course_category.categoryname',$data["search"],'both');

         $this->db->select('*');

        $this->db->from('courses_list');
        $this->db->join('course_category','course_category.id=courses_list.category');
         $result=$this->db->get();
          if($result->num_rows()>0){         $data["courses"]=$result->result_array();      }
        else { $data["error"]="course not exist in the database";}     
        return $data;
    }


    public function blockCourse($id=null,$val=null){

        $this->db->where(array('cid'=>$id));
        $update=array('cactive'=>$val);
        $this->db->update('courses_list',$update);
        return $this->db->affected_rows();

    }
    public function countcourses($data=null)
    {
       $this->db->like('name',$data["search"],'both');  
       $this->db->or_like('category',$data["search"],'both');  

       $query=$this->db->get('courses_list');
        return $query->num_rows();
    }
    
    public function getallcoursebyid($data=null)
    {
       $this->db->where($data);
       $this->db->select('*');
       $this->db->from('courses_list');
        $this->db->join('course_category','course_category.id=courses_list.category');
       $result=$this->db->get();
       if($result->num_rows()>0){         $data["courses"]=$result->result_array();      }
        else { $data["error"]="course not exist in the database";}       
        return $data;
    }

    public function getCategory($id=null){

        $this->db->where(array('inst_id'=>$id));
        $result=$this->db->get('courses');
        if($result->num_rows()>0){
            $data["category"]=$result->result_array();      }
        else {
            $data["error"]="course not exist in the database";
        }
        return $data;
    }


    public function getCoursesfront($id=null,$page=null){

        $pagesize=8;    $offset=($page-1)*$pagesize;     $this->db->limit($pagesize,$offset);
        $this->db->where(array('inst_id'=>$id));
        $this->db->order_by("courses_list.name","asc");
        $this->db->from('allcourse');
        $this->db->join('course_category','course_category.id=allcourse.category_id');
        $this->db->join('courses_list','courses_list.cid=allcourse.course_id');
        $result=$this->db->get();
        if($result->num_rows()>0){
            $data["category"]=$result->result_array();      }
        else {
            $data["error"]="course not exist in the database";
        }
        return $data;
    }

    public function countcoursefront($id=null)
    {

        $this->db->where(array('inst_id'=>$id));
        $value=$this->db->get('allcourse');
        return $value->num_rows();
    }
}
