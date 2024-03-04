<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    $db_host = 'localhost:8889';
    $db_user = 'root';
    $db_pass = 'root';
    $db_name = 'portfolio_db';

    $connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    $errors = array();


    // require_once 'includes/connect.php';


    $fname = mysqli_real_escape_string($connection, $_POST['firstname']);
    if ($fname == NULL) {
    $errors[] = "First name field is empty.";
    }


    $lname = mysqli_real_escape_string($connection, $_POST['lastname']);
    if ($lname == NULL) {
        $errors[] = "Last name field is empty.";
    }


  
    $email = $_POST['email'];
    if ($email == NULL) {
        $errors[] = "Email field is empty.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "\"" . $email . "\" is not a valid email address.";
    }
    
    $messages= mysqli_real_escape_string($connection, $_POST['messages']);
    if ($messages == NULL) {
        $errors[] = "messages field is empty.";
    }


    $errcount = count($errors);
    if ($errcount > 0) {
        $errmsg = array();
        for ($i = 0; $i < $errcount; $i++) {
            $errmsg[] = $errors[$i];
        }
        echo json_encode(array("errors" => $errmsg));
    } else {
        $querystring = "INSERT INTO tbl_contact(contact_id,firstname,lastname,email,messages) VALUES(NULL,'" . $fname . "','" . $lname . "','" . $email . "','" . $messages . "')";
        $qpartner = mysqli_query($connection, $querystring);
        echo json_encode(array("message" => "Message sended."));
    }
?>