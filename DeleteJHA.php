<?php
$ID=0;
if(isset($_GET['id'])) $ID = $_GET['id'];

require_once("db.php");

//The following code is an example of a method to significantly reduce the odds of a sql injection.
$conn = $mydb->getConnectionVariable();
$stmt = mysqli_stmt_init($conn);

$stmt = $conn->prepare("DELETE FROM jha_metadata WHERE ID=?");

$stmt->bind_param('i', $ID);
$stmt->execute();

echo "Your JHA has been Sucessfully Deleted.";

?>
</html>