<?php
include("../Assets/Connection/Connection.php");
ob_start();
include('Head.php');
if(isset($_POST['btn_submit']))
{   $siteestimate=$_POST['txt_siteestimate'];
	$sitesketchup=$_FILES['txt_sitesketchup']['name'];
	$sitemodel=$_FILES['txt_sitemodel']['name'];
	$tempphoto=$_FILES['txt_sitesketchup']['tmp_name'];
	$tempphoto2=$_FILES['txt_sitemodel']['tmp_name'];
	move_uploaded_file($tempphoto,'../Assets/Files/SketchupGallery/Photo/'.$sitesketchup);
	move_uploaded_file($tempphoto2,'../Assets/Files/SitemodelGallery/Photo/'.$sitemodel);
    $insQry="update tbl_site set site_estimate='".$siteestimate."',site_sketchup='".$sitesketchup."',site_model='".$sitemodel."',site_status=4 where site_id=".$_GET['sid'];
	if($conn->query($insQry))
	{
        ?>
   <script>
        alert('Submitted');
        window.location="ViewMySite.php?sid=<?php echo $_GET['sid'] ?>"
        </script>
    <?php
    }
	else
	{
		?>
        <script>
             alert('Failed');
             window.location="ViewMySite.php?sid=<?php echo $_GET['sid'] ?>"
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
    <div class="container mt-5">
        <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Site Details</div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="txt_siteestimate">Site Estimate</label>
                                <input type="text" class="form-control" name="txt_siteestimate" required
                                    id="txt_siteestimate">
                            </div>
                            <div class="form-group">
                                <label for="txt_sitesketchup">Site Sketchup</label>
                                <input type="file" class="form-control-file" name="txt_sitesketchup" required
                                    id="txt_sitesketchup">
                            </div>
                            <div class="form-group">
                                <label for="txt_sitemodel">Site Model</label>
                                <input type="file" class="form-control-file" name="txt_sitemodel" required
                                    id="txt_sitemodel">
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <input type="submit" class="btn btn-primary" name="btn_submit" id="btn_submit"
                                value="Submit">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
<?php
include('Foot.php');
ob_flush();
?>
</html>