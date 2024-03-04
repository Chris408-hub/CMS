
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

    <form class="form edit-form" action="login.php" method="post">
    <label for="username">Username: </label>
    <input type="text" name="username" id="username"><br>
    <label for="password">Password: </label>
    <input type="password" name="password" id="password"><br><br>
    <input type="submit" value="login">
    </form>

    <?php
    $stmt = null;
    ?>
</body>
</html>
