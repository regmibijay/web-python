<?php
#die ("Cooking something cool but not done yet.");
if (! isset($_COOKIE['hash'])){
die('<meta http-equiv="refresh" content="1; URL=login.php"><b>Please wait... <b>');
}
if (isset($_COOKIE['hash'])){
if ($_COOKIE['hash'] != md5('1234')){
setcookie('hash','exploding', time()-3600);
die ('<meta http-equiv="refresh" content="1; URL=login.php"><h1>Tait Boro. yesto ni garni ho. </h1>');
}
}
function generateRandomString($length = 10) {
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
}

if (! isset($_COOKIE['sesid'])){
$randomstring=  generateRandomString();
setcookie('sesid',$randomstring,time()+3600);
}
else {
$randomstring = $_COOKIE['sesid'];
}
$usercode = $_POST['code'];
$filename = "codes/".$randomstring.".py";
$myfile = fopen ($filename,"w") or die ("error!");
fwrite($myfile,$usercode);
fclose($myfile);
$command = escapeshellcmd('python3 '.'codes/'.$randomstring.'.py');
$output = shell_exec($command);
$filename = "outputs/".$randomstring.".out";
$myfile = fopen($filename,"w") or die ("error!");
fwrite($myfile,$output);
fclose($myfile);
die('<meta http-equiv="refresh" content="1; URL=index.php"><b>Please wait... <b>');
?>

