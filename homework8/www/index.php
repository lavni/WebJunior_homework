<?php header("content-type:text/html; charset=utf-8;");
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Menu</title>
		<style type="text/css">
			body{
				font-size: 30px;
				font-family: Verdana;
			}
			div{
				padding: 20px;
				width: 200px;
				margin: 0 auto;
			}
			a{
				text-decoration: none;
				color: grey;
			}
			ul ul a{
				color: #ACACAC;
			}
		</style>
	</head>
<body>
<div>
<?php
	$ip = array ('127.0.0.1', '127.0.0.2', '127.0.0.3', '127.0.0.4',
		'127.0.0.5', '127.0.0.6');
	$userip = $_SERVER["REMOTE_ADDR"];
	$count = count($ip);
	// echo $userip;
	// echo '<br>';
	// echo count($ip);
	// echo '<br>';
	for ($i = 0; $i < $count; $i++) {
			if ($userip == $ip[$i]) {
				# menu
				$menu = array(
					array('href' => '#', 'text' => 'Home', 'title' => 'Home','menu'=> array(
							array('href' => '#', 'text' => 'Photo', 'title' => 'Photo'),
							array( 'href' => '#', 'text' => 'Video', 'title' => 'Video'),
							array( 'href' => '#', 'text' => 'Audio', 'title' => 'Audio'))),
					array( 'href' => '#', 'text' => 'Posts', 'title' => 'Posts', 'menu'=> array(
							array('href' => '#', 'text' => 'Day 1', 'title' => 'Day 1'),
							array( 'href' => '#', 'text' => 'Day 2', 'title' => 'Day 2'),
							array( 'href' => '#', 'text' => 'Day 3', 'title' => 'Day 3'))),
					array( 'href' => '#', 'text' => 'About', 'title' => 'About', 'menu'=> array(
							array('href' => '#', 'text' => 'Adress', 'title' => 'Adress'),
							array( 'href' => '#', 'text' => 'Phone', 'title' => 'Phone'),
							array( 'href' => '#', 'text' => 'E-mail', 'title' => 'E-mail')))
				);
				echo '<ul>';
				for($i = 0; $i < count($menu); $i++){
					echo '<li><a href=' . $menu[$i]['href'] . ', title=' . $menu[$i]['title'] . '>' . $menu[$i]['text'] . '</a></li>';
					echo '<ul>';
					for ($j = 0; $j < count($menu[$i]['menu']); $j++) {
						echo '<li><a href=' . $menu[$i]['menu'][$j]['href'] . ', title=' . $menu[$i]['menu'][$j]['title'] . '>' . $menu[$i]['menu'][$j]['text'] . '</a></li>';
					}
					echo '</ul>';
				}
				echo '</ul>';

				break;
			}
			elseif ($i == ($count - 1)) {
				echo 'Warning! You have no access!';
			}
	}
?>
</div>
</body>
</html>

