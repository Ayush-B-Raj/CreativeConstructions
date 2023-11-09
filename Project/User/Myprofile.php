<?php
include("../Assets/Connection/Connection.php");
ob_start();
include('Head.php');
session_start();

?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Untitled Document</title>

    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

<div class="container mt-4">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card">
                        <div class="row no-gutters">
                            <div class="col-md-5">
                                <?php
                                    $selQry = "select * from tbl_user u inner join tbl_place p on p.place_id=u.place_id inner join tbl_district d on p.district_id=d.district_id where user_id=" . $_SESSION['uid'];
                                    $res = $conn->query($selQry);
                                    $row = $res->fetch_assoc();
                                    ?>
                                <a href="../Assets/Files/User/Photo/<?php echo $row['user_photo'] ?>" target="_blank">
                                    <img src="../Assets/Files/User/Photo/<?php echo $row['user_photo'] ?>"
                                        class="card-img-top" alt="User Photo" style="height: 100%; width:100%;">
                                </a>
                            </div>
                            <div class="col-md-13">
                                <div class="card-body">

                                    <h5 class="card-title"><strong>My Profile</strong></h5>
                                    <p class="card-text"><strong>Name:</strong>
                                        <?php echo $row['user_name'] ?>
                                    </p>
                                    <p class="card-text"><strong>Contact:</strong>
                                        <?php echo $row['user_contact'] ?>
                                    </p>
                                    <p class="card-text"><strong>Email:</strong>
                                        <?php echo $row['user_email'] ?>
                                    </p>
                                    <p class="card-text"><strong>Address:</strong>
                                        <?php echo $row['user_address'] ?>
                                    </p>
                                    <p class="card-text"><strong>Gender:</strong>
                                        <?php echo $row['user_gender'] ?>
                                    </p>
                                    <p class="card-text"><strong>District:</strong>
                                        <?php echo $row['district_name'] ?>
                                    </p>
                                    <p class="card-text"><strong>Place:</strong>
                                        <?php echo $row['place_name'] ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Include Bootstrap JS (optional) -->
       
    </body>
    <?php
include('Foot.php');
ob_flush();
?>

</html>