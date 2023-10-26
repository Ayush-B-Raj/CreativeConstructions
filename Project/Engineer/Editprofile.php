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
$selQryw="update tbl_engineer set engineer_name='$cname', engineer_contact='$ccontact',engineer_email='$cmail', engineer_address='$caddress' where engineer _id=" .$_SESSION['eid'];

$conn->query($selQryw);
}

$selQry = "select * from tbl_engineer  where engineer_id=".$_SESSION['eid'];
$res = $conn->query($selQry);
$row = $res->fetch_assoc();

?>

<!DOCTYPE html>
<html>

<body>
    <div class="container mt-5">
        <form name="form1" method="post" action="">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Edit Engineer Information</div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="txt_changename">CHANGE NAME</label>
                                <input type="text" class="form-control" name="txt_name" required id="txt_changename"
                                    value="<?php echo $row['engineer_name'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="txt_changecontact">CHANGE CONTACT</label>
                                <input type="text" class="form-control" name="txt_contact" required
                                    id="txt_changecontact" value="<?php echo $row['engineer_contact'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="txt_changeemail">CHANGE EMAIL</label>
                                <input type="email" class="form-control" name="txt_mail" required
                                    id="txt_changeemail" value="<?php echo $row['engineer_email'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="txt_changeaddress">CHANGE ADDRESS</label>
                                <input type="text" class="form-control" name="txt_address" required
                                    id="txt_changeaddress" value="<?php echo $row['engineer_address'] ?>">
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <input type="submit" class="btn btn-primary" name="btn_save" id="btn_save" value="SAVE">
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