<?php

class SeoModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }


    public function seologin($where = null)
    {
        $this->db->where($where);
        $result = $this->db->get("seoadmin");
        if ($result->num_rows() > 0) {
            $return["seo"] = $result->result_array();
        } else {
            $return["error"] = "user not exist in the database";
        }
        return $return;
    }


    public function updateseologin($where = null, $data = null)
    {
        $this->db->where($where);
        $this->db->update("seoadmin", $data);
        return $this->db->affected_rows();
    }

    public function getallpages(){

        $data=$this->db->get('seopages');
        return $data->result_array();
    }

    public function getpageTag($id=null){

        $this->db->where(array('id'=>$id));
        $data=$this->db->get('seopages');
        return $data->result_array();
    }

    public function updatepagetag($id=null,$update=null){

        $this->db->where(array('id'=>$id));
        $this->db->update('seopages',$update);
        return $this->db->affected_rows();

    }

    public function getallslug(){
        $this->db->select('slug');
        $content= $this->db->get('institute');
        $datas['num']=$content->num_rows();
        $datas['seo']=$content->result_array();
            return $datas;
    }
    public function getallcouslug(){
        $this->db->select(array('catname','name'));
        $content= $this->db->get('coursecontent');

        return $content->result_array();
    }

    public function getallcarslug(){
        $this->db->select(array('category','name'));
        $content= $this->db->get('career');

        return $content->result_array();
    }
}
?>