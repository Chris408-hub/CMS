<?php

require_once('../includes/connect.php');

if (isset($_POST['submit'])) {

    // upload images

    $image_target_file = '../images/img_'.time();
    $target_dir = "../images/"; 
    $imageFileType = strtolower(pathinfo($_FILES['project_image']['name'], PATHINFO_EXTENSION));
    $filename = uniqid() . "." . $imageFileType; 
    $target_file = $target_dir . $filename; 
    move_uploaded_file($_FILES['project_image']['tmp_name'], $target_file);
 
    // upload project

    if (isset($_FILES['project_url']) && $_FILES['project_url']['error'] == 0) {
        // move zip file
        $folderName = 'project_' . time();
        $folder_target_file = '../case-study/' . $folderName . '.zip';

        move_uploaded_file($_FILES['project_url']['tmp_name'], $folder_target_file);

        // unZIP
        $zip = new ZipArchive;
        if ($zip->open($folder_target_file) === TRUE) {
            $extractPath = '../case-study/' . $folderName; // 设置解压路径
            $zip->extractTo($extractPath); // 解压
            $zip->close();
            unlink($folder_target_file);
            // 设置项目URL指向解压后的index.html文件
            
            $projectFolder = 'case-study/' . $folderName;
            $projectURL = $projectFolder .'/index.html';
        }
    }

    // insert db
    $query = "INSERT INTO tbl_project (project_title, project_url, project_image, project_type) VALUES (?, ?, ?, ?)";
    $stmt = $connection->prepare($query);
    $stmt->bindParam(1,$_POST['project_title'],PDO::PARAM_STR);
    $stmt->bindParam(2, $projectFolder,PDO::PARAM_STR);
    $stmt->bindParam(3,$filename,PDO::PARAM_STR);
    $stmt->bindParam(4,$_POST['project_type'],PDO::PARAM_STR);

    $stmt->execute();
    $last_id = $connection->lastInsertId();
    $stmt = null;
    header('Location: project_list.php');
    exit();



}

?>



