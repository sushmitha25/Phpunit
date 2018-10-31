<?php

	/* Test Cases Description start*/
	/*
	 ==============================================================================================
	  NOTE :-																				   
	 ==============================================================================================
	*/
		
	/*	
	print_r("\n\n\t"."===========================================================================");
	print_r("\n\t"."DESCRIPTION : Verify.php TEST CASE LIST");
	print_r("\n\t"."===========================================================================");

	print_r("\n\t"."01. test_forgotpassword");

	print_r("\n\n\t"."TOTAL TEST CASES : 1");
	print_r("\n\t"."==========================================================================="."\n\n");	
	*/	
	/* Test Cases Description end*/
	
class Verify_test extends TestCase
{
	public function setUp(){
        $this->resetInstance();
    }
	
	/*
    | Controller - Verify | Test Case No.- (01).
    | Test Description - This function will verify forgot password policy.
    | Assertion - assertResponseCode check the http response code.
    */
	public function test_forgotpassword(){
		$output = $this->request('GET', ['Verify', 'forgotpassword']);
		$this->assertResponseCode ( 302 );
	}
	
	
	
} 
?>