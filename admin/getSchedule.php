<?php
include 'database/utility.php';
$scheduleId = $_POST['str'];
$eta_etd = '';
$arr_sail_date = '';
$port = '';
$cut_off_date = '';
$voyId = '';
$sql="select * from schedule WHERE schedule_id='".$scheduleId."'";
$result = $conn->query($sql);
	while($row = $result->fetch_assoc()) {
			$eta_etd=$row['eta_etd'];
			$arr_sail_date =$row['arr_sail_date'];
			$port = $row['port'];
			$cut_off_date=$row['cut_off_date'];
			$voyId=$row['voy_id'];
			
			
	}

$json='{"scheduleId":"'.$scheduleId.'","eta_etd":"'.$eta_etd.'","arr_sail_date":"'.$arr_sail_date.'","port":"'.$port.'","cut_off_date":"'.$cut_off_date.'","cut_off_date":"'.$cut_off_date.'","voyId":"'.$voyId.'"}';
print $json;
?>
