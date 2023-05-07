<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php include 'views/includes/head-includes.php'; ?>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/styles/cards.css">
    <title>Upcoming Projects</title>
</head>

<body>
    <!-- navigationb bar -->
    <?php include 'views/includes/navbar_log.php'; ?>

    <div class="main" id="main">
    <h2>Upcoming Projects</h2><br /><br />
        <section class="container">
            <?php include 'views/Organizer/includes/upcoming_projects.php' ?>
        </section>
        <br />

    </div>

</body>

</html>