<h6><h6><h6><!doctype html>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ДАТЧИКИ ВАРТА</title>
<link rel="stylesheet" type="text/css" href="style.css"/>
<script src="js.js" defer ></script> 
<link rel="shortcut icon" href="favicon.png" type="image/png">

<style type="text/css">
body{
	background:#ECFF9F;
	height:1400px;
}
#header {	
	padding:5px;
	background:#0CF
}
tr:hover{
	color:#FFF;
	background:#969;
}

</style>
</head></h6></h6></h6>
<body>
<script>
var massSost=["NORMA","POROG 1","POROG 2", "TREVOGA", "OTKAZ"];

function uslovie() {
	var uslovie2;
	var uslovie1='';
	var txt='';
//console.log('564654');
	var flag1=false; // "true" хоть одно состояние выбрано
	var nDat=document.getElementById('N_D');
	var test1=document.getElementById('test');
	for(var i=0; i<5;i++){
		if(document.post1.sost[i].checked==true){
			if(flag1==false){
				flag1=true;
				console.log(i);
				uslovie1='Sost='+"'"+massSost[i]+"'";
			}
			else
			{uslovie1=uslovie1+' || sost='+"'"+massSost[i]+"'";}
		}		
	}
	console.log("Usl1="+uslovie1);
	if(nDat.value!=''){ // есть № Датчика
		if(flag1==true) {txt='where N_Dat='+ nDat.value+' and ';}
		else {txt='where N_Dat='+ nDat.value;}
//		console.log(txt);
		}
	else	{if (flag1==true)		
				{txt='where ';}
			}
	uslovie2=txt+uslovie1;	
	console.log(txt);
		console.log(uslovie2);
//		test1.innerHTML=uslovie2;
	document.getElementById('uslov').href="Datch VARTA.php?Usl1="+uslovie2;	
}

</script>
<div id="header"><h2>СОСТОЯНИЕ сигнализатора "ВАРТА"</h2></div>
<br />
<form name="post1">
	<input type="checkbox" name="sost" value="0"/>НОРМА<br />
   <input type="checkbox" name="sost" value="1"/>ПОРОГ 1<br />
   <input type="checkbox" name="sost" value="2"/>ПОРОГ 2<br />
   <input type="checkbox" name="sost" value="3"/>ТРЕВОГА<br />
   <input type="checkbox" name="sost" value="4"/>ОТКАЗ<br />
   <input type="text" name="sost" id="N_D" size="4" /> Номер датчика <br /><br />
   <input type="button" value="Ввод параметров" onclick="uslovie()" />
</form>
<p> <a href="Datch VARTA.php" id="uslov">  <img src="images/DM-14.jpg" width="100" height="100" align="left"   title="Запрос по условию" /></a> </p>
<!--<img src="http://127.0.0.1/Images/VARTA10314.jpg" alt="Сигнализатор" width="1000" height="1000"><br />-->
<br /><br /><br /><br />
<h6><p id="test"> ПУСТО</p></h6>
<div id="ind1"></div>
<form name="post">
	<input type="button" value="изменение цвета" name="colr" onclick="clickColor()" />
</form>

<?php
//phpinfo();

	$Usl='';	
		if(isset($_POST['NDatch']))		$Par1=$_POST["NDatch"];
		if(isset($_POST['Sost']))			$Par2=$_POST["Sost"];
		if(isset($_POST['temp1']))		$Par3=$_POST["temp1"];
		if(isset($_POST['temp2']))		$Par4=$_POST["temp2"];
		if(isset($_GET['Usl1']))				{$Usl=$_GET['Usl1']; }
		if(isset($_POST['KodSost']))	$KodSost=$_POST["KodSost"];
include "Dop_PHP.php";

//	echo date("i,s");
		$Kol_Zap_tabl=0;		$err=10; 
		$mysqli=1;
		$row=array();
		$row1=array(array());
		$RazmgrX=800;
		$RazmgrY=600; 
		
	$mysqli = new mysqli("localhost", "root", "", "temio");	
	if ($mysqli->connect_errno)
 {;}
 else 
 {
	 	
//		if(isset($_POST["Usl1"])){$err=0;
//	echo $Usl;	
	if(stristr($Usl,"where")){$err=0;
//	echo date("i,s");
		$query= "SELECT Vremj, N_Dat, Sost FROM Sost_D_Varta ".$Usl;}
		else {$err=1; 
$query= "SELECT Vremj, N_Dat, Sost FROM Sost_D_Varta";	
//		$query = "SELECT Vremj, N_Dat, Sost FROM Sost_D_Varta where Sost='TREVOGA'";
		}
//	echo $query;
	$i=0;
	$n=0;
	if ($result = mysqli_query($mysqli, $query))
	{		
    /* выборка данных и помещение их в массив */
    	while ($row = mysqli_fetch_row($result)) 	
			{
       		if($row[1]!= "") 			{
				$row1[$i][0]=$row[0]; // дата
	   		$row1[$i][1]=$row[1]; // № датч/
	   		$row1[$i][2]=$row[2];  // сост
				$Ttime=explode(" ",$row1[$i][0]);
				$n++;  
				$i++;			
														}
	   	}
    /* очищаем результирующий набор */
    	mysqli_free_result($result);			
	}
// Конец выборки
mysqli_close($mysqli); 
}
//	if(isset($_GET["NDatch"])){	
//		mysqli_close($mysqli); }
	echo "<br>";
//	echo 'Кол-во строк в таблице = '."$n";
	echo "<br>";
  	echo "<br>";
	echo "<div id='Tabl_D1'>";	
	echo "<div id='Tabl_D'>";																													// ТАБЛИЦА
	echo "<table width=500  border=1 style=font-size:14px id='tabl1'  >";
	echo "<caption><h1>Состояние датчиков ВАРТА</h1></caption>";
	echo "<tr>";
	echo "<th>Номер Д</th><th>Время</th><th>Состояние</th> "; 
	echo "</tr>";
	for ($k=0; $k<$n;$k++)
	{ 	
		$Col=opred_Sost($row1[$k][2], $Par2);
		echo "<tr><td align='center' height='20'>";
 		echo $row1[$k][1]; 
		echo "</td><td align='center'>";
//		echo $tt[$k];
		echo $row1[$k][0];
		echo "</td><td bgcolor=$Col align='center'>";
 		echo $Par2;
		echo "</td></tr>";
	}
echo "</table>";
echo "</div>";
echo "</div>";
?>

<!--<div id="ris1">  <img src="Images/VARTA10314.jpg" alt="Сигнализатор" width="1000" height="1000" /> </div>-->

<!--<div id="footer">&copy; TEMIO</div>-->
<!--<script>clickColor();	</script>-->
</body>
</html>