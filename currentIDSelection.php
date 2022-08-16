<?php
  $JHA_ID = 0;
  $err = false;
 
  if(isset($_GET['id'])) $JHA_ID=$_GET['id'];
  require_once("db.php");

  $sql = "";
  if($JHA_ID==0){
    echo "Error: The selected ID value is equal to 0";
  }else {
    $sql ="select ID from jha_data where jha_ID='".$JHA_ID."' order by ID";
    }
  $result = $mydb->query($sql);

  $arr = array();
    while ($row=mysqli_fetch_array($result)) {
        $arr[] = $row['ID'];
    }

    echo json_encode($arr);

  ?>
