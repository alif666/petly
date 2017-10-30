<!DOCTYPE html>
<?php
include 'admin/database/utility.php';
$query="select * from pet_image INNER JOIN pet where pet.pet_id = pet_image.pet_id ";
$resultQuery =  $conn->query($query);
?>
<html lang="en">
<head>

    <!--  
    Document Title
    =============================================
    -->
    <title>Petly !!!</title>
    <!--  
    Favicons
    =============================================
    -->
    
    <link rel="icon" type="image/png" sizes="16x16" href="images/logoLogin.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="">
    <meta name="theme-color" content="#ffffff">
    <!--  
    Stylesheets
    =============================================
    
    -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container-fluid background">
  <h2 style = "float: right">PETLY !!!</h2>
</div>
	<div class = "container" >
	<center><h1>THIS IS AN ONLINE PETSHOP</h1></center>
	  <div class="row">
		<div class="col-sm-3">
			<button type="button" class="btn btn-baby btn-block">Buy</button><br>
			<button type="button" class="btn btn-baby btn-block" data-toggle="modal" data-target="#sellModal">Sell</button><br>
			<button type="button" class="btn btn-baby btn-block">Accessories</button><br>
			 <div class="panel-group">

					<h4 class="panel-title">
					  <a type="button" class="btn btn-baby btn-block" data-toggle="collapse" href="#collapse1">VIEW CART</a>
					</h4>
				  <div id="collapse1" class="panel-collapse collapse">
					<ul class="list-group">
					  <li class="list-group-item">One</li>
					  <li class="list-group-item">Two</li>
					  <li class="list-group-item">Three</li>
					</ul>
				  </div>

			  </div>
		</div>
		<div class="col-sm-7" >
						 
						<?php while($rowQuery = $resultQuery->fetch_assoc()) {?>
							<div class = "col-md-6">
								<div class = "thumbnail imageClass">
									<img class="img-responsive" src="images/petImage/<?php echo $rowQuery['pet_image_location'];?>" alt="Chania"> 
									<h2><?php echo $rowQuery['pet_name'];?></h2>
									<h3>Price : <?php echo $rowQuery['pet_price'];?></h3>
								</div>
								<button id = "<?php echo $rowQuery['pet_id'];?>"type="button" class="btn btn-baby btn-block">ADD TO CART</button><br>
							</div>
					<?php }?>
		</div>
		<div class="col-sm-2">
			<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FPetlycombd-356978364756832%2F&tabs=timeline&width=200&height=1000&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="200" height="1000" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
		</div>
	  </div>
	</div>
	
	<!--modal for selling item-->
		  <!-- Modal -->
		  <div class="modal fade" id="sellModal" role="dialog">
			<div class="modal-dialog modal-lg">
			  <div class="modal-content">
				<div class="modal-header">
				  <button type="button" class="close" data-dismiss="modal">&times;</button>
				  <CENTER><h4 class="modal-title">Sell your Pet</h4></CENTER>
				</div>
				<div class="modal-body">
					<div class= "row">
							  <!--form to sell an item--->
								<div class = "col-sm-7">
									<form class="form-horizontal" action="upload.php" method = "POST" enctype="multipart/form-data">
										<div class="form-group">
										  <label class="control-label col-sm-2" for="name">Name</label>
										  <div class="col-sm-10">
											<input type="text" class="form-control" placeholder="Enter pet's Name" name="petName" required>
										  </div>
										</div>
										<div class="form-group">
										  <label class="control-label col-sm-2" for="name">Price</label>
										  <div class="col-sm-10">
											<input type="number" class="form-control" placeholder="Enter pet's Price" name="petPrice" required>
										  </div>
										</div>
										<div class="form-group">
										  <label class="control-label col-sm-2" for="email">Email</label>
										  <div class="col-sm-10">
											<input type="email" class="form-control" id="email" placeholder="Enter your email" name="petEmail" required>
										  </div>
										</div>
										<div class="form-group">
										  <label class="control-label col-sm-2" for="name">Address</label>
										  <div class="col-sm-10">
											<input type="text" class="form-control" placeholder="Enter your address" name="petAddress" required>
										  </div>
										</div>
										<div class="form-group">
										  <label class="control-label col-sm-2" for="name">Contact</label>
										  <div class="col-sm-10">
											<input type="text" class="form-control" placeholder="Mobile Number" name="petContact" required>
										  </div>
										</div>

										<div class="form-group">
										  <label class="control-label col-sm-2" for="pwd">Image</label>
										  <div class="col-sm-10">          
											<input type="file" name="fileToUpload" id="fileToUpload">
										  </div>
										</div>

										<div class="form-group">        
										  <div class="col-sm-offset-2 col-sm-10">
											<button type="submit" class="btn btn-baby" value="Upload Image" name="submit">Submit</button>
										  </div>
										</div>
									  </form>
								</div>
								<div class = "col-sm-5">
									<img src ="images/cryingPet.png" class = "img-reponsive" height = "480px" >
								</div>
					</div>
				  <!--form to sell an item ends-->
				</div>
				<div class="modal-footer">
				  <center><button type="button" class="btn btn-baby" data-dismiss="modal">Close</button></center>
				</div>
			  </div>
			</div>
		  </div>
	<!--modal for selling item ends-->
	