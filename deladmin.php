<?php 
 include_once 'driver.php';

 if (!empty($_GET['id'])) {
    $sql = "DELETE FROM `admin` WHERE id='" . $_GET['id'] . "';";
    $query = mysqli_query($conn, $sql);

    if($query){
        header('location:admin.php');
    }
}

?> 