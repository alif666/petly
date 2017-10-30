<?php 
//for localhost

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "petshop_bd";

//for localhost

/*
$servername = "localhost";
$username = "riverlin_kazi";
$password = "&yZn-J?4T+D@";
$dbname = "riverlin_kazi";
*/

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
	
	//echo "Database Connected";

}
	
function MakeID($tablename,$fieldname,$prefix,$length)
		{
			global $conn;
			$rs=mysqli_query($conn, "select max($fieldname) from $tablename");
			$row=mysqli_fetch_row($rs);
			$shahadat=$row[0];
			$prefixlength=strlen($prefix);
			$number=substr($shahadat,$prefixlength);
			$numberval=intval($number);	
			$numberval=$numberval+1;
			$numberlength=strlen($numberval);
			$zero=$length-$prefixlength-$numberlength;
			$zerorepeat=str_repeat("0",$zero);
			$id=$prefix.$zerorepeat.$numberval;
			return($id);
		}
function MakeDate($myFormat="y-m-d h:i:s",$myZone="Asia/Dhaka")
		{
			$mydate= new DateTime(null, new DateTimeZone($myZone));
			return($mydate-> format($myFormat));	
		}
?>