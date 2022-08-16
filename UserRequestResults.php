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
 
   require_once("db.php");
 
  if(isset($_GET['id'])) $ID=$_GET['id'];
  if(isset($_POST["ID"])) $ID = $_POST["ID"];
  if(isset($_POST["TitleOfJob"])) $TitleOfJob = $_POST["TitleOfJob"];
  if(isset($_POST["Date"])) $Date = $_POST["Date"];
  if(isset($_POST["TitleOfPersonProvidingTheJob"])) $TitleOfPersonProvidingTheJob = $_POST["TitleOfPersonProvidingTheJob"];
  if(isset($_POST["Supervisor"])) $Supervisor = $_POST["Supervisor"];
  if(isset($_POST["AnalysisPerformedBy"])) $AnalysisPerformedBy = $_POST["AnalysisPerformedBy"];
  if(isset($_POST["Organization"])) $Organization = $_POST["Organization"];
  if(isset($_POST["Location"])) $Location = $_POST["Location"];
  if(isset($_POST["Department"])) $Department = $_POST["Department"];
  if(isset($_POST["ReviewedBy"])) $ReviewedBy = $_POST["ReviewedBy"];
  if(isset($_POST["RequiredPPE"])) $RequiredPPE = $_POST["RequiredPPE"];
  if(isset($_POST["RequiredTraining"])) $RequiredTraining = $_POST["RequiredTraining"];
    require_once("db.php");

    if ($ID == 0) {
      $sql = "insert into acmewidgetsjha.jha_metadata(TitleOfJob,
      Date, TitleOfPersonProvidingTheJob, Supervisor, AnalysisPerformedBy, Organization, Location, Department, ReviewedBy, RequiredPPE, RequiredTraining)
              values('$TitleOfJob', '$Date', '$TitleOfPersonProvidingTheJob', '$Supervisor', '$AnalysisPerformedBy', '$Organization', '$Location',
               '$Department', '$ReviewedBy', '$RequiredPPE', '$RequiredTraining')";
      $result=$mydb->query($sql);
      if ($result==1) {
        echo "<p>Your JHA Record has been Created.</p>";
      }

      $sql = "select max(ID) as maxid from jha_metadata";
      $result = $mydb->query($sql);
      $row=mysqli_fetch_array($result);
      $ID = $row["maxid"]; 

    } else {
      $sql = "update acmewidgetsjha.jha_metadata set TitleOfJob='$TitleOfJob', Date='$Date', TitleOfPersonProvidingTheJob='$TitleOfPersonProvidingTheJob', Supervisor='$Supervisor', 
      AnalysisPerformedBy='$AnalysisPerformedBy', Organization='$Organization', Location='$Location', Department='$Department', 
      ReviewedBy='$ReviewedBy', RequiredPPE='$RequiredPPE', RequiredTraining='$RequiredTraining' where ID=$ID";
      $result=$mydb->query($sql);

      if ($result==1) {
        echo "<p>Your JHA Record has been Updated.</p>";
      }
    }

    //display the record in a table format
        echo "<table class='table is-bordered'>";
        echo "<thead>";
        echo "<th>ID</th><th>TitleOfJob</th><th>Date</th><th>TitleOfPersonProvidingTheJob</th>
              <th>Supervisor</th><th>AnalysisPerformedBy</th>
              <th>Organization</th><th>Location</th>
              <th>Department</th><th>ReviewedBy</th><th>RequiredPPE</th>
              <th>RequiredTraining</th>";
        echo "</thead>";
        echo "<tbody><td>$ID</td><td>$TitleOfJob</td><td>$Date</td>
              <td>$TitleOfPersonProvidingTheJob</td><td>$Supervisor</td><td>$AnalysisPerformedBy</td>
              <td>$Organization</td><td>$Location</td><td>$Department</td>
              <td>$ReviewedBy</td><td>$RequiredPPE</td><td>$RequiredTraining</td>";
        echo "</tbody></table>";
  ?>
    </br>
    <form action="JHA_Entry.php">
    <input type="submit" value="Enter JHA Data" />
    </form> 
    <form action="JHA_Data_Manager.php">
    <input type="submit" value="Go Back" />
    </form> 

</body>
</html>
