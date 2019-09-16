<?php

$firstname = filter_input(INPUT_POST, 'firstname');
$lastname = filter_input(INPUT_POST, 'lastname');
$stateid = filter_input(INPUT_POST, 'stateid');
$phone = filter_input(INPUT_POST, 'phone');
$dateofbirth = filter_input(INPUT_POST, 'dateofbirth');
$message = "";
if(!empty($firstname)){
    if(!empty($lastname)){
        if(!empty($stateid)){
            if(!empty($phone)){
           if(!empty($dateofbirth)){
               $host = "localhost";
               $dbusername = "root";
               $dbpassword = "";
               $dbname = "poswebsite";

               $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
               if(mysqli_connect_error()){
                   die('Connect Error ('.mysqli_connect_errno() .')'
                   . mysqli_connect_error());
               }
               else{
                   $sql = "INSERT INTO customers (firstname, lastname, stateid, phone, dateofbirth)
                   values ('$firstname', '$lastname', '$stateid', '$phone', '$dateofbirth')";
                   if($conn->query($sql)){
                        header( 'Location: patientlist.html' );
                   }else{
                        
                        $message = "* This State ID already exists";
                   }
                   $conn->close();
                }
            }else{
                $message = "* All Fields Must Be Filled Out";
                
           }
        }else{
            $message = "* All Fields Must Be Filled Out";
        }
        }else{
            $message = "* All Fields Must Be Filled Out";
        }
    }else{
        $message = "* All Fields Must Be Filled Out";
    }
}else{
    $message = "* All Fields Must Be Filled Out";
}

?>





<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ELAC's POS</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
	<link href="style.css" rel="stylesheet">

	<style>
		body {
		  background-image: url("img/random.png");
		  background-position: 50% 50%;
		  background-repeat: repeat;
		}
	</style>

	<style>
		html,body,h1,h2,h4,h3,h5, {
		font-family: Arial, Helvetica, sans-serif;
        }
        h6 {
        color: crimson;
        font-family: "Times New Roman", Times, serif;
        }
	</style>
</head>
<body>

<h1><b>Dashboard</b></h1>
<!-- Navigation -->
<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
<div class="container-fluid">
	<a class="navbar-brand" href="pos.html"><img src="img/shoplogo.jpg" height="55" width="75"></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse"
	data-target="#navbarResponsive">
	<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarResponsive">
		<ul class="navbar-nav ml-auto">
			<li class="nav-item active">
				<a class="nav-link" href="index.html">Home</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="index.html">About</a>
			</li>
			<li class="nav-item">
					<a class="nav-link" href="#">Services</a>
			</li>
			<li class="nav-item">
					<a class="nav-link" href="#">Settings</a>
			</li>
			<li class="nav-item">
					<a class="nav-link" href="login.html">Logout</a>
			</li>	
		</ul>
	</div>
</div>
</nav>	

<!--side bar-->
<div class="tab">
	<button class="tablinks" onclick="openCity(event, 'patients')" id="defaultOpen">
		<i class="fas fa-user" style='font-size:24px;color:rgb(4, 6, 129)'></i>
		<p>Patients</p>
		
	</button>
	<button class="tablinks" onclick="openCity(event, 'register')">
		<i class="fas fa-barcode" style='font-size:24px;color:rgb(4, 6, 129)'></i>
		<p>Register</p>
	</button>
	<button class="tablinks" onclick="openCity(event, 'inventory')">
		<i class="fas fa-box" style='font-size:24px;color:rgb(4, 6, 129)'></i>
		<p>Inventory</p>
		
	</button>
	<button class="tablinks" onclick="openCity(event, 'settings')">
		<i class="fas fa-cog" style='font-size:24px;color:rgb(4, 6, 129)'></i>
		<p>Settings</p>
	
	</button>
</div>
	  
	  <div id="patients" class="tabcontent">
			<h5><a class="nav-link" href="patientlist.html">Patients List</a></h5>
			<h5><a class="nav-link" href="#">Add Patient</a></h5>
	  </div>
	  
	  <div id="register" class="tabcontent">
			<h5><a class="nav-link" href="#">Register</a></h5> 
	  </div>
	  
	  <div id="inventory" class="tabcontent">
			<h5><a class="nav-link" href="#">Product List</a></h5>
			<h5><a class="nav-link" href="#">Add New Product</a></h5>
			<h5><a class="nav-link" href="#">Orders</a></h5>
	  </div>

	  <div id="settings" class="tabcontent">
			<h5><a class="nav-link" href="#">settings</a></h5>
		</div>
	  
	  <script>
	  function openCity(evt, cityName) {
		var i, tabcontent, tablinks;
		tabcontent = document.getElementsByClassName("tabcontent");
		for (i = 0; i < tabcontent.length; i++) {
		  tabcontent[i].style.display = "none";
		}
		tablinks = document.getElementsByClassName("tablinks");
		for (i = 0; i < tablinks.length; i++) {
		  tablinks[i].className = tablinks[i].className.replace(" active", "");
		}
		document.getElementById(cityName).style.display = "block";
		evt.currentTarget.className += " active";
	  }
	  
	  // Get the element with id="defaultOpen" and click on it
	  document.getElementById("defaultOpen").click();
	  </script>
<!--- Boxes--> 

<div class="container">
	<div style="text-align:center">
	</div>
	<div class="row">
	  <div class="column">
		<!--img src="/w3images/map.jpg" style="width:100%"-->
	  </div>
	  <div class="col-12">
			<h2>New Patient</h2>
	  <div class="column">
		  <h6><p class="error"><?php echo $message?></p></h6>
		<form method="post" action="posdatabase.php">
		  <label for="fname">First Name </label>
		  <input type="text" id="fname" name="firstname" placeholder="">
		  <p></p>
		  <label for="lname">Last Name</label>
		  <input type="text" id="lname" name="lastname" placeholder="">
		  <p></p>
		  <label for="stateid">State ID</label>
		  <input type="text" id="stateid" name="stateid" placeholder="">
		  <p></p>
		  <label for="phone">Phone Number</label>
		  <input type="text" id="pnumber" name="phone" placeholder="">
		  <p></p>
		  <label for="dob">Date of Birth</label>
		  <input type="text" id="dob" name="dateofbirth" placeholder="mm/dd/yyyy">
		  <p></p>
		  <input type="submit" value="Submit">
		  		  <!--select id="country" name="country">
			<option value="australia">Australia</option>
			<option value="canada">Canada</option>
			<option value="usa">USA</option>
		  </select>
		  <label for="subject">Subject</label>
		  <textarea id="subject" name="subject" placeholder="Write something.." style="height:170px"></textarea>
		  <input type="submit" value="Submit"-->
		</form>
	</div>
	  </div>
	</div>
  </div>




<!--- Footer -->



</body>
</html>



<!--- Boxes 
<div class="box">Total Sales:</div>
<div class="box">Total Transactions:</div-->





<!-- View in Browser: Drew's #1 Trending YouTube Tutorial -->

<!-- End View in Browser: Drew's #1 Trending YouTube Tutorial -->


