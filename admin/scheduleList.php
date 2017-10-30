<?php include 'header.php';
include 'database/utility.php';
$query="select * from voyage";
$query1="select * from ship";

$resultQuery =  $conn->query($query);
$resultQuery1 = $conn->query($query1);
$resultVoyage = $conn->query($query);

session_start();
if(empty($_SESSION['UserId'])){
	header("Location: index");
	die();
}?>
<style>
div{
	padding:2px;
}
</style>
<div class = "container-fluid">
	<center><h2>SCHEDULE LIST</h2></center>
	<div class = "row">
			<div class ="col-md-4">
			<form>
				<?php if(isset($_GET['msg'])) echo "<h1>Insertion successfull</h1>"?>
				<select class = "form-control" name="users" onchange="showUser(this.value)">
					<option value="">Select Voyage</option>
				<?php while($rowQuery = $resultQuery->fetch_assoc()) {?>
						<option value="<?php echo $rowQuery['id'];?>"><?php echo $rowQuery['voyage_no'];?></option>
				<?php }?>
				</select>
			</form><br>
			<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#voyageModal">New Voyage</button>
			
			</div>
			<div class = "col-md-8">
					<center><div id="txtHint"><b>Voyage Table will be shown here</b></div></center>
			</div>
	</div>
	<div class = "row">
			<center><h2>Insert a new Schedule</h2></center>
			<table class ="table">
				<input id = "scheduleId" type = "hidden" value = "">
				<tr>
					<th>VOY</th>
					<th>ETA/ETD</th>
					<th>PORT</th>
					<th>Arrival/Sailing</th>
					<th>CuttOfDate</th>	

				</tr>
				<tr>
					<form>
						<td>
							<select id = "voyId" class = "form-control">
								<option value="">Select Voyage</option>
							<?php while($rowVoyage = $resultVoyage->fetch_assoc()) {?>
									<option value="<?php echo $rowVoyage['id'];?>"><?php echo $rowVoyage['voyage_no'];?></option>
							<?php }?>
							</select>
						</td>
						<td>
							<select id = "etaEtd" class = "form-control">
								<option value = "ETA">ETA</option>
								<option value = "ETD">ETD</option>
							</select>
						</td>
						<td>
							<select id = "portName" class = "form-control">
								<option value = "PANGAON">PAN</option>
								<option value = "KOLKATA">KOL</option>
								<option value = "CHITTAGONG">CTG</option>
								<option value = "HALDIA">HAL</option>
							</select>
						</td>
						<td>
							<input type="text" id = "arrivalDatepicker" class="form-control">
						</td>
						<td>
							<input type = "date" id = "cutOffDatepicker" class ="form-control">
						</td>

					</form>
				</tr>
				<tr>
					<td colspan = "5"><button type="button" class="btn btn-info btn-lg" onclick = "insertSchedule()">InsertSchedule</button>
					<button type="button" class="btn btn-info btn-lg" onClick="refreshPage()">Clear</button>
					</td>
				</tr>
		
			</table>
			<div id="scheduleHint"><b>Result Set</b></div>
			
			
	</div>	
</div>






















<!--MODALS-->
		<!-- Modal for inserting voyage-->
			<div class = "container">
				  <!-- Modal -->
				  <div class="modal fade" id="voyageModal" role="dialog">
					<div class="modal-dialog">
					<!-- Modal content-->
					  <div class="modal-content">
						<div class="modal-header">
						  <button type="button" class="close" data-dismiss="modal">&times;</button>
						  <h4 class="modal-title">Insert New Voyage</h4>
						</div>
						<div class="modal-body">
						  <!--insert voyage-->
									<form action = "insertVoyage.php" method = "post">
										<div class="form-group">
										  <label for="inputdefault">Voyage Number :</label>
										  <input class="form-control" name="voyageNumber" type="text" placeholder = "VOY 000">
										</div>
										<div class="form-group">
										  <label for="inputsm">VCN NO:</label>
										  <input class="form-control input-sm" name="vcnNo" type="text">
										</div>
										<div class="form-group">
										  <label for="inputsm">EXP ROT NO:</label>
										  <input class="form-control input-sm" name="expRotNo" type="text">
										</div>
										<div class="form-group">
										  <label for="sel1">Select Ship</label>
										  <select class="form-control" name="shipId">
												<?php while($rowQuery1 = $resultQuery1->fetch_assoc()) {?>
														<option value="<?php echo $rowQuery1['ship_id'];?>"><?php echo $rowQuery1['ship_name'];?></option>
												<?php }?>
										  </select>
										</div>
										<div class="form-group">
											<button type="submit" id = "finalSubmit" class="btn btn-info form-control" style = "display: none;">SUBMIT</button>
										</div>
									</form>
										<div class="form-group">
											<button type="submit" class="btn btn-info form-control" data-toggle="modal" data-target="#sureModal">FINISH</button>
										</div>
						  <!--insert voyage ends-->
						</div>
						<div class="modal-footer">
						  <button type="button" class="btn btn-default" data-dismiss="modal">CANCEL</button>
						</div>
					  </div>
					  
					</div>
				  </div>
			</div>
		<!--modal for inserting voyage ends-->
		<!--are you sure message-->
			  <!-- Modal -->
				<div class = "container">
				  <div class="modal fade" id="sureModal" role="dialog">
					<div class="modal-dialog">
					
					  <!-- Modal content-->
					  <div class="modal-content">
						<div class="modal-header">
						  <button type="button" class="close" data-dismiss="modal">&times;</button>
						  <h4 class="modal-title">FINISH INSERTING VOYAGE</h4>
						</div>
						<div class="modal-body">
						  <p>ARE YOU SURE ?</p>
						</div>
						<div class="modal-footer">
							<button type="button" id="sureMsg" class="btn btn-info">SURE</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					  </div>
					  
					</div>
				  </div>
				</div>
		<!--are you sure message end-->
<!--MODALS END-->
<?php include 'footer.php';?>