<?php

$productname = filter_input(INPUT_POST, 'productname');
$weight = filter_input(INPUT_POST, 'weight');
$unit = filter_input(INPUT_POST, 'unit');
$unitprice = filter_input(INPUT_POST, 'unitprice');
$total = filter_input(INPUT_POST, 'total');
date_default_timezone_set('America/Los_Angeles');
$date = date('Y-m-d');
$message = "";
if(!empty($productname)){   
                $host = "localhost";
                $dbusername = "root";
                $dbpassword = "";
                $dbname = "poswebsite";
                $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
                if(mysqli_connect_error()){
                    die('Connect Error ('.mysqli_connect_errno() .')'
                    . mysqli_connect_error());
                }else{
                    if(!empty($unitprice)){
                        if (!empty($unit)){
                        $total = $unitprice * $unit;
                        }
                         else if(!empty($weight)){
                        $total = $weight * $unitprice;
                        }
                    }
                    if(!empty($total)){
                        if(!empty($weight)){
                            $unitprice = $total/$weight;
                        }
                        else if (!empty($unit)){
                            $unitprice = $total/$unit;
                        }
                    }
                    $unitprice = number_format((float) $unitprice, 2, '.', '');
                    
                    $sql = "INSERT INTO products (productname, weight, unit, unitprice, total, date)
                    values ('$productname', '$weight', '$unit', '$unitprice', '$total', '$date')";
                    if($conn->query($sql)){
                        header( 'Location: productlist.php' );
                    }else{ 
                        $message = "* This Product Name already exists";
                    }
                    $conn->close();
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
    <style>
body {
  font-family: Arial;
}

.split {
  height: 75%;
  width: 50%;
  position: fixed;
  
  
}
.left {
  left: 0;
  width:18%; 

}

.right {
  right: 0;
  margin-left: 220px;
  background-color: rgba(118, 130, 121, 0.1);
  overflow: auto;
}
.sidebar {
  position: sticky;
  top: 0;
}
.header{
  position: fixed;
  top:0;
}
</style>
<style>
    .tab button {
    display: block;
    background-color: inherit;
    color: black;
    padding: 11px 10px;
    width: 100%;
    border: none;
    outline: none;
    text-align: left;
    cursor: pointer;
    transition: 0.3s;
    font-size: 14px;  
    text-align: center;
    margin-left: 5px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current "tab button" class */
.tab button.active {
  background-color: rgb(204, 204, 204);
}

/* Style the tab content */
.tabcontent {
  float: left;
  padding: 0px 0px;
  font-size: 10px;
  background-color: rgba(221, 221, 221, 0.493);
  width: 0;
  border-left: none;
  margin-left: 5px;
  height: 360px;
}
    </style>
</head>
<body>


<!-- Navigation -->

<div class="header">
<nav class="navbar navbar-expand-md navbar-light sticky-top">
<div class="container-fluid">
	<a class="navbar-brand" href="patientlist.php"><img src="img/shoplogo.jpg" height="55" width="75"></a>
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
</div>	
<div class="row">
    <aside>
    <div class="split left">
  <div class="centered">

<!--side bar-->
<div class="tab">
	<button class="tablinks" onclick="openCity(event, 'patients')">
		<i class="fas fa-user" style='font-size:24px;color:rgb(4, 6, 129)'></i>
		<p>Patients</p>
		
	</button>
	<button class="tablinks" onclick="openCity(event, 'register')">
		<i class="fas fa-barcode" style='font-size:24px;color:rgb(4, 6, 129)'></i>
		<p>Register</p>
	</button>
	<button class="tablinks" onclick="openCity(event, 'inventory')" id="defaultOpen">
		<i class="fas fa-box" style='font-size:24px;color:rgb(4, 6, 129)'></i>
		<p>Inventory</p>
		
	</button>
	<button class="tablinks" onclick="openCity(event, 'settings')">
		<i class="fas fa-cog" style='font-size:24px;color:rgb(4, 6, 129)'></i>
		<p>Settings</p>
	
	</button>
</div>
	  
	  <div id="patients" class="tabcontent">
			<h5><a class="nav-link" href="patientlist.php">Patient List</a></h5>
			<h5><a class="nav-link" href="newpatient.php">Add Patient</a></h5>
	  </div>
	  
	  <div id="register" class="tabcontent">
			<h5><a class="nav-link" href="#">Register</a></h5> 
	  </div>
	  
	  <div id="inventory" class="tabcontent">
			<h5><a class="nav-link" href="productlist.php">Product List</a></h5>
			<h5><a class="nav-link" href="newproduct.php">Add Product</a></h5>
            <h5><a class="nav-link" href="#">Orders</a></h5>
            <h5><a class="nav-link" href="checkedin.php">Checked in</a></h5>
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
      </aside>
    </div>
<!--- Boxes--> 
<div class="right">
<div class="container">
	<div style="text-align:center">
	<div class="row">
		<!--img src="/w3images/map.jpg" style="width:100%"-->
	  </div>
			<h2>New Product</h2>
		  <h6><p class="error"><?php echo $message?></p></h6>
		<form method="post" action="newproduct.php">
		  <label for="productname">Product Name</label>
		  <input type="text" id="pname" name="productname" placeholder="Product Name Here">
		  <p></p>
		  <label for="stateid">Weight in Grams</label>
		  <input type="text" id="weight" name="weight" placeholder="0g">
		  <p></p>
		  <label for="unit">Unit Count</label>
		  <input type="text" id="unit" name="unit" placeholder="0">
		  <p></p>
		  <label for="unitprice">Unit Price</label>
		  <input type="text" id="unitprice" name="unitprice" placeholder="$0">
          <p></p>
          <label for="total">Total Price</label>
		  <input type="text" id="total" name="total" placeholder="$0">
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
    </div>




<!--- Footer -->



</body>
</html>



<!--- Boxes 
<div class="box">Total Sales:</div>
<div class="box">Total Transactions:</div-->





<!-- View in Browser: Drew's #1 Trending YouTube Tutorial -->

<!-- End View in Browser: Drew's #1 Trending YouTube Tutorial -->


