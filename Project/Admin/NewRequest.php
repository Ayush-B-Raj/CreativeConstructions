<?php

include("../Assets/Connection/Connection.php");
ob_start();
include('Head.php');
if(isset($_GET['did']))
{
	$delQry="update tbl_site set site_status=1 where site_id=".$_GET['did'];
	if($conn->query($delQry))
	{
		 ?>
         <script>
         alert("Updated")
         window.location="Site.php"
         </script>
         <?php
	}
	else
	 {?>
         <script>
         alert("Failed")
         window.location="Site.php"
         </script>
         <?php
	 }
}
if(isset($_GET['dido']))
{
	$delQryw="update tbl_site set site_status=2 where site_id=".$_GET['dido'];
	if($conn->query($delQryw))
	{
		 ?>
         <script>
         alert("Updated")
         window.location="Site.php"
         </script>
         <?php
	}
	else
	 {?>
         <script>
         alert("Failed")
         window.location="Site.php"
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
        <table class="table table-bordered table-responsive">
            <tr>
                <th>SLno</th>
                <th>Site Details</th>
                <th>Landmark</th>
                <th>Location</th>
                <th>Image</th>
                <th>Plotarea</th>
                <th>User Name</th>
                <th>User Contact</th>
                <th>Action</th>
            </tr>
            <?php
            $selQry = "SELECT * FROM tbl_site u
                INNER JOIN tbl_place p ON p.place_id=u.place_id
                INNER JOIN tbl_district d ON p.district_id=d.district_id
                inner join tbl_user us on us.user_id=u.user_id 
                WHERE site_status=0";
            $res = $conn->query($selQry);
            $i = 0;
            while ($row = $res->fetch_assoc()) {
            ?>
            <tr>
                <td><?php echo ++$i ?></td>
                <td><?php echo $row['site_details'] ?></td>
                <td><?php echo $row['site_landmark'] ?></td>
                <td><?php echo $row['place_name'], ",", $row['district_name'] ?></td>
                <td><a href="../Assets/Files/Request/Photo/<?php echo $row['site_image']?>" target="_blank">View Photo</a></td>
                <td><?php echo $row['site_plot'] ?></td>
                <td><?php echo $row['user_name'] ?></td>
                <td><?php echo $row['user_contact'] ?></td>

                <td>
                    <a href="NewRequest.php?did=<?php echo $row['site_id'] ?>" class="btn btn-success">Accept</a>
                    <a href="NewRequest.php?dido=<?php echo $row['site_id'] ?>" class="btn btn-danger">Reject</a>
                </td>
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