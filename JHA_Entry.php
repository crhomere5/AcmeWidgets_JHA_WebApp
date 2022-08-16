<?php
  $id = 0;
  $ID = 0;
  $JHA_ID = 1;
  $StepNumber = 1;
  $Step = "";
  $PotentialHazards = "";
  $Controls = "";
  $err = false;

  require_once('db.php');
  if (isset($_POST["submit"])) {
      if(isset($_POST["ID"])) $ID = $_POST["ID"];
      if(isset($_POST["jha_ID"])) $JHA_ID = $_POST["jha_ID"];
      if(isset($_POST["StepNumber"])) $StepNumber = $_POST["StepNumber"];
      if(isset($_POST["Step"])) $Step = $_POST["Step"];
      if(isset($_POST["PotentialHazards"])) $PotentialHazards = $_POST["PotentialHazards"];
      if(isset($_POST["Controls"])) $Controls = $_POST["Controls"];

      if ($JHA_ID > 0 && $StepNumber > 0 && !empty($Step) 
      && !empty($PotentialHazards) && !empty($Controls)) {
        header("HTTP/1.1 307 Temprary Redirect");
        header("Location: UserRequestDataResults.php");
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
        document.getElementById('pageActionTitle').innerHTML = "Enter New JHA Data";
        document.getElementById('deleteBtn').hidden = true;
        document.getElementById('contentArea').hidden = true;
        document.getElementById('submitAndUpdate').value = "Submit";

      }else if(document.getElementById('Modify').checked) {
        document.getElementById('id').disabled = false;
        document.getElementById('id').placeholder = "Enter JHA ID";
        document.getElementById('pageActionTitle').innerHTML = "Modify Existing JHA Data";
        document.getElementById('deleteBtn').hidden = false;
        document.getElementById('contentArea').hidden = false;
        document.getElementById('submitAndUpdate').value = "Update";

      }
    }

    $(function(){
      $("#jha_ID").on('change', function(){
        $id = $("#jha_ID").val();

        $.ajax({
          url:"currentIDSelection.php?id=" + $id,
          async:true,
          success: function(result){
            var opts = $.parseJSON(result);

            $("#id").html('');
            for(var i=0; i< opts.length;i++){
              if(i == 0){
                $('#id').append('<option value=></option>');
              }
              $('#id').append('<option value="' + opts[i] + '">' + opts[i] + '</option>');
            };

          }
        })

        $.ajax({
          url:"UpdateJHA_Data.php?id=" + $id,
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
        console.log($id);

        $.ajax({
          url:"DeleteJHA_Data.php?id=" + $id,
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

<body onload="actionSelection()">

<img src="AcmeWidgetLogo.png" class="picture" width="375" length="375">
<h1 id='pageActionTitle' class="is-size-2 ml-6"></h1>
<p id="contentArea" class="ml-6" hidden></p>

<div id="container" class="ml-6">
   <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">

   <div  onchange= "actionSelection()">
    <input type="radio" id="Create" name="ActionSelection" value="Enter New JHA Data" checked>
    <label for="Create">Enter New JHA Data</label>
    <input type="radio" id="Modify" name="ActionSelection" value="Modify Existing JHA Data">
    <label for="Modify">Modify Existing JHA Data</label><br><br>   
  </div>

    <label>JHA ID:
      <select id="jha_ID" name="jha_ID" placeholder="Auto Assigned">

        <option value="<?php 
        $sql = "select max(ID) as maxid from jha_metadata";
        $result = $mydb->query($sql);
        $row=mysqli_fetch_array($result);
        $jha_ID = $row["maxid"];
        echo $jha_ID; ?>"></option>;

      <?php
        $sql = "select ID from jha_metadata order by ID";
        $result = $mydb->query($sql);
        while($row=mysqli_fetch_array($result)){

          if($row["ID"] == $jha_ID){
            echo "<option value='".$row["ID"]."'selected=\"selected\">".$row["ID"]." </option>";
          }

          else{
            echo "<option value='".$row["ID"]."'>".$row["ID"]."</option>";
          }
          
        }
      ?>
      </select>

    </label>
    <br />
    <br>

    <label>JHA Data ID:
      <select id="id" name="ID" placeholder="Auto Assigned">
        <option value=""></option>
      </select>
    </label>
    <br />
    <br>

   <label>Step Number:
     <input type="number" name="StepNumber" min=1 value="<?php echo $StepNumber; ?>" />
     <?php
       if ($err && empty($StepNumber)) {
         echo "<label class='errlabel'>Error: Please enter the Step Number.</label>";
       }
    ?>
  </label>
   <br />
   <br>

   <label>Step:
     <input id="Step" type="text" class="level" name="Step" value="<?php echo $Step; ?>" />
     <?php
       if ($err && empty($Step)) {
         echo "<label class='errlabel'>Error: Please enter the Step Information.</label>";
       }
    ?>
  </label>
   <br />
   <br>

 <label>Potential Hazards:
     <textarea name="PotentialHazards" class="textarea" value="<?php echo $PotentialHazards; ?>" ></textarea>
     <?php
       if ($err && empty($PotentialHazards)) {
         echo "<label class='errlabel'>Error: Please enter any potential hazards associated with the job.</label>";
    }
    ?>
  </label>

  <br />
   <br>
  <label>Controls:
     <textarea name="Controls" class="textarea" value="<?php echo $Controls; ?>" ></textarea>
     <?php
       if ($err && empty($Controls)) {
         echo "<label class='errlabel'>Error: Please enter the controls for this JHA or write 'none'.</label>";
    }
    ?>
    
  </label>
  <br>

     <input id="submitAndUpdate" type="submit" name="submit" value="Submit" class="button is-primary is-small"/>
     <input id="deleteBtn" type="button" name="delete" value="Delete" hidden/>
   </form>
  </div>
  
  <form action="JHA_Data_Manager.php" class="ml-6">
    <input type="submit" value="Go Back" />
    <button type="button">Reload page</button>
  </form> 
  
 </body>
