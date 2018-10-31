<?php

	/* Test Cases Description start*/
	/*
	 ==============================================================================================
	  NOTE :- Test Case no.03 (test_addUserAccount) have some dependent test cases.																				   
	 ==============================================================================================
	*/
		
	/*	
	print_r("\n\n\t"."===========================================================================");
	print_r("\n\t"."DESCRIPTION : User_model.php TEST CASE LIST");
	print_r("\n\t"."===========================================================================");

	print_r("\n\t"."01. test_getUserDetails");
	print_r("\n\t"."02. test_getUser");
	print_r("\n\t"."03. test_changeStatus");
	print_r("\n\t"."04. test_Update_Key");
	print_r("\n\t"."05. test_getUserDetails_login");
	print_r("\n\t"."06. test_edit_user");
	
	print_r("\n\n\t"."TOTAL TEST CASES : 06");
	print_r("\n\t"."==========================================================================="."\n\n");	
	*/	
	/* Test Cases Description end*/
	
class Login_Model_test extends TestCase {
	
	/*
	| Model - Login_Model
    | Test Description - This function is to setup login model
    */
	
	public function setUp(){
		
		$this->resetInstance();
		$this->CI->load->library('session');
		$this->CI->load->model('Login_model');
		$this->obj=$this->CI->Login_model;
		$_SESSION['sess_tenant_id']=1;
		$_SESSION['sess_user_id']=1;
		$_SESSION['sess_project_id']=1;	
	}	
	
	/*
	| Model - User_Model | Test Case No.- (01).
    | Test Description - This function is use for get users details with a given user_id
    | Assertion - assertEquals will be successful if all called method will return proper result
    */ 	
	public function test_getUserDetails(){		
		$user_id = '1';
		$users = $this->obj->getUserDetails($user_id);
		if(!empty($users))
		{
			$this->assertTrue(true);
		}
	}
	
	/*
	| Model - User_Model | Test Case No.- (02).
    | Test Description - This function is use for get users 
    | Assertion - assertEquals will be successful if all called method will return proper result
    */ 	
	public function test_getUser(){
		$users = $this->obj->getUser();
		if(!empty($users))
		{
			$this->assertTrue(true);
		}
	}
	
	/*
	| Model - User_Model | Test Case No.- (03).
    | Test Description - This function is use for changing status of user.
    | Assertion - assertEquals will be successful if all called method will return integer value 1.  
    */ 	
	public function test_changeStatus(){		
		$user_status = '1';
		$user_email = 'test1234@gmail.com';
		$result = $this->obj->changeStatus($user_status,$user_email);
		$result=(string)$result;
		$this->assertRegExp('/[0-1]/',$result);
	}

	/*
	| Model - User_Model | Test Case No.- (04).
    | Test Description - This function is use for updating user key.
    | Assertion - assertEquals will be successful if all called method will return integer value 1.  
    */ 	
		 
	public function test_Update_Key(){
		$userKey = 'Testing key';
		$result = $this->obj->Update_Key(1,$userKey);
		$this->assertEquals('1',$result);
	}

	/*
	| Model - User_Model | Test Case No.- (05).
    | Test Description - This function is use for fetching user data based on user login_name.
    | Assertion - assertNotEmpty will be successful if return result is not empty.  
    */ 
	public function test_getUserDetails_login(){		
		$login_name = "admin@axonnetworks.com";
		$results = $this->obj->getUserDetails_login($login_name);
		$this->assertNotEmpty($results->login_name);
	}

	
	/*
	| Model - User_Model | Test Case No.- (06).
    | Test Description - This function is update login user.
    | Assertion -  assertNotEmpty will be successful if return result is not empty.  
    */ 
	
	
	public function test_edit_user(){		
		$_POST['user_email']='test@axonnetworks.com';
		$_POST['userKey']='test';
		$_POST['user_id']='15';
		$results = $this->obj->edit_user($_POST);
		$this->assertTrue(true);
	}
	

	
}
