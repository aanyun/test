<?php
include "MysqliDb.php";
include "News.php";

$command = $_POST['command'];
switch ($command) {
	case 'saveNews':
		if($_POST['title']==""||$_POST['story']==""||$_POST['link']==""||$_POST['idPublisher']=="") {
			echo "please fill in all fileds";
			return;
		}
		$data = array(
			"headline" => $_POST['title'],
            "story" => $_POST['story'],
            "link" => $_POST['link'],
            "idPublisher"=>$_POST['idPublisher']
		);
		//print_r($data);
		if(is_int(News::createNews($data))) echo "success";
		else echo "Insert Error";
		break;
	
	default:
		echo "error";
		break;
}



?>