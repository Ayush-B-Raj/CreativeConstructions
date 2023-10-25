<?php
include("../Assets/Connection/Connection.php");
ob_start();
include('Head.php');
if(isset($_POST['btn_save']))
{
	$district=$_POST['txt_district'];
	$insQry="insert into tbl_district(district_name) values('".$district."')";
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
	$delQry="delete from tbl_district where district_id=".$_GET['did'];
	if($conn->query($delQry))
	{
		 ?>
         <script>
         alert("Deleted")
         window.location="District.php"
         </script>
         <?php
	}
	else
	 {?>
         <script>
         alert("Failed")
         window.location="District.php"
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
            <div class="form-group">
                <label for="txt_district">District</label>
                <input type="text" name="txt_district" required class="form-control" id="txt_district" />
            </div>
            <button type="submit" name="btn_save" id="btn_save" class="btn btn-primary">Save</button>
        </form>

        <table class="table mt-4">
            <thead>
                <tr>
                    <th>SLno</th>
                    <th>District name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $selQry="select * from tbl_district";
                    $res=$conn->query($selQry);
                    $i=0;
                    while($row=$res->fetch_assoc())
                    {
                ?>
                <tr>
                    <td><?php echo ++$i ?></td>
                    <td><?php echo $row['district_name'] ?></td>
                    <td><a href="District.php?did=<?php echo $row['district_id']?>" class="btn btn-danger">Delete</a></td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
  
</body>
<?php
include('Foot.php');
ob_flush();
?>
</html>