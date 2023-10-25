<?php
include("../Assets/Connection/Connection.php");
ob_start();
include('Head.php');
if(isset($_POST['btn_save']))
{
	$place=$_POST['txt_place'];
	$district=$_POST['txt_district'];
	$insQry="insert into tbl_place(place_name,district_id) values('".$place."','".$district."')";
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
	$delQry="delete from tbl_place where place_id=".$_GET['did'];
	if($conn->query($delQry))
	{
		 ?>
         <script>
         alert("Deleted")
         window.location="Place.php"
         </script>
         <?php
	}
	else
	 {?>
         <script>
         alert("Failed")
         window.location="Place.php"
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
    <form id="form1" name="form1" method="post" action="">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="txt_district">District</label>
                    <select class="form-control" name="txt_district" id="txt_district">
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
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="txt_place">Place</label>
                    <input type="text" class="form-control" name="txt_place" id="txt_place" required="required" />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <input type="submit" class="btn btn-primary" name="btn_save" id="btn_save" value="Save" />
            </div>
        </div>
    </form>

    <table class="table mt-4">
        <thead>
            <tr>
                <th>SLno</th>
                <th>Place name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $selQry = "select * from tbl_place";
            $res = $conn->query($selQry);
            $i = 0;
            while ($row = $res->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo ++$i ?></td>
                    <td><?php echo $row['place_name'] ?></td>
                    <td><a href="Place.php?did=<?php echo $row['place_id'] ?>" class="btn btn-danger">Delete</a></td>
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