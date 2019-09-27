<?php
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "poswebsite";
    $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
    if(mysqli_connect_error()){
        die('Connect Error ('.mysqli_connect_errno() .')'
        . mysqli_connect_error());
    }else{       
        $sql = "SELECT productname, weight, unit, unitprice, total 
        from products";
        $result = $conn-> query($sql);
       $grandtotal = 0;
        if($result-> num_rows > 0){
            while($row = $result-> fetch_assoc()){
              $productname = $row["productname"];
              $weight = $row["weight"];
              $unit = $row["unit"];
              $unitprice = $row["unitprice"];
              $total = $row["total"];
                 "<tr><td>". $row["productname"] . "</td>
                <td>". $row["weight"] . "g" . "</td>
                <td>". $row["unit"] . "</td>
                <td>". "$" . $row["unitprice"] . "</td>
                <td>". "$" . $row["total"] . "</td><td>";
                $grandtotal = $grandtotal + $total;
            }
            echo "</table>";
        }else{
            echo "no product was found from this search";
        }       
        $conn->close();
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
        ::-webkit-scrollbar {
            width: 0px;
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
        input[type=text], select {
            width: 50%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
	</style>

	<style>
		html,body,h1,h2,h3,h4,h5,h6 {
		    font-family: Arial, Helvetica, sans-serif;
        }
        .header{
            position: fixed;
            top:0;
        }
        .btn {
            border: 1px outset blue;
            background-color: lightBlue;
            height:120px;
            width:150px;
            font-size: 15px;
            color: black;
            cursor:pointer;
        }

        .btn:hover {
            background-color: blue;
            color:white;
        }
        .button {
            width: 120px;
            height: 60px;
            font-size: 18px;
            text-align: left;
            padding: 1px;
            
        }
        .side{
            height: 300px;
        }
        .items{
            height: 260px;
        }
        .orderwindow{
            background-color: rgba(118, 130, 121, 0.1);
        }
        .pricewindow{
            background-color: rgba(26, 124, 82, 0.15);
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
    </div>
    </nav>
    </div>
	
<!--- Footer -->


<!--- Boxes 
<div class="box">Total Sales:</div>
<div class="box">Total Transactions:</div-->
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="side col-md-2" style="overflow-y:auto"> 
					<button type="button" class="button btn-primary btn-lg" onclick="flower()">
						Flower
					</button> 
					<button type="button" class="button btn-primary btn-lg" onclick="vapeCarts()">
						VapeCarts
					</button> 
					<button type="button" class="button btn-primary btn-lg" onclick="concentrates()">
						Concentrates
					</button> 
					<button type="button" class="button btn-primary btn-lg" onclick="edibles()">
						Edibles
                    </button> 
                    <button type="button" class="button btn-primary btn-lg" onclick="glass()">
						Glass
                    </button>
                    <button type="button" class="button btn-primary btn-lg" onclick="topicals()">
						Topicals
                    </button>
                    <button type="button" class="button btn-primary btn-lg" onclick="prerolls()">
						Prerolls
					</button>
					<button type="button" class="button btn-primary btn-lg" onclick="other()">
						Other
					</button>
				</div>
				<div class="col-md-6 orderwindow" style="overflow:auto">
                    <p>Products Added to Cart:</p>
                    <hr class="light">
				</div>
                <div class="col-md-3 pricewindow" style="overflow:auto">
                    <p>Cost of Items in Cart:</p>
                    <hr class="light">
				</div>
			</div>
			<div class="row">
				<div class="items col-md-12" style="overflow-x:auto">
                <p id="demo"></p>
                    <script>
                        function flower() {
                        document.getElementById("demo").innerHTML =
                        "<?php 
                        $host = "localhost";
                        $dbusername = "root";
                        $dbpassword = "";
                        $dbname = "poswebsite";
                        $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
                        if(mysqli_connect_error()){
                            die('Connect Error ('.mysqli_connect_errno() .')'
                            . mysqli_connect_error());
                        }else{
                            $sql = "SELECT productname, weight, unit, unitprice, total 
                            from products Where productType LIKE 'Flowers'";
                            $result = $conn-> query($sql);
                            if($result-> num_rows > 0){
                                while($row = $result-> fetch_assoc()){
                                 $productname = $row["productname"];
                                 echo "<button type='button' class='btn btn-secondary btn-lg' value='$productname' onclick='productbutton()' data-toggle='modal' data-target='#myModal'>$productname</button>"; 
                                 }
                            }else{
                                echo "no products found in this category";
                            }
                        }?>";
                        }
                        function vapeCarts() {
                        document.getElementById("demo").innerHTML = 
                        "<?php 
                        $host = "localhost";
                        $dbusername = "root";
                        $dbpassword = "";
                        $dbname = "poswebsite";
                        $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
                        if(mysqli_connect_error()){
                            die('Connect Error ('.mysqli_connect_errno() .')'
                            . mysqli_connect_error());
                        }else{
                        $sql = "SELECT productname, weight, unit, unitprice, total 
                        from products Where productType LIKE 'Vape Carts'";
                        $result = $conn-> query($sql);
                        if($result-> num_rows > 0){
                            while($row = $result-> fetch_assoc()){
                                $productname = $row["productname"];
                                echo "<button type='button' class='btn btn-secondary btn-lg'>$productname</button>"; 
                              }
                        }else{
                            echo "no products found in this category";
                        }
                    }   ?>";
                        }
                        function concentrates() {
                        document.getElementById("demo").innerHTML = 
                        "<?php 
                        $host = "localhost";
                        $dbusername = "root";
                        $dbpassword = "";
                        $dbname = "poswebsite";
                        $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
                        if(mysqli_connect_error()){
                            die('Connect Error ('.mysqli_connect_errno() .')'
                            . mysqli_connect_error());
                        }else{
                        $sql = "SELECT productname, weight, unit, unitprice, total 
                        from products Where productType LIKE 'Concentrates'";
                        $result = $conn-> query($sql);
                        if($result-> num_rows > 0){
                            while($row = $result-> fetch_assoc()){
                                $productname = $row["productname"];
                                echo "<button type='button' class='btn btn-secondary btn-lg'>$productname</button>"; 
                              }
                        }else{
                            echo "no products found in this category";
                        }
                    }   ?>";
                        }
                        function edibles() {
                        document.getElementById("demo").innerHTML = 
                        "<?php 
                        $host = "localhost";
                        $dbusername = "root";
                        $dbpassword = "";
                        $dbname = "poswebsite";
                        $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
                        if(mysqli_connect_error()){
                            die('Connect Error ('.mysqli_connect_errno() .')'
                            . mysqli_connect_error());
                        }else{
                        $sql = "SELECT productname, weight, unit, unitprice, total 
                        from products Where productType LIKE 'Edibles'";
                        $result = $conn-> query($sql);
                        if($result-> num_rows > 0){
                            while($row = $result-> fetch_assoc()){
                                $productname = $row["productname"];
                                echo "<button type='button' class='btn btn-secondary btn-lg'>$productname</button>"; 
                              }
                        }else{
                            echo "no products found in this category";
                        }
                    }   ?>";
                        }
                        function glass() {
                        document.getElementById("demo").innerHTML = 
                        "<?php 
                        $host = "localhost";
                        $dbusername = "root";
                        $dbpassword = "";
                        $dbname = "poswebsite";
                        $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
                        if(mysqli_connect_error()){
                            die('Connect Error ('.mysqli_connect_errno() .')'
                            . mysqli_connect_error());
                        }else{
                        $sql = "SELECT productname, weight, unit, unitprice, total 
                        from products Where productType LIKE 'Glass'";
                        $result = $conn-> query($sql);
                        if($result-> num_rows > 0){
                            while($row = $result-> fetch_assoc()){
                                $productname = $row["productname"];
                                echo "<button type='button' class='btn btn-secondary btn-lg'>$productname</button>"; 
                              }
                        }else{
                            echo "no products found in this category";
                        }
                    }   ?>";
                        }
                        function topicals() {
                        document.getElementById("demo").innerHTML = 
                        "<?php 
                        $host = "localhost";
                        $dbusername = "root";
                        $dbpassword = "";
                        $dbname = "poswebsite";
                        $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
                        if(mysqli_connect_error()){
                            die('Connect Error ('.mysqli_connect_errno() .')'
                            . mysqli_connect_error());
                        }else{
                        $sql = "SELECT productname, weight, unit, unitprice, total 
                        from products Where productType LIKE 'Topicals'";
                        $result = $conn-> query($sql);
                        if($result-> num_rows > 0){
                            while($row = $result-> fetch_assoc()){
                                $productname = $row["productname"];
                                echo "<button type='button' class='btn btn-secondary btn-lg'>$productname</button>"; 
                              }
                        }else{
                            echo "no products found in this category";
                        }
                    }   ?>";
                        }
                        function prerolls() {
                        document.getElementById("demo").innerHTML = 
                        "<?php 
                        $host = "localhost";
                        $dbusername = "root";
                        $dbpassword = "";
                        $dbname = "poswebsite";
                        $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
                        if(mysqli_connect_error()){
                            die('Connect Error ('.mysqli_connect_errno() .')'
                            . mysqli_connect_error());
                        }else{
                        $sql = "SELECT productname, weight, unit, unitprice, total 
                        from products Where productType LIKE 'Prerolls'";
                        $result = $conn-> query($sql);
                        if($result-> num_rows > 0){
                            while($row = $result-> fetch_assoc()){
                                $productname = $row["productname"];
                                echo "<button type='button' class='btn btn-secondary btn-lg'>$productname</button>"; 
                              }
                        }else{
                            echo "no products found in this category";
                        }
                    }   ?>";
                        }
                        function other() {
                        document.getElementById("demo").innerHTML = 
                        "<?php 
                        $host = "localhost";
                        $dbusername = "root";
                        $dbpassword = "";
                        $dbname = "poswebsite";
                        $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
                        if(mysqli_connect_error()){
                            die('Connect Error ('.mysqli_connect_errno() .')'
                            . mysqli_connect_error());
                        }else{
                        $sql = "SELECT productname, weight, unit, unitprice, total 
                        from products Where productType LIKE 'Other'";
                        $result = $conn-> query($sql);
                        if($result-> num_rows > 0){
                            while($row = $result-> fetch_assoc()){
                                $productname = $row["productname"];
                                echo "<button type='button' class='btn btn-secondary btn-lg'>$productname</button>"; 
                              }
                        }else{
                            echo "no products found in this category";
                        }
                    }   ?>";
                        }
                    </script>
    <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
        
        <h2><p id="demo1"></p>
            <script>
            function myFunction() {
            var x = document.getElementById('$productname').value;
            document.getElementById("demo1").innerHTML = x;
            }
            </script>
        </h2>
        <form method="post" action="register.php">
        <label for="weight">weight in grams</label>
            <input type="text" name="weight" 
             placeholder="">
        <p></p>
        <label for="unitcount">Unit Qty:</label>
            <input type="text" name="unitcount" 
             placeholder="">
        <p></p>
        <label for="price">Price $</label>
        <input type="text" name="price"
         placeholder="">
        <p></p>
        <input type="submit" value="Submit">
      </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="closebutton btn-default" data-dismiss="modal">Close</button>

        </div>
      </div>
      
    </div>
  </div>
                </div>
			</div>
        </div>
        
	</div>
</div>



<!-- View in Browser: Drew's #1 Trending YouTube Tutorial -->

<!-- End View in Browser: Drew's #1 Trending YouTube Tutorial -->


