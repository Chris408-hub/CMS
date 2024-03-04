<!DOCTYPE html>
<html lang="en">
<?php
require_once('../includes/connect.php');


$query = 'SELECT * FROM tbl_project WHERE id = :projectId';
$stmt = $connection->prepare($query);
$projectId = $_GET['id'];
$stmt->bindParam(':projectId', $projectId, PDO::PARAM_INT);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit form Page</title>
    <link rel="stylesheet" href="../css/main.css" type="text/css">

</head>
<body class="db-page">

 
<form class="form edit-form" action="edit_project.php" method="POST" enctype="multipart/form-data">
<input name="pk" type="hidden" value="<?php echo $row['id']; ?>">



    <label for="title">project title: </label>
    <input name="project_title" type="text" value="<?php echo $row['project_title']; ?>" required><br><br>
    <label for="url">project url: </label>
    <input name="project_url" type="text" value="<?php echo $row['project_url']; ?>" required><br><br>    


        
    <label for="project_image">Replace the Project Image:</label>
    <input name="project_image" type="text" value="<?php echo $row['project_image']; ?>" required><br><br>
    <input type="file" name="project_image" id="project_image"><br><br>

    
    <label for="type">project type: </label>
    <input name="project_type" value="<?php echo $row['project_type']; ?>"></input><br><br>
     <input name="submit" type="submit" value="Edit">
</form>
<?php
$stmt = null;
?>
</body>
</html>
