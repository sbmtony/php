<?php
function UploadForm (){
  echo '<form action="index.php?method=upload" method="POST" enctype="multipart/form-data">';
	echo '	<label>选择文件：</label>';
	echo '	<input type="file" name="file" /><br /><br />';
	echo '	<input type="submit" name="submit" value = "上传" />';
	echo '</form>';
}

function EditForm ($filecontentbox){

	echo '<form action="" method="post">';
	echo '	<textarea rows="20" cols="60" name="filecontent">'.$filecontentbox. '</textarea>';
//	echo '	<input type="hidden" name="filename" value="'.$filename_u.'" /><br /><br />';
	echo '	<input type="submit" value="保存" name="submit" />';
	echo '</form>';			
}



/*
function EditFile (){
	$fp = fopen('function.php','r');
	$filecontent = fread ($fp, filesize ('function.php'));
	fclose($fp);	
	
}
*/


?>
