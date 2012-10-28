<?php
	
	if(!isset($_GET['uname'])){
		echo "uname not defined";
		return;
		
	}
	$username=$_GET['uname'];
	echo getTemplate(getFullName($username), $username);
	
	 function getTemplate($name,$username)
	{
		return '<div class="box"><h1>'.$name.'</h1>
				<div class="meta">username: '.$username.'</div>	
		        </div>';
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
			
			    return "username not found";
			
	}	

?>
