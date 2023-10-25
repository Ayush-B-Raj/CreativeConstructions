<?php
include("../Assets/Connection/Connection.php");
ob_start();
include('Head.php');
if(isset($_POST['btn_submit']))
{   $gallerycaption=$_POST['txt_caption'];
	$galleryphoto=$_FILES['txt_image']['name'];
	$tempphoto=$_FILES['txt_image']['tmp_name'];
	move_uploaded_file($tempphoto,'../Assets/Files/Gallery/Photo/'.$galleryphoto);
	$insQry="insert into tbl_gallery(gallery_caption,gallery_image,work_id) values('".$gallerycaption."','".$galleryphoto."','".$_GET['wid']."')";
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
	$delQry="delete from tbl_gallery where gallery_id=".$_GET['did'];
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
    <div class="container mt-5">
        <form id="form1" name="form1" method="post" enctype="multipart/form-data" action="">
            <table class="table table-bordered">
                <tr>
                    <td width="97">Caption</td>
                    <td width="87">
                        <textarea class="form-control" name="txt_caption" id="txt_caption" required cols="45" rows="5"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Image</td>
                    <td>
                        <input type="file" class="form-control" name="txt_image" id="txt_image" required />
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" class="btn btn-primary" name="btn_submit" id="btn_submit" value="Submit" />
                    </td>
                </tr>
            </table>
        </form>
        <table class="table table-bordered">
            <tr>
                <td>SLno</td>
                <td>Caption</td>
                <td>Image</td>
                <td>Action</td>
            </tr>
            <?php
            $selQry = "SELECT * FROM tbl_gallery";
            $res = $conn->query($selQry);
            $i = 0;
            while ($row = $res->fetch_assoc()) {
            ?>
            <tr>
                <td><?php echo ++$i ?></td>
                <td><?php echo $row['gallery_caption'] ?></td>
                <td>
                    <img src="../Assets/Files/Gallery/Photo/<?php echo $row['gallery_image']?>" height="300" />
                </td>
                <td><a href="Gallery.php?did=<?php echo $row['gallery_id']?>">Delete</a></td>
            </tr>
            <?php
            }
            ?>
        </table>
    </div>

    <!-- Include Bootstrap JavaScript and Popper.js (required for some Bootstrap features) from a CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
<?php
include('Foot.php');
ob_flush();
?>
</html>