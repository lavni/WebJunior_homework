<?php
	header("content-type:text/html; charset=utf-8;");
	// echo '<pre>';
	// print_r($_POST);
	// echo '</pre>';

	function validate_email($email) {
		return preg_match("/^([\w\.\-])+@([\w\.\-]+\\.)+[a-z]{2,4}$/i", $email);
	}
	function validate_phone($phone) {
		return (preg_match("/[+][0-9]{3} [0-9]{2} [0-9]{3} [0-9]{2} [0-9]{2}/i", $phone));
	}
	function validate_name($name) {
		return (preg_match("/^[a-zA-Zа-яА-Я]+$/i", $name));
	}

	if (count($_POST) == 0) {
		echo "Пожалуйста, введите данные!";
	}
	else if(count($_POST) > 0){
		if($_POST['name'] != '' && $_POST['email'] && $_POST['tel'] != ''){
			if (validate_name($_POST['name']) == 0 ) {
				echo 'Имя введено неверно! Могут быть использованы только буквы.';
			}
			else if (validate_email($_POST['email']) == 0 ) {
				echo 'E-mail введен неверно! Пример: hello@gmail.com.';
			}
			else if (validate_phone($_POST['tel']) == 0) {
				echo 'Телефон введен неверно! Пример: +375 29 123 45 67.';
			}
			else {
				file_put_contents('data/apps.txt', $_POST['name'] . ', ' . $_POST['email'] . ', ' . $_POST['tel'] . "\r\n", FILE_APPEND);
				echo 'Данные сохранены!';
				$_POST['name']='';
				$_POST['email']='';
				$_POST['tel']='';
			}
		}
		else {
			if ($_POST['name'] == '') {
				echo "Введите имя!";
			}
			else if ($_POST['email'] == '') {
				echo "Введите e-mail!";
			}
			else if ($_POST['tel'] == '') {
				echo "Введите телефон!";
			}
		}
	}
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Form</title>
	<style type="text/css">
		body{
			font-size: 20px;
			font-family: Verdana;
		}
		p{
			margin: 0;
			padding: 10px 0 0 0;
		}
	</style>
</head>
<body>
	<form method="post">
		<p>Name</p>
		<input type="text" name="name" value='<?php echo $_POST['name']; ?>' placeholder="Введите ваше имя">
		<p>E-mail</p>
		<input type="email" name="email" value='<?php echo $_POST['email']; ?>' placeholder="Введите ваш e-mail">
		<p>Phone</p>
		<input type="tel" name="tel" value='<?php echo $_POST['tel']; ?>' placeholder="Введите ваш телефон"><br><br>
		<input type="submit" value="Send">
	</form>
</body>
</html>
