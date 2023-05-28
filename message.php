<?php
// connecting to database
include_once 'driver.php';

// getting user message through ajax
$getMesg = mysqli_real_escape_string($conn, $_POST['text']);

//checking user query to database query
// $check_data = "SELECT replies FROM chatbot WHERE queries LIKE '%_".$getMesg."_%'";
$topic = explode(" ", $getMesg);
for ($i=0; $i < sizeof($topic); $i++) { 

    $check_data = "SELECT replies FROM chatbot WHERE queries LIKE '%_".$topic[$i]."%_'";
    $topics = "SELECT replies FROM topic WHERE topic LIKE '%".$topic[$i]."%'";
}
// $check_data = "SELECT replies FROM chatbot WHERE queries LIKE '%$getMesg%'";
$run_query = mysqli_query($conn, $check_data) or die("Error");
$run_query = mysqli_query($conn, $topics) or die("Error");

// if user query matched to database query we'll show the reply otherwise it go to else statement
if(mysqli_num_rows($run_query) > 0){
    //fetching replay from the database according to the user query
    $fetch_data = mysqli_fetch_assoc($run_query);
    //storing replay to a varible which we'll send to ajax
    $replay = $fetch_data['replies'];
    echo $replay;
}else{
    echo "Sorry can't be able to understand you!";
}

?>