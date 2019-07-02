<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
  <script type="text/javascript">

     var tcounter = 0;
     var dcounter = 0;
     var myhead = [];

     function addTitle(divName){
      if(tcounter==1){
        alert("A form can have only one name");
      }
      else{
        var name = document.getElementById('text');
          var newdiv = document.createElement('div');
          newdiv.innerHTML = name.value;
          document.getElementById(divName).appendChild(newdiv);
          name.value="";
          tcounter++;
      }
     }
     function addDescription(divName){
      if(dcounter==1){
        alert("A form can have only one description field");
      }
      else{
        var name = document.getElementById('text');
          var newdiv = document.createElement('div');
          newdiv.innerHTML = name.value;
          document.getElementById(divName).appendChild(newdiv);
          name.value="";
          dcounter++;
      }
     }
     function addText(divName){
          var name = document.getElementById('text');
          myhead.push(name);
          var newdiv = document.createElement('div');
          newdiv.innerHTML = name.value + " <br><input type='text' name='myInputs[]'>";
          document.getElementById(divName).appendChild(newdiv);
          name.value="";
     }
     function addRadio(divName){
          var name = document.getElementById('text');
          myhead.push(name);
          var newdiv = document.createElement('div');
          newdiv.innerHTML = name.value + " <input type='radio' name='myInputs[]'>";
          document.getElementById(divName).appendChild(newdiv);
          name.value="";
     }
     function addCheckbox(divName){
          var name = document.getElementById('text');
          myhead.push(name);
          var newdiv = document.createElement('div');
          newdiv.innerHTML = name.value + " <input type='checkbox' name='myInputs[]'>";
          document.getElementById(divName).appendChild(newdiv);
          name.value="";
     }
     function addTextarea(divName){
          var name = document.getElementById('text');
          myhead.push(name);
          var newdiv = document.createElement('div');
          newdiv.innerHTML = name.value + " <br><textarea name='myInputs[]'>type here...</textarea>";
          document.getElementById(divName).appendChild(newdiv);
          name.value="";
     }

</script>
</head>
<body>

<div class="header">
	<h2>Home Page</h2>
</div>
<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
    	<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
    <?php endif ?>
</div>
    <form method="POST" action="submit.php">
      <div class="header1">
        <h2>Web Form</h2>
      </div>  
       <div id="dynamicInput">
       </div>
       <input type="text" name="myhead" id="text">
       <input type="button" value="Add title" onClick="addTitle('dynamicInput');">
       <input type="button" value="Add description" onClick="addDescription('dynamicInput');">       
       <input type="button" value="Add text input" onClick="addText('dynamicInput');">
       <input type="button" value="Add radio input" onClick="addRadio('dynamicInput');">
       <input type="button" value="Add checkbox input" onClick="addCheckbox('dynamicInput');">
       <input type="button" value="Add textarea input" onClick="addTextarea('dynamicInput');">
       <input type="submit" name="submit" value="save form">
    </form>
		
</body>
</html>
