<?php


    $target_file = '../images/img_'.time();
    $imageFileType = strtolower(pathinfo($_FILES['uploaded']['name'], PATHINFO_EXTENSION));
    $target_file .= '.'.$imageFileType;
    move_uploaded_file($_FILES['uploaded']['tmp_name'], $target_file);



// function uploadImage($imageFile) {
//     $imageName = $imageFile['name'];
//     $imageTmpName = $imageFile['tmp_name'];
//     $imagePath = "images/" . $imageName; // 存储路径

//     if (move_uploaded_file($imageTmpName, "../portfolio/" . $imagePath)) {
//         return $imagePath; // 返回存储路径用于存入数据库
//     } else {
//         return false; // 上传失败返回false
//     }
// }
?>

