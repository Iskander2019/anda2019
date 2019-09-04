
 <?php
	$Par2=0;

$Name_BD="uzlov_temio";
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

		$row=array();
		$arr=array();

	$mysqli = new mysqli("localhost", $Name_polzov, $Parol_BD, $Name_BD);
	if ($mysqli->connect_errno)
	{
    echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}

	// ***************																																																			Создание Осн таблиц :	"General_State_Devices",  "Cabinets",	"Event";			
				
				{													
//                      ******************************************************************************************созд  General_State_Devices			
	//			$Name_Table="Obobsch_Sost_sign";
					$Name_Table="tasks";	
//				$Name_Table="General_State_Devices";	
					$query = "create table ".$Name_Table."( id int not null primary key auto_increment, name_user char(150), e_mail char(30), task varchar(400), done char(2), edit_admin char(2)) charset utf8";

//				$query = "create table ".$Name_Table." (id int not null primary key auto_increment, name_device char(20), firm_number char(15), version_po char(20), updated_time TIMESTAMP, clb_time TIMESTAMP, time_int int(10), name_object char(50), state int(2), on_off int(1), type_device int(2), passwrd char(8), nick  char(40)) charset utf8"; // таблица с именем кабинета (nick)
			// Kabinet =0 - не подключен к кабинету, если  > 0 - Сигн подключен к кабинету
		//		echo $query;
				$err=mysqli_query($mysqli, $query);
					if(!$err) {echo "Не удалось создать таблицу: ".$Name_Table;}
						else {echo "Таблица создана - ".$Name_Table;}		
						echo "<br>";
//                      ******************************************************************************************созд  табл CABINETS			
					$Name_Table="Cabinets";
					$query = "create table ".$Name_Table." (id int not null primary key auto_increment,  time_registracii TIMESTAMP,  surname varchar(200), name varchar(200), name_work  varchar(400), place_location varchar(1000), tlf CHAR(15), e_mail char(30), login char(30), password char(50)) charset utf8";
					$err=mysqli_query($mysqli, $query);
					if(!$err) {echo "Не удалось создать таблицу: ".$Name_Table;}
						else {echo "Таблица создана - ".$Name_Table;}		
					echo "<br>";
//***********************************************************************************************************	созд  табл EVENTS	
						$Name_Table="Events";	
 				$query = "create table ".$Name_Table." (id_Device char(20), number_sub_Device char(4),  state_sub_Device char(30), date_time_event TIMESTAMP, acknowledged char(2), date_time_asknow TIMESTAMP, notes_asknow varchar(300)) charset utf8";			
				$err=mysqli_query($mysqli, $query);
				if(!$err) {echo "Не удалось создать таблицу: ".$Name_Table;}
					else {echo "Таблица создана - ".$Name_Table;}	
				echo "<br>";
// ***********************************************************************************************************   Создание таблицы Name_Events  
					$Name_Table="Name_Events";	
					$query = "create table ".$Name_Table." (id int not null primary key auto_increment, date_create_record TIMESTAMP, name_event varchar(300)) charset utf8";			
					$err=mysqli_query($mysqli, $query);
					if(!$err) {echo "Не удалось создать таблицу: ".$Name_Table;}
						else {echo "Таблица создана - ".$Name_Table;}	
					echo "<br>";	
	//********************************************************************************************************** Создание таблицы с типами подключенного оборудования 				
					$Name_Table="Names_Devices";	
					$query = "create table ".$Name_Table." (id int not null primary key auto_increment, date_create_record TIMESTAMP, names_Devices varchar(300)) charset utf8";			
					$err=mysqli_query($mysqli, $query);
					if(!$err) {echo "Не удалось создать таблицу: ".$Name_Table;}
						else {echo "Таблица создана - ".$Name_Table;}	
					echo "<br>";	
				}		
		mysqli_close($mysqli); 	

?>
