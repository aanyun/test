<?php
include "MysqliDb.php";
include "News.php";
if(isset($_POST['command']))
	$command = $_POST['command'];
else $command = $_GET['command'];

switch ($command) {
	case 'saveNews':
		if($_POST['title']==""||$_POST['story']==""||$_POST['date']==""||$_POST['link']==""||$_POST['idPublisher']=="") {
			echo "please fill in all fileds";
			return;
		}
		$data = array(
			"headline" => $_POST['title'],
            "story" => $_POST['story'],
            "date" => $_POST['date'],
            "link" => $_POST['link'],
            "idPublisher"=>$_POST['idPublisher']
		);
		//print_r($data);
		if(is_int(News::createNews($data))) echo "success";
		else echo "Insert Error";
		break;
	case 'savePressRelease':
		if($_POST['title']==""||$_POST['story']==""||$_POST['date']==""||$_POST['link']==""||$_POST['link']=="") {
			echo "please fill in all fileds";
			return;
		}
		$data = array(
			"title" => $_POST['title'],
            "desc" => $_POST['story'],
            "date" => $_POST['date'],
            "url" => $_POST['link'],
		);
		//print_r($data);
		$db = new Mysqlidb();
		echo $db->insert('pressreleases', $data);
		// else echo "Insert Error";
		break;
	case 'uploadimg':
		$path = "../uploads/";

		$valid_formats = array("jpg", "png", "gif", "bmp");
		if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
		{
			$name = $_FILES['photoimg']['name'];
			$size = $_FILES['photoimg']['size'];
			
			if(strlen($name))
				{
					list($txt, $ext) = explode(".", $name);
					if(in_array($ext,$valid_formats))
					{
					if($size<(1024*1024))
						{
							$actual_image_name = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
							$tmp = $_FILES['photoimg']['tmp_name'];
							//echo move_uploaded_file($tmp, $path.$actual_image_name);
							if(move_uploaded_file($tmp, $path.$actual_image_name))
								{
									$size = getimagesize($path.$actual_image_name);
									    $maxWidth = 240;
    									$maxHeight = 55;
    									if ($size[0] > $maxWidth || $size[1] > $maxHeight)
									    {
									        unlink($file);
									        echo "Image over max height/width.";
									    }
								// mysqli_query($db,"UPDATE users SET profile_image='$actual_image_name' WHERE uid='$session_id'");
									
										else echo "<img src='uploads/".$actual_image_name."'  class='preview'>";
								}
							else
								echo "failed";
						}
						else
						echo "Image file size max 1 MB";					
						}
						else
						echo "Invalid file format..";	
				}
				
			else
				echo "Please select image..!";
				
			exit;
		}
		break;
	case 'uploadpdf':
		$path = "../uploads/";

		$valid_formats = array("pdf", "html");
		if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
		{
			$name = $_FILES['add-press-release-file']['name'];
			$size = $_FILES['add-press-release-file']['size'];
			if(strlen($name))
				{
					list($txt, $ext) = explode(".", $name);
					if(in_array($ext,$valid_formats))
					{
					if($size<(1024*1024))
						{
							$actual_image_name = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
							$tmp = $_FILES['add-press-release-file']['tmp_name'];
							//echo move_uploaded_file($tmp, $path.$actual_image_name);
							if(move_uploaded_file($tmp, $path.$actual_image_name))
								{
									echo "<div id='pdfurl' url='uploads/".$actual_image_name."'></div>";
								}
							else
								echo "failed";
						}
						else
						echo "ile size max 1 MB";					
						}
						else
						echo "Invalid file format..";	
				}
				
			else
				echo "Please select PDF..!";
				
			exit;
		}
		break;
	case 'createPublisher':
		$db = new Mysqlidb();
		if($_POST['name']==""||$_POST['img']=="") {
			echo "error";
			return;
		}
		$data = array(
			"name"=>$_POST['name'],
			"logo"=>$_POST['img']
			);
		echo $db->insert('publishers', $data);
		break;
	default:
		echo "error";
		break;
}



?>