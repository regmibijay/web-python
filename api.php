<?php
$api = $_GET['apikey'];
if ($api != 'shankarboro'){
die('<font color="red">Access Denied! No or wrong API Key.</font>
<p> Correct syntax of this api: api.php?apikey=< your secret apikey>&code=< code > </p>');
}
$randomstring = base64_encode(random_bytes(10));
$usercode = $_GET['code'];
$filename = "codes/".$randomstring.".py";
$myfile = fopen ($filename,"w") or die ("Error processing your query, please send the query again.");
fwrite($myfile,$usercode);
fclose($myfile);
$command = escapeshellcmd('python3 '.'codes/'.$randomstring.'.py');
$output = shell_exec($command);
header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");
header('Content-Type: application/json');
echo json_encode($output);
?>
