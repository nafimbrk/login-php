<?php
echo "<h2>hash</h2>";
$pass_input = "petanikode";
$pass_db = password_hash("petanikode", PASSWORD_DEFAULT);
echo $pass_db . "<br>";
echo password_verify($pass_input, $pass_db);

echo "<h2>crypt</h2>";
echo crypt("petanikode", "garam");

echo "<h2>md5</h2>";
echo md5("petanikode");