<?php

	/* Test Cases Description start*/
	/*
	 ==============================================================================================
	  NOTE :-																				   
	 ==============================================================================================
	*/
		
	/*	
	print_r("\n\n\t"."===========================================================================");
	print_r("\n\t"."DESCRIPTION : Login.php TEST CASE LIST");
	print_r("\n\t"."===========================================================================");

	print_r("\n\t"."01. test_index");
	print_r("\n\t"."02. test_login");
	print_r("\n\t"."03. test_forgotpassword");
	print_r("\n\t"."04. test_setpassword");
	print_r("\n\t"."05. test_resetpassword");

	print_r("\n\n\t"."TOTAL TEST CASES : 5");
	print_r("\n\t"."==========================================================================="."\n\n");	
	*/	
	/* Test Cases Description end*/
	
class Login_test extends TestCase
{
	public function setUp(){
        $this->resetInstance();
		$this->CI->load->library('session');

    }
	
	/*
    | Controller - Login | Test Case No.- (01).
    | Test Description - This function will check if the view file loaded.
    | Assertion - assertResponseCode check the http response code.
    */
	public function test_index(){
		$output = $this->request('GET', ['Login', 'index']);
		$this->assertResponseCode ( 200 );
	}
	
	/*
    | Controller - Users | Test Case No.- (02).
    | Test Description - This function is to login user.
    | Assertion - assertResponseCode will be successfull if http response code is equal to 302.
    */
    public function test_login() {
		
		$output = $this->request('GET', ['Login', 'login']);
		$this->assertResponseCode ( 302 );
	}
	
	/*
    | Controller - Users | Test Case No.- (03).
    | Test Description - This function is for forgot password request.
    | Assertion - assertResponseCode will be successfull if http response code is equal to 200.
    */
    public function test_forgotpassword() {
		
		$output = $this->request('GET', ['Login', 'forgotpassword']);
		$this->assertResponseCode ( 200 );
	}
	
	/*
    | Controller - Users | Test Case No.- (04).
    | Test Description - This function is to set password for user.
    | Assertion - assertResponseCode will be successfull if http response code is equal to 200.
    */
    public function test_setpassword() {
		
		$output = $this->request('GET', ['Login', 'setpassword']);
		$this->assertResponseCode ( 200 );
	}
	
	/*
    | Controller - Users | Test Case No.- (05).
    | Test Description - This function is to reset password for user.
    | Assertion - assertResponseCode will be successfull if http response code is equal to 200.
    */
    public function test_resetpassword() {
		
		$output = $this->request('GET', ['Login', 'resetpassword']);
		$this->assertResponseCode ( 200 );
	}
	
}	 
?>