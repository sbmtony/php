<?php
$email = isset($_POST['email'])?$_POST['email']:null;
$name = isset($_POST['name'])?$_POST['name']:null;
echo '<form action="" method ="post">';
echo '  <label for="name">Name: </label>';
echo '	<input type="text" name = "name" value ="'.$name.'" /><br />';
echo '	<label for="email">Email: </label>';
echo '	<input type="text" name = "email" value ="'.$email.'" /><br />';
echo '	<input type="submit" name = "submit" value ="submit" />';
echo '</form>';

if(isset($_POST['submit'])){
	if(!filter_has_var(INPUT_POST, "name")){
	$html = "Please fill in your name!";
	}elseif(!filter_has_var(INPUT_POST,"email")){
	$html = "please fill in your email!";
	}elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
	$html = "Your Email is not valide, Please check it!";
	}else{
	$html = "Thanks!";
	}
echo $html;
}
?>
