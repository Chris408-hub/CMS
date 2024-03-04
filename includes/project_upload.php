<?php
    $target_file = '../case-study/project_'.time();
    $projectFileType = strtolower(pathinfo($_FILES['uploaded']['name'], PATHINFO_EXTENSION));
    $target_file .= '.'.$projectFileType;
    move_uploaded_file($_FILES['uploaded']['tmp_name'], $target_file);
?>

    $projectFolderPath = "case-study/" . $projectTitle;
    $projectFolderFullPath = "../portfolio/" . $projectFolderPath;
    if (!is_dir($projectFolderFullPath)) {
        mkdir($projectFolderFullPath, 0777, true); // 创建目录
    }
    foreach ($_FILES['project_url']['tmp_name'] as $key => $tmpName) {
        $fileName = basename($_FILES['project_url']['name'][$key]);
        $filePath = $projectFolderFullPath . '/' . $fileName;
        move_uploaded_file($tmpName, $filePath);
    }
    $projectURL = $projectFolderPath . "/index.html"; // 构建项目URL
