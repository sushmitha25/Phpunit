<?php

	/* Test Cases Description start*/
	/*
	 ==============================================================================================
	  NOTE :-																				   
	 ==============================================================================================
	*/
		
	/*	
	print_r("\n\n\t"."===========================================================================");
	print_r("\n\t"."DESCRIPTION : Dashboard.php TEST CASE LIST");
	print_r("\n\t"."===========================================================================");

	print_r("\n\t"."01. test_index");

	print_r("\n\n\t"."TOTAL TAST CASES : 1");
	print_r("\n\t"."==========================================================================="."\n\n");	
	*/	
	/* Test Cases Description end*/
	
class Dashboard_test extends TestCase
{
	public function __construct(){
		parent::__construct();
		//$this->dashboard = new Dashboard();
	}
	/*
	 | Model - Dashboard_controller
	 | Test Description - This function is to setup default session
	 */
	public function setUp(){
		$this->resetInstance();
		$this->CI->load->library('session');
		$_SESSION['sess_tenant_id']=5;
	}
	
	/*
    | Controller - Users | Test Case No.- (01).
    | Test Description - This function will check if the view file loaded.
    | Assertion - assertResponseCode check the http response code.
    */
	public function test_index(){
		$output = $this->request('GET', ['Dashboard', 'index']);
		if($output != ""){
			$this->assertContains('<title>Cloud Scheduler</title>', $output);
		}
	}
	/*
	 | Controller - Users | Test Case No.- (02).
	 | Test Description - This function will check if the task chart loaded.
	 | Assertion - assertResponseCode check the http response code.
	 */
	public function test_dashchart(){
		$array = array (
				'Year' => '2017'
		);
		$_POST['Year']='2017';
		$output = $this->request('GET', ['Dashboard', 'dashchart'],$array);
		if($output != ""){
			$this->assertContains('[{"period":', $output);
		}
	}
	
}	 
?>
