
<html>
<head>

</head>
<body>

<?php
include 'database/utility.php';
$q = $_GET['q'];



$sql="select * from schedule INNER JOIN voyage on schedule.voy_id = voyage.id WHERE schedule.voy_id ='".$q."'";

$result = $conn->query($sql);
	echo "<table class = 'table'>
			<tr>
				<th>ETA/ETD</th>
				<th>PORT</th>
				<th>Arrival/Sailing</th>
				<th>CuttOfDate</th>
				<th>VCN</th>
				<th>EXP ROT NO</th>
				<th>ACTION</th>
			</tr>";
	while($row = $result->fetch_assoc()) {
		    echo "<tr>";
			echo "<td>".$row['eta_etd']."</td>";
			echo "<td>".$row['port']."</td>";
			echo "<td>".$row['arr_sail_date']."</td>";
			echo "<td>".$row['cut_off_date']."</td>";
			echo "<td>".$row['vcn']."</td>";
			echo "<td>".$row['exp_rot_no']."</td>";
			echo"<td>
					<button id = '".$row['schedule_id']."' type='button' onclick='updateSchedule(this.id)' class='btn btn-info btn-sm'>UPDATE</button>
				</td>";
			echo "</tr>";

	}
	echo "</table>";


?>
</body>
</html>