<!DOCTYPE html>
<html lang="en">

<?php
require_once('../includes/connect.php');
$stmt = $connection->prepare('SELECT id,project_title FROM tbl_project ORDER BY id ASC');
$stmt->execute();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS Main Page</title>
    <link rel="stylesheet" href="../css/main.css" type="text/css">

</head>
<body class="db-page main-page">
<a id="logout-btn" href="logout.php">log out</a>

    <?php
    echo '<div class="add-div"><h3 class="add-title">Add a New Project<a class="btn add" href="add_project_form.php">add</a></h3></div>';


    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

    echo  '<p class="project-list"><h3 class="db-title">Project     '. $row['id'].'</h3>'.
    $row['project_title'].
    '<a class="btn edit" href="edit_project_form.php?id='.$row['id'].'">edit</a>'.

    '<a class="btn delete" href="delete_project.php?id='.$row['id'].'">delete</a></p>';
    }

    $stmt = null;

    ?>
    <br><br><br>

</body>
</html>
