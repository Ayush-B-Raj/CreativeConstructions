<?php
include("../Assets/Connection/Connection.php");
ob_start();

if(isset($_GET['did']))
{
	$delQry="update tbl_site set site_status=5 where site_id=".$_GET['did'];
	if($conn->query($delQry))
	{
		 ?>
         <script>
         alert("Updated")
      window.location="ViewMySite.php?sid=<?php echo $_GET['did'] ?>"
         </script>
         <?php
	}
	else
	 {?>
         <script>
         alert("Failed")
      window.location="ViewMySite.php?sid=<?php echo $_GET['did'] ?>"
         </script>
         <?php
	 }
}
if(isset($_GET['dido']))
{
	$delQryw="update tbl_site set site_status=6 where site_id=".$_GET['dido'];
	if($conn->query($delQryw))
	{
		 ?>
         <script>
         alert("Updated")
         window.location="ViewMySite.php?sid=<?php echo $_GET['dido'] ?>"
         </script>
         <?php
	}
	else
	 {?>
         <script>
         alert("Failed")
         window.location="ViewMySite.php?sid=<?php echo $_GET['dido'] ?>"
         </script>
         <?php
	 }
}

include('Head.php');
$selQry = "select * from tbl_site s inner join tbl_place p on p.place_id=s.place_id inner join tbl_district d on p.district_id=d.district_id inner join tbl_user u on u.user_id=s.user_id where site_id= ".$_GET['sid'];
$res = $conn->query($selQry);
$row = $res->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container mt-4">
        <div class="card">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <a href="../Assets/Files/Request/Photo/<?php echo $row['site_image']?>" target="_blank">
                        <img src="../Assets/Files/Request/Photo/<?php echo $row['site_image']?>" alt="Property Photo"
                            class="img-fluid" style="object-fit: cover; height: 100%;">
                    </a>
                </div>
                <div class="col-md-6">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php echo $row['user_name'] ?>
                        </h5>
                        <p class="card-text"><strong>Site Details:</strong>
                            <?php echo $row['site_details'] ?>
                        </p>
                        <p class="card-text"><strong>Location:</strong>
                            <?php echo $row['site_landmark'] ?>
                        </p>
                        <p class="card-text"><strong>Landmark:</strong>
                            <?php echo $row['district_name'] . ", " . $row['place_name'] ?>
                        </p>
                        <p class="card-text"><strong>Plot Area:</strong>
                            <?php echo $row['site_plot'] ?>
                        </p>
                        </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-8">
                        <h5 class="card-title">Current Status</h5>
                        <div class="card-text">
                            <?php
                            if ($row['site_status'] == 1) {
                                echo "<br>Work Approved<br>"; 
                            } else if ($row['site_status'] == 2) {
                                echo "Work Declined";
                            }
                            if ($row['site_status'] == 3) {
                                echo "Engineer Assigned";
                            }
                            if ($row['site_status'] == 4) {
                                echo "Sketch and Model Pending.. ";
                            }
                            if ($row['site_status'] == 5) {
                                echo " User Accepted Sketch and Model<br> Payment Pending";
                            }
                            if ($row['site_status'] == 6) {
                                echo " User Rejected Sketch and Model";
                            }
                            if ($row['site_status'] == 7) {
                                echo "Payment Request Send";
                            }
                            if ($row['site_status'] == 8) {
                                echo "Payment Complete.";
                            }
                            if ($row['site_status'] == 9) {
                                echo "Supervisor Assigned";
                            }
                            if ($row['site_status'] == 10) {
                                echo "Site Preparation COmpleted";
                            }
                            if ($row['site_status'] == 11) {
                                echo "Payment Request Send";
                            }
                            if ($row['site_status'] == 12) {
                                echo "Payment Complete";
                            }
                            if ($row['site_status'] == 13) {
                                echo "Foundation Completed";
                            }
                            if ($row['site_status'] == 14) {
                                echo "Payment Request Send";
                            }
                            if ($row['site_status'] == 15) {
                                echo "Payment Complete";
                            }
                            if ($row['site_status'] == 16) {
                                echo "Framimng Completed";
                            }
                            if ($row['site_status'] == 17) {
                                echo "Payment Request Send";
                            }
                            if ($row['site_status'] == 18) {
                                echo "Payment Complete";
                            }
                            if ($row['site_status'] == 19) {
                                echo "Rough Electrical, Plumbing, and HVAC
                                Completed";
                            }
                            if ($row['site_status'] == 20) {
                                echo "Payment Request Send";
                            }
                            if ($row['site_status'] == 21) {
                                echo "Payment Complete";
                            }
                            if ($row['site_status'] == 22) {
                                echo "Interior Finishes
                                Completed";
                            }
                            if ($row['site_status'] == 23) {
                                echo "Payment Request Send";
                            }
                            if ($row['site_status'] == 24) {
                                echo "Payment Complete";
                            }
                            if ($row['site_status'] == 25) {
                                echo "Final Electrical, Plumbing, and HVAC
                                Completed";
                            }
                            if ($row['site_status'] == 26) {
                                echo "Payment Request Send";
                            }
                            if ($row['site_status'] == 27) {
                                echo "Payment Complete";
                            }
                            if ($row['site_status'] == 28) {
                                echo "Landscaping and Exterior Work
                                Completed";
                            }
                            if ($row['site_status'] == 29) {
                                echo "Payment Request Send";
                            }
                            if ($row['site_status'] == 30) {
                                echo "Payment Complete";
                            }
                            if ($row['site_status'] == 31) {
                                echo "Cleaning and Punch List
                                Completed";
                            }
                            if ($row['site_status'] == 32) {
                                echo "Payment Request Send";
                            }
                            if ($row['site_status'] == 33) {
                                echo "Payment Complete";
                            }
                            if ($row['site_status'] == 34) {
                                echo "Supervisor has Finished the Work ";
                            }
                            if ($row['site_status'] == 35) {
                                echo "Contract has been Completed";
                            }
                            ?>
                        </div>
                        </div>

                        <div class="col-lg-4" style="
                        display: flex;
                        flex-direction: column;
                        justify-content: center;
                        align-items: flex-end;
                        ">
                        <div >

                        <?php
    $selQryp="select * from tbl_payment where payment_status=0 and site_id=".$row['site_id'];
    $resp=$conn->query($selQryp);
    if($row['site_status']==5)
    {
      echo "Payment will be Enabled Soon...";
    }
    if($row['site_status']==8)
    {
      echo "Payment Recieved";
    }
    
    if($row['site_status']==7)
      {
        $rowp=$resp->fetch_assoc();
	echo " <br> Amount To Be Paid :".$rowp['payment_amount'];
	echo " <br> Due Date :".$rowp['payment_duedate'];
      ?>
      <br>
        <a href="Payment.php?pid=<?php echo $rowp['payment_id']?>&st=8&pt=1&sid=<?php echo $row['site_id']?>" class="btn btn-primary">Pay Now</a>
	<?php
      }
      if($row['site_status']==10)
      {
        echo "Payment will be Enabled Soon...";
      }
      if($row['site_status']==11)
      {
        $rowp=$resp->fetch_assoc();
	echo " <br> Amount To Be Paid :".$rowp['payment_amount'];
	echo " <br> Due Date :".$rowp['payment_duedate'];
      ?>
      <br>
        <a href="Payment.php?pid=<?php echo $rowp['payment_id']?>&st=12&pt=1&sid=<?php echo $row['site_id']?>"class="btn btn-primary">Pay Now</a>
	<?php
      }
      if($row['site_status']==13)
      {
        echo "Payment will be Enabled Soon...";
      }
      if($row['site_status']==14)
      {
        $rowp=$resp->fetch_assoc();
	echo " <br> Amount To Be Paid :".$rowp['payment_amount'];
	echo " <br> Due Date :".$rowp['payment_duedate'];
      ?>
      <br>
        <a href="Payment.php?pid=<?php echo $rowp['payment_id']?>&st=15&pt=1&sid=<?php echo $row['site_id']?>"class="btn btn-primary">Pay Now</a>
	<?php
      }
      if($row['site_status']==17)
      {
        $rowp=$resp->fetch_assoc();
	echo " <br> Amount To Be Paid :".$rowp['payment_amount'];
	echo " <br> Due Date :".$rowp['payment_duedate'];
      ?>
      <br>
        <a href="Payment.php?pid=<?php echo $rowp['payment_id']?>&st=18&pt=1&sid=<?php echo $row['site_id']?>"class="btn btn-primary">Pay Now</a>
	<?php
      }
      if($row['site_status']==20)
      {
        $rowp=$resp->fetch_assoc();
	echo " <br> Amount To Be Paid :".$rowp['payment_amount'];
	echo " <br> Due Date :".$rowp['payment_duedate'];
      ?>
      <br>
        <a href="Payment.php?pid=<?php echo $rowp['payment_id']?>&st=21&pt=1&sid=<?php echo $row['site_id']?>"class="btn btn-primary">Pay Now</a>
	<?php
      }
      if($row['site_status']==23)
      {
        $rowp=$resp->fetch_assoc();
	echo " <br> Amount To Be Paid :".$rowp['payment_amount'];
	echo " <br> Due Date :".$rowp['payment_duedate'];
      ?>
      <br>
        <a href="Payment.php?pid=<?php echo $rowp['payment_id']?>&st=24&pt=1&sid=<?php echo $row['site_id']?>"class="btn btn-primary">Pay Now</a>
	<?php
      }
      if($row['site_status']==26)
      {
        $rowp=$resp->fetch_assoc();
	echo " <br> Amount To Be Paid :".$rowp['payment_amount'];
	echo " <br> Due Date :".$rowp['payment_duedate'];
      ?>
      <br>
        <a href="Payment.php?pid=<?php echo $rowp['payment_id']?>&st=27&pt=1&sid=<?php echo $row['site_id']?>"class="btn btn-primary">Pay Now</a>
	<?php
      }
      if($row['site_status']==29)
      {
        $rowp=$resp->fetch_assoc();
	echo " <br> Amount To Be Paid :".$rowp['payment_amount'];
	echo " <br> Due Date :".$rowp['payment_duedate'];
      ?>
      <br>
        <a href="Payment.php?pid=<?php echo $rowp['payment_id']?>&st=30&pt=1&sid=<?php echo $row['site_id']?>"class="btn btn-primary">Pay Now</a>
	<?php
      }
      if($row['site_status']==31)
      {
        echo "Payment will be Enabled Soon...";
      }
      if($row['site_status']==32)
      {
        $rowp=$resp->fetch_assoc();
	echo " <br> Amount To Be Paid :".$rowp['payment_amount'];
	echo " <br> Due Date :".$rowp['payment_duedate'];
      ?>
      <br>
        <a href="Payment.php?pid=<?php echo $rowp['payment_id']?>&st=33&pt=1&sid=<?php echo $row['site_id']?>"class="btn btn-primary">Pay Now</a>
	<?php
      }
      if($row['site_status']==34)
      {
      ?>
      <br>
        <a href="MySite.php?sid=<?php echo $row['site_id']?>&st=35">Finished</a>
	<?php
      }
      if($row['site_status']==35)
      {
      ?>
      <br>
        <a href="Review.php" class="btn btn-warning">Review</a>
	<?php
      }
      ?>
      

                          </div>
                          </div>
                </div>
            </div>
        </div>
    </div>
    

    <div class="container mt-4">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card-text">
                        <p class="card-text"><strong>Site SketchUp:</strong>
                        <?php 
                        if($row['site_sketchup']==""){
                            echo '--------';
                        }
                        else{
                            ?>
                            <a href="../Assets/Files/SketchupGallery/Photo/<?php echo $row['site_sketchup']?>" target="_blank">
                                <img src="../Assets/Files/SketchupGallery/Photo/<?php echo $row['site_sketchup']?>" alt="Property Photo" class="img-fluid" style="object-fit: cover; height: 100%;">
                            </a>
                            <?php
                        }
                        ?>
                        </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <p class="card-text"><strong>Site Model:</strong>
                    <?php 
                        if($row['site_model']==""){
                            echo '--------';
                        }
                        else{
                            ?>

                        <a href="../Assets/Files/SitemodelGallery/Photo/<?php echo $row['site_model']?>" target="_blank">
                            <img src="../Assets/Files/SitemodelGallery/Photo/<?php echo $row['site_model']?>" alt="Property Photo" class="img-fluid" style="object-fit: cover; height: 100%;">
                        </a>

                        <?php
                        }
                        ?>
                    </p>
                </div>
                <div class="col-lg-4">
                    <p class="card-text"><strong>Site Estimate:</strong>
                        <?php echo $row['site_estimate'] ?>
                    </p>
                    <p>
                        <?php
                      
                        if(isset($_GET['did']))
                        {
                          $delQry="update tbl_site set site_status=5 where site_id=".$_GET['did'];
                          if($conn->query($delQry))
                          {
                             ?>
                                 <script>
                                 alert("Updated")
                              window.location="ViewMySite.php"
                                 </script>
                                 <?php
                          }
                          else
                           {?>
                                 <script>
                                 alert("Failed")
                              window.location="ViewMySite.php"
                                 </script>
                                 <?php
                           }
                        }
                        if(isset($_GET['dido']))
                        {
                          $delQryw="update tbl_site set site_status=6 where site_id=".$_GET['dido'];
                          if($conn->query($delQryw))
                          {
                             ?>
                                 <script>
                                 alert("Updated")
                                 </script>
                                 <?php
                          }
                          else
                           {?>
                                 <script>
                                 alert("Failed")
                                 </script>
                                 <?php
                           }
                        }
                        if ($row['site_status'] == 4) {
                        ?>
                            <a href="ViewMySite.php?did=<?php echo $row['site_id']?>"class="btn btn-primary">Accept</a>
                            
                            <a href="ViewMySite.php?dido=<?php echo $row['site_id']?>"class="btn btn-primary">Reject</a>
                        <?php
                        }
                        ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>


    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                <div class="card-body">
                    <?php
             if($row['site_status'] >= 3){
                $gry = "select * from tbl_engineer where engineer_id=" . $row['engineer_id'];
                $res3 = $conn->query($gry);
                $row2 = $res3->fetch_assoc();
                ?>
                    <div class="row no-gutters">
                        <div class="col-md-3">
                            <!-- Engineer Photo -->
                            <img src="../Assets/Files/Engineer/Photo/<?php echo $row2['engineer_photo'] ?>"
                                alt="Engineer Photo" class="img-fluid" style="height: 100%; object-fit: cover;">
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <h3 class="card-title">Engineer</h3>
                                <!-- Engineer Name -->
                                <h5 class="card-title">
                                    <?php echo $row2['engineer_name'] ?>
                                </h5>
                                <!-- Engineer Contact Number (as a clickable link) -->
                                <p class="card-text">
                                    <a href="tel:+91<?php echo $row2['engineer_contact'] ?>">
                                        <?php echo $row2['engineer_contact'] ?>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php
            }
            else{
                echo "<p align='center'>---------</p>";
            }
            ?>
                </div>
            </div>
        </div>


        <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <?php
             if ($row['site_status'] > 8) {
                $gryo = "select * from tbl_supervisor where supervisor_id=" . $row['supervisor_id'];
                $reso3 = $conn->query($gryo);
                $rowo2 = $reso3->fetch_assoc();
                ?>
                        <div class="row no-gutters">
                            <div class="col-md-3">
                                <!-- Supervisor Photo -->
                                <img src="../Assets/Files/Supervisor/Photo/<?php echo $rowo2['supervisor_photo'] ?>"
                                    alt="Supervisor Photo" class="img-fluid" style="height: 100%; object-fit: cover;">
                            </div>
                            <div class="col-md-6">
                                <div class="card-body">
                                    <h3 class="card-title">Supervisor</h3>
                                    <!-- Supervisor Name -->
                                    <h5 class="card-title">
                                        <?php echo $rowo2['supervisor_name'] ?>
                                    </h5>
                                    <!-- Supervisor Contact Number (as a clickable link) -->
                                    <p class="card-text">
                                        <a href="tel:+91<?php echo $rowo2['supervisor_contact'] ?>">
                                            <?php echo $rowo2['supervisor_contact'] ?>
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <?php
            }
            else{
                echo "<p align='center'>---------</p>";
            }
            
            ?>
                    </div>
                </div>
            </div>






        </div>

    </div>
<hr style>
    <div class="container mt-4">
    <h2 align='center'>Work Updates</h2>
        <?php
        $selUpdate="select * from tbl_update where site_id=".$row['site_id'];
        $resUpdate=$conn->query($selUpdate);
        if($resUpdate->num_rows>0){
            while($dataUpdate=$resUpdate->fetch_assoc())
            {
                ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <img src="../Assets/Files/Update/Photo/<?php echo $dataUpdate['update_image'] ?>" class="card-img-top" alt="Post Image" style="
    height: 500px;
    object-fit: cover;
">
                    <div class="card-body">
                        <p class="card-text"><?php echo $dataUpdate['update_details'] ?></p>
                        <div class="datetime" style="
                        display: flex;
                        justify-content: space-between;
                    ">
                            <p class='card-text'><?php echo $dataUpdate['update_time'] ?></p>
                            <p class='card-text'><?php echo $dataUpdate['update_date'] ?></p>
                        </div>
                    
                </div>
                </div>
            </div>
        </div>
        <?php
        
    }
}
else{
    ?>
    <h2 align='center'>No updates Yet!</h2>
    <?php
}
?>
    </div>



</body>
<?php
include('Foot.php');
ob_flush();
?>
<script src="../Assets/JQ/jQuery.js"></script>
<script>
function assignEng(sid){
	
	var eid = document.getElementById('selEng').value;
	
	$.ajax({
		 url:"../Assets/AjaxPages/AjaxAssignEng.php?eid="+eid+"&&sid="+sid,
		 success: function(html){
			 alert(html)
			 window.location="Site.php"
		 }
	 })
}
function assignSup(site){
	
	var supid = document.getElementById('selSup').value;
	
	$.ajax({
		 url:"../Assets/AjaxPages/AjaxAssignSup.php?supid="+supid+"&&site="+site,
		 success: function(html){
			 alert(html)
			 window.location="Site.php"
		 }
	 })
}
</script>

</html>