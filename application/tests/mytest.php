<?php
use PHPUnit\Framework\TestCase;
Class Mytest extends TestCase{

function __construct()
{
	 parent::__construct();

    $this->load->database();

    $this->load->helper("form");

    $this->load->library('ion_auth');
    $this->load->library("form_validation");
    $this->load->library("message"); // this is the new library.

    $this->lang->load('auth');
    $this->lang->load('email');
    $this->load->helper('language');
}


public function test_index()
{
$this->resetInstance() 
	 $d = new Welcome();
                $e = $d->work();
                 $this->assertEquals("hii", $e);    
}
}
?>
