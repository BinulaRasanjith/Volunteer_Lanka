<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--navbar links-->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/styles/navbar_log.css">
    <script defer src="<?php echo BASE_URL; ?>public/scripts/navbar.js"></script>
    <!--------------------------------------------------------------------------->

    <!--sidenav links-->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/styles/sidenav.css">
    <script defer src="<?php echo BASE_URL; ?>public/scripts/sidenav.js"></script>
    <!--------------------------------------------------------------------------->

    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/styles/view.css">
    <title><?php echo $this->project['Name'] ?></title>
</head>

<body>
<?php include 'views/includes/navbar_log.php'; ?>
<div class="main" id="main">
    <h2><?php echo $this->project['Name'] ?></h2><br/><br/>
    <div class="container">
        <div class="container-image">
            <?php foreach ($this->images as $image) { ?>
                <img src="<?php echo BASE_URL ?>public/images/pr_images/<?php echo $image['Image']; ?>">
            <?php } ?>
        </div>
        <div class="wrapper">
            <div class="left-div">
                <label for="">Date</label><br>
                <label for="">Time</label><br>
                <label for="">Venue</label><br>
                <label for="">Number of Volunteers</label><br>
                <label for="">Description</label><br>
            </div>

            <div class="right-div">
                <label id="data"><?php echo $this->project['Date'] ?></label><br>
                <label id="data"><?php echo $this->project['Time'] ?></label><br>
                <label id="data"><?php echo $this->project['Venue'] ?></label><br>
                <label id="data"><?php echo $this->project['No_of_volunteers'] ?></label><br>
                <label id="data"><?php echo $this->project['Description'] ?></label><br>
            </div>
        </div>
        <div class="btn-area">
            <button class="btn" onclick="history.back()">Cancel Project</button>
            <button class="btn" id="right">Postpone Project</button>
        </div>

    </div>
</div>
</body>

</html>






