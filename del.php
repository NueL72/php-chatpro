<?php 
 include_once 'driver.php';

 if (!empty($_GET['id'])) {
    $sql = "DELETE FROM `chatbot` WHERE `id`=".$_GET['id'].";";
    $query = mysqli_query($conn, $sql);
    // $result = mysqli_fetch_assoc($query);

    if($query == true){
        header('location:dash.php');
    }
}

?>