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

$this->load->view('institute/common/header');
$this->load->view('institute/common/sidebar');
$this->load->view('institute/'.$pageview);
$this->load->view('institute/common/footer');
