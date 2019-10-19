<?php
    session_start();
    require_once("DBController.php");
    $db_handle = new DBController();
    
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
        body {
	font-family: Arial;
	color: #211a1a;
	font-size: 0.9em;
}

#shopping-cart {
	margin: 40px;
}

#product-grid {
	margin: 40px;
}

#shopping-cart table {
	width: 100%;
	background-color: #F0F0F0;
}

#shopping-cart table td {
	background-color: #FFFFFF;
}

.txt-heading {
	color: #211a1a;
	border-bottom: 1px solid #E0E0E0;
	overflow: auto;
}

#btnEmpty {
	background-color: #ffffff;
	border: #d00000 1px solid;
	padding: 5px 10px;
	color: #d00000;
	float: right;
	text-decoration: none;
	border-radius: 3px;
	margin: 10px 0px;
}

.btnAddAction {
    padding: 5px 10px;
    margin-left: 5px;
    background-color: #efefef;
    border: #E0E0E0 1px solid;
    color: #211a1a;
    float: right;
    text-decoration: none;
    border-radius: 3px;
    cursor: pointer;
}

#product-grid .txt-heading {
	margin-bottom: 18px;
}

.product-item {
	float: left;
	background: #ffffff;
	margin: 30px 30px 0px 0px;
	border: #E0E0E0 1px solid;
}


.clear-float {
	clear: both;
}

.demo-input-box {
	border-radius: 2px;
	border: #CCC 1px solid;
	padding: 2px 1px;
}

.tbl-cart {
	font-size: 0.9em;
    width: 100%;
}

.tbl-cart th {
	font-weight: normal;
}

.product-title {
	margin-bottom: 20px;
}

.product-price {
	float:left;
}

.cart-action {
	float: right;
}

.product-quantity {
    padding: 5px 10px;
    border-radius: 3px;
    width: 10%;
    border: #E0E0E0 1px solid;
}

.product-tile-footer {
    padding: 15px 15px 0px 15px;
    overflow: auto;
}

.no-records {
	text-align: center;
	clear: both;
	margin: 38px 0px;
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
				<div class="col-md-10 orderwindow" style="overflow:auto">
                <a id="btnEmpty" href="register.php?action=empty">Empty Cart</a>
                    <p>Products Added to Cart:</p>
                    
                    <hr>
                    <?php

if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM PRODUCTS WHERE productname='" . $_GET["productname"] . "'");
			$itemArray = array($productByCode[0]["productname"]=>array('productname'=>$productByCode[0]["productname"], 'productname'=>$productByCode[0]["productname"], 'quantity'=>$_POST["quantity"], 'unitprice'=>$productByCode[0]["unitprice"]));
			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["productname"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["productname"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["productname"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
}
}
?>

<div id="shopping-cart">


<?php
if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
?>	
<table class="tbl-cart" cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left;"  width="10%">Name</th>
<th style="text-align:right;" width="5%">Quantity</th>
<th style="text-align:right;" width="10%">Unit Price</th>
<th style="text-align:right;" width="10%">Price</th>
<th style="text-align:center;" width="5%">Remove</th>
</tr>	
<?php		
    foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["quantity"]*$item["unitprice"];
		?>
				<tr>
				<td><?php echo $item["productname"]; ?></td>
				<td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ".$item["unitprice"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ". number_format($item_price,2); ?></td>
				<td style="text-align:center;"><a href="register.php?action=remove&productname=<?php echo $item["productname"]; ?>" class="btnRemoveAction"> Remove Item </a></td>
				</tr>
				<?php
				$total_quantity += $item["quantity"];
				$total_price += ($item["unitprice"]*$item["quantity"]);
		}
		?>
<tr>
<td colspan="2" align="right">Total:</td>
<td align="right" colspan="2"><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
<td></td>
</tr>

</tbody>
</table>		
  <?php
} else {
?>
<div class="no-records">Your Cart is Empty</div>
<?php 
}
?>
</div>

</div>      
			</div>
				<div class="items col-md-12" style="overflow-x:auto">

<div id="flower">
<?php
	$product_array = $db_handle->runQuery("SELECT productname, weight, unit, unitprice, total 
    from products WHERE productType = 'flowers'");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>
        <form method="post">
        <div class='cart-action'><button type='button' class='btn btn-secondary btn-lg' value='<?php echo $product_array[$key]["productname"];?>' 
        id='<?php echo $product_array[$key]["productname"]; ?>' onclick='productbutton()' data-toggle='modal' data-target='#myModal'><?php echo $product_array[$key]["productname"]; ?></button>
        </div>
        </form>
        <?php
		}
	}
	?>
            </div>
            <div id="vape carts">
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
                        from products Where productType LIKE 'Vape Carts'";
                        $result = $conn-> query($sql);
                        if($result-> num_rows > 0){
                            while($row = $result-> fetch_assoc()){
                                $productname = $row["productname"];
                                echo "<button type='button' class='btn btn-secondary btn-lg' value='$productname' id='$productname' onclick='productbutton()' data-toggle='modal' data-target='#myModal'>$productname</button>"; 
                              }
                        }else{
                            echo "no products found in this category";
                        }
                    }   ?>
            </div>
            <div id="concentrates">
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
                        from products Where productType LIKE 'Concentrates'";
                        $result = $conn-> query($sql);
                        if($result-> num_rows > 0){
                            while($row = $result-> fetch_assoc()){
                                $productname = $row["productname"];
                                echo "<button type='button' class='btn btn-secondary btn-lg' value='$productname' id='$productname' onclick='productbutton()' data-toggle='modal' data-target='#myModal'>$productname</button>"; 
                              }
                        }else{
                            echo "no products found in this category";
                        }
            }?>
            </div>
            <div id="edibles">
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
                        from products Where productType LIKE 'Edibles'";
                        $result = $conn-> query($sql);
                        if($result-> num_rows > 0){
                            while($row = $result-> fetch_assoc()){
                                $productname = $row["productname"];
                                echo "<button type='button' class='btn btn-secondary btn-lg' value='$productname' id='$productname' onclick='productbutton()' data-toggle='modal' data-target='#myModal'>$productname</button>"; 
                              }
                        }else{
                            echo "no products found in this category";
                        }
                    }   ?>
            </div>
            <div id="glass">
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
                        from products Where productType LIKE 'Glass'";
                        $result = $conn-> query($sql);
                        if($result-> num_rows > 0){
                            while($row = $result-> fetch_assoc()){
                                $productname = $row["productname"];
                                echo "<button type='button' class='btn btn-secondary btn-lg' value='$productname' id='$productname' onclick='productbutton()' data-toggle='modal' data-target='#myModal'>$productname</button>"; 
                              }
                        }else{
                            echo "no products found in this category";
                        }
                    }   ?>
            </div>
            <div id="topicals">
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
                        from products Where productType LIKE 'Topicals'";
                        $result = $conn-> query($sql);
                        if($result-> num_rows > 0){
                            while($row = $result-> fetch_assoc()){
                                $productname = $row["productname"];
                                echo "<button type='button' class='btn btn-secondary btn-lg' value='$productname' id='$productname' onclick='productbutton()' data-toggle='modal' data-target='#myModal'>$productname</button>"; 
                              }
                        }else{
                            echo "no products found in this category";
                        }
                    }   ?>
            </div>
            <div id="prerolls">
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
                        from products Where productType LIKE 'Prerolls'";
                        $result = $conn-> query($sql);
                        if($result-> num_rows > 0){
                            while($row = $result-> fetch_assoc()){
                                $productname = $row["productname"];
                                echo "<button type='button' class='btn btn-secondary btn-lg' value='$productname' id='$productname' onclick='productbutton()' data-toggle='modal' data-target='#myModal'>$productname</button>"; 
                              }
                        }else{
                            echo "no products found in this category";
                        }
                    }   ?>
            </div>
            <div id="other">
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
                        from products Where productType LIKE 'Other'";
                        $result = $conn-> query($sql);
                        if($result-> num_rows > 0){
                            while($row = $result-> fetch_assoc()){
                                $productname = $row["productname"];
                                echo "<button type='button' class='btn btn-secondary btn-lg' value='$productname' id='$productname' onclick='productbutton()' data-toggle='modal' data-target='#myModal'>$productname</button>"; 
                              }
                        }else{
                            echo "no products found in this category";
                        }
                    }   ?>
            </div>
                
                    <script>
                    var y = document.getElementById("flower");
                    y.style.display = "none";
                    var x = document.getElementById("vape carts");
                    x.style.display = "none";
                    var z = document.getElementById("concentrates");
                    z.style.display = "none";
                    var a = document.getElementById("edibles");
                    a.style.display = "none";
                    var b = document.getElementById("glass");
                    b.style.display = "none";
                    var c = document.getElementById("topicals");
                    c.style.display = "none";
                    var d = document.getElementById("prerolls");
                    d.style.display = "none";
                    var e = document.getElementById("other");
                    e.style.display = "none";


                        function flower() {
                            x.style.display = "none";
                            z.style.display = "none";
                            a.style.display = "none";
                            b.style.display = "none";
                            c.style.display = "none";
                            d.style.display = "none";
                            e.style.display = "none";
                            if (y.style.display === "none") {
                                y.style.display = "block";
                            } else {
                                y.style.display = "none";
                            }
                            
                        }
                        function vapeCarts() {
                            y.style.display = "none";
                            z.style.display = "none";
                            a.style.display = "none";
                            b.style.display = "none";
                            c.style.display = "none";
                            d.style.display = "none";
                            e.style.display = "none";
                            if (x.style.display === "none") {
                                x.style.display = "block";
                            } else {
                                x.style.display = "none";
                            }
                        }

                        function concentrates() {
                            y.style.display = "none";
                            x.style.display = "none";
                            a.style.display = "none";
                            b.style.display = "none";
                            c.style.display = "none";
                            d.style.display = "none";
                            e.style.display = "none";
                            if (z.style.display === "none") {
                                z.style.display = "block";
                            } else {
                                z.style.display = "none";
                            }
                        }
                        function edibles() {
                            y.style.display = "none";
                            x.style.display = "none";
                            z.style.display = "none";
                            b.style.display = "none";
                            c.style.display = "none";
                            d.style.display = "none";
                            e.style.display = "none";
                            if (a.style.display === "none") {
                                a.style.display = "block";
                            } else {
                                a.style.display = "none";
                            }
                        }
                        function glass() {
                            y.style.display = "none";
                            x.style.display = "none";
                            a.style.display = "none";
                            z.style.display = "none";
                            c.style.display = "none";
                            d.style.display = "none";
                            e.style.display = "none";
                            if (b.style.display === "none") {
                                b.style.display = "block";
                            } else {
                                b.style.display = "none";
                            }
                        }
                        function topicals() {
                            y.style.display = "none";
                            x.style.display = "none";
                            a.style.display = "none";
                            b.style.display = "none";
                            z.style.display = "none";
                            d.style.display = "none";
                            e.style.display = "none";
                            if (c.style.display === "none") {
                                c.style.display = "block";
                            } else {
                                c.style.display = "none";
                            }
                        }
                        function prerolls() {
                            y.style.display = "none";
                            x.style.display = "none";
                            a.style.display = "none";
                            b.style.display = "none";
                            z.style.display = "none";
                            z.style.display = "none";
                            e.style.display = "none";
                            if (d.style.display === "none") {
                                d.style.display = "block";
                            } else {
                                d.style.display = "none";
                            }
                        }
                        function other() {
                            y.style.display = "none";
                            x.style.display = "none";
                            a.style.display = "none";
                            b.style.display = "none";
                            z.style.display = "none";
                            d.style.display = "none";
                            z.style.display = "none";
                            if (e.style.display === "none") {
                                e.style.display = "block";
                            } else {
                                e.style.display = "none";
                            }
                        }
                    </script>
    
                </div>
			</div>
        </div>
        
	</div>
</div>
<!--?php
	$product_array = $db_handle->runQuery("SELECT * FROM Products ORDER BY productname ASC");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>
		<div class="product-item">
			<form method="post" action="register.php?action=add&productname=<--?php echo $product_array[$key]["productname"]; ?>">
			<div class="product-tile-footer">
			<div class="product-title"><--?php echo $product_array[$key]["productname"]; ?></div>
			<div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" /><input type="submit" value="Add to Cart" class="btnAddAction" /></div>
			</div>
			</form>
		</div-->
	<!--?php
		}
	}
	?-->      
    
                  <div class='modal fade' id='myModal' role='dialog'>
                                 <div class='modal-dialog'>
                                 <div class='modal-content'>
                                     <div class='modal-header'>
                                       <button type='button' class='close' data-dismiss='modal'>&times;</button>
                                       <h4 class='modal-title'></h4>
                                     </div>
                                     <div class='modal-body'>
                                     <h2><p id='blah'></p>
                                     <script>
                                       $('button').click(function() {
                                         document.getElementById('blah').innerHTML = this.id;
                                     });</script></h2>
                                     <p id='blah'></p>
                                     <p id='blah'></p>
                                     <?php
	
	if (!empty($product_array)) { 
		//foreach($product_array as $key=>$value){
            echo $name = "<p id='blah'></p>";
            echo $name;
	?>
		
			<form method="post" action="register.php?action=add&productname=<?php echo $product_array[$key]["productname"]; ?>">
			<div class="product-tile-footer">
			<div class="product-title"><?php echo $product_array[$key]["productname"]; ?></div>
			<div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" />
            <input type="submit" value="Add to Cart" class="btnAddAction" /></div>
			</div>
			</form>
		
	<?php
		}
	//}
	?>
                                     <p></p>
                                     
                                   </form>
                                     </div>
                                     <div class='modal-footer'>
                                       <button type='button' class='closebutton btn-default' data-dismiss='modal'>Close</button>
                             
                                     </div>
                                   </div>
                                   
                                 </div>
                               </div>

<!-- after modal -->

<?php
if(isset($_POST["weight"])){
$productname = "<h2><p id='blah'></p><script>
$('button').click(function() {
  document.getElementById('blah').innerHTML = this.id;
});</script></h2>";
echo "$productname";
$weight = filter_input(INPUT_POST, 'weight');
$unit = filter_input(INPUT_POST, 'unitcount');
$unitprice = filter_input(INPUT_POST, 'price');

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
                    
                    $sql = "UPDATE products SET weight = '$weight',
                    unit = '$unit', unitprice = '$unitprice'
                    WHERE productname = '$productname'";
                     if($conn->query($sql)){
                      header( 'Location: productlist.php' );
                  }else{ 
                      $message = "* This Product Name already exists";
                  }
                   
                    $conn->close();
                }


              }
              echo "<h2><p id='blah'></p><script>
              $('button').click(function() {
                document.getElementById('blah').innerHTML = this.id;
            });</script></h2>";
?>
<!-- End View in Browser: Drew's #1 Trending YouTube Tutorial -->