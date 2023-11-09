<?php
include("../Assets/Connection/Connection.php");
ob_start();
include('Head.php');
if(isset($_GET['id'])){
    $updQry="update tbl_site set site_status='".$_GET['st']."' ";

    if($_GET['st']==35)
    {
        $updQry = $updQry.",site_completedate=curdate()";
    }
    $updQry = $updQry." where site_id=".$_GET['id'];
    if($conn->query($updQry)){
      ?>
      <script>
        alert('Updated')
        window.location="ViewSite.php?sid=<?php echo $_GET['id'] ?>"
        </script>
        <?php
    }
  }
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
                        <p class="card-text"><strong>Contact:</strong>
                            <?php echo $row['user_contact'] ?>
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
                            <?php if ($row['site_status'] == 5) { ?>
                            <a href="PaymentReq.php?dida=<?php echo $row['site_id'] ?>&st=7"
                                class="btn btn-primary">Payment Request</a>
                            <?php } ?>

                            <?php if ($row['site_status'] == 10) { ?>
                            <a href="PaymentReq.php?dida=<?php echo $row['site_id'] ?>&st=11"
                                class="btn btn-primary">Payment Request</a>
                            <?php } ?>

                            <?php if ($row['site_status'] == 13) { ?>
                            <a href="PaymentReq.php?dida=<?php echo $row['site_id'] ?>&st=14"
                                class="btn btn-primary">Payment Request</a>
                            <?php } ?>

                            <?php if ($row['site_status'] == 16) { ?>
                            <a href="PaymentReq.php?dida=<?php echo $row['site_id'] ?>&st=17"
                                class="btn btn-primary">Payment Request</a>
                            <?php } ?>

                            <?php if ($row['site_status'] == 19) { ?>
                            <a href="PaymentReq.php?dida=<?php echo $row['site_id'] ?>&st=20"
                                class="btn btn-primary">Payment Request</a>
                            <?php } ?>

                            <?php if ($row['site_status'] == 22) { ?>
                            <a href="PaymentReq.php?dida=<?php echo $row['site_id'] ?>&st=23"
                                class="btn btn-primary">Payment Request</a>
                            <?php } ?>

                            <?php if ($row['site_status'] == 25) { ?>
                            <a href="PaymentReq.php?dida=<?php echo $row['site_id'] ?>&st=26"
                                class="btn btn-primary">Payment Request</a>
                            <?php } ?>

                            <?php if ($row['site_status'] == 28) { ?>
                            <a href="PaymentReq.php?dida=<?php echo $row['site_id'] ?>&st=29"
                                class="btn btn-primary">Payment Request</a>
                            <?php } ?>

                            <?php if ($row['site_status'] == 31) { ?>
                            <a href="PaymentReq.php?dida=<?php echo $row['site_id'] ?>&st=32"
                                class="btn btn-primary">Payment Request</a>
                            <?php } ?>

                            <?php if ($row['site_status'] == 34) { ?>
                            <a href="ViewSite.php?id=<?php echo $row['site_id']?>&st=35"
                                class="btn btn-success">Finished</a>
                            <?php } ?>

                        </div>
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
            if ($row['site_status'] == 1) {
                $selQRy1 = "select * from tbl_engineer";
                $res1 = $conn->query($selQRy1);
                $i = 0;
            ?>
                    
                        <div class="row">
                            <div class="col">
                                <select name="selEng" id="selEng" class="form-control">
                                    <option value="">Select Engineer</option>
                                    <?php
                        while ($row1 = $res1->fetch_assoc()) {
                        ?>
                                    <option value="<?php echo $row1['engineer_id'] ?>">
                                        <?php echo $row1['engineer_name'] ?>
                                    </option>
                                    <?php
                        }
                        ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <button type="button" onclick="assignEng(<?php echo $row['site_id'] ?>)"
                                    class="btn btn-primary btn-block">Assign</button>
                            </div>
                        </div>
                    
                    <?php
            }
            else if($row['site_status'] >= 3){
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
            if ($row['site_status'] == 8) {
                $selQRy2 = "select * from tbl_supervisor";
                $res2 = $conn->query($selQRy2);
                $i = 0;
            ?>
                        <div class="row">
                            <div class="col">
                                <select name="selSup" id="selSup" class="form-control">
                                    <option value="">Select Supervisor</option>
                                    <?php
                        while ($row2 = $res2->fetch_assoc()) {
                        ?>
                                    <option value="<?php echo $row2['supervisor_id'] ?>">
                                        <?php echo $row2['supervisor_name'] ?>
                                    </option>
                                    <?php
                        }
                        ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <button type="button" onclick="assignSup(<?php echo $row['site_id'] ?>)"
                                    class="btn btn-primary btn-block">Assign</button>
                            </div>
                        </div>
                        <?php
            }
            else if ($row['site_status'] > 8) {
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
			 window.location="ViewSite.php?sid="+ sid;
		 }
	 })
}
function assignSup(site){
	
	var supid = document.getElementById('selSup').value;
	
	$.ajax({
		 url:"../Assets/AjaxPages/AjaxAssignSup.php?supid="+supid+"&&site="+site,
		 success: function(html){
			 alert(html)
			 window.location="ViewSite.php?sid="+ site;
		 }
	 })
}
</script>

</html>