<?php
   $id = 0;
   $ID = 0;
   $TitleOfJob = "";
   $Date = "";
   $TitleOfPersonProvidingTheJob = "";
   $Supervisor = "";
   $AnalysisPerformedBy = "";
   $Organization = "";
   $Location = "";
   $Department = "";
   $ReviewedBy = "";
   $RequiredPPE = "";
   $RequiredTraining = "";
   $err = false;
 
  if(isset($_GET['id'])) $id=$_GET['id'];
  if(isset($_GET['rid'])) $id=$_GET['rid'];

  require_once("db.php");

  $sql = "";
  if($id==0){
    echo "Error: The selected ID value is equal to 0";
  }else {
    $sql ="select * from jha_metadata where ID=".$id;
    }
  $result = $mydb->query($sql);

  echo "<table class='table is-bordered'>";
  echo "<thead>";
  echo "<th>ID</th><th>TitleOfJob</th><th>Date</th><th>TitleOfPersonProvidingTheJob</th>
        <th>Supervisor</th><th>AnalysisPerformedBy</th>
        <th>Organization</th><th>Location</th>
        <th>Department</th><th>ReviewedBy</th><th>RequiredPPE</th>
        <th>RequiredTraining</th>";
  echo "</thead>";

    $row = mysqli_fetch_array($result);
    $id = 0;
    $ID = $row["ID"];
    $TitleOfJob = $row["TitleOfJob"];
    $Date = $row["Date"];
    $TitleOfPersonProvidingTheJob = $row["TitleOfPersonProvidingTheJob"];
    $Supervisor = $row["Supervisor"];
    $AnalysisPerformedBy = $row["AnalysisPerformedBy"];
    $Organization = $row["Organization"];
    $Location = $row["Location"];
    $Department = $row["Department"];
    $ReviewedBy = $row["ReviewedBy"];
    $RequiredPPE = $row["RequiredPPE"];
    $RequiredTraining = $row["RequiredTraining"];

    echo "<tr>";
    echo "<td>".$ID."</td><td>".$TitleOfJob."</td><td>".$Date."</td><td>".$TitleOfPersonProvidingTheJob."</td>
        <td>".$Supervisor."</td><td>".$AnalysisPerformedBy."</td>
        <td>".$Organization."</td><td>".$Location."</td><td>".$Department."</td>
        <td>".$ReviewedBy."</td><td>".$RequiredPPE."</td><td>".$RequiredTraining."</td>";
    echo "</tr>";

  ?>

<html>
<head>
  <style>
        table, th, td {
        border: 1px solid black;
        }
        table {
        border-collapse: collapse;
        empty-cells: show;
        }
        table {margin-top: 2em;}
        th { background-color: lightslategray;}
        td {
        height: 20px;
        background-color: white;
        }
    </style>

</head>
</html>
