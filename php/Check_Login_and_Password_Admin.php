<?php
// Читать файл
	$f = fopen("Podkl.txt", "rt") or die("Ошибка!");
		for ($i=0; $data=fgetcsv($f,50,";"); $i++) 
			{
  				$num = count($data); 
  				for ($c=0; $c<$num; $c++)  
					$Parol_BD=$data[0];
					$Name_polzov=$data[1];
			}
		fclose($f);
		if($Parol_BD=="-1") 
			$Parol_BD="";

//  *************************   Конец чтения файла
	$Cook_is=false;
	$row=array();
	$Out= array();
	$Name_BD="uzlov_temio";
																					// ******************************************************************** Начало  **********************************
	if(isset($_POST["Login"]))			$Login=$_POST["Login"];
	if(isset($_POST["Password"]))	
	{
		$Password=$_POST["Password"];
	}
	else
	{
			if(isset($_COOKIE['Login_Admin'])) 			$Login=$_COOKIE['Login_Admin'];
			if(isset($_COOKIE['Password_Admin'])) 
				{		
					$Password=$_COOKIE['Password_Admin'];
					$Cook_is=true;				
				}
	}

	if($Cook_is==false)
		{
			setcookie('Login_Admin', $Login, time()+5000);
			setcookie('Password_Admin', $Password, time()+5000);			
		}
					
	$mysqli = new mysqli("localhost", $Name_polzov, $Parol_BD, $Name_BD);
	if ($mysqli->connect_errno)
 		{;}
	else 	
 		{												 
//			echo "000000";
			$i=0;
			$Name_Table="admin";
			$query = "check table $Name_Table";						
			$result=mysqli_query($mysqli, $query);			
			$row=mysqli_fetch_row($result);				
			if ($row[3]=="OK")
			{	
																	
				$query="select * from $Name_Table";
				$result=mysqli_query($mysqli, $query);	
				$row=mysqli_fetch_row($result);
				if($row[0]==$Login && $row[1]==$Password)
					$Access=1;																																// 1 - Доступ есть
				else
					$Access=0;																																// 0  - в доступе отказано
			}
		}
		
		$Out[0]=$Access;
		echo 	json_encode($Out);			
		

?>