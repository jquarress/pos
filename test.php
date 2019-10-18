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
    }
?>