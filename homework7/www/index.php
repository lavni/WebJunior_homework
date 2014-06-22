<?php header("content-type:text/html; charset=utf-8;") ?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Time</title>
		<style type="text/css">
			body{
				font-size: 30px;
				font-family: Verdana;
			}
			div{
				padding: 20px;
				width: 550px;
				margin: 0 auto;
			}
			img{
				display: block;
				width: 200px;
				padding: 20px;
				margin: 0 auto;
			}
		</style>
	</head>
<body>
	<div>
	<?php
		function ending($val){
			if ($val > 10 && $val < 20){
				$end = '';
			}
			else{
			$v = $val % 10;
			if ($v == 1) {
				$end = 'а';
				}
			elseif ($v >= 2 && $v <= 4) {
				$end = 'ы';
				}
			else {
				$end = '';
				}
			}
			return $end;
		}
		function hours($val){
			if ($val == 1 || $val == 21) {
				$end = '';
			}
			elseif (($val >= 2 && $val <= 4) || ($val >= 22)) {
				$end = 'а';
			}
			else {
				$end = 'ов';
			}
			return $end;
		}
		$h = date("G");
		$m = intval(date("i"));
		$s = intval(date("s"));

		echo $h.' час'. hours($h). ' '. $m. ' минут'. ending($m). ' '. $s. ' секунд'. ending($s);
	?>
	</div>
	<div><?php
		  $agent = $_SERVER["HTTP_USER_AGENT"];
		  $user_agent = $_SERVER["HTTP_USER_AGENT"];
			  if (strpos($user_agent, "Firefox") !== false) $browser = "Firefox";
			  elseif (strpos($user_agent, "Opera") !== false) $browser = "Opera";
			  elseif (strpos($user_agent, "Chrome") !== false) $browser = "Chrome";
			   elseif (strpos($user_agent, "MSIE") !== false) $browser = "Internet Explorer";
			  elseif (strpos($user_agent, "Trident") !== false) $browser = "Internet Explorer 11";
			  elseif (strpos($user_agent, "Safari") !== false) $browser = "Safari";
			  else $browser = "Неизвестный";
			 echo "Ваш браузер: ".$browser;
			 //echo $user_agent;
		if ($browser == Chrome) {
			echo '<img src="img/chrome.png">';
		}
		elseif ($browser == Firefox) {
			echo '<img src="img/firefox.png">';
		}
		elseif ($browser == Opera) {
			echo '<img src="img/opera.png">';
		}
		elseif ($browser == Safari) {
			echo '<img src="img/safari.png">';
		}
		elseif ($browser == 'Internet Explorer') {
			if(preg_match('/(?i)msie [1-8]/',$_SERVER['HTTP_USER_AGENT']))
			{
		    // if IE<=8
		    echo "Внимание! Вы используете плохой браузер! <br> Лучше этот: https://www.google.com/chrome/browser";
		    exit;
			}
			else
			{
			    echo '<img src="img/ie.png">';// if IE>8
			}
		}
		elseif ($browser == "Internet Explorer 11") {
			echo '<img src="img/ie11.png">';
		}
	 ?></div>
</body>
