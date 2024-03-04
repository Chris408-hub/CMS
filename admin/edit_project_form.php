<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Project Page</title>
    <link rel="stylesheet" href="../css/main.css" type="text/css">
</head>
<body class="db-page">
    <?php
    require_once('../includes/connect.php');

    $projectId = isset($_GET['id']) ? $_GET['id'] : die('ERROR: Project ID not specified.');
    $query = 'SELECT * FROM tbl_project WHERE id = :projectId';
    $stmt = $connection->prepare($query);
    $stmt->bindParam(':projectId', $projectId, PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    ?>
    <form class="form edit-form" action="edit_project.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $projectId; ?>">
        <label for="project_title">Project Title:</label>
        <input name="project_title" type="text" value="<?php echo $row['project_title']; ?>" required><br><br>
        <label for="project_image">Replace the Project Image (if necessary):</label>
        <input type="file" name="project_image" id="project_image"><br><br>
        <input type="hidden" name="old_image_url" value="<?php echo $row['project_image']; ?>">
        <label for="project_type">Project Type:</label>
        <input name="project_type" value="<?php echo $row['project_type']; ?>" required><br><br>
        <input name="submit" type="submit" value="Edit">


    </form>
</body>
</html>
