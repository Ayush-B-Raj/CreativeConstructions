<?php
ob_start();
include("Head.php");
include("../Assets/Connection/Connection.php");
session_start();

if(isset($_POST["btnsubmit"]))
{
		$content=$_POST["txtcontent"];
		$complainttypeid=$_POST["txt_title"];
		$insQry="insert into tbl_complaint(complaint_date,complaint_details,user_id,complaint_title)values(curdate(),'".$content."','".$_SESSION["uid"]."','".$complainttypeid."')";
		echo $insQry;
			if($conn->query($insQry))
			{	?>
            	<script>
				alert('Inserted');
				location.href='Complaint.php';
				</script>
              <?php
				
			}
			else
			{   
			?>
            	<script>
				alert('Failed');
				location.href='Complaint.php';
				</script>
                <?Php
             }
}
?>
<style>
.card-title {
      font-weight: bold;
      margin: 0 auto;
    }

    
    </style>
<body>

<form id="form1" name="form1" method="post" action="">
    <br><br><br><br>
    <div class="card">
        <div class="card-body">
            <h1 class="card-title text-center">COMPLAINT</h1>
            
            <table class="table table-bordered" align="center" >
                <tr>
                    <td width="60"><strong>Title</strong></td>
                    <td>
                        <input type="text" name="txt_title" class="form-control">
                    </td>
                </tr>
                   
                <tr>
                    <td><strong>Content</strong></td>
                    <td>
                        <textarea name="txtcontent" id="txtcontent" class="form-control" cols="45" rows="5" autocomplete="off" required></textarea>
                    </td>
                </tr>
                
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" class="btn btn-primary" />
                    </td>
                </tr>
            </table>
            
<p>&nbsp;</p>
  <?php
  $selQry="select * from tbl_complaint ";
  $rel=$conn->query($selQry);
  if($rel->num_rows>0)
  {
?>
  <table class="table table-bordered table-striped" align="center">
                <!-- Table headers -->
                <tr>
                    <td><strong>Sl.No</strong></td>
                    <td><strong>Date</strong></td>
                    <td><strong>Content</strong></td>
                    <td><strong>Reply</strong></td>
                </tr>

                <?php
                $i=0;
                while($row=$rel->fetch_assoc())
                {
                    $i++;
                ?>
                <tr>
                    <td><?php echo $i?></td> 
                    <td><?php echo $row["complaint_date"]?></td> 
                    <td><?php echo $row["complaint_details"]?></td> 
                    <td><?php echo $row["complaint_reply"]?></td> 
                </tr>
                <?php
                }
                }
                else
                {
                    echo "<h1 align='center'>No Data Found<h1>";
                }
                ?>
            </table>
        </div>
        <!-- End card-body -->
    </div>
    <!-- End card -->
</form>
</body>
<?php
include("Foot.php");
ob_flush();
?>
</html>