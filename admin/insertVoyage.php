<?php
include 'database/utility.php';
$voyageNumber = $_POST['voyageNumber'];
$vcnNo = $_POST['vcnNo'];
$expRotNo = $_POST['expRotNo'];
$shipId = $_POST['shipId'];

//echo $voyageNumber." ".$vcnNo." ".$expRotNo." ".$shipId;

$rs=mysqli_query($conn, "INSERT INTO voyage 
								(
								voyage_no,
								vcn,
								exp_rot_no,
								ship_id
								)
								VALUES
								(
								'".$voyageNumber."',
								'".$vcnNo."',
								'".$expRotNo."',
								'".$shipId."'
								)");
			if($rs){
				echo "insertion in voyage is successful";
				echo "<script>window.location = 'scheduleList.php?msg=successful';</script>";
			}else{
				echo "couldn't insert in hallbooking";
			}
			
