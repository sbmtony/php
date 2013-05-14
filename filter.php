<?php
$height=isset($_POST['height'])?$_POST['height']:null;
$email=isset($_POST['email'])?$_POST['email']:null;
echo '<form action="" method="post">';
echo   '<label for="height">height: </label><input type="text" name="height" value="'.$height.'" /><br />';
echo 	'<label for="email">email: </label><input type="text" name="email" value="'.$email.'"/><br />';
echo 	'<input type="submit" name="submit" value="submit"; />';
echo '</form>';

if(isset($_POST['submit']))
{
$int_height = array("options"=>array("min_range"=>100,"max_range"=>300));
	if(!filter_var($height, FILTER_VALIDATE_INT,$int_height)){
		$html = 'invalid height, please fill again!';
	}	
	elseif (!filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL)){
		$html = 'email is not valid, please check again!';
	}
	else{
		$html = 'valid info, please wait for result!';
	}
	echo "<h1>$html</h1>";
}
?>
