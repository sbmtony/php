<?php
  require "global.php" ;	
	$method = isset ($_GET['method'])?($_GET['method']):null;
	switch ($method)
		{
			case ('upload'):
				require "header.php";
				isset ($_POST['submit'])?($_POST['submit']):null;
				//echo "this is upload page!";
				if (isset($_POST['submit'])){
					$filename = $_FILES["file"]["name"];
					move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $filename);					
					echo "完成上传！";
				}
					echo $filename.'<a href="?method=edit&filename='.$filename.'"> 编辑 </a> <a href="index.php">返回</a>';
				require "footer.php";
				break;
			
			case ('edit'):
				require "header.php";
				echo "this is edit page!";
				
				$filename = isset($_GET['filename'])?($_GET['filename']):null;
				$filename_u = "upload/".$filename;
				$fp = fopen($filename_u,'r');
				$filecontent = fread ($fp, filesize ($filename_u));					
				$filecontent_new = $_POST['filecontent'];
				$filecontentbox = isset ($_POST['submit'])?$filecontent_new:$filecontent;
				fclose($fp);
				EditForm ($filecontentbox);
				if ( isset($_POST['submit']))
				{	
					
					$fp1 = fopen($filename_u,'wb+');
					fwrite($fp1,$filecontent_new);
					fclose($fp1);
					echo 'save success!';
				}				
				echo '<a href="index.php">back</a>';
				require "footer.php";
			break;
			
			case ('save'):
				require "header.php";
				echo "this is save page!";
				if ( isset($_POST['submit']))
				{
					$content = isset($_POST['filecontent'])?$_POST['filecontent']:null;
					$fp = fopen($filename,'wb+');
					fwrite($fp,$filecontent);
					fclose($fp);
					echo 'save success!';
				}
				
				echo '<a href="index.php">back</a>';
				require "footer.php";
			break;
			default:
				require "header.php";
				UploadForm ();				
				require "footer.php";
			break;
		}
?>
