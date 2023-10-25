<?php
include("../Assets/Connection/Connection.php");
ob_start();
include('Head.php');
if(isset($_POST['btn_submit']))
{   $workdate=$_POST['txt_date'];
	$workcaption=$_POST['txt_caption'];
	$workdetails=$_POST['txt_details'];
	$workphoto=$_FILES['txt_image']['name'];
	$tempphoto=$_FILES['txt_image']['tmp_name'];
	$workuniqueid=$_POST['txt_uniqueid'];
	move_uploaded_file($tempphoto,'../Assets/Files/Works/Photo/'.$workphoto);
	$insQry="insert into tbl_work(work_date,work_caption,work_details,work_image,work_unique_id) values('".$workdate."','".$workcaption."','".$workdetails."','".$workphoto."','".$workuniqueid."')";
	if($conn->query($insQry))
	{
		echo "Inserted";
	}
	else
	{
		echo "Failed";
	}
}
if(isset($_GET['did']))
{
	$delQry="delete from tbl_work where work_id=".$_GET['did'];
	if($conn->query($delQry))
	{
		 ?>
         <script>
         alert("Deleted")
         window.location="Work.php"
         </script>
         <?php
	}
	else
	 {?>
         <script>
         alert("Failed")
         window.location="Work.php"
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
<div class="container mt-4">
    <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
        <table class="table table-bordered">
            <tr>
                <td width="62">Date</td>
                <td><input type="date" class="form-control" name="txt_date" id="txt_date" required="required" /></td>
            </tr>
            <tr>
                <td>Caption</td>
                <td><textarea class="form-control" name="txt_caption" id="txt_caption" cols="45" rows="5" required="required"></textarea></td>
            </tr>
            <tr>
                <td>Details</td>
                <td><textarea class="form-control" name="txt_details" id="txt_details" cols="45" rows="5" required="required"></textarea></td>
            </tr>
            <tr>
                <td>Image</td>
                <td><input type="file" class="form-control" name="txt_image" id="txt_image" required="required" /></td>
            </tr>
            <tr>
                <td>Unique ID</td>
                <td><input type="text" class="form-control" name="txt_uniqueid" id="txt_uniqueid" required="required" /></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" class="btn btn-primary" name="btn_submit" id="btn_submit" value="Submit" /></td>
            </tr>
        </table>
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>SLno</th>
                <th>Unique ID</th>
                <th>Caption</th>
                <th>Details</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $selQry = "select * from tbl_work";
            $res = $conn->query($selQry);
            $i = 0;
            while ($row = $res->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo ++$i ?></td>
                    <td><?php echo $row['work_unique_id'] ?></td>
                    <td><?php echo $row['work_caption'] ?></td>
                    <td><?php echo $row['work_details'] ?></td>
                    <td><img src="../Assets/Files/Works/Photo/<?php echo $row['work_image'] ?>" height="300" /></td>
                    <td>
                        <a href="Work.php?did=<?php echo $row['work_id'] ?>" class="btn btn-danger">Delete</a>
                        <a href="Gallery.php?wid=<?php echo $row['work_id'] ?>" class="btn btn-primary">Gallery</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-z3Fp0p12mqDEz1LktaI/4Sf+4PnFSeW0O438W8k+Kp2Bf5Sy9b/Tm5Fszr+ypD7F1" crossorigin="anonymous"></script>
</body>
<?php
include('Foot.php');
ob_flush();
?>
</html>