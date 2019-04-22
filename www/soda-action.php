<?php 

    $conn = mysqli_connect('db', 'outside', 'password', 'sodaphp');

    if ($_POST['id'] == 0) {
        $stmt = "INSERT INTO SODA (NAME, PRICE, BRAND) VALUES (?,?,?)";
    } else {
        $stmt = "UPDATE SODA SET NAME=?, PRICE=?, BRAND=? WHERE ID = ?";
    }

    $conn->close();
    
    header('location: soda-list.php');

?>