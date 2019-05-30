<?php
if (isset($_COOKIE['hash'])){
if ($_COOKIE['hash'] = md5('1234')){
die ('<meta http-equiv="refresh" content="1; URL=index.php"><h1>Login restored. Redirecting </h1>');
}
else {
setcookie('hash','terminated',time()-3600);
die('Muji boro. Tait. Ma ta cookie sookie delete garde.');
}
}
if (isset ($_POST['submit'])){
$password = $_POST['password'];
$username = $_POST['username'];
if ($username == 'admin' AND $password =='1234') {
setcookie('hash',md5($password),time()+3600);
die('<meta http-equiv="refresh" content="1; URL=index.php"> Login successful, please wait while you are redirected... ');
}
else {
die("Username password incorrect");
}
}
?>
<html>
<body>
<form action = "" method ="POST">
<p> <b> Username :</b> <input name="username" type="text" autocomplete="on"> </p>
<p> <b> Password : </b> <input name="password" type ="password" autocomplete="on"></p>
<p> <input name="submit" type="submit" >  
</form>
</body>
</html>
