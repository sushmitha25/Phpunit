<?php

	/* Test Cases Description start*/
	/*
	 ==============================================================================================
	  NOTE :- Test Case (test_addUserAccount) have some dependent test cases.																				   
	 ==============================================================================================
	*/
		
	/*	
	print_r("\n\n\t"."===========================================================================");
	print_r("\n\t"."DESCRIPTION : User_model.php TEST CASE LIST");
	print_r("\n\t"."===========================================================================");

	print_r("\n\t"."01. test_addUserAccount");
	print_r("\n\t"."02. test_editUserAccount @depends test_addUserAccount");
	print_r("\n\t"."03. test_getUsers");
	print_r("\n\t"."04. test_getUsersForMapping");
	print_r("\n\t"."05. test_getProjectUsers");
	print_r("\n\t"."06. test_getUserById @depends test_addUserAccount");
	print_r("\n\t"."07. test_getusersAll");
	print_r("\n\t"."08. test_getInactiveusersAll");
	print_r("\n\t"."09. test_changeStatus");
	print_r("\n\t"."10. test_Update_Key @depends test_addUserAccount");
	print_r("\n\t"."11. test_getUserDetails_login");
	print_r("\n\t"."12. test_getStatus @depends test_addUserAccount");
	print_r("\n\t"."13. test_updateStatus");
	print_r("\n\t"."14. test_edit_user @depends test_addUserAccount");
	print_r("\n\t"."15. test_getUserIdInArray @depends test_addUserAccount");
	print_r("\n\t"."16. test_insertUserAudit @depends test_addUserAccount");
	print_r("\n\t"."17. test_updateStatusAudit @depends test_addUserAccount");
	print_r("\n\t"."18. test_addFirstUserAudit @depends test_addUserAccount");
	print_r("\n\t"."19. testdeleteuser @depends test_addUserAccount");
	print_r("\n\t"."20. testdeleteuseraudit @depends test_addUserAccount");

	print_r("\n\n\t"."TOTAL TEST CASES : 20");
	print_r("\n\t"."==========================================================================="."\n\n");	
	*/	
	/* Test Cases Description end*/
	
class User_Model_test extends TestCase {
	
	/*
	| Model - User_Model
    | Description - Setting global variables to use it in test_addTenant() functions
    */
	
	protected $password_hash = 'test@1234';
	protected $txtUserFirstName = 'test fname';
	protected $txtUserLastName = 'test lname';
	protected $txtPhoneNo = '0987654321';
	protected $tenant_id = '1';
	protected $txtEmailId = 'testhihello123fgh@trianzsolutions.com';
	protected $rbtnRole = '1';
	protected $txtTitle = 'Test title';
	protected $profile_image = 'no-image.jpg';
	protected $userKey = 'Test user key';
    protected $password = 'test@1234';
	protected $user_firstname = 'test fname';
	protected $user_lastname = 'test lname';
	protected $mobile_num = '0987654321';
	protected $user_email = 'testhihello123fgh@trianzsolutions.com';
	protected $login_name =  'testhihello123fgh@trianzsolutions.com';
	protected $role_id = '1';
	protected $title = 'Test title';
	protected $temp_key ='Test temp key';
	protected $parent_status ='1';
	protected $status='1';
	protected $last_visit ='2017-10-25 05:36:01';
	protected $user_status = '1';

	public function setUp(){
		
		$this->resetInstance();
		$this->CI->load->library('session');
		$this->CI->load->model('User_model');
		$this->obj=$this->CI->User_model;
		$this->db = $this->CI->load->database('default', TRUE);
		$sql = "select tenant_id from tenant";
		$query = $this->db->query($sql);
		$tenant_id = $query->result_array();
	    $ten_id	= $tenant_id[0]['tenant_id'];
		$_SESSION['sess_tenant_id']=$ten_id;
		
		$sql = "select user_id from users where tenant_id=$ten_id";
		$query = $this->db->query($sql);
		$user_id = $query->result_array();
		$usr_id	= $user_id[0]['user_id'];
		$_SESSION['sess_user_id']=$usr_id;
		$_SESSION['sess_project_id']=1;
		$_SESSION['sess_role_id']=1;
	}					
	
	/*
	| Model - User_Model | Test Case No.- (01).
    | Test Description - This function is use for adding user with mandatory fields.
    | Assertion - assertFalse will be false if all mandatory values will be empty.  
    */
    
	public function test_addUserAccount(){
		
		$_POST['txtPassword']='test@1234';
		$_POST['password_hash']=$this->password_hash;
		$_POST['txtUserFirstName']=$this->txtUserFirstName;
		$_POST['txtUserLastName']=$this->txtUserLastName;
		$_POST['txtPhoneNo']=$this->txtPhoneNo;
		$_POST['tenant_id']=$this->tenant_id;
		$_POST['txtEmailId']=$this->txtEmailId;
		$_POST['rbtnRole']=$this->rbtnRole;
		$_POST['txtTitle']=$this->txtTitle;
		$_POST['profile_image']=$this->profile_image;
		$_POST['userKey']=$this->userKey;
		
		$Inserted_User_Id = $this->obj->addUserAccount($_POST);
		if($Inserted_User_Id >= 1){
			$this->assertTrue(true);
		}else{
			$this->fail();
		}
		return $Inserted_User_Id;
	
	}
   
	/*
	| Model - User_Model | Test Case No.- (02).
    | Test Description -  This function is use for editing/updating user with mandatory fields.
    | Assertion - assertEquals will be successful if all called method will return 1.  
    */
    
    /**
     * @depends test_addUserAccount
     */
    
	public function test_editUserAccount($Inserted_User_Id){
		
		$_POST['txtUserFirstName']='Update Fname';
		$_POST['txtUserLastName']=$this->txtUserLastName;
		$_POST['txtPhoneNo']=$this->txtPhoneNo;
		$_POST['tenant_id']=$this->tenant_id;
		$_POST['txtEmailId']=$this->txtEmailId;
		$_POST['rbtnRole']=$this->rbtnRole;
		$_POST['txtTitle']=$this->txtTitle;
		$_POST['profile_image']=$this->profile_image;
		$_POST['hdnOldProfileImg']='no-image.jpg';
		$_POST['hdnRoleId']='3';
		$_POST['hdnUserId']=$Inserted_User_Id;
		$results = $this->obj->editUserAccount($_POST);
        if($results == 1){
			$this->assertTrue(true);
		}else{
			$this->fail();
		}	  
	}
	
	
	/*
	| Model - User_Model | Test Case No.- (03).
    | Test Description - This function is use for get user data based on role_id = '0' OR role_id = '2' OR role_id = '3' and tenant_id( for test case passing 1 by default ) set on session.
    | Assertion - assertEquals will be successful if all called method will return integer which is greater then or equlal to zero.  
    */ 	
	public function test_getUsers(){		
		$users = $this->obj->getUsers();
		if(!empty($users))
		{
			$this->assertTrue(true);
		}
	}
	
	/*
	| Model - User_Model | Test Case No.- (04).
    | Test Description - This function is use for get user data based on role_id=0,user_status=1 and tenant_id( for test case passing 1 by default ) set on session.
    | Assertion - assertEquals will be successful if all called method will return integer which is greater then or equlal to zero.  
    */ 	
	public function test_getUsersForMapping(){		
		$users = $this->obj->getUsersForMapping();
		if(!empty($users))
		{
			$this->assertTrue(true);
		}
	}
	
	/*
	| Model - User_Model | Test Case No.- (05).
    | Test Description - This function is use for get user data based on role_id=0,user_status=1 and tenant_id( for test case passing 1 by default ) set on session.
    | Assertion - assertEquals will be successful if all called method will return integer which is greater then or equlal to zero.  
    */ 	
	public function test_getProjectUsers(){		
		$users = $this->obj->getProjectUsers();
		if(!empty($users)){
		$this->assertTrue(true);
		}		
	}
	/**
     * @depends test_addUserAccount
     */
	/*
	| Model - User_Model | Test Case No.- (06).
    | Test Description - This function is use for get user data based on inserted id
    | Assertion - assertEquals will be successful if all called method will return integer which is greater then or equlal to zero.  
    */ 
    
    
    	
	public function test_getUserById($Inserted_User_Id){		
		$users = $this->obj->getUserById($Inserted_User_Id);
	    if(!empty($users)){
			if($users->user_id == $Inserted_User_Id){
			$this->assertTrue(true);
			}else{
			$this->fail();	
			}
		}else{
		$this->fail();
		}		
	}
	
	/*
	| Model - User_Model | Test Case No.- (07).
    | Test Description - This function is use for get user data based on role_id=0,user_status=1 and tenant_id( for test case passing 1 by default ) set on session.
    | Assertion - assertEquals will be successful if all called method will return integer which is greater then or equlal to zero.  
    */ 	
	public function test_getusersAll(){		
		$users = $this->obj->getusersAll();	
		if(!empty($users))
		{
			$this->assertTrue(true);
		}			
	}
	
	/*
	| Model - User_Model | Test Case No.- (08).
    | Test Description - This function is use for get all inactive user data based on role_id=0(default),user_status=0 and tenant_id( for test case passing 1 by default ) set on session.
    | Assertion - assertEquals will be successful if all called method will return integer which is greater then or equlal to zero.  
    */ 	
	public function test_getInactiveusersAll(){		
		$inactiveusers = $this->obj->getInactiveusersAll();
		$count=0;
		if(!empty($inactiveusers)){
			foreach($inactiveusers as $inactiveuser){
			$count++;	
		}	
		}		
		$this->assertGreaterThanOrEqual('0', $count);
	}
     /*
	| Model - User_Model | Test Case No.- (09).
    | Test Description - This function is use for changing status of user.
    | Assertion - assertEquals will be successful if all called method will return integer value 1.  
    */ 	
     public function test_changeStatus(){		
		$user_status = '0';
		$user_email = $this->txtEmailId;
		$result = $this->obj->changeStatus($user_status,$user_email);
		if(!empty($result)){
			if($result == 1){
			$this->assertTrue(true);
			}else{
			$this->fail();	
			}
		}else{
		$this->fail();
		}
	}
	

	/*
	| Model - User_Model | Test Case No.- (10).
    | Test Description - This function is use for updating user key.
    | Assertion - assertEquals will be successful if all called method will return integer value 1.  
    */ 	
	
	/**
     * @depends test_addUserAccount
     */
		 
	public function test_Update_Key($Inserted_User_Id){
		$userKey = 'Testing key';
		$result = $this->obj->Update_Key($Inserted_User_Id,$userKey);
	    if(!empty($result)){
			if($result== 1){
			$this->assertEquals('1',$result);
			}else{
			$this->fail();	
			}
		}else{
		$this->fail();
		}
		
	}

	

	/*
	| Model - User_Model | Test Case No.- (11).
    | Test Description - This function is use for fetching user data based on user login_name.
    | Assertion - assertNotEmpty will be successful if return result is not empty.  
    */ 
	public function test_getUserDetails_login(){
		$login_name = $this->txtEmailId;
		$results = $this->obj->getUserDetails_login($login_name);
		 if(!empty($results)){
			if($results->login_name == $login_name){
			$this->assertTrue(true);
			}else{
			$this->fail();	
			}
		}else{
		$this->fail();
		}
	}

	/*
	| Model - User_Model | Test Case No.- (12).
    | Test Description - This function is use for geting user current status based on user_id.
    | Assertion - assertNotEmpty will be successful if return result is not empty.  
    */ 
	/**
     * @depends test_addUserAccount
     */
     
    public function test_getStatus($Inserted_User_Id){
		$results = $this->obj->getStatus($Inserted_User_Id);
		 if(!empty($results)){
			if($results[0]->status == 0){
			$this->assertTrue(true);
			}else{
			$this->fail();	
			}
		}else{
		$this->fail();
		}
		
	}
		/**
     * @depends test_addUserAccount
     */
	/*
	| Model - User_Model | Test Case No.- (13).
    | Test Description - This function is use for updating user current status based on user_id.
    | Assertion - assertNotEmpty will be successful if return result is not empty.  
    */ 
	 
	public function test_updateStatus($Inserted_User_Id){		
		$user_status = '1';
		$results = $this->obj->updateStatus($user_status,$Inserted_User_Id);
		 if(!empty($results)){
			if($results == "SUCCESS"){
			$this->assertTrue(true);
			}else{
			$this->fail();	
			}
		}else{
		$this->fail();
		}
	}	

	
	
	
	/**
     * @depends test_addUserAccount
     */
	/*
	| Model - User_Model | Test Case No.- (15).
    | Test Description - This function is to get user details based on user_id.
    | Assertion - assertTrue will be successful if return result is not empty.  
    */ 
	 
	public function test_getUserIdInArray($Inserted_User_Id){
		$results = $this->obj->getUserIdInArray($Inserted_User_Id);
		 if(!empty($results)){
			if($results[0]['user_id'] == $Inserted_User_Id){
			$this->assertTrue(true);
			}else{
			$this->fail();	
			}
		}else{
		$this->fail();
		}
	}
	/**
     * @depends test_addUserAccount
     */
    /*
	| Model - User_Model | Test Case No.- (16).
    | Test Description - This function is used to insert data in to user audit table
    | Assertion - assertFalse will be false if all mandatory values will be empty.  
    */
    
	public function test_insertUserAudit($Inserted_User_Id){		
		$_POST[0]['user_id']=$Inserted_User_Id;
		$_POST[0]['password']=$this->password;
		$_POST[0]['user_firstname']=$this->user_firstname;
		$_POST[0]['user_lastname']=$this->user_lastname;
		$_POST[0]['mobile_num']=$this->mobile_num;
		$_POST[0]['tenant_id']=$_SESSION['sess_tenant_id'];
		$_POST[0]['user_email']=$this->user_email;
		$_POST[0]['login_name']=$this->login_name;
		$_POST[0]['role_id']=$this->role_id;
		$_POST[0]['title']=$this->title;
		$_POST[0]['temp_key']=$this->temp_key;
		$_POST[0]['userKey']=$this->userKey;
		$_POST[0]['status']=$this->status;
		$_POST[0]['parent_status']=$this->parent_status;
		$_POST[0]['last_visit']=$this->last_visit;
		$_POST[0]['user_status']=$this->user_status;
		$results = $this->obj->insertUserAudit($_POST);
		
		if($results == 1){
			$this->assertTrue(true);
		}else{
			$this->fail();
		}
	
	}
	/**
     * @depends test_addUserAccount
     */
	/*
	| Model - User_Model | Test Case No.- (17).
    | Test Description - This function is used to insert data in to user audit table
    | Assertion - assertFalse will be false if all mandatory values will be empty.  
    */
    
	public function test_updateStatusAudit($Inserted_User_Id){		
		$results = $this->obj->updateStatusAudit('1',$Inserted_User_Id);
		 if(!empty($results)){
			if($results == "SUCCESS"){
			$this->assertTrue(true);
			}else{
			$this->fail();	
			}
		}else{
		$this->fail();
		}
	}
	/**
     * @depends test_addUserAccount
     */
	/*
	| Model - User_Model | Test Case No.- (18).
    | Test Description - This function is use for adding user with mandatory fields.
    | Assertion - assertFalse will be false if all mandatory values will be empty.  
    */
    
	public function test_addFirstUserAudit($Inserted_User_Id){		
		$_POST['txtPassword']='test@1234';
		$_POST['password_hash']=$this->password_hash;
		$_POST['txtUserFirstName']=$this->txtUserFirstName;
		$_POST['txtUserLastName']=$this->txtUserLastName;
		$_POST['txtPhoneNo']=$this->txtPhoneNo;
		$_POST['tenant_id']=$this->tenant_id;
		$_POST['txtEmailId']=$this->txtEmailId;
		$_POST['rbtnRole']=$this->rbtnRole;
		$_POST['txtTitle']=$this->txtTitle;
		$_POST['profile_image']=$this->profile_image;
		$_POST['userKey']=$this->userKey;
		//$_POST['id']=$Inserted_User_Id;
		
		$Inserted_Useraudit_Id = $this->obj->addFirstUserAudit($_POST,$Inserted_User_Id);
		if($Inserted_Useraudit_Id >= 1){
			$this->assertTrue(true);
		}else{
			$this->fail();
		}
	
	}
	/**
     * @depends test_addUserAccount
     */
	/* | Model - Task_Model_azure | Test Case No.- (19).
    | Test Description - This function is to delete the data inserted into user table
    | Assertion - assertTrue will be true if it return proper value from project table with status = 1
    */
	public function testdeleteuser($Inserted_User_Id){
		$sql = "delete from  users where user_id=$Inserted_User_Id";
		$query = $this->db->query($sql);
		$row = $this->db->affected_rows();
		if($row == 1){
			$this->assertTrue(true);
		}else{
			 $this->fail();
		}
	}
	/**
     * @depends test_addUserAccount
     */
	/* | Model - Task_Model_azure | Test Case No.- (20).
    | Test Description - This function is to delete the data inserted intouser audit table
    | Assertion - assertTrue will be true if it return proper value from project table with status = 1
    */
	public function testdeleteuseraudit($Inserted_User_Id){
		$sql = "delete from  user_audit where user_id=$Inserted_User_Id";
		$query = $this->db->query($sql);
		$row = $this->db->affected_rows();
		if($row == 3){
			$this->assertTrue(true);
		}else{
			 $this->fail();
		}
	}
	/*
	| Model - User_Model | Test Case No.- (14).
    | Test Description - This function is check login user.
    | Assertion -  assertNotEmpty will be successful if return result is not empty.  
    */ 
	
	/**
     * @depends test_addUserAccount
     */
     
	
 /*	public function test_edit_user($Inserted_User_Id){	
	
		$_POST['user_email']='test@axonnetworks.com';
		$_POST['userKey']='test';
		$_POST['user_id']=$Inserted_User_Id;
		$results = $this->obj->edit_user($_POST);
	    if($results == 1){
			$this->assertTrue(true);
		}else{
			$this->fail();
		}
	}*/
}