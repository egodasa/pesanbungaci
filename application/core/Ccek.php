<?php if (!defined('BASEPATH')) exit('No direct script access
allowed');


 class Ccek extends CI_Controller {

 function __construct()
 {
 parent::__construct();
 if (!$this->access->is_login())
 {
 redirect('login');
 }
 //bisa dtambahi fungsionalitas lain

 }
 function is_login()
 {
 return $this->access->is_login();
 }

 }

 class MY_Controller extends CI_Controller {
 function __construct()
 {
 parent::__construct();
 }
 }
