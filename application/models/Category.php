<?php

class Category extends CI_Model{

    public function getCategorylist($page=null,$like=null){

        $pagesize=10;       $offset=($page-1)*$pagesize; $this->db->limit($pagesize,$offset);
        if($like!=null){$this->db->like( $like );}
        $this->db->order_by("categoryname","asc");
        $return=$this->db->get('course_category');
        return $return->result_array();
    }

    public function getCategorydropdown(){

        $this->db->order_by("category","asc");
        $return=$this->db->get('ins_category');
        return $return->result_array();
    }

    public function savenewcategory($data=null){

        if($this->iscatexist($data['categoryname'])>0)
        {
            $return['error']="exists";
        }
        else {
            $this->db->insert('course_category', $data);
            $return['value']=$this->db->affected_rows();
        }
        return $return;

    }
    public function iscatexist($cat=null){

       $this->db->where(array('categoryname'=>$cat));
        $res=$this->db->get('course_category');
        return $res->num_rows();
    }

    public function savenewclgcategory($data=null){

        $this->db->insert('ins_category',$data);
        return $this->db->affected_rows();

    }

    public function countcategory($like=null){
        if($like!=null){$this->db->like( $like );}
        $query=$this->db->get('course_category');
        return $query->num_rows();
    }

    public function newCategory($data=null){

        $this->db->insert('course_category',$data);
        return $this->db->affected_rows();
    }

    public function updateCategory($id=null,$data=null){
        $this->db->where(array('id'=>$id));
        $this->db->update('course_category',$data);
        return $this->db->affected_rows();
    }

    public function blockCategory($id=null,$val=null){

        $this->db->where(array('id'=>$id));
        $update=array('active'=>$val);
        $this->db->update('course_category',$update);
        return $this->db->affected_rows();

    }

    public function getclgCategory($page=null,$search=null){

        $pagesize=10;  $page=$page;   $offset=($page-1)*$pagesize;     $this->db->limit($pagesize,$offset);
        if($search!=null)$this->db->like('category',$search);

        $this->db->order_by("category","asc");
        $data=$this->db->get('ins_category');
        if($data->num_rows()>0){
            $return['value']=$data->result_array();
        }
        else{
            $return['error']="error";
        }
        return $return;
    }

    public function countclgCategory($like=null){
        if($like!=null){$this->db->like('category',$like);}
        $query=$this->db->get('ins_category');
        return $query->num_rows();

    }
    public function updateCat($id=null,$flag=null){

        $this->db->where(array('id'=>$id));
        $update=array('active'=>$flag);
        $this->db->update('ins_category',$update);
        return $this->db->affected_rows();
    }


    public function getExistCategory($select=null,$like=null){

        $this->db->like($like);
        $this->db->select($select);
        $result=$this->db->get('course_category');
        if($result->num_rows()>0){
            $data['institute']=$result->result_array();
        }
        else{
            $data['error']="no data found";
        }
        return $data;
    }

}


?>