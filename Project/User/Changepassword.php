<?php
include("../Assets/Connection/Connection.php");
ob_start();
include('Head.php');
session_start();
if(isset($_POST['btn_update']))
{
    $selQry = "select * from tbl_user where user_id=" . $_SESSION['uid'];
    $res = $conn->query($selQry);
    $row = $res->fetch_assoc();
    
    $OLD=$_POST['txt_oldpass'];
    $NEW=$_POST['txt_newpass'];
    $CRM=$_POST['txt_confirmpass'];
    if($row['user_password']==$OLD){
      
       if($NEW==$CRM){
      
        $insQR="update tbl_user set user_password='$NEW' where user_id='". $_SESSION['uid']."'";
        $res = $conn->query($insQR);


       
       }
       else{
        echo "Invalid New Password";
       }
	     }
       else{
        echo "Invalid current Password";
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
        <form id="form1" name="form1" method="post" action=""> 
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Password Update</div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="txt_oldpass">OLD PASSWORD</label>
        <input type="password" class="form-control" name="txt_oldpass" id="txt_oldpass" required="required" pattern="(?=.\d)(?=.[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
      </div>
      <div class="form-group">
                                <label for="txt_newpass">NEW PASSWORD</label>
        <input type="password" class="form-control" name="txt_newpass" id="txt_newpass" required="required" pattern="(?=.\d)(?=.[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
      </div>
      <div class="form-group">
        <label for="txt_confirmpass">CONFIRM PASSWORD</label>
        <input type="password" class="form-control" name="txt_confirmpass" id="txt_confirmpass">
      </div>
      </div>
      <div class="card-footer text-center">

      <input type="submit" class="btn btn-primary" name="btn_update" id="btn_update"
                                value="UPDATE" />
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