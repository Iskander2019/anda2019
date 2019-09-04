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
		if(isset($_POST["Login"]))		$Login=$_POST["Login"];
		if(isset($_POST["Password"]))		$Password=$_POST["Password"];
		setcookie('Login', $Login, time()+5000);
		setcookie('Password', $Password, time()+5000);			
	
	//		if(isset($_COOKIE['Login'])) 			$Login=$_COOKIE['Login'];
//			if(isset($_COOKIE['Password'])) 
//				{
//			$Password=$_COOKIE['Password'];
//			$Cook_is=true;				
//				}
		//if($Cook_is==false)
//		{	}

	$mysqli = new mysqli("localhost", $Name_polzov, $Parol_BD, $Name_BD);
	if ($mysqli->connect_errno)
 		{;}
	else 	
 		{												 
			$i=0;
			$Name_Table="Cabineti";
			$query = "check table $Name_Table";							// Проверка наличия таблицы Кабинеты;
			$result=mysqli_query($mysqli, $query);			
			$row=mysqli_fetch_row($result);				
			if ($row[3]=="OK")
			{																									// Такая табл есть
	//			echo "666";
				$query="select * from $Name_Table where login='$Login' and password='$Password' ";
				$result=mysqli_query($mysqli, $query);	
				$row=mysqli_fetch_row($result);
				$tt=$row[8];
			 	if($row[8]=="") $Out[0]="No";				
				else
				{
					if($row[8]==$Login && $row[9]==$Password)
					{					
						$Out[0]="Yes";		
						$Out[1]=$row[2];	
						$Out[2]=$row[0];															// id
						$Out[3]=$row[7];															// E_Mail как имя клиента
						setcookie('Password', $Password, time()+5000);			
					}
					else
						$Out[0]="No";																																//  в доступе отказано
				}
			}
		}		
		echo 	json_encode($Out);			
		

?>