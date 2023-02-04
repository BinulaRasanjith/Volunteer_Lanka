<?php

session_start();
if (!isset($_SESSION['uid'])) {
    header('Location: ' . BASE_URL);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/styles/advertiesment_requests.css">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/styles/cards.css">
    <title>Ad Requests</title>
</head>

<body>
    <?php include 'views/includes/navbar_log.php'; ?>

    <div class="main" id="main">
        <h2 style="margin-bottom: 50px;">Advertisement Request</h2>
        <section class="container">
            <?php foreach ($this->ads as $ad) {

            ?>
                <div class="card">
                    <div class="card-image"><img id="card-img" src="<?php echo BASE_URL ?>public/images/<?php echo  $this->adimages[$ad['AD_ID']] ?>"></div>
                    <h2><?php echo $this->ad_sponsor_name[$ad['AD_ID']] ?></h2>
                    <a class="btn" href="view_ad_req.php?adid=<?php echo $adid ?>">View</a>
                </div>
            <?php } ?>
        </section>
        <br>
        <!-- <button id="back-btn" onclick="window.location.href='<?php echo BASE_URL ?> '">Back</button> -->
        <button onclick="history.back()" id="back-btn">Back</button>
        <br><br>
    </div>

</body>

</html>