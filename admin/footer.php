



		</div><!--main ends-->
	</body>
	
	
<!--jquery scripts-->
<script>
	$(document).ready(function(){
			$('#arrivalDatepicker').datepicker({
				format: 'yyyy/mm/dd',
			}),
			$('#cutOffDatepicker').datepicker({
				format: 'yyyy/mm/dd',
			}),
		//to trigger the final submit for inserting voyage
			$("#sureMsg").click(function(){
				 $("#finalSubmit").click();
			});
		//to trigger the final submit for inserting voyage ends	
	});
	</script>
<!--jquery scripts ends-->	
<!--page refresh-->
	<script>
		function refreshPage(){
			window.location.reload();
		} 
		</script>
<!--page refresh ends-->
<!--script to get the schedules of a voyage-->
	<script>
		function showUser(str) {
		  if (str=="") {
			document.getElementById("txtHint").innerHTML="";
			return;
		  }
		  if (window.XMLHttpRequest) {
			// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		  } else { // code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		  xmlhttp.onreadystatechange=function() {
			if (this.readyState==4 && this.status==200) {
			  document.getElementById("txtHint").innerHTML=this.responseText;
			}
		  }
		  xmlhttp.open("GET","getSchedules.php?q="+str,true);
		  xmlhttp.send();
		}
	</script>
<!--script to get the schedules of a voyage ends-->	

<!--Insert a schedule-->
	<script>
	function insertSchedule() {
		var scheduleId = document.getElementById("scheduleId").value;
		var voyId = document.getElementById("voyId").value;
		var etaEtd = document.getElementById("etaEtd").value;
		var portName = document.getElementById("portName").value;
		var arrivalDatepicker = document.getElementById("arrivalDatepicker").value;
		var cutOffDatepicker = document.getElementById("cutOffDatepicker").value;
		if(voyId==''||etaEtd==''||portName==''||arrivalDatepicker==''||cutOffDatepicker==''){
				alert('FILL UP ALL THE INFORMATIONS PLEASE');
		}else{
			//AJAX script for inserting into database
				if (window.XMLHttpRequest) {
						// code for IE7+, Firefox, Chrome, Opera, Safari
						xmlhttp=new XMLHttpRequest();
					  } else { // code for IE6, IE5
						xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
					  }
					  xmlhttp.onreadystatechange=function() {
						if (this.readyState==4 && this.status==200) {
						  document.getElementById("scheduleHint").innerHTML=this.responseText;
						}
					  }
					  xmlhttp.open("GET","insertSchedule.php?voyId="+voyId+"&scheduleId="+scheduleId+"&etaEtd="+etaEtd+"&portName="+portName+"&arrivalDatepicker="+arrivalDatepicker+"&cutOffDatepicker="+cutOffDatepicker,true);
					  xmlhttp.send();
			
			//AJAX script for inserting into database ends
		}
		
			
			
		
		
		
	}	
	</script>

<!--Insert a ends ends -->



<!--update schedule-->
<script>
	function updateSchedule(str){
		
		//AJAX script for inserting into database
			$.post("getSchedule.php",{ str: str},
				function(data)
				{
	                    //alert(data.voyId);
						document.getElementById("etaEtd").value = data.eta_etd;
						document.getElementById("arrivalDatepicker").value = data.arr_sail_date;
						document.getElementById("portName").value = data.port;
						document.getElementById("cutOffDatepicker").value = data.cut_off_date;
						document.getElementById("voyId").value = data.voyId;

						//alert ("the voyage id is "+data.voyId);
						document.getElementById("scheduleId").value = data.scheduleId;
						
				},"json"
			)
			
		//AJAX script for inserting into database ends
		

	}	
</script>	
<!--update schedule ends-->



	
<!--script for sidenavbar-->	
<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
    document.body.style.backgroundColor = "white";
}
</script>
<!--script for sidenavbar ends-->	
</html> 