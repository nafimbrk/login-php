<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include("nav.php");
    ?>
    <div>
        <?php
        // session_start();
        // echo "<p>$_SESSION[username] - $_SESSION[nama]</p>";
        echo (!empty($_COOKIE['username']) && !empty($_COOKIE['nama'])) ? "<p>$_COOKIE[username] - $_COOKIE[nama]</p>" : "";
        ?>
    </div>
</body>

</html>