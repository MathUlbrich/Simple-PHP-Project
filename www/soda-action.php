<?php 


    $conn = mysqli_connect('db', 'outside', 'password', 'sodaphp');

    $format = $_REQUEST['format'];
    $name   = $_REQUEST['sodaName'];
    $price  = number_format($_REQUEST['sodaPrice']);
    $brand  = number_format($_REQUEST['brand_select']);

    if ($format === 'insert') {
        $stmt = "INSERT INTO SODA (NAME, PRICE, BRAND) VALUES (?,?,?);";
        $prepStmt= $conn->prepare($stmt);
        $prepStmt->bind_param('sdi', $name, $price, $brand);
        $prepStmt->execute();
        $prepStmt->close();

    } elseif ($format === 'update') {
        $id   = number_format($_REQUEST['sodaId']);
        $stmt = "UPDATE SODA SET NAME=?, PRICE=?, BRAND=? WHERE ID = ?;";
        $prepStmt= $conn->prepare($stmt);
        $prepStmt->bind_param('sdii', $name, $price, $brand, $id);
        $prepStmt->execute();
        $prepStmt->close();
    
    } elseif ($format === 'delete') {
        $id   = number_format($_REQUEST['sodaId']);
        $stmt = "DELETE FROM SODA WHERE ID = ?;";
        $prepStmt= $conn->prepare($stmt);
        $prepStmt->bind_param('i', $id);
        $prepStmt->execute();
        $prepStmt->close();
    }

    $conn->close();

    header('location: soda-list.php');

?>