<?php

	/* Test Cases Description start*/
	/*
	 ==============================================================================================
	  NOTE :- except 9 all test cases are dependent test cases																			   
	 ==============================================================================================
	*/
		
	/*	
	print_r("\n\n\t"."===========================================================================");
	print_r("\n\t"."DESCRIPTION : Project_model.php TEST CASE LIST");
	print_r("\n\t"."===========================================================================");

	print_r("\n\t"."01. testadd_Project");
	print_r("\n\t"."02. testgetProjectById depends @testadd_Project");
	print_r("\n\t"."03. testgetProjectByTenantId depends @testadd_Project");
	print_r("\n\t"."04. testgetProjects depends @testadd_Project");
	print_r("\n\t"."05. testUpdateProject depends @testadd_Project");
	print_r("\n\t"."06. testgetStatusById depends @depends @testadd_Project");
	print_r("\n\t"."07. testUpdateStatus depends @testadd_Project");
	print_r("\n\t"."08. testupdateStatusaudit depends @testadd_Project");
	print_r("\n\t"."09. testgetActions");
	print_r("\n\t"."10. testaddMapping depends @testadd_Project");
	print_r("\n\t"."11. testUpdateMapping depends @testadd_Project");
	print_r("\n\t"."12. testupdateMappingStatus depends @testadd_Project");
	print_r("\n\t"."13. testCheckExistingUser depends @testadd_Project");
    print_r("\n\t"."14. testgetMappingById depends @testadd_Project");
	print_r("\n\t"."15. testdeactivate_projects depends @testadd_Project");
	print_r("\n\t"."16. testgetProjectByIdInArray depends @testadd_Project");
	print_r("\n\t"."17. testinsertProjectAudit depends @testadd_Project");
	print_r("\n\t"."18. testupdateProjectTaskStatusaudit depends @testadd_Project");
	print_r("\n\t"."19. testinsertAddProjectAudit depends @testadd_Project");
	print_r("\n\t"."20. testgetProjectsactiveninactive depends @testadd_Project ");
	print_r("\n\t"."21. testdeleteadd_project depends @testadd_Project");
	print_r("\n\t"."22. testdeleteproject_user_mapping depends @testadd_Project");
	print_r("\n\t"."23. testdeleteproject_audit depends @testadd_Project");
	
	print_r("\n\n\t"."TOTAL TEST CASES : 23");
	print_r("\n\t"."==========================================================================="."\n\n");	
	*/	
	/* Test Cases Description end*/
  	
class Project_model_test extends TestCase {
	
	/*
	| Model - Project_Model
    | Description - Setting global variables to use it in testCreateProject() functions
    */
	
	protected $txtProjectName = 'Testcase for Project';
  	protected $areDescription = 'Test Description';
  	protected $ddlCloud = 'AWS';
  	protected $txtEmailId =  'test@axonnetworks.com';
  	protected $txtAccessKeyId = 'Test Credentions Dummy Key';
  	protected $txtSecretAccessKey = 'Test credentials secret key';
	protected $name = 'Testcase for Project audit';
	protected $description = 'Test Description';
	protected $cloud_type = 'AWS';
	protected $email = 'test@axonnetworks.com';
	protected $tenant_id='3';
	protected $status = '1';
	protected $credentials_key = 'Test Credentions Dummy Key';
	protected $credentials_secret = 'Test credentials secret key';

	/*
	| Model - Project_Model
    | Test Description - This function is to setup project model
    */

    public function setUp(){
        $this->resetInstance();
		$this->CI->load->library('session');
        $this->CI->load->model('Project_model');
        $this->obj=$this->CI->Project_model;
		$this->db = $this->CI->load->database('default', TRUE);
		$sql = "select tenant_id from tenant";
		$query = $this->db->query($sql);
		$tenantres = $query->result_array();
	    $ten_id	= $tenantres[0]['tenant_id'];
		$_SESSION['sess_tenant_id']=$ten_id;
		
		$sql = "select user_id from users where tenant_id=$ten_id";
		$query = $this->db->query($sql);
		$user_id = $query->result_array();
		$usr_id	= $user_id[0]['user_id'];
		$_SESSION['sess_user_id']=$usr_id;
		$_SESSION['sess_role_id']=1;
    }
    
      
    /*
    | Model - Project_Model | Test Case No.- (01).
    | Test Description - This function is to get insert values in project table
    | Assertion - assertTrue will be true if all values will insert into project table properly
    */
    
    public function testadd_Project() {
		$_POST['txtProjectName']=$this->txtProjectName;
		$_POST['areDescription']=$this->areDescription;
		$_POST['ddlCloud']=$this->ddlCloud;
		$_POST['txtEmailId']=$this->txtEmailId;
		$_POST['txtAccessKeyId']=$this->txtAccessKeyId;
		$_POST['txtSecretAccessKey']=$this->txtSecretAccessKey;
		$insert_project_id = $this->obj->add_Project($_POST);
        if($insert_project_id >= 1){	
		   $this->assertTrue(true);
		}else{
		   $this->fail();
		}
		return $insert_project_id;    
    }
    /**
    * @depends testadd_Project
    */
	
    /*
    | Model - Project_Model | Test Case No.- (02).
    | Test Description - This function is to get project by project id from project table
    | Assertion - assertTrue will be true if it return proper value from project table with given project id
    */
	
	public function testgetProjectById($project_id){	
        $results = $this->obj->getProjectById($project_id);
        if(!empty($results)){
			if($results->project_id == $project_id ){
				$this->assertTrue(true);
			}else{
				$this->fail();
			}
		}		
	}
     /**
    * @depends testadd_Project
    */
	
    /*
    | Model - Project_Model | Test Case No.- (03).
    | Test Description - This function is to get project by tenant id from project table
    | Assertion - assertTrue will be true if it return proper value from project table 
    */
	
	public function testgetProjectByTenantId($project_id){	
	    $tenant_id=$_SESSION['sess_tenant_id'];
        $results = $this->obj->getProjectByTenantId($tenant_id);
		    if(!empty($results)){
			foreach($results as $result){
				if($result->project_id == $project_id){
					$this->assertTrue(true);
				}
			}	
	    }else{
			$this->fail();
		}
	}
    /**
    * @depends testadd_Project
    */
    /*
    | Model - Project_Model | Test Case No.- (04).
    | Test Description - This function is to get all projects whose status = 1 from project table
    | Assertion - assertTrue will be true if it return proper value from project table
    */
	
	public function testgetProjects($project_id){
        $results = $this->obj->getProjects();
		 if(!empty($results)){
			foreach($results as $result){
				if($result->project_id == $project_id){
					$this->assertTrue(true);
				}
			}	
	    }else{
			$this->fail();
		}
    }
	 /**
     * @depends testadd_Project
     */
    /*
    | Model - Project_Model | Test Case No.- (05).
    | Test Description - This function is to update values in project table
    | Assertion - assertTrue will be true if all values will update into project table properly against the return id from testCreateProject() function
    */
    
    public function testUpdateProject($project_id){
    	$_POST['txtProjectName']='Update Project Name';
		$_POST['areDescription']='Description Updated';
		$_POST['ddlCloud']=$this->ddlCloud;
		$_POST['txtEmailId']=$this->txtEmailId;
		$_POST['txtAccessKeyId']=$this->txtAccessKeyId;
		$_POST['txtSecretAccessKey']=$this->txtSecretAccessKey;
		$_POST['hdnProjectId']= $project_id;
		$results = $this->obj->UpdateProject($_POST);
		if($results == '1'){
		  $this->assertTrue(true);
		}else{
		  $this->fail();	
		}
    }
	/**
     * @depends testadd_Project
     */
     /*
    | Model - Project_Model | Test Case No.- (06).
    | Test Description - This function is to get all projects whose status = 1 from project table
    | Assertion - assertTrue will be true if it return proper value from project table
    */
	public function testgetStatusById($project_id){
        $results = $this->obj->getStatusById($project_id);
        if(!empty($results)){
			foreach($results as $result){
				if($result->status == '1'){
					$this->assertTrue(true);
				}else{
					$this->fail();	
				}
			}
		}else{
			$this->fail();
		}
    }
	/**
     * @depends testadd_Project
     */
    /*
    | Model - Project_Model | Test Case No.- (07).
    | Test Description - This function is to update status in project table against project id 
    | Assertion - assertTrue will be true if it update status in project table 
    */
	public function testUpdateStatus($project_id){
		$results = $this->obj->updateStatus(0,$project_id);
	    if($results == "SUCCESS"){
		  $this->assertTrue(true);
		}else{
		  $this->fail();
		}
	}
	
	/**
     * @depends testadd_Project
     */
    /*
    | Model - Project_Model | Test Case No.- (08).
    | Test Description - This function is to insert data in project audit table
    | Assertion - assertTrue will be true if it update status in project table 
    */
	public function testupdateStatusaudit($project_id){
		$results = $this->obj->updateStatusaudit(1,$project_id);
	    if($results == "SUCCESS"){
		  $this->assertTrue(true);
		}else{
		  $this->fail();
		}
	}
	/*
    | Model - Project_Model | Test Case No.- (09).
    | Test Description - This function is to select data from action table
    | Assertion - assertTrue will be true if it update status in project table 
    */
	public function testgetActions(){
		$results = $this->obj->getActions();
		if(!empty($results)){
			foreach($results as $result){
				if($result->action_id == '1'){
					$this->assertTrue(true);
				}
			}
		}else{
			$this->fail();
		}
		
	}
	/**
    * @depends testadd_Project
    */
	/* | Model - Project_model | Test Case No.- (10).
    | Test Description - This function is to add projects in to mapping table
    | Assertion - assertTrue will be true if it return proper value from project table 
    */
	public function testaddMapping($id){
		$_POST['ddlProject']=$id;
		$_POST['UserId']='1';
		$_POST['add_act']=array(                      
                'add_act' => 1,
            );
		$_POST['edit_act']=array(                     
                'edit_act' => 1,
            );
		$_POST['delete_act']=array(                      
                'delete_act' => 1,
            );
		$_POST['ddlUser']=array(                     
                'ddlUser' => 1,
            );
		$insert_project_mappingid = $this->obj->addMapping($_POST);
		if($insert_project_mappingid == 1){
		  $this->assertTrue(true);
		}else{
		  $this->fail();
		}
		
	}
	
	/**
    * @depends testadd_Project
    */
	/* | Model - Project_model | Test Case No.- (11).
    | Test Description - This function is to add projects in to mapping table
    | Assertion - assertTrue will be true if it return proper value from project table 
    */
	public function testUpdateMapping($id){
		$sql = "select proj_usermap_id from  project_user_mapping where project_id='$id'";
		$query = $this->db->query($sql);
		$proj_usermap_id = $query->result_array();
		$_POST['hdnMappingId']= $proj_usermap_id[0]['proj_usermap_id'];
		$_POST['add_act']=array(                      
                'add_act' => 1,
        );
	    $_POST['edit_act']=array(                     
                'edit_act' => 1,
            );
	    $_POST['delete_act']=array(                      
                'delete_act' => 1,
            );
	    $_POST['ddlUser']=array(                     
                'ddlUser' => 1,
            );
	    $insert_project_mappingid = $this->obj->UpdateMapping($_POST);
	    if($insert_project_mappingid == 1){
		  $this->assertTrue(true);
	    }else{
		  $this->fail();
	    }
	}
	/**
    * @depends testadd_Project
    */
	/* | Model - Project_model | Test Case No.- (12).
    | Test Description - This function is to update project mapping status in  mapping table
    | Assertion - assertTrue will be true if it return proper value from project table 
    */
	public function testupdateMappingStatus($id){
		$sql = "select proj_usermap_id from  project_user_mapping where project_id='$id'";
		$query = $this->db->query($sql);
		$proj_usermap_id = $query->result_array();
		$proj_mapid= $proj_usermap_id[0]['proj_usermap_id'];
		$update_project_statusmapping = $this->obj->updateMappingStatus('1',$proj_mapid);
		if($update_project_statusmapping == "SUCCESS"){
			  $this->assertTrue(true);
		}else{
			  $this->fail();
		}
		
	}
	/**
    * @depends testadd_Project
    */
	/* | Model - Project_model | Test Case No.- (13).
    | Test Description - This function is to get mapping id mapping table
    | Assertion - assertTrue will be true if it return proper value from project table 
    */
	public function testCheckExistingUser($id){
		$sql = "select proj_usermap_id,tenant_id,user_id,project_id from  project_user_mapping where project_id='$id'";
		$query = $this->db->query($sql);
		$proj_mappingid = $query->result_array();
		
		$proj_mapid=$proj_mappingid[0]['proj_usermap_id'];
		$tenant_id=$proj_mappingid[0]['tenant_id'];
		$user_id=$proj_mappingid[0]['user_id'];
		$project_id=$proj_mappingid[0]['project_id'];
		$_POST['ddlUser']=array($user_id=>$user_id );
		$_POST['tenant_id']=$tenant_id;
		$_POST['ddlProject']=$project_id;
		
		$totalrowfetched = $this->obj->CheckExistingUser($_POST);
		if($totalrowfetched == 0){
			$this->assertTrue(true);
		}else{
			$this->fail();
	    }
	}
	/**
    * @depends testadd_Project
    */
	/* | Model - Project_model | Test Case No.- (14).
    | Test Description - This function is to get mapping id mapping table
    | Assertion - assertTrue will be true if it return proper value from project table 
    */
	public function testgetMappingById($id){
		$sql = "select proj_usermap_id from  project_user_mapping where project_id='$id'";
		$query = $this->db->query($sql);
		$proj_mappingid = $query->result_array();
		$proj_mapid=$proj_mappingid[0]['proj_usermap_id'];
	    $project_mappingid = $this->obj->getMappingById($proj_mapid);
		if(!empty($project_mappingid)){
			if($project_mappingid->tenant_id == $_SESSION['sess_tenant_id']){
				$this->assertTrue(true);
			}else{
				$this->fail();
			}
		}
	}
	/**
    * @depends testadd_Project
    */
	/* | Model - Project_model | Test Case No.- (15).
    | Test Description - This function is to deactiavte the project
    | Assertion - assertTrue will be true if it return proper value from project table
    */
	public function testdeactivate_projects($id){
		$result = $this->obj->deactivate_projects('0',$id);
		if($result == "SUCCESS"){
			$this->assertTrue(true);
		}else{
			$this->fail();
		}
	}
	/**
    * @depends testadd_Project
    */
	/* | Model - Project_model | Test Case No.- (16).
    | Test Description - This function is to get all data from the project
	based on the project_id
    | Assertion - assertTrue will be true if it return proper value from project table 
    */
	public function testgetProjectByIdInArray($id){
		$results = $this->obj->getProjectByIdInArray($id);
		if(!empty($results)){
			if($results[0]['project_id'] == $id){
				$this->assertTrue(true);
			}else{
				$this->fail();
			}
	    }
	}
    
	/**
    * @depends testadd_Project
    */
	/* | Model - Project_model | Test Case No.- (17).
    | Test Description - This function is to insert data in to  project audit table
	based on the project_id
    | Assertion - assertTrue will be true if it return proper value from project table 
    */
	public function testinsertProjectAudit($id){
	    $_POST['project_id']=$id;
        $_POST['name']=$this->name;
        $_POST['description']=$this->description;
	    $_POST['cloud_type']=$this->cloud_type;
		$_POST['email']=$this->email;
		$_POST['tenant_id']=$this->tenant_id;
		$_POST['status']=$this->status;
		$_POST['credentials_key']=$this->credentials_key;
		$_POST['credentials_secret']=$this->credentials_secret;
		$results = $this->obj->insertProjectAudit($_POST);
		if($results == 1){
			$this->assertTrue(true);
		}else{
			$this->fail();
		}
	    
	}
    /**
    * @depends testadd_Project
    */
	/* | Model - Project_model | Test Case No.- (18).
    | Test Description - This function is to insert data in to  task audit table
	based on the project_id
    | Assertion - assertTrue will be true if it return proper value from task table 
    */
	public function testupdateProjectTaskStatusaudit($id){
		$results = $this->obj->updateProjectTaskStatusaudit('1',$id,'1');
		if($results == 'SUCCESS'){
			$this->assertTrue(true);
		}else{
			$this->fail();
		}
	    
	}
   /**
    * @depends testadd_Project
    */
	/* | Model - Project_model | Test Case No.- (19).
    | Test Description - This function is to insert data in to  project audit table
	based on the project_id
    | Assertion - assertTrue will be true if it return proper value from project table 
    */
	public function testinsertAddProjectAudit($id){
	    $_POST['project_id']=$id;
        $_POST['txtProjectName']=$this->txtProjectName;
        $_POST['areDescription']=$this->areDescription;
	    $_POST['ddlCloud']=$this->ddlCloud;
		$_POST['txtEmailId']=$this->txtEmailId;
		$_POST['txtAccessKeyId']=$this->txtAccessKeyId;
		$_POST['txtSecretAccessKey']=$this->txtSecretAccessKey;
		$results = $this->obj->insertAddProjectAudit();
		if($results == '1'){
			$this->assertTrue(true);
		}else{
			$this->fail();
		}  
	}
     /**
    * @depends testadd_Project
    */
	/* | Model - Project_model | Test Case No.- (20).
    | Test Description - This function is to select data in to  project a
	based on the project_id
    | Assertion - assertTrue will be true if it return proper value from project table 
    */
	public function testgetProjectsactiveninactive($id){
		$results = $this->obj->getProjectsactiveninactive();
		if(!empty($results)){
			foreach($results as $result){
				if($result->project_id == $id){
				$this->assertTrue(true);
				}
			}
		}else{
			$this->fail();
		}
	    
	}
	
	/**
    * @depends testadd_Project
    */
	/* | Model - Project_model | Test Case No.- (22).
    | Test Description - This function is to delete the data inserted into project_user_mapping table
    | Assertion - assertTrue will be true if it return proper value from project table with status = 1
    */
	public function testdeleteproject_user_mapping($id){
		$sql = "delete from  project_user_mapping where project_id=$id";
		$query = $this->db->query($sql);
		$row = $this->db->affected_rows();
		if($row == 1){
			$this->assertTrue(true);
		}else{
			$this->fail();
		}
	}
	/**
    * @depends testadd_Project
    */
	/* | Model - Project_model_azure | Test Case No.- (23).
    | Test Description - This function is to delete the data inserted into project_audit table
    | Assertion - assertTrue will be true if it return proper value from project table with status = 1
    */
	public function testdeleteproject_audit($id){
		$sql = "delete from  project_audit where project_id=$id";
		$query = $this->db->query($sql);
		$row = $this->db->affected_rows();
		if($row == 3){
			$this->assertTrue(true);
		}else{
			 $this->fail();
		}
		
	}
	/**
    * @depends testadd_Project
    */
	/* | Model - Project_model | Test Case No.- (21).
    | Test Description - This function is to delete the data inserted into project_azure table
    | Assertion - assertTrue will be true if it return proper value from project table 
    */
	public function testdeleteadd_project($id){
		$sql = "delete from  project where project_id=$id";
		$query = $this->db->query($sql);
		$row = $this->db->affected_rows();
		if($row == 1){
			$this->assertTrue(true);
		}else{
			 $this->fail();
		}
		
	}
	
}
?>
