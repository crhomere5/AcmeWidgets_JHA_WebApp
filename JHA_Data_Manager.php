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

  require_once('db.php');
  if (isset($_POST["submit"])) {
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

      if (!empty($TitleOfJob) && !empty($Date)
      && !empty($TitleOfPersonProvidingTheJob) && !empty($Supervisor) 
      && !empty($AnalysisPerformedBy) && !empty($Organization) && !empty($Location) && !empty($Department) && !empty($ReviewedBy)
      && !empty($RequiredPPE) && !empty($RequiredTraining)) {
        header("HTTP/1.1 307 Temprary Redirect");
        header("Location: UserRequestResults.php");
      } else {
        $err = true;
      }
    }

 ?>


<head>
<title>Navigation Menu</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <script src="jquery-3.1.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.2/css/bulma.min.css">
    <link href = "https://unpkg.com/ionicons@4.3.0/dist/css/ionicons.min.css" rel = "stylesheet">
    <script src = "https://use.fontawesome.com/releases/v5.1.0/js/all.js"></script>
    <script src = "https://unpkg.com/ionicons@4.3.0/dist/ionicons.js"></script>
    <link rel = "stylesheet" href = "https://cdn.materialdesignicons.com/2.1.19/css/materialdesignicons.min.css">

    <style type = "text/css">
      body      {background-color : lightgray;}
      p {color : black;
          font-family   : Calibri;
          font-style    : normal;
          font-weight   : 450;
          font-size     : 16pt;
          margin-left   : .25in;
      }

      .picture{  margin-right: .25in;
                      margin-left: .25in;
                      margin-top: .25in;
                  }

      .ml-6{  margin-right: .25in;
                      margin-left: .25in;
                      margin-top: .25in;
                  }

      </style>
  
  <script>

    function actionSelection(){
      if(document.getElementById('Create').checked) {
        document.getElementById('id').disabled = true;
        document.getElementById('pageActionTitle').innerHTML = "Create New JHA";
        document.getElementById('deleteBtn').hidden = true;
        document.getElementById('contentArea').hidden = true;
        document.getElementById('submitAndUpdate').value = "Submit";

      }else if(document.getElementById('Modify').checked) {
        document.getElementById('id').disabled = false;
        document.getElementById('id').placeholder = "Enter JHA ID";
        document.getElementById('pageActionTitle').innerHTML = "View/Modify Existing JHA";
        document.getElementById('deleteBtn').hidden = false;
        document.getElementById('contentArea').hidden = false;
        document.getElementById('submitAndUpdate').value = "Update";

      }
    }

    $(function(){
      $("#id").on('change', function(){
        $id = $("#id").val();

        $.ajax({
          url:"UpdateJHA.php?id=" + $id,
          async:true,
          success: function(result){
            $("#contentArea").html(result);
          }
        })
      }).trigger('change');
    })

    $(function(){
      $("#deleteBtn").click(function(){
        $id = $("#id").val();

        $.ajax({
          url:"DeleteJHA.php?id=" + $id,
          async:true,
          success: function(result){
            $("#container").html("");
            $("#contentArea").html(result);
          }
        })
      })
    })

    $(document).ready(function(){
        $("button").click(function(){
            location.reload(true);
        });
    });
    
  </script>
</head>

<body onload="actionSelection()" >

<img src="AcmeWidgetLogo.png" class="picture" width="375" length="375">
<h1 id='pageActionTitle' class="is-size-2 ml-6" ></h1>
<p id="contentArea" hidden></p>

<div id="container" class="ml-6">
   <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
   <div  onchange= "actionSelection()">

    <input type="radio" id="Create" name="ActionSelection" value="Create New JHA" checked>
    <label for="Create">Create New JHA</label>
    <input type="radio" id="Modify" name="ActionSelection" value="View/Modify Existing JHA">
    <label for="Modify">View/Modify Existing JHA</label><br><br>   
   </div>

    <label>ID:
      <select id="id" name="ID" placeholder="Auto Assigned"
      disabled>
      <?php
        $sql = "select ID from jha_metadata order by ID";
        $result = $mydb->query($sql);
        while($row=mysqli_fetch_array($result)){
          echo "<option value='".$row["ID"]."'>".$row["ID"]."</option>";
        }
      ?>
      </select>
    </label>
    <br />
    <br>

   <label>Title of Job:
     <input id="titleOfJob" type="text" name="TitleOfJob" placeholder="Enter Title of Job" value="<?php echo $TitleOfJob; ?>" />
     <?php
       if ($err && empty($TitleOfJob)) {
         echo "<label class='errlabel'>Error: Please enter the Title of the Job.</label>";
       }
    ?>
  </label>
   <br />
   <br>

   <label>Date:
     <input id="date" type="date" name="Date" placeholder="Date" value="<?php echo $Date; ?>" />
     <?php
       if ($err && empty($Date)) {
         echo "<label class='errlabel'>Error: Please enter the Date of the Job.</label>";
       }
    ?>
  </label>
   <br />
   <br>

 <label>Title of Person Performing the Job:
     <input type="text" name="TitleOfPersonProvidingTheJob" placeholder="Title Of Person Providing The Job" value="<?php echo $TitleOfPersonProvidingTheJob; ?>" />
     <?php
       if ($err && empty($TitleOfPersonProvidingTheJob)) {
         echo "<label class='errlabel'>Error: Please enter the Title Of the Person Providing The Job.</label>";
    }
    ?>
  </label>

  <br />
   <br>
  <label>Supervisior:
     <input type="text" name="Supervisor" placeholder="Supervisor" value="<?php echo $Supervisor; ?>" />
     <?php
       if ($err && empty($Supervisor)) {
         echo "<label class='errlabel'>Error: Please enter the name of the supervisor.</label>";
    }
    ?>
  </label>

  <br />
   <br>
  <label>Analysis Performed by:
     <input type="text" name="AnalysisPerformedBy" placeholder="Analysis Performed By" value="<?php echo $AnalysisPerformedBy; ?>" />
     <?php
       if ($err && empty($AnalysisPerformedBy)) {
         echo "<label class='errlabel'>Error: Please enter who the analysis was performed by</label>";
    }
    ?>
  </label>

  <br />
   <br>
  <label>Organization:
     <input type="text" name="Organization" placeholder="Organization" value="<?php echo $Organization; ?>" />
     <?php
       if ($err && empty($Organization)) {
         echo "<label class='errlabel'>Error: Please enter your Organization.</label>";
    }
    ?>
  </label>

  <br />
   <br>
  <label>Location:
     <input type="text" name="Location" placeholder="Location" value="<?php echo $Location; ?>" />
     <?php
       if ($err && empty($Location)) {
         echo "<label class='errlabel'>Error: Please enter your Location.</label>";
    }
    ?>
  </label>
 
  <br />
   <br>
  <label>Department:
     <input type="text" name="Department" placeholder="Department" value="<?php echo $Department; ?>" />
     <?php
       if ($err && empty($Department)) {
         echo "<label class='errlabel'>Error: Please enter your Department.</label>";
    }
    ?>
  </label>
     <br />
     <br>
     <label>Reviewed By:
     <input type="text" name="ReviewedBy" placeholder="Reviewed By" value="<?php echo $ReviewedBy; ?>" />
     <?php
       if ($err && empty($ReviewedBy)) {
         echo "<label class='errlabel'>Error: Please enter who reviewed this JHA.</label>";
    }
    ?>
     </label>
     <br />
     <br>
     <label>Required PPE:
     <input type="text" name="RequiredPPE" placeholder="Required PPE" value="<?php echo $RequiredPPE; ?>" />
     <?php
       if ($err && empty($RequiredPPE)) {
         echo "<label class='errlabel'>Error: Please enter the Required PPE.</label>";
    }
    ?>
     </label>
     <br />
     <br>
     <label>Required Training:
     <input type="text" name="RequiredTraining" placeholder="RequiredTraining" value="<?php echo $RequiredTraining; ?>" />
     <?php
       if ($err && empty($RequiredTraining)) {
         echo "<label class='errlabel'>Error: Please enter the training required to complete this task.</label>";
    }
    ?>
     </label>
     
     <input id="submitAndUpdate" class="button is-primary is-small" type="submit" name="submit" value="Submit" />
     <input id="deleteBtn" type="button" name="delete" value="Delete" hidden/>
   </form>
  </div>
  <form action="JHA_Entry.php" class="ml-6">
    <input type="submit" value="Enter JHA Data" />
    <button type="button">Reload page</button>
  </form> 
 </body>
