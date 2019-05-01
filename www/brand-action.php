<?php 


    $conn = mysqli_connect('db', 'outside', 'password', 'sodaphp');

    $format = $_REQUEST['format'];
    $name   = $_REQUEST['brandName'];

    if ($format === 'insert') {
        $stmt = "INSERT INTO BRAND (NAME) VALUES (?);";
        $prepStmt= $conn->prepare($stmt);
        $prepStmt->bind_param('s', $name);
        $prepStmt->execute();
        $prepStmt->close();

    } elseif ($format === 'update') {
        $id   = number_format($_REQUEST['brandId']);
        $stmt = "UPDATE BRAND SET NAME=? WHERE ID = ?;";
        $prepStmt= $conn->prepare($stmt);
        $prepStmt->bind_param('si', $name, $id);
        $prepStmt->execute();
        $prepStmt->close();
    
    } elseif ($format === 'delete') {
        $id   = number_format($_REQUEST['brandId']);
        $stmt = "DELETE FROM BRAND WHERE ID = ?;";
        $prepStmt= $conn->prepare($stmt);
        $prepStmt->bind_param('i', $id);
        $prepStmt->execute();
        $prepStmt->close();
    }

    $conn->close();

    header('location: brand-list.php');

?>