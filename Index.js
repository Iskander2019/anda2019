// JavaScript Document
var Number_Stripe_Sensor;
window.onload= function() {
//	document.querySelector('.strip_Dev').addEventListener('click', Show_Sensors) ;
	document.querySelector('.stripe_Dev').addEventListener('mouseover',tipShow ) ;
	document.querySelector('.stripe_Dev').addEventListener('mouseout',tipHide ) ;
	document.querySelector("Stripe_Sensors1").addEventListener("mouseover",tipShowStripeSensors1);
function 	Show_Sensor(event) {
		if(event.target.className=='dv'){
			var tt=event.target.getAttribute('data-div');
		}
	}
}

function Open_Cabinet(){
	window.open('kalend.html', 'newwindow', 'width=300,height=250'); return false;
}

function tipShow (event) {
	var Number_Device=event.target.getAttribute("data-div");
	var tipShow=document.getElementById("Tip_Show_text_about_Device");
	if(Number_Device!=null)	
		{
			if(Number_Device==1)	
			{
				 Number_Stripe_Sensor=document.getElementById("Stripe_Sensors1");
				tipShow.innerHTML = "<span id='Tip_Show_text'>Промышленный сигнализатор <br> ВАРТА 1-03.14 </span>";
			}
			if(Number_Device==2)	
				{
					Number_Stripe_Sensor=document.getElementById("Stripe_Sensors2");
					tipShow.innerHTML = "<span id='Tip_Show_text'>  4 - канальный промышленный <br>сигнализатор </span>";
				}
			if(Number_Device<3)	
				 Number_Stripe_Sensor.style.display='block';
		}
}

function Mouse_Out (event) {
	setTimeout(tipHide(event),1000);
}

function tipHide (event) {
	 var Number_Device=event.target.getAttribute("data-stripe_sensors1");
	 if(Number_Device==null)	
	 	{
	 		Number_Stripe_Sensor.style.display='none';
			document.getElementById("Tip_Show_text").style.display="none";
			return;
		}
		else
		{
			var ii=0;
		}
}

