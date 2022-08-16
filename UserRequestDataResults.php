<!doctype html>
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
<body>
  <?php
   $ID = 0;
   $JHA_ID = 0;
   $StepNumber = 0;
   $Step = "";
   $PotentialHazards = "";
   $Controls = "";
  $err = false;
 
   require_once("db.php");
 
  if(isset($_GET['id'])) $ID=$_GET['id'];
  if(isset($_POST["ID"])) $ID = $_POST["ID"];
  if(isset($_POST["jha_ID"])) $JHA_ID = $_POST["jha_ID"];
  if(isset($_POST["StepNumber"])) $StepNumber = $_POST["StepNumber"];
  if(isset($_POST["Step"])) $Step = $_POST["Step"];
  if(isset($_POST["PotentialHazards"])) $PotentialHazards = $_POST["PotentialHazards"];
  if(isset($_POST["Controls"])) $Controls = $_POST["Controls"];
  require_once("db.php");

    if ($ID == 0) {
      $sql = "insert into acmewidgetsjha.jha_data(jha_ID,
      StepNumber, Step, PotentialHazards, Controls)
              values('$JHA_ID', '$StepNumber', '$Step', '$PotentialHazards', '$Controls')";
      $result=$mydb->query($sql);
      if ($result==1) {
        echo "<p>Your JHA Data has been Entered.</p>";
      }

      $sql = "select max(ID) as maxid from jha_data";
      $result = $mydb->query($sql);
      $row=mysqli_fetch_array($result);
      $ID = $row["maxid"]; 

    } else {
      $sql = "update acmewidgetsjha.jha_data set jha_ID='$JHA_ID', StepNumber='$StepNumber', Step='$Step',
      PotentialHazards='$PotentialHazards', Controls='$Controls' where ID=$ID";
      $result=$mydb->query($sql);

      if ($result==1) {
        echo "<p>Your JHA Data has been Updated.</p>";
      }
    }

    //display the record in a table format
        echo "<table class='table is-bordered'>";
        echo "<thead>";
        echo "<th>ID</th><th>jha_ID</th><th>StepNumber</th><th>Step</th>
              <th>PotentialHazards</th><th>Controls</th>";
        echo "</thead>";
        echo "<tbody><td>$ID</td><td>$JHA_ID</td><td>$StepNumber</td><td>$Step</td><td>$PotentialHazards</td>
              <td>$Controls</td>";
        echo "</tbody></table>";
  ?>
    </br>
    <form action="JHA_Entry.php">
    <input type="submit" value="Enter More JHA Data" />
    </form> 

</body>
</html>
