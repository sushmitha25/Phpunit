<?php

	/* Test Cases Description start*/
	/*
	 ==============================================================================================
	  NOTE :-																				   
	 ==============================================================================================
	*/
		
	/*	
	print_r("\n\n\t"."===========================================================================");
	print_r("\n\t"."DESCRIPTION : Policy.php TEST CASE LIST");
	print_r("\n\t"."===========================================================================");

	print_r("\n\t"."01. test_privacy");
	print_r("\n\t"."02. test_security");
	print_r("\n\t"."03. test_terms_of_service");

	print_r("\n\n\t"."TOTAL TAST CASES : 3");
	print_r("\n\t"."==========================================================================="."\n\n");	
	*/	
	/* Test Cases Description end*/
	
class Tools_test extends TestCase
{
	public function __construct(){
		parent::__construct();
	}
	
	/*
    | Controller - Policy | Test Case No.- (01).
    | Test Description - This function will check if the privacy view file loaded.
    | Assertion - assertResponseCode check the http response code.
    */
	public function test_privacy(){
		$output = $this->request('GET', ['Policy', 'privacy']);
		$this->assertResponseCode ( 302 );
	}
	
	/*
    | Controller - Policy | Test Case No.- (02).
    | Test Description - This function will check if the security view file loaded.
    | Assertion - assertResponseCode check the http response code.
    */
	
	public function test_security(){
		$output = $this->request('GET', ['Policy', 'security']);
		$this->assertResponseCode ( 302 );
	}
	
	/*
    | Controller - Policy | Test Case No.- (03).
    | Test Description - This function will check if the terms_of_service view file loaded.
    | Assertion - assertResponseCode check the http response code.
    */
	
	public function test_terms_of_service(){
		$output = $this->request('GET', ['Policy', 'terms_of_service']);
		$this->assertResponseCode ( 302 );
	}
	
	
	
}	 
?>
