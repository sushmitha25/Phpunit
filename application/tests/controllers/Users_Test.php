<?php

	/* Test Cases Description start*/
	/*
	 ==============================================================================================
	  NOTE :- Test Case no.03 (test_addUser) have some dependent test cases.																				   
	 ==============================================================================================
	*/
		
	/*	
	print_r("\n\n\t"."===========================================================================");
	print_r("\n\t"."DESCRIPTION : Users.php TEST CASE LIST");
	print_r("\n\t"."===========================================================================");

	print_r("\n\t"."01. test_index");
	print_r("\n\t"."02. test_addUser");
	print_r("\n\t"."03. test_add_user_data");
	print_r("\n\t"."04. test_editUser");
	print_r("\n\t"."05. test_edit_user_data");
	print_r("\n\t"."06. test_change_password");
	print_r("\n\t"."07. test_change_password_data");
	print_r("\n\t"."08. test_statuschange");
	

	print_r("\n\n\t"."TOTAL TAST CASES : 08");
	print_r("\n\t"."==========================================================================="."\n\n");	
	*/	
	/* Test Cases Description end*/
		
class User_test extends TestCase {
	
		
	/*
    | Controller - Users | Test Case No.- (01).
    | Test Description - This function will check if the view file loaded.
    | Assertion - assertResponseCode check the http response code.
    */
	public function test_index() {
		$output = $this->request ( 'GET', [ 
				'User',
				'index' 
		] );
		$this->assertResponseCode ( 302 );
	}
	
	/*
    | Controller - Users | Test Case No.- (02).
    | Test Description - This function is use for adding user data into database.
    | Assertion - assertResponseCode will be successfull if http response code is 302.
    */
    
	public function test_addUser() {
		
		$output = $this->request ( 'GET', [ 
				'User',
				'add_user' 
		] );
		$this->assertResponseCode ( 302 );
	
		
	}
	
	/*
    | Controller - Users | Test Case No.- (03).
    | Test Description - This function is use for adding user data into database.
    | Assertion - assertResponseCode will be successfull if http response code is 200.
    */
	
	public function test_add_user_data() {
		
		$output = $this->request ( 'GET', [ 
				'User',
				'add_user_data' 
		] );
		$this->assertResponseCode ( 200 );
	
		
	}
	
	/*
    | Controller - Users | Test Case No.- (04).
    | Test Description - This function is use for updating user profile based on user_id.
    | Assertion - assertResponseCode will be successfull if http response code is equal to 302.
    */
    public function test_editUser() {
		
		$output = $this->request ( 'GET', [ 
				'User',
				'edit_user' 
		],1);
		$this->assertResponseCode ( 302 );
	
		
	}
	
	/*
    | Controller - Users | Test Case No.- (05).
    | Test Description - This function is use for editing user based on user_id.
    | Assertion - assertResponseCode will be successfull if http response code is equal to 200.
    */
    public function test_edit_user_data() {
		
		$output = $this->request ( 'GET', [ 
				'User',
				'edit_user_data' 
		],1);
		$this->assertResponseCode ( 200 );
	
		
	}
	
	/*
    | Controller - Users | Test Case No.- (06).
    | Test Description - This function is for change password.
    | Assertion - assertResponseCode will be successfull if http response code is equal to 302.
    */
    public function test_change_password() {
		
		$output = $this->request ( 'GET', [ 
				'User',
				'change_password' 
		] );
		$this->assertResponseCode ( 302 );
	
		
	}
	
	/*
    | Controller - Users | Test Case No.- (07).
    | Test Description - This function is for change password.
    | Assertion - assertResponseCode will be successfull if http response code is equal to 200.
    */
    public function test_change_password_data() {
		
		$output = $this->request ( 'GET', [ 
				'User',
				'change_password_data' 
		] );
		$this->assertResponseCode ( 200 );
	
		
	}
	
}
?>
