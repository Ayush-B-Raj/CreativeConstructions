<?php
include('../Connection/Connection.php');

$updQry="update tbl_site set site_status='3', engineer_id='".$_GET['eid']."' where site_id=".$_GET['sid'];
if($conn->query($updQry))
{echo " updated";
}
else
{echo " unsuccessfull";
}

?>