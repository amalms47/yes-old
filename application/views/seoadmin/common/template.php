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

$this->load->view('seoadmin/common/header');
$this->load->view('seoadmin/common/sidebar');
$this->load->view('seoadmin/'.$pageview);
$this->load->view('seoadmin/common/footer');
