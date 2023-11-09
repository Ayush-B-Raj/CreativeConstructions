<?php
include("../Assets/Connection/Connection.php");
ob_start();
if(isset($_GET['id'])){
	$updQry="update tbl_site set site_status='".$_GET['st']."' where site_id=".$_GET['id'];
	if($conn->query($updQry)){
	  ?>
	  <script>
		alert('Updated')
    window.location='ViewMySite.php?sid=<?php echo $_GET['id'] ?>'
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
              if ($row['site_status'] == 9) {
                ?>
                <a href="ViewMySite.php?id=<?php echo $row['site_id'] ?>&st=10" class="btn btn-success">Site Preparation Completed</a>
                <br>
              <?php
              } else if ($row['site_status'] == 10) {
                echo "Hold the work until payment is complete"; 
              }else if ($row['site_status'] == 11) {
                echo " payment is pending..";
              }
               else if ($row['site_status'] == 12) {
                ?>
                <a href="ViewMySite.php?id=<?php echo $row['site_id'] ?>&st=13" class="btn btn-success">Foundation Completed</a>
                <br>
              <?php

                } else if ($row['site_status'] == 13) {
                echo "Hold the work until payment is complete"; 
              } 
              else if ($row['site_status'] == 14) {
                echo " payment is pending..";
              }
              else if ($row['site_status'] == 15) {
                ?>
                <a href="ViewMySite.php?id=<?php echo $row['site_id'] ?>&st=16" class="btn btn-success">Framing Completed</a>
                <br>
              <?php
              } else if ($row['site_status'] == 16) {
                echo "Hold the work until payment is complete"; 
              } 
              else if ($row['site_status'] == 17) {
                echo " payment is pending..";
              }
              else if ($row['site_status'] == 18) {
                ?>
                <a href="ViewMySite.php?id=<?php echo $row['site_id'] ?>&st=19" class="btn btn-success">Rough Electrical, Plumbing, and HVAC Completed</a>
                <br>
              <?php
              } else if ($row['site_status'] == 19) {
                echo "Hold the work until payment is complete"; 
              } 
              else if ($row['site_status'] == 20) {
                echo " payment is pending..";
      
              } else if ($row['site_status'] == 21) {
                ?>
                <a href="ViewMySite.php?id=<?php echo $row['site_id'] ?>&st=22" class="btn btn-success">Interior Finishes Completed</a>
                <br>
              <?php
               } else if ($row['site_status'] == 22) {
                echo "Hold the work until payment is complete"; 
              } 
              else if ($row['site_status'] == 23) {
                echo " payment is pending..";
      
              } else if ($row['site_status'] == 24) {
                ?>
                <a href="ViewMySite.php?id=<?php echo $row['site_id'] ?>&st=25" class="btn btn-success">Final Electrical, Plumbing, and HVAC Completed</a>
                <br>
              <?php
               } else if ($row['site_status'] == 25) {
                echo "Hold the work until payment is complete"; 
              } 
              else if ($row['site_status'] == 26) {
                echo " payment is pending..";
      
              } else if ($row['site_status'] == 27) {
                ?>
                <a href="ViewMySite.php?id=<?php echo $row['site_id'] ?>&st=28" class="btn btn-success">Landscaping and Exterior Work Completed</a>
                <br>
              <?php
               } else if ($row['site_status'] == 28) {
                echo "Hold the work until payment is complete"; 
              } 
              else if ($row['site_status'] == 29) {
                echo " payment is pending..";
      
              } else if ($row['site_status'] == 30) {
                ?>
                <a href="ViewMySite.php?id=<?php echo $row['site_id'] ?>&st=31" class="btn btn-success">Cleaning and Punch List Completed</a>
                <br>
              <?php
              } else if ($row['site_status'] == 31) {
                echo "Hold the work until payment is complete"; 
              } 
              else if ($row['site_status'] == 32) {
                echo " payment is pending..";
              } else if ($row['site_status'] == 33) {
                ?>
                <a href="ViewMySite.php?id=<?php echo $row['site_id'] ?>&st=34" class="btn btn-success">Finished</a>
                <br>
              <?php
              }
              else if ($row['site_status'] == 34) {
                echo " Finished";
              }
              else if ($row['site_status'] == 35) {
                echo " Finished";
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
                        <div class="d-flex justify-content-between">
                            <?php
                            if ($row['site_status'] <=34) {
                                ?>
                        <a href="Update.php?did=<?php echo $row['site_id'] ?>" class="btn btn-info">Update</a>
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
                            <a href="../Assets/Files/SketchupGallery/Photo/<?php echo $row['site_sketchup']?>" target="_blank">
                                <img src="../Assets/Files/SketchupGallery/Photo/<?php echo $row['site_sketchup']?>" alt="Property Photo" class="img-fluid" style="object-fit: cover; height: 100%;">
                            </a>
                        </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <p class="card-text"><strong>Site Model:</strong>
                        <a href="../Assets/Files/SitemodelGallery/Photo/<?php echo $row['site_model']?>" target="_blank">
                            <img src="../Assets/Files/SitemodelGallery/Photo/<?php echo $row['site_model']?>" alt="Property Photo" class="img-fluid" style="object-fit: cover; height: 100%;">
                        </a>
                    </p>
                </div>
                <div class="col-lg-4">
                    <p class="card-text"><strong>Site Estimate:</strong>
                        <?php echo $row['site_estimate'] ?>
                    </p>
                    <p>

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