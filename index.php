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
?>
<html>
<head>
<link rel="stylesheet" href="css.css">
</head>
<body>
<h1> Python 3.6.7 Emulator </h1>
<div class="split left">
  <div class="centered">
     <h1> Your code</h1>
<form  action ="code.php" method="post"> 
<textarea name="code" style = "padding : 10px; margin: 10px;" rows ="10" cols ="50">
<?php
if (isset($_COOKIE['sesid']))
{
$myfile= fopen ("codes/".$_COOKIE['sesid'].".py","r") or die ("tait k vao feri");
echo  fread ($myfile,filesize("codes/".$_COOKIE['sesid'].".py"));
fclose($myfile);
}
?>
</textarea>
<input type = "submit" value="run">
</form> 
 </div>
</div>

<div class="split right">
  <div class="centered">
        <h1>Output</h1>
<textarea name="code" style = "padding : 10px; margin: 10px;" rows ="10" cols ="50">
<?php
if (isset($_COOKIE['sesid']))
{
$filename = "outputs/".$_COOKIE['sesid'].".out";
$myfile = fopen ($filename,"r") or die ("No output yet.  Please run a code.");
$output = fread ($myfile,filesize($filename));
echo $output;
fclose($myfile);
if ($output = "")
{
echo "Please give in a code.";
}
}
else
{
 die ("Please run a code");
}

?>
</textarea>
 </div>
</div>
</body>
</html>

