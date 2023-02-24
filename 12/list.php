<?php
	include("_shared.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>List</title>
	</head>
	
	<body>
		<a href="form.php">zpet na formular</a>
		<?php
			$_SESSION["user"] = 'koko';
			$_SESSION["uid"] = 1;
			$uid = 1;
			// kod vypsany jen neprihlasenemu uzivateli
			if (!isset($_SESSION["user"])) {
				//include("_prihlasovaci-odkaz.php");
			}
		?>
		<?php
			echo "<h1>".getUserName($data, $uid)."</h1>";
		?>
		
		<?php
			/*$un = getNotesByUid($data, $uid);
			foreach ($un as $n) {
				echo "<div>";
				echo "title: ".htmlspecialchars($n["title"])." text: ".htmlspecialchars($n["text"]);
				echo "</div>";
			}*/
		?>
		<hr>
		
		<?php
			$limit = 3;
			$total = countUserNotes($data, $uid);
			if ($total > 0) {
				$pages = ceil($total/$limit);
				$page = min($pages, filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, array(
					'options' => array(
						'default'   => 1,
						'min_range' => 1,
					),
				)));
				$offset = ($page - 1) * $limit;
				
				$notes = getNotesByUidPaging($data, $uid, $limit, $offset);
				
				foreach ($notes as $n) {
					echo "<div>";
					echo "title: ".htmlspecialchars($n["title"])." text: ".htmlspecialchars($n["text"]);
					echo "</div>";
				}
				
				if ($page > 1) {
					$prevlink = '<a href="?page=1">&laquo;</a> <a href="?page='.($page-1).'">&lsaquo;</a>';
				} else {
					$prevlink = "&laquo; &lsaquo;";
				}
				
				$links = "";
				for ($i=0; $i < $pages; $i++) {
					if ($i == $page-1 ) {
						$links .= " ".($i+1)." ";
					} else {
						$links .= " <a href=\"?page=".($i+1)."\">".($i+1)."</a> ";
					}
				}
				
				
				if ($page < $pages) {
					$nextlink = '<a href="?page='.($page+1).'">&rsaquo;</a> <a href="?page='.$pages.'">&raquo;</a>';
				} else {
					$nextlink = "&rsaquo; &raquo;";
				}
				
				
				echo $prevlink, $links, $nextlink; 
			}
		?>
		
	</body>
	<footer>
		<?php
			// kod vypsany jen prihlasenemu uzivateli
			if (isset($_SESSION["user"])) {
				echo '<a href="logout.php">Odhlasit</a>';
			}
		?>
	</footer>
</html>
