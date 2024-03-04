<?php
session_start(); // 开始或继续会话

require_once('../includes/connect.php'); // 调整为正确的数据库连接文件路径
$query = 'SELECT * FROM tbl_users WHERE username = ? AND password=?';
$stmt = $connection->prepare($query);
$stmt->bindParam(1,$_POST['username'],PDO::PARAM_STR);
$stmt->bindParam(2,$_POST['password'],PDO::PARAM_STR);
$stmt->execute();

if($stmt ->rowCount()==1){
    $row = $stmt -> fetch(PDO::FETCH_ASSOC);
    $_SESSION['username'] = $row['username']; 
    header('Location: project_list.php');
}else{
        header('Location: project_list.php'); 

}


$stmt = null;
?>
 