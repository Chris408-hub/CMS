<!DOCTYPE html>
<html lang="en">
<?php
require_once('../includes/connect.php');

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add form Page</title>
    <link rel="stylesheet" href="../css/main.css" type="text/css">

</head>
<body class="db-page">

    <form class="form add-form" action="../admin/add_project.php" method="post" enctype="multipart/form-data">
        <h3 class="db-title">Add a New Project</h3>
        <label for="project_title">Project title: </label>
        <input name="project_title" type="text" required><br><br>
        
        <!-- Upload a project folder /video -->
        <label for="project_url">Upload a Project File /Video:</label>
        <input type="file" name="project_url" id="project_url"><br><br>
        
        <!-- Upload an project image -->
        <label for="project_image">Upload a Project Image:</label>
        <input type="file" name="project_image" id="project_image" required><br><br>
        
        <label for="project_type">Project type: </label>
        <input name="project_type" required><br><br>
        
        <input type="submit" name="submit" value="Add">
    </form>


<?php
$stmt = null;
?>
</body>
</html>
