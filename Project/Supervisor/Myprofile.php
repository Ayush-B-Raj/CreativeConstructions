<?php
include("../Assets/Connection/Connection.php");
ob_start();
include('Head.php');
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card">
                    <div class="row no-gutters"> 
                    <div class="col-md-5">
        <?php
        $selQry = "select * from tbl_supervisor u inner join tbl_place p on p.place_id=u.place_id inner join tbl_district d on p.district_id=d.district_id where supervisor_id=" . $_SESSION['sid'];
        $res = $conn->query($selQry);
        $row = $res->fetch_assoc();
        ?>
        <a href="../Assets/FilesSupervisor/Photo/<?php echo $row['supervisor_photo'] ?>" target="_blank">
        <img src="../Assets/Files/Supervisor/Photo/<?php echo $row['supervisor_photo'] ?>" class="card-img-top" alt="Supervisor Photo" style="height: 100%; width:100%;">
    </a>
</div>
                        <div class="col-md-13">
                            <div class="card-body">
                            
                                <h5 class="card-title"><strong>My Profile</strong></h5>
                                <p class="card-text"><strong>Name:</strong> <?php echo $row['supervisor_name'] ?></p>
                                <p class="card-text"><strong>Contact:</strong> <?php echo $row['supervisor_contact'] ?></p>
                                <p class="card-text"><strong>Email:</strong> <?php echo $row['supervisor_email'] ?></p>
                                <p class="card-text"><strong>Address:</strong> <?php echo $row['supervisor_address'] ?></p>
                                <p class="card-text"><strong>Gender:</strong> <?php echo $row['supervisor_gender'] ?></p>
                                <p class="card-text"><strong>District:</strong> <?php echo $row['district_name'] ?></p>
                                <p class="card-text"><strong>Place:</strong> <?php echo $row['place_name'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>  

    <!-- Include Bootstrap JS (optional) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
<?php
include('Foot.php');
ob_flush();
?>
</html>