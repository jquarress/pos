<?php
if(isset($_POST["productname2"])){
$productname = filter_input(INPUT_POST, 'productname2');
$weight = filter_input(INPUT_POST, 'weight2');
$unit = filter_input(INPUT_POST, 'unit2');
$unitprice = filter_input(INPUT_POST, 'unitprice2');
$total = filter_input(INPUT_POST, 'total2');
date_default_timezone_set('America/Los_Angeles');
$date = date('Y-m-d');
$message = ""; 
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
                    
                    $sql = "UPDATE products SET productname = '$productname', weight = '$weight',
                    unit = '$unit', unitprice = '$unitprice', total = '$total'
                    WHERE productname = '$productname'";
                     if($conn->query($sql)){
                      header( 'Location: productlist.php' );
                  }else{ 
                      $message = "* This Product Name already exists";
                  }
                   
                    $conn->close();
                }


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
		html,body,h1,h2,h3,h4,h5,h6 {
		    font-family: Arial, Helvetica, sans-serif;
        }
    </style>
    <style>
        table{
            border-collapse: collapse;
            
            font-size: 20px;
            text-align: left;
        }
        input[type=submit]{
            background-color: blue;
            border: none;
            color: white;
            padding:3px 9px;
            text-decoration: none;
            margin: 4px 2px;
            cursor: pointer;
            size
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
	<a class="navbar-brand" href="pos.php"><img src="img/shoplogo.jpg" height="55" width="75"></a>
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
				<a class="nav-link" href="#">About</a>
			</li>
			<li class="nav-item">
					<a class="nav-link" href="#">Services</a>
			</li>
			<li class="nav-item">
					<a class="nav-link" href="#">Settings</a>
			</li>
			<li class="nav-item">
					<a class="nav-link" href="#">Logout</a>
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
			<h5><a class="nav-link" href="register.php">Register</a></h5> 
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
    </div>
    </div>
<!--- Boxes--> 
<div class="right" style="overflow-y:auto">
<h2>Product List</h2>
  <div class="centered">
  <form  method="post" action="productlist.php" > 
	      <input  type="text" name="searchinput2"  placeholder="Enter Product Name Here"> 
          

          <input  type="submit" name="searchbutton" value="Search"> 
    </form> 
<section>
<div class="container">
<div class="table-container" style="overflow-y:auto">
<table class="table table-striped" style="overflow: scroll">
		<thead>
		<th>Product   </th>
	    <th>Weight       </th>
        <th>Qty    </th>
        <th>UnitPrice </th>
        <th>Total </th>
        <th>Action </th>
        </thead>
 
    <div style ="overflow: scroll">


<?php
       
       $host = "localhost";
       $dbusername = "root";
       $dbpassword = "";
       $dbname = "poswebsite";
       $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
       $searchinput = '';
       if(isset($_POST['searchinput2'])){
       if (!empty('searchinput2')){
       $searchinput =  $_REQUEST['searchinput2'];
  }
}
      
       
       if(mysqli_connect_error()){
           die('Connect Error ('.mysqli_connect_errno() .')'
           . mysqli_connect_error());
       }
       else{
           $sql = "SELECT productname, weight, unit, unitprice, total 
           from products Where productname LIKE '%$searchinput%'";
           $result = $conn-> query($sql);
          $grandtotal = 0;
           if($result-> num_rows > 0){
               while($row = $result-> fetch_assoc()){
                 $productname = $row["productname"];
                 $weight = $row["weight"];
                 $unit = $row["unit"];
                 $unitprice = $row["unitprice"];
                 $total = $row["total"];
                   echo "<tr><td>". $row["productname"] . "</td>
                   <td>". $row["weight"] . "g" . "</td>
                   <td>". $row["unit"] . "</td>
                   <td>". "$" . $row["unitprice"] . "</td>
                   <td>". "$" . $row["total"] . "</td><td>" .
                   '<button type="button" class="btn btn-info btn-lg" data-toggle="modal" 
                   data-target="#myModal" name=$row["productname"]">Edit</button>
                   </td></tr>';
                   $grandtotal = $grandtotal + $total;
               }
               echo "Total Inventory: $$grandtotal";
               echo "</table>";
           }else{
               echo "no product was found from this search";
           }
           $conn->close();
        }
       
     
       ?>
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
        <h2>Edit Product</h2>
        <form method="post" action="productlist.php">
        <label for="productname2">Product Name</label>
            <input type="text" name="productname2" 
             placeholder="">
        <p></p>
        <label for="weight">Weight in Grams</label>
        <input type="text" name="weight2"
         placeholder="">
        <p></p>
        <label for="unit">Unit Count</label>
        <input type="text" name="unit2"
         placeholder="">
        <p></p>
        <label for="unitprice2">Unit Price</label>
        <input type="text" name="unitprice2" 
        placeholder="">
        <p></p>
        <label for="total">Total Price</label>
        <input type="text" name="total2"
        placeholder="">
        <p></p>
        <input type="submit" value="Submit">
      </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

        </div>
      </div>
      
    </div>
  </div>
              </body>
    </table>
        </div>
</div>
        </section>

        </div>
        </div>


<!--- Footer -->

<?php
if(isset($_POST["productname2"])){
$productname = filter_input(INPUT_POST, 'productname2');
$weight = filter_input(INPUT_POST, 'weight2');
$unit = filter_input(INPUT_POST, 'unit2');
$unitprice = filter_input(INPUT_POST, 'unitprice2');
$total = filter_input(INPUT_POST, 'total2');
date_default_timezone_set('America/Los_Angeles');
$date = date('Y-m-d');
$message = ""; 
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
                    
                    $sql = "UPDATE products SET productname = '$productname'
                    WHERE productname = '$productname'";
                     if($conn->query($sql)){
                      header( 'Location: productlist.php' );
                  }else{ 
                      $message = "* This Product Name already exists";
                  }
                   
                    $conn->close();
                }


              }
?>
<!--- Boxes 
<div class="box">Total Sales:</div>
<div class="box">Total Transactions:</div-->





<!-- View in Browser: Drew's #1 Trending YouTube Tutorial -->

<!-- End View in Browser: Drew's #1 Trending YouTube Tutorial -->


