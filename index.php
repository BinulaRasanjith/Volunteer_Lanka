<?php include 'Navbar/navbar.php';
require 'conn.php'; ?>

<?php
    $sql = "SELECT P_ID, Name, Date FROM project";
    $result = mysqli_query($conn, $sql);
    $projects = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/cards.css">
    <title>Volunteer Lanka</title>
</head>
<body>
<section class="container">
        <?php foreach ($projects as $project){ 
            $pid = $project['P_ID']?>
            <div class="card">
            <?php $sql2 = "SELECT Image FROM pr_image WHERE $pid = P_ID";
                $result2 = mysqli_query($conn, $sql2);
                while($row = $result2->fetch_assoc()) { 
                    $image = $row['Image'];?>
                    <div class="card-image" ><img id="cards" src="images/<?= $image?>"></div>
            <?php }?>
            <h2><?php echo ($project["Name"]); ?></h2>
            <p><?php echo ($project["Date"]); ?></p>
            <a class="btn" href="view_project_volunteer.php?pid=<?php echo $pid?>">View</a>
            </div>
        <?php } 
        $conn->close();?>
    </section>
</body>
</html>
