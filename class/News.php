<?php 
class news{

	
	public function createNews($data){
		$db = new Mysqlidb();
		$data = array(
			"headline" => $data['headline'],
            "story" => $data['story'],
            "date" => $data['date'],
            "link" => $data['link'],
            "idPublisher"=>$data['idPublisher']
		    );
		return $id = $db->insert('news', $data);
	}





}




?>