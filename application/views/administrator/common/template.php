<?php
/**
 * Created by PhpStorm.
 * User: Jithin Jacob
 * Date: 8/8/2016
 * Time: 5:13 PM
 */

//$data["username"]=$username;
//$data["photo"]=$photo;
//print_r($data);

$this->load->view('administrator/common/header');
$this->load->view('administrator/common/sidebar');
$this->load->view('administrator/'.$pageview);
$this->load->view('administrator/common/footer');
