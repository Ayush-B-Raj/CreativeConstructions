<?php
include("../Assets/Connection/Connection.php");
ob_start();



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
	  
      if($row['site_status']==1)
      {
          echo "Work Approved";
      }
      elseif($row['site_status']==3)
      {
          echo "Upload Sketch and model";
      }
      
       elseif($row['site_status']==4)
      {
          echo "User Decision pending";
      }
       elseif($row['site_status']==5)
      { 
          echo "User Accepted the Sketch and Model";
      }
       elseif($row['site_status']==6)
      {
          echo "User Rejected the Sketch and Model";
          echo "<br>Reconsideration Required";
      }
      elseif($row['site_status']==7)
      {
          echo "Payment Pending";
      }
      elseif($row['site_status']==8)
      {
          echo "Payment Done";
      }
       elseif($row['site_status']==9)
      {
          echo "Supervisor Assigned";
          echo "<br>Work Started";
      }
      elseif($row['site_status']>9 && $row['site_status']<=33)
      {
          echo "Work in Progress";
      }
       if($row['site_status']==34)
      {
          echo "Supervisor Finished Work";
      }
      if($row['site_status']==35)
      {
          echo "Contract has been completed";
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
			if($row['site_status']==3 || $row['site_status']==6){
				?>
     <a href="EngineerReq.php?sid=<?php echo $row['site_id']?>">Engineer Requirements </a>
				<?php
			}
			if($row['site_status']==34){
				?>
				<a href="MySite.php?sid=<?php echo $row['site_id']?>&st=35">Finished</a>
				<?php
			}
		?>
        
        </div>
                          </div>
                </div>
            </div>
        </div>
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