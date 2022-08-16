<?php
  $id = 0;
  $JHA_ID = 0;
  $StepNumber = 0;
  $Step = "";
  $PotentialHazards = "";
  $Controls = "";
  $err = false;
 
  if(isset($_GET['id'])) $jha_id=$_GET['id'];
  require_once("db.php");

  $sql = "";
  if($jha_id==0){
    echo "Error: The selected ID value is equal to 0";
  }else {
    $sql ="select * from jha_data
           where jha_ID='".$jha_id."
           'order by StepNumber";
    }
  $result = $mydb->query($sql);

  echo "<table class='table is-bordered'>";
  echo "<thead>";
  echo "<th>ID</th><th>JHA_ID</th><th>Step #</th><th>Step</th>
        <th>Potential Hazards</th><th>Controls</th>";
  echo "</thead>";

    while ($row = mysqli_fetch_array($result)){
        $ID = $row["ID"];
        $JHA_ID = $row["jha_ID"];
        $StepNumber = $row["StepNumber"];
        $Step = $row["Step"];
        $PotentialHazards = $row["PotentialHazards"];
        $Controls = $row["Controls"];

        echo "<tr>";
        echo "<td>".$ID."</td><td>".$JHA_ID."</td><td>".$StepNumber."</td><td>".$Step."</td>
            <td>".$PotentialHazards."</td><td>".$Controls."</td>";
        echo "</tr>";
    }

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
