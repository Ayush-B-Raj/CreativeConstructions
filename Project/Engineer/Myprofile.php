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
  <div class="container mt-5">
    <table class="table table-bordered">
      <thead class="thead-dark">
        <tr>
          <th>Name</th>
          <th>Contact</th>
          <th>Email</th>
          <th>Gender</th>
          <th>Address</th>
          <th>District</th>
          <th>Place</th>
          <th>Photo</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $selQry = "select * from tbl_engineer u inner join tbl_place p on p.place_id=u.place_id inner join tbl_district d on p.district_id=d.district_id where engineer_id=" . $_SESSION['eid'];
        $res = $conn->query($selQry);
        $row = $res->fetch_assoc();
        ?>
        <tr>
          <td><?php echo $row['engineer_name'] ?></td>
          <td><?php echo $row['engineer_contact'] ?></td>
          <td><?php echo $row['engineer_email'] ?></td>
          <td><?php echo $row['engineer_gender'] ?></td>
          <td><?php echo $row['engineer_address'] ?></td>
          <td><?php echo $row['district_name'] ?></td>
          <td><?php echo $row['place_name'] ?></td>
          <td><img src="../Assets/Files/Engineer/Photo/<?php echo $row['engineer_photo'] ?>" height="300" /></td>
        </tr>
      </tbody>
    </table>
  </div>

  <!-- Include Bootstrap JS (optional) -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
<?php
include('Foot.php');
ob_flush();
?>
</html>