<?php
// error_reporting(0);
// session_start();
check_error_login(check_input());
// echo !empty($_SESSION['username']) && !empty($_SESSION['nama']) ? "<p>$_SESSION[username] - $_SESSION[nama]</p>" : "";
echo (!empty($_COOKIE['username']) && !empty($_COOKIE['nama'])) ? "<p>$_COOKIE[username] - $_COOKIE[nama]</p>" : "";
function check_input()
{
    if (!empty($_POST['button']) && $_POST['button'] == 'login') {
        if (empty($_POST['uname']) || empty($_POST['pass'])) {
            return "kosong";
        }
        try {
            $db = "informatika";
            $user = "root";
            $pass = "";
            $host = "localhost";
            $pdo = new PDO('mysql:host=' . $host . ';dbname=' . $db, username: $user, password: $pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (\Exception $e) {
            die($e->getMessage());
        }
        $users = $pdo->query("SELECT * FROM users WHERE username = '" . $_POST['uname'] . "'")->fetch();
        catat_user($users);
    }
}
function check_error_login($data)
{
    if ($data == "kosong") {
        echo "<p>harap isi data login</p>";
    }
}
function catat_user($users)
{
    global $username, $nama;
    // $_SESSION['username'] = $users['username'];
    // $_SESSION['nama'] = $users['nama'];
    setcookie('username', $users['username'], time()+(365*24*60*60), "/");
    setcookie('nama', $users['nama'], time()+(365*24*60*60), "/");
    $username = $users['username'];
    $nama = $users['nama'];
    header("Location: http://localhost/login/");
}
?>
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
    <form action="" method="post">
        <label for="uname">user : </label>
        <input type="text" name="uname" id="uname" maxlength="50" placeholder="username"> <br>
        <label for="pass">password : </label>
        <input type="password" name="pass" id="pass" maxlength="100" placeholder="password"> <br>
        <button type="submit" name="button" value="login">login</button>
    </form>
</body>

</html>