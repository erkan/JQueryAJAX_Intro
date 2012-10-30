<?php
	header("Content-Type : application/json");
	
	if(!isset($_POST['uname'])){
		echo json_encode("uname not defined");
		return;
		
	}
	$username=$_POST['uname'];
	//echo getTemplate(getFullName($username), $username);
	if($fullName=getFullName($username)){
		
		$namesplit=explode(" ", $fullName);
		$person = Person::newPerson($namesplit[0], $namesplit[1], array($username."@emails.com",
		
																		$username."@company.com"));
	 echo json_encode($person);
		
	}
	else {
		
		echo json_encode(false);
	}
	
	
	/**
	 * 
	 */
	class Person {
		public $id;
		public $fname;
		public $lname;
		public $email = array ();
		public $permissions;
		
		public static function newPerson($fname, $lname, $emails)
		{
			$p=new Person();
			$p->id=uniqid();
			$p->fname=$fname;
			$p->lname=$lname;
			$p->email=$emails;
			$p->permissions=new Permissions();
			return $p;
		}
		
	}
	
	/**
	 * 
	 */
	class Permissions  {
		
		public $admin = false;
		public $user = false;
		public $guest = true;
	}
	
	
	
	function getFullName($name){
		$names = array(
			"elanpir"=>"erkan lanpir",
			"glanpir"=>"gurkan lanpir",
			"mfirat"=>"murat firat",
			"tsivri"=>"tubis sivri"
		);
	
		
	
		if(array_key_exists($name,$names))
			return $names[$name];
				else
			    return false;
			
	}	

?>
