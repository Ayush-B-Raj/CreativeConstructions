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
<form id="form1" name="form1" method="post" action="">
  <br><br><br><br>
  <div id="tab">
 <h1 align="center">Complaint</h1>
 
    <table  align="center" width="449" border="1">
      <tr>
        <td width="60">Title</td>
        <td>
            <input type="text" name="txt_title" >

        </td>
    </tr>
       
      <tr>
        <td>Content</td>
        <td><label for="txtcontent"></label>
        <textarea name="txtcontent" id="txtcontent" cols="45" rows="5" autocomplete="off" required></textarea></td>
      </tr>
      <tr>
        <td align="center"colspan="2"><input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" /></td>
      </tr>
    </table>
<p>&nbsp;</p>
  <?php
  $selQry="select * from tbl_complaint ";
  $rel=$conn->query($selQry);
  if($rel->num_rows>0)
  {
?>
  <table align="center" border="1">
    <tr>
      <td>Sl.No</td>
      <td>Date</td>
       <td>Content</td>
      <td>Replay</td>
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
  <p>&nbsp;</p>
</form>
</div>
</body>
<?php
include("Foot.php");
ob_flush();
?>
</html>