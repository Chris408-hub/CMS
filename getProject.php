
<?php

// require_once 'includes/connect.php';


    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    $db_host = 'localhost:8889';
    $db_user = 'root';
    $db_pass = 'root';
    $db_name = 'portfolio_db';

    $connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    $errors = array();


$query = "SELECT * FROM tbl_project";
$result = mysqli_query($connection, $query);
$projects = [];

if ($result) {
    while($row = mysqli_fetch_assoc($result)) {
        $projects[] = $row;
    }
    echo json_encode($projects);
} else {
    echo json_encode(array("message" => "No projects found."));
}

//close db
mysqli_close($connection);

?>
        

             
