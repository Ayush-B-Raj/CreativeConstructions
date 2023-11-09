<?php
session_start();
include("../Assets/Connection/Connection.php");
ob_start();
include('Head.php');

if(isset($_POST['btn_save']))
{

$cname=$_POST['txt_name'];
$ccontact=$_POST['txt_contact'];
$cmail=$_POST['txt_mail'];
$caddress=$_POST['txt_address'];
$selQryw="update tbl_user set user_name='$cname', user_contact='$ccontact',user_email='$cmail', user_address='$caddress' where user_id=" .$_SESSION['uid'];

$conn->query($selQryw);
}

$selQry = "select * from tbl_user where user_id=".$_SESSION['uid'];
$res = $conn->query($selQry);
$row = $res->fetch_assoc();

?>

<!DOCTYPE html>
<head>

</head>
<body>
<div class="container mt-5">
        <form name="form1" method="post" action="">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Edit User Information</div>
                        <div class="card-body">
                        <div class="form-group">
                                <label for="txt_changename">CHANGE NAME</label>
            <input type="text" class="form-control" name="txt_name" required="required" id="txt_changename" value="<?php echo $row['user_name']?>">
  </div>
  <div class="form-group">
  <label for="txt_changecontact">CHANGE CONTACT</label>
            <input type="text" class="form-control" name="txt_contact" required="required" id="txt_changecontact" value="<?php echo $row['user_contact']?>">
  </div>
  <div class="form-group">
  <label for="txt_changeemail">CHANGE EMAIL</label>
            <input type="email" class="form-control" name="txt_mail" required="required" id="txt_changeemail" value="<?php echo $row['user_email']?>">
  </div>
  <div class="form-group">
  <label for="txt_changeaddress">CHANGE ADDRESS</label>
            <input type="text" class="form-control" name="txt_address" required="required" id="txt_changeaddress" value="<?php echo $row['user_address']?>">
  </div>
  <div class="card-footer text-center">
            <input type="submit" class="btn btn-primary" name="btn_save" id="btn_save" value="SAVE">
  </div>
  </div>
                </div>
            </div>
        </form>
    </div>

</body>
<?php
include('Foot.php');
ob_flush();
?>

</html>