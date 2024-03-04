<?php
require_once('../includes/connect.php');



if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $project_title = $_POST['project_title'];
    $project_type = $_POST['project_type'];

    if ($_FILES['project_image']['error'] == 0) {
        $target_dir = "../images/";
        $imageFileType = strtolower(pathinfo($_FILES['project_image']['name'], PATHINFO_EXTENSION));
        $filename = uniqid() . '.' . $imageFileType;
        $target_file = $target_dir . $filename;
        if (move_uploaded_file($_FILES['project_image']['tmp_name'], $target_file)) {
            $image_url = $filename;
        } else {
            die("Sorry, there was an error uploading your file.");
        }
    } else {
        $image_url = $_POST['old_image_url'];
    }

    $query = 'UPDATE tbl_project SET project_title=?, project_image=?, project_type=? WHERE id=?';
    $stmt = $connection->prepare($query);
    $stmt->bindParam(1, $project_title, PDO::PARAM_STR);
    $stmt->bindParam(2, $image_url, PDO::PARAM_STR);
    $stmt->bindParam(3, $project_type, PDO::PARAM_STR);
    $stmt->bindParam(4, $id, PDO::PARAM_INT);
    
    
    $stmt->execute();
    $last_id = $connection->lastInsertId();
    $stmt = null;
    header('Location: project_list.php');
    exit();



}




?>
