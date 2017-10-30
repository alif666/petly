
<html>
<head>
</head>
<body>

<?php
include 'database/utility.php';

$voyId = $_GET['voyId'];
$etaEtd = $_GET['etaEtd'];
$portName = $_GET['portName'];
$arrivalDatepicker = $_GET['arrivalDatepicker'];
$cutOffDatepicker = $_GET['cutOffDatepicker'];



if (!empty($_GET['scheduleId'])) {
	$scheduleId = $_GET['scheduleId'];
		$rs1=mysqli_query($conn, "UPDATE `schedule` SET `voy_id`='".$voyId."',`arr_sail_date`='".$arrivalDatepicker."',`cut_off_date`='".$cutOffDatepicker."',`eta_etd`='".$etaEtd."',`port`='".$portName."' WHERE schedule_id ='".$scheduleId."'");
			if($rs1){
				echo "Updating in Schedule is successful";
			}else{
				echo "couldn't update in schedule";
			}

	
	
}else {

	echo 'empty';
	$rs=mysqli_query($conn, "INSERT INTO schedule 
								(
								voy_id,
								arr_sail_date,
								cut_off_date,
								eta_etd,
								port
								)
								VALUES
								(
								'".$voyId."',
								'".$arrivalDatepicker."',
								'".$cutOffDatepicker."',
								'".$etaEtd."',
								'".$portName."'
								)");
			if($rs){
				echo "insertion in Schedule is successful";
			}else{
				echo "couldn't insert in schedule";
			}

}

//echo "the voyage id is".$voyId." etaEtd is ".$etaEtd." port Name is : ".$portName." arrival DatePicker is ".$arrivalDatepicker."cut off date is : ".$cutOffDatepicker;



?>
</body>
</html>