<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/icon_logo.png" type="image/icon type">
    <title>School location</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;900&display=swap" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <style>
        .google-map {
            width: 100%;
            height: calc(100vh - 150px);
        }
    </style>
</head>

<body>
    <?php include 'show-navbar.php'; ?>
    <?php show_navbar(); ?>
    <header class="inverse">
        <div class="container">
            <h1><span class="accent-text">School location</span></h1>
        </div>
    </header>
    <br>
    <div class="google-map">
        <iframe src="https://www.google.com/maps/d/u/0/embed?mid=15Z3ti2e87K_gqlgufm7YPgjBNI-g2Pw&ehbc=2E312F&noprof=1" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>
</body>

</html>
