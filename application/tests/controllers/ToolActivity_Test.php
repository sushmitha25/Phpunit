<?php

	/* Test Cases Description start*/
	/*
	 ==============================================================================================
	  NOTE :-																				   
	 ==============================================================================================
	*/
		
	/*	
	print_r("\n\n\t"."===========================================================================");
	print_r("\n\t"."DESCRIPTION : Tools.php TEST CASE LIST");
	print_r("\n\t"."=============================================================================");

	print_r("\n\t"."01. test_index");
	print_r("\n\t"."02. test_manual_backup");
	print_r("\n\t"."03. test_query");
	print_r("\n\t"."04. test_manual");
	print_r("\n\t"."05. test_mailquery");

	print_r("\n\n\t"."TOTAL TEST CASES : 5");
	print_r("\n\t"."==========================================================================="."\n\n");	
	*/	
	/* Test Cases Description end*/
	
class ToolActivity_test extends TestCase
{
	public function __construct(){
		parent::__construct();
	}
	
	/*
    | Controller - Tools | Test Case No.- (01).
    | Test Description - This function will check if the view file loaded.
    | Assertion - assertResponseCode check the http response code.
    */
	public function test_index(){
		$output = $this->request('GET', ['Tools', 'index']);
		$this->assertResponseCode ( 302 );
	}
	
	/*
    | Controller - Tools | Test Case No.- (02).
    | Test Description - This function will check if the backup is taken.
    | Assertion - assertResponseCode check the http response code.
    */
	
	/*public function test_manual_backup(){
		$output = $this->request('GET', ['Tools', 'manual_backup']);
		$this->assertResponseCode ( 302 );
	}*/
	
	/*
    | Controller - Tools | Test Case No.- (03).
    | Test Description - This function will check if the view file loaded.
    | Assertion - assertResponseCode check the http response code.
    */
	
	public function test_query(){
		$output = $this->request('GET', ['Tools', 'query']);
		$this->assertResponseCode ( 500 );
	}
	
	/*
    | Controller - Tools | Test Case No.- (04).
    | Test Description - This function will check if the view file loaded.
    | Assertion - assertResponseCode check the http response code.
    */
	
	public function test_manual(){
		$output = $this->request('GET', ['Tools', 'manual']);
		$this->assertResponseCode ( 302 );
	}
	
	/*
    | Controller - Tools | Test Case No.- (05).
    | Test Description - This function will check if the email query.
    | Assertion - assertResponseCode check the http response code.
    */
	
	public function test_mailquery(){
		$output = $this->request('GET', ['Tools', 'mailquery']);
		$this->assertResponseCode ( 200 );
	}
	
}	 
?>
