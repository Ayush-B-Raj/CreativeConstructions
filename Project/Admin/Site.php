<?php
include("../Assets/Connection/Connection.php");
ob_start();
include('Head.php');
if(isset($_GET['sid'])){
    $updQry="update tbl_site set site_status='".$_GET['st']."' where site_id=".$_GET['sid'];
    if($conn->query($updQry)){
      ?>
      <script>
        alert('Updated')
        </script>
        <?php
    }
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<div class="container-fluid">
<div class="container mt-4">
<?php
            $selQry = "select * from tbl_site s inner join tbl_place p on p.place_id=s.place_id inner join tbl_district d on p.district_id=d.district_id inner join tbl_user u on u.user_id=s.user_id where site_status>0 ";
            $res = $conn->query($selQry);
            $i = 0;
            while ($row = $res->fetch_assoc()) {
                ?>
        <div class="card mt-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <img src="../Assets/Files/Request/Photo/<?php echo $row['site_image']?>" alt="User Photo" class="img-fluid rounded" style="
    object-fit: cover;
    height: 100%;
">
                    </div>
                    <div class="col-md-8">
                        <h4 class="card-title"><?php echo $row['user_name'] ?></h4>
                        <p class="card-text"><strong>Engineer:</strong><?php
                        if ($row['site_status'] >= 3) {
                            $gry = "select * from tbl_engineer where engineer_id=" . $row['engineer_id'];
                            $res3 = $conn->query($gry);
                            $row2 = $res3->fetch_assoc();
                            echo $row2['engineer_name'];
                        }
                        ?></p>
                        <p class="card-text"><strong>Supervisor:</strong><?php
                        if ($row['site_status'] > 8) {
                            $gryo = "select * from tbl_supervisor where supervisor_id=" . $row['supervisor_id'];
                            $reso3 = $conn->query($gryo);
                            $rowo2 = $reso3->fetch_assoc();
                            echo $rowo2['supervisor_name'];
                        }
                        ?></p>
                        <p class="card-text"><strong>Location:</strong><?php echo $row['district_name'] . ", " . $row['place_name'] ?></p>
                        <p class="card-text"><strong>Status:</strong><?php
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
                            echo "Payment Complete. Assign SUpervisor";
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
                        ?></p>
                        <a href="ViewSite.php?sid=<?php echo $row['site_id'] ?>" class="btn btn-primary">View More</a>
                    </div>
                </div>
            </div>
        </div>
        <?php
            }
            ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-z3Fp0p12mqDEz1LktaI/4Sf+4PnFSeW0O438W8k+Kp2Bf5Sy9b/Tm5Fszr+ypD7F1" crossorigin="anonymous"></script>
</body>


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
<?php
include('Foot.php');
ob_flush();
?>
</html> 