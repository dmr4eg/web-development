<?php
	session_start();
	
	define("DATA_FILE", "data.txt");
	
	function loadData() {
		return json_decode(file_get_contents(DATA_FILE),JSON_OBJECT_AS_ARRAY);
	}
	
	function saveData($data) {
		file_put_contents(DATA_FILE, json_encode($data));
	}
	
	function validate($title, $text) {
		// kod na validaci
		return true;
	}
	
	// prida poznamku
	function addNote($data, $title, $text, $uid) {
		$note = array(
			"title" => $title,
			"text" => $text,
			"uid" => $uid,
			"id" => uniqid()
		);
		
		//$data["notes"][] = $note;
		array_push($data["notes"], $note);
		saveData($data);
	}
	
	// prida usera
	function addNewUser($username, $password, $data) {
		$user = array(
			"name" => $username,
			"password" => password_hash($password, PASSWORD_DEFAULT),
			"id" => uniqid()
		);
		
		array_push($data["users"], $user);
		saveData($data);
		return $user;
	}
	

	// najde a vrati usera podle jmena
	function getUserByName($name, $data) {
		foreach($data["users"] as $user) {
			if ($name == $user["name"]) {
				return $user;
			}
		}
		return false;
	}
	
	// vraci uzivatelovy poznamky
	function getNotesByUid($data, $uid) {
		$userNotes = [];
		foreach($data["notes"] as $n) {
			if ($n["uid"] == $uid) {
				array_push($userNotes, $n);
			}
		}
		return $userNotes;
	}

	// vraci uzivatelovy poznamky
	function getNotesByUidPaging($data, $uid, $limit = 5, $offset = 0) {
		// protoze potrebujme jen uzivatelovy poznamky
		$userNotes = getNotesByUid($data, $uid);

		$n = [];
		$last = min(($offset + $limit),count($userNotes));
		for ($i = $offset; $i < $last; $i++) {
			array_push($n, $userNotes[$i]);
		}

		return $n;
	}

	function countUserNotes ($data, $uid) {
		// protoze potrebujme jen uzivatelovy poznamky
		return count(getNotesByUid($data, $uid));
	}
	
	// vraci jmeno uzivatele
	function getUserName($data, $uid) {
		foreach($data["users"] as $u) {
			if ($u["id"] == $uid) {
				return $u["name"];
			}
		}
	}
	
	// naceteni dat ze souboru, 
	//to je prvni co udelam vzdy na kazde strance
	$data = loadData();
	
	// idecko usera (prihlaseneho)
	//$uid = isset($_SESSION["user"]) ? $_SESSION["user"]["id"]: -1;
?>
