<?php
include("../Assets/Connection/Connection.php");
ob_start();
include('Head.php');
if(isset($_POST['txt_submit']))
{
	$updatedate=$_POST['txt_date'];
	$updatetime=$_POST['txt_time'];
	$updatedetails=$_POST['txt_details'];
	$updateimage=$_FILES['ins_image']['name'];
    $tempphoto=$_FILES['ins_image']['tmp_name'];
	move_uploaded_file($tempphoto,'../Assets/Files/Update/Photo/'.$updateimage);
	$insQry="insert into tbl_update(update_date,update_time,update_details,update_image,site_id) values('".$updatedate."','".$updatetime."','".$updatedetails."','".$updateimage."','".$_GET['did']."')";
	if($conn->query($insQry))
	{
        ?>
        <script>
             alert('Submitted');
             window.location="ViewMySite.php?sid=<?php echo $_GET['did'] ?>"
             </script>
         <?php
         }
         else
         {
             ?>
             <script>
                  alert('Failed');
                  window.location="ViewMySite.php?sid=<?php echo $_GET['did'] ?>"
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
        <form id="form1" name="form1" method="post" enctype="multipart/form-data" action="">
            <table class="table table-bordered">
                <tr>
                    <td>Date</td>
                    <td>
                        <input type="date" class="form-control" name="txt_date" required id="txt_date" />
                    </td>
                </tr>
                <tr>
                    <td>Time</td>
                    <td>
                        <input type="text" class="form-control" required name="txt_time" id="txt_time" />
                    </td>
                </tr>
                <tr>
                    <td>Details</td>
                    <td>
                        <textarea class="form-control" name="txt_details" required id="txt_details" cols="45"
                            rows="5"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Image</td>
                    <td>
                        <input type="file" class="form-control" name="ins_image" id="ins_image" required
                            autocomplete="off" />
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" class="btn btn-primary" name="txt_submit" id="txt_submit" value="Update" />
                    </td>
                </tr>
            </table>
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