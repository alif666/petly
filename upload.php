
<?php
include 'admin/database/utility.php';

//get name 
$petName = "";
if (!empty($_POST['petName'])) {
	$petName = $_POST['petName'];
}
//get name  ends

//get price 
$petPrice = "";
if (!empty($_POST['petPrice'])) {
	$petPrice = $_POST['petPrice'];
}
//get price ends

//get email 
$petEmail = "";
if (!empty($_POST['petEmail'])) {
	$petEmail = $_POST['petEmail'];
}
//get email ends


//get  address 
$petAddress = "";
if (!empty($_POST['petAddress'])) {
	$petAddress = $_POST['petAddress'];
}
//get address ends

//get  contact number 

if (!empty($_POST['petContact'])) {
	$petContact = $_POST['petContact'];
}
//get contact ends
$target_dir = "images/petImage/";
$target_file = $target_dir.$petName.'_'.basename($_FILES["fileToUpload"]["name"]);


//for database storing
$dbTargetFile = $petName.'_'.basename($_FILES["fileToUpload"]["name"]);

$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		//$petId = date("D M d, Y G:i");
		$petId = rand(11,99).$petContact;
		$fileName = basename( $_FILES["fileToUpload"]["name"]);
		echo "the file  ".$dbTargetFile." has been uploaded";
//query to insert in database
				$rs=mysqli_query($conn, "INSERT INTO `pet`(`pet_id`,`pet_name`, `pet_price`,`pet_address`, `pet_contact_no`, `pet_mail`) VALUES ('".$petId."','".$petName."','".$petPrice."','".$petAddress."','".$petContact."','".$petEmail."')"); 
				$rs1=mysqli_query($conn, "INSERT INTO `pet_image`(`pet_id`,`pet_image_location`) VALUES ('".$petId."','".$dbTargetFile."')"); 
				echo "<script>window.location.href = 'index.php';</script>";
//query to insert in database ends	
	
		}else {
			echo "Sorry, there was an error uploading your file.";
    }
}
?>

