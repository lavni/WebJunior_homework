<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Picture</title>
		<style type="text/css">
			img{
				display: block;
				width: 50%;
				margin: 0 auto;
				margin-top: 5%;
			}
		</style>
	</head>
<body>
<?php
	$h = date("H");
	$x=6;
	$y=bcdiv($h, $x);
?>
<img id="image" src="img/<?php echo $y;?>.jpg">
</body>
