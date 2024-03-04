<?php
require_once('../includes/connect.php');

// 检查是否点击了提交按钮
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $project_title = $_POST['project_title'];
    $project_type = $_POST['project_type'];

    if (isset($_FILES['project_image']['name']) && $_FILES['project_image']['error'] == 0) {
        // 如果有新的图片上传
        $target_dir = "../images/";
        $imageFileType = strtolower(pathinfo($_FILES['project_image']['name'], PATHINFO_EXTENSION));
        $filename = uniqid() . '.' . $imageFileType;
        $target_file = $target_dir . $filename;

        if (move_uploaded_file($_FILES['project_image']['tmp_name'], $target_file)) {
            $image_url =  $filename; // 保存图片的相对路径
        } else {
            echo "Sorry, there was an error uploading your file.";
            exit;
        }
    } else {
        // 没有新图片上传，使用旧的图片URL
        $image_url = $_POST['old_image_url'];
    }

    // 更新数据库记录
    $query = 'UPDATE tbl_project SET project_title=?, project_image=?, project_type=? WHERE id=?';
    $stmt = $connection->prepare($query);
    $stmt->bindParam(1, $project_title, PDO::PARAM_STR);
    $stmt->bindParam(2, $image_url, PDO::PARAM_STR); 
    $stmt->bindParam(3, $project_type, PDO::PARAM_STR);
    $stmt->bindParam(4, $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        header('Location: project_list.php');
        exit;
    } else {
        echo "An error occurred while updating the record.";
    }

    $stmt = null;
}
?>
