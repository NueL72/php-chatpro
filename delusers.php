<?php 
 include_once 'driver.php';

 if (!empty($_GET['id'])) {
    $sql = "DELETE FROM `users` WHERE id='" . $_GET['id'] . "';";
    $query = mysqli_query($conn, $sql);

    if($query){
        header('location:users.php');
    }
}

?> 