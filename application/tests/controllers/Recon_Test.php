<?php

	/* Test Cases Description start*/
	/*
	 ==============================================================================================
	  NOTE :-																			   
	 ==============================================================================================
	*/
		
	/*	
	print_r("\n\n\t"."===========================================================================");
	print_r("\n\t"."DESCRIPTION : Recon.php TEST CASE LIST");
	print_r("\n\t"."===========================================================================");

	print_r("\n\t"."01. test_ping");
    print_r("\n\t"."02. test_index");
	print_r("\n\t"."03. test_get_missed_task");
	print_r("\n\n\t"."TOTAL TAST CASES : 3");
	print_r("\n\t"."==========================================================================="."\n\n");	
	*/	
	/* Test Cases Description end*/
		
class Recon_test extends TestCase {
	public function __construct() {
		parent::__construct ();
		//$this->recon = new Task ();
	}
	
	/*
    | Controller - Recon | Test Case No.- (01).
    | Test Description - This function will check if the view file loaded
    | Assertion - assertResponseCode check the http response code
    */
	public function test_ping(){
		$output = $this->request ( 'GET', [ 
				'Recon',
				'ping' 
		] );
		$this->assertResponseCode ( 200 );
	}
	/*
    | Controller - Recon | Test Case No.- (02).
    | Test Description - This function will check if the view file loaded
    | Assertion - assertResponseCode check the http response code
    */
	public function test_index(){
		$output = $this->request ( 'GET', [ 
				'Recon',
				'index' 
		] );
		$this->assertResponseCode ( 200 );
	}
	/*
    | Controller - Recon | Test Case No.- (03).
    | Test Description - This function will check if the view file loaded
    | Assertion - assertResponseCode check the http response code
    */
    public function test_get_missed_task(){
		$output = $this->request ( 'GET', [ 
				'Recon',
				'get_missed_task' 
		] );
		$this->assertResponseCode ( 200 );
	}
	 
}
?>

