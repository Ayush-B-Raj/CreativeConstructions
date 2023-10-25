<?php
session_start();
include("../Assets/Connection/Connection.php");
ob_start();
include('Head.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
  <div class="container mt-5">
    <?php
    $selQry = "select * from tbl_update where site_id=" . $_GET['dide'];
    $res = $conn->query($selQry);
    $i = 0;
    ?>
    <table class="table table-bordered">
      <thead class="thead-dark">
        <tr>
          <th>SL No</th>
          <th>Date</th>
          <th>Time</th>
          <th>Details</th>
          <th>Image</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($row = $res->fetch_assoc()) {
          ?>
          <tr>
            <td><?php echo ++$i ?></td>
            <td><?php echo $row['update_date'] ?></td>
            <td><?php echo $row['update_time'] ?></td>
            <td><?php echo $row['update_details'] ?></td>
            <td><img src="../Assets/Files/Update/Photo/<?php echo $row['update_image'] ?>" height="300" /></td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
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