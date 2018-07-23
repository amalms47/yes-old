<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Exceptions
 *
 * @author Jithin Jacob
 */
class Exceptions  extends CI_Controller{
    public function __construct() {
        parent::__construct();
    }
    public function scriptsupport()
    {
        echo "no script is enabled or browser not capable for javascript activity";
    }
   public function browsersupport()
   {
       echo "browser not support";
   }
     public function index() { $this->load->view("error/error_404");} 
    public function page_400(){$this->load->view("error/error_400");}
    public function page_401(){$this->load->view("error/error_401");}
    public function page_403(){$this->load->view("error/error_403");}

}
