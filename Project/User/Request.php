<?php
session_start();
include("../Assets/Connection/Connection.php");
ob_start();
include('Head.php');
if(isset($_POST['txt_submit']))
{
	$sitedetails=$_POST['txt_sitedetails'];
	$sitelandmark=$_POST['txt_landmark'];
	$userplaceid=$_POST['txt_place'];
	$userphoto=$_FILES['ins_photo']['name'];
    $tempphoto=$_FILES['ins_photo']['tmp_name'];
	$plotarea=$_POST['txt_plot'];
	move_uploaded_file($tempphoto,'../Assets/Files/Request/Photo/'.$userphoto);
	$insQry="insert into tbl_site(site_details,site_landmark,place_id,site_image,site_plot,user_id,request_date) values('".$sitedetails."','".$sitelandmark."','".$userplaceid."','".$userphoto."','".$plotarea."','".$_SESSION['uid']."',curdate())";
	
	if($conn->query($insQry))
	{
    ?>
    <script>
    alert("Updated")
    window.location="MySite.php"
    </script>
    <?php
	}
	else
	{
    ?>
    <script>
    alert("Failed")
    window.location="Request.php"
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


<style>
.card-header {
      font-weight: bold;
      margin: 0 auto;
    }
    
    .bold-label {
      font-weight: bold;
    }
  </style>


</head>

<body>
<div class="container mt-5">
        <form name="form1" method="post" enctype="multipart/form-data" action="">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">Make a Contract</div>
                        <div class="card-body">
                        <div class="form-group">
                        <label for="txt_sitedeatils" class="bold-label">Site Details </label>
            <textarea class="form-control" name="txt_sitedetails" id="txt_sitedetails" cols="45" rows="5" required="required"></textarea>
</div>
<div class="form-group">
  <label for="txt_landmark" class="bold-label">Landmark</label>
          
            <input type="text" class="form-control" name="txt_landmark" id="txt_landmark" required="required" autocomplete="off" />
</div>

<div class="form-group">
  <label for="txt_district" class="bold-label">Distict</label>
          
            <select class="form-control" name="txt_district" id="txt_district" onchange="getPlace(this.value)" required>
              <option value="">SELECT DISTRICT</option>
              <?php
              $selQry = "select * from tbl_district";
              $res = $conn->query($selQry);
              while ($row = $res->fetch_assoc()) {
              ?>
                <option value="<?php echo $row['district_id'] ?>"><?php echo $row['district_name'] ?></option>
              <?php
              }
              ?>
            </select>
            </div>
            <div class="form-group">
  <label for="txt_place" class="bold-label">Place</label>
          
            <select class="form-control" name="txt_place" id="txt_place">
              <option value="">---SELECT PLACE---</option>
            </select>
            </div>

            <div class="form-group">
  <label for="ins_photo" class="bold-label">Image</label>
            <input type="file" class="form-control-file" name="ins_photo" id="ins_photo" required="required" />
            </div>

            <div class="form-group">
  <label for="txt_plot" class="bold-label">Plot Area</label>
            <input type="text" class="form-control" name="txt_plot" id="txt_plot" required="required" autocomplete="off" />
            </div>
    
        <div class="card-footer text-center">
            <input type="submit" class="btn btn-primary" name="txt_submit" id="txt_submit" value="Submit" />
            </div>
  </div>

            </div>
            </div>
        </form>
    </div>
  
    <script>
    function getPlace(did) {
      $.ajax({
        url: "../Assets/AjaxPages/AjaxPlace.php?did=" + did,
        success: function(html) {
          $("#txt_place").html(html);
        }
      })
    }
  </script>
    
</body>
<?php
include('Foot.php');
ob_flush();
?>
</html>