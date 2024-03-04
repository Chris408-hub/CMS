

<?php
require_once('../includes/connect.php');



if (isset($_POST['submit'])) {
    $time=time();
    $target_file = '../images/img_'.$time;
    $imageFileType = strtolower(pathinfo($_FILES['project_image']['name'], PATHINFO_EXTENSION));
    $target_file .= '.'.$imageFileType;
    move_uploaded_file($_FILES['project_image']['tmp_name'], $target_file);

    $newImagePath = 'img_'; 

    // 更新数据库记录
    $query ='UPDATE tbl_project SET project_title=?, project_image=?, project_type=? WHERE id=?';
    $stmt = $connection->prepare($query);
    $stmt->bindParam(1, $_POST['project_title'], PDO::PARAM_STR);
    $stmt->bindParam(2, $newImagePath, PDO::PARAM_STR); 
    $stmt->bindParam(3, $_POST['project_type'], PDO::PARAM_STR);
    $stmt->bindParam(4, $_POST['id'], PDO::PARAM_INT);

$stmt->execute();
$stmt = null;
header('Location: project_list.php');

}



echo "<pre>";
print_r($_POST);
echo "</pre>";

?>