<?php

require_once('../includes/connect.php');

if (isset($_POST['submit'])) {

    // 处理项目图片上传

    $image_target_file = '../images/img_'.time();

    $imageFileType = strtolower(pathinfo($_FILES['project_image']['name'], PATHINFO_EXTENSION));
    $target_file .= '.'.$imageFileType;
      move_uploaded_file($_FILES['project_image']['tmp_name'], $image_target_file);
$imageName = 'img_' . time();
 
    // 处理项目文件夹上传

    if (isset($_FILES['project_folder']) && $_FILES['project_folder']['error'] == 0) {
        // 移动上传的ZIP文件到目标位置
        $folderName = 'project_' . time();
        $folder_target_file = '../case-study/' . $folderName . '.zip';

        move_uploaded_file($_FILES['project_url']['tmp_name'], $folder_target_file);

        // 解压ZIP文件
        $zip = new ZipArchive;
        if ($zip->open($folder_target_file) === TRUE) {
            $extractPath = '../case-study/' . $folderName; // 设置解压路径
            $zip->extractTo($extractPath); // 解压
            $zip->close();
            unlink($folder_target_file);
            // 设置项目URL指向解压后的index.html文件
            
            $projectFolder = 'case-study/' . $folderName;
            // $projectURL = $projectFolder .'/index.html';
       


    // 插入数据库
    $query = "INSERT INTO tbl_project (project_title, project_url, project_image, project_type) VALUES (?, ?, ?, ?)";
    $stmt = $connection->prepare($query);
    $stmt->bindParam(1,$_POST['project_title'],PDO::PARAM_STR);
    $stmt->bindParam(2, $projectFolder,PDO::PARAM_STR);
    $stmt->bindParam(3,$imageName,PDO::PARAM_STR);
    $stmt->bindParam(4,$_POST['project_type'],PDO::PARAM_STR);

    $stmt->execute();
    $last_id = $connection->lastInsertId();
    $stmt = null;
    header('Location: project_list.php');




        }
    }
}
?>



