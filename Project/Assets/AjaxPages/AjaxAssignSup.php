<?php
include('../Connection/Connection.php');

$updQry="update tbl_site set site_status='9', supervisor_id='".$_GET['supid']."' where site_id=".$_GET['site'];
if($conn->query($updQry))
{echo " updated";
}
else
{echo " unsuccessfull";
}

?>