
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
	if(isset($_POST['sost'])){$Par2=$_POST['sost'];
	echo $Par2;}


if($Par2>0){
	$mysqli = new mysqli("localhost", $Name_polzov, $Parol_BD, $Name_BD);
	if ($mysqli->connect_errno)
	{
    echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}
	else{		
			if($Par2==1){
				$Name_Table	= "sost_d_varta";
				$query = "create table ". $Name_Table. " (vremj datetime, N_Dat INT, Sost char(15)) charset utf8";
				$err=mysqli_query($mysqli, $query);
				if(!$err) {echo "Не удалось создать таблицу 1";}
				else {echo "Таблица создана - ".$Name_Table;}	
							}
						}
						
			if($Par2==2){
				$Name_Table="Sost_signra";
				$query = "create table ".$Name_Table." (N_s int(3), N_d int(3), vremj TIMESTAMP, Sost char(10), kvtr char(15) , prim char(60)) charset utf8";
				
				$err=mysqli_query($mysqli, $query);
				if(!$err) {echo "Не удалось создать таблицу 2";}
				else {echo "Таблица создана - ".$Name_Table;}			
									}		
				
				if($Par2==3){													// ОБОБЩЕННАЯ ТАБЛИЦА ВСЕХ  СИГНАЛИЗАТОРОВ 
				$Name_Table="Obobsch_Sost_sign";	
				$query = "create table ".$Name_Table." (id int not null primary key auto_increment, name_prib char(20), ser_nom bigint(18), versij_po char(20), obnovl_time TIMESTAMP, clb_time TIMESTAMP, time_int int(10), name_obj char(50), sost int(2), vkl_otkl int(1), type_prib int(2), nick  char(40)) charset utf8"; // таблица с именем кабинета (nick)
			// Kabinet =0 - не подключен к кабинету, если  > 0 - Сигн подключен к кабинету
				echo $query;
				$err=mysqli_query($mysqli, $query);
					if(!$err) {echo "Не удалось создать таблицу Обобщенного состояния С";}
//                      ******************************************************************************************созд  табл CABINET			
				$Name_Table="Cabineti";
					$query = "create table ".$Name_Table." (id int not null primary key auto_increment,  time_registracii TIMESTAMP,  surname varchar(1000), name_p varchar(1000), name_work  varchar(1000), place varchar(1000), tlf CHAR(15), e_mail char(30), login char(20), password char(50)) charset utf8";
					$err=mysqli_query($mysqli, $query);
					if(!$err) {echo "Не удалось создать таблицу Кабинеты";}
				else {echo "Таблица создана - ".$Name_Table;}			
									}
						
//******************************************* IMAGE *********************************************						
						if($Par2==4){
				$Name_Table="Image";
				//			$query = "create table ".$Name_Table." (id int not null primary key auto_increment, ZavNom int(8), vremj TIMESTAMP, Sost char(10), Name_Obj char(50), kvitir int(3)) charset cp1251";
				$query = "create table ".$Name_Table." (id int(3) not null primary key auto_increment, description char(50), Img LONGBLOB, name CHAR(50), size CHAR(50), type CHAR(50)) charset utf8";
				// insert into $Name_Table(Id, description, Img, size, type )
				echo $query;
				$err=mysqli_query($mysqli, $query);
				if(!$err) {echo "Не удалось создать таблицу 2";}
				else {echo "Таблица создана - ".$Name_Table;}			
									}			
											
			if($Par2==5)
			{
					$Name_Table="Table_of_All_Alarms";	
				$query = "create table ".$Name_Table." (NULL, vremj TIMESTAMP,  name_prib char(20), ser_nom int(15), type_prib int(2), Sost char(10), Kod_Sost int(2), Prim char(60)) charset utf8";
				$err=mysqli_query($mysqli, $query);
				if(!$err) {echo "Не удалось создать таблицу 2";}
				else {echo "Таблица создана - ".$Name_Table;}			
			}	
							
		if($Par2==6)			// сохранение рисунка
			{
			}
	//************************************************************  // 
		if($Par2==7)		
			{
				$Name_Table="Varta_10324";	
				$query = "create table $Name_Table (T_Time TIMESTAMP, Number_Device char(20), Factory_Number char(25), Dat1 char(10), Dat2 char(10), Dat3 char(10), Dat4 char(10), Dat5 char(10), Dat6 char(10), Dat7 char(10), Dat8 char(10), Dat9 char(10), Dat10 char(10), Dat11 char(10), Dat12 char(10), Dat13 char(10), Dat14 char(10), Dat15 char(10), Dat16 char(10), Dat17 char(10), Dat18 char(10), Dat19 char(10), Dat20 char(10), Dat21 char(10), Dat22 char(10), Dat23 char(10), Dat24 char(10), Rez1 char(10), Rez2 char(10)) charset utf8";
				$err=mysqli_query($mysqli, $query);
	//			echo $query;
				if(!$err) {echo "Не удалось создать таблицу ВАРТА 1 03.24";}
				else {echo "Таблица создана - ".$Name_Table;}			
			}		
				if($Par2==8)		
			{
				$Name_Table="Varta_10324";	
				$query= "drop table $Name_Table ";
					$err=mysqli_query($mysqli, $query);
					if(!$err) {echo "Не удалось удалить таблицу ВАРТА 1-03.24";}
				else {echo "Таблица удалена - ".$Name_Table;}			
					
			}
												
		mysqli_close($mysqli); 
}
?>
