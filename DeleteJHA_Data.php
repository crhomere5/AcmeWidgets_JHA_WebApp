<?php
$ID=0;
if(isset($_GET['id'])) $ID=$_GET['id'];

require_once("db.php");
$query = "DELETE FROM jha_data WHERE ID=$ID";
$result = $mydb->query($query);

if($result == 1){
  echo "Your JHA Data has been Sucessfully Deleted.";
}
else{
  echo "A database error has occured.";
}
?>
</html>